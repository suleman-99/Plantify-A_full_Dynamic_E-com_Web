<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="blog.css">

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
    <img src="img/s-banners/1.png" alt="">
  </div>


  <!-- Blogs Section -->
  <main class="container">

    <!-- Featured Blog Post -->
    <div style="background-image: url(./img/blogs-img/6.png);" class="p-4 p-md-5 mb-4 rounded bg-body-secondary">
      <div class="col-lg-6 px-0">
        <h1 style="color: white;" class="display-4 fst-italic">Exploring the Wonders of Gardening</h1>
        <p class="lead my-3">Discover the latest tips, techniques, and trends in gardening to enhance your green space. From planting trees to growing vibrant flowers, we've got you covered.</p>
        <p class="lead mb-0"><a href="#" class="fw-bold">Continue reading...</a></p>
      </div>
    </div>







    <!-- Blog Cards -->

    <div class="container">
    <h2 class="blog-heading">Latest Blogs</h2>
    <div class="container-blog">
        <?php
        include 'db_connection.php'; // Include your DB connection file

        $sql = "SELECT * FROM blogs ORDER BY date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="blog-card">';
                echo '<p class="blog-title">' . htmlspecialchars($row['title']) . '</p>';
                echo '<div class="blog-content" style="background-image: url(\'img/blogs-img/' . htmlspecialchars($row['image']) . '\');">';
                echo '<a href="single_blog.php?id=' . $row['id'] . '" style="display: block; text-decoration: none;">';
                echo '<p class="blog-heading" style="color: transparent; position: absolute; bottom: 0; left: 0; right: 0; padding: 10px;">' . htmlspecialchars($row['content']) . '</p>';
                echo '</a></div>';
                echo '<div class="blog-author">by ' . htmlspecialchars($row['author']) . '</div>';
                echo '</div>';
            }
        } else {
            echo "No blogs found.";
        }

        $conn->close();
        ?>
    </div>
</div>


    <!-- Blogs Cards Ended -->



  

    <div class="row g-5">
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          Gardening Insights
        </h3>

        <!-- Blog Post 1 -->
        <article class="blog-post">
          <h2 class="display-5 mb-1">How to Grow a Vegetable Garden</h2>
          <p class="blog-post-meta">July 20, 2024 by <a href="#">Alex</a></p>
          <p>Learn the essential steps to start your own vegetable garden. From soil preparation to harvesting your produce, we cover everything you need to know.</p>
          <hr>
          <p>Growing your own vegetables can be both rewarding and fun. We provide a comprehensive guide to help you achieve a bountiful harvest.</p>
          <h2>Planting Techniques</h2>
          <blockquote class="blockquote">
            <p>Effective planting techniques can make a significant difference in the success of your garden.</p>
          </blockquote>
          <p>Explore various planting methods and their benefits.</p>
          <h3>Garden Tools</h3>
          <ul>
            <li>Essential tools for gardening</li>
            <li>How to choose the right tools</li>
            <li>Tool maintenance tips</li>
          </ul>
          <h2>Common Garden Pests</h2>
          <p>Learn how to identify and manage common garden pests with eco-friendly solutions.</p>
        </article>

        <!-- Blog Post 2 -->
        <article class="blog-post">
          <h2 class="display-5 mb-1">Caring for Indoor Plants</h2>
          <p class="blog-post-meta">June 15, 2024 by <a href="#">Jordan</a></p>
          <p>Indoor plants can brighten up any space. Discover tips on how to care for various types of indoor plants to keep them healthy and thriving.</p>
          <blockquote>
            <p>Proper care and maintenance can ensure your indoor plants remain lush and vibrant.</p>
          </blockquote>
          <p>Learn about watering schedules, lighting conditions, and other care tips.</p>
          <h3>Indoor Plant Varieties</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Plant</th>
                <th>Light</th>
                <th>Watering</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Spider Plant</td>
                <td>Bright, indirect light</td>
                <td>Moderate</td>
              </tr>
              <tr>
                <td>Snake Plant</td>
                <td>Low to bright light</td>
                <td>Low</td>
              </tr>
              <tr>
                <td>Peace Lily</td>
                <td>Low to bright indirect light</td>
                <td>Regular</td>
              </tr>
            </tbody>
          </table>
          <p>Follow these guidelines to keep your indoor plants in top condition.</p>
        </article>

        <!-- Blog Post 3 -->
        <article class="blog-post">
          <h2 class="display-5 mb-1">Creating a Beautiful Garden Landscape</h2>
          <p class="blog-post-meta">May 25, 2024 by <a href="#">Sam</a></p>
          <p>Transform your garden into a picturesque landscape with these design ideas and tips. From choosing plants to layout suggestions, we help you create a stunning outdoor space.</p>
          <ul>
            <li>Garden layout ideas</li>
            <li>Choosing the right plants</li>
            <li>Incorporating water features</li>
          </ul>
          <p>Enhance your garden with thoughtful design elements and enjoy a beautiful outdoor environment.</p>
        </article>

        <!-- Pagination -->
        <nav class="blog-pagination" aria-label="Pagination">
          <a class="btn btn-outline-primary rounded-pill" href="#">Older Posts</a>
          <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer Posts</a>
        </nav>
      </div>

      <!-- Sidebar -->
      <div style="margin-top: 70px;" class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-4 mb-3 bg-body-tertiary rounded">
            <h4 class="fst-italic">About Us</h4>
            <p class="mb-0">Learn more about our passion for gardening and how we can help you cultivate your own green paradise. Our expertise covers everything from plants to garden design.</p>
          </div>

          <div>
            <h4 class="fst-italic">Recent Posts</h4>
            <ul class="list-unstyled">
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                  <img src="./img/blogs-img/1.png" alt="" class="bd-placeholder-img" width="100%" height="96" " aria-hidden=" true" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  </svg>
                  <span>How to Grow Succulents</span>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                  <img src="./img/blogs-img/1.png" alt="" class="bd-placeholder-img" width="100%" height="96" " aria-hidden=" true" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  </svg>
                  <span>The Best Soil for Your Plants</span>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                  <img src="./img/blogs-img/1.png" alt="" class="bd-placeholder-img" width="100%" height="96" " aria-hidden=" true" preserveAspectRatio="xMidYMid slice" focusable="false">

                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  </svg>
                  <span>Creating a Vertical Garden</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>




  <?php require 'footer.php' ?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <!-- Bootstrap 5 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="script.js"></script>

</body>

</html>