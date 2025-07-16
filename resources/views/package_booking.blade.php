<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Thank you for your booking, {{ $booking['name'] }}!</h2>
    <p>Here are your booking details:</p>
    <ul>
        <li><strong>Package:</strong> {{ $booking['package_name'] }}</li>
        <li><strong>Price:</strong> ₹{{ number_format($booking['price'], 2) }}</li>
        <li><strong>Date:</strong> {{ $booking['date'] }}</li>
        <li><strong>Time:</strong> {{ $booking['time'] }}</li>
        <li><strong>Specialist:</strong> {{ $booking['specialist'] }}</li>
    </ul>
    <p>We look forward to seeing you!</p>
</body>
</html>
