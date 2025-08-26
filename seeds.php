<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="shop.css">
  <style>

  </style>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Cloudflare CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">

  <title>Plantify</title>
</head>

<body>
  <!--pointer-->
  <div class="mouse-cursor cursor-outer"></div>
  <div class="mouse-cursor cursor-inner"></div>

  <?php require 'nav.php'?>


  <div>
    <img src="img/s-banners/4.png" alt="">

  </div>

  <!-- Description Section -->

  <section class="description py-5">

    <div class="container">

      <h1 class="text-center mb-4">Explore Our Premium Plants, Flowers, and Seeds</h1>

      <p class="text-center mb-4">At Plantify, we offer a diverse selection of high-quality plants, vibrant flowers, and
        premium seeds. Whether you're looking to start a new garden, grow your own produce, or add some natural beauty
        to your indoor spaces, our collection of seeds is designed to help you cultivate success.</p>

    </div>

  </section>

  <!-- Card Container -->

  <!-- Shopping Cards Container -->

  <div class="shopping-cards">

    <!-- Card 1 -->

    <div class="card card-1">

      <div class="card__image" style="background-image: url('./img/seeds-pro/1.jpg');">

      </div>

      <div class="card__content">

        <span class="title">Heirloom Tomato Seeds</span>

        <div class="stars">⭐⭐⭐⭐⭐</div>

        <p class="description">Grow your own flavorful, juicy tomatoes with our premium heirloom tomato seeds. Perfect
          for gardens and containers.</p>

      </div>

    </div>

    <!-- Card 2 -->

    <div class="card card-2">

      <div class="card__image" style="background-image: url('./img/seeds-pro/2.jpg');">

      </div>

      <div class="card__content">

        <span class="title">Giant Sunflower Seeds</span>

        <div class="stars">⭐⭐⭐⭐⭐</div>

        <p class="description">Bring sunshine to your garden with our giant sunflower seeds, producing tall, vibrant
          blooms.</p>

      </div>

    </div>

    <!-- Card 3 -->

    <div class="card card-3">

      <div class="card__image" style="background-image: url('./img/seeds-pro/3.jpg');">

      </div>

      <div class="card__content">

        <span class="title">Echinacea (Coneflower) Seeds</span>

        <div class="stars">⭐⭐⭐⭐⭐</div>

        <p class="description">Grow your own beautiful and medicinal echinacea plants with our premium coneflower seeds.
        </p>

      </div>

    </div>

    <!-- Card 4 -->

    <div class="card card-4">

      <div class="card__image" style="background-image: url('./img/seeds-pro/4.jpg');">

      </div>

      <div class="card__content">

        <span class="title">Fragrant Lavender Seeds</span>

        <div class="stars">⭐⭐⭐⭐⭐</div>

        <p class="description">Fill your garden or indoor space with the calming scent of lavender grown from our
          high-quality seeds.</p>

      </div>

    </div>

    <!-- Card 5 -->

    <div class="card card-5">

      <div class="card__image" style="background-image: url('./img/seeds-pro/5.jpg');">

      </div>

      <div class="card__content">

        <span class="title">Wildflower Seed Mix</span>

        <div class="stars">⭐⭐⭐⭐⭐</div>

        <p class="description">Create a vibrant, low-maintenance garden with our diverse wildflower seed mix, perfect
          for attracting pollinators.</p>

      </div>

    </div>

  </div>










  <!-- Footer section -->
  <section class="footer_wrapper mt-3 mt-md-0">
    <div class="container px-5 px-lg-0">
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
          <h5>Plantify</h5>
          <p class="mb-4 ps-0 company_details">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
            dignissim erat ut laoreet
            pharetra....</p>
          <div class="contact-info">
            <ul class="list-unstyled">
              <li><a href="#"><i class="fa fa-home me-3"></i> Lahore Lahore ae</a></li>
              <li><a href="#"><i class="fa fa-phone me-3"></i>+1 222 3333</a></li>
              <li><a href="#"><i class="fa fa-envelope me-3"></i>info@example.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
          <h5>Customer Support</h5>
          <ul class="link-widget p-0">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Product Returns</a></li>
            <li><a href="#">Wholesale Policy</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
          <h5>Quick Links</h5>
          <ul class="link-widget p-0">
            <li><a href="#">Product</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Term Of Use</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
          <h5>Newsletter</h5>
          <div class="form-group mb-4">
            <input type="email" class="form-control bg-transparent" placeholder="Enter Your Email Here">
            <button type="submit" class="btn main-btn">Subscribe</button>
          </div>
          <h5>Stay Connected</h5>
          <ul class="social-network d-flex align-items-center p-0">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid copyright-section">
      <p>Copyright <a href="#">© PLANTIFY</a> All Rights Reserved</p>
    </div>
  </section>
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