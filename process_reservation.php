<?php
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

// Insert data into database
$sql = "INSERT INTO reservation (guests, date, time, name, email, mobile, message) VALUES ('$guests', '$date', '$time', '$name', '$email', '$mobile', '$message')";

if ($conn->query($sql) === TRUE) {
    // Retrieve the last inserted ID
    $reservation_id = $conn->insert_id;

    // Display success message with reservation ID in a JavaScript alert
    echo "<script>
            alert('Table booked successfully! Your Reservation ID is: $reservation_id');
            window.location.href = 'book_table.php';
          </script>";
} else {
    echo "<script>
            alert('Error: Could not complete reservation. Please try again.');
            window.location.href = 'book_table.php';
          </script>";
}

// Close connection
$conn->close();
?>
