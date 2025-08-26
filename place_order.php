<?php
// Database connection
require 'db_connection.php';

// Get product ID, category, and price from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$product_price = isset($_GET['price']) ? floatval($_GET['price']) : 0.00;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Capture form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $quantity = intval($_POST['quantity']);

  // Calculate total price
  $total_price = $quantity * $product_price;

  // Prepare SQL to insert order into the database
  $sql = "INSERT INTO orders (product_id, category, customer_name, customer_email, shipping_address, quantity, total_price)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

  // Prepare and bind parameters
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("isssiid", $product_id, $category, $name, $email, $address, $quantity, $total_price);

  // Execute the query
  if ($stmt->execute()) {
    // Success message and redirect
    echo "<script>alert('Order placed successfully!'); window.location.href = 'thank_you.php';</script>";
  } else {
    // Error handling
    echo "<script>alert('Error placing order. Please try again.');</script>";
  }

  // Close statement
  $stmt->close();
}

// Fetch product information for display (optional step to show product details)
$sql_product = "SELECT product_name, product_image FROM $category WHERE id = $product_id";
$result_product = $conn->query($sql_product);
$product = $result_product->fetch_assoc();
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="shop.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
  <title>Place Order</title>
  <style>
    :root {
      --bg-white: rgba(255, 255, 255, 0.2);
      --primary-text: #061738;
      --secondary-color: #60cd12;
      --light-color: #e2f6de;
      --dark-color: #03262c;
      --text-white: #fff;
      --text-gray: #dee2e6;
      --anchor-color: #007aff;
      --primary-font: 'Barlow Condensed', sans-serif;
      --secondary-font: 'Roboto', sans-serif;
    }

    body {
      font-family: var(--primary-font);
      color: var(--primary-text);
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
      overflow: hidden;
      background-color: var(--light-color);  
      z-index: -1;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0px 10px 30px rgba(0, 255, 0, 0.25);
      max-width: 1000px;
      text-align: center;
      position: relative;
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    h1 {
      font-family: var(--secondary-font);
      font-size: 5rem;
      margin-bottom: 2rem;
      color: var(--secondary-color);
    }

    .row {
      display: flex;
      justify-content: space-around;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    .product-detail {
      background-color: var(--light-color);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      width: 45%;
      margin: 20px;
      height: 350px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-detail:hover {
      transform: scale(1.05);
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
    }

    .product-detail img {
      width: auto;
      height: auto;
      border-radius: 10px;
    }

    .product-detail h3 {
      font-family: var(--primary-font);
      color: var(--dark-color);
      font-size: 3.2rem;
      margin: 10px 0;
    }

    .product-detail p {
      color: var(--secondary-color);
      font-size: 1.7rem;
    }

    .order-form {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 10px 30px rgba(0, 255, 0, 0.25);
    }

    .order-form .form-control {
      background: rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      border: 2px solid var(--secondary-color);
      padding: 15px;
      font-size: 1.2rem;
      color: var(--primary-text);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .order-form .form-control:focus {
      border-color: var(--dark-color);
      background-color: rgba(255, 255, 255, 0.3);
      box-shadow: 0 6px 12px rgba(96, 205, 18, 0.3);
      outline: none;
    }

    .order-form .form-group label {
      font-size: 1rem;
      color: var(--secondary-color);
      transition: all 0.3s ease;
    }

    .order-form .form-control:focus+label,
    .order-form .form-control:not(:placeholder-shown)+label {
      top: -20px;
      left: 16px;
      font-size: 0.9rem;
      color: var(--dark-color);
    }

    .order-form button[type="submit"] {
      background-color: var(--secondary-color);
      color: var(--text-white);
      border-radius: 30px;
      padding: 15px 30px;
      font-size: 1.5rem;
      transition: all 0.3s ease;
    }

    .order-form button[type="submit"]:hover {
      background-color: var(--dark-color);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      transform: translateY(-3px);
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <h1>Place Your Order</h1>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="product-detail">
          <!-- Display product details -->
          <img src="<?php echo $product['product_image']; ?>" class="img-fluid">
          <h3><?php echo $product['product_name']; ?></h3>
          <p><strong>Price:</strong> $<?php echo $product_price; ?></p>
        </div>
      </div>

      <div class="col-md-6">
        <h2>Order Form</h2>
        <form method="POST" class="order-form">
          <div class="mb-3 form-group">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="mb-3 form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="mb-3 form-group">
            <label for="address" class="form-label">Shipping Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
          </div>
          <div class="mb-3 form-group">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit Order</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script>
    (function() {
      emailjs.init("wFxlTk2ynSmVK1FiW"); // Replace with your actual EmailJS public key
    })();

    // Send email notification using EmailJS
    function sendEmailNotification() {
      const serviceID = 'service_3u38mls';
      const templateID = 'template_wz0cguk';

      // Make sure PHP values are injected as JavaScript variables
      const templateParams = {
        product_id: '<?php echo $product_id; ?>', // This must be a PHP value passed into JavaScript
        category: '<?php echo $category; ?>', // Same for this
        name: '<?php echo $name; ?>',
        email: '<?php echo $email; ?>',
        address: '<?php echo $address; ?>',
        quantity: '<?php echo $quantity; ?>',
        total_price: '<?php echo $total_price; ?>'
      };

      emailjs.send(serviceID, templateID, templateParams)
        .then((response) => {
          console.log('SUCCESS!', response.status, response.text);
        }, (error) => {
          console.log('FAILED...', error);
        });
    }

    // Call this function after form submission
    sendEmailNotification();
  </script>

</body>

</html>