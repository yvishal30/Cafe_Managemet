<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'restaurant';
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$cartItems = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmOrder'])) {
    foreach ($cartItems as $item) {
        $productName = $item['productName'];
        $productPrice = $item['productPrice'];
        $quantity = $item['quantity'];
        $totalPrice = $item['totalPrice'];

        // Insert the order details into the `orders` table
        $stmt = $conn->prepare("INSERT INTO orders (product_name, product_price, quantity, total_price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siii", $productName, $productPrice, $quantity, $totalPrice);
        $stmt->execute();
        $stmt->close();
    }

    // Clear the cart
    unset($_SESSION['cart']);

    header("Location: confirmation.php"); // Redirect to a confirmation page
    exit;
}

$conn->close();
?>
