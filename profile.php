<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

// Fetch user data from session
$username = $_SESSION['username'];
$email = $_SESSION['email']; // Assuming you store the email in the session as well
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantify - Profile & Cart</title>
    
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
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

        .profile-container {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.25);
            width: 90%;
            max-width: 900px;
            text-align: center;
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .profile-container:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-family: var(--secondary-font);
            font-size: 2rem;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .profile-details {
            text-align: left;
            margin-top: 1rem;
        }

        .profile-details p {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .cart-section h2 {
            font-size: 1.8rem;
            color: var(--dark-color);
            margin-top: 2rem;
            text-align: left;
        }

        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid var(--text-gray);
            border-radius: 8px;
            padding: 1rem;
            background-color: var(--bg-white);
        }

        .cart-item img {
            width: 100px;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-details {
            flex: 1;
            padding: 0 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .cart-item-details h3 {
            margin: 0;
            font-size: 1.25rem;
            color: var(--dark-color);
        }

        .cart-item-details p {
            margin: 0;
            color: var(--secondary-color);
            font-weight: bold;
        }

        .cart-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cart-controls button {
            padding: 0.5rem 1rem;
            background-color: var(--secondary-color);
            border: none;
            border-radius: 5px;
            color: var(--text-white);
            font-size: 1rem;
            cursor: pointer;
        }

        .remove-btn {
            background-color: var(--anchor-color);
            color: var(--text-white);
            font-size: 0.9rem;
        }

        .cart-summary {
            text-align: right;
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: var(--dark-color);
        }

        .checkout-btn {
            display: block;
            background-color: var(--secondary-color);
            color: var(--text-white);
            border: none;
            padding: 1rem 2rem;
            font-size: 1.25rem;
            cursor: pointer;
            border-radius: 8px;
            margin-left: auto;
            text-align: center;
            max-width: 300px;
        }

        .logout-btn {
            margin-top: 1rem;
            padding: 0.6rem;
            background-color: var(--dark-color);
            color: var(--text-white);
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .logout-btn:hover {
            background-color: var(--light-color);
            color: #03262c;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo $username; ?></h1>
        <div class="profile-details">
            <p><strong>Email:</strong> <?php echo $email; ?></p>
        </div>

        <!-- Logout Button -->
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
    
</body>

</html>
