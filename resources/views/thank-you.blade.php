<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .thank-you-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #28a745;
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .home-button {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h2>Thank you for your payment!</h2>
        <p>Your booking has been confirmed.</p>
        <a href="/" class="home-button">Go to Home</a>
    </div>
</body>
</html>
