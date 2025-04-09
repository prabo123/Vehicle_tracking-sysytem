


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuel Tracking System - Driver Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
    <div class="card-header bg-light"><b><h3 class="mb-0">Driver Details</h3></b></div><br>

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
            <form action="{{ route('driver_Details') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">NIC <span class="text-danger">*</span></label>
                        <input type="text" name="nic" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Other ID</label>
                        <input type="text" name="other_id" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Driver License No <span class="text-danger">*</span></label>
                        <input type="text" name="license_no" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Mobile Number <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Home Number</label>
                        <input type="text" name="home_phone" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Passport Number</label>
                        <input type="text" name="passport" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Medical Category <span class="text-danger">*</span></label>
                        <select name="medical_category" class="form-select" required>
                            <option value="">Select Medical Category</option>
                            <option value="Fit">Fit</option>
                            <option value="Non-Fit">UnFit</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Driving Categories</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="driving_categories[]" value="High Vehicle" id="highVehicle">
                            <label class="form-check-label" for="highVehicle">High Vehicle</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="driving_categories[]" value="Heavy Vehicle" id="heavyVehicle">
                            <label class="form-check-label" for="heavyVehicle">Heavy Vehicle</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="driving_categories[]" value="Three Vehicle" id="threeVehicle">
                            <label class="form-check-label" for="threeVehicle">Three Vehicle</label>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-start">
                    <button type="submit" class="btn text-white me-2" style="background-color: rgb(10, 44, 139);">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!--footer-->
@include('layouts.userfooter')



</body>
</html>
