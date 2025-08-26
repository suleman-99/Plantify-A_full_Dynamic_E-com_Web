<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "plantify2");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM index_products";
$result = $conn->query($sql);



// Add product to cart
if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['id'];
    $category = $_GET['category'];

    // Fetch product details from the database
    $sql = "SELECT * FROM $category WHERE id = $productId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Prepare product data for the cart
        $cartItem = [
            'id' => $product['id'],
            'name' => $product['product_name'],
            'image' => $product['product_image'],
            'price' => $product['product_price'],
            'category' => $category
        ];

        // Add product to the session cart
        $_SESSION['cart'][] = $cartItem;
    }
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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Cloudflare CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
 <style>
  html {
  scroll-behavior: smooth;
}

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

.product-container {
    display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
  /* Adjust the gap between cards */
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
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
  border-color: var(--secondary-color);
  /* Change border color to secondary on hover */
  box-shadow: 0 8px 16px rgba(96, 205, 18, 0.8);
  /* Add a more visible green shadow on hover */
  transform: scale(1.05);
  /* Scale the card slightly on hover */
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
  color: var(--dark-color);
  font-size: 0px;
  margin-bottom: 16px;
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

@media (max-width: 992px) {
  .product-container {
    grid-template-columns: repeat(3, 1fr);
    /* 3 cards per row on medium screens */
  }
}

@media (max-width: 768px) {
  .product-container {
    grid-template-columns: repeat(2, 1fr);
    /* 2 cards per row on small screens */
  }
}

@media (max-width: 576px) {
  .product-container {
    grid-template-columns: 1fr;
    /* 1 card per row on extra small screens */
  }
}

 </style>
  <title>Plantify</title>
</head>

<body>
  <!--pointer-->
  <div class="mouse-cursor cursor-outer"></div>
  <div class="mouse-cursor cursor-inner"></div>

  <?php require 'nav.php' ?>

  <!-- banner Section start -->
  <section class="banner_section" data-aos="fade-up>
    <div class=" container">
    <div id="banner-carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-caption">
            <div class="banner-content">
              <h1>Plantify Your Life</h1>
              <h3>Bring the Outdoors In</h3>
              <p>Discover vibrant plants that bring life to your space. Shop now and start your green journey.</p>
              <div class="tooltip-container">
                <div class="tooltip">
                  <div class="text">Save Trees</div>

                  <div class="leaf leaf1"></div>
                  <div class="leaf leaf2"></div>
                  <div class="leaf leaf3"></div>
                  <div class="leaf leaf4"></div>
                </div>
                <div class="leaf icon"></div>
              </div>

            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-caption">
            <div class="banner-content">
              <h1>Plantify Your Life</h1>
              <h3>Bring the Outdoors In</h3>
              <p>Discover vibrant plants that bring life to your space. Shop now and start your green journey.</p>
              <div class="tooltip-container">
                <div class="tooltip">
                  <div class="text">Save Trees</div>

                  <div class="leaf leaf1"></div>
                  <div class="leaf leaf2"></div>
                  <div class="leaf leaf3"></div>
                  <div class="leaf leaf4"></div>
                </div>
                <div class="leaf icon"></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- banner section exit -->

  <!-- Features Section start -->
  <section class="feature_section">
    <div class=" container">
      <div class="row">
        <div class="col-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
          <div class="card features-box">
            <div class="text-center">
              <div class="features-icon-border">
                <div class="features-icon">
                  <img decoding="async" src="img/feature card/plant.png">
                </div>
              </div>
              <div class="features-text">
                <h3>Grow with Us</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
          <div class="card features-box">
            <div class="text-center">
              <div class="features-icon-border">
                <div class="features-icon">
                  <img decoding="async" src="img/feature card/pots.png">
                </div>
              </div>
              <div class="features-text">
                <h3>Stylish Pots</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
          <div class="card features-box">
            <div class="text-center">
              <div class="features-icon-border">
                <div class="features-icon">
                  <img decoding="async" src="img/feature card/shovel.png">
                </div>
              </div>
              <div class="features-text">
                <h3>Essential Tools</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
          <div class="card features-box">
            <div class="text-center">
              <div class="features-icon-border">
                <div class="features-icon">
                  <img decoding="async" src="img/feature card/seed.png">
                </div>
              </div>
              <div class="features-text">
                <h3>Quality Seeds</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Features Section Exit -->

  <!--About Section start -->
  <section style="margin-bottom: 100px;" class="landing_about_section" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-5 col-lg-6 col-sm-8">
          <div class="about-content">
            <h2 style="font-size: 5rem; margin-left: 30px; margin: 35px;">Why Choose Us?.</h2>
            <div class="about-details">
              <p style="font-size: 2rem; font-weight: 600; margin-left: 30px;" class="fw-bold">Cultivating Excellence in Every Bloom</p>
              <p style="margin-left: 30px;"> At Plantify, we’re passionate about gardening and committed to providing you with the best. Our expert-curated blogs and extensive shopping portal offer top-quality products and invaluable tips for all your gardening needs. Experience unmatched expertise, a wide selection, and a community dedicated to helping your garden thrive. Choose Plantify for all your gardening essentials and inspiration!</p>
              <p style="margin-left: 30px;">At Plantify, we provide top-quality gardening products and expert advice to help your garden thrive..</p>
              <a href="shop.php" class="btn main-btn">View Products</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--About Section Exit -->

  <div style="font-weight:bolder; text-align:center;" data-aos="fade-up">
<h1 style="margin-bottom: 50px; font-size: 48px;">Our Top Products</h1>
</div>
<!-- Products Container -->
<div class="product-container" data-aos="fade-up">
  <?php if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
      <div class="product-card" data-aos="fade-up" data-aos-delay="100">
        <img src="<?php echo $row['product_image']; ?>" class="product-detail-image" alt="Product Image">
        <div class="product-detail-info">
          <h5 class="product-detail-title"><?php echo $row['product_name']; ?></h5>
          <p class="product-detail-description"><?php echo $row['product_description']; ?></p>
          <p class="product-detail-price"><?php echo '$' . $row['product_price']; ?></p>
          <!-- Pass id and category (for example, 'index_products') in the URL -->
          <a href="product_details.php?id=<?php echo $row['id']; ?>&category=index_products" class="product-card-buy-now">Buy Now</a>
          <!-- <a href="add_to_cart.php?id=<?php echo $row['id']; ?>&category=index_products" class="product-card-buy-now">Add to Cart</a> -->
        </div>
      </div>
  <?php }
  } else {
    echo "No products available.";
  } ?>
</div>






  <!-- testimonial Section start -->
  <section class="testimonial_section" data-aos="fade-up">
    <div class="container">
      <div class="row pb-5">
        <div class="col-12 text-center">
          <h2 class="section-title">Our Happy Customers</h2>
          <p class="section-subtitle">The Passage Experienced A Surge In Popularity During The 1960s When
            Again During The 90s As Desktop Publishers</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-8 col-md-10">
          <div id="testimonial-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button data-bs-target="#testimonial-slider" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button data-bs-target="#testimonial-slider" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button data-bs-target="#testimonial-slider" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="d-sm-flex row">
                  <div class="profile-box col-sm-5">
                    <img decoding="async" src="./img/testimonial/1.png" class="img-fluid">
                  </div>
                  <div class="card  col-sm-7">
                    <div class="desc-box">
                      <p style="color:white" class="fst-italic">Not only was customer support
                        very fast, but the
                        design is very professional. Will definitely be
                        looking for new products
                        in the future from this author.</p>
                      <div class="my-4">
                        <h4>Jecob Oramson</h4>
                        <p class="m-0 text-white">Happy Customers</p>
                      </div>
                      <img decoding="async" src="./img/testimonial/qoutes.svg" class="float-end">
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-sm-flex row">
                  <div class="profile-box col-sm-5">
                    <img decoding="async" src="./img/testimonial/2.png" class="img-fluid">
                  </div>
                  <div class="card  col-sm-7">
                    <div class="desc-box">
                      <p style="color:white" class="fst-italic">Not only was customer support
                        very fast, but the
                        design is very professional. Will definitely be
                        looking for new products
                        in the future from this author.</p>
                      <div class="my-4">
                        <h4>Jecob Oramson</h4>
                        <p class="m-0 text-white">Happy Customers</p>
                      </div>
                      <img decoding="async" src="./img/testimonial/qoutes.svg" class="float-end">
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-sm-flex row">
                  <div class="profile-box col-sm-5">
                    <img decoding="async" src="./img/testimonial/3.png" class="img-fluid">
                  </div>
                  <div class="card  col-sm-7">
                    <div class="desc-box">
                      <p style="color:white" class="fst-italic">Not only was customer support
                        very fast, but the
                        design is very professional. Will definitely be
                        looking for new products
                        in the future from this author.</p>
                      <div class="my-4">
                        <h4>Jecob Oramson</h4>
                        <p class="m-0 text-white">Happy Customers</p>
                      </div>
                      <img decoding="async" src="./img/testimonial/qoutes.svg" class="float-end">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
  </section>
  <!--testimonial Section Exit -->





  <!-- Hero section -->
  <div style="margin-bottom: 70px;" class="px-4 py-5 my-5 text-center" data-aos="fade-up">
    <img class="d-block mx-auto mb-4" src="img/logo-2.png" alt="" width="150" height="100">
    <h1 class="display-5 fw-bold">Your Ultimate Gardening Companion</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Plantify is your go-to online destination for all things gardening. From expert tips and care guides to a curated selection of gardening tools and plants, we provide everything you need to nurture your green thumb. Our platform features a vibrant community of gardening enthusiasts and professionals sharing their knowledge and passion. With user-friendly navigation and an engaging blog section, Plantify makes gardening accessible and enjoyable for everyone. Explore our e-commerce portal to find the best products for your garden and join a community dedicated to growing together.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      </div>
    </div>
  </div>




  <?php require 'footer.php' ?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <!-- Bootstrap 5 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="script.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true,
      offset: 100
    });
  </script>
</body>

</html>