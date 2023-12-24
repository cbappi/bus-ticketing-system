<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        return view('trips.index');
    }

    public function search(Request $request)
    {
        $trip = Trip::where('trip_date', $request->trip_date)
            ->where('from', $request->from)
            ->where('to', $request->to)
            ->first();

        if ($trip) {
            return view('trips.show', ['trip' => $trip]);
        } else {
            return view('trips.not-found');
        }
    }
}
