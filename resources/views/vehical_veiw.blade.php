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

<!--Main Content--->
<div class="main-content">
<div class="card-header bg-light"><b><h3 class="mb-0">Vehicle Details Veiw </h3></b></div>
</br>
<hr>

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

<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Vehicle Number</th>
                <th>Type</th>
                <th>Model</th>
                <th>Year of Manufacture</th>
                <th>Year of Registration</th>
                <th>Assign Date</th>
                <th>Fuel Type</th>
                <th>Engine Capacity</th>
                <th>Revenue License Year</th>
                <th>Seats</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vehicles as $index => $vehicle)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $vehicle->vehicle_number }}</td>
                <td>{{ $vehicle->vehicle_type }}</td>
                <td>{{ $vehicle->vehicle_model ?? $vehicle->other_model }}</td>
                <td>{{ $vehicle->year_manufacture }}</td>
                <td>{{ $vehicle->year_registration }}</td>
                <td>{{ $vehicle->assign_date }}</td>
                <td>{{ $vehicle->fuel_type }}</td>
                <td>{{ $vehicle->engine_capacity }}</td>
                <td>{{ $vehicle->revenue_license_year }}</td>
                <td>{{ $vehicle->security_capacity }}</td>
                
            <td>
                <div class="d-grid gap-2">
                    <a href="{{ route('vehical.edit', $vehicle->id) }}" class="btn btn-sm btn-primary">Edit</a>    <td>
                    <form action="{{ route('vehical.update', $vehicle->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>    </td>
                    </form>
                </div>
            </td>

            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">No vehicle records found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>
    </div>


@include('layouts.userfooter')
</body>
</html>