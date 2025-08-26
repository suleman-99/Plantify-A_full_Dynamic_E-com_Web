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

  <?php require 'nav.php' ?>


  <div>
    <img src="img/s-banners/3.png" alt="">

  </div>

  <!-- Description Section -->
  <section class="description py-5">
    <div class="container">
      <h1 class="text-center mb-4">Explore Our Beautiful Plants and Flowers</h1>
      <p class="text-center mb-4">At Plantify, we offer a diverse selection of stunning plants and vibrant flowers to brighten up any space. From hardy perennials to delicate annuals, our collection is perfect for both seasoned gardeners and beginners alike.</p>
    </div>
  </section>

  <!-- Card Container -->
  <!-- Shopping Cards Container -->
  <div class="shopping-cards">
    <!-- Card 1 -->
    <div class="card card-1">
      <div class="card__image" style="background-image: url('./img/plant-pro/1.jpg');">
      </div>
      <div class="card__content">
        <span class="title">Elegant Roses</span>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="description">Classic and timeless, our roses add a touch of elegance to any garden with their beautiful blooms and lovely fragrance.</p>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="card card-2">
      <div class="card__image" style="background-image: url('./img/plant-pro/2.jpg');">
      </div>
      <div class="card__content">
        <span class="title">Bright Sunflowers</span>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="description">Cheerful and vibrant, these sunflowers are perfect for bringing a burst of sunshine and joy to your garden.</p>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="card card-3">
      <div class="card__image" style="background-image: url('./img/plant-pro/3.jpg');">
      </div>
      <div class="card__content">
        <span class="title">Exotic Orchids</span>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="description">Add a touch of sophistication with our exotic orchids, known for their stunning and intricate flower patterns.</p>
      </div>
    </div>
    <!-- Card 4 -->
    <div class="card card-4">
      <div class="card__image" style="background-image: url('./img/plant-pro/4.jpg');">
      </div>
      <div class="card__content">
        <span class="title">Fragrant Lavender</span>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="description">Enjoy the calming scent of lavender in your garden. Perfect for creating a serene and aromatic environment.</p>
      </div>
    </div>
    <!-- Card 5 -->
    <div class="card card-5">
      <div class="card__image" style="background-image: url('./img/plant-pro/5.jpg');">
      </div>
      <div class="card__content">
        <span class="title">Colorful Tulips</span>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="description">Bright and beautiful, our tulips come in a variety of colors and will add a burst of color to your garden.</p>
      </div>
    </div>
    <!-- Add more cards as needed -->
  </div>











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