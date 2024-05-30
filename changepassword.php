<?php
session_start();
if (!isset($_GET['email'])) {
    header("Location:forgotpassword.php");
}
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

    <!--font/logo-->
    <script src="https://kit.fontawesome.com/3be79051bf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Include the necessary CSS and JavaScript files for Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include the necessary CSS and JavaScript files for FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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


    <!-- Section: Change Password Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Change Password
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Enter your current password and new password to change your password.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <?php
                    if (isset($_SESSION['emailNotFound'])) {
                        echo '<script>';
                        echo 'document.addEventListener("DOMContentLoaded", function() {';
                        echo '  Swal.fire({';
                        echo '    title: "Oops!",';
                        echo '    text: "' . $_SESSION['emailNotFound'] . '",';
                        echo '    icon: "error",';
                        echo '    confirmButtonText: "OK"';
                        echo '  });';
                        echo '});';
                        echo '</script>';
                        unset($_SESSION['emailNotFound']);
                    }
                    ?>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form action="backend_file.php" method="POST" autocomplete="off" name="changePasswordForm">
                                <input type="hidden" name="changePassword" value="1">
                                <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                                <!-- New Password input -->
                                <div class="form-outline mb-4">
                                    <label for="newpassword" class="form-label">New password: <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Please enter new password." required>
                                </div>
                                <!-- Confirm New Password input -->
                                <div class="form-outline mb-4">
                                    <label for="confirmpassword" class="form-label">Confirm password: <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Please enter confirm password." required>
                                </div>
                                <!-- Change Password button -->
                                <button type="submit" class="btn btn-danger btn-block mb-4" id="changePasswordBtn">
                                    Change Password
                                </button>

                                <!-- Back to Profile link -->
                                <p class="opacity-70" style="color: hsl(220, 84%, 5%);">
                                    Remembered Password? <a href="signin.php" style="color: hsl(9, 89%, 31%);">Back To Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






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