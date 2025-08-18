@extends('layout.main')
@section('main-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facial Services</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    .btn-yellow {
        background-color: #FFD700;
        color: black;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .btn-yellow:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        background-color: #FFC107;
    }

    .hair-services {
        text-align: center;
        padding: 50px 0;
    }

    .services-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .service-item {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        text-align: center;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .service-item:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .carousel-inner img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 12px;
    }

    .carousel-item {
        transition: opacity 1s ease-in-out;
    }

    .btn-custom,
    .read-more-btn {
        background: linear-gradient(45deg, #FFD700, #FFC107);
        color: black;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .btn-custom:hover,
    .read-more-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 20px rgba(255, 193, 7, 0.3);
        background: linear-gradient(45deg, #FFC107, #FFA500);
    }

    /* Package card styling with equal heights */
    .package-item {
        display: flex;
        flex: 1 1 300px;
        max-width: 400px;
    }

    .package-box {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: linear-gradient(135deg, #fff, #f8f9fa);
        border: 2px solid #FFD700;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease-in-out;
        position: relative;
        overflow: hidden;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        min-height: 500px; /* Force all cards same height */
    }

    .package-box:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 25px rgba(255, 215, 0, 0.4);
        border-color: #FFC107;
    }

    .package-box img {
    width: 100%;
    height: auto;          /* Let image height adjust naturally */
    max-height: 250px;     /* Optional: limit to keep cards neat */
    object-fit: contain;   /* Ensures full image fits without cutting */
    border-radius: 12px;
    background: #fff;      /* Adds a background so no blank gaps look weird */
    transition: transform 0.3s ease-in-out;
}


    .package-box:hover img {
        transform: scale(1.1);
    }

    .package-title {
        font-size: 1.6rem;
        font-weight: bold;
        color: #333;
        margin-top: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .package-description {
        font-size: 1rem;
        color: #555;
        margin: 10px 0;
        font-style: italic;
        flex-grow: 1; /* Makes descriptions expand evenly */
    }

    .package-price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #28a745;
        background: rgba(40, 167, 69, 0.1);
        display: inline-block;
        padding: 5px 15px;
        border-radius: 8px;
        margin-bottom: 10px;
    }

 .package-box .btn-yellow {
    width: 100%;
    font-size: 1.1rem;
    padding: 12px;
    font-weight: bold;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
    background: linear-gradient(135deg, #FFD700, #FFC107);
    margin-top: 10px; /* Adds spacing between multiple buttons */
}

    .package-box .btn-yellow:hover {
          margin-top: auto; /* Ensures first button sticks to bottom */
        background: linear-gradient(135deg, #FFC107, #FFA500);
        transform: translateY(-3px);
        box-shadow: 0px 5px 15px rgba(255, 165, 0, 0.4);
    }

    @media (max-width: 768px) {
        .package-box {
            padding: 15px;
            min-height: auto; /* Don’t force tall cards on mobile */
        }

        .package-box img {
            height: 180px;
        }

        .package-title {
            font-size: 1.3rem;
        }

        .package-price {
            font-size: 1.2rem;
        }

        .btn-yellow {
            font-size: 1rem;
        }
    }

    #packages-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 40px;
    }

    /* Specialist card equal heights */
    .row.g-4 {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .specialist-item {
        display: flex;
        flex: 1 1 300px;
        max-width: 400px;
    }

    .vendor-box {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        min-height: 420px; /* Uniform height */
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .vendor-box img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin: 0 auto;
        flex-shrink: 0;
    }
</style>


</head>
<body>
    <div class="container py-5">
        <div class="hero-box text-center p-5 shadow-lg rounded-4 bg-white">
            <h2 class="display-3 fw-bold text-primary">Welcome to <span class="text-dark">GenZ Parlour</span></h2>
            <p class="lead text-muted mt-3">Where Elegance Meets Excellence! Experience top-tier beauty care from certified professionals.</p>
            <a href="#services" class="btn btn-yellow mt-3">Explore Services</a>
        </div>
    </div>

    @if(isset($packages[0]))
    <div class="container my-5">
        <div class="row align-items-center p-4 bg-white shadow-lg rounded-4">
            <div class="col-md-5">
                <img src="{{ asset('admin/img/parlour.jpg') }}" class="img-fluid rounded-4 w-100" alt="Beauty Parlour">
            </div>
            <div class="col-md-7">
                <h3 class="fw-bold text-dark mb-3">{{ $packages[0]->service->service_name }}</h3>
                <p class="text-muted fs-5">{{ $packages[0]->service->description }}</p>
                <a href="#" class="btn btn-yellow">Book Now</a>
            </div>
        </div>
    </div>
    @endif

    <div class="container my-5">
        <h2 class="text-center mb-4 fw-bold text-primary">Our Specialists</h2>
        <div class="row g-4">
            @foreach($specialists as $specialist)
            <div class="col-md-6 col-lg-4 specialist-item">
                <div class="vendor-box text-center p-4 shadow-lg rounded-4 bg-white">
                    <img src="{{ asset('images/' . $specialist->image) }}" class="img-fluid rounded-circle">
                    <h4 class="mt-3 fw-bold">{{ $specialist->name }}</h4>
                    <p class="text-muted">{{ $specialist->specialization }}</p>
                    <p class="text-muted">✂️ {{ $specialist->experience }}+ years experience</p>
                    <div class="social-icons mt-3">
                        @if($specialist->instagram)
                        <a href="{{ $specialist->instagram }}" target="_blank" class="me-2"><i class="fab fa-instagram fa-lg text-dark"></i></a>
                        @endif
                        @if($specialist->whatsapp)
                        <a href="{{ $specialist->whatsapp }}" target="_blank" class="me-2"><i class="fab fa-whatsapp fa-lg text-success"></i></a>
                        @endif
                        @if($specialist->twitter)
                        <a href="{{ $specialist->twitter }}" target="_blank"><i class="fab fa-x-twitter fa-lg text-dark"></i></a>
                        @endif
                    </div>
                    @if($specialist->status == 0)
                    <span class="badge bg-danger mt-3 px-3 py-2 fs-6 rounded-pill">🚫 Unavailable</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container py-5">
        <h2 class="text-center mb-4 fw-bold text-primary">Packages</h2>
        <div class="text-center mb-4">
            <button class="btn btn-primary filter-btn" data-filter="male">Male</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="female">Female</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="kid">Kid</button>
        </div>
        <div class="row g-4" id="packages-container">
            @foreach ($packages as $fp)
            <div class="col-md-6 col-lg-4 package-item d-none" data-category="{{ strtolower($fp->category) }}">
                <div class="package-box">
                    <img src="{{ asset('images/' . $fp->images) }}" alt="Package Image" class="w-100 rounded-4"/>
                    <h4 class="package-title">{{ $fp->package_name }}</h4>
                    <p class="package-description">{{ $fp->description }}</p>
                    <p class="package-price fw-bold text-success">Price: ₹{{ number_format($fp->price, 2) }}</p>
                    @php $isLoggedIn = Auth::check(); @endphp
                    <a href="{{ $isLoggedIn ? url('/allbooking/' . $fp->id) : route('login') }}" class="btn btn-yellow w-100">Book Now</a>
                    <a href="{{ $isLoggedIn ? route('cart.add', $fp->id) : route('login') }}" class="btn btn-yellow w-100">Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter-btn");
        const packages = document.querySelectorAll(".package-item");

        function showCategory(category) {
            filterButtons.forEach(btn => {
                btn.classList.remove("btn-primary");
                btn.classList.add("btn-outline-primary");
            });
            document.querySelector(`.filter-btn[data-filter="${category}"]`).classList.add("btn-primary");
            document.querySelector(`.filter-btn[data-filter="${category}"]`).classList.remove("btn-outline-primary");

            packages.forEach(item => {
                item.classList.toggle("d-none", item.getAttribute("data-category") !== category);
            });
        }

        // Show "male" by default
        showCategory("male");

        filterButtons.forEach(button => {
            button.addEventListener("click", function () {
                const filter = this.getAttribute("data-filter");
                showCategory(filter);
            });
        });
    });
    </script>
</body>
</html>
@endsection
