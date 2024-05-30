<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:signin.php");
}
include "connect.php";
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

    <!--font/logo-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Include the necessary CSS and JavaScript files for Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include the necessary CSS and JavaScript files for FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!--favicon-->
    <link rel="icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <title>NutriBooster-Be Healthier Be Stronger</title>
</head>


<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #2c1710;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgb(7, 2, 13), rgb(181, 59, 25));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgb(11, 7, 16), rgb(213, 56, 28))
    }
</style>

<body style="background-color:wheat; font-family: 'Montserrat', sans-serif;">

    <!--Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!--Navigation Bar ends-->



    <!-- cart section start -->
    <section class="h-100" style="background-image: url(assets/secondar-background.png);">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3" id="cart-count">
                            <!-- <h5 class="mb-0">cart - 0 Items</h5> -->
                        </div>
                        <div class="card-body" id="cart-section">

                        </div>
                    </div>
                    <!-- <div class="card mb-4">
                        <div class="card-body">
                            <p><strong>Expected shipping delivery</strong></p>
                            <p class="mb-0">12.07.2023 - 14.07.2023</p>
                        </div>
                    </div> -->
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>We accept</strong></p>
                            <i class="fab fa-cc-visa me-2" style="font-size: 45px;"></i>
                            <i class="fab fa-cc-amex me-2" style="font-size: 45px;"></i>
                            <i class="fab fa-cc-mastercard me-2" style="font-size: 45px;"></i>
                            <i class="fab fa-cc-paypal me-2" style="font-size: 45px;"></i>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <span>
                                        <p id="productDetail"></p>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Subtotal
                                    <span>
                                        <p id="subTotal"></p>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>
                                        <p id="shippingAmt"></p>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>
                                            <p id="totalAmt"></p>
                                        </strong></span>
                                </li>
                            </ul>
                            <a href="checkout.php?userID=<?php echo $_SESSION["user_id"] ?>" class="btn btn-danger btn-lg btn-block" id="checkoutBtn">Go To Checkout</a>
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


    <!--Script to go back to top-->
    <script src='js/backtotop.js'></script>
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
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            showCart();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>



</body>

</html>