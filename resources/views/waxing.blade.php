@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waxing Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .waxing-services {
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
            transition: transform 0.3s ease-in-out;
        }

        .service-item:hover {
            transform: scale(1.05);
        }

        .carousel-inner img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
        }

        .read-more-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            background: linear-gradient(45deg, #FFD700, #FFC107);
            color: black;
            transition: 0.3s ease-in-out;
        }

        .read-more-btn:hover {
            background: linear-gradient(45deg, #FFC107, #FFA500);
        }
    </style>
</head>
<body>

    <section class="waxing-services">
        <div class="container">
            <h1>Our Waxing Services</h1>
            <div class="services-list">
                
                <!-- Full Body Waxing -->
                <div class="service-item">
                    <div id="carouselFullBodyWaxing" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/full-body-wax1.jpg" alt="Full Body Waxing 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/full-body-wax2.jpg" alt="Full Body Waxing 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselFullBodyWaxing" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselFullBodyWaxing" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🛀 Full Body Waxing</h2>
                    <p>Experience smooth, hair-free skin with our full-body waxing service.</p>
                    <a href="service-details?service=Full Body Waxing" class="read-more-btn">Read More</a>
                </div>

                <!-- Chocolate Waxing -->
                <div class="service-item">
                    <div id="carouselChocolateWaxing" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/chocolate-wax1.jpg" alt="Chocolate Waxing 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/chocolate-wax2.jpg" alt="Chocolate Waxing 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselChocolateWaxing" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselChocolateWaxing" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🍫 Chocolate Waxing</h2>
                    <p>Enjoy a luxurious waxing experience with our nourishing chocolate wax.</p>
                    <a href="service-details?service=Chocolate Waxing" class="read-more-btn">Read More</a>
                </div>

                <!-- Laser Hair Removal -->
                <div class="service-item">
                    <div id="carouselLaserHairRemoval" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/laser-hair-removal1.jpg" alt="Laser Hair Removal 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/laser-hair-removal2.jpg" alt="Laser Hair Removal 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselLaserHairRemoval" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselLaserHairRemoval" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>💡 Laser Hair Removal</h2>
                    <p>Permanently reduce hair growth with our advanced laser hair removal treatments.</p>
                    <a href="service-details?service=Laser Hair Removal" class="read-more-btn">Read More</a>
                </div>

            </div>
        </div>
    </section>

</body>
</html>

@include('layout.footer')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let carousels = document.querySelectorAll(".carousel");
        carousels.forEach(carousel => {
            new bootstrap.Carousel(carousel, {
                interval: 3000,
                ride: "carousel"
            });
        });
    });
</script>
