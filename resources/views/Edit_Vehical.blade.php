<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Vehicle Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

@include('layouts.slidebar')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome User
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="main-content container mt-5 pt-5">
    <div class="card">
        <div class="card-header bg-light">
            <h3 class="mb-0">Edit Vehicle</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('vehical.update', $vehicle->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Vehicle Type</label>
                        <input type="text" class="form-control" name="vehicle_type" value="{{ $vehicle->vehicle_type }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Other Vehicle Type</label>
                        <input type="text" class="form-control" name="other_vehicle_type" value="{{ $vehicle->other_vehicle_type }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Vehicle Model</label>
                        <input type="text" class="form-control" name="vehicle_model" value="{{ $vehicle->vehicle_model }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Other Model</label>
                        <input type="text" class="form-control" name="other_model" value="{{ $vehicle->other_model }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Year of Manufacture</label>
                        <input type="number" class="form-control" name="year_manufacture" value="{{ $vehicle->year_manufacture }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Year of Registration</label>
                        <input type="number" class="form-control" name="year_registration" value="{{ $vehicle->year_registration }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Assign Date</label>
                        <input type="date" class="form-control" name="assign_date" value="{{ $vehicle->assign_date }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehicle_number" value="{{ $vehicle->vehicle_number }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Fuel Type</label>
                        <input type="text" class="form-control" name="fuel_type" value="{{ $vehicle->fuel_type }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Engine Capacity (cc)</label>
                        <input type="number" class="form-control" name="engine_capacity" value="{{ $vehicle->engine_capacity }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Revenue License Year</label>
                        <input type="number" class="form-control" name="revenue_license_year" value="{{ $vehicle->revenue_license_year }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Seats</label>
                        <input type="number" class="form-control" name="security_capacity" value="{{ $vehicle->security_capacity }}" required>
                    </div>
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-success">Update Vehicle</button>
                    <a href="{{ route('vehicle.view') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>

        </div>
    </div>
</div>

@include('layouts.userfooter')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


