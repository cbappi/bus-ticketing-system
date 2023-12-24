<!-- resources/views/seat_allocations/create.blade.php -->

@extends('master')

@section('content')
    <div class="container">
        <h2>Create Seat Allocation</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('allocation.store') }}">
            @csrf

            <div class="form-group">
                <label for="trip_id">Trip:</label>
                <select name="trip_id" class="form-control" required>
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->from }} to {{ $trip->to }} ({{ $trip->trip_date }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="location_id">Location:</label>
                <select name="location_id" class="form-control" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->destination }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="user_name">User Name:</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ticket_number">Ticket Number:</label>
                <select name="ticket_number" class="form-control" required>
                    @for($i = 1; $i <= 36; $i++)
                        @if(!in_array($i, $soldTickets))
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="ticket_price">Ticket Price:</label>
                <input type="number" name="ticket_price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bus_start_time">Bus Start Time:</label>
                <input type="time" name="bus_start_time" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
