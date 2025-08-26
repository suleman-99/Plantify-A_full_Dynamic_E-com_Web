<?php
require_once 'db_connection.php';

$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);
?>
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
  
  body {
    font-family: Arial, sans-serif;
    background-color: #f3f3f3;
    color: #333;
    text-align: center;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 50px;
}

.gallery img {
    width: 200px;
    height: 200px;
    margin: 10px;
    cursor: pointer;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.gallery img:hover {
    transform: scale(1.1);
}

/* Lightbox Styles */
.lightbox {
    display: none;
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
}

.lightbox img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 10px;
}

.close {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 30px;
    color: #fff;
    cursor: pointer;
}
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
    <img src="img/s-banners/gallery.png" alt="">
    
  </div>

<!-- Description Section -->
<section class="description py-5">
  <div class="container">
      <h1 class="text-center mb-4">Nature’s Masterpieces</h1>
      <p class="text-center mb-4">Explore the vibrant world of plants and flowers in our gallery, where each bloom tells a story of nature's beauty. Discover an array of stunning flora, from delicate blossoms to lush greenery, capturing the essence of nature's artistry</p>
  </div>
</section>


<?php
require_once 'db_connection.php';

$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);
?>

<div class="gallery">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<img src="' . $row['image_path'] . '" alt="' . $row['image_name'] . '" onclick="openLightbox(this)">';
        }
    } else {
        echo '<p>No images found in the gallery.</p>';
    }
    ?>
</div>

<!-- Lightbox -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close">&times;</span>
    <img id="lightbox-img" src="" alt="Full Size Image">
</div>






  <!-- Footer section -->
  <?php require 'footer.php'?>

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