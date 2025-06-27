@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Henna & Mehndi Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>

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
    </style>
</head>
<body>

    <section class="hair-services">
        <div class="container">
            <h1>Our Henna & Mehndi Services</h1>
            <div class="services-list">

                <!-- Traditional Mehndi -->
                <div class="service-item">
                    <div id="carouselTraditional" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/traditional1.jpg" alt="Traditional Mehndi 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/traditional2.jpg" alt="Traditional Mehndi 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselTraditional" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselTraditional" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🌿 Traditional Mehndi</h2>
                    <p>Embrace cultural beauty with our exquisite traditional Mehndi designs.</p>
                    <a href="service-details?service=Henna & Mehndi&subservice=Traditional Mehndi" class="read-more-btn">Read More</a>
                </div>

                <!-- Bridal Mehndi -->
                <div class="service-item">
                    <div id="carouselBridal" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/bridal1.jpg" alt="Bridal Mehndi 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/bridal2.jpg" alt="Bridal Mehndi 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselBridal" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselBridal" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>👰 Bridal Mehndi</h2>
                    <p>Make your big day even more special with our stunning bridal Mehndi art.</p>
                    <a href="service-details?service=Henna & Mehndi&subservice=Bridal Mehndi" class="read-more-btn">Read More</a>
                </div>

                <!-- Arabic Mehndi -->
                <div class="service-item">
                    <div id="carouselArabic" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/arabic1.jpg" alt="Arabic Mehndi 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/arabic2.jpg" alt="Arabic Mehndi 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselArabic" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselArabic" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🌺 Arabic Mehndi</h2>
                    <p>Get beautifully intricate Arabic Mehndi patterns for any occasion.</p>
                    <a href="service-details?service=Henna & Mehndi&subservice=Arabic Mehndi" class="read-more-btn">Read More</a>
                </div>

                <!-- Tattoo Mehndi -->
                <div class="service-item">
                    <div id="carouselTattoo" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="admin/img/tattoo1.jpg" alt="Tattoo Mehndi 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="admin/img/tattoo2.jpg" alt="Tattoo Mehndi 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselTattoo" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselTattoo" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🎨 Tattoo Mehndi</h2>
                    <p>Try modern and stylish tattoo-style Mehndi designs that last for weeks.</p>
                    <a href="service-details?service=Henna & Mehndi&subservice=Tattoo Mehndi" class="read-more-btn">Read More</a>
                </div>

            </div>
        </div>
    </section>

</body>
</html>

@include('layout.footer')
