@extends('layouts.slidebar')

@section('content')
<div class="container mt-5 pt-4">
    <div class="card">
        <div class="card-header bg-light">
            <h4 class="mb-0">Vehicle Detail View</h4>
        </div>
        <div class="card-body">
            <p><strong>Vehicle Number:</strong> {{ $vehicle->vehicle_number }}</p>
            <p><strong>Type:</strong> {{ $vehicle->vehicle_type }}</p>
            <p><strong>Model:</strong> {{ $vehicle->vehicle_model ?? $vehicle->other_model }}</p>
            <p><strong>Year of Manufacture:</strong> {{ $vehicle->year_manufacture }}</p>
            <p><strong>Year of Registration:</strong> {{ $vehicle->year_registration }}</p>
            <p><strong>Assign Date:</strong> {{ $vehicle->assign_date }}</p>
            <p><strong>Fuel Type:</strong> {{ $vehicle->fuel_type }}</p>
            <p><strong>Engine Capacity:</strong> {{ $vehicle->engine_capacity }}</p>
            <p><strong>Revenue License Year:</strong> {{ $vehicle->revenue_license_year }}</p>
            <p><strong>Seats:</strong> {{ $vehicle->security_capacity }}</p>
            <a href="{{ route('vehicle.view') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
