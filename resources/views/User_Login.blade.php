<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #3366ff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        }

        .login-form h2 {
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

<div class="login-form">
    <h2>Login</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.page') }}">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="mb-2 text-end">
            <a href="#" class="text-primary small">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-blue">Login</button>
    </form>

    <div class="text-center mt-3">
        <small>Don't have an account? <a href="{{ route('signup.page') }}">Signup</a></small>
    </div>

    <div class="separator">Or</div>

    <button class="btn btn-facebook mb-2"><i class="bi bi-facebook me-2"></i> Login with Facebook</button>
    <button class="btn btn-google"><i class="bi bi-google me-2"></i> Login with Google</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
