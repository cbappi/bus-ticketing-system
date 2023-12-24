<!-- resources/views/seat-allocations/index.blade.php -->
@extends('master')

@section('content')
    <h1>Seat Allocations</h1>

    <table class = "table">
        <thead>
            <tr>
                <th>Trip</th>
                <th>Date</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Destination</th>
                <th>Ticket Quantity</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Bus Start Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($seatAllocations as $seatAllocation)
                <tr>
                    <td>{{ $seatAllocation->trip->from }} to {{ $seatAllocation->trip->to }}</td>
                    <td>{{ $seatAllocation->trip_date }}</td>
                    <td>{{ $seatAllocation->name }}</td>
                    <td>{{ $seatAllocation->phone }}</td>
                    <td>{{ $seatAllocation->destination }}</td>
                    <td>{{ $seatAllocation->ticket_quantity }}</td>
                    <td>{{ $seatAllocation->price }}</td>
                    <td>{{ $seatAllocation->amount }}</td>
                    <td>{{ $seatAllocation->bus_start_time }}</td>
                    <td>
                        <a href="{{ route('seat-allocations.edit', $seatAllocation->id) }}">Edit</a>
                        <form action="{{ route('seat-allocations.destroy', $seatAllocation->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No seat allocations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('seat-allocations.create') }}">Create Seat Allocation</a>
@endsection
