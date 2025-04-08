@extends('layouts.app') {{-- If you're using a layout --}}
@section('content')
<div class="container mt-5 text-center">
    <h3 class="mb-4">What would you like to add?</h3>

    <a href="{{ url('/vehical_Details') }}" class="btn btn-primary btn-lg m-2">
        <i class="bi bi-truck-front"></i> Vehicle Details
    </a>

    <a href="{{ url('/driver_Details') }}" class="btn btn-success btn-lg m-2">
        <i class="bi bi-person-badge"></i> Driver Details
    </a>
</div>
@endsection
