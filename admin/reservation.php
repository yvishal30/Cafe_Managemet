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
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin: 20px auto;
            max-width: 90%;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    <div class="container">
        <div class="table-container p-4">
            <h2 class="mb-4" style="text-align:center">Reservation Details</h2>
            <table class="table table-striped table-bordered">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
