<?php
session_start();
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Check if the cart is not empty
if (!empty($_SESSION['cart'])) {
    $conn = connectDatabase(); // Call function to connect to the database

    // Prepare a unique order ID (optional but recommended for grouping orders)
    $orderID = uniqid('ORD-');
    $cartItems = $_SESSION['cart'];

    // Insert each item into the `confirmed_orders` table
    foreach ($cartItems as $item) {
        $productName = $item['productName'];
        $productPrice = $item['productPrice'];
        $quantity = $item['quantity'];
        $totalPrice = $item['totalPrice'];
        $productImageURL = $item['productImageURL'];

        $stmt = $conn->prepare("INSERT INTO confirmed_orders (order_id, product_name, product_price, quantity, total_price, product_image_url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiis", $orderID, $productName, $productPrice, $quantity, $totalPrice, $productImageURL);
        $stmt->execute();
    }

    // Close the database connection
    $conn->close();

    // Store confirmed orders in session for display
    $_SESSION['confirmedOrders'] = $_SESSION['cart'];

    // Clear the cart
    unset($_SESSION['cart']);
}

// Retrieve confirmed orders from session
$confirmedOrders = $_SESSION['confirmedOrders'] ?? [];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 style="text-align:center;color:green">Order Confirmation</h1>
        <?php if (!empty($confirmedOrders)) { ?>
            <table class="table table-bordered mt-4">
                <thead class="table-success">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price (₹)</th>
                        <th>Quantity</th>
                        <th>Total Price (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($confirmedOrders as $order) { ?>
                        <tr>
                            <td>
                                <img src="<?= htmlspecialchars($order['productImageURL']) ?>" alt="Product Image" style="width: 100px; height: auto;">
                            </td>
                            <td><?= htmlspecialchars($order['productName']) ?></td>
                            <td><?= htmlspecialchars($order['productPrice']) ?></td>
                            <td><?= htmlspecialchars($order['quantity']) ?></td>
                            <td><?= htmlspecialchars($order['totalPrice']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-center mt-4">
                <a href="menu.php" class="btn btn-primary">Continue Shopping</a>
            </div>
        <?php } else { ?>
            <p>Your order history is empty!</p>
            <a href="menu.php" class="btn btn-primary">Go to Menu</a>
        <?php } ?>
    </div>
</body>
</html>
