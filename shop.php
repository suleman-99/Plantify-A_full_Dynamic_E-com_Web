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

  <!-- AOS CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

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

    .products-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    .product-card {
      margin-right: 50px;
      margin-bottom: 50px;
      background-color: var(--bg-white);
      border: 1px solid var(--text-gray);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 270px;
      transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    .product-card:hover {
      border-color: var(--secondary-color);
      box-shadow: 0 8px 16px rgba(96, 205, 18, 0.8);
      transform: scale(1.05);
    }

    .product-detail-image {
      width: 100%;
      height: auto;
      border-radius: 10px;
      object-fit: cover;
    }

    .product-detail-info {
      padding: 24px;
      text-align: center;
    }

    .product-detail-title {
      font-family: var(--secondary-font);
      color: var(--primary-text);
      font-size: 24px;
      margin-bottom: 16px;
    }

    .product-detail-description {
      color: transparent;
      font-size: 0;
    }

    .product-detail-price {
      color: var(--secondary-color);
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 16px;
    }

    .product-card-buy-now {
      background-color: var(--secondary-color);
      color: var(--text-white);
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      display: inline-block;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .product-card-buy-now:hover {
      background-color: var(--dark-color);
      transform: scale(1.05);
    }

    @media (max-width: 1200px) {
      .products-container {
        grid-template-columns: repeat(3, 1fr);
        /* 3 cards per row on medium screens */
      }
    }

    @media (max-width: 992px) {
      .products-container {
        grid-template-columns: repeat(2, 1fr);
        /* 2 cards per row on small screens */
      }
    }

    @media (max-width: 768px) {
      .products-container {
        grid-template-columns: 1fr;
        /* 1 card per row on extra small screens */
      }
    }
  </style>

</head>

<body>

  <!-- Include Navigation -->
  <?php require 'nav.php' ?>

  <div>
    <img style="margin-bottom:50px;" src="img/s-banners/shop-banner.png" alt="Shop Banner">
  </div>

  <!-- Plants Section -->
  <h1 style="text-align: center; font-size:8rem; margin-bottom:70px;">Plants</h1>
  <div class="products-container">
    <?php
    require 'db_connection.php';

    // Fetch products from the "plants" table
    $sql = "SELECT * FROM plants";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <div class="product-card" data-aos="fade-up" data-aos-duration="1000">
          <img src="<?php echo $row['product_image']; ?>" class="product-detail-image" alt="Product Image" data-aos="zoom-in" data-aos-duration="2000">
          <div class="product-detail-info">
            <h2 class="product-detail-title"><?php echo $row['product_name']; ?></h2>
            <p class="product-detail-price"><?php echo '$' . $row['product_price']; ?></p>
            <a href="product_details.php?id=<?php echo $row['id']; ?>&category=plants" class="product-card-buy-now">Buy Now</a>
            <a href="javascript:void(0)"
              class="product-card-buy-now add-to-cart-btn"
              data-id="<?php echo $row['id']; ?>"
              data-name="<?php echo $row['product_name']; ?>"
              data-price="<?php echo $row['product_price']; ?>"
              data-image="<?php echo $row['product_image']; ?>"
              data-category="plants"> <!-- Add the category dynamically -->
              Add to Cart
            </a>

          </div>
        </div>
    <?php }
    } else {
      echo "No products available.";
    }
    $conn->close();
    ?>
  </div>

  <!-- Tools Section -->
  <h1 style="text-align: center; font-size:8rem; margin-bottom:70px; margin-top:100px;">Tools</h1>
  <div class="products-container">
    <?php
    require 'db_connection.php';

    // Fetch products from the "tools" table
    $sql = "SELECT * FROM tools";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <div class="product-card" data-aos="fade-up" data-aos-duration="1000">
          <img src="<?php echo $row['product_image']; ?>" class="product-detail-image" alt="Product Image" data-aos="zoom-in" data-aos-duration="2000">
          <div class="product-detail-info">
            <h2 class="product-detail-title"><?php echo $row['product_name']; ?></h2>
            <p class="product-detail-description"><?php echo $row['product_description']; ?></p>
            <p class="product-detail-price"><?php echo '$' . $row['product_price']; ?></p>
            <a href="product_details.php?id=<?php echo $row['id']; ?>&category=tools" class="product-card-buy-now">Buy Now</a>
            <a href="javascript:void(0)"
              class="product-card-buy-now add-to-cart-btn"
              data-id="<?php echo $row['id']; ?>"
              data-name="<?php echo $row['product_name']; ?>"
              data-price="<?php echo $row['product_price']; ?>"
              data-image="<?php echo $row['product_image']; ?>"
              data-category="tools"> <!-- Add the category dynamically -->
              Add to Cart
            </a>

          </div>
        </div>
    <?php }
    } else {
      echo "No products available.";
    }
    $conn->close();
    ?>
  </div>

  <!-- Pots Section -->
  <h1 style="text-align: center; font-size:8rem; margin-bottom:70px; margin-top:100px;">Pots</h1>
  <div class="products-container">
    <?php
    require 'db_connection.php';

    // Fetch products from the "pots" table
    $sql = "SELECT * FROM pots";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <div class="product-card" data-aos="fade-up" data-aos-duration="1000">
          <img src="<?php echo $row['product_image']; ?>" class="product-detail-image" alt="Product Image" data-aos="zoom-in" data-aos-duration="2000">
          <div class="product-detail-info">
            <h2 class="product-detail-title"><?php echo $row['product_name']; ?></h2>
            <p class="product-detail-description"><?php echo $row['product_description']; ?></p>
            <p class="product-detail-price"><?php echo '$' . $row['product_price']; ?></p>
            <a href="product_details.php?id=<?php echo $row['id']; ?>&category=pots" class="product-card-buy-now">Buy Now</a>
            <a href="javascript:void(0)"
              class="product-card-buy-now add-to-cart-btn"
              data-id="<?php echo $row['id']; ?>"
              data-name="<?php echo $row['product_name']; ?>"
              data-price="<?php echo $row['product_price']; ?>"
              data-image="<?php echo $row['product_image']; ?>"
              data-category="pots"> <!-- Add the category dynamically -->
              Add to Cart
            </a>

          </div>
        </div>
    <?php }
    } else {
      echo "No products available.";
    }
    $conn->close();
    ?>
  </div>

  <!-- Seeds Section -->
  <h1 style="text-align: center; font-size:8rem; margin-bottom:70px; margin-top:100px;">Seeds</h1>
  <div class="products-container">
    <?php
    require 'db_connection.php';

    // Fetch products from the "seeds" table
    $sql = "SELECT * FROM seeds";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <div class="product-card" data-aos="fade-up" data-aos-duration="1000">
          <img src="<?php echo $row['product_image']; ?>" class="product-detail-image" alt="Product Image" data-aos="zoom-in" data-aos-duration="2000">
          <div class="product-detail-info">
            <h2 class="product-detail-title"><?php echo $row['product_name']; ?></h2>
            <p class="product-detail-description"><?php echo $row['product_description']; ?></p>
            <p class="product-detail-price"><?php echo '$' . $row['product_price']; ?></p>
            <a href="product_details.php?id=<?php echo $row['id']; ?>&category=seeds" class="product-card-buy-now">Buy Now</a>
            <a href="javascript:void(0)"
              class="product-card-buy-now add-to-cart-btn"
              data-id="<?php echo $row['id']; ?>"
              data-name="<?php echo $row['product_name']; ?>"
              data-price="<?php echo $row['product_price']; ?>"
              data-image="<?php echo $row['product_image']; ?>"
              data-category="seeds"> <!-- Add the category dynamically -->
              Add to Cart
            </a>

          </div>
        </div>
    <?php }
    } else {
      echo "No products available.";
    }
    $conn->close();
    ?>
  </div>

  <?php require 'footer.php'; ?>

  <!-- AOS Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Function to add product to cart
    function addToCart(productId, productName, productPrice, productImage, productCategory) {
      // Get existing cart from localStorage
      let cart = JSON.parse(localStorage.getItem('cart')) || [];

      // Check if product is already in cart
      const existingProductIndex = cart.findIndex(item => item.id === productId);
      if (existingProductIndex >= 0) {
        cart[existingProductIndex].quantity += 1; // Increase quantity if already in cart
      } else {
        // Add new product to cart
        cart.push({
          id: productId,
          name: productName,
          price: productPrice,
          image: productImage,
          category: productCategory, // Add category to the cart data
          quantity: 1
        });
      }

      // Save updated cart to localStorage
      localStorage.setItem('cart', JSON.stringify(cart));

      // Optionally, show a confirmation message or update cart icon count
      alert(`${productName} has been added to your cart!`);
    }

    // Attach add to cart function to buttons
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
      button.addEventListener('click', function() {
        const productId = this.dataset.id;
        const productName = this.dataset.name;
        const productPrice = this.dataset.price;
        const productImage = this.dataset.image;
        const productCategory = this.dataset.category; // Fetch the product category
        addToCart(productId, productName, productPrice, productImage, productCategory);
      });
    });
  </script>


</body>

</html>