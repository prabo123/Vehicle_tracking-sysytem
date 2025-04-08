<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuel Tracking System - Vehicle Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>

<!-- Sidebar -->
@include('layouts.slidebar')


<!-- Navbar -->
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

<!-- Main Content -->
<div class="main-content">
<div class="card-header bg-light"><b><h3 class="mb-0">Vehicle Details</h3></b></div>
</br>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#3085d6',
                timer: 3000
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

    <div class="card">
        <div class="card-body">
      

        <form action="{{ route('vehical_Details') }}" method="POST">

                @csrf
                @php
                    $currentYear = date('Y');
                    $startYear = 1945;
                @endphp

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vehicle_type" class="form-label fw-bold">Vehicle Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="vehicle_type" name="vehicle_type" required>
                            <option value="">Select Vehicle Type</option>
                            <option value="Car">Car</option>
                            <option value="Lorry">Lorry</option>
                            <option value="Bus">Bus</option>
                            <option value="Van">Van</option>
                            <option value="Threewheel">Threewheel</option>
                            <option value="Bike">Bike</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select a vehicle type.</div>
                        <input type="text" class="form-control mt-2" id="other_vehicle_type" name="other_vehicle_type" placeholder="Enter Vehicle Type" style="display: none;">
                        <div class="invalid-feedback">Please enter your vehicle type.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="vehicle_model" class="form-label fw-bold">Vehicle Model <span class="text-danger">*</span></label>
                        <select class="form-select" id="vehicle_model" name="vehicle_model" required>
                            <option value="">Select Vehicle Model</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select a vehicle model.</div>
                        <input type="text" class="form-control mt-2" name="other_model" id="other_model_input" placeholder="Enter Vehicle Model" style="display: none;">
                        <div class="invalid-feedback">Please enter your vehicle model.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="year_manufacture" class="form-label fw-bold">Year of Manufacture <span class="text-danger">*</span></label>
                        <select class="form-select" id="year_manufacture" name="year_manufacture" required>
                            <option value="">Select Year</option>
                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <div class="invalid-feedback">Please select the year of manufacture.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="year_registration" class="form-label fw-bold"><span class="text-danger">*</span></label>
                        <select class="form-select" id="year_registration" name="year_registration" required>
                            <option value="">Select Year</option>
                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <div class="invalid-feedback">Please select the year of registration.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="assign_date" class="form-label fw-bold">Year of Assigned to Pool <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="assign_date" name="assign_date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="vehicle_number" class="form-label fw-bold">Vehicle Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fuel_type" class="form-label fw-bold">Fuel Type <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fuel_type" name="fuel_type" required>
                    </div>
                    <div class="col-md-6">
                        <label for="engine_capacity" class="form-label fw-bold">Engine Capacity (cc) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="engine_capacity" name="engine_capacity" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="revenue_license_year" class="form-label fw-bold">Revenue License Year <span class="text-danger">*</span></label>
                        <select class="form-select" id="revenue_license_year" name="revenue_license_year" required>
                            <option value="">Select Year</option>
                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <div class="invalid-feedback">Please select a valid revenue license year.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="security_capacity" class="form-label fw-bold">Seats Capacity <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="security_capacity" name="security_capacity" required>
                    </div>
                </div>

        <!-- Buttons -->
            <div class="text-start">
                <button type="submit" class="btn text-white me-2" style="background-color: rgb(10, 44, 139);">Save</button>
                <button type="button" class="btn text-white" style="background-color: rgb(10, 139, 32);">Edit</button>
                <button type="button" class="btn text-white" style="background-color: rgb(196, 13, 13);">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.userfooter')

<!-- Bootstrap & Validation Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<script>
    const selectModel = document.getElementById('vehicle_model');
    const inputOther = document.getElementById('other_model_input');

    selectModel.addEventListener('change', function () {
        if (this.value === 'Other') {
            selectModel.style.display = 'none';
            inputOther.style.display = 'block';
            inputOther.setAttribute('required', 'true');
        } else {
            inputOther.style.display = 'none';
            inputOther.removeAttribute('required');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const vehicleTypeSelect = document.getElementById('vehicle_type');
        const otherVehicleTypeInput = document.getElementById('other_vehicle_type');

        vehicleTypeSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                vehicleTypeSelect.style.display = 'none';
                otherVehicleTypeInput.style.display = 'block';
                otherVehicleTypeInput.setAttribute('required', 'required');
            } else {
                otherVehicleTypeInput.style.display = 'none';
                otherVehicleTypeInput.removeAttribute('required');
                otherVehicleTypeInput.value = '';
            }
        });
    });
</script>

</body>
</html>
