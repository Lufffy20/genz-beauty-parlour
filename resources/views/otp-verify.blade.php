<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP & Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <style>
        body {
            background-image: url('/images/login-bg.jpg');
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
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .btn {
            background-color: #ffcc00;
            border: none;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #ff9900;
            transform: scale(1.05);
        }

        .text-danger {
            font-size: 0.9rem;
            text-align: left;
        }

        .note {
            font-size: 0.85rem;
            color: #777;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn-resend {
            background-color: #f0f0f0;
            color: #333;
        }

        .btn-resend:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>{{ session('show_password_form') ? 'Reset Password' : 'Enter OTP' }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/verify-otp') }}">
        @csrf

        @if(!session('show_password_form'))
        <div class="form-group mb-3">
            <input type="text" name="otp" class="form-control" placeholder="Enter OTP" value="{{ old('otp') }}" required>
            @error('otp') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="note">OTP is valid for only 1 minute.</div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn mb-2">Verify OTP</button>
            <a href="{{ url('/resend-otp') }}" class="btn">Resend OTP</a>
        </div>
        @endif

        @if(session('show_password_form'))
        <input type="hidden" name="otp" value="{{ old('otp') }}">

        <div class="form-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="New Password" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="btn">Reset Password</button>
        @endif
    </form>
</div>

</body>
</html>
