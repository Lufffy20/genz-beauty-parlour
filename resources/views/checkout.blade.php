@extends('layout.main')
@section('main-section')

<div class="container">
    <div class="col-md-10 mx-auto">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Checkout</h2>
        </div>

        <div class="card p-4 shadow-sm mb-5">
            <form id="bookingForm">
                @csrf

                @if(isset($cart) && is_array($cart) && count($cart) > 0)
                    <ul class="list-group mb-4">
                        @foreach($cart as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item['service_name'] }}</strong> - {{ $item['name'] }}
                                </div>
                                <div>
                                    ₹{{ $item['price'] }} × {{ $item['quantity'] }} = ₹{{ $item['price'] * $item['quantity'] }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="row g-3">
                    <div class="col-md-12">
                        <h5>Selected Packages</h5>
                        <ul id="cartSummary" class="list-group mb-3"></ul>
                        <h5>Total: ₹<span id="totalAmount">0</span></h5>
                        <input type="hidden" id="price" name="price">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" id="phonenumber" name="phonenumber" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Booking Date</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Booking Time</label>
                        <select id="time" name="time" class="form-control" required>
                            <option value="" selected disabled>Select time</option>
                            @foreach(['09:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM','04:00 PM','05:00 PM'] as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Specialist</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Specialist
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($specialists as $specialist)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="specialist_checkbox[]" id="specialist_{{ $specialist->id }}" value="{{ $specialist->id }}">
                                        <label class="form-check-label" for="specialist_{{ $specialist->id }}">
                                            {{ $specialist->name }} - {{ $specialist->service->service_name ?? 'N/A' }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="text-center mt-4">
                        <button type="button" id="pay-button" class="btn btn-primary">Pay & Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartSummary = document.getElementById('cartSummary');
    const totalAmountElem = document.getElementById('totalAmount');
    const priceInput = document.getElementById('price');

    let total = 0;
    cart.forEach(item => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = `<span>${item.service_name} - ${item.name}</span>
                        <span>₹${item.price} × ${item.quantity}</span>`;
        cartSummary.appendChild(li);
        total += parseFloat(item.price) * parseInt(item.quantity);
    });

    totalAmountElem.textContent = total.toFixed(2);
    priceInput.value = total.toFixed(2);
});

document.getElementById('pay-button').onclick = function () {
    const form = document.getElementById('bookingForm');
    const formData = new FormData(form);
    const amount = formData.get('price');
    const cart = localStorage.getItem('cart');

    if (!amount || !cart || JSON.parse(cart).length === 0) {
        alert('Your cart is empty!');
        return;
    }

    fetch('/payment', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ amount: amount })
    })
    .then(response => response.json())
    .then(order => {
        if (order.error) {
            alert(order.error);
            return;
        }

        var options = {
            key: '{{ env('RAZORPAY_KEY') }}',
            amount: order.amount,
            currency: 'INR',
            name: "Genz Beauty Parlour Service",
            description: "Booking Payment",
            order_id: order.id,
            handler: function (response) {
                formData.append('payment_id', response.razorpay_payment_id);
                formData.append('cart', cart);

                fetch("{{ route('store7') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(async res => {
                    const data = await res.json().catch(() => ({}));
                    if (data.success) {
                        alert('Booking successful!');
                        localStorage.removeItem('cart');
                        window.location.href = "/thank-you";
                    } else {
                        console.error('Booking Error:', data);
                        alert('Booking failed: ' + (data.details || data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Booking Error:', error);
                    alert('Something went wrong while saving your booking.');
                });
            },
            prefill: {
                name: formData.get('name'),
                email: formData.get('email'),
                contact: formData.get('phonenumber')
            },
            theme: { color: "#007bff" }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    })
    .catch(error => {
        console.error('Payment Error:', error);
        alert('Something went wrong while initiating payment.');
    });
};
</script>
@endsection
