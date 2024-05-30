<?php
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
  <!-- Alert Animation -->
  <link rel="stylesheet" href="sweetalert2.min.css">
  <!--favicon-->
  <link rel="icon" href="assets/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
  <title>NutriBooster-Be Healthier Be Stronger</title>
</head>



<body>

  <!--Navigation Bar-->
  <?php include 'navbar.php'; ?>
  <!--Navigation Bar ends-->


  <!-- Page Header Start -->
  <div class="container-fluid page-header py-5 mb-5 animate__animated animate__fadeIn" data-wow-duration="2s">
    <div class="container text-center py-5">
      <h1 class="display-3 text-white text-uppercase mb-3 about-text">SHOP WITH US</h1>
      <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb justify-content-center text-uppercase mb-0">
          <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
          <li class="breadcrumb-item text-danger active" aria-current="page">Shop</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- Page Header End -->


  <!-- Product List Start -->
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="sidebar">
          <h2>Filter</h2>
          <div class="accordion">
            <div class="accordion-title">
              Shop by Category
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="accordion-content">
              <!-- Product Category -->
              <ul class="category-list">
                <li><input type="checkbox" id="chkProtein" onclick="updateFilters()"> Protein</li>
                <li><input type="checkbox" id="chkPreWorkout" onclick="updateFilters()"> Pre-Workout</li>
                <li><input type="checkbox" id="chkPostWorkout" onclick="updateFilters()"> Post-Workout</li>
                <li><input type="checkbox" id="chkMuscleBuilding" onclick="updateFilters()"> Muscle Building</li>
                <li><input type="checkbox" id="chkWeightLoss" onclick="updateFilters()"> Weight Loss</li>
                <li><input type="checkbox" id="chkVitaminSupplement" onclick="updateFilters()"> Vitamins & Supplements</li>
              </ul>
            </div>
          </div>
          <hr class="separator">
          <div class="accordion">
            <div class="accordion-title">
              Shop by Brand
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="accordion-content">
              <!-- brand category -->
              <ul class="brand-list">
                <li><input type="checkbox" id="chkON" onclick="updateFilters()"> Optimum Nutrition</li>
                <li><input type="checkbox" id="chkMT" onclick="updateFilters()"> MuscleTech</li>
                <li><input type="checkbox" id="chkNV" onclick="updateFilters()"> NastyVegan</li>
                <li><input type="checkbox" id="chkPW" onclick="updateFilters()"> Protein Works</li>
                <li><input type="checkbox" id="chkMP" onclick="updateFilters()"> MyProtein</li>
                <li><input type="checkbox" id="chkGen" onclick="updateFilters()"> Generic</li>
              </ul>
            </div>
          </div>
          <hr class="separator">
          <div class="accordion">
            <div class="accordion-title">
              Shop by Price Range
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="accordion-content">
              <!-- Price Range -->
              <ul class="price-range-list">
                <li><input type="checkbox" id="chkPriceUnder20" onclick="updateFilters()"> Under £20</li>
                <li><input type="checkbox" id="chkPrice20to50" onclick="updateFilters()"> £20 - £50</li>
                <li><input type="checkbox" id="chkPrice50to100" onclick="updateFilters()"> £50 - £100</li>
                <li><input type="checkbox" id="chkPrice100to200" onclick="updateFilters()"> £100 - £200</li>
                <li><input type="checkbox" id="chkPriceAbove200" onclick="updateFilters()"> £200 and above</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div id="best-sellers-section">
          <!-- Best Sellers products code here -->
          <h3 class="product-heading" style="font-weight: bold">Best Sellers</h3>
          <div class="card-container d-flex flex-wrap justify-content-center">
            <?php
            // Perform a database query to fetch best selling products
            $bestSellersQuery = "SELECT * FROM products WHERE cat_id = 1"; // Adjust the category_id
            $bestSellersResult = mysqli_query($con, $bestSellersQuery);

            while ($product = mysqli_fetch_assoc($bestSellersResult)) {
            ?>
              <div class="product-card">
                <a href="description.php?id=<?php echo $product['product_id']; ?>">
                  <img class="product-image" src="assets/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                </a>
                <div class="sale-overlay">Sale</div>
                <div class="name"><?php echo $product['product_name']; ?></div>
                <div class="stars">
                  <?php for ($i = 0; $i < $product["rating"]; $i++) { ?>
                    <i class="fa-solid fa-star"></i>
                  <?php } ?>
                  <?php for ($i = 0; $i < 5 - $product["rating"]; $i++) { ?>
                    <i class="fa-regular fa-star"></i>
                  <?php } ?>
                </div>
                <?php if ($product['availability'] == 'In Stock') : ?>
                  <div class="price">£<?php echo $product['new_price']; ?></div>
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']; ?>">
                  <button type="submit" class="custom-btn-hover" onclick="addToCartShop(<?php echo $product['product_id']; ?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                <?php else : ?>
                  <div class="price">£<?php echo $product['new_price']; ?></div>
                  <div class="custom-btn-hover" aria-disabled="">Out of Stock</div>
                <?php endif; ?>
              </div>


            <?php
            }
            ?>
          </div>
        </div>
        <div id="featured-products-section">
          <!-- Featured Products products code -->
          <h3 class="product-heading" style="font-weight: bold">Featured Products</h3>
          <div class="card-container d-flex flex-wrap justify-content-center">
            <?php
            // Performing database query to fetch featured products
            $featuredProductsQuery = "SELECT * FROM products WHERE cat_id = 2 "; 
            $featuredProductsResult = mysqli_query($con, $featuredProductsQuery);
            while ($product = mysqli_fetch_assoc($featuredProductsResult)) {
            ?>
              <div class="product-card">
                <a href="description.php?id=<?php echo $product['product_id']; ?>">
                  <img class="product-image" src="assets/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                </a>
                <div class="sale-overlay">Sale</div>
                <div class="name"><?php echo $product['product_name']; ?></div>
                <div class="stars">
                  <?php for ($i = 0; $i < $product["rating"]; $i++) { ?>
                    <i class="fa-solid fa-star"></i>
                  <?php } ?>
                  <?php for ($i = 0; $i < 5 - $product["rating"]; $i++) { ?>
                    <i class="fa-regular fa-star"></i>
                  <?php } ?>
                </div>
                <?php if ($product['availability'] == 'In Stock') : ?>
                  <div class="price">£<?php echo $product['new_price']; ?></div>
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']; ?>">
                  <button type="submit" class="custom-btn-hover" onclick="addToCartShop(<?php echo $product['product_id']; ?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                <?php else : ?>
                  <div class="price">£<?php echo $product['new_price']; ?></div>
                  <div class="custom-btn-hover" aria-disabled="">Out of Stock</div>
                <?php endif; ?>
              </div>
            <?php
            }
            ?>
          </div>
        </div>

        <div id="trending-brands-section">
          <!-- Trending Brands products code -->
          <h3 class="product-heading" style="font-weight: bold">Trending Brands</h3>
          <div class="card-container d-flex flex-wrap justify-content-center">
            <?php
            // Performing database query to fetch trending brands
            $trendingBrandsQuery = "SELECT * FROM products WHERE cat_id = 3  "; // Adjust the category_id
            $trendingBrandsResult = mysqli_query($con, $trendingBrandsQuery);

            while ($product = mysqli_fetch_assoc($trendingBrandsResult)) {
            ?>
              <div class="product-card">
                <a href="description.php?id=<?php echo $product['product_id']; ?>">
                  <img class="product-image" src="assets/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                </a>
                <div class="sale-overlay">Sale</div>
                <div class="name"><?php echo $product['product_name']; ?></div>
                <div class="stars">
                  <?php for ($i = 0; $i < $product["rating"]; $i++) { ?>
                    <i class="fa-solid fa-star"></i>
                  <?php } ?>
                  <?php for ($i = 0; $i < 5 - $product["rating"]; $i++) { ?>
                    <i class="fa-regular fa-star"></i>
                  <?php } ?>
                </div>
                <?php if ($product['availability'] == 'In Stock') : ?>
                  <div class="price">£<?php echo $product['new_price']; ?></div>
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']; ?>">
                  <button type="submit" class="custom-btn-hover" onclick="addToCartShop(<?php echo $product['product_id']; ?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                <?php else : ?>
                  <div class="price">£<?php echo $product['new_price']; ?></div>
                  <div class="custom-btn-hover" aria-disabled="">Out of Stock</div>
                <?php endif; ?>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div id="filtered-products-section" style="display: none;">
          <div class="card-container d-flex flex-wrap justify-content-center animate__animated animate__fadeInUp" id="filtered-products-container">
            <!-- Filtered products will be inserted here using JavaScript -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product List End -->


  <!--Back to Top-->
  <a href="#" class="back-to-top" id="backToTopButton" title="Go to Top">↑</a>


  <!-- Footer Start -->
  <?php include 'footer.php'; ?>
  <!-- Footer End -->

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
  <!--product filter dependency-->
  <!-- <script src="js/main.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>