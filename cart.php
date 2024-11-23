<?php
session_start();
error_reporting(0);

// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'restaurant'; 
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Initialize cart
$cartItems = $_SESSION['cart'] ?? [];

// Remove single item from cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['removeItem'])) {
    $keyToRemove = $_POST['removeItem'];
    if (isset($_SESSION['cart'][$keyToRemove])) {
        unset($_SESSION['cart'][$keyToRemove]); // Remove the item from the session
    }
    header("Location: cart.php"); // Redirect to avoid form resubmission
    exit;
}

// Confirm selected orders
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmOrder']) && isset($_POST['selectedItems'])) {
    $confirmedOrderIds = [];
    foreach ($_POST['selectedItems'] as $key) {
        if (isset($cartItems[$key])) {
            $productName = $cartItems[$key]['productName'];
            $productPrice = $cartItems[$key]['productPrice'];
            $quantity = $cartItems[$key]['quantity'];
            $totalPrice = $cartItems[$key]['totalPrice'];
            $productImageURL = $cartItems[$key]['productImageURL'];
            $confirmedAt = date('Y-m-d H:i:s');

            $orderId = 'ORD-' . uniqid(); // Generate a unique order ID

            // Insert into confirmed orders table
            $stmt = $conn->prepare("INSERT INTO confirmed_orders (order_id, product_name, product_price, quantity, total_price, product_image_url, confirmed_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdiiss", $orderId, $productName, $productPrice, $quantity, $totalPrice, $productImageURL, $confirmedAt);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $confirmedOrderIds[] = $orderId;
                unset($_SESSION['cart'][$key]); // Remove confirmed item from the cart
            }
            $stmt->close();
        }
    }

    if (!empty($confirmedOrderIds)) {
        $_SESSION['orderSuccess'] = 'Order Confirmed! Your Order ID(s): ' . implode(', ', $confirmedOrderIds);
    } else {
        $_SESSION['orderError'] = 'No items were confirmed. Please try again.';
    }
    header("Location: cart.php"); // Redirect to avoid form resubmission
    exit;
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .table {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table img {
            border-radius: 10px;
        }
        .btn-remove {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-remove:hover {
            background-color: #c82333;
        }
        .btn-confirm {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-confirm:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./images/Logo2.png" style="width: 45px; height: 45px; border-radius: 66px;" alt="Logo">
                <span style="font-family: 'Times New Roman', Times, serif;">VS Restaurant</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="padding-left: 60%;">
                <div class="navbar-nav">
                    <a class="nav-link active" href="./index.php">Home</a>
                    <a class="nav-link active" href="./about.php">About</a>
                    <a class="nav-link active" href="./menu.php">Menu</a>
                    <a class="nav-link active" href="./services.php">Services</a>
                    <a class="nav-link active" href="./book_table.php">Reservation</a>
                    <a class="nav-link active" href="./contact.php">Contact</a>
                    <a class="nav-link active" href="./cart.php">
                        <i class="fas fa-shopping-cart" style="position: relative;">
                            <span id="cart-badge" style="
                                position: absolute;
                                top: -10px;
                                right: -10px;
                                background-color: red;
                                color: white;
                                border-radius: 50%;
                                padding: 2px 6px;
                                font-size: 12px;
                                display: none;">0</span>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="container mt-5">
    <h1 style="text-align:center;color:crimson">Your Cart</h1>

    <?php if (isset($_SESSION['orderSuccess'])) { ?>
        <div class="alert alert-success"><?= $_SESSION['orderSuccess'] ?></div>
        <?php unset($_SESSION['orderSuccess']); ?>
    <?php } ?>

    <?php if (isset($_SESSION['orderError'])) { ?>
        <div class="alert alert-danger"><?= $_SESSION['orderError'] ?></div>
        <?php unset($_SESSION['orderError']); ?>
    <?php } ?>

    <?php if (!empty($cartItems)) { ?>
        <form method="POST">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Select</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price (₹)</th>
                        <th>Quantity</th>
                        <th>Total Price (₹)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $key => $item) { ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selectedItems[]" value="<?= $key ?>">
                            </td>
                            <td>
                                <img src="<?= htmlspecialchars($item['productImageURL']) ?>" alt="Product Image" style="width: 100px; height: auto;">
                            </td>
                            <td><?= htmlspecialchars($item['productName']) ?></td>
                            <td><?= htmlspecialchars($item['productPrice']) ?></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= htmlspecialchars($item['totalPrice']) ?></td>
                            <td>
                                <button type="submit" name="removeItem" value="<?= $key ?>" class="btn btn-remove">Remove</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success btn-confirm" name="confirmOrder">Confirm Order</button>
                <a href="menu.php" class="btn btn-primary">Continue Shopping</a>
            </div>
        </form>
    <?php } else { ?>
        <p>Your cart is empty!</p>
        <a href="menu.php" class="btn btn-primary">Go to Menu</a>
    <?php } ?>
</div>

<div  style="margin-top:500px;">
<footer style="background-color:#130e0e;color: #fff;padding: 20px;text-align: center;margin-top: 50px;">
    <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
</footer>
</div>

<script>
    function updateCartBadge() {
        fetch('get_cart_count.php')
            .then(response => response.json())
            .then(data => {
                const cartBadge = document.getElementById('cart-badge');
                const itemCount = data.itemCount;
                if (itemCount > 0) {
                    cartBadge.style.display = 'inline-block';
                    cartBadge.textContent = itemCount;
                } else {
                    cartBadge.style.display = 'none';
                }
            });
    }
    updateCartBadge();
</script>
</body>
</html>
