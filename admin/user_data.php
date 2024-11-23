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

        .table th,
        .table td {
            text-align: center;
        }

        footer {
            background-color: #130e0e;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- <h1>Admin Panel - User Management</h1> -->

        <!-- Login Table -->
        <h3 style="text-align:center">Login Table</h3>
        <table class="table table-bordered">
            <thead>
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
        <h3 style="text-align:center">Register Table</h3>
        <table class="table table-bordered">
            <thead>
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

    <footer>
        <p>© 2024 VS Restaurant. All rights reserved.</p>
    </footer>
</body>

</html>

<?php
$conn->close();
?>
