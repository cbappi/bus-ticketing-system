<!-- resources/views/seat-allocations/index.blade.php -->
@extends('master')

@section('content')
    <h1>Trip details</h1>

    <table class = "table">
        <thead>
            <tr>
                <th>Trip id</th>
                <th>Trip date</th>
                <th>From</th>
                <th>To</th>
                <th>Crrent Sit Quantity</th>
                <th>Start time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trips as $trip)
                <tr>
                    <td>{{ $trip->id }}</td>
                    <td>{{ $trip->trip_date }}</td>
                    <td>{{ $trip->from }}</td>
                    <td>{{ $trip->to }}</td>
                    <td>{{ $trip->sit_quantity }}</td>
                    <td>{{ $trip->start_time }}</td>



                <td>
                        <a href="{{ route('trip.edit', $trip->id) }}">Edit</a>
                        <form action="{{ route('trip.destroy', $trip->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                </td>
            @empty
                <tr>
                    <td colspan="10">No seat allocations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a class = "btn button btn-info" href="{{ route('seat-allocations.create') }}">Create Seat Allocation</a>
    <a class = "btn button btn-info" href="{{ route('trip.create') }}">Add Trip</a>
@endsection


