<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Orders Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
            width: 70px;
            height: auto;
        }
    </style>
</head>
<body>
    <main class="container mt-5">
        <h1 class="text-center">Confirmed Orders</h1>
        <table class="table table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Price (₹)</th>
                    <th>Quantity</th>
                    <th>Total Price (₹)</th>
                    <th>Confirmed At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $conn = mysqli_connect("localhost", "root", "", "restaurant");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch confirmed orders
                $sql = "SELECT * FROM confirmed_orders ORDER BY confirmed_at DESC";
                $result = mysqli_query($conn, $sql);

                // Populate table rows with confirmed orders
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                        echo "<td>₹" . htmlspecialchars($row['product_price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                        echo "<td>₹" . htmlspecialchars($row['total_price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['confirmed_at']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No confirmed orders found.</td></tr>";
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
