
<!-- resources/views/seat-allocations/create.blade.php -->
@extends('master')

@section('content')
    <h2>Create Ticket Booking</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

        <div class="mb-2">
            {{-- <label for="disabledTextInput" class="form-label">Passenger name</label> --}}
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Passenger name" name="name" required>
        </div>

        <div class="mb-2">
            {{-- <label for="disabledTextInput" class="form-label">Passenger phone</label> --}}
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Passenger phone" name="phone" required>
        </div>

        <div class="mb-2">
            {{-- <label for="disabledSelect" class="form-label">Select destination</label> --}}
            <select id="disabledSelect" class="form-select" name="destination" required>
              <option>Dhak to Coxsbazar</option>
              <option>Coxsbazar to Dhaka</option>
            </select>
          </div>


        <div class="mb-2">
            {{-- <label for="disabledTextInput" class="form-label">Ticket quantity</label> --}}
            <input type="number" id="disabledTextInput" class="form-control" placeholder="Ticket quantity" name="ticket_quantity" required>
        </div>


        <div class="mb-2">
            {{-- <label for="disabledTextInput" class="form-label">Ticket quantity</label> --}}
            <input type="number" id="disabledTextInput" class="form-control" placeholder="Ticket price" name="price" required>
        </div>

        <div class="mb-2">
            {{-- <label for="disabledTextInput" class="form-label">Buss start time</label> --}}
            <input type="time" id="disabledTextInput" class="form-control" placeholder="Buss start time" name="bus_start_time" required>
        </div>

        <button type="submit">Create Seat Allocation</button>
    </form>
@endsection

