<?php
session_start(); // Start the session to store user login information

// Include the database connection
require 'db_connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Prepare a statement to prevent SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error in query: " . $conn->error); // Output query error
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, now verify the password
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // After successful login
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username']; // Assuming you have fetched the username from the database
            $_SESSION['email'] = $user['email']; // Store email if necessary
            $_SESSION['id'] = $user['id']; // Ensure id is set from the database

            // Redirect to a welcome or dashboard page
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid email or password!";
        }
    } else {
        $error_message = "No account found with this email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Favicon -->
<link rel="icon" href="img/favicon/1.png" type="image/png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantify - Login</title>
    <style>
        :root {
            --bg-white: rgba(255, 255, 255, 0.2);
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
            color: var(--primary-text);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/banners/25.jpg') no-repeat center center/cover;
            filter: blur(5px) brightness(70%);
            z-index: -1;
        }

        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
            height: 500px;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        .logo-container {
            margin-bottom: 1.5rem;
        }

        .logo-container img {
            width: 150px;
            height: 100px;
        }

        .login-container h1 {
            font-family: var(--secondary-font);
            font-size: 2rem;
            margin-bottom: 2rem;
            color: var(--secondary-color);
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container input {
            padding: 0.8rem;
            margin-bottom: 2rem;
            border: 1px solid var(--text-gray);
            border-radius: 15px;
            font-size: 1rem;
            color: var(--dark-color);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            border-color: var(--secondary-color);
            box-shadow: 0px 4px 10px rgba(96, 205, 18, 0.2);
            outline: none;
            background: rgba(255, 255, 255, 0.2);
        }

        .login-container input::placeholder {
            color: var(--dark-color);
        }

        .login-container button {
            margin-top: 3rem;
            padding: 0.8rem;
            background-color: var(--secondary-color);
            color: var(--text-white);
            border: none;
            border-radius: 20px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container button:hover {
            background-color: var(--dark-color);
            box-shadow: 0px 4px 15px rgba(3, 38, 44, 0.3);
        }

        .login-container .signup-link {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--dark-color);
        }

        .login-container .signup-link a {
            color: var(--secondary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-container .signup-link a:hover {
            color: var(--dark-color);
        }

        .plant-touch {
            position: absolute;
            bottom: -15px;
            left: -15px;
            width: 60px;
            height: 60px;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="img/logo-2.png" alt="Plantify Logo">
        </div>
        <h1>LOGIN</h1>
        <form action="login.php" method="POST">
            <input type="email" placeholder="Email" name="email" id="email" required>
            <input type="password" placeholder="Password" name="pass" id="pass" required>
            <button type="submit" name="login">Login</button>
        </form>
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign up</a>
        </div>

        <?php
        // Display the error message if login failed
        if (isset($error_message)) {
            echo "<p style='color:red;'>$error_message</p>";
        }
        ?>
    </div>
</body>

</html>