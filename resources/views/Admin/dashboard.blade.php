<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuel Tracking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Sidebar -->
@include('layouts.slidebar')

<!-- Navbar (after sidebar) -->
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
    <h2 class="mb-4">Welcome to the Admin Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white p-4 text-center">
                <h4>Total Vehicles</h4>
                <h2>{{ $totalVehicles }}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white p-4 text-center">
                <h4>Total Drivers</h4>
                <h2>{{ $totalDrivers }}</h2>
            </div>
        </div>
    </div>

    <h4 class="mt-5">Vehicle Types Distribution</h4>
    <canvas id="vehiclePieChart" height="120"></canvas>
</div>

<!-- Chart Script -->
<script>
    const ctx = document.getElementById('vehiclePieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($vehicleTypes->keys()) !!},
            datasets: [{
                label: 'Vehicle Types',
                data: {!! json_encode($vehicleTypes->values()) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(99, 255, 132, 0.7)'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
