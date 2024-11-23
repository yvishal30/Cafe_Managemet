<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Orders Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        footer {
            background-color: #130e0e;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
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
        .status-dropdown {
            width: 150px;
        }
    </style>
</head>
<body>
<div class="sticky-top">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    
                    <span style="font-family: 'Times New Roman', Times, serif;">VS Restaurant Admin</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" href="./index.php">Dashboard</a>
                        <a class="nav-link active" href="./user_data.php">User Data</a>
                        <a class="nav-link active" href="./reservation.php">Reservations</a>
                        <a class="nav-link active" href="./confirmed_details.php">Order Details</a>
                        
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <main class="container mt-5">
        <h3 class="text-center">Confirmed Orders</h3>
        <table class="table table-hover table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Price (₹)</th>
                    <th>Quantity</th>
                    <th>Total Price (₹)</th>
                    <th>Confirmed At</th>
                    <th>Status</th> <!-- New column for status -->
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
                        
                        // Add the dropdown for status
                        echo "<td>";
                        echo "<select class='form-select status-dropdown' name='status'>";
                        echo "<option value='not_started' " . ($row['status'] == 'not_started' ? 'selected' : '') . ">Not Started</option>";
                        echo "<option value='making' " . ($row['status'] == 'making' ? 'selected' : '') . ">Making</option>";
                        echo "<option value='done' " . ($row['status'] == 'done' ? 'selected' : '') . ">Done</option>";
                        echo "</select>";
                        echo "</td>";

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
    <footer style="margin-top:390px">
        <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
