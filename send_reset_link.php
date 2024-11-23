<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email address from the form
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Email subject and body
    $subject = "Password Reset Request";
    $body = "Hello,\n\nTo reset your password, please click the link below:\n\n";
    $body .= "http://yourwebsite.com/reset_password.php?email=" . urlencode($email) . "\n\n";
    $body .= "Thank you!";

    // Email headers
    $headers = "From: 1062240252@timscdrmumbai.in";

    // Sending email
    if (mail($email, $subject, $body, $headers)) {
        echo "A reset link has been sent to $email.";
    } else {
        echo "Unable to send email. Please try again later.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
