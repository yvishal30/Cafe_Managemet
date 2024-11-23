<?php
// Database connection settings
$servername = "localhost";  // Usually "localhost" in XAMPP
$username = "root";         // Default username for XAMPP
$password = "";             // Default password for XAMPP (blank)
$dbname = "restaurant";  // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Email settings
        $to = "30vishalyadav@gmail.com"; // Your email address to receive messages
        $subject = "Contact Form Submission from " . $name;
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            // Email sent successfully, show success message
            echo "<script>
                    alert('Message sent and saved successfully!');
                    window.location.href = 'contact.php';
                  </script>";
        } else {
            // Failed to send email but data is saved
            echo "<script>
                    alert('Message saved, but email failed to send.');
                    window.location.href = 'contact.php';
                  </script>";
        }
    } else {
        // Failed to save data
        echo "<script>
                alert('Failed to save message. Please try again later.');
                window.location.href = 'contact.php';
              </script>";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
