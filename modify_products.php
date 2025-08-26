<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- External Stylesheets -->
  <link rel="stylesheet" href="responsive.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">

  <title>Modify Products</title>
  <style>
    :root {
      --bg-white: #fff;
      --primary-text: #061738;
      --secondary-color: #60cd12;
      --light-color: #e2f6de;
      --dark-color: #03262c;
      --text-white: #fff;
      --text-gray: #dee2e6;
      --anchor-color: #007aff;
      --primary-font: 'Barlow Condensed', sans-serif;
      --secondary-font: 'Roboto', sans-serif;
    }

    body {
      font-family: var(--primary-font);
      background-color: var(--light-color);
      margin: 0;
    }

    .container {
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      background-color: var(--bg-white);
      border-radius: 15px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
    }

    h1 {
      text-align: center;
      font-size: 3rem;
      margin-bottom: 2rem;
      color: var(--primary-text);
    }

    h2 {
      margin-top: 2rem;
      font-size: 2rem;
      color: var(--primary-text);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 2rem;
    }

    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid var(--text-gray);
    }

    th {
      background-color: var(--secondary-color);
      color: var(--text-white);
    }

    .btn {
      background-color: var(--secondary-color);
      color: var(--text-white);
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .btn:hover {
      background-color: var(--dark-color);
    }

    .btn-delete {
      background-color: #e74c3c;
    }

    .btn-delete:hover {
      background-color: #c0392b;
    }

    .btn-update {
      background-color: #3498db;
    }

    .btn-update:hover {
      background-color: #2980b9;
    }

    /* Modal Styles */
    .modal-backdrop.show {
      opacity: 0.5;
    }

    .modal-dialog {
      max-width: 800px;
      margin: 1.75rem auto;
    }

    .modal-content {
      background-color: var(--bg-white);
      border-radius: 15px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.25);
    }

    .modal-header {
      border-bottom: 1px solid var(--text-gray);
    }

    .close-btn {
      background: transparent;
      border: none;
      font-size: 1.5rem;
      color: var(--dark-color);
      cursor: pointer;
    }

    label {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
      display: block;
      color: var(--primary-text);
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
      padding: 0.8rem;
      margin-bottom: 1.5rem;
      border: 1px solid var(--text-gray);
      border-radius: 15px;
      font-size: 1rem;
      color: var(--dark-color);
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus,
    select:focus {
      border-color: var(--secondary-color);
      box-shadow: 0 0 5px var(--secondary-color);
    }

    .btn-submit {
      background-color: var(--secondary-color);
      color: var(--text-white);
      border: none;
      padding: 0.8rem 1.5rem;
      border-radius: 5px;
      font-size: 1.1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: var(--dark-color);
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>Modify Products</h1>

    <?php
    require 'db_connection.php';

    function fetchProducts($conn, $table) {
        $sql = "SELECT * FROM $table";
        return $conn->query($sql);
    }

    function handleUpdate($conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category = $_POST['category'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $_FILES['image']['name'];
                $imageTmp = $_FILES['image']['tmp_name'];
                $imagePath = 'uploads/' . basename($image);

                if (move_uploaded_file($imageTmp, $imagePath)) {
                    $sql = "UPDATE $category SET product_name = ?, product_price = ?, product_description = ?, product_image = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sdssi", $name, $price, $description, $imagePath, $id);
                } else {
                    echo "<div class='message'>Error uploading file.</div>";
                    return;
                }
            } else {
                $sql = "UPDATE $category SET product_name = ?, product_price = ?, product_description = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdsi", $name, $price, $description, $id);
            }

            if ($stmt->execute()) {
                echo "<div class='message'>Product updated successfully.</div>";
            } else {
                echo "<div class='message'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
        }
    }

    function handleDelete($conn) {
        if (isset($_GET['delete_id']) && isset($_GET['category'])) {
            $id = $_GET['delete_id'];
            $category = $_GET['category'];

            $sql = "DELETE FROM $category WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "<div class='message'>Product deleted successfully.</div>";
            } else {
                echo "<div class='message'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
        }
    }

    handleUpdate($conn);
    handleDelete($conn);

    $categories = ['plants', 'tools', 'pots', 'seeds'];
    foreach ($categories as $category) {
        $result = fetchProducts($conn, $category);

        if ($result->num_rows > 0) {
            echo "<h2>" . ucfirst($category) . "</h2>";
            echo "<table>";
            echo "<thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['product_description']}</td>
                        <td>\${$row['product_price']}</td>
                        <td><img src='{$row['product_image']}' alt='Product Image' width='100'></td>
                        <td>
                          <button type='button' class='btn btn-update' data-bs-toggle='modal' data-bs-target='#editProductModal' data-id='{$row['id']}' data-name='{$row['product_name']}' data-price='{$row['product_price']}' data-description='{$row['product_description']}' data-image='{$row['product_image']}' data-category='$category'>Edit</button>
                          <a href='?delete_id={$row['id']}&category=$category' class='btn btn-delete' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                        </td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No products found in " . ucfirst($category) . " category.</p>";
        }
    }

    $conn->close();
    ?>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
          <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form id="editProductForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="productId">
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" name="name" required>
            </div>
            <div class="mb-3">
              <label for="productPrice" class="form-label">Product Price</label>
              <input type="number" class="form-control" id="productPrice" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Product Description</label>
              <textarea class="form-control" id="productDescription" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="productImage" class="form-label">Product Image</label>
              <input type="file" class="form-control" id="productImage" name="image">
            </div>
            <input type="hidden" name="category" id="productCategory">
            <button type="submit" name="update_product" class="btn btn-submit">Update Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var editProductModal = document.getElementById('editProductModal');
      editProductModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var productId = button.getAttribute('data-id');
        var productName = button.getAttribute('data-name');
        var productPrice = button.getAttribute('data-price');
        var productDescription = button.getAttribute('data-description');
        var productImage = button.getAttribute('data-image');
        var productCategory = button.getAttribute('data-category');

        var modalBody = editProductModal.querySelector('.modal-body');
        modalBody.querySelector('#productId').value = productId;
        modalBody.querySelector('#productName').value = productName;
        modalBody.querySelector('#productPrice').value = productPrice;
        modalBody.querySelector('#productDescription').value = productDescription;
        modalBody.querySelector('#productCategory').value = productCategory;
      });
    });
  </script>
</body>

</html>
