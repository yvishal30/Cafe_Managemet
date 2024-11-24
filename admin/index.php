<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from the tables
$confirmedOrdersCount = $conn->query("SELECT COUNT(*) AS count FROM confirmed_orders")->fetch_assoc()['count'];
$totalUsersLogin = $conn->query("SELECT COUNT(*) AS count FROM login")->fetch_assoc()['count'];
$totalUsersRegister = $conn->query("SELECT COUNT(*) AS count FROM register")->fetch_assoc()['count'];
$totalReservations = $conn->query("SELECT COUNT(*) AS count FROM reservation")->fetch_assoc()['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        footer {
            background-color: #130e0e;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
    </style>
</head>
<body class="d-flex flex-column" style="min-height: 100vh;">
    
    <!-- Admin Navbar -->
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">VS Restaurant Admin</a>
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

    <!-- Content Section -->
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <p>Overview of the restaurant's data:</p>

        <div class="row">
            <!-- Confirmed Orders Chart -->
            <div class="col-md-6">
                <h3>Confirmed Orders</h3>
                <canvas id="confirmedOrdersChart" style="max-width: 300px; max-height: 300px;"></canvas>
            </div>

            <!-- Total Users Logged In Chart -->
            <div class="col-md-6">
                <h3>Total Users Logged In</h3>
                <canvas id="usersLoginChart" style="max-width: 300px; max-height: 300px;"></canvas>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Total Users Registered Chart -->
            <div class="col-md-6">
                <h3>Total Users Registered</h3>
                <canvas id="usersRegisterChart" style="max-width: 300px; max-height: 300px;"></canvas>
            </div>

            <!-- Reservations Chart -->
            <div class="col-md-6">
                <h3>Reservations</h3>
                <canvas id="reservationsChart" style="max-width: 300px; max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
    </footer>

    <!-- Chart.js Script -->
    <script>
        // Confirmed Orders Chart
        const confirmedOrdersCtx = document.getElementById('confirmedOrdersChart').getContext('2d');
        new Chart(confirmedOrdersCtx, {
            type: 'pie',
            data: {
                labels: ['Confirmed Orders', 'Remaining'],
                datasets: [{
                    data: [<?php echo $confirmedOrdersCount; ?>, 100 - <?php echo $confirmedOrdersCount; ?>], // Example: Assuming 100 is max for visualization
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(211, 211, 211, 0.6)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(211, 211, 211, 1)'],
                    borderWidth: 1
                }]
            },
            options: { responsive: true }
        });

        // Total Users Logged In Chart
        const usersLoginCtx = document.getElementById('usersLoginChart').getContext('2d');
        new Chart(usersLoginCtx, {
            type: 'pie',
            data: {
                labels: ['Users Logged In', 'Others'],
                datasets: [{
                    data: [<?php echo $totalUsersLogin; ?>, 100 - <?php echo $totalUsersLogin; ?>], // Example: Assuming 100 is max
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(211, 211, 211, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(211, 211, 211, 1)'],
                    borderWidth: 1
                }]
            },
            options: { responsive: true }
        });

        // Total Users Registered Chart
        const usersRegisterCtx = document.getElementById('usersRegisterChart').getContext('2d');
        new Chart(usersRegisterCtx, {
            type: 'pie',
            data: {
                labels: ['Users Registered', 'Others'],
                datasets: [{
                    data: [<?php echo $totalUsersRegister; ?>, 100 - <?php echo $totalUsersRegister; ?>], // Example: Assuming 100 is max
                    backgroundColor: ['rgba(255, 206, 86, 0.6)', 'rgba(211, 211, 211, 0.6)'],
                    borderColor: ['rgba(255, 206, 86, 1)', 'rgba(211, 211, 211, 1)'],
                    borderWidth: 1
                }]
            },
            options: { responsive: true }
        });

        // Reservations Chart
        const reservationsCtx = document.getElementById('reservationsChart').getContext('2d');
        new Chart(reservationsCtx, {
            type: 'pie',
            data: {
                labels: ['Reservations', 'Others'],
                datasets: [{
                    data: [<?php echo $totalReservations; ?>, 100 - <?php echo $totalReservations; ?>], // Example: Assuming 100 is max
                    backgroundColor: ['rgba(34, 139, 34, 0.6)', 'rgba(211, 211, 211, 0.6)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(211, 211, 211, 1)'],
                    borderWidth: 1
                }]
            },
            options: { responsive: true }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
