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
  <link rel="stylesheet" href="sweetalert2.min.css">

  <!-- Include the necessary CSS and JavaScript files for FontAwesome icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!--favicon-->
  <link rel="icon" href="assets/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">

  <title>NutriBooster-Be Healthier Be Stronger</title>
</head>

<body style="background-color:wheat; font-family: 'Montserrat', sans-serif;">

  <!--Navigation Bar-->
  <?php include 'navbar.php'; ?>
  <!--Navigation Bar ends-->




  <!-- Section: Forgot Password Block -->
  <section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Forgot Password
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Enter your email address to change your password.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">

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
            <div class="card-body px-4 py-5 px-md-5">
              <form id="forgotPasswordForm" action="backend_file.php" method="POST" autocomplete="off">
                <input type="hidden" name="forgotPassword" value="1">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  <span id="emailError" class="text-danger"></span>
                </div>

                <!-- Reset password button -->
                <button type="submit" class="btn btn-danger btn-block mb-4">
                  Reset Password
                </button>

                <!-- Back to Log In -->
                <p class="opacity-70" style="color: hsl(220, 84%, 5%); margin-bottom: 1rem;">
                  <a href="signin.php" style="color: hsl(9, 89%, 31%);">&larr; Back to Log In</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->





  <!-- Footer Start -->
  <?php include 'footer.php'; ?>
  <!-- Footer End -->

  <!-- Required script tags -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <script>
    $("#forgotPasswordForm").submit(function(event) {
      var email = $("#email").val();

      if (email.trim() === '') {
        $("#emailError").text("Email address is required.");
        event.preventDefault();
      } else {
        $("#emailError").text("");
      }
    });
  </script>
  <script src="js/main.js"></script>

</body>

</html>