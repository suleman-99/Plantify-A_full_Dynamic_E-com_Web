<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="img/favicon/1.png" type="image/png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Links</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Roboto&display=swap" rel="stylesheet">
    <style>
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
            font-family: var(--primary-font);
            background-color: var(--light-color);
            color: var(--primary-text);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: var(--bg-white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: var(--secondary-color);
            color: var(--text-white);
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: var(--dark-color);
        }

        /* New styles for the password prompt overlay */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #overlay>div {
            background-color: var(--bg-white);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #overlay h2 {
            color: var(--primary-text);
            margin-bottom: 1rem;
        }

        #overlay input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid var(--text-gray);
            border-radius: 5px;
            font-size: 1rem;
        }

        #overlay button {
            background-color: var(--secondary-color);
            color: var(--text-white);
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #overlay button:hover {
            background-color: var(--dark-color);
        }

        #error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- Password Prompt Overlay -->
    <div id="overlay">
        <div>
            <h2>Enter Password To Access</h2>
            <input type="password" id="password" placeholder="Enter password">
            <button onclick="checkPassword()">Submit</button>
            <div id="error-message"></div>
        </div>
    </div>

    <div class="container">
        <h1>Quick Links</h1>
        <div class="button-container">
            <a href="add_product.php" class="button">New Products</a>
            <a href="modify_products.php" class="button">Modify Products</a>
            <a href="new_order.php" class="button">Order Management</a>
            <a href="insert_blog.php" class="button">Blogs</a>
            <a href="add_gallery.php" class="button">Gallery</a>
        </div>
    </div>

    <script>
        // Password check function
        function checkPassword() {
            const correctPassword = '123';
            const passwordInput = document.getElementById('password').value;
            if (passwordInput === correctPassword) {
                document.getElementById('overlay').style.display = 'none';
            } else {
                document.getElementById('error-message').textContent = 'Incorrect password. Please try again.';
            }
        }
    </script>
</body>

</html>