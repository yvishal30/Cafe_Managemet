<?php
session_start();

if (isset($_POST['removeItem'])) {
    // Remove a single item
    $key = $_POST['removeItem'];
    unset($_SESSION['cart'][$key]);
}

if (isset($_POST['removeSelected'])) {
    // Remove selected items
    $selectedItems = $_POST['selectedItems'] ?? [];
    foreach ($selectedItems as $key) {
        unset($_SESSION['cart'][$key]);
    }
}

// Reindex the array to avoid gaps in the keys
$_SESSION['cart'] = array_values($_SESSION['cart']);

// Redirect back to the cart
header('Location: cart.php');
exit;
?>
