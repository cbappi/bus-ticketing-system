<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SeatAllocation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Get today's total amount
          $todayTotal = SeatAllocation::whereDate('trip_date', Carbon::today())->sum('ticket_quantity');

          // Get yesterday's total amount
          $yesterdayTotal = SeatAllocation::whereDate('trip_date', Carbon::yesterday())->sum('ticket_quantity');

          // Get this month's total amount
          $thisMonthTotal = SeatAllocation::whereYear('trip_date', Carbon::now()->year)
              ->whereMonth('trip_date', Carbon::now()->month)
              ->sum('amount');

          // Get last month's total amount
          $lastMonthTotal =SeatAllocation::whereYear('trip_date', Carbon::now()->subMonth()->year)
              ->whereMonth('trip_date', Carbon::now()->subMonth()->month)
              ->sum('amount');

          return view('dashboard.index', compact('todayTotal', 'yesterdayTotal', 'thisMonthTotal', 'lastMonthTotal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
