<?php
include "connect.php";
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
  <link href="css/style.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
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

<body style="background:wheat; font-family: 'Montserrat', sans-serif;">

    <!--Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!--Navigation Bar ends-->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow animate__fadeIn" data-wow-duration="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 about-text">Blogs</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-danger active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- blog Content -->
    <div class="page-content">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $selectBlogQry = 'SELECT * FROM blogs WHERE id=?';
            $stmt = $con->prepare($selectBlogQry);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        }
        ?>

        <div class="container " id="blog-page-view">
            <div class="row blog-page">
                <div class="col-12 col-md-8 col-lg-8 m-auto">
                    <img src="assets/<?php echo $row['img']; ?>" alt="<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>" class="img-fluid">
                    <h2 class="blog-title"><?php echo $row['title']; ?></h2>
                    <div class="blog-date">
                        <p><b><i class="fa-regular fa-calendar"></i> &nbsp;<?php echo $row['date']; ?></b></p>
                    </div>
                    <div class="blog-content">
                        <p><?php echo $row['content']; ?></b></p>
                    </div>
                    <a href="blog.php" class="blog-btn">Go To Blogs</a>
                </div>
            </div>
        </div>
    </div>
    <!-- blog content ends -->


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