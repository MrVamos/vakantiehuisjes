<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\BookHouse;
use App\Bookings;
use App\User;

class BookHousesController extends Controller
{
    /**
     * Show step 1 of booking-form
     *
     * @return \Illuminate\Http\Response
     */
    public function showStep1(Request $request)
    {
        // Check if logged in
        if(Auth::user()){

            // Get and add Customerdata to session
            $customerData = User::find(Auth::user('id'));
            $request->session()->put('customerData', $customerData[0]);

            return redirect('book/step2');
        }

        $customerData = $request->session()->get('customerData');
        return view('book.step1')->with('customerData', $customerData);
    }


    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postStep1(Request $request)
    {
        // Remove custom error (no custom errors are used in this step)
        $request->session()->forget('error');

        $validatedData = $this->validate($request, [
            'firstname' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cardnumber' => 'required|string|max:9',
            'postal_code' => 'postal_code:NL',
            'streetname' => 'required|string|max:100',
            'housenumber' => 'required|max:6',
            'city' => 'required|string|max:100',
        ]);

        // Fill session with form values after sucessfull validation
        $request->session()->put('customerData', $validatedData);

        return redirect('/book/step2');
    }

    /**
     * Show step 1 of booking-form
     *
     * @return \Illuminate\Http\Response
     */
    public function showStep2(Request $request)
    {
        // Get booking-data session
        $bookingData = $request->session()->get('bookingData');

        // Get house-types
        $houses = BookHouse::orderBy('id', 'asc')->pluck('name', 'id');
        return view('book.step2')->with(['bookingData' => $bookingData, 'houses' => $houses]);
    }


    /**
     * Post Request to store step2 info in session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postStep2(Request $request)
    {
        // Remove custom error
        $request->session()->forget('error');


        $validatedData = $this->validate($request, [
            'housetype' => 'required',
            'arrival' => 'required|date|date_format:d-m-Y|after:'.date('d-m-Y'),
            'departure' => 'required|date|date_format:d-m-Y|after:'.date('d-m-Y', strtotime($request['arrival']. ' + 1 days')),
            'adults' => 'required|integer|max:2',
            'children' => 'required|integer|max:2',
            'babys' => 'required|integer|max:2',
            'privacystatement' => 'accepted'
        ]);

        // Check if the amount of persons for the booking doesn't exceed the max amount of persons for the house-type
        $total_persons = $request['adults'] + $request['children'] + $request['babys'];
        $house = BookHouse::find($request['housetype']);
        if($total_persons > $house->max_persons) {
            // Error! Too many occupants for the chosen house-type
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'persons' => 'Een '.strtolower($house->name).' kan alleen geboekt worden voor maximaal '.$house->max_persons.' personen.',
             ]);
             throw $error;
        }

        // Add values to session after sucessfull validation
        $request->session()->put('bookingData', $validatedData);

        return redirect('/book/step3');
    }


    /**
     * Show step 3 of booking-form
     *
     * @return \Illuminate\Http\Response
     */
    public function showStep3(Request $request)
    {
        $customerData = $request->session()->get('customerData');
        $bookingData = $request->session()->get('bookingData');
        $houses = BookHouse::orderBy('id', 'asc')->pluck('name', 'id');

        $pricePerDay = BookHouse::find($bookingData['housetype'])->price;

        // Calculate price
        $days = round((strtotime($bookingData['departure']) - strtotime($bookingData['arrival'])) / (60 * 60 * 24));

        return view('book.step3')->with(['customerData' => $customerData, 'bookingData' => $bookingData, 'houses' => $houses, 'price' => $pricePerDay, 'days' => $days]);
    }

/**
     * Post Request to store step3 info in database and destroy session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postStep3(Request $request)
    {
        // Get booking- and customer-data from sessions
        $customerData = $request->session()->get('customerData');
        $bookingData = $request->session()->get('bookingData');

        $houseType = $bookingData['housetype'];
        $arrival = strtotime($bookingData['arrival']);
        $departure = strtotime($bookingData['departure']);

        $checkDoubleBooking = Bookings::where('housetype', $houseType)
                            ->whereBetween('arrival', [$arrival, $departure])
                            ->whereBetween('departure', [$arrival, $departure])
                            ->get();

        $houseTypeName = BookHouse::find($houseType)->name;

        if(count($checkDoubleBooking) == 1) {

             $error = 'Het type vakantiehuis \''.strtolower($houseTypeName).'\' is al geboekt in deze periode. Kies een andere periode of type vakantiehuis';
             $request->session()->put('error', $error);

            return redirect('book/step2');

        }

        // Add user to database if user doesn't already exists
        $checkUser = User::where('email', $customerData['email'])->get();

        if(count($checkUser) == 0) {
            $user = new User;
            $user->name = $customerData['firstname'].' '.$customerData['surname'];
            $user->firstname = $customerData['firstname'];
            $user->surname = $customerData['surname'];
            $user->email = $customerData['email'];
            $user->password = Hash::make($customerData['password']);
            $user->cardnumber = $customerData['cardnumber'];
            $user->postal_code = $customerData['postal_code'];
            $user->streetname = $customerData['streetname'];
            $user->housenumber = $customerData['housenumber'];
            $user->city = $customerData['city'];
            $user->save();
        }

        // Add booking to database
        $booking = new Bookings;
        $booking->housetype = $bookingData['housetype'];
        $booking->arrival = strtotime($bookingData['arrival']);
        $booking->departure = strtotime($bookingData['departure']);
        $booking->adults = $bookingData['adults'];
        $booking->children = $bookingData['children'];
        $booking->babys = $bookingData['babys'];
        $booking->customerid = count($checkUser) == 1 ? $checkUser[0]['id'] : $user->id;
        $booking->save();


        // Call API to check for availability

        /*
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://api.github.com/user', ['arrival' => $bookingData['aankomst'], 'departure' => $bookingData['vertrek']]);
        $status = $res->getStatusCode(); // 200

        if($status != 200) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'period' => 'De periode die u probeert te boeken is niet meer beschikbaar.',
             ]);
             throw $error;
        }
        */

        // Destroy sessions
        $request->session()->forget('customerData');
        $request->session()->forget('bookingData');

        return redirect('/book/thankyou');

    }

    public function thankyou()
    {
        return view('book.thankyou');
    }


}
