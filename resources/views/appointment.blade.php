@include('layout.header')

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



<div class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="titlepage text_align_center">
                    <h2>Make Appointment</h2>
                    <p>Your perfect beauty day is just one appointment away — glow up time get Appointment now!</p>

                </div>
            </div>
            <div class="col-md-12">
                <form id="request" class="main_form" action="{{ url('/storedata3') }}" method='POST'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form_control" placeholder="Your name" type="text" name="name"
                                value="{{ $user->name ?? '' }}">
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <input class="form_control" placeholder="Email" type="email" name="email"
                                value="{{ $user->email ?? '' }}">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <input class="form_control" placeholder="Phone Number" type="tel" name="phonenumber"
                                value="{{ $user->phonenumber ?? '' }}">
                            <span class="text-danger">@error('phonenumber') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <select class="form_control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ (old('gender', $user->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ (old('gender', $user->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ (old('gender', $user->gender ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
                            </select>
                            <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <select class="form_control" name="select" id="serviceSelect">
                                <option value="">Select service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('select') {{ $message }} @enderror</span>
                        </div>

                        <!-- Sub-Service Dropdown -->
                        <div class="col-md-6" id="subServiceContainer">
                            <select class="form_control" name="subservice" id="subService">
                                <option value="">Select a Sub-Service</option>
                            </select>
                            <span class="text-danger">@error('subservice') {{ $message }} @enderror</span>
                            <div id="priceDisplay" class="mt-2 text-success" style="font-weight: bold;"></div>
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form_control" id="my_date_picker" placeholder="Select Date" name="date" value="{{ $user->date ?? '' }}">
                            <span class="text-danger">@error('date') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-md-6">
                            <select class="form_control" name="time">
                                <option value="">Select time</option>
                                @foreach (['09:00 AM','09:30 AM','10:00 AM','10:30 AM','11:00 AM','11:30 AM','12:00 PM','12:30 PM','01:00 PM','01:30 PM','02:00 PM','02:30 PM','03:00 PM','03:30 PM','04:00 PM','04:30 PM','05:00 PM'] as $time)
                                    <option value="{{ $time }}" {{ (old('time', $user->time ?? '') == $time) ? 'selected' : '' }}>{{ $time }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('time') {{ $message }} @enderror</span>
                        </div>
                      
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" name="message">{{ $user->message ?? '' }}</textarea>
                            <span class="text-danger">@error('message') {{ $message }} @enderror</span>
                        </div>

                        <!-- Hidden price input -->
                        <input type="hidden" name="price" id="priceInput">

                        <div class="col-md-12">
                            <button type="button" class="send_btn" id="payBtn">Book & Pay Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<style>
  .beauty-locations .location-box {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 1rem;
    background: white;
    margin-bottom: 20px; /* Manual space between cards */
  }

  .beauty-locations .location-box:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    cursor: pointer;
  }
</style>

<section class="py-5 bg-light beauty-locations">
  <div class="container">
    <!-- Section Header -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-dark">Our Beauty Parlour Locations</h2>
      <p class="text-muted">Click any location to view it on the map below</p>
    </div>

    <div class="row">
  @foreach($locations as $location)
  <div class="col-md-6 col-lg-6 mb-4">
    <div class="card h-100 location-box shadow-sm border-0" onclick="updateMap({{ $location->latitude }}, {{ $location->longitude }})">
      <img src="{{ asset('images/' . $location->image) }}" class="card-img-top" alt="{{ $location->branch_name }}" style="height: 200px; object-fit: cover;">
      <div class="card-body p-4">
        <h4 class="card-title fw-bold text-dark">{{ $location->branch_name }}</h4>
        <h5 class="card-title fw-bold text-dark">{{ $location->parlour_name }}</h5>
        <p class="card-text text-muted mb-1">📍 {{ $location->address }}</p>
        <p class="card-text mb-0">📞 {{ $location->phone }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
  


  
    <!-- Google Map -->
    <div class="mt-5">
      <div class="rounded overflow-hidden shadow" style="width: 100%; height: 420px;">
        <iframe
          id="footerMap"
          src="https://maps.google.com/?q=23.0225,72.5714&output=embed"
          width="100%"
          height="100%"
          style="border: 0;"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- JS -->
<script>
  function updateMap(lat, lng) {
    const mapUrl = `https://maps.google.com/?q=${lat},${lng}&output=embed`;
    document.getElementById('footerMap').src = mapUrl;

    // Scroll to the map smoothly
    const mapSection = document.getElementById('footerMap');
    if (mapSection) {
      mapSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }
</script>







<!-- Script to load sub-services with price -->
<script>
    function loadSubServices() {
        let serviceId = $('#serviceSelect').val();
        let gender = $('select[name="gender"]').val();

        if (serviceId) {
            $.ajax({
                url: '/get-subservices/' + serviceId,
                type: 'GET',
                data: { gender: gender },
                success: function (data) {
                    $('#subService').empty().append('<option value="">Select a Sub-Service</option>');
                    $.each(data, function (key, value) {
                        let optionText = `${value.package_name} - ₹${parseFloat(value.price).toFixed(2)}`;
                        $('#subService').append(`<option value="${value.id}" data-price="${value.price}">${optionText}</option>`);
                    });
                    $('#priceDisplay').text('');
                },
                error: function () {
                    console.error('Failed to fetch subservices');
                }
            });
        } else {
            $('#subService').empty().append('<option value="">Select a Sub-Service</option>');
            $('#priceDisplay').text('');
        }
    }

    $('#serviceSelect, select[name="gender"]').on('change', loadSubServices);

    $('#subService').on('change', function () {
        let price = $('option:selected', this).data('price');
        if (price) {
            $('#priceDisplay').text('Selected Package Price: ₹' + parseFloat(price).toFixed(2));
        } else {
            $('#priceDisplay').text('');
        }
    });
</script>

<!-- Razorpay Payment Integration -->
<script>
    $('#payBtn').click(function (e) {
        e.preventDefault();

        var formData = $('#request').serializeArray();
        let data = {};
        formData.forEach(item => {
            data[item.name] = item.value;
        });

        if (!data.name || !data.email || !data.phonenumber || !data.date || !data.time || !data.select || !data.subservice || !data.gender) {
            alert("Please fill all required fields.");
            return;
        }

        let selectedSubService = $('#subService option:selected');
        let subServicePrice = parseFloat(selectedSubService.data('price'));

        if (isNaN(subServicePrice)) {
            alert("Invalid sub-service price.");
            return;
        }

        let amountInPaise = Math.round(subServicePrice * 100);

        $.ajax({
            url: '/generate-order',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                amount: amountInPaise
            },
            success: function (response) {
                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}",
                    "amount": response.amount,
                    "currency": "INR",
                    "name": "Your Business Name",
                    "description": "Appointment Payment",
                    "order_id": response.order_id,
                    "handler": function (paymentResponse) {
                        // Add payment ID input
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'payment_id',
                            value: paymentResponse.razorpay_payment_id
                        }).appendTo('#request');

                        // Ensure price is set
                        let priceInput = $('#priceInput');
                        if (priceInput.length === 0) {
                            $('<input>').attr({
                                type: 'hidden',
                                name: 'price',
                                id: 'priceInput',
                                value: subServicePrice
                            }).appendTo('#request');
                        } else {
                            priceInput.val(subServicePrice);
                        }

                        // Submit form
                        $('#request').submit();
                    }
                };
                var rzp = new Razorpay(options);
                rzp.open();
            },
            error: function () {
                alert("Payment initiation failed");
            }
        });
    });
</script>

<script>
    $('#my_date_picker').on('change', function () {
    let selectedDate = $(this).val();
    let serviceId = $('#serviceSelect').val(); // optional: filter by service
    if (selectedDate) {
        $.ajax({
            url: '/get-available-slots',
            method: 'GET',
            data: {
                date: selectedDate,
                service_id: serviceId // optional
            },
            success: function (response) {
                let timeSelect = $('select[name="time"]');
                timeSelect.empty();
                if (response.available_slots.length > 0) {
                    timeSelect.append('<option value="">Select time</option>');
                    response.available_slots.forEach(slot => {
                        timeSelect.append(`<option value="${slot}">${slot}</option>`);
                    });
                } else {
                    timeSelect.append('<option value="">No slots available</option>');
                }
            },
            error: function () {
                alert('Error fetching available slots.');
            }
        });
    }
});

</script>

@include('layout.footer')
