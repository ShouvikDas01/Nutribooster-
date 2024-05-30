
//...............Main Javascript codes to carry out functionalities.......//

$(document).ready(function () {
  fetchAndDisplayOrderHistory();
  cartCount();
  $("#searchToggle").click(function () {
    $("#searchBar").slideToggle("slow", "swing", function () {
      $(this).toggleClass("open");
    });
  });
  $(".slider").slick({
    infinite: true,
    slidesToShow: 3, // Adjust the number of visible slides at once
    slidesToScroll: 1,
    prevArrow: '<button class="slick-prev">&#10094;</button>',
    nextArrow: '<button class="slick-next">&#10095;</button>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2 // Adjust the number of visible slides at once for smaller screens
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1 // Adjust the number of visible slides at once for mobile devices
        }
      }
    ]
  })
  var accordion = new bootstrap.Accordion('#productAccordion');
  
  
});

// Back to Top Button
window.addEventListener('scroll', function () {
  var button = document.getElementById('backToTopButton');
  if (window.scrollY > 300) {
    button.classList.add('show');
  } else {
    button.classList.remove('show');
  }
});
document.getElementById('backToTopButton').addEventListener('click', function (e) {
  e.preventDefault();
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

// To Validate Login Details
function validateLogin() {
  var username = document.getElementById("form3Example1").value;
  var password = document.getElementById("form3Example4").value;
  var usernameError = document.getElementById("usernameError");
  var passwordError = document.getElementById("passwordError");

  usernameError.textContent = "";
  passwordError.textContent = "";

  var hasErrors = false;

  if (username === "") {
    usernameError.textContent = "Username is required.";
    hasErrors = true;
  }

  if (password === "") {
    passwordError.textContent = "Password is required.";
    hasErrors = true;
  }

  return !hasErrors;
}

// Validating registration form
function validateRegister() {
  // Reset previous error messages
  resetErrorMessages();

  // Get form inputs
  var firstName = document.getElementById('form3Example1').value;
  var lastName = document.getElementById('form3Example2').value;
  var username = document.getElementById('form3Example3').value;
  var email = document.getElementById('form3Example4').value;
  var password = document.getElementById('form3Example5').value;

  // Flag to track if there are any validation errors
  var hasErrors = false;

  // Validation for First Name
  if (firstName.trim() === '') {
    document.getElementById('errorFirstName').innerText = 'First name is required.';
    hasErrors = true;
  }

  // Validation for Last Name
  if (lastName.trim() === '') {
    document.getElementById('errorLastName').innerText = 'Last name is required.';
    hasErrors = true;
  }

  // Validation for Username
  if (username.trim() === '') {
    document.getElementById('errorUsername').innerText = 'Username is required.';
    hasErrors = true;
  }

  // Validation for Email
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    document.getElementById('errorEmail').innerText = 'Please enter a valid email address.';
    hasErrors = true;
  }


  // Validation for Password
  var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

  if (password.trim() === '') {
    document.getElementById('errorPassword').innerText = 'Password is required.';
    hasErrors = true;
  } else if (!passwordPattern.test(password)) {
    document.getElementById('errorPassword').innerText = 'Password must be at least 8 characters long and contain at least one letter, one number, and one special character.';
    hasErrors = true;
  }

  // If there are validation errors, prevent form submission
  if (hasErrors) {
    return false;
  }
}
//resetting error msg
function resetErrorMessages() {
  document.getElementById('errorFirstName').innerText = '';
  document.getElementById('errorLastName').innerText = '';
  document.getElementById('errorUsername').innerText = '';
  document.getElementById('errorEmail').innerText = '';
  document.getElementById('errorPassword').innerText = '';
}

//show password toggle
function togglePasswordVisibility() {
  const passwordInput = document.getElementById('form3Example5');
  const showPasswordCheckbox = document.getElementById('showPassword');

  if (showPasswordCheckbox.checked) {
      passwordInput.type = 'text'; // Change input type to 'text' to show the password
  } else {
      passwordInput.type = 'password'; // Change input type back to 'password' to hide the password
  }
}

// show password for change password
function togglePasswordVisibility() {
  const passwordInput = document.getElementById('form3Example5');
  const showPasswordCheckbox = document.getElementById('showPassword');

  if (showPasswordCheckbox.checked) {
      passwordInput.type = 'text'; // Change input type to 'text' to show the password
  } else {
      passwordInput.type = 'password'; // Change input type back to 'password' to hide the password
  }
}

// CHange Password Form
$("#changePasswordBtn").click(function (e) {
  var form = $("form[name='changePasswordForm']");
  e.preventDefault();
  $.validator.addMethod("strongPassword", function (value) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(value);
  }, "Password must contain at least one uppercase letter, one lowercase letter, one digit, and have a minimum length of 8 characters.");
  form.validate({
    rules: {
      newPassword: {
        required: true,
        strongPassword: true
      },
      confirmPassword: {
        required: true,
        equalTo: "#newPassword"
      },
    },
    messages: {
      newPassword: {
        required: "Please enter new password.",
        strongPassword: "Password must contain at least one uppercase letter, one lowercase letter, one digit, and have a minimum length of 8 characters."
      },
      confirmPassword: {
        required: "Please enter confirm password.",
        equalTo: "Confirm password does not match."
      },
    },
  });
  if (form.valid()) {
    Swal.fire({
      icon: "success",
      title: "Password Changed Successfully",
      toast: false, // Remove the toast property
      position: 'middle',
      showConfirmButton: true,
      timer: 5000
    }).then(() => {
      form.submit();
    });
  }
});

// validating contact us
function validateContactUs() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var subject = document.getElementById("subject").value;
  var message = document.getElementById("message").value;
  var nameError = document.getElementById("nameError");
  var emailError = document.getElementById("emailError");
  var subjectError = document.getElementById("subjectError");
  var messageError = document.getElementById("messageError");

  nameError.textContent = "";
  emailError.textContent = "";
  subjectError.textContent = "";
  messageError.textContent = "";

  var hasErrors = false;

  if (name === "") {
    nameError.textContent = "Name is required.";
    hasErrors = true;
  }

  if (email === "") {
    emailError.textContent = "Email is required.";
    hasErrors = true;
  } else {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      emailError.textContent = "Invalid email format.";
      hasErrors = true;
    }
  }

  if (subject === "") {
    subjectError.textContent = "Subject is required.";
    hasErrors = true;
  }

  if (message === "") {
    messageError.textContent = "Message is required.";
    hasErrors = true;
  }

  if (hasErrors) {
    return false; // Stop form submission if there are errors
  }

}

function resetcontactUs() {
     // Clear form fields
     document.getElementById("name").value = "";
     document.getElementById("email").value = "";
     document.getElementById("subject").value = "";
     document.getElementById("message").value = "";
}

//redirecting to description 
function redirectToDescription(productId) {
  window.location.href = 'description.php?id=' + productId;
}

//Add to cart funcationality
function addToCart() {
  console.log("addToCart() function called");
  const productID = $("#product_id").val();
  console.log("Product ID:", productID);

  const qty = $("#quantity-input").val();
  // const finalQty = qty ? qty : 1;
  $.ajax({
    url: "backend_file.php",
    method: "POST",
    dataType: "JSON",
    data: { addtocart: 1, productID, qty },

    success: function (response) {
      if (response['redirect_to_login']) {
        window.location = response['redirect_to_login'];
      } else {
        swal.fire({
          icon: "success",
          title: "Product has been added to cart.",
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 900
        });
        cartCount();

      }
    }
  })
}

//Add to cart from button 
function addToCartShop(id) {

  console.log("addToCart() function called");
  // const productID = $("#product_id").val();
  console.log("Product ID:", id);
  const qty = 1;

  $.ajax({
    url: "backend_file.php",
    method: "POST",
    dataType: "JSON",
    data: { addtocart: 1, productID: id, qty },
    success: function (response) {
      // Call the cartCount function after successfully adding the item
      if (response['redirect_to_login']) {
        window.location = response['redirect_to_login'];
      } else {
        swal.fire({
          icon: "success",
          title: "Product has been added to cart.",
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 900
        });
        cartCount();

      }

      // You can also consider updating the cart section on the page if needed
      // $('#cart-section').html(response.html);
    }
  })
}

// To Get all the accordion titles for Shop page
const accordionTitles = document.querySelectorAll('.accordion-title');

// To Add click event listener to each accordion title
accordionTitles.forEach(title => {
  title.addEventListener('click', function () {
    // To Toggle the active class on the clicked accordion title
    this.classList.toggle('active');

    //To Get the corresponding accordion content
    const content = this.nextElementSibling;

    // To Toggle the display of the accordion content
    if (content.style.display === 'block') {
      content.style.display = 'none';
    } else {
      content.style.display = 'block';
    }
  });
});

// Cart Counter
function cartCount() {
  $.ajax({
    url: "backend_file.php",
    method: "POST",
    dataType: "JSON",
    data: { cartCnt: 1 },
    success: function (response) {
      document.getElementById("cartCount").innerHTML = response.data.cartQtyTotal;
    }
  });
}

// Show cart function through ajax
function showCart() {
  $.ajax({
    url: "backend_file.php",
    method: "GET",
    dataType: "json",
    data: { showCart: 1 },
    success: function (response) {
      console.log("Received response:", response);
      let cartData = response["cartData"];
      var cartSection = document.getElementById("cart-section");
      var cartQuantity = document.getElementById("cart-count");
      cartSection.innerHTML = "";
      cartQuantity.innerHTML = "";
      var productList = []; // Initialize as an empty array
      var productDetailElement = document.getElementById("productDetail"); // Get the <p> element

      if (response['rows'] > 0) {
        var cartQuantityHTML = `<h5 class="mb-0">Cart -${response['rows']} Items</h5>`;
        cartData.forEach(function (item) {
          var cartItemHTML = `
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <a href="description.php?id=${item.product_id}">
                    <img src="assets/${item.product_image}" class="cart-img" alt="${item.product_name}" />
                  </a>
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>
              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong>${item.product_name}</strong></p>
                <p>flavour: ${item.flavour}</p>
                <p>Weight: ${item.weight}lbs</p>
                <button type="button" class="btn btn-dark btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item" onclick=removeItem("${item.cart_id}")>
                  <i class="fas fa-trash"></i>
                </button>
                <!-- Data -->
              </div>
              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
              <!-- Quantity -->
              <div class="d-flex mb-4" style="max-width: 150px">
                <button class="btn btn-danger px-3 me-2" onclick="updateCartQty('${item.cart_id}', -1)">
                  <i class="fas fa-minus"></i>
                </button>
                <div class="form-outline">
                  <input 
                    id="form${item.cart_id}"
                    min="1" 
                    name="quantity"
                    value="${item.cart_qty}"
                    type="number"
                    class="form-control"
                    oninput="this.value = Math.abs(this.value)"
                    onchange="updateCartQty(${item.cart_id}, this.value - ${item.cart_qty})" 
                  />
                  <label class="form-label" for="form${item.id}">Quantity</label>
                </div>
                <button class="btn btn-danger px-3 ms-2" onclick="updateCartQty('${item.cart_id}', 1)">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- Quantity -->
              
                <!-- Price -->
                <p class="text-start text-md-center"><strong>${(item.product_price * item.cart_qty).toFixed(2)}</strong></p>
                <!-- Price -->
              </div>
            </div>
          `;
          cartSection.innerHTML += cartItemHTML;
          productList.push(`${item.cart_qty} X ${item.product_name} - £${(item.product_price * item.cart_qty).toFixed(2)}`);
        });
        productDetailElement.innerHTML = productList.join("<br>");
        cartQuantity.innerHTML += cartQuantityHTML;
        document.getElementById("subTotal").innerHTML = "£" + parseFloat(response['subTotal']).toFixed(2);
        document.getElementById("shippingAmt").innerHTML = "£2.00";
        document.getElementById("totalAmt").innerHTML = "£" + parseFloat((response['subTotal'] + 2)).toFixed(2);
        document.getElementById("checkoutBtn").style.display = "inline";
        cartCount();
      } else {
        productDetailElement.innerHTML = "";
        cartQuantity.innerHTML = "<h5 class='mb-0'> Cart - 0 Items</h5>";
        // Clear the cart section's content
        cartSection.innerHTML = "Cart is empty";
        // Hide the checkout button
        document.getElementById("checkoutBtn").style.display = "none";
        // Reset other elements (subTotal, shippingAmt, totalAmt) if needed
        document.getElementById("subTotal").innerHTML = "£0.00";
        document.getElementById("shippingAmt").innerHTML = "£0.00";
        document.getElementById("totalAmt").innerHTML = "£0.00";
        document.getElementById("checkoutBtn").style.display = "none";

      }
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
    }
  });
}

// Removing Items from Cart
function removeItem(id) {
  $.ajax({
    url: "backend_file.php",
    method: "GET",
    dataType: "json",
    data: { removeItem: 1, cartID: id },
    success: function (response) {
      swal.fire({
        icon: "success",
        title: "Product has been removed from the cart.",
        toast: true,
        position: 'middle',
        showConfirmButton: false,
        timer: 900
      });
      if (response.length == 0) {
        cartSection.innerHTML = "Cart is empty";
      }
      showCart();
      cartCount();
    }
  });
}


// Update Cart Quantity
function updateCartQty(cartId, quantityChange) {
  var currentQty = parseInt($("#form" + cartId).val());

  // Ensuring that the quantity remains between 1 and 10
  var newQty = currentQty + quantityChange;
  if (newQty < 1 || newQty > 10) {
    return; // Don't proceed if quantity is below 1 or above 10
  }
  $.ajax({
    url: "backend_file.php",
    method: "GET",
    dataType: "json",
    data: { updateCartQty: 1, cartId: cartId, quantityChange: quantityChange },
    success: function (response) {
      showCart();
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
    }
  });
}

// Product Filter
function updateFilters() {
  var selectedCategories = [];
  var selectedBrands = [];
  var selectedPriceRanges = [];

  // For Category
  if (document.getElementById("chkProtein").checked) {
    selectedCategories.push("Protein");
  }
  if (document.getElementById("chkPreWorkout").checked) {
    selectedCategories.push("Pre-Workout");
  }
  if (document.getElementById("chkPostWorkout").checked) {
    selectedCategories.push("Post-Workout");
  }
  if (document.getElementById("chkMuscleBuilding").checked) {
    selectedCategories.push("Muscle Building");
  }
  if (document.getElementById("chkWeightLoss").checked) {
    selectedCategories.push("Weight Loss");
  }
  if (document.getElementById("chkVitaminSupplement").checked) {
    selectedCategories.push("Vitamins & Supplement");
  }

  // For Brands
  if (document.getElementById("chkON").checked) {
    selectedBrands.push("ON");
  }
  if (document.getElementById("chkMT").checked) {
    selectedBrands.push("MuscleTech");
  }
  if (document.getElementById("chkNV").checked) {
    selectedBrands.push("NastyVegan");
  }
  if (document.getElementById("chkPW").checked) {
    selectedBrands.push("Protein Works");
  }
  if (document.getElementById("chkMP").checked) {
    selectedBrands.push("MyProtein");
  }
  if (document.getElementById("chkGen").checked) {
    selectedBrands.push("Generic");
  }

  // For Price
  if (document.getElementById("chkPriceUnder20").checked) {
    selectedPriceRanges.push({ min: 0, max: 20 });
  }
  if (document.getElementById("chkPrice20to50").checked) {
    selectedPriceRanges.push({ min: 20, max: 50 });
  }
  if (document.getElementById("chkPrice50to100").checked) {
    selectedPriceRanges.push({ min: 50, max: 100 });
  }
  if (document.getElementById("chkPrice100to200").checked) {
    selectedPriceRanges.push({ min: 100, max: 200 });
  }
  if (document.getElementById("chkPriceAbove200").checked) {
    selectedPriceRanges.push({ min: 200, max: Infinity });
  }



  if (selectedCategories.length === 0 && selectedBrands.length === 0 && selectedPriceRanges.length === 0) {
    document.getElementById("best-sellers-section").style.display = "block";
    document.getElementById("featured-products-section").style.display = "block";
    document.getElementById("trending-brands-section").style.display = "block";
    document.getElementById("filtered-products-section").style.display = "none";

  } else {
    document.getElementById("best-sellers-section").style.display = "none";
    document.getElementById("featured-products-section").style.display = "none";
    document.getElementById("trending-brands-section").style.display = "none";
    document.getElementById("filtered-products-section").style.display = "block";

    filterProducts(selectedCategories, selectedBrands, selectedPriceRanges);
  }
}
function filterProducts(category, brand, selectedPriceRanges) {
  // AJAX logic to fetch and display filtered products
  // Hide all sections initially
  document.getElementById("best-sellers-section").style.display = "none";
  document.getElementById("featured-products-section").style.display = "none";
  document.getElementById("trending-brands-section").style.display = "none";
  document.getElementById("filtered-products-section").style.display = "none";

  // Show the filtered products section
  document.getElementById("filtered-products-section").style.display = "block";

  // Update the heading with the selected category
  // document.getElementById("filtered-products-heading").textContent = category;

  var url = "backend_file.php?filterProduct=1&category=" + encodeURIComponent(category.join(',')) +
    "&brand=" + encodeURIComponent(brand.join(','));

  if (selectedPriceRanges.length > 0) {
    selectedPriceRanges.forEach(range => {
      url += "&minPrice=" + encodeURIComponent(range.min) +
        "&maxPrice=" + encodeURIComponent(range.max);
    });
  }


  // Send an AJAX request to fetch and insert filtered products
  var xhr = new XMLHttpRequest();
  // xhr.open("GET", "get_filtered_products.php?category=" + encodeURIComponent(JSON.stringify(category)), true);

  xhr.open("GET", url, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Insert the fetched products into the filtered-products-container
      document.getElementById("filtered-products-container").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}


// Drop Down Filter

//Related Product Navigation Button
function slideLeft() {
  $(".slider").slick("slickPrev");
}
function slideRight() {
  $(".slider").slick("slickNext");
}


//newletter
$("#newsletterBtn").click(function (e) {
  const form = $("form[name='newsletterForm']");
  e.preventDefault();
  form.validate({
      rules: {
          newsEmail: { // Use the name of the email input field here
              required: true,
              email: true
          }
      },
      messages: {
          newsEmail: { // Use the name of the email input field here
              required: "Email is required.",
              email: "Please enter a valid email."
          }
      },
  });

  if (form.valid()) {
      form.submit();
  }
});

// Place Order 
$("#placeOrderBtn").click(function (e) {
  const form = $("form[name='checkoutForm']");
  e.preventDefault();
  form.validate({
    rules: {
      first_name: {
        required: true
      },
      last_name: {
        required: true
      },
      country: {
        required: true
      },
      street_address: {
        required: true
      },
      town: {
        required: true
      },
      state: {
        required: true
      },
      post_code: {
        required: true
      },
      Phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10
      },
      email: {
        required: true,
        email: true
      },
    },
    messages: {
      first_name: {
        required: "First Name is Required."
      },
      last_name: {
        required: "Last Name is Required."
      },
      country: {
        required: "Please select country"
      },
      street_address: {
        required: "Please enter street address."
      },
      town: {
        required: "Please enter town/city."
      },
      state: {
        required: "Please enter state."
      },
      post_code: {
        required: "Post Code is required."
      },
      Phone: {
        required: "Phone Number is Required",
        digits: "Please enter only digits.",
        minlength: "Please enter valid number",
        maxlength: "Please enter valid number"
      },
      email: {
        required: "Email is required.",
        email: "Please enter valid email."
      },
    },
  });
  if (form.valid()) {
    form.submit();
  }
});

// Script for product select slider in product description page
const imgs = document.querySelectorAll('.custom-img-select a');
const imgBtns = [...imgs];
let imgId = 0;
imgBtns.forEach((imgItem) => {
  imgItem.addEventListener('click', (event) => {
    event.preventDefault();
    imgId = parseInt(imgItem.getAttribute('data-id'));
    slideImage();
  });
});
function slideImage() {
  const displayWidth = document.querySelector('.custom-img-showcase img:first-child').clientWidth;

  document.querySelector('.custom-img-showcase').style.transform = `translateX(${-imgId * displayWidth}px)`;
}
window.addEventListener('resize', slideImage);

// View Order Functionality
function fetchAndDisplayOrderHistory() {
  $.ajax({
    url: "backend_file.php",
    method: "GET",
    dataType: "json",
    data: { viewCart: 1 },
    success: function (data) {
      const orderList = $("#orderList tbody");
      
      if (data.length === 0) {
        orderList.html("<tr><td colspan='4'>You haven't ordered anything yet.</td></tr>");
      } else {
        data.forEach(order => {
          const row = $("<tr></tr>");
          row.html(`
            <td>${order.id}</td>
            <td>${order.order_date}</td>
            <td>£${order.total_amount}</td>
            <td><button class="detailsBtn" data-order='${JSON.stringify(order)}'>Details</button></td>
          `);
          orderList.append(row);
        });

        $(".detailsBtn").click(function () {
          const orderData = JSON.parse($(this).attr("data-order"));
          displayOrderDetailsModal(orderData);
        });
      }
    },
    error: function (error) {
      console.error("Error fetching order history:", error);
    }
  });

  function displayOrderDetailsModal(orderData) {
    const modalContent = $("#modalContent");
    modalContent.html(`
      <strong>Order ID:</strong> ${orderData.id}<br>
      <strong>Order Date:</strong> ${orderData.order_date}<br>
      <strong>Product Info:</strong><br>
      ${orderData.product_details}<br>
      <strong>Total Amount:</strong> £${orderData.total_price}<br>
    `);

    const modal = $("#orderDetailsModal");
    modal.css("display", "block");

    $(".close").click(function () {
      modal.css("display", "none");
    });

    $(window).click(function (event) {
      if (event.target === modal[0]) {
        modal.css("display", "none");
      }
    });
  }
}


document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector("#searchBar input[type='search']");
  const searchResults = document.querySelector("#searchResults");


  // Add an event listener for input changes
  searchInput.addEventListener("input", function () {
    const query = searchInput.value.trim();

    // Clear previous search results
    searchResults.innerHTML = "";

    // Perform an AJAX request to fetch product suggestions
    if (query.length >= 1) {
      fetch(`backend_file.php?search_query'=${encodeURIComponent(query)}`)
        .then((response) => response.json())
        .then((data) => {
          // Populate the search results
          data.forEach((product) => {
            const listItem = document.createElement("li");
            listItem.innerHTML = `<a href="description.php?id=${product.product_id}">${product.product_name}</a>`;
            searchResults.appendChild(listItem);
          });
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    }
  });
});
