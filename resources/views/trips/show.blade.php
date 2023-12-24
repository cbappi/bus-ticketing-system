<!-- resources/views/trip/show.blade.php -->
@extends('master')

@section('content')
    <h1 class="text-primary">Trip Found</h1>
    <h2 class="text-primary">Available Sit Quantity: {{ $trip->sit_quantity }}</h2>
    {{-- <form action="{{ route('seat-allocations.store') }}" method="post"> --}}
    {{-- <button type="submit" class="btn" action="{{ route('seat-allocations.create') }}">Book ticket</button> --}}
    <a href="{{ route('seat-allocations.create') }}" class="btn btn-primary" tabindex="-1" role="button">Book ticket</a>

@endsection
