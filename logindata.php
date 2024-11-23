<?php
session_start(); // Start the session at the beginning

$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "restaurant") or die("Connection error");

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query to check if the username and password exist in the register table
$sql = "SELECT * FROM register WHERE username='{$username}' AND password='{$password}'";
$result = mysqli_query($conn, $sql) or die("Query unsuccessful.");

// Check if any record exists that matches the username and password
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); // Fetch the user data
    $user_id = $row['register_id']; // Assuming 'user_id' is a column in the 'register' table
    
    // Store user ID in session
    $_SESSION['user_id'] = $user_id;

    // Insert login details into the 'login' table
    $sql = "INSERT INTO login(username, password) VALUES('{$username}', '{$password}')";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");

    // Redirect to the homepage or main page
    header("Location: http://localhost/Cafe_Management/index.php");
} else {
    // Redirect back to the login page with an error if credentials are invalid
    header("Location: http://localhost/Cafe_Management/login.php?error=1");
}

mysqli_close($conn);
?>
