<?php
session_start();

// Return the total number of items in the cart
$itemCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $itemCount += $item['quantity'];
    }
}

echo json_encode(['itemCount' => $itemCount]);
?>
