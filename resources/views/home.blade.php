@extends('master')

@section('content')
    <div class="container">


        @if(isset($message))
            <div class="alert alert-info">{{ $message }}</div>

            @if($trip)
                <!-- Display "Book Ticket" button if trip is available -->
                <form action="{{ route('allocation.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success">Book Ticket</button>
                </form>
            @endif
        @endif
        <h2>For Getting Available Trip, Please make Search</h2>

        <form action="{{ route('home') }}" method="GET">
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

            <button type="submit" class="btn btn-primary">Search Trip</button>
        </form>
    </div>
@endsection
