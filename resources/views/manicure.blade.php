@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manicure & Pedicure Services</title>
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
            <h1>Our Manicure & Pedicure Services</h1>
            <div class="services-list">

                <!-- Basic Manicure -->
                <div class="service-item">
                    <div id="carouselManicure" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/manicure1.jpg" alt="Basic Manicure 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/manicure2.jpg" alt="Basic Manicure 2">
                            </div>
                        </div>
                    </div>
                    <h2>💅 Basic Manicure</h2>
                    <p>Keep your nails neat and healthy with our essential manicure service.</p>
                    <a href="service-details?service=Basic Manicure" class="read-more-btn">Read More</a>
                </div>

                <!-- Spa Pedicure -->
                <div class="service-item">
                    <div id="carouselPedicure" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/pedicure1.jpg" alt="Spa Pedicure 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/pedicure2.jpg" alt="Spa Pedicure 2">
                            </div>
                        </div>
                    </div>
                    <h2>🦶 Spa Pedicure</h2>
                    <p>Pamper your feet with a relaxing and rejuvenating spa pedicure.</p>
                    <a href="service-details?service=Spa Pedicure" class="read-more-btn">Read More</a>
                </div>

                <!-- Nail Art -->
                <div class="service-item">
                    <div id="carouselNailArt" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/nailart1.jpg" alt="Nail Art 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/nailart2.jpg" alt="Nail Art 2">
                            </div>
                        </div>
                    </div>
                    <h2>🎨 Nail Art</h2>
                    <p>Add creativity and flair to your nails with our professional nail art designs.</p>
                    <a href="service-details?service=Nail Art" class="read-more-btn">Read More</a>
                </div>

                <!-- Gel Nails -->
                <div class="service-item">
                    <div id="carouselGelNails" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/gelnails1.jpg" alt="Gel Nails 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/gelnails2.jpg" alt="Gel Nails 2">
                            </div>
                        </div>
                    </div>
                    <h2>💎 Gel Nails</h2>
                    <p>Enjoy long-lasting, glossy nails with our high-quality gel nail treatments.</p>
                    <a href="service-details?service=Gel Nails" class="read-more-btn">Read More</a>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let carousels = document.querySelectorAll(".carousel");

            carousels.forEach((carousel, index) => {
                let bsCarousel = new bootstrap.Carousel(carousel, {
                    interval: (index + 1) * 3000, // Each carousel has a different interval
                    ride: "carousel"
                });
            });
        });
    </script>

</body>
</html>

@include('layout.footer')