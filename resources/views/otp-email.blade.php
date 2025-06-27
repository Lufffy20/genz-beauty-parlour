<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css"> <!-- Optional if shared -->
    <style>
        body {
            background-image: url('/images/login-bg.jpg'); /* Update with your background image */
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
            transition: transform 0.3s ease-in-out;
        }

        .form-container:hover {
            transform: scale(1.02);
        }

        h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 12px;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #ffcc00 !important;
            box-shadow: 0 0 5px rgba(255, 204, 0, 0.5);
            outline: none;
        }

        .text-danger {
            font-size: 0.9rem;
            display: block;
            text-align: left;
            margin-top: 5px;
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

        .text-muted a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .text-muted a:hover {
            color: #ff9900;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Forgot Password</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/send-otp') }}">
        @csrf

        <div class="form-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn">Send OTP</button>
    </form>

    <div class="mt-3 text-muted">
        <a href="{{ url('/login') }}">Back to Login</a>
    </div>
</div>

</body>
</html>
