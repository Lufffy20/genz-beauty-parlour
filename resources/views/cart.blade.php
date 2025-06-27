@extends('layout.main')

@section('main-section')
<div class="container py-5">
    <h2 class="text-center fw-bold text-primary">Your Cart</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(isset($cart) && is_array($cart) && count($cart) > 0)
    <table class="table table-bordered text-center">
        <thead class="bg-light">
            <tr>
                <th>Image</th>
                <th>Package Name</th>
                <th>Service Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr data-id="{{ $item['id'] }}">
                <td><img src="{{ asset('images/' . $item['image']) }}" width="60" alt="Package"></td>
                <td>{{ $item['name'] }}</td>
                <td><strong class="text-primary">{{ $item['service_name'] }}</strong></td>
                <td>₹{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>
                    <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger btn-sm">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('cart.clear') }}" class="btn btn-warning">Clear Cart</a>
        <a href="{{ route('checkout') }}" class="btn btn-success" onclick="saveCartToLocalStorage()">Proceed to Checkout</a>
    </div>

    @else
        <p class="text-center text-muted">Your cart is empty.</p>
    @endif
</div>

<script>
    function saveCartToLocalStorage() {
        let cartItems = [];
        document.querySelectorAll("tbody tr").forEach(row => {
            let item = {
                id: row.dataset.id,
                name: row.cells[1].textContent.trim(),             // Package Name
                service_name: row.cells[2].textContent.trim(),     // Service Name
                price: row.cells[3].textContent.trim().replace('₹', ''),
                quantity: row.cells[4].textContent.trim(),
                image: row.querySelector('img').getAttribute('src') // Optional, for later use
            };
            cartItems.push(item);
        });
        localStorage.setItem('cart', JSON.stringify(cartItems));
    }

    document.addEventListener("DOMContentLoaded", saveCartToLocalStorage);
</script>
@endsection
