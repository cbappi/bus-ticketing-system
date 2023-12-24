<!-- resources/views/trip/show.blade.php -->
@extends('master')

@section('content')
    <h1>Trip Found</h1>
    <p>Available Sit Quantity: {{ $trip->sit_quantity }}</p>
@endsection
