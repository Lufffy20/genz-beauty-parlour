@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .makeup-services {
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

    <section class="makeup-services">
        <div class="container">
            <h1>Our Makeup Services</h1>
            <div class="services-list">
                
                <!-- Marriage Makeup -->
                <div class="service-item">
                    <div id="carouselMarriage" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/marriage-makeup1.jpg" alt="Marriage Makeup 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/marriage-makeup2.jpg" alt="Marriage Makeup 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselMarriage" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselMarriage" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>👰 Marriage Makeup</h2>
                    <p>Get the perfect bridal look with our expert makeup artists.</p>
                    <a href="service-details?service=marriage-makeup" class="read-more-btn">Read More</a>
                </div>
                
                <!-- Party Makeup -->
                <div class="service-item">
                    <div id="carouselParty" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/party-makeup1.jpg" alt="Party Makeup 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/party-makeup2.jpg" alt="Party Makeup 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselParty" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselParty" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🎉 Party Makeup</h2>
                    <p>Look stunning for any event with our professional party makeup.</p>
                    <a href="service-details?service=party-makeup" class="read-more-btn">Read More</a>
                </div>

                <!-- HD Makeup -->
                <div class="service-item">
                    <div id="carouselHDMakeup" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/hd-makeup1.jpg" alt="HD Makeup 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/hd-makeup2.jpg" alt="HD Makeup 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselHDMakeup" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselHDMakeup" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>📸 HD Makeup</h2>
                    <p>Flawless high-definition makeup for a picture-perfect look.</p>
                    <a href="service-details?service=hd-makeup" class="read-more-btn">Read More</a>
                </div>

                <!-- Airbrush Makeup -->
                <div class="service-item">
                    <div id="carouselAirbrushMakeup" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/img/airbrush-makeup1.jpg" alt="Airbrush Makeup 1">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/img/airbrush-makeup2.jpg" alt="Airbrush Makeup 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselAirbrushMakeup" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselAirbrushMakeup" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                    <h2>🎨 Airbrush Makeup</h2>
                    <p>Lightweight, long-lasting airbrush makeup for a smooth and natural finish.</p>
                    <a href="service-details?service=airbrush-makeup" class="read-more-btn">Read More</a>
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
