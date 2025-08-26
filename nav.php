<?php
session_start(); // Start session to access session variables

// Redirect to login page if user is not logged in
if (!isset($_SESSION['loggedin'])) {
  $_SESSION['redirect'] = basename($_SERVER['PHP_SELF']); // Store the current page for redirect
  $userProfileLink = 'login.php'; // If not logged in, link to the login page
  $username = ''; // No name displayed
} else {
  $userProfileLink = 'profile.php'; // If logged in, link to the profile page
  $username = $_SESSION['username']; // Fetch the user's name from the session
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">

  <title>Plantify</title>
</head>

<body>
  <!-- Navbar starts -->
  <!-- Navbar starts -->
  <header id="full-nav">
    <div class="header">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars-staggered navbar-toggler-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blogs</a>
              </li>
            </ul>
            <div class="header_right">

              <div style="display: flex; gap:25px; " class="text-lg-end">
                <a href="add_to_cart.php" style="display: flex; align-items: center; text-decoration: none; background: none; color: inherit; transform: translateX(-15px); font-size: 14px; padding: 5px;">
                  <span style="margin-right: 10px; font-size: 22px;"><i class="fa-solid fa-cart-shopping"></i></span>
                </a>

                <a href="<?php echo $userProfileLink; ?>" style="display: flex; align-items: center; text-decoration: none; background: none; color: inherit; transform: translateX(-15px);">
                  <span style="margin-right: 8px;"><i class="fa-solid fa-circle-user"></i></span>
                  <span style="font-size: 14px; margin-right: 10px;"><?php echo $username ? $username : 'Login'; ?></span>
                </a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--Navbar ended-->

  <!--Navbar ended-->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <!-- Bootstrap 5 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="script.js"></script>

</body>

</html>