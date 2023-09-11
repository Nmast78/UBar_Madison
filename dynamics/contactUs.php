<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_email = "admin@ubarmadison.com"; 

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate email format (you can use a more robust validation method)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email address, e.g., show an error message to the user
        echo "Invalid email address";
    } else {
        $subject = "Contact Form Submission from $name";
        $headers = "From: $email";

        if (mail($recipient_email, $subject, $message, $headers)) {
            // Email sent successfully, provide feedback to the user
            echo "Thank you for your message! We will get back to you shortly.";
        } else {
            // Email sending failed, handle the error (e.g., log it)
            echo "Sorry, there was an error sending your message. Please try again later.";
        }
    }
}
?>