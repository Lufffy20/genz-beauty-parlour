@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bridal Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bridal-services {
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

    <section class="bridal-services">
        <div class="container">
            <h1>Our Bridal Services</h1>
            <div class="services-list">
                
                <!-- Bridal Makeup -->
                <div class="service-item">
                    <div id="carouselBridalMakeup" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/bridalmakeup.jpg" alt="Bridal Makeup 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/bridalmakeup1.jpg" alt="Bridal Makeup 2">
                            </div>
                        </div>
                    </div>
                    <h2>💄 Bridal Makeup</h2>
                    <p>Enhance your beauty with our professional bridal makeup services.</p>
                    <a href="service-details?service=Bridal%20Services&subservice=Bridal%20Makeup" class="read-more-btn">Read More</a>
                </div>

                <!-- Bridal Hairstyling -->
                <div class="service-item">
                    <div id="carouselBridalHair" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/bridalhair.jpg" alt="Bridal Hairstyling 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/bridalhair1.jpg" alt="Bridal Hairstyling 2">
                            </div>
                        </div>
                    </div>
                    <h2>💇 Bridal Hairstyling</h2>
                    <p>Get the perfect bridal hairstyle to complement your wedding look.</p>
                    <a href="service-details?service=Bridal%20Services&subservice=Bridal%20Hairstyling" class="read-more-btn">Read More</a>
                </div>

                <!-- Bridal Mehndi -->
                <div class="service-item">
                    <div id="carouselBridalMehndi" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/bridalmehndi.jpg" alt="Bridal Mehndi 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/bridalmehndi1.jpg" alt="Bridal Mehndi 2">
                            </div>
                        </div>
                    </div>
                    <h2>🌿 Bridal Mehndi</h2>
                    <p>Make your wedding extra special with our intricate bridal Mehndi designs.</p>
                    <a href="service-details?service=Bridal%20Services&subservice=Bridal%20Mehndi" class="read-more-btn">Read More</a>
                </div>

                <!-- Pre-Wedding Skincare -->
                <div class="service-item">
                    <div id="carouselPreWedding" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/prewedding.jpg" alt="Pre-Wedding Skincare 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/prewedding1.jpg" alt="Pre-Wedding Skincare 2">
                            </div>
                        </div>
                    </div>
                    <h2>✨ Pre-Wedding Skincare</h2>
                    <p>Prepare your skin for the big day with our expert pre-wedding skincare treatments.</p>
                    <a href="service-details?service=Bridal%20Services&subservice=Pre-Wedding%20Skincare" class="read-more-btn">Read More</a>
                </div>

            </div>
        </div>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let carousels = document.querySelectorAll(".carousel");

        carousels.forEach((carousel, index) => {
            let bsCarousel = new bootstrap.Carousel(carousel, {
                interval: 3000, // 3 seconds interval for all carousels
                ride: "carousel"
            });
        });
    });
</script>


</body>
</html>


@include('layout.footer')