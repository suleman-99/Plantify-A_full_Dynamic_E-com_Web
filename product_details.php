<?php
// Database connection
require 'db_connection.php';

// Get product ID and category from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Validate the category
$allowed_categories = ['index_products', 'plants', 'tools', 'pots', 'seeds'];

if (!in_array($category, $allowed_categories)) {
  echo "Invalid category.";
  exit();
}

// Prepare the SQL query based on the category and product ID
$sql = "SELECT * FROM $category WHERE id = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

// Check if product was found
if (!$product) {
  echo "Product not found.";
  exit();
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Cloudflare CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
  <title>Plantify</title>
  <style>
    :root {
      /* Background Color */
      --bg-white: #fff;

      /* Text Colors */
      --primary-text: #061738;
      --secondary-color: #60cd12;
      --light-color: #e2f6de;
      --dark-color: #03262c;
      --text-white: #fff;
      --text-gray: #dee2e6;
      --anchor-color: #007aff;

      /* Font Family */
      --primary-font: 'Barlow Condensed', sans-serif;
      --secondary-font: 'Roboto', sans-serif;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }



    .product-detail-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .product-detail {
      display: flex;
      flex-direction: row;
      background-color: var(--bg-white);
      border: 1px solid var(--text-gray);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 1000px;
      width: 90%;
    }

    .product-detail-image-section {
      flex: 1;
      padding: 16px;
      background-color: var(--light-color);
    }

    .product-detail-image {
      width: 100%;
      height: auto;
      border-radius: 10px;
      object-fit: cover;
    }

    .product-detail-info {
      flex: 2;
      padding: 24px;
    }

    .product-detail-title {
      font-family: var(--secondary-font);
      color: var(--primary-text);
      font-size: 32px;
      margin-bottom: 16px;
    }

    .product-detail-description {
      color: var(--dark-color);
      font-size: 16px;
      margin-bottom: 16px;
    }

    .product-detail-specifications {
      list-style-type: none;
      margin-bottom: 24px;
    }

    .product-detail-specifications li {
      margin-bottom: 8px;
      color: var(--primary-text);
    }

    .product-detail-price {
      color: var(--secondary-color);
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 24px;
    }

    /* Buy Now Button Section */
    .product-detail-action {
      margin-top: 20px;
    }

    .product-card-buy-now {
      background-color: var(--secondary-color);
      color: var(--text-white);
      text-decoration: none;
      padding: 12px 24px;
      border-radius: 5px;
      font-size: 18px;
      display: inline-block;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .product-card-buy-now:hover {
      background-color: var(--dark-color);
      transform: scale(1.05);
      /* Slightly enlarges button on hover */
    }
  </style>
</head>

<body>
  <!--pointer-->
  <div class="mouse-cursor cursor-outer"></div>
  <div class="mouse-cursor cursor-inner"></div>

  <?php require 'nav.php' ?>



  <!-- Product Details Section -->
  <div class="product-detail-container">
    <div class="product-detail">
      <div class="product-detail-image-section">
        <img src="<?php echo $product['product_image']; ?>" class="product-detail-image">
      </div>
      <div class="product-detail-info">
        <h1 class="product-detail-title"><?php echo $product['product_name']; ?></h1>
        <p class="product-detail-description"><?php echo $product['product_description']; ?></p>
        <p class="product-detail-price">$<?php echo $product['product_price']; ?></p>
        <a href="place_order.php?id=<?php echo $product['id']; ?>&category=<?php echo $category; ?>&price=<?php echo $product['product_price']; ?>"
          style="
     background-color: #60cd12; /* Base background color */
     color: #fff; /* Text color */
     text-decoration: none; /* Remove underline */
     padding: 12px 24px; /* Padding around text */
     border-radius: 10px; /* Rounded corners */
     font-size: 18px; /* Font size */
     font-weight: bold; /* Bold text */
     display: inline-block; /* Inline block for layout */
     transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
   "
          onmouseover="this.style.backgroundColor='#03262c'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.2)';"
          onmouseout="this.style.backgroundColor='#60cd12'; this.style.transform='scale(1)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.1)';"
          onmousedown="this.style.backgroundColor='#061738'; this.style.transform='scale(1)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.1)';"
          onmouseup="this.style.backgroundColor='#03262c'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.2)';"
          class="btn btn-primary mt-2">
          Buy Now
        </a>

      </div>
    </div>
  </div>

  <?php $conn->close(); ?>













  <!-- Footer section -->
  <?php require 'footer.php' ?>

  <!-- Footer Section Exit  -->




  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <!-- Bootstrap 5 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="script.js"></script>

</body>

</html>