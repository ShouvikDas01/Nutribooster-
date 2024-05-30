<?php
$currentPage = basename($_SERVER['PHP_SELF']); 

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!--Navigation Bar-->
<nav class="navbar navbar-expand-md navbar-dark">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand">
      <img src="./assets/finboost.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-menu" aria-controls="navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbar-menu" aria-labelledby="navbar-menu-label">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="navbar-menu-label">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'index.php'){echo 'active';}?>" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'about.php'){echo 'active';}?>" href="about.php">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'shop.php'){echo 'active';}?>" href="shop.php">OUR PRODUCTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'contactus.php'){echo 'active';}?>" href="contactus.php">GET IN TOUCH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'blog.php'){echo 'active';}?>" href="blog.php">BLOGS</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <?php if (isset($_SESSION['username'])) { ?>
            <li class="nav-item">
              <span class="nav-link-one" style="color: #f5deb3;">Hi <?php echo $_SESSION['username']; ?></span>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> <!-- User icon -->
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="vieworder.php">Your Orders</a></li>
                <form method="post" action="backend_file.php">
                  <li><button type="submit" class="dropdown-item" name="logout">Logout</button></li>
                </form>
              </ul>
              <li class="nav-item">
              <a class="nav-link" id="searchToggle">
                <i class="fas fa-search"></i>
              </a>
            </li>

            <div id="searchBar" style="display:none;">
              <form class="d-flex" >
                <input name="query" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              
              </form>
              <ul id="searchResults"></ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">
                <i class="fas fa-shopping-cart"></i> <!-- Cart icon -->
                <span class="cart-amount position-absolute bg-danger text-white rounded-circle" id="cartCount">0</span>
              </a>
            </li>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" id="searchToggle">
                <i class="fas fa-search"></i>
              </a>
            </li>

            <div id="searchBar" style="display:none;">
              <form class="d-flex" >
                <input name="query" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              
              </form>
              <ul id="searchResults"></ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">
                <i class="fas fa-shopping-cart"></i> <!-- Cart icon -->
                <span class="cart-amount position-absolute bg-danger text-white rounded-circle" >0</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-plus"></i> <!-- User-plus icon -->
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
              </ul>
            </li>
          <?php } ?>
        </ul>
      </div>

    </div>
</nav>

<!-- navbar ends -->

<!-- Under Navbar -->
<div class="under-nav-bar">
        <div class="container">
            <div class="under-nav-bar-text">
                <p class="animated-text">Elevate your fitness journey with NutriBooster! Reach your goals with top-notch nutrition supplements and snag an exclusive 40% discount on selected items.</p>
            </div>
        </div>
    </div>
