<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookHouse;

class PagesController extends Controller
{
    public function index(Request $request)
    {

        // Just in case destroy all sessions used in booking-system
        $request->session()->forget('customerData');
        $request->session()->forget('bookingData');

        $houseInfo = BookHouse::orderBy('id', 'asc')->get();

        return view('index')->with(['houseInfo' => $houseInfo]);
    }

}
