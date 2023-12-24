@extends('master')


@section('content')
    <div class="container">
        <h2>Trips List</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Trip Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Sit Quantity</th>
                    <th>Start Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trips as $trip)
                    <tr>
                        <td>{{ $trip->trip_date }}</td>
                        <td>{{ $trip->from }}</td>
                        <td>{{ $trip->to }}</td>
                        <td>{{ $trip->sit_quantity }}</td>
                        <td>{{ $trip->start_time }}</td>
                        <td>


                            <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this trip?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection







