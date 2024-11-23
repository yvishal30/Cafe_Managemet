<?php
// Database Connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Reservations
$sql = "SELECT reservation_id, guests, date, time, 
        name, email, mobile, message 
        FROM reservation";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        footer {
            background-color: #130e0e;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table th {
            background-color: black;
            color: #fff;
        }
        .delete-link {
            color: red;
            cursor: pointer;
            text-decoration: none;
        }
        .delete-link:hover {
            text-decoration: underline;
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
    <div class="container">
        <div class="table-container p-4">
            <h2 class="mb-4" style="text-align:center">Reservation Details</h2>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>Reservation ID</th>
                        <th>Guests</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td><a class='delete-link' href='delete_reservation.php?id={$row['reservation_id']}'>Delete</a></td>
                                <td>{$row['reservation_id']}</td>
                                <td>{$row['guests']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['time']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['mobile']}</td>
                                <td>{$row['message']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No reservations found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer style="margin-top:390px">
        <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
