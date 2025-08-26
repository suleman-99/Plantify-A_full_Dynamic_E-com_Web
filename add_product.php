<?php
// Database connection
require 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = 'uploads/' . basename($image);

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Prepare SQL query based on category
            switch ($category) {
                case 'plants':
                    $table = 'plants';
                    break;
                case 'tools':
                    $table = 'tools';
                    break;
                case 'pots':
                    $table = 'pots';
                    break;
                case 'seeds':
                    $table = 'seeds';
                    break;
                default:
                    die('Invalid category');
            }

            // Use a prepared statement to insert the data
            $stmt = $conn->prepare("INSERT INTO $table (product_name, product_price, product_description, product_image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siss", $name, $price, $description, $imagePath);

            if ($stmt->execute()) {
                echo "Product added successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No image uploaded or upload error.";
    }
}

// Close the database connection
$conn->close();
?>


<?php
// Database connection and product addition logic remains unchanged
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="img/favicon/1.png" type="image/png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <style>
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-white);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
        }

        /* Theme variables */
        :root {
            --bg-white: rgba(255, 255, 255, 0.9);
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

        /* Body styling */
        body {
            font-family: var(--primary-font);
            color: var(--primary-text);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--light-color);
        }

        .container {
            background-color: var(--bg-white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.25);
            max-width: 600px;
            width: 100%;
            text-align: center;
            max-height: 80vh;
            overflow-y: auto;
        }

        .container:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        h2 {
            font-family: var(--secondary-font);
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: var(--primary-text);
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--text-gray);
            border-radius: 15px;
            font-size: 1rem;
            background: var(--bg-white);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0px 4px 10px rgba(96, 205, 18, 0.2);
            outline: none;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 8px rgba(96, 205, 18, 0.3);
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        input[type="submit"] {
            background-color: var(--secondary-color);
            color: var(--text-white);
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 25px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #5cb917;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
                max-height: 90vh;
            }

            h2 {
                font-size: 2rem;
            }

            input[type="text"],
            input[type="number"],
            textarea,
            select,
            input[type="submit"] {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add New Product</h2>
        <form method="POST" action="add_product.php" enctype="multipart/form-data">
            <!-- Product Name -->
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter product name" required>

            <!-- Price -->
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Enter product price" required>

            <!-- Description -->
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter product description" required></textarea>

            <!-- Image Upload -->
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <!-- Category -->
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="plants">Plants</option>
                <option value="tools">Tools</option>
                <option value="pots">Pots</option>
                <option value="seeds">Seeds</option>
            </select>

            <!-- Submit Button -->
            <input type="submit" value="Add Product">
        </form>
    </div>
</body>

</html>