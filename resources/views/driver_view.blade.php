<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuel Tracking System - Driver Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 & Icons -->
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
<div class="main-content p-4 mt-5">
    <div class="card-header bg-light mb-3">
        <h3 class="mb-0"><b>Driver Details View</b></h3>
    </div>

    <!-- SweetAlert for success -->
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
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Other ID</th>
                    <th>License Number</th>
                    <th>Mobile</th>
                    <th>Home Phone</th>
                    <th>Medical Category</th>
                    <th>Driving Categories</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($drivers as $index => $driver)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->nic }}</td>
                        <td>{{ $driver->other_id ?? 'N/A' }}</td>
                        <td>{{ $driver->license_no }}</td>
                        <td>{{ $driver->mobile }}</td>
                        <td>{{ $driver->home_phone }}</td>
                        <td>{{ $driver->medical_category }}</td>
                        <td>{{ $driver->driving_categories }}</td>

                        <!-- View Button -->
                        <td>
                            <a href="{{ route('driver.show', $driver->id) }}" class="btn btn-sm btn-success">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>

                        <!-- Edit Button -->
                        <td>
                            <a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </td>

                        <!-- Delete Button -->
                        <td>
                            <form action="{{ route('driver.destroy', $driver->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this driver?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">No driver records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
@include('layouts.userfooter')

</body>
</html>

