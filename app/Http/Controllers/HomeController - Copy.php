<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tripDate = $request->input('trip_date');
        $from = $request->input('from');
        $to = $request->input('to');

        $trip = Trip::where('trip_date', $tripDate)
                    ->where('from', $from)
                    ->where('to', $to)
                    ->first();



        if ($trip) {


            $message = "Trip will be available";


        } else {
            $message = "Trip will not be available";
        }

        return view('home', compact('message'));
    }

    public function bookTicket(Trip $trip)
{
    // Implement your ticket booking logic here

    return redirect()->route('home')->with('success', 'Ticket booked successfully!');
}

}
