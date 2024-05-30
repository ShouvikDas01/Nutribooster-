<?php session_start();
if (isset($_SESSION['review_success'])) {
  echo '<script>';
  echo 'document.addEventListener("DOMContentLoaded", function() {';
  echo '  Swal.fire({';
  echo '    title: "Success",';
  echo '    text: "' . $_SESSION['review_success'] . '",';
  echo '    icon: "success",';
  echo '    showConfirmButton: false,';
  echo '    timer: 1000';
  echo '  });';
  echo '});';
  echo '</script>';
  unset($_SESSION['review_success']);
} ?>
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!--font/logo-->
  <script src="https://kit.fontawesome.com/3be79051bf.js" crossorigin="anonymous"></script>
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


<body>
  <!--Navigation Bar-->
  <?php include 'navbar.php'; ?>
  <!--Navigation Bar ends-->

  <!-- Product Detail Section Start -->
  <div id="product-details-container" class="custom-card-wrapper">
    <?php
    // Include the database connection file
    include 'connect.php';

    // Check if a valid product ID is provided in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $productId = $_GET['id'];

      // Query to fetch product details from the database based on the provided product ID
      $query = "SELECT *
        FROM products 
        INNER JOIN products_images ON products.product_id = products_images.product_id
        WHERE products.product_id = $productId";

      $result = mysqli_query($con, $query);

      // Check if the query was successful
      if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>
        <div class="custom-card">
          <!-- card left -->
          <div class="custom-product-imgs">
            <div class="custom-img-display">
              <div class="custom-img-showcase">
                <!-- Display the main product image -->
                <img src="assets/<?php echo $row['primary_image']; ?>" alt="Product Image">
                <img src="assets/<?php echo $row['secondary_image1']; ?>" alt="Product Image">
                <img src="assets/<?php echo $row['secondary_image2']; ?>" alt="Product Image">
                <img src="assets/<?php echo $row['secondary_image3']; ?>" alt="Product Image">
              </div>
            </div>
            <div class="custom-img-select">
              <?php
              // Display primary image as well
              ?>
              <div class="custom-img-item">
                <a href="#" data-id="0">
                  <img src="assets/<?php echo $row['primary_image']; ?>" alt="Product Image" class="primary-image">
                </a>
              </div>
              <?php

              // Fetching secondary product images from the database
              for ($i = 1; $i <= 3; $i++) {
                $secondaryImage = $row['secondary_image' . $i];
                if (!empty($secondaryImage)) {
              ?>
                  <div class="custom-img-item">
                    <a href="#" data-id="<?php echo $i; ?>">
                      <img src="assets/<?php echo $secondaryImage; ?>" alt="Product Image">
                    </a>
                  </div>
              <?php
                }
              }
              ?>
            </div>
          </div>
          <div class="custom-product-content">
            <h2 class="custom-product-offer">Buy 1 Get 1 50% Off</h2>
            <h2 class="custom-product-title"><?php echo $row['product_name']; ?></h2>
            <div class="custom-product-rating">
              <?php
              $ratingValue = $row['rating']; // Assuming 'rating' is the column from your database that holds the rating value

              // Display full stars based on the rating value
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $ratingValue) {
                  echo '<i class="fas fa-star"></i>';
                } else {
                  echo '<i class="far fa-star"></i>';
                }
              }
              ?>
              <span><?php echo $ratingValue; ?></span>
            </div>

            <!-- <div class="custom-product-rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span>4.7(21)</span>
            </div> -->
            <div class="custom-product-price">
              <p class="custom-last-price">Old Price: <span><?php echo $row['old_price']; ?></span></p>
              <p class="custom-new-price">New Price: <span><?php echo $row['new_price']; ?> (<?php echo $row['discount']; ?>%)</span></p>
            </div>
            <div class="custom-product-detail">
              <h1>Descripton</h1>
              <p><?php echo $row['description']; ?></p>
              <ul>
                <li>Flavour: <span><?php echo $row['flavour']; ?></span></li>
                <li>Available: <span><?php echo $row['availability']; ?></span></li>
                <li>Category: <span><?php echo $row['category']; ?></span></li>
                <li>Type: <span><?php echo $row['type']; ?></span></li>
                <li>Weight: <span><?php echo $row['weight']; ?>lbs</span></li>
              </ul>
            </div>
            <div class="custom-purchase-info">
              <!-- Add-to-cart form -->
              <input type="hidden" name="product_id" id="product_id" value="<?php echo $row['product_id']; ?>">
              <input id="quantity-input" type="number" name="quantity" min="1" value="1">

              <?php if ($row['availability'] == 'In Stock') : ?>
                <button type="submit" class="custom-btn" onclick="addToCart()">Add to Cart <i class="fas fa-shopping-cart"></i></button>
              <?php else : ?>
                <button class="custom-btn" disabled>Out of Stock</button>
              <?php endif; ?>
            </div>

          </div>
        </div>
    <?php
      } else {
        echo "<p>Product not found.</p>";
      }
    } else {
      echo "<p>Invalid product ID.</p>";
    }
    ?>
  </div>
  <!-- product Detail Section ends -->


  <!-- Product Accordion review -->
  <div class="accordion mx-auto" style="max-width: 1055px;">
    <!-- Customer Reviews -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="reviewsHeading">
        <button class="accordion-button collapsed" style="font-weight: bold;" type="button" data-bs-toggle="collapse" data-bs-target="#reviewsCollapse" aria-expanded="false" aria-controls="reviewsCollapse">
          Customer Reviews
        </button>
      </h2>
      <div id="reviewsCollapse" class="accordion-collapse collapse" aria-labelledby="reviewsHeading">
        <div class="review-accordion-body">
          <?php
          // Fetching Reviews from the database
          $fetchReviewsQuery = "SELECT * FROM reviews WHERE product_id = $productId";;
          $result = mysqli_query($con, $fetchReviewsQuery);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="review">';
              echo '<div class="review-header">';
              echo '<h5>' . htmlspecialchars($row['review_title']) . '</h5>';
              echo '<div class="stars">';
              // Display rating stars based on the rating value (assuming rating is a number between 1 and 5)
              for ($i = 0; $i < $row['rating']; $i++) {
                echo '<i class="fas fa-star"></i>';
              }
              echo '</div>';
              echo '<p class="reviewer-name">By ' . htmlspecialchars($row['reviewer_name']) . '</p>';
              echo '</div>';
              echo '<p class="review-content">' . htmlspecialchars($row['review_content']) . '</p>';
              echo '</div>';
            }
          } else {
            echo '<p>No reviews available.</p>';
          }
          ?>
          <!-- Review Form -->
          <h4>Write a review</h4>
          <form id="reviewForm" method="post" action="backend_file.php">
            <input type="hidden" name="reviewForm" value="1">
            <input type="hidden" name="productId" value="<?php echo $_GET['id']; ?>">
            <div class="mb-3">
              <label for="reviewerName" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" required>
            </div>
            <div class="mb-3">
              <label for="reviewTitle" class="form-label">Review Title</label>
              <input type="text" class="form-control" id="reviewTitle" name="reviewTitle" placeholder="Title" required>
            </div>
            <div class="mb-3">
              <label for="userRating" class="form-label">Rating</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRating" id="rating1" value="1" required>
                <label class="form-check-label" for="rating1">1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRating" id="rating2" value="2">
                <label class="form-check-label" for="rating2">2</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRating" id="rating3" value="3">
                <label class="form-check-label" for="rating3">3</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRating" id="rating4" value="4">
                <label class="form-check-label" for="rating4">4</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="userRating" id="rating5" value="5">
                <label class="form-check-label" for="rating5">5</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="userReview" class="form-label">Your Review</label>
              <textarea class="form-control" id="userReview" name="userReview" rows="4" placeholder="Write Your Review here" required></textarea>
            </div>
            <button type="submit" class="custom-btn-hover">Submit Review</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Related Product slider -->
  <div class="related-products-slider">
    <h2><b>Related Products</b></h2>
    <div class="slider-wrapper">
      <div class="slider">
        <?php
        $productId = $_GET["id"];
        $selectedProductQuery = "SELECT category FROM products WHERE product_id = $productId";
        $selectedProductResult = $con->query($selectedProductQuery);

        if ($selectedProductResult->num_rows > 0) {
          $selectedProductRow = $selectedProductResult->fetch_assoc();
          $selectedCategory = $selectedProductRow["category"];

          $relatedProductsQuery = "SELECT * FROM products WHERE category = '$selectedCategory' AND product_id <> $productId";
          $relatedProductsResult = $con->query($relatedProductsQuery);

          if ($relatedProductsResult->num_rows > 0) {
            while ($row = $relatedProductsResult->fetch_assoc()) {
              echo '<div class="product-item" style="border-radius: 10px;">';
              echo '<img src="assets/' . $row["product_image"] . '" alt="' . $row["product_name"] . '". onclick="redirectToDescription(' . $row['product_id'] . ')">';
              echo '<h3>' . $row["product_name"] . '</h3>';
              echo '<div class="stars">';
              for ($i = 0; $i < $row["rating"]; $i++) {
                echo '<i class="fa-solid fa-star"></i>';
              }
              for ($i = 0; $i < 5 - $row["rating"]; $i++) {
                echo '<i class="fa-regular fa-star"></i>';
              }
              echo '</div>'; // Close the stars div
              echo '<p class="product-price">£' . $row["new_price"] . '</p>';
              echo '<button type="button" class="custom-btn-hover" onclick="addToCartShop(' . $row['product_id'] . ')">Add to Cart <i class="fas fa-shopping-cart"></i></button>';
              echo '</div>';
            }
          } else {
            echo "No related products found.";
          }
        } else {
          echo "Selected product not found.";
        }

        $con->close();
        ?>
      </div>
    </div>
  </div>



  <!-- Add navigation buttons outside the slider container -->
  <div class="slider-controls">
    <button class="prev-btn" onclick="slideLeft()">&#10094;</button>
    <button class="next-btn" onclick="slideRight()">&#10095;</button>
  </div>
  <!-- Related Product slider ends -->

  <!--Back to Top-->
  <a href="#" class="back-to-top" id="backToTopButton" title="Go to Top">↑</a>

  <!-- Footer Start -->
  <?php include 'footer.php'; ?>
  <!-- Footer End -->

  <!-- Scroll Animation -->
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <!-- Script for icons -->
  <script src="https://kit.fontawesome.com/3be79051bf.js" crossorigin="anonymous"></script>
  <!-- JS Dependencies for Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>