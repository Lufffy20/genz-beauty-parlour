@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facial Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
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

        .carousel-item {
            transition: opacity 1s ease-in-out;
        }

        .read-more-btn {
            background: linear-gradient(45deg, #FFD700, #FFC107);
            color: black;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            transition: 0.3s ease-in-out;
        }

        .read-more-btn:hover {
            background: linear-gradient(45deg, #FFC107, #FFA500);
        }
    </style>
</head>
<body>

    <section class="hair-services">
        <div class="container">
            <h1>Our Eyebrow & Lash Services</h1>
            <div class="services-list">

                <!-- Eyebrow Threading -->
                <div class="service-item">
                    <div id="carouselThreading" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/threading.jpg" alt="Eyebrow Threading 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/threading1.jpg" alt="Eyebrow Threading 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselThreading" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselThreading" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🌿 Eyebrow Threading</h2>
                    <p>Get perfectly shaped eyebrows with our precise threading services.</p>
                    <a href="#" class="read-more-btn">Read More</a>
                </div>

                <!-- Microblading -->
                <div class="service-item">
                    <div id="carouselMicroblading" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/microblading.jpg" alt="Microblading 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/microblading1.jpg" alt="Microblading 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselMicroblading" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselMicroblading" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>✨ Microblading</h2>
                    <p>Achieve natural-looking, fuller eyebrows with our expert microblading techniques.</p>
                    <a href="#" class="read-more-btn">Read More</a>
                </div>

                <!-- Lash Extensions -->
                <div class="service-item">
                    <div id="carouselLash" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/lashextensions.jpg" alt="Lash Extensions 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/lashextensions1.jpg" alt="Lash Extensions 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselLash" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselLash" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🧖 Lash Extensions</h2>
                    <p>Enhance your natural beauty with professionally applied lash extensions.</p>
                    <a href="#" class="read-more-btn">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let carousels = document.querySelectorAll(".carousel");
            carousels.forEach((carousel, index) => {
                new bootstrap.Carousel(carousel, {
                    interval: (index + 1) * 3000,
                    ride: "carousel"
                });
            });
        });
    </script>
</body>
</html>

@include('layout.footer')