<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $to = "ckoomson75@gmail.com";  // Change this to your email
    $subject = "New Contact Form Submission from $firstname";
    $body = "You have received a new message.\n\n".
            "Name: $firstname\n".
            "Email: $email\n".
            "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Thank you, $firstname! Your message has been sent successfully.</p>";
    } else {
        echo "<p>Sorry, something went wrong. Please try again later.</p>";
    }
} else {
    header("Location: index.php#contact");
    exit();
}
?>
