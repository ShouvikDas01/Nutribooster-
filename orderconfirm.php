<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NutriBooster is a health and fitness supplements brand that offers a wide range of products to help you stay healthy and strong.">
    <meta name="keywords" content="NutriBooster, health supplements, fitness products, nutrition, strength, wellness">
    <meta name="author" content="Nutribooster">
    <meta name="robots" content="index, follow">
    <!--CSS tag-->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!--font/logo-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Include the necessary CSS and JavaScript files for Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include the necessary CSS and JavaScript files for FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--favicon-->
    <link rel="icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <title>NutriBooster-Be Healthier Be Stronger</title>
</head>

<body style="background-image: url('./assets/secondar-background.png'); font-family: 'Montserrat', sans-serif;">

    <!--Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!--Navigation Bar ends-->

    <!-- Thank You Section Start -->
    <div class="container-xxl py-5">
        <div class="container text-center">
            <h1 class="thank-text mb-4">Thank You for Your Order!</h1>
            <p>Your order has been successfully placed. We deeply appreciate your business and the trust you've placed in us!</p>
            <p>We are committed to providing you with top-quality products and excellent customer service. If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
            <div class="mt-4">
                <a href="vieworder.php" class="custom-btn-order">View Orders</a>
                <a href="index.php" class="custom-btn-order">Continue Shopping</a>
            </div>
        </div>
    </div>
    <!-- Thank You Section End -->


    <!-- Nutribooster Testimonials -->
    <div class="container-xxl py-5">
        <div class="container text-center">
            <h2 class="thank-text mb-4">What Our Customers Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <figure class="snip1533">
                        <figcaption>
                            <blockquote>
                                <p>"Embracing a healthier lifestyle with Nutribooster has been a game-changer for me. Their products are top-notch and support my fitness journey perfectly."</p>
                            </blockquote>
                            <h3>Alexandra Turner</h3>
                            <h4>Fitness Enthusiast</h4>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4">
                    <figure class="snip1533">
                        <figcaption>
                            <blockquote>
                                <p>"Nutribooster's commitment to quality and wellness is truly inspiring. Their products have made a positive impact on my well-being, and I'm a loyal customer for life."</p>
                            </blockquote>
                            <h3>Michael Ramirez</h3>
                            <h4>Wellness Advocate</h4>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4">
                    <figure class="snip1533">
                        <figcaption>
                            <blockquote>
                                <p>"Discovering Nutribooster was a turning point in my fitness journey. Their products are not only effective but also delicious, making healthy living enjoyable!"</p>
                            </blockquote>
                            <h3>Sarah Bennett</h3>
                            <h4>Health Enthusiast</h4>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- Nutribooster Testimonials Ends -->



    <!--Description Bar-->
    <section class="services spad bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over $99</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    




    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->


    <!--Back to Top-->
    <a href="#" class="back-to-top" id="backToTopButton" title="Go to Top">↑</a>

    <!--Script to go back to top-->
    <script src='/js/backtotop.js'></script>
    <!-- Script for scroll animation -->
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Script for icons -->
    <script src="https://kit.fontawesome.com/3be79051bf.js" crossorigin="anonymous"></script>
    <!-- JS Dependencies for Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>