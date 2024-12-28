<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "restaurant";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$guests = $_POST['guests'];
$date = $_POST['date'];
$time = $_POST['time'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

// Check availability of tables
$sql = "SELECT COUNT(*) AS count FROM reservation WHERE date = '$date' AND time = '$time' AND status = 'booked'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$bookedCount = $row['count'];

// Redirect back with a message
if ($bookedCount >= 10) {
    $message = "All tables are booked for this date and time. Please try a different slot.";
    header("Location: book_table.php?message=" . urlencode($message) . "&status=error");
    exit;
} else {
    // Insert reservation into the database
    $sql = "INSERT INTO reservation (guests, date, time, name, email, mobile, message, status) VALUES ('$guests', '$date', '$time', '$name', '$email', '$mobile', '$message', 'booked')";
    if ($conn->query($sql) === TRUE) {
        $reservation_id = $conn->insert_id;
        $message = "Table booked successfully! Your Reservation ID is: $reservation_id.";
        header("Location: book_table.php?message=" . urlencode($message) . "&status=success");
        exit;
    } else {
        $message = "Error: Could not complete the reservation. Please try again.";
        header("Location: book_table.php?message=" . urlencode($message) . "&status=error");
        exit;
    }
}
// Close connection
$conn->close();
?>
