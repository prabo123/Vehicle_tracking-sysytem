<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(17, 38, 101);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        }

        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-blue {
            background-color: #007bff;
            color: white;
            width: 100%;
        }

        .btn-facebook {
            background-color: #3b5998;
            color: white;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-google {
            background-color: white;
            color: #000;
            border: 1px solid #ccc;
            width: 100%;
        }

        .separator {
            text-align: center;
            margin: 15px 0;
        }

        .separator::before,
        .separator::after {
            content: '';
            display: inline-block;
            width: 40%;
            height: 1px;
            background: #ccc;
            vertical-align: middle;
            margin: 0 10px;
        }

        .text-center small a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="signup-form">
    <h2>Signup</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('signup.page') }}">
        @csrf

        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter your Name" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Create password" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
        </div>

        <button type="submit" class="btn btn-blue">Signup</button>
    </form>

    <div class="text-center mt-3">
       <small>Already have an account? <a href="">Login</a></small>

    </div>

    <div class="separator">Or</div>

    <button class="btn btn-facebook mb-2"><i class="bi bi-facebook me-2"></i> Login with Facebook</button>
    <button class="btn btn-google"><i class="bi bi-google me-2"></i> Login with Google</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
