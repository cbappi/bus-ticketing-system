<!-- resources/views/seat_allocations/create.blade.php -->

@extends('master')

@section('content')
    <!-- resources/views/seat-allocations/create.blade.php -->

    <h1>Create Seat Allocation</h1>

    <form action="{{ route('seat-allocations.store') }}" method="post">
        @csrf

        <label for="trip_id">Trip:</label>
        <select name="trip_id" id="trip_id" required>
            @foreach($trips as $trip)
                <option value="{{ $trip->id }}">{{ $trip->from }} to {{ $trip->to }} - {{ $trip->trip_date }}</option>
            @endforeach
        </select>

        <label for="trip_date">Trip Date:</label>
        <input type="date" name="trip_date" required>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="destination">Destination:</label>
        <input type="text" name="destination" required>

        <label for="ticket_quantity">Ticket Quantity:</label>
        <input type="number" name="ticket_quantity" required>

        <label for="price">Price:</label>
        <input type="number" name="price" required>

        <label for="amount">Amount:</label>
        <input type="number" name="amount" required>

        <label for="bus_start_time">Bus Start Time:</label>
        <input type="time" name="bus_start_time" required>

        <button type="submit">Create Seat Allocation</button>
    </form>
@endsection


