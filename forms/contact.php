<?php
// Only process the form if it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Set the email recipient
    $receiving_email_address = 'karanshanker0827@gmail.com'; // Change this to your email

    // Set email subject and body
    $email_subject = "New message from: " . $name;
    $email_body = "You have received a new message from the contact form.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n\n".
                  "Message:\n$message";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Send the email
    if (mail($receiving_email_address, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Your message has been sent. Thank you!'); window.location = 'index.html';</script>";  // Redirect back to the form page with success message
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.'); window.location = 'index.html';</script>";
    }
}
?>
