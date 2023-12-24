<!-- resources/views/seat-allocations/edit.blade.php -->
@extends('lmaster')

@section('content')
    <h1>Edit Seat Allocation</h1>

    <form action="{{ route('seat-allocations.update', $seatAllocation->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="trip_id">Trip:</label>
        <select name="trip_id" id="trip_id" required>
            @foreach($trips as $trip)
                <option value="{{ $trip->id }}" {{ $trip->id == $seatAllocation->trip_id ? 'selected' : '' }}>
                    {{ $trip->from }} to {{ $trip->to }} - {{ $trip->trip_date }}
                </option>
            @endforeach
        </select>

        <label for="trip_date">Trip Date:</label>
        <input type="date" name="trip_date" value="{{ $seatAllocation->trip_date }}" required>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $seatAllocation->name }}" required>

        <!-- Add other fields here with their corresponding values -->

        <button type="submit">Update Seat Allocation</button>
    </form>
@endsection
