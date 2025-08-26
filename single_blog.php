<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- External CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">

  <title>Blog Title | Plantify</title>
  <style>
    /* General Styles */
    body {
      font-family: var(--primary-font, 'Barlow Condensed', sans-serif);
      background-color: var(--bg-white, #fff);
      color: var(--primary-text, #061738);
    }

    .container {
      max-width: 900px;
    }
/* Blog Post Container */
.blog-post-container {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
    background-color: whitesmoke;
}


    /* Blog Title */
    .blog-post-container h1 {
      font-size: 5rem;
      margin-bottom: 20px;
      font-weight: 800;
      color: var(--primary-text, #061738);
    }

    /* Blog Meta Information */
    .blog-post-meta {
      font-size: 1rem;
      color: black;
      margin-bottom: 20px;
    }

    /* Blog Post Image */
 /* Blog Post Image */
.blog-post {
  border-radius: 10px;
  margin-bottom: 20px;
  width: 400px; /* Fixed width */
  height: 400px; /* Fixed height */
  object-fit: cover; /* Ensure the image covers the area without distortion */
  display: block; /* Ensures the image is treated as a block-level element */
  margin-left: auto; /* Center horizontally */
  margin-right: auto; /* Center horizontally */
}


    /* Blog Post Content */
    .blog-post-container p {
      line-height: 1.6;
    }
  </style>
</head>

<body>

  <!-- Blog Post Section -->
  <?php
  include 'db_connection.php'; // Include your DB connection file

  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo '<div class="container my-5">';
      echo '<div class="blog-post-container">'; // Added a container for styling
      echo '<h1 class="display-4 fst-italic">' . htmlspecialchars($row['title']) . '</h1>';
      echo '<p class="blog-post-meta">Posted on ' . htmlspecialchars($row['date']) . ' by ' . htmlspecialchars($row['author']) . '</p>';
      echo '<img src="img/blogs-img/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="img-fluid blog-post">';
      echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>'; // Added nl2br to preserve paragraph breaks
      echo '</div>';
      echo '</div>';
    } else {
      echo "<div class='container'><p>Blog not found.</p></div>";
    }
    $stmt->close();
  } else {
    echo "<div class='container'><p>No blog ID provided.</p></div>";
  }

  $conn->close();
  ?>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

  <script src="script.js"></script>
</body>

</html>