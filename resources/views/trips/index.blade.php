<!-- resources/views/trip/index.blade.php -->
@extends('master')

@section('content')

<form action="{{ route('trip.search') }}" method="post">
    @csrf
    <label for="trip_date">Trip Date:</label>
    <input type="date" name="trip_date" required>

    <label for="from">From:</label>
    <input type="text" name="from" required>

    <label for="to">To:</label>
    <input type="text" name="to" required>

    <button type="submit">Search Trip</button>
</form>

@endsection

