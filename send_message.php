<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Set recipient email (replace with your Gmail address)
$to = "your.email@gmail.com"; // Replace this with your actual Gmail address

// Create email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Compose the email message
$emailContent = "
<html>
<head>
    <title>New Contact Form Message</title>
</head>
<body>
    <h2>Contact Form Message</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Subject:</strong> {$subject}</p>
    <p><strong>Message:</strong></p>
    <p>{$message}</p>
</body>
</html>
";

// Send email
$mailSent = mail($to, "Contact Form: $subject", $emailContent, $headers);

// Send response back
$response = array(
    'success' => $mailSent,
    'message' => $mailSent ? 'Message sent successfully!' : 'Failed to send message. Please try again.'
);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>