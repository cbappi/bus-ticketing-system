@extends('master')

@section('content')
    <div class="container">
        <h2>Edit Trip</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('trips.update', $trip->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="trip_date">Trip Date:</label>
                <input type="date" id="trip_date" name="trip_date" class="form-control" value="{{ $trip->trip_date }}" required>
            </div>

            <div class="form-group">
                <label for="from">From:</label>
                <input type="text" id="from" name="from" class="form-control" value="{{ $trip->from }}" required>
            </div>

            <div class="form-group">
                <label for="to">To:</label>
                <input type="text" id="to" name="to" class="form-control" value="{{ $trip->to }}" required>
            </div>


            <div class="form-group">
                <label for="to">Sit quantity:</label>
                <input type="text" id="sit_quantity" name="sit_quantity" class="form-control" value="{{ $trip->sit_quantity }}" required>
            </div>

            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" value="{{ $trip->start_time }}">
            </div>

       

            <button type="submit" class="btn btn-primary">Update Trip</button>
        </form>
    </div>
@endsection
