<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Change this according to your MySQL password
$dbname = "plantify2"; // Ensure you created this database in MySQL

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['signup'])) {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['pass']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_pass']);

    // Password validation
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantify - Sign Up</title>
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
            /* To position the content above the background */

            /* Create a separate container for the background */
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
            /* Apply blur and dim */
            z-index: -1;
            /* Keep the background behind the content */
        }

        .signup-container {
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
            height: 600px;
        }

        .signup-container:hover {
            transform: translateY(-5px);
        }

        .logo-container {
            margin-bottom: 1.5rem;
        }

        .logo-container img {
            width: 150px;
            height: 100px;
        }

        .signup-container h1 {
            font-family: var(--secondary-font);
            font-size: 2rem;
            margin-bottom: 2rem;
            color: var(--secondary-color);
        }

        .signup-container form {
            display: flex;
            flex-direction: column;
        }

        .signup-container input {
            padding: 0.8rem;
            margin-bottom: 1rem;
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


        .signup-container input::placeholder {
            color: var(--dark-color);
        }


        .signup-container button {
            margin-top: 2rem;
            padding: 0.8rem;
            background-color: var(--secondary-color);
            color: var(--text-white);
            border: none;
            border-radius: 20px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .signup-container button:hover {
            background-color: var(--dark-color);
            box-shadow: 0px 4px 15px rgba(3, 38, 44, 0.3);
        }

        .signup-container .login-link {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--dark-color);
        }

        .signup-container .login-link a {
            color: var(--secondary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup-container .login-link a:hover {
            color: var(--secondary-color);
        }

        /* Plant touch */
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
    <div class="signup-container">
        <div class="logo-container">
            <img src="img/logo-2.png" alt="Plantify Logo">
        </div>
        <h1>Create Your Account</h1>
        <form action="signup.php" method="POST">
            <input type="text" placeholder="Full Name" name="name" id="name" required>
            <input type="email" placeholder="Email" name="email" id="emaill" required>
            <input type="password" placeholder="Password" name="pass" id="pass" required>
            <input type="password" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
        <div class="plant-touch"></div>
    </div>
</body>

</html>