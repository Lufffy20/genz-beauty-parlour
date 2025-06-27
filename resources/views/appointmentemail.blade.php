<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h1>Appointment Confirmation from {{ $email }}</h1>
    <p>Dear,</p>
    <p>Thank you for booking your appointment! Here are the details:</p>
    <ul>
        Message: {{$desc}}
    </ul>
    <p>We look forward to seeing you!</p>
</body>
</html>
