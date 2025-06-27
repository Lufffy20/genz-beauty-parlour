<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: auto;
            text-align: center;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .package-info {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 15px;
        }
        .form-label {
            text-align: left;
            display: block;
            font-size: 0.9rem;
            margin-top: 8px;
            font-weight: 600;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            margin-top: 3px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fafafa;
        }
        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }
        .submit-btn, .pay-btn {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .pay-btn {
            background-color: #28a745;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .pay-btn:hover {
            background-color: #218838;
        }
        .alert-success {
            background-color: #28a745;
            color: white;
            padding: 10px;
            font-weight: bold;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        @media (max-width: 500px) {
            .container {
                padding: 12px;
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Package Info -->
    <div class="package-info">
        <h3>{{ $package->package_name }}</h3>
        <p>{{ $package->description }}</p>
        <p><strong>Price: ₹{{ number_format($package->price, 2) }}</strong></p>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('store6') }}" id="booking-form">
    @csrf
    <input type="hidden" name="package_id" value="{{ $package->id }}">

    <!-- Form Fields -->
    <label class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" required>

    <label class="form-label">Email Address</label>
    <input type="email" name="email" class="form-control" required>

    <label class="form-label">Phone Number</label>
    <input type="text" name="phonenumber" class="form-control" required>

    <label class="form-label">Gender</label>
    <select name="gender" class="form-control" required>
        <option value="" disabled selected>Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label class="form-label">Booking Date</label>
    <input type="date" name="date" class="form-control" required>

    <label class="form-label">Booking Time</label>
    <select class="form-control" name="time" id="my_time_picker" required>
        <option value="">Select time</option>
        @php
            $startTime = strtotime('09:00 AM'); 
            $endTime = strtotime('05:00 PM');   
            while ($startTime <= $endTime) {
                $timeSlot = date('h:i A', $startTime);
                echo "<option value='$timeSlot'>$timeSlot</option>";
                $startTime = strtotime('+30 minutes', $startTime);
            }
        @endphp
    </select>

    <label class="form-label">Select Specialist</label>
    <select name="specialist" class="form-control" required>
        <option value="" disabled selected>Select a specialist</option>
        @foreach($specialists as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <label class="form-label">Message (Optional)</label>
    <textarea name="message" class="form-control" rows="2"></textarea>

    <!-- <button type="submit" class="submit-btn">Submit</button> -->
</form>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<p>Amount: ₹{{ number_format($package->price, 2) }}</p>
<!-- Inside resources/views/allbooking.blade.php -->

<!-- Payment Button -->
<button id="pay-button" class="pay-btn">Pay Now</button>

<script>
    document.getElementById('pay-button').onclick = function () {
        fetch('/generate-order', { // Call to generate Razorpay order
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                package_id: '{{ $package->id }}',
                name: document.querySelector('input[name="name"]').value,
                email: document.querySelector('input[name="email"]').value,
                phonenumber: document.querySelector('input[name="phonenumber"]').value,
                gender: document.querySelector('select[name="gender"]').value,
                time: document.querySelector('select[name="time"]').value,
                date: document.querySelector('input[name="date"]').value,
                specialist: document.querySelector('select[name="specialist"]').value,
                message: document.querySelector('textarea[name="message"]').value,
            })
        })
        .then(response => response.json())
        .then(order => {
            var options = {
                key: '{{ env('RAZORPAY_KEY') }}',
                amount: order.amount,
                currency: 'INR',
                name: "Your Company",
                description: "Booking Payment",
                order_id: order.id,
                handler: function (response) {
                    fetch('/store-booking', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            booking_data: order.booking_data,
                            payment_id: response.razorpay_payment_id, // Save Razorpay payment ID
                            payment_status: 'Confirmed', // You can use the payment status here
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('Booking Confirmed: ' + data.message);
                        window.location.href = "/thank-you"; // Redirect after success
                    });
                },
                prefill: {
                    name: document.querySelector('input[name="name"]').value,
                    email: document.querySelector('input[name="email"]').value,
                    contact: document.querySelector('input[name="phonenumber"]').value
                },
                theme: {
                    color: "#007bff"
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        });
    };
</script>


</body>
</html>
