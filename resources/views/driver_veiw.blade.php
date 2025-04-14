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
    <div class="card-header bg-light"><b><h3 class="mb-0">Driver Details View</h3></b></div>
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

    
<div class="container mt-5">
    <h2 class="mb-4">All Driver Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Other ID</th>
                <th>License Number</th>
                <th>Mobile</th>
                <th>Home Phone</th>
                <th>Medical Category</th>
                <th>Driving Categories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->nic }}</td>
                    <td>{{ $driver->other_id ?? 'N/A' }}</td>
                    <td>{{ $driver->license_no }}</td>
                    <td>{{ $driver->mobile }}</td>
                    <td>{{ $driver->home_phone }}</td>
                    <td>{{ $driver->medical_category }}</td>
                    <td>{{ $driver->driving_categories }}</td>
                    <td>
                        <a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('driver.destroy', $driver->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this driver?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No driver records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>



@include('layouts.userfooter')
</body>
</html>

