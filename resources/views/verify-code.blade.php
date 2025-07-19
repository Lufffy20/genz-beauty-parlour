<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenZ | Verify Code</title>
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

        .verify-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }

        .verify-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .verify-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            text-align: center;
        }

        .verify-container input[type="text"]:focus {
            border-color: #ffcc00 !important;
            box-shadow: 0 0 5px rgba(255, 204, 0, 0.5);
            outline: none;
        }

        .verify-container button {
            border-radius: 5px;
            background: #ffcc00;
            color: black;
            font-weight: bold;
            padding: 12px;
            width: 100%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .verify-container button:hover {
            background: #ff9900;
            transform: scale(1.05);
        }

        p {
            margin-bottom: 15px;
            font-size: 14px;
        }

        p[style*="color: green;"] {
            font-weight: bold;
        }

        p[style*="color: red;"] {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="verify-container">
        <h2>Verify Your Email</h2>

        @if(session('message'))
            <p style="color: green;">{{ session('message') }}</p>
        @endif

        @if($errors->any())
            <p style="color: red;">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('code.verify') }}">
            @csrf
            <input type="text" name="code" placeholder="Enter 6-digit code" maxlength="6" required>
            <button type="submit">Verify & Complete Signup</button>
        </form>
    </div>

</body>
</html>
