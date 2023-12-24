<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class SeatAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $seatAllocations = SeatAllocation::with(['trip', 'location', 'user'])->get();
        $totalTickets = 36; // Adjust this based on your total number of tickets
        $soldTickets = $seatAllocations->count();

        return view('seat_allocations.index', compact('seatAllocations', 'totalTickets', 'soldTickets'));
    }


        // $seatAllocations = SeatAllocation::with(['trip', 'location', 'user'])->get();
        // // Assuming you have relationships defined in the SeatAllocation model for 'trip', 'location', and 'user'

        // return view('seat_allocations.index', compact('seatAllocations'));


    /**
     * Show the form for creating a new resource.
     */

     public function create()
     {
         $trips = Trip::all(); // You might want to fetch trips from the database
         //$locations = Location::all(); // You might want to fetch locations from the database

         return view('seat_allocations.create', compact('trips'));
     }

     public function store(Request $request)
     {
         $request->validate([
             'trip_id' => 'required',
             //'location_id' => 'required',
             'user_name' => 'required',
             'phone' => 'required|unique:seat_allocations',
             'ticket_number' => 'required|unique:seat_allocations',
             'ticket_price' => 'required',
             'bus_start_time' => 'nullable',
         ]);

         // Check if the ticket_number count is greater than 3
         if (SeatAllocation::where('ticket_number', $request->ticket_number)->count('ticket_number')>36){
             return redirect()->route('allocation.index')->with('error', 'All Seats are booked');
          }

         // Create the SeatAllocation record
         $seatAllocation = SeatAllocation::create($request->all());

         // Automatically insert data into the 'users' table
         $user = User::create([
             'seat_allocation_id' => $seatAllocation->id,
             'user_name' => $request->user_name,
             'phone' => $request->phone,
         ]);

         return redirect()->route('allocation.index')->with('success', 'Seat Allocation created successfully');
     }


    // public function create()
    // {
    //     $trips = Trip::all();
    //     $locations = Location::all();

    //     // Get the list of sold ticket numbers
    //     //$soldTickets = SeatAllocation::pluck('ticket_number')->toArray();

    //     return view('seat_allocations.create', compact('trips', 'locations'));
    // }

    // public function store(Request $request)
    // {

    //    // dd($request->all());

    //     $trips = Trip::all();
    //     $locations = Location::all();

    //     // Get the list of sold ticket numbers
    //     //$soldTickets = SeatAllocation::pluck('ticket_number')->toArray();

    //         $request->validate([
    //                      'trip_id' => 'required',
    //                      'location_id' => 'required',
    //                      'user_name' => 'required',
    //                      'phone' => 'required|unique:seat_allocations',
    //                      'ticket_number' => 'required|unique:seat_allocations',
    //                      'ticket_price' => 'required',
    //                      'bus_start_time' => 'nullable',
    //                  ]);


    //     // Check if the selected ticket number is already sold
    //     // if (in_array($request->ticket_number, $soldTickets)) {
    //     //     return redirect()->route('allocation.create')->with('error', 'This ticket is already sold.');
    //     // }

    //     // Your logic to store the SeatAllocation record and update the remaining ticket count...

    //     return redirect()->route('allocation.index')->with('success', 'Seat Allocation created successfully');
    // }


    /**
     * Store a newly created resource in storage.
     */


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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
