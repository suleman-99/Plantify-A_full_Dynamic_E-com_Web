<?php
// Database connection settings
require 'db_connection.php';

// Update order status to 'Delivered' when the button is clicked
if (isset($_POST['deliver'])) {
    $orderId = $_POST['order_id'];
    $updateQuery = "UPDATE orders SET status = 'delivered' WHERE id = $orderId";
    $conn->query($updateQuery);
}

// Fetch all orders, including status
$sql = "SELECT id, product_id, category, customer_name, customer_email, shipping_address, quantity, total_price, order_date, status FROM orders";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "<p>Error fetching orders: " . $conn->error . "</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="icon" href="img/favicon/1.png" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            /* Applying the theme variables */
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
            background-color: var(--light-color);
            font-family: var(--secondary-font);
            color: var(--primary-text);
            padding: 20px;
        }

        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: var(--bg-white);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        h2 {
            font-family: var(--primary-font);
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid var(--text-gray);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: var(--dark-color);
            color: var(--text-white);
        }

        tr.delivered {
            background-color: var(--light-color);
            text-decoration: line-through;
            color: var(--secondary-color);
        }

        button {
            padding: 5px 10px;
            background-color: var(--anchor-color);
            color: var(--text-white);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-family: var(--primary-font);
            font-weight: bold;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--secondary-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<div class="table-container">
    <h2>Order Management</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Category</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Shipping Address</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Determine the class based on the status
                $statusClass = $row['status'] == 'delivered' ? 'delivered' : '';
                echo "<tr class='$statusClass'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['customer_email'] . "</td>";
                echo "<td>" . $row['shipping_address'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>$" . number_format($row['total_price'], 2) . "</td>";
                echo "<td>" . date('F j, Y', strtotime($row['order_date'])) . "</td>";
                echo "<td>" . ucfirst($row['status']) . "</td>";
                echo "<td>";
                if ($row['status'] == 'pending') {
                    echo "<form method='POST' style='display:inline;'>
                            <input type='hidden' name='order_id' value='" . $row['id'] . "'>
                            <button type='submit' name='deliver'>Mark as Delivered</button>
                          </form>";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No orders found</td></tr>";
        }
        ?>
    </table>
</div>

<?php
// Close the connection
$conn->close();
?>

</body>
</html>
