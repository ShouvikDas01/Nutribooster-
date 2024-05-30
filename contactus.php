<?php session_start(); ?>
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
    <!--font/logo-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- sweet alert -->
    <link rel="stylesheet" href="sweetalert2.min.css">
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

<body style="background-image:url(assets/secondar-background.png); font-family: 'Montserrat', sans-serif;">

    <!--Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!--Navigation Bar ends-->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow animate__fadeIn" data-wow-duration="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 about-text">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-danger active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 wow animate__fadeIn" data-wow-duration="2s">
                    <div class="bg-dark p-5">
                        <?php
                        if (isset($_SESSION['contact_success'])) {
                            echo '<script>';
                            echo 'document.addEventListener("DOMContentLoaded", function() {';
                            echo '  Swal.fire({';
                            echo '    title: "Success",';
                            echo '    text: "' . $_SESSION['contact_success'] . '",';
                            echo '    icon: "success",';
                            echo '    showConfirmButton: false,';
                            echo '    timer: 1000';
                            echo '  });';
                            echo '});';
                            echo '</script>';
                            unset($_SESSION['contact_success']);
                        }
                        ?>
                        <p class="d-inline-block bg-dark text-danger py-1 px-4">Contact Us</p>
                        <h1 class="text-uppercase text-light mb-4 wow animate__fadeInLeft" data-wow-duration="2s">Have Any Query? Please Contact Us!</h1>
                        <!-- <p class="text-light mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done.</p> -->
                        <form id="contactUs" action="backend_file.php" method="post" onsubmit="return validateContactUs()">
                            <input type="hidden" name="contactUs" value="1">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                        <span id="emailError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light" id="subject" name="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                        <span id="subjectError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-light" placeholder="Leave a message here" id="message" name="message" style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                        <span id="messageError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-danger w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">

                    <div class="h-100" style="min-height: 400px;">
                        <iframe class="google-map w-100 h-100" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=15%20Bartholomew%20Row%2C%20Birmingham%20B5%205JU+(Title)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0" style="filter: grayscale(100%) invert(92%) contrast(83%); border: 0;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->






    <!--Back to Top-->
    <a href="#" class="back-to-top" id="backToTopButton" title="Go to Top">↑</a>


    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->


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