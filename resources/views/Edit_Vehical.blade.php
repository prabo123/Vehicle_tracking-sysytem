@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="card-header bg-light"><h3>Edit Vehicle Details</h3></div>
    <br>

    <!-- SweetAlert Messages -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session("success") }}',
                timer: 3000,
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    <div class="card p-4">
        <form action="{{ route('vehical.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Vehicle Number</label>
                <input type="text" name="vehicle_number" class="form-control @error('vehicle_number') is-invalid @enderror" value="{{ old('vehicle_number', $vehicle->vehicle_number) }}" required>
                @error('vehicle_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Vehicle Type</label>
                <input type="text" name="vehicle_type" class="form-control @error('vehicle_type') is-invalid @enderror" value="{{ old('vehicle_type', $vehicle->vehicle_type) }}" required>
                @error('vehicle_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Vehicle Model</label>
                <input type="text" name="vehicle_model" class="form-control" value="{{ old('vehicle_model', $vehicle->vehicle_model) }}">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Year of Manufacture</label>
                    <input type="number" name="year_manufacture" class="form-control" value="{{ old('year_manufacture', $vehicle->year_manufacture) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Year of Registration</label>
                    <input type="number" name="year_registration" class="form-control" value="{{ old('year_registration', $vehicle->year_registration) }}">
                </div>
            </div><br>

            <div class="mb-3">
                <label class="form-label">Assign Date</label>
                <input type="date" name="assign_date" class="form-control" value="{{ old('assign_date', $vehicle->assign_date) }}">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Fuel Type</label>
                    <input type="text" name="fuel_type" class="form-control" value="{{ old('fuel_type', $vehicle->fuel_type) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Engine Capacity</label>
                    <input type="number" name="engine_capacity" class="form-control" value="{{ old('engine_capacity', $vehicle->engine_capacity) }}">
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Revenue License Year</label>
                    <input type="number" name="revenue_license_year" class="form-control" value="{{ old('revenue_license_year', $vehicle->revenue_license_year) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Seats Capacity</label>
                    <input type="number" name="security_capacity" class="form-control" value="{{ old('security_capacity', $vehicle->security_capacity) }}">
                </div>
            </div><br>

            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('vehicle.view') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
