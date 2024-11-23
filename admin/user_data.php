<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'restaurant'; // Replace with your database name
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle record deletion (if delete button is clicked)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteRecord'])) {
    $table = $_POST['table'];
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM $table WHERE login_id = ?");
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        die("Error deleting record: " . $conn->error);
    }
    $stmt->close();
}

// Fetch data from `login` and `register` tables
$loginQuery = "SELECT * FROM login";
$registerQuery = "SELECT * FROM register";

$loginResult = $conn->query($loginQuery);
$registerResult = $conn->query($registerQuery);

if (!$loginResult) {
    die("Login Query Error: " . $conn->error);
}
if (!$registerResult) {
    die("Register Query Error: " . $conn->error);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: crimson;
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

        .table .btn-danger {
            padding: 5px 10px;
        }

        footer {
            background-color: #130e0e;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }

        footer-text {
            font-size: 14px;
        }

        /* Hover effect for table rows */
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Button styling */
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .btn-danger:focus,
        .btn-danger.focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
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
        <!-- <h1>Admin User Management</h1> -->

        <!-- Login Table -->
        <h3 class="text-center">Login Table</h3>
        <table class="table table-bordered  table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Login ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Date & Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($loginResult->num_rows > 0) {
                    while ($row = $loginResult->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['login_id']) ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['password']) ?></td>
                            <td><?= htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['date_time']))) ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="table" value="login">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['login_id']) ?>">
                                    <button type="submit" name="deleteRecord" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">No login records found!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Register Table -->
        <h3 class="text-center">Register Table</h3>
        <table class="table table-bordered  table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($registerResult->num_rows > 0) {
                    while ($row = $registerResult->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['register_id']) ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['password']) ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="table" value="register">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['register_id']) ?>">
                                    <button type="submit" name="deleteRecord" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No register records found!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p class="footer-text">© 2024 VS Restaurant. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS & Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>
