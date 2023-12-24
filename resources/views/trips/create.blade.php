@extends('master')

@section('content')
    <div class="container">
        <h2>Create a New Trip</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('trips.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="trip_date">Trip Date:</label>
                <input type="date" id="trip_date" name="trip_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="from">From:</label>
                <input type="text" id="from" name="from" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="to">To:</label>
                <input type="text" id="to" name="to" class="form-control" required>
            </div>


            <div class="form-group">
                <label for="trip_date">Sit quantity:</label>
                <input type="number" id="sit_quantity" name="sit_quantity" class="form-control" required value="sit_quantity">
            </div>

            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Create Trip</button>
        </form>
    </div>
@endsection
