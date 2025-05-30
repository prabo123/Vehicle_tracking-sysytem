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

<!--Main Content-->
<div class="main-content p-4 mt-5">
    <div class="card-header bg-light"><b><h3 class="mb-0">Vehicle Details View</h3></b></div>
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
                    <th>Action</th>
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
                        <button class="btn btn-sm btn-success" title="View"
                            data-bs-toggle="modal" data-bs-target="#vehicleModal"
                            data-id="{{ $vehicle->id }}"
                            data-vehicle_number="{{ $vehicle->vehicle_number }}"
                            data-vehicle_type="{{ $vehicle->vehicle_type }}"
                            data-vehicle_model="{{ $vehicle->vehicle_model ?? $vehicle->other_model }}"
                            data-year_manufacture="{{ $vehicle->year_manufacture }}"
                            data-year_registration="{{ $vehicle->year_registration }}"
                            data-assign_date="{{ $vehicle->assign_date }}"
                            data-fuel_type="{{ $vehicle->fuel_type }}"
                            data-engine_capacity="{{ $vehicle->engine_capacity }}"
                            data-revenue_license_year="{{ $vehicle->revenue_license_year }}"
                            data-security_capacity="{{ $vehicle->security_capacity }}"
                            onclick="populateVehicleModal(this, 'view')">
                            <i class="bi bi-eye"></i> View
                        </button>

                        <button class="btn btn-sm btn-primary" title="Edit"
                            data-bs-toggle="modal" data-bs-target="#vehicleModal"
                            data-id="{{ $vehicle->id }}"
                            data-vehicle_number="{{ $vehicle->vehicle_number }}"
                            data-vehicle_type="{{ $vehicle->vehicle_type }}"
                            data-vehicle_model="{{ $vehicle->vehicle_model ?? $vehicle->other_model }}"
                            data-year_manufacture="{{ $vehicle->year_manufacture }}"
                            data-year_registration="{{ $vehicle->year_registration }}"
                            data-assign_date="{{ $vehicle->assign_date }}"
                            data-fuel_type="{{ $vehicle->fuel_type }}"
                            data-engine_capacity="{{ $vehicle->engine_capacity }}"
                            data-revenue_license_year="{{ $vehicle->revenue_license_year }}"
                            data-security_capacity="{{ $vehicle->security_capacity }}"
                            onclick="populateVehicleModal(this, 'edit')">
                            <i class="bi bi-pencil"></i> Edit
                        </button>

                        <button class="btn btn-sm btn-danger" title="Delete"
                            onclick="deleteVehicle({{ $vehicle->id }})">
                            <i class="bi bi-trash"></i> Delete
                        </button>
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

<!-- Modal -->
<div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form id="vehicleModalForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vehicle Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row">
                <input type="hidden" id="modal_vehicle_id">
                @foreach(['vehicle_number', 'vehicle_type', 'vehicle_model', 'year_manufacture', 'year_registration', 'assign_date', 'fuel_type', 'engine_capacity', 'revenue_license_year', 'security_capacity'] as $field)
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">{{ str_replace('_', ' ', $field) }}</label>
                        <input type="text" class="form-control" id="modal_{{ $field }}" name="{{ $field }}">
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
  </div>
</div>

<script>
function populateVehicleModal(button, mode) {
    const id = button.getAttribute('data-id');
    document.getElementById('modal_vehicle_id').value = id;
    document.getElementById('vehicleModalForm').action = `/vehical/${id}`;

    [
        'vehicle_number', 'vehicle_type', 'vehicle_model', 'year_manufacture',
        'year_registration', 'assign_date', 'fuel_type', 'engine_capacity',
        'revenue_license_year', 'security_capacity'
    ].forEach(field => {
        const input = document.getElementById(`modal_${field}`);
        input.value = button.getAttribute(`data-${field}`);
        input.readOnly = (mode === 'view');
    });

    document.querySelector('#vehicleModalForm button[type="submit"]').style.display = (mode === 'view') ? 'none' : 'inline-block';
    document.getElementById('modalDeleteButton').style.display = (mode === 'view') ? 'none' : 'inline-block';

    document.getElementById('modalDeleteButton').onclick = function () {
        deleteVehicle(id);
    };
}

function deleteVehicle(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/vehical/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(res => {
                if (res.ok) {
                    Swal.fire('Deleted!', 'Vehicle has been deleted.', 'success')
                        .then(() => location.reload());
                } else {
                    throw new Error('Failed to delete');
                }
            }).catch(err => {
                Swal.fire('Error!', err.message, 'error');
            });
        }
    });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.userfooter')
</body>
</html>
