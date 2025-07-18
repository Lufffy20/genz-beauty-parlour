<!DOCTYPE html>
<html>
<head>
    <title>Verify Code</title>
</head>
<body>
    <h2>Verify Your Email</h2>

    @if(session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('code.verify') }}">
        @csrf
        <input type="text" name="code" placeholder="Enter 6-digit code" required><br><br>
        <button type="submit">Verify & Complete Signup</button>
    </form>
</body>
</html>
