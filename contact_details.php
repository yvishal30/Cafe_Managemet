<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant"; // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>
                alert('All fields are required. Please try again.');
                window.location.href = 'contact.php';
              </script>";
        exit;
    }

    // Prepare and bind SQL statement
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
            // Email sent successfully
            echo "<script>
                    alert('Message sent and saved successfully!');
                    window.location.href = 'contact.php';
                  </script>";
        } else {
            // Failed to send email, but data is saved
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

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
