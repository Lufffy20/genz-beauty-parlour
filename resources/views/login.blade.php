<div class="form-container" id="loginForm">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenZ | Login & Signup</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>     
<style>
    body {
    background-image: url('images/login-bg.jpg'); /* Update with your background image */
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

/* Title Styling */
h2 {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

/* Form Input Styling */
.form-control {
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: border-color 0.3s ease-in-out;
    padding: 12px;
}

.form-control:focus {
    border-color: #ffcc00;
    box-shadow: none;
}

/* Show border when input field is focused */
.form-control:focus {
    border-color: #ffcc00 !important; /* Ensure border color appears */
    box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); /* Soft glow effect */
    outline: none;
}

/* Error Messages */
.text-danger {
    font-size: 0.9rem;
    display: block;
    text-align: left;
    margin-top: 5px;
}

/* Submit Button */
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

/* Toggle Form (Signup Link) */
.toggle-form {
    margin-top: 15px;
    font-size: 1rem;
}

.toggle-form a {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
}

.toggle-form a:hover {
    text-decoration: underline;
    color: #ff9900;
}

/* Forgot Password Link */
.forgot-password {
    font-size: 0.9rem;
    color: #007bff;
    text-decoration: none;
    display: block;
    margin-top: 15px;
    text-align: center;
}

.forgot-password:hover {
    text-decoration: underline;
    color: #ff9900;
}

/* Responsive Design */
@media (max-width: 576px) {
    h2 {
        font-size: 1.5rem;
    }
}
</style>

<h2>Welcome Back</h2>
        <form action="{{url('/storedata2')}}" method='POST'>
        @csrf
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <span class="text-danger">
                  @error('email')
                  {{$message}}
                  @enderror
                </span> 
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="text-danger">
                  @error('pass')
                  {{$message}}
                  @enderror
                </span> 
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="toggle-form">
                <p>Don't have an account? <a href="signup" onclick="toggleForm()">Sign up</a></p>
            </div>
            <a href="{{ url('/forgot-password') }}" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
