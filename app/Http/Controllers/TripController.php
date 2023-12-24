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

    public function create()
    {
        return view('trips.create');
    }

    public function tripdetails()
    {
        $trips = Trip::all();
        return view('trips.trip-details', compact('trips'));
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'trip_date' => 'required|date',
            'from' => 'required|string',
            'to' => 'required|string',
            'start_time' => 'nullable|date_format:H:i',
            'expected_reach_time' => 'nullable|date_format:H:i',
        ]);

        Trip::create($request->all());
        return redirect()->route('trip.tripdetails');

       // return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
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

    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'trip_date' => 'required|date',
            'from' => 'required|string',
            'to' => 'required|string',
            'sit_quantity' => 'required|integer',
            'start_time' => 'nullable|date_format:H:i:s',

        ]);

        $trip->update($request->all());

        return redirect()->route('trip.details')->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trip.tripdetails')->with('success', 'Trip deleted successfully.');

    }
}
