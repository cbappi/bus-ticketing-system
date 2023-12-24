<?php

// app/Http/Controllers/SeatAllocationController.php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{

    public function index()
    {
        $seatAllocations = SeatAllocation::with('trip')->get();
        return view('seat_allocations.index', compact('seatAllocations'));
    }
    public function create()
    {
        // You can pass necessary data to the create view if needed
        $trips = Trip::all();
        return view('seat_allocations.create', compact('trips'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'trip_id' => 'required',
    //         'trip_date' => 'required',
    //         'name' => 'required',
    //         'phone' => 'required|unique:seat_allocations',
    //         'destination' => 'required',
    //         'ticket_quantity' => 'required|integer',
    //         'price' => 'required|integer',
    //         'amount' => 'required|integer',
    //         'bus_start_time' => 'nullable',
    //     ]);

    //     $seatAllocation = SeatAllocation::create($request->all());

    //     // Update the sit_quantity in the trips table
    //     $trip = Trip::find($request->trip_id);
    //     $trip->sit_quantity -= $request->ticket_quantity;
    //     $trip->save();

    //     return redirect()->route('seat-allocations.index')->with('success', 'Seat Allocation created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required',
            'trip_date' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:seat_allocations',
            'destination' => 'required',
            'ticket_quantity' => 'required|integer|max_tickets:' . $request->trip_id, // Custom validation rule
            'price' => 'required|integer',
            //'amount' => 'required|integer',
            'bus_start_time' => 'nullable',
        ]);

        $seatAllocation = SeatAllocation::create([
            'trip_id' => $request->trip_id,
            'trip_date' => $request->trip_date,
            'name' => $request->name,
            'phone' => $request->phone,
            'destination' => $request->destination,
            'ticket_quantity' => $request->ticket_quantity,
            'price' => $request->price,
            'amount' =>$request->ticket_quantity*$request->price,
            'bus_start_time' => $request->bus_start_time,
        ]);


       //$seatAllocation = SeatAllocation::create($request->all());

        // Update the sit_quantity in the trips table
        $trip = Trip::find($request->trip_id);
        $trip->sit_quantity -= $request->ticket_quantity;
        $trip->save();

        return redirect()->route('seat-allocations.index')->with('success', 'Seat Allocation created successfully.');
    }

    public function edit($id)
    {
        $seatAllocation = SeatAllocation::findOrFail($id);
        $trips = Trip::all();
        return view('seat_allocations.edit', compact('seatAllocation', 'trips'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'trip_id' => 'required',
            'trip_date' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:seat_allocations,phone,' . $id,
            'destination' => 'required',
            'ticket_quantity' => 'required|integer',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'bus_start_time' => 'nullable',
        ]);

        $seatAllocation = SeatAllocation::findOrFail($id);
        $seatAllocation->update($request->all());

        // Update the sit_quantity in the trips table
        $trip = Trip::find($request->trip_id);
        $trip->sit_quantity += ($seatAllocation->ticket_quantity - $request->ticket_quantity);
        $trip->save();

        return redirect()->route('seat-allocations.index')->with('success', 'Seat Allocation updated successfully.');
    }

    public function destroy($id)
    {
        $seatAllocation = SeatAllocation::findOrFail($id);

        // Update the sit_quantity in the trips table before deleting
        $trip = Trip::find($seatAllocation->trip_id);
        $trip->sit_quantity += $seatAllocation->ticket_quantity;
        $trip->save();

        $seatAllocation->delete();

        return redirect()->route('seat-allocations.index')->with('success', 'Seat Allocation deleted successfully.');
    }
}
