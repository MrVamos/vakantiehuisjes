<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //$request->session()->forget('customerData');
        //$request->session()->forget('bookingData');

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
        $validatedData = $this->validate($request, [
            'voornaam' => 'required|string',
            'achternaam' => 'required|string',
            'email' => 'required|email',
            'wachtwoord' => 'required|string',
            'kaartnummer' => 'required|string|max:9',
            'postcode' => 'postal_code:NL',
            'straatnaam' => 'required|string|max:100',
            'huisnummer' => 'required|max:6',
            'plaats' => 'required|string|max:100',
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

        $validatedData = $this->validate($request, [
            'huistype' => 'required',
            'aankomst' => 'required|date|date_format:d-m-Y|after:'.date('d-m-Y'),
            'vertrek' => 'required|date|date_format:d-m-Y|after:'.date('d-m-Y', strtotime($request['aankomst']. ' + 1 days')),
            'volwassenen' => 'required|integer|max:2',
            'kinderen' => 'required|integer|max:2',
            'babys' => 'required|integer|max:2',
            'privacystatement' => 'accepted'
        ]);

        // Check if the amount of persons for the booking doesn't exceed the max amount of persons for the house-type
        $total_persons = $request['volwassenen'] + $request['kinderen'] + $request['babys'];
        $house = BookHouse::find($request['huistype']);
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

        $pricePerDay = BookHouse::find($bookingData['huistype'])->price;

        // Calculate price
        $days = round((strtotime($bookingData['vertrek']) - strtotime($bookingData['aankomst'])) / (60 * 60 * 24));

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

        $houseType = $bookingData['huistype'];
        $arrival = strtotime($bookingData['aankomst']);
        $departure = strtotime($bookingData['vertrek']);

        $checkDoubleBooking = Bookings::where('housetype', $houseType)
                            ->whereBetween('arrival', [$arrival, $departure])
                            ->whereBetween('departure', [$arrival, $departure])
                            ->get();

        $houseTypeName = BookHouse::find($houseType)->name;

        if(count($checkDoubleBooking) == 1) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'huistype' => 'Het type vakantiehuis \''.strtolower($houseTypeName).'\' is al geboekt in deze periode. Ga naar stap 2 om een andere periode of type vakantiehuis te kiezen',
             ]);
             throw $error;
        }

        // Add user to database if user doesn't already exists
        $checkUser = User::where('email', $customerData['email'])->get();

        if(count($checkUser) == 0) {
            $user = new User;
            $user->name = $customerData['voornaam'].' '.$customerData['achternaam'];
            $user->firstname = $customerData['voornaam'];
            $user->surname = $customerData['achternaam'];
            $user->email = $customerData['email'];
            $user->password = $customerData['wachtwoord'];
            $user->cardnumber = $customerData['kaartnummer'];
            $user->postal_code = $customerData['postcode'];
            $user->streetname = $customerData['straatnaam'];
            $user->housenumber = $customerData['huisnummer'];
            $user->city = $customerData['plaats'];
            $user->save();
        }

        // Add booking to database
        $booking = new Bookings;
        $booking->housetype = $bookingData['huistype'];
        $booking->arrival = strtotime($bookingData['aankomst']);
        $booking->departure = strtotime($bookingData['vertrek']);
        $booking->adults = $bookingData['volwassenen'];
        $booking->children = $bookingData['kinderen'];
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
        //$request->session()->forget('customerData');
        //$request->session()->forget('bookingData');

        return redirect('/book/thankyou');

    }

    public function thankyou()
    {
        return view('book.thankyou');
    }


}
