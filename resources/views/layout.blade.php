<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Tracking System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .navbar-brand h2 {
            margin: 0;
        }

        .sidebar {
            width: 200px;
            background-color: rgb(40, 22, 8);
            position: fixed;
            top: 56px; /* Adjust according to navbar height */
            bottom: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: rgb(16, 102, 128);
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
            padding-top: 80px;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                top: 0;
            }

            .main-content {
                margin-left: 0;
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h2>Fuel Tracking System</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="active" href="#dashboard">Dashboard</a>
        <a href="#vehical_Details.blade.php">Vehicle Details</a>
        <a href="#">Driver Details</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome to Fuel Tracking System</h1>
     
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>