<?php
session_start();
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
    <link href="./css/style.css" rel="stylesheet">

    <!--font/logo-->
    <script src="https://kit.fontawesome.com/3be79051bf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Include the necessary CSS and JavaScript files for Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include the necessary CSS and JavaScript files for FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Alert Animation -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!--favicon-->
    <link rel="icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">

    <title>NutriBooster-Be Healthier Be Stronger</title>
</head>

<body style="background-color:wheat; font-family: 'Montserrat', sans-serif;">

    <!--Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!--Navigation Bar ends-->


    <!-- Section: Sign In Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Get the Nutriboost Advantage<br />
                        <span style="color: hsl(218, 81%, 75%)">for Your Health</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Boost your health with Nutriboost's premium nutritional supplements. Our carefully
                        formulated products provide essential nutrients, vitamins, and minerals to support your
                        well-being. Experience the difference and start your journey towards a healthier lifestyle
                        today.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <?php
                    // If email and username exist alert
                    if (isset($_SESSION['email_exists']) || isset($_SESSION['username_exists'])) {
                        echo '<script>';
                        echo 'document.addEventListener("DOMContentLoaded", function() {';
                        echo '  Swal.fire({';
                        echo '    title: "Oops!",';
                        echo '    text: "' . (isset($_SESSION['email_exists']) ? $_SESSION['email_exists'] : $_SESSION['username_exists']) . '",';
                        echo '    icon: "error",';
                        echo '    confirmButtonText: "OK"';
                        echo '  });';
                        echo '});';
                        echo '</script>';
                        unset($_SESSION['email_exists']);
                        unset($_SESSION['username_exists']);
                    }
                    ?>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form id="registrationForm" action="backend_file.php" method="post" onsubmit="return validateRegister()">
                                <input type="hidden" name="registrationForm" value="1">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="first_name" id="form3Example1" class="form-control" placeholder="First name" />
                                            <label class="form-label" for="form3Example1"></label>
                                            <div class="error-text" id="errorFirstName"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="last_name" id="form3Example2" class="form-control" placeholder="Last name" />
                                            <label class="form-label" for="form3Example2"></label>
                                            <div class="error-text" id="errorLastName"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- username input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="form3Example3" class="form-control" placeholder="Username" />
                                    <label class="form-label" for="form3Example3"></label>
                                    <div class="error-text" id="errorUsername"></div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example4" class="form-control" placeholder="Email address" />
                                    <label class="form-label" for="form3Example4"></label>
                                    <div class="error-text" id="errorEmail"></div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form3Example5" class="form-control" placeholder="Password" />
                                    <label class="form-label" for="form3Example5"></label>
                                    <div class="error-text" id="errorPassword"></div>
                                </div>

                                <!-- Show Password checkbox -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                                    <label class="form-check-label" for="showPassword">Show Password</label>
                                </div>


                                <!-- Already have an Account? Log In -->
                                <p class="opacity-70" style="color: hsl(220, 84%, 5%); margin-bottom: 1rem;">
                                    Already have an Account? <a href="signin.php" style="color: hsl(9, 89%, 31%);">Log In</a>
                                </p>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-danger btn-block mb-4">
                                    Sign up
                                </button>
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->



    <!--Back to Top-->
    <a href="#" class="back-to-top" id="backToTopButton" title="Go to Top">↑</a>
    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->

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