<div class="form-container" id="loginForm">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenZ | Login & Signup</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
</head>
<style>
  /* Full Page Styling */
  body {
    background-image: url('images/login-bg.jpg'); /* Background image */
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    font-family: 'Poppins', sans-serif;
}

/* Form Container */
.form-container {
    background: rgba(255, 255, 255, 0.95);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    max-width: 420px;
    width: 100%;
    text-align: center;
}

/* Title Styling */
.form-container h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
}

/* Form Input Styling */
.form-container .form-control {
    border-radius: 5px;
    padding: 12px;
    border: 1px solid #ccc;
}

.form-container .form-control:focus {
    border-color: #ffcc00;
    box-shadow: none;
    border-color: #ffcc00 !important; /* Ensure border color appears */
    box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); /* Soft glow effect */
    outline: none;
}

/* Error Messages */
.text-danger {
    font-size: 0.9rem;
}

/* Login & Signup Button (Same Color & Square Shape) */
.form-container .btn {
    border-radius: 5px; /* Square shape */
    background: #ffcc00; /* Same color for both buttons */
    color: black;
    font-weight: bold;
    padding: 12px;
    width: 100%;
    transition: all 0.3s ease-in-out;
}

.form-container .btn:hover {
    background: #ff9900; /* Darker shade on hover */
    transform: scale(1.05);
}

/* Toggle Form (Signup Link) */
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
<body>  
<form action="{{url($url)}}" method='POST'>
@csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ $user->name ?? '' }}" required>
                <span class="text-danger">
                  @error('name')
                  {{$message}}
                  @enderror
                </span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email ?? '' }}" required >
                <span class="text-danger">
                  @error('email')
                  {{$message}}
                  @enderror
                </span> 
            </div>
            @if(!isset($user))
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="text-danger">
                  @error('password')
                  {{$message}}
                  @enderror
                </span>
            </div>
            @endif
            <button type="submit" class="btn">Sign Up</button>
            <div class="toggle-form">
                <p>Already have an account? <a href="login" onclick="toggleForm()">Login</a></p>
            </div>
</form>
</body>
</html>