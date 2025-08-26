<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "plantify2";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "img/blogs-img/" . basename($image);

    // Move the uploaded image file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO blogs (title, author, date, content, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $author, $date, $content, $image);

        if ($stmt->execute()) {
            echo "New blog post created successfully";
            // header("Location: blog.php"); // Redirect to blog page after insertion
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>

<?php
// PHP logic remains unchanged
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- External CSS -->

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="icon" href="img/favicon/1.png" type="image/png">

    <title>Insert Blog | Plantify</title>

    <style>
        /* Applying the theme variables */
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

        body {
            background-color: var(--light-color);
            font-family: var(--secondary-font);
            color: var(--primary-text);
            padding: 20px;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: var(--bg-white);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .form-container h2 {
            font-family: var(--primary-font);
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: var(--dark-color);
            font-size: 1.1rem;
        }

        .form-control {
            background-color: var(--bg-white);
            border: 1px solid var(--text-gray);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
            font-family: var(--secondary-font);
            transition: border 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 8px rgba(96, 205, 18, 0.3);
        }

        button[type="submit"] {
            background-color: var(--secondary-color);
            color: var(--text-white);
            font-family: var(--primary-font);
            font-size: 1.2rem;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        button[type="submit"]:hover {
            background-color: var(--dark-color);
            color: white;
        }

        /* Placeholder styling */
        ::placeholder {
            color: var(--text-gray);
            font-style: italic;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .form-container h2 {
                font-size: 2rem;
            }
        }

        /* Custom anchor styling */
        a {
            color: var(--anchor-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--secondary-color);
        }

        /* Validation feedback */
        .is-invalid {
            border-color: red;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <!-- Form Section -->
    <main class="container">
        <div class="form-container">
            <h2>Insert New Blog Post</h2>
            <form action="insert_blog.php" method="POST" enctype="multipart/form-data" novalidate>
                <!-- Title Field -->
                <div class="mb-3">
                    <label for="blogTitle" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" id="blogTitle" name="title" placeholder="Enter blog title" required>
                    <div class="invalid-feedback">Please provide a blog title.</div>
                </div>

                <!-- Author Field -->
                <div class="mb-3">
                    <label for="blogAuthor" class="form-label">Author</label>
                    <input type="text" class="form-control" id="blogAuthor" name="author" placeholder="Author's name" required>
                    <div class="invalid-feedback">Author's name is required.</div>
                </div>

                <!-- Date Field -->
                <div class="mb-3">
                    <label for="blogDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="blogDate" name="date" required>
                    <div class="invalid-feedback">Please select a date.</div>
                </div>

                <!-- Content Field -->
                <div class="mb-3">
                    <label for="blogContent" class="form-label">Blog Content</label>
                    <textarea class="form-control" id="blogContent" name="content" rows="6" placeholder="Write the blog content here" required></textarea>
                    <div class="invalid-feedback">Content is required.</div>
                </div>

                <!-- Image Upload Field -->
                <div class="mb-3">
                    <label for="blogImage" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="blogImage" name="image" accept="image/*" required>
                    <div class="invalid-feedback">Please upload an image.</div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn">Submit Blog</button>
            </form>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Client-side validation -->
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('form');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>

</html>
