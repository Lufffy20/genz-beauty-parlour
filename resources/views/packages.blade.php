
<div class="container">
    <h2 class="mb-4">Beauty Parlour Services</h2>
    
    <div class="row">
        <div class="col-md-8">
            <h4>Available Services</h4>
            <ul class="list-group">
                @php
                    $services = [
                        'Hair Services',
                        'Facial & Skincare Treatments',
                        'Makeup Services',
                        'Waxing & Hair Removal',
                        'Manicure & Pedicure',
                        'Eyebrow & Lash Services',
                        'Body Treatments'
                    ];
                @endphp

                @foreach($services as $service)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $service }}
                        <button class="btn btn-primary add-to-cart" data-service="{{ $service }}">Add to Cart</button>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <div class="col-md-4">
            <h4>Your Cart</h4>
            <ul class="list-group" id="cart-list">
                <li class="list-group-item">No items in cart</li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let cart = [];
        const cartList = document.getElementById('cart-list');

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                let service = this.getAttribute('data-service');
                cart.push(service);
                updateCart();
            });
        });

        function updateCart() {
            cartList.innerHTML = '';
            cart.forEach(item => {
                let li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = item;
                cartList.appendChild(li);
            });
            if (cart.length === 0) {
                cartList.innerHTML = '<li class="list-group-item">No items in cart</li>';
            }
        }
    });
</script>

