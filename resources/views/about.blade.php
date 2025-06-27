@include('layout.header')

<!-- About Section -->
<div class="about py-5 bg-gradient-to-r from-pink-300 to-purple-400 text-white">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="about_img">
                    <figure>
                        <img src="{{ asset($about->image) }}" class="img-fluid rounded-4 shadow-lg" alt="About Us"/>
                    </figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="titlepage text-align-left">
                    <h2 class="fw-bold text-uppercase">{{ $about->title }}</h2>
                    <p class="lead">{{ $about->description }}</p>
                    <a class="btn btn-light text-dark fw-bold px-4 py-2 shadow-lg" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Why Choose Us Section -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center p-5 bg-white rounded-4 shadow-lg">
            <!-- Text Column -->
            <div class="col-md-6">
                <h3 class="text-primary fw-bold mb-4">Why Choose Us?</h3>
                <ul class="fs-5 text-muted list-unstyled">
                    <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-success me-2 fs-4"></i> Certified Beauty Experts</li>
                    <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-success me-2 fs-4"></i> Premium Products</li>
                    <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-success me-2 fs-4"></i> Relaxing Environment</li>
                    <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-success me-2 fs-4"></i> Affordable Pricing</li>
                    <li class="d-flex align-items-center"><i class="fas fa-check-circle text-success me-2 fs-4"></i> Personalized Treatments</li>
                </ul>
                <p class="mt-3 fs-5">📞 <strong>Contact us today</strong> to book your appointment!</p>
            </div>
            
            <!-- Image Column -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('admin/img/parlour1.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="Why Choose Us" style="max-height: 350px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>

@include('layout.footer')