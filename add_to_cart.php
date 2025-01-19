<?php
session_start();

// Set the header for JSON response
header('Content-Type: application/json');

// Decode the posted JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['productName'], $data['productPrice'], $data['quantity'], $data['totalPrice'], $data['productImageURL'])) {
    echo json_encode(['message' => 'Invalid data sent to the server.']);
    exit;
}

// Initialize the cart if not already
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to the session cart
$_SESSION['cart'][] = [
    'productName' => $data['productName'],
    'productPrice' => $data['productPrice'],
    'quantity' => $data['quantity'],
    'totalPrice' => $data['totalPrice'],
    'productImageURL' => $data['productImageURL'],
];

// Respond with a success message
echo json_encode(['message' => 'Item added to cart successfully!']);
?>
