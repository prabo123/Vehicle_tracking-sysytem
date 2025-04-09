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

    <style>
        .main-content {
            margin-left: 220px;
            padding: 80px 20px 20px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding-top: 100px;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

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
<div class="main-content flex-grow-1">
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
    <div class="card p-3" style="width: 400px;">
        <canvas id="vehiclePieChart" width="300" height="300" style="max-width: 100%; height: auto;"></canvas>
    </div>
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
                    'rgba(233, 13, 61, 0.8)',     // Red
                    'rgba(12, 241, 241, 0.8)',     // Green
                    'rgba(10, 86, 136, 0.8)',     // Blue
                    'rgba(77, 183, 77, 0.8)',     // Pink
                    'rgba(244, 164, 5, 0.97)',     // Yellow
                    'rgba(244, 127, 10, 0.8)',     // Orange
                    'rgba(146, 9, 244, 0.8)'      // Purple
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#000',
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer -->
@include('layouts.userfooter')

</body>
</html>
