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

<body style="background-color:#1b2741; font-family: 'Montserrat', sans-serif;">

  <!-- navigation bar start -->
  <?php include 'navbar.php'; ?>
  <!-- navigation bar ends -->


  <!-- Header text/Image -->
  <div class="head-image">
    <img src="./assets/h22.png">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <p class="head-para wow animate__fadeInRight" data-wow-duration="2s">Health & Fitness <br>
            Supplements
          </p>
          <h3 class="animate-character ">Best<br>Price</h3>
          <br>
          <p class="head-para wow animate__fadeInRight" data-wow-duration="2s">Order before 12th August<br> to get £20 gift card <br>on order above £50
          </p>
        </div>
      </div>
      <a href="shop.php"><button class="custom-button">Shop Now</button></a>
    </div>
  </div>






  <!--Product ad grid-->
  <div class="grid-container">
    <div class="grid-item">
      <a href="shop.php"><img src="./assets/b2.png" alt=""></a>
    </div>
    <div class="grid-item">
      <a href="shop.php"><img src="./assets/b1.png" alt=""></a>
    </div>
  </div>


  <!--Product ad carousel-->
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/d1.png" alt="productad1">
        <div class="carousel-caption">
          <div class="carousel-text wow animate__fadeInRight" data-wow-duration="2s">Explore our variety of supplement ranges</div>
          <a href="shop.php"><button class="carousel-button btn btn-primary">Explore Now</button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/d2.png" alt="productad2">
        <div class="carousel-caption">
          <div class="carousel-text">Explore our variety of supplement ranges</div>
          <a href="shop.php"><button class="carousel-button btn btn-primary">Explore Now</button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/d1.png" alt="productad3">
        <div class="carousel-caption">
          <div class="carousel-text">Explore our variety of supplement ranges</div>
          <a href="shop.php"><button class="carousel-button btn btn-primary">Explore Now</button></a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <!--Product Info-->
  <div class="product-container">
    <div class="product-header">
      <h1 style="font-weight: bolder;">Trending Products</h1>
    </div>

    <div class="products">
      <?php
      include "connect.php";

      $query = "SELECT * FROM products WHERE cat_id = 3 LIMIT 3";
      $result = $con->query($query);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product">';
          echo '<div class="image">';
          echo '<img src="assets/' . $row["product_image"] . '" alt="" onclick="redirectToDescription(' . $row['product_id'] . ')">';
          echo '</div>';
          echo '<div class="namePrice">';
          echo '<h3>' . $row["product_name"] . '</h3>';
          echo '<span>£' . $row["new_price"] . '</span>';
          echo '</div>';
          // echo '<p>' . $row["description"] . '</p>';
          echo '<div class="stars">';
          for ($i = 0; $i < $row["rating"]; $i++) {
            echo '<i class="fa-solid fa-star"></i>';
          }
          for ($i = 0; $i < 5 - $row["rating"]; $i++) {
            echo '<i class="fa-regular fa-star"></i>';
          }
          echo '</div>';
          echo '<div class="bay">';
          echo '<button type="button"  onclick="addToCartShop(' . $row['product_id'] . ')">Add to Cart <i class="fas fa-shopping-cart"></i></button>'; // Link to add to cart
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "No products found.";
      }

      $con->close();
      ?>
    </div>
  </div>

  <!--Separater bar starts-->
  <div class="sep-bar">
    <div class="container">
      <div class="sep-bar-text">
        <p>Limited Time Offer: Buy 1 Pre Workout, Get Multivitamins Absolutely Free!</p>
      </div>
    </div>
  </div>
  <!--Separater bar ends-->

  <!-- Explore Products -->
  <section class="section" id="explore" style="background-image: url('./assets/secondar-background.png');">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-content ">
            <h2 class="wow animate__fadeInLeft" data-wow-duration="2s">Proven Nutrition and Muscle Building Supplements</h2>
            <span class="wow animate__fadeInRight" data-wow-duration="2s">Experience the power of NutriBoost's high-quality nutrition and fitness supplements to enhance your health and strength.</span>
            <div class="quote">
              <i class="fa fa-quote-left"></i>
              <p class="wow animate__fadeInRight" data-wow-duration="2s">Your journey towards a healthier lifestyle starts here.</p>
            </div>
            <p class="wow animate__fadeInLeft" data-wow-duration="2s">We offer a wide range of scientifically formulated products to support your nutrition and muscle-building goals. With NutriBoost, you can achieve your fitness milestones with confidence.</p>
            <p class="wow animate__fadeInLeft" data-wow-duration="2s">Invest in your health and start seeing the results today.</p>
            <div class="main-border-button">
              <a href="shop.php">Discover More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-content">
            <div class="flexbox-container ">
              <div class="flexbox-item">
                <img src="./assets/c2.png" alt="Product 1">
              </div>
              <div class="flexbox-item">
                <img src="./assets/c1.png" alt="Product 2">
              </div>
              <div class="flexbox-item ">
                <img src="./assets/c1.png" alt="Product 3">
              </div>
              <div class="flexbox-item ">
                <img src="./assets/c2.png" alt="Product 4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Explore product ends-->

  <!--Separator bar starts -->
  <div class="sep-bar1">
    <div class="container">
      <div class="sep-bar1-text">
        <p>Buy 1 Protein Powder, Get Shaker Bottle for Free!</p>
      </div>
    </div>
  </div>
  <!--Separator bar ends-->


  <!-- Partners Section-->
  <section class="partners-section" style="background-image: url(assets/Health%20%26%20Fitness%20Supplements.png);">
    <div class="container">
      <h2 class="section-heading">Our Partners</h2>
      <?php
      include "connect.php";
      // Fetch partner logos from the database
      $sql = "SELECT * FROM partners";
      $result = mysqli_query($con, $sql);

      // Store the logos in an array
      $partnerLogos = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $partnerLogos[] = $row['img'];
      }

      // Close the database connection
      mysqli_close($con);
      ?>

      <div class="partners-logos">
        <?php
        foreach ($partnerLogos as $partnerlogoUrl) {
          echo '<img src="assets/' . $partnerlogoUrl . '" alt="Company Logo" class="partner-logo">';
        }
        ?>
      </div>
    </div>
  </section>
  <!--Partners section end-->

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