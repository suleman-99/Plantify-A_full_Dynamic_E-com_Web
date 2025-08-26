<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Shopping Cart</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
  <style>
    :root {
      /* Background Color */
      --bg-white: #f9f9f9;
      --bg-light-gray: #f0f0f0;

      /* Text Colors */
      --primary-text: #212529;
      --secondary-color: #60cd12;
      --light-color: #e2f6de;
      --dark-color: #03262c;
      --text-white: #ffffff;
      --text-gray: #dee2e6;
      --anchor-color: #007aff;

      /* Shadows */
      --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: var(--bg-light-gray);
      color: var(--primary-text);
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: var(--light-color);
      padding: 1.5rem;
      text-align: center;
      margin-bottom: 30px;
    }

    header h1 {
      color: var(--dark-color);
      font-size: 2.5rem;
      margin: 0;
      font-weight: 600;
    }

    .container {
      padding: 1.5rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .products-container {
      padding: 0 1.5rem;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 1.5rem;
    }

    .product-card {
      width: 900px;
      background-color: var(--bg-white);
      border-radius: 12px;
      padding: 1.5rem;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      box-shadow: var(--box-shadow);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
      width: 220px;
      height: auto;
      object-fit: cover;
      border-radius: 8px;
    }

    .product-detail-info {
      flex: 1;
      margin-left: 1.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 0.5rem;
    }

    .product-detail-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin: 0;
      color: var(--primary-text);
    }

    .product-detail-price {
      font-size: 1.25rem;
      font-weight: bold;
      color: var(--secondary-color);
    }

    .product-card-buy-now {
      text-decoration: none;
      background-color: var(--secondary-color);
      color: var(--text-white);
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    .product-card-buy-now:hover {
      background-color: var(--dark-color);
    }

    .remove-from-cart-btn {
      text-decoration: none;
      background-color: var(--anchor-color);
      color: var(--text-white);
      padding: 0.5rem 1rem;
      border-radius: 5px;
      text-align: center;
      font-size: 0.9rem;
      margin-top: 0.5rem;
      transition: background-color 0.3s ease;
    }

    .remove-from-cart-btn:hover {
      background-color: var(--secondary-color);
      color: white;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .product-card {
        flex-direction: column;
        text-align: center;
      }

      .product-detail-info {
        margin: 1rem 0 0 0;
        align-items: center;
      }

      .product-card-buy-now,
      .remove-from-cart-btn {
        width: 100%;
      }
    }
  </style>

</head>

<body>

  <header>
    <!-- Cart Items Section -->
    <h1 style="text-align: center; font-size:5rem; margin-bottom:30px;">Your Cart</h1>
  </header>


  <div class="products-container" id="cart-items-container">
    <!-- Cart items will be dynamically injected here -->
  </div>

  <!-- AOS Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script>
    // Load cart items from localStorage and display them
    function loadCart() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      const cartItemsContainer = document.getElementById('cart-items-container');
      cartItemsContainer.innerHTML = ''; // Clear existing items

      if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<h3>Your cart is empty</h3>';
        return;
      }

      cart.forEach((item, index) => {
        const cartItemHTML = `
              <div class="product-card" data-aos="fade-up" data-aos-duration="1000">
                <img src="${item.image}" class="product-detail-image" alt="${item.name}" data-aos="zoom-in" data-aos-duration="2000">
                <div class="product-detail-info">
                  <h2 class="product-detail-title">${item.name}</h2>
                  <p class="product-detail-price">$${item.price}</p>
                  <a href="product_details.php?id=${item.id}&category=${item.category}" class="product-card-buy-now">Proceed to Checkout</a>
                  <a href="javascript:void(0)" class="remove-from-cart-btn" onclick="removeFromCart(${index})">Remove from Cart</a>
                </div>
              </div>
            `;
        cartItemsContainer.innerHTML += cartItemHTML;
      });
    }

    // Function to remove an item from the cart
    function removeFromCart(index) {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.splice(index, 1); // Remove the item at the specified index

      // Update localStorage and reload cart
      localStorage.setItem('cart', JSON.stringify(cart));
      loadCart();
    }

    // Load cart when the page loads
    document.addEventListener('DOMContentLoaded', loadCart);
  </script>


  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>