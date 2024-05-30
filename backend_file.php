<?php
session_start();
include "connect.php";


// Add To cart Functionality
if (isset($_POST['addtocart'])) {
    if (!isset($_SESSION['user_id'])) {

        // Redirect to the sign-in page
        echo json_encode(["redirect_to_login" => "signin.php"]);
        exit; // Stop further execution
    }

    // User is logged in, continue with cart processing
    $userID = $_SESSION['user_id'];
    $productID = $_POST['productID'];
    $qty = $_POST['qty'];

    // Check if the item already exists in the cart
    $checkCartQry = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
    $checkCartStmt = $con->prepare($checkCartQry);
    $checkCartStmt->bind_param('ii', $userID, $productID);
    $checkCartStmt->execute();
    $checkCartResult = $checkCartStmt->get_result();

    if ($checkCartResult->num_rows > 0) {
        // Item already exists, get the current quantity and add the new quantity
        $currentQty = $checkCartResult->fetch_assoc()['quantity'];
        $newTotalQty = $currentQty + $qty;

        $updateQtyQry = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $updateQtyStmt = $con->prepare($updateQtyQry);
        $updateQtyStmt->bind_param('iii', $newTotalQty, $userID, $productID);
        $updateQtyStmt->execute();

        echo json_encode(["data" => "Item quantity increased"]);
    } else {
        // Item doesn't exist, insert into cart with the specified quantity
        $insertCartQry = "INSERT INTO cart(user_id, product_id, quantity) VALUES(?,?,?)";
        $insertCartStmt = $con->prepare($insertCartQry);
        $insertCartStmt->bind_param('iii', $userID, $productID, $qty);
        $insertCartStmt->execute();

        echo json_encode(["data" => "Item added to cart"]);
    }
}

// Cart Counter
if (isset($_POST['cartCnt'])) {
    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
        // $CountCartQry = "SELECT COUNT(product_id) as cartQtyTotal FROM cart WHERE user_id = ?";
        $CountCartQry = "SELECT SUM(quantity) as cartQtyTotal FROM cart WHERE user_id = ?";
        $CountCartStmt = $con->prepare($CountCartQry);
        $CountCartStmt->bind_param('i', $userID);
        $CountCartStmt->execute();
        $resultRow = $CountCartStmt->get_result();
        echo json_encode(["data" => $resultRow->fetch_assoc()]);
    } else {
        $resultRow = "0";
        echo json_encode(["data" => "Please login to view your cart"]);
    }
}

// Checking Username
if (isset($_POST['checkUsername'])) {
    $username = $_POST['checkUsername'];

    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        echo json_encode(array('usernameAvailable' => false));
    } else {
        echo json_encode(array('usernameAvailable' => true));
    }

    exit;
}

// Registration process
if (isset($_POST['registrationForm'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $checkEmailSQL = "SELECT * FROM users WHERE email = ?";
    $stmt = $con->prepare($checkEmailSQL);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $emailResult = $stmt->get_result();

    if ($emailResult->num_rows > 0) {
        $_SESSION['email_exists'] = "Oops! Email already exists. try again. ";
        header("Location:signup.php");
    } else {
        // Check if username already exists
        $checkUsernameSQL = "SELECT * FROM users WHERE username = ?";
        $stmt = $con->prepare($checkUsernameSQL);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $usernameResult = $stmt->get_result();

        if ($usernameResult->num_rows > 0) {
            $_SESSION['username_exists'] = "Oops! Username exists. try again. ";
            header("Location:signup.php");
        } else {
            // Insert user data into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertUserSQL = "INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($insertUserSQL);
            $stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                $_SESSION['registration_success'] = "Your registration has been successfully completed.";
                header("Location:signin.php");
                exit; // Terminate script after successful registration
            } else {
                header("HTTP/1.1 500 Internal Server Error");
                echo "Registration failed.";
                exit;
            }
        }
    }
    $stmt->close();
    exit;
}

// Forget password
if (isset($_POST['forgotPassword'])) {
    $checkEmail = "SELECT * FROM users WHERE email=?";
    $checkEmailStmt = $con->prepare($checkEmail);
    $checkEmailStmt->bind_param("s", $_POST['email']);
    $checkEmailStmt->execute();
    $result = $checkEmailStmt->get_result();
    if ($result->num_rows > 0) {
        header("Location:changepassword.php?email=" . $_POST['email'] . "");
    } else {
        $_SESSION['emailNotFound'] = "Email not found please try again.";
        header("Location:forgotpassword.php");
    }
}

if (isset($_POST['changePassword'])) {
    $email  = $_POST['email'];
    $password  = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT);

    $changePassQuery = "UPDATE users SET password = ? WHERE email = ?";
    $changPassStmt = $con->prepare($changePassQuery);
    $changPassStmt->bind_param("ss", $password, $email);

    if ($changPassStmt->execute()) {
        $_SESSION['passwordChangeResponse'] = "Password has been changed successfully.";
        header("Location:signin.php");
    }
}

// Login Process
if (isset($_POST['loginForm'])) {
    // Get username and password from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Query to fetch user details based on the provided username   
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // storing user id in the session
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        header("Location:index.php");
        exit;
    } else {
        $_SESSION['login_failed'] = "Invalid Login Password or username. Please Try Again!";
        header("Location:signin.php");
        // echo "<script>alert('Invalid Login Password or username'); 
        //         window.location = 'signin.php';
        //         </script>";
        exit;
    }
}

// Logging Out
if (isset($_POST['logout'])) {
    // If the user is logged in, unset and destroy the session
    if (isset($_SESSION['username'])) {
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
    }

    // Redirect the user to the desired page after logout
    header("Location: index.php"); // Change 'index.php' to the page you want to redirect to
    exit();
}

//Show cart process
if (isset($_GET['showCart'])) {

    // Get the user ID from the session
    $userID = $_SESSION['user_id'];

    // Get the cart data from the database
    $selectCart = "SELECT c.product_id,p.product_image, p.product_name,p.weight, p.new_price, p.flavour, c.quantity, c.cart_id FROM cart c
                JOIN products p ON c.product_id = p.product_id
                WHERE c.user_id = ?";
    $stmt = $con->prepare($selectCart);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $cartData = [];
    $numRows = $result->num_rows;

    // Check if the query returned any rows
    if ($numRows > 0) {

        // The query returned rows, so proceed with the rest of the code
        $subTotal = 0;
        while ($row = $result->fetch_assoc()) {
            // $imageData = base64_encode($row['product_image']);
            //   $imageArray = json_decode($row['product_image'], true);
            $subTotal += $row['new_price'] * $row['quantity'];

            $cartItem = [
                // 'product_image' => $imageData,
                'product_image' => $row['product_image'],
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['new_price'],
                'cart_qty' => $row['quantity'],
                'cart_id' => $row['cart_id'],
                'flavour' => $row['flavour'],  // Adding flavour to cart data
                'weight' => $row['weight']     // Adding weight to cart data
            ];

            $cartData[] = $cartItem;
        }

        echo json_encode(["cartData" => $cartData, "subTotal" => $subTotal, "rows" => $numRows]);
    } else {

        // The query did not return any rows, so return an empty response
        echo json_encode([]);
    }

    $stmt->close();
}

// Remove Item process
if (isset($_GET['removeItem'])) {
    $cartID = $_GET['cartID'];
    $userID = $_SESSION['user_id'];

    // Perform the deletion in the database
    $removeItemQry = "DELETE FROM cart WHERE user_id = ? AND cart_id = ?";
    $removeItemStmt = $con->prepare($removeItemQry);

    if ($removeItemStmt) {
        $removeItemStmt->bind_param('ii', $userID, $cartID);
        $removeItemStmt->execute();

        // Check if the deletion was successful
        if ($removeItemStmt->affected_rows > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Item removed successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Item could not be removed']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

// Update Cart Quantity
if (isset($_GET['updateCartQty'])) {
    // include "connect.php"; // Include your database connection file

    // Assuming you have a function to update cart quantities in the database
    $cartId = $_GET['cartId'];
    $quantityChange = $_GET['quantityChange'];

    // Validate the inputs
    if (!is_numeric($cartId) || !is_numeric($quantityChange)) {
        $response = array("success" => false, "message" => "Invalid input.");
        echo json_encode($response);
        exit;
    }

    // Update cart quantity in the database
    $query = "UPDATE cart SET quantity = quantity + $quantityChange WHERE cart_id = $cartId";

    $result = mysqli_query($con, $query);

    if ($result) {
        $response = array("success" => true, "message" => "Cart quantity updated successfully.");
    } else {
        $response = array("success" => false, "message" => "Error updating cart quantity: " . mysqli_error($con));
    }

    // Close the database connection
    mysqli_close($con);

    echo json_encode($response);
    exit; // Make sure to exit after sending the response
}

// Product Filter 
if (isset($_GET['filterProduct'])) {
    $category = explode(',', $_GET['category']);
    $brand = explode(',', $_GET['brand']);
    $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : null;
    $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : null;




    $query = "SELECT * FROM products";

    if (!empty($category)) {
        if (!empty($category[0])) {
            $query .= " WHERE category IN ('" . implode("','", $category) . "')";
        }
    }

    if (!empty($brand)) {
        if (!empty($brand[0])) {
            if (strpos($query, 'WHERE') !== false) {
                $query .= " AND brand IN ('" . implode("','", $brand) . "')";
            } else {
                $query .= " WHERE brand IN ('" . implode("','", $brand) . "')";
            }
        }
    }

    if (!empty($minPrice) && is_numeric($minPrice)) {
        if (strpos($query, 'WHERE') !== false) {
            $query .= " AND new_price >= $minPrice";
        } else {
            $query .= " WHERE new_price >= $minPrice";
        }
    }

    if (!empty($maxPrice) && is_numeric($maxPrice)) {
        if (strpos($query, 'WHERE') !== false) {
            $query .= " AND new_price <= $maxPrice";
        } else {
            $query .= " WHERE new_price <= $maxPrice";
        }
    }

    $result = mysqli_query($con, $query);

    if (!$result) {
        echo '<p>Error executing query: ' . mysqli_error($con) . '</p>';
    } else {
        // Check if any products were found
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and generate HTML for each product
            while ($product = mysqli_fetch_assoc($result)) {
                echo '<div class="product-card">';
                echo '<a href="description.php?id=' . $product['product_id'] . '">';
                echo '<img class="product-image" src="assets/' . $product['product_image'] . '" alt="' . $product['product_name'] . '">';
                echo '</a>';
                echo '<div class="sale-overlay">Sale</div>';
                echo '<div class="name">' . $product['product_name'] . '</div>';
                echo '<div class="stars">';
                
                for ($i = 0; $i < $product["rating"]; $i++) {
                    echo '<i class="fa-solid fa-star"></i>';
                }
                
                for ($i = 0; $i < 5 - $product["rating"]; $i++) {
                    echo '<i class="fa-regular fa-star"></i>';
                }

                echo '</div>';
            
                if ($product['availability'] == 'In Stock') {
                    echo '<div class="price">£' . $product['new_price'] . '</div>';
                    echo '<input type="hidden" name="product_id" id="product_id" value="' . $product['product_id'] . '">';
                    echo '<button type="submit" class="custom-btn-hover" onclick="addToCartShop(' . $product['product_id'] . ')">Add to Cart <i class="fas fa-shopping-cart"></i></button>';
                } else {
                    echo '<div class="price">£' . $product['new_price'] . '</div>';
                    echo '<div class="custom-btn-hover" aria-disabled="">Out of Stock</div>';
                }
            
                echo '</div>';
            }
        } else {
            echo  '<p>No products found for the selected category, brand, and price range.</p>';
        }
    }

    // Closing database connection
    mysqli_close($con);
}

// Place Order Process
if (isset($_POST['placeOrder'])) {
    if ($_POST['placeOrder'] == 1) {
        $firstName = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $company_name = $_POST['company_name'];
        $country = $_POST['country'];
        $street_address = $_POST['street_address'];
        $town = $_POST['town'];
        $state = $_POST['state'];
        $post_code = $_POST['post_code'];
        $phone = $_POST['Phone'];
        $email = $_POST['email'];

        $cartData = "SELECT * FROM cart,products WHERE cart.product_id = products.product_id AND user_id = ?";
        $cartStmt = $con->prepare($cartData);
        $cartStmt->bind_param('i', $_SESSION['user_id']);
        $cartStmt->execute();
        $result = $cartStmt->get_result();
        if ($result->num_rows > 0) {
            $totalCartAmt = 0;
            $productArry = [];
            while ($row = $result->fetch_assoc()) {
                $productPrice = $row['new_price'] * $row['quantity'];
                $totalCartAmt = $totalCartAmt + $productPrice;
                array_push($productArry, $row['product_id']);
            }
            $insertAddQry = "INSERT INTO shipping_address(first_name,last_name,company,address_a,city,state,post_code,phone,email,country) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $insertAddQryStmt = $con->prepare($insertAddQry);
            $insertAddQryStmt->bind_param('ssssssssss', $firstName, $last_name, $company_name, $street_address, $town, $state, $post_code, $phone, $email, $country);
            $insertAddQryStmt->execute();
            $shippingAddressID = $insertAddQryStmt->insert_id;
            $insertAddQryStmt->close();

            $currentDateTime = date('Y-m-d H:i:s');

            $insertOrderQuery = "INSERT INTO orders(shipping_address,user_id,product_id,order_date,total_amount) VALUES(?,?,?,?,?)";
            $insertOrderQueryStmt = $con->prepare($insertOrderQuery);
            $productJsonArry = json_encode($productArry, true);
            $insertOrderQueryStmt->bind_param('iissd', $shippingAddressID, $_SESSION['user_id'], $productJsonArry, $currentDateTime, $totalCartAmt);
            if ($insertOrderQueryStmt->execute()) {
                echo "Order has been placed...";
            } else {
                echo "Error while placing order...";
            }
            $insertOrderQueryStmt->close();
            $emptyCartQry = "DELETE FROM cart where user_id = ?";
            $emptyCartQryStmt = $con->prepare($emptyCartQry);
            $emptyCartQryStmt->bind_param('i', $_SESSION['user_id']);
            $emptyCartQryStmt->execute();
            $emptyCartQryStmt->close();

            $_SESSION['orderSuccess'] = 1;
            header("Location:orderconfirm.php");
        }
    }
}

// View Order
if (isset($_GET['viewCart'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM orders WHERE user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = array();

        while ($row = $result->fetch_assoc()) {
            $order = $row;

            $productIds = json_decode($row['product_id']);
            $productDetails = array();

            $totalPrice = 0;

            foreach ($productIds as $productId) {
                $productQuery = "SELECT product_name, new_price FROM products WHERE product_id = ?";
                $productStmt = $con->prepare($productQuery);
                $productStmt->bind_param('i', $productId);
                $productStmt->execute();
                $productResult = $productStmt->get_result();

                if ($productResult->num_rows > 0) {
                    $productData = $productResult->fetch_assoc();
                    $productDetails[] = $productData['product_name'] . " - $" . $productData['new_price'];
                    $totalPrice += $productData['new_price'];
                }

                $productStmt->close();
            }

            $order['product_details'] = implode('<br>', $productDetails);
            $order['total_price'] = number_format($totalPrice, 2);

            $orders[] = $order;
        }

        $stmt->close();
        mysqli_close($con);

        header('Content-Type: application/json');
        echo json_encode($orders);
    } else {
        // Handle case when user is not logged in
        header("Location: signin.php");
        exit;
    }
} else {
    // Handle other cases if needed
}

// Contact Us form process
if (isset($_POST['contactUs'])) {

    // Retrieve form data from POST parameters
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    // Insert the data into the database
    $query = "INSERT INTO contactus (contact_name, contact_email, contact_subject, contact_message) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ssss', $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $_SESSION['contact_success'] = "Thank you for contacting us! We'll get back to you shortly.";
        header("Location: contactus.php");
        exit;
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo "Registration failed.";
        exit;
    }

    $stmt->close();
    exit;
}

// Newsletter Process
if (isset($_POST['newsEmail'])) {
    // Collect the email address from the user.
    $email = $_POST['newsEmail'];
    $redirect_url =  $_POST['redirect_url'];

    // Insert the email address into the database.
    $sql = "INSERT INTO newsletter (news_email) VALUES ('$email')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['news_success'] =  "Sign-up successful!";
        // Insert email into database

        // Send confirmation email
        $to = $email;
        $subject = 'Newsletter Signup Confirmation';
        $message = 'Thanks for signing up to our newsletter! You can unsubscribe at any time by clicking the link below.';
        $unsubscribe_url = 'https://example.com/unsubscribe.php?email=' . $email;
        $headers = "From: My Website <shouvikdas2001@gmail.com>\r\n";
        $headers .= "Bcc: me@example.com"; // This line adds a blind carbon copy to the email so that you can track who opens it
        mail($to, $subject, $message, $headers);
        // Redirect back
        header("Location: $redirect_url");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Product Review
if (isset($_POST['reviewForm'])) {
    // Get user inputs
    $productId = $_POST['productId'];
    $userName = $_POST['userName'];
    $reviewTitle = $_POST['reviewTitle'];
    $userRating = $_POST['userRating'];
    $userReview = $_POST['userReview'];

    // Insert the review into the database
    $insertReviewQuery = "INSERT INTO reviews (product_id, reviewer_name, review_title, rating, review_content) VALUES ('$productId', '$userName', '$reviewTitle', '$userRating', '$userReview')";

    if (mysqli_query($con, $insertReviewQuery)) {
        // Review inserted successfully
        // Redirect back to the product detail page with the same product ID
        $_SESSION['review_success'] = "Your Review has been successfully submitted!";
        header("Location: description.php?id=$productId");
        exit();
    } else {
        // Handle the case where the review couldn't be inserted
        echo "Error: " . mysqli_error($con);
    }
}

if (isset($_GET['search_query'])) {
    // Get the search query from the AJAX request
    $query = $_GET['search_query'];

    // Perform a database query to retrieve matching products using MySQLi
    $sql = "SELECT product_id, product_name FROM products WHERE product_name LIKE ?";
    
    // Add wildcards for LIKE
    $query = "%$query%";

    // Prepare and execute the statement
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $query);
    
    if ($stmt->execute()) {
        // Get the result set
        $result = $stmt->get_result();

        // Fetch the results into an array
        $results = $result->fetch_all(MYSQLI_ASSOC);

        // Close the statement and connection
        $stmt->close();
        $con->close();

        // Return the results as JSON
        header('Content-Type: application/json');
        echo json_encode($results);
    }
} else {
  //error
}


