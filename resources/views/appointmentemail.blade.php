<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">

    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

        <h2 style="color: #333;">Hello,</h2>

        <p style="font-size: 16px; color: #555;">
            Thank you for booking your appointment with <strong>GenZ Beauty</strong>!
        </p>

        <hr style="margin: 20px 0;">

        <h3 style="color: #333;">Appointment Details:</h3>
        <table style="width: 100%; font-size: 15px;">
            <tr>
                <td style="font-weight: bold; padding: 8px 0;">Email:</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; padding: 8px 0;">Message:</td>
                <td>{{ $desc }}</td>
            </tr>
        </table>

        <hr style="margin: 20px 0;">

        <p style="font-size: 15px; color: #444;">
            We look forward to pampering you! If you have any questions, feel free to reply to this email.
        </p>

        <p style="font-size: 14px; color: #777;">
            — GenZ Beauty Team
        </p>

    </div>

</body>
</html>
