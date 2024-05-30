<!-- Footer Start -->
<div class="container-fluid text-light footer wow animate_fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-uppercase mb-4">Get In Touch</h4>
                <div class="d-flex align-items-center mb-2">
                    <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa fa-map-marker-alt text-danger"></span>
                    </div>
                    <span>Birmingham ,B45, UK</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa fa-phone-alt text-danger"></span>
                    </div>
                    <span>+44 19012 123456</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa fa-envelope-open text-danger"></span>
                    </div>
                    <span>info@nutriboost.com</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-uppercase mb-4">Quick Links</h4>
                <a class="btn btn-link" href="index.php">Home</a>
                <a class="btn btn-link" href="about.php">About Us</a>
                <a class="btn btn-link" href="shop.php">Shop with Us</a>
                <a class="btn btn-link" href="contactus.php">Contact Us</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-uppercase mb-4">Newsletter</h4>
                <?php
                if (isset($_SESSION['news_success'])) {
                    echo '<script>';
                    echo 'document.addEventListener("DOMContentLoaded", function() {';
                    echo '  Swal.fire({';
                    echo '    title: "Success",';
                    echo '    text: "' . $_SESSION['news_success'] . '",';
                    echo '    icon: "success",';
                    echo '    showConfirmButton: false,';
                    echo '    timer: 1000';
                    echo '  });';
                    echo '});';
                    echo '</script>';
                    unset($_SESSION['news_success']);
                }
                ?>
                <div class="position-relative mb-4">
                    <form action="backend_file.php" name="newsletterForm" method="POST">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" name="newsEmail"  placeholder="Your email">
                        <span id="newsEmailError" class="text-danger"></span>
                        <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <button type="submit" class="btn btn-primary bg-danger py-2 position-absolute top-0 end-0 mt-2 me-2" name="signup" id="newsletterBtn">Sign Up</button>
                    </form>
                </div>
                <div class="d-flex pt-1 m-n1">
                    <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.twitter.com/"><i class="fab fa-twitter text-danger"></i></a>
                    <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.facebook.com/"><i class="fab fa-facebook-f text-danger"></i></a>
                    <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.youtube.com/"><i class="fab fa-youtube text-danger"></i></a>
                    <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in text-danger"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <a class="border-bottom" href="">Nutribooster</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a class="border-bottom" href="index.php">Shouvik Das</a>
                    <br>Distributed By: <a class="border-bottom" href="index.php" target="_blank">Nutribooster</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->