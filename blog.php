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

<body style="background-image:url('assets/Health\ &\ Fitness\ Supplements.png'); font-family: 'Montserrat', sans-serif;">

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



    <!-- Blog Section Begin -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="blog-sidebar-item">
                            <h4>RECENT BLOGS</h4>
                            <div class="blog-sidebar-recent">
                                <?php
                                // Include the database connection file
                                include 'connect.php';

                                // Query to fetch recent blog posts from the database
                                $query = "SELECT * FROM blogs ORDER BY date DESC LIMIT 3";
                                $result = mysqli_query($con, $query);

                                // Check if there are any blog posts
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <a href="#" class="blog-sidebar-recent-item">
                                            <div class="blog-sidebar-recent-item-text">
                                                <h6><?php echo $row['title']; ?></h6>
                                                <span><?php echo date('M d, Y', strtotime($row['date'])); ?></span>
                                            </div>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="blog-sidebar-item">
                            <h4>ADVERTISEMENT</h4>
                            <div class="ad-column">
                                <a href="shop.php"><img src="assets/ad1.png" alt="Ad 1"></a>
                            </div>
                            <div class="ad-column">
                                <a href="shop.php"><img src="assets/ad2.jpeg" alt="Ad 2"></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <?php
                        // Fetch blog posts from the database
                        $query = "SELECT * FROM blogs ORDER BY date DESC LIMIT 4";
                        $result = mysqli_query($con, $query);

                        // Check if there are any blog posts
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog-item">
                                        <div class="blog-item-pic">
                                            <img src="assets/<?php echo $row['img']; ?>" alt="<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>" class="img-fluid">
                                        </div>
                                        <div class="blog-item-text">
                                            <h5><a href="#"><?php echo $row['title']; ?></a></h5>
                                            <p><?php echo substr($row['content'], 0, 100) . '...'; ?></p>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> <?php echo date('M d, Y', strtotime($row['date'])); ?></li>
                                            </ul>
                                            <a href="blog-page.php?id=<?php echo $row['id'] ?>" class="blog-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->






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