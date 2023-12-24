<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Trip;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        return redirect()->route('trip.index');

       // return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'trip_date' => 'required|date',
            'from' => 'required|string',
            'to' => 'required|string',
            'start_time' => 'nullable|date_format:H:i:s',
            'expected_reach_time' => 'nullable|date_format:H:i:s',
        ]);

        $trip->update($request->all());

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');

    }
}
