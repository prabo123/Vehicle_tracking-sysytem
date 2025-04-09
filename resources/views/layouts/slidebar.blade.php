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

    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            width: 220px;
            background-color: rgb(34, 11, 93);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
            z-index: 1040;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar img {
            width: 100px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 14px 20px;
            text-decoration: none;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: rgb(10, 44, 139);
        }

        .navbar {
            margin-left: 220px;
            z-index: 1030;
        }

        .main-content {
            margin-left: 220px;
            padding: 80px 20px 20px;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                top: 0;
            }

            .navbar, .main-content {
                margin-left: 0;
            }

            .main-content {
                padding-top: 100px;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <!-- Dashboard -->
    <a href="{{ url('admin/dashboard') }}" class="nav_link {{ Request::is('admin/dashboard') ? 'active fw-bold text-white' : '' }}">
        <i class="bi bi-house-door nav_icon"></i>
        <span class="nav_name">Dashboard</span>
    </a>

    <!-- Add Details Dropdown (Collapse Menu) -->
    <a href="#addDetailsSubmenu" class="nav_link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="addDetailsSubmenu">
        <i class="bi bi-truck-front nav_icon"></i>
        <span class="nav_name">Add Details ▼</span>
    </a>
    <div class="collapse {{ Request::is('vehical_Details') || Request::is('driver_Details') ? 'show' : '' }}" id="addDetailsSubmenu">
        <a href="{{ route('vehical_Details') }}" class="nav_link {{ Request::is('vehical_Details') ? 'active fw-bold text-white' : '' }}">
            <i class="bi bi-truck nav_icon"></i>
            <span class="nav_name">Vehicle Details</span>
        </a>
        <a href="{{ route('driver_Details') }}" class="nav_link {{ Request::is('driver_Details') ? 'active fw-bold text-white' : '' }}">
            <i class="bi bi-person-badge nav_icon"></i>
            <span class="nav_name">Driver Details</span>
        </a>
    </div>

    <!-- View Details Dropdown (Collapse Menu) -->
    <a href="#viewDetailsSubmenu" class="nav_link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="viewDetailsSubmenu">
        <i class="bi bi-eye nav_icon"></i>
        <span class="nav_name">View Details ▼</span>
    </a>
    <div class="collapse {{ Request::is('vehicle/view') || Request::is('driver/view') ? 'show' : '' }}" id="viewDetailsSubmenu">
        <a href="{{ route('vehicle.view') }}" class="vehical_Details.blade.php {{ Request::is('vehicle/view') ? 'active fw-bold text-white' : '' }}">
            <i class="bi bi-truck nav_icon"></i>
            <span class="nav_name">Vehicle View</span>
        </a>

    <!-- Driver View -->
    <a href="{{ route('driver.view') }}" class="driver_veiw.blade.php {{ Request::is('driver/view') ? 'active fw-bold text-white' : '' }}">
        <i class="bi bi-person-badge nav_icon"></i>
        <span class="nav_name">Driver View</span>
    </a>  
    </div>

    <!-- Settings -->
    <a href="#" class="nav_link">
        <i class="bi bi-gear nav_icon"></i>
        <span class="nav_name">Settings</span>
    </a>

    <!-- Logout -->
    <a href="#" class="nav_link">
        <i class="bi bi-box-arrow-right nav_icon"></i>
        <span class="nav_name">Logout</span>
    </a>
</div>





</body>
</html>

