


<!-- Our Services Section (Boxed) --><!-- Our Services Section (Boxed) -->
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
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/layered-cut.jpg') }}" class="img-fluid rounded-4" alt="Layered Cut">
                <h4 class="mt-3 fw-bold">Layered Cut</h4>
                <p class="text-muted">Adds volume and dimension with soft layers.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/v-cut.jpg') }}" class="img-fluid rounded-4" alt="V-Cut">
                <h4 class="mt-3 fw-bold">V-Cut</h4>
                <p class="text-muted">Sharp, angled cut for a sleek and stylish look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/bob-cut.jpg') }}" class="img-fluid rounded-4" alt="Bob Cut">
                <h4 class="mt-3 fw-bold">Bob Cut</h4>
                <p class="text-muted">Chic and modern bob styles for a trendy look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/pixie-cut.jpg') }}" class="img-fluid rounded-4" alt="Pixie Cut">
                <h4 class="mt-3 fw-bold">Pixie Cut</h4>
                <p class="text-muted">Short and edgy haircut for a bold statement.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/feather-cut.jpg') }}" class="img-fluid rounded-4" alt="Feather Cut">
                <h4 class="mt-3 fw-bold">Feather Cut</h4>
                <p class="text-muted">Light, flowy layers for a soft and elegant look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/step-cut.jpg') }}" class="img-fluid rounded-4" alt="Step Cut">
                <h4 class="mt-3 fw-bold">Step Cut</h4>
                <p class="text-muted">Layered haircut with defined steps for extra bounce.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item female">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/fringe-cut.jpg') }}" class="img-fluid rounded-4" alt="Fringe Cut">
                <h4 class="mt-3 fw-bold">Fringe Cut</h4>
                <p class="text-muted">Adds stylish bangs or fringes for a trendy look.</p>
                <a href="{{ url('/appointment') }}?service=Hair%20Services&subservice=Hair%20Cut" class="btn btn-custom mt-2">Book Appointment</a>
            </div>
        </div>
        <div class="col-md-4 service-item male">
            <div class="service-box text-center p-4 shadow-lg rounded-4 bg-white">
                <img src="{{ asset('admin/img/undercut.jpg') }}" class="img-fluid rounded-4" alt="Undercut">
                <h4 class="mt-3 fw-bold">Undercut</h4>
                <p class="text-muted">Short, modern cut with shaved sides for a bold look.</p>
                <a href="{{ url('/appointment') }}?service=Facial%20Services&subservice=Skin%20Treatment" class="btn btn-custom mt-2">Book Appointment</a>

            </div>
        </div>
    </div>
</div>




<style>


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