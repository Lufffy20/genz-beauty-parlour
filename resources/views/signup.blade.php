<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenZ | Login & Signup</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background-image: url('{{ asset('images/login-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container .form-control {
            border-radius: 5px;
            padding: 12px;
            border: 1px solid #ccc;
        }

        .form-container .form-control:focus {
            border-color: #ffcc00 !important;
            box-shadow: 0 0 5px rgba(255, 204, 0, 0.5);
            outline: none;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #555;
            font-size: 18px;
        }

        .form-container .btn {
            border-radius: 5px;
            background: #ffcc00;
            color: black;
            font-weight: bold;
            padding: 12px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .form-container .btn:hover {
            background: #ff9900;
            transform: scale(1.05);
        }

        .toggle-form {
            margin-top: 15px;
            font-size: 14px;
        }

        .toggle-form a {
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .toggle-form a:hover {
            color: #ff9900;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container" id="loginForm">
        <h2>Create Account</h2>

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/storedata1') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <input type="text" class="form-control" placeholder="Full Name" name="name"
                       value="{{ old('name', $user->name ?? '') }}" required>
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>

            <div class="form-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email"
                       value="{{ old('email', $user->email ?? '') }}" required>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            @if (!isset($user))
                <div class="form-group mb-3 password-wrapper">
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">👁</span>
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>

                <div class="form-group mb-3 password-wrapper">
                    <input type="password" id="confirm_password" class="form-control" placeholder="Re-enter Password" name="password_confirmation" required>
                    <span class="toggle-password" onclick="togglePassword('confirm_password')">👁</span>
                </div>
            @endif

            <button type="submit" class="btn">Send Verification Code</button>

            <div class="toggle-form">
                <p>Already have an account? <a href="{{ url('/login') }}">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            field.type = field.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>
</html>
