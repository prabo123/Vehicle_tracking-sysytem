<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Defence Research')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .top-bar {
            background-color:  #003B5C;
            color: white;
            padding: 10px 0;
        }

        .top-bar img {
            height: 60px;
        }

        .nav-bar {
            background-color:  #f7941e;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .search-box {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .search-box input {
            border-radius: 5px 0 0 5px;
        }

        .search-box button {
            border-radius: 0 5px 5px 0;
            background-color: #a01c1c;
            border: none;
            padding: 0.375rem 0.75rem;
        }
        .hero-background {
            background-image: url('https://v3smarttech.com/wp-content/uploads/2022/10/Improve-your-fuel-efficiency-with-a-GPS-tracking-system.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 620px;
            display: flex;
           
           
        }
    </style>
</head>
<body>

<!-- Top Bar -->
<div class="top-bar d-flex justify-content-between align-items-center px-4">
    <div class="d-flex align-items-center">
        <img src="{{ asset('images/mod.png') }}" alt="mod" class="me-2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="me-3">
        <div>
            <h4 class="mb-0 fw-bold"><span style="color: #fff">Fuel Tracking System</span></h4>
            <small>Ministry of Defence</small>
        </div>
    </div>

    <!-- Search -->
    <div class="search-box">
        <form action="#" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-light"><i class="bi bi-search text-white"></i></button>
        </form>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="#">SignUp</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
        </ul>
    </div>
</div>

<!-- Navigation Bar -->
<nav class="nav-bar">
    <div class="container d-flex justify-content-between">
        <ul class="nav">
            <li class="nav-item"><a class="" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Driver</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Vehical</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        
        </ul>
    </div>
</nav>

<div class="hero-background"></div>     
@include('layouts.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

