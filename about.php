<?php session_start();
?>

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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!--font/logo-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Include the necessary CSS and JavaScript files for Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include the necessary CSS and JavaScript files for FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--favicon-->
    <link rel="icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <title>NutriBooster-Be Healthier Be Stronger</title>
</head>

<body style="background-image: url('assets/secondar-background.png'); font-family: 'Montserrat', sans-serif;">

    <!--Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!--Navigation Bar ends-->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow animate__fadeIn" data-wow-duration="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 about-text">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-danger active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow animate__fadeIn" data-wow-duration="2s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="assets/c2.png" alt="">
                        <div class="w-50 bg-dark p-5" style="margin-top: -25%;">
                            <h1 class="text-uppercase text-danger mb-3 about-text">15 Years</h1>
                            <h2 class="text-uppercase text-secondary mb-0">Excellency</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow animate__fadeIn" data-wow-duration="2s">
                    <p class="d-inline-block bg-dark text-danger py-1 px-4 about-text">About Us</p>
                    <h1 class="text-uppercase mb-4 about-text wow animate__fadeInRight" data-wow-duration="2s">More Than Just A Supplement. Learn More About Nutribooster!</h1>
                    <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">Since 2008</h3>
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">10000+ Customers</h3>
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Partners Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5wow animate__fadeInUp" data-wow-duration="2s" style="max-width: 600px;">
                <p class="d-inline-block bg-dark text-danger py-1 px-4 about-text">Our Partners</p>
                <h1 class="text-uppercase about-text">Meet Our Partners</h1>
            </div>
            <?php
            include "connect.php";
            // Fetch data from the database
            $sql = "SELECT * FROM about_partners";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="row">';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-3 col-md-6 wow animate__fadeInUp" data-wow-duration="' . $row['animation_duration'] . 's">';
                    echo '<div class="team-item">';
                    echo '<div class="team-img position-relative overflow-hidden">';
                    echo '<img class="img-fluid" src="assets/' . $row['partner_image'] . '" alt="' . $row['partner_name'] . '">';
                    echo '<div class="team-social">';
                    echo '<a class="btn btn-square" href="' . $row['facebook_url'] . '"><i class="fab fa-facebook-f"></i></a>';
                    echo '<a class="btn btn-square" href="' . $row['twitter_url'] . '"><i class="fab fa-twitter"></i></a>';
                    echo '<a class="btn btn-square" href="' . $row['instagram_url'] . '"><i class="fab fa-instagram"></i></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="bg-dark text-center p-4">';
                    echo '<h5 class="text-uppercase text-light">' . $row['partner_name'] . '</h5>';
                    echo '<span class="text-danger">Premium Partner</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>'; // Close the row container
            } else {
                echo "No team members found.";
            }
            
            // Step 5: Close the database connection
            $con->close(); ?>
            <div class="row g-4">
            </div>
        </div>
    </div>
    <!-- Partners End -->


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>