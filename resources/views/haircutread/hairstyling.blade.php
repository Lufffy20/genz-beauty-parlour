@extends('layout.main')

@section('main-section')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- Font Awesome (Latest) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<body>

<!-- Hero Section (Boxed) -->
<div class="container py-5">
    <div class="hero-box text-center p-5 shadow-lg rounded-4 bg-white">
        <h2 class="display-3 fw-bold text-primary animate-text">
            Welcome to <span class="text-dark">Beauty Bliss Parlour</span>
        </h2>
        <p class="lead text-muted mt-3">
            Where Elegance Meets Excellence! Experience top-tier beauty care from certified professionals.
        </p>
        <a href="#services" class="btn btn-glow mt-3">Explore Services</a>
    </div>
</div>

<!-- About Services (Boxed) -->
<div class="container my-5">
    <div class="row align-items-center p-4 bg-white shadow-lg rounded-4">
        <div class="col-md-5">
            <img src="{{ asset('admin/img/parlour.jpg') }}" class="img-fluid rounded-4 w-100" alt="Beauty Parlour">
        </div>
        <div class="col-md-7">
            <h3 class="fw-bold text-dark mb-3">Professional Beauty Services</h3>
            <p class="text-muted fs-5">
                We offer a range of services including facials, hair styling, makeup, spa treatments, and more. Our expert stylists ensure top-notch care with high-quality products.
            </p>
            <a href="#" class="btn btn-custom">Book Now</a>
        </div>
    </div>
</div>

<!-- Why Choose Us (Image Without Box) -->
<div class="container py-5">
    <div class="row align-items-center p-5 bg-light rounded-4 shadow-lg">
        <!-- Text Column (Left Side) -->
        <div class="col-md-6">
            <h3 class="text-primary fw-bold mb-4">Why Choose Us?</h3>
            <ul class="fs-5 text-muted list-unstyled">
                <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Certified Beauty Experts</li>
                <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Premium Products</li>
                <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Relaxing Environment</li>
                <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Affordable Pricing</li>
                <li><i class="fas fa-check-circle text-success me-2"></i> Personalized Treatments</li>
            </ul>
            <p class="mt-3 fs-5">📞 <strong>Contact us today</strong> to book your appointment!</p>
        </div>

        <!-- Image Column (Right Side, No Box) -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('admin/img/parlour1.jpg') }}" class="img-fluid w-100" 
                alt="Why Choose Us" style="max-height: 350px; object-fit: cover; border-radius: 0; box-shadow: none;">
        </div>
    </div>
</div>

<!-- Booking Section (Matching Box Style) -->
<div class="container mt-5">
    <div class="row align-items-center p-5 bg-light rounded-4 shadow-lg">
        <!-- Image Column -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('admin/img/parlour2.jpg') }}" class="img-fluid w-100" 
                alt="Beauty Parlour" style="max-height: 350px; object-fit: cover; border-radius: 0; box-shadow: none;">
        </div>
        
        <!-- Form Column -->
        <div class="col-md-6">
            <h3 class="text-primary fw-bold mb-4 text-center">Book Your Appointment</h3>
            <form action="{{ route('appointment') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your number" required>
                </div>
                <div class="mb-4"> <!-- Increased margin-bottom for spacing -->
    <label class="form-label fw-bold mb-2">Select Service</label> <!-- Added mb-2 for space -->
    <select name="service_type" class="form-select py-2 px-3" required>
        <option value="" disabled selected>-- Select a Service --</option>
        <option value="Facial Treatment">Haircuts & Styling ✂️</option>
        <option value="Hair Styling">Facials & Skincare 💆</option>
        <option value="Bridal Makeup">Makeup Services 💄</option>
        <option value="Spa Therapy">Waxing & Hair Removal ✨</option>
        <option value="Nail Art & Manicure">Manicure & Pedicure 💅</option>
    </select>
</div>

                <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm rounded-3">Submit</button>
            </form>
        </div>
    </div>
</div>



<!-- Haircut Specialist Vendor (New Section) -->
<div class="container py-5">
    <h3 class="text-center fw-bold text-primary mb-4">Meet Our Haircut Specialists</h3>
    
    <div class="row">
        <div class="col-md-4">
            <div class="vendor-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/vendor1.jpg') }}" class="img-fluid rounded-circle" 
                     alt="Stylist 1" style="width: 150px; height: 150px; object-fit: cover;">
                <h4 class="mt-3 fw-bold">Alex Johnson</h4>
                <p class="text-muted">Expert in modern and classic haircuts.</p>
                <p class="text-muted">💈 10+ years experience</p>
                <div class="social-icons mt-3">
                <a href="https://www.instagram.com/" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/" target="_blank" class="social-link">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://twitter.com/" target="_blank" class="social-link">
                    <i class="fab fa-x-twitter"></i>
                </a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="vendor-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/vendor2.jpg') }}" class="img-fluid rounded-circle" 
                     alt="Stylist 2" style="width: 150px; height: 150px; object-fit: cover;">
                <h4 class="mt-3 fw-bold">Sophia Martinez</h4>
                <p class="text-muted">Specialist in layered cuts and trendy styles.</p>
                <p class="text-muted">✂️ 8+ years experience</p>
                <div class="social-icons mt-3">
                <a href="https://www.instagram.com/" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/" target="_blank" class="social-link">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://twitter.com/" target="_blank" class="social-link">
                    <i class="fab fa-x-twitter"></i>
                </a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="vendor-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/vendor3.jpg') }}" class="img-fluid rounded-circle" 
                     alt="Stylist 3" style="width: 150px; height: 150px; object-fit: cover;">
                <h4 class="mt-3 fw-bold">Michael Lee</h4>
                <p class="text-muted">Men’s grooming expert & precision cuts.</p>
                <p class="text-muted">🪒 12+ years experience</p>
                <div class="social-icons mt-3">
                <a href="https://www.instagram.com/" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/" target="_blank" class="social-link">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://twitter.com/" target="_blank" class="social-link">
                    <i class="fab fa-x-twitter"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Services Section (Boxed) -->
<div class="container py-5" id="services">
    <h3 class="text-center fw-bold text-primary mb-4">Our Haircut Services</h3>

    <!-- Filter Buttons (Moved Below Title) -->
    <div class="text-center mb-4">
        <button class="btn btn-primary mx-2 filter-btn" data-filter="all">All</button>
        <button class="btn btn-outline-primary mx-2 filter-btn" data-filter="male">Male</button>
        <button class="btn btn-outline-primary mx-2 filter-btn" data-filter="female">Female</button>
    </div>

    <div class="row">
        <div class="col-md-4 service-item male">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/haircut.jpg') }}" class="img-fluid rounded-4" alt="Classic Haircut">
                <h4 class="mt-3 fw-bold">Classic Haircut</h4>
                <p class="text-muted">Simple and stylish cuts for all hair types.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/layered-cut.jpg') }}" class="img-fluid rounded-4" alt="Layered Cut">
                <h4 class="mt-3 fw-bold">Layered Cut</h4>
                <p class="text-muted">Adds volume and dimension with soft layers.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/v-cut.jpg') }}" class="img-fluid rounded-4" alt="V-Cut">
                <h4 class="mt-3 fw-bold">V-Cut</h4>
                <p class="text-muted">Sharp, angled cut for a sleek and stylish look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/bob-cut.jpg') }}" class="img-fluid rounded-4" alt="Bob Cut">
                <h4 class="mt-3 fw-bold">Bob Cut</h4>
                <p class="text-muted">Chic and modern bob styles for a trendy look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/pixie-cut.jpg') }}" class="img-fluid rounded-4" alt="Pixie Cut">
                <h4 class="mt-3 fw-bold">Pixie Cut</h4>
                <p class="text-muted">Short and edgy haircut for a bold statement.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/feather-cut.jpg') }}" class="img-fluid rounded-4" alt="Feather Cut">
                <h4 class="mt-3 fw-bold">Feather Cut</h4>
                <p class="text-muted">Light, flowy layers for a soft and elegant look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/step-cut.jpg') }}" class="img-fluid rounded-4" alt="Step Cut">
                <h4 class="mt-3 fw-bold">Step Cut</h4>
                <p class="text-muted">Layered haircut with defined steps for extra bounce.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/fringe-cut.jpg') }}" class="img-fluid rounded-4" alt="Fringe Cut">
                <h4 class="mt-3 fw-bold">Fringe Cut</h4>
                <p class="text-muted">Adds stylish bangs or fringes for a trendy look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item male">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/undercut.jpg') }}" class="img-fluid rounded-4" alt="Undercut">
                <h4 class="mt-3 fw-bold">Undercut</h4>
                <p class="text-muted">Short, modern cut with shaved sides for a bold look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Styling" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
    </div>
</div>


@endsection


<style>


/* General Styling */
body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
}

/* Boxed Section */
.hero-box,
.shadow-lg {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* Buttons */

.filter-btn {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-custom {
    background: linear-gradient(45deg, #FFD700, #FFC107);
    color: black;
    font-weight: bold;
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease-in-out;
}

.btn-custom:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(255, 193, 7, 0.3);
}

.service-box {
        transition: transform 0.3s ease-in-out;
    }
    .service-box:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }
}

/* General Styles */
#services {
    background-color: #f8f9fa; /* Light background */
}

.service-box {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    border: 1px solid #ddd;
}

.service-box:hover {
    transform: translateY(-5px); /* Lift effect */
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
}

/* Service Image Styling */
.service-box img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
}

/* Heading and Text */
h3.text-primary {
    font-size: 2rem;
    text-transform: uppercase;
}

.service-box h4 {
    font-size: 1.4rem;
    color: #333;
}

.service-box p {
    font-size: 1rem;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .service-box {
        margin-bottom: 20px;
    }
}

/* Vendor Box Hover Effect */
.vendor-box {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    border: 1px solid #ddd;
    background-color: #fff;
}

.vendor-box:hover {
    transform: translateY(-8px);
    box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2);
}

/* Social Media Icons */
.social-icons {
    display: flex;
    gap: 15px;
}

.social-link {
    font-size: 24px;
    color: #555;
    transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.social-link:hover {
    color: #ff9800; /* Change to your preferred color */
    transform: scale(1.2);
}

/* Centering the social icons */
.social-icons {
    display: flex;
    justify-content: center;
    gap: 15px; /* Adjust spacing between icons */
    margin-top: 10px;
}

/* Styling for the social media icons */
.social-icons a {
    color: #333; /* Default icon color */
    font-size: 24px; /* Adjust icon size */
    transition: 0.3s;
}

.social-icons a:hover {
    color: #007bff; /* Change color on hover */
}



</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const serviceItems = document.querySelectorAll(".service-item");

    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const filter = this.getAttribute("data-filter");

            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove("btn-primary"));
            filterButtons.forEach(btn => btn.classList.add("btn-outline-primary"));
            this.classList.remove("btn-outline-primary");
            this.classList.add("btn-primary");

            // Show/Hide items based on filter
            serviceItems.forEach((item) => {
                if (filter === "all" || item.classList.contains(filter)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
});

</script>
</body>