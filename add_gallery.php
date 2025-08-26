<?php
require_once 'db_connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = 'img/gallery/' . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            $sql = "INSERT INTO gallery (image_name, image_path) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $image_name, $image_path);

            if ($stmt->execute()) {
                echo "Image added to the gallery successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error uploading the image.";
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        $sql = "SELECT image_path FROM gallery WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $image_path = $row['image_path'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $sql = "DELETE FROM gallery WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "Image deleted from the gallery successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: Image not found.";
        }
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $new_image_name = $_FILES['image']['name'];
        $new_image_tmp = $_FILES['image']['tmp_name'];
        $new_image_path = 'img/gallery/' . $new_image_name;

        $sql = "SELECT image_path FROM gallery WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $old_image_path = $row['image_path'];
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            if (move_uploaded_file($new_image_tmp, $new_image_path)) {
                $sql = "UPDATE gallery SET image_name = ?, image_path = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $new_image_name, $new_image_path, $id);

                if ($stmt->execute()) {
                    echo "Image updated in the gallery successfully.";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error uploading the new image.";
            }
        } else {
            echo "Error: Image not found.";
        }
    }
}

// Keep the database connection open for use in the gallery.php file
// $conn->close();
?>

<!-- ... rest of the code remains the same ... -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Gallery | Plantify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="blog.css">

    <!-- Favicon -->
    <link rel="icon" href="img/favicon/1.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
        }

        body {
            font-family: var(--secondary-font);
            background-color: var(--light-color);
            color: var(--primary-text);
        }

        .container {
            background-color: var(--bg-white);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1,
        h2 {
            font-family: var(--primary-font);
            color: var(--dark-color);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: var(--dark-color);
            border-color: var(--dark-color);
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-family: var(--primary-font);
            color: var(--primary-text);
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(96, 205, 18, 0.25);
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Add to Gallery</h1>
        <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add to Gallery</button>
        </form>

        <h2 class="text-center mt-5 mb-4">Manage Gallery</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM gallery";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['image_path'] . '" class="card-img-top" alt="' . $row['image_name'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['image_name'] . '</h5>';
                    echo '<form action="add_gallery.php" method="POST">';
                    echo '<input type="hidden" name="action" value="delete">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="btn btn-danger">Delete</button>';
                    echo '</form>';
                    echo '<form action="add_gallery.php" method="POST" enctype="multipart/form-data">';
                    echo '<input type="hidden" name="action" value="update">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<div class="mb-3">';
                    echo '<label for="image" class="form-label">Update Image</label>';
                    echo '<input type="file" class="form-control" id="image" name="image" required>';
                    echo '</div>';
                    echo '<button type="submit" class="btn btn-primary">Update</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No images found in the gallery.</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>