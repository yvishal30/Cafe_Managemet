<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Cart Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom Styles for Footer */
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

    <!-- Content Section -->
    <div class="container mt-5">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Manage the restaurant's data, reservations, and more from here.</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>Copyright &copy; 2024 VS Restaurant. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS & Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
