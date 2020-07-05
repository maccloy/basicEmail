<?php

// Get the submitted form data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$message = $_POST["message"];

// For error checking
$errors = "";

// Check that the email address given is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors = "Invalid format and please re-enter valid email <br>";
} else {
    // Sanitise just to be on the safe side
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
}

// Sanitise the rest of the form input
$fname = filter_var($fname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lname = filter_var($lname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Set where to send the email and the subject line
$sendTo = "nick_cloy@hotmail.com";
$subject = "Test email from homepage";

// Compose the message body
$emailMessage = "";

$emailMessage .= "<style>";

$emailMessage .= "div {";
$emailMessage .= "margin-top: 10px;";
$emailMessage .= "}";

$emailMessage .= "p {";
$emailMessage .= "margin-left: 25px;";
$emailMessage .= "color: blue;";
$emailMessage .= "}";

$emailMessage .= "a {";
$emailMessage .= "font-style: italic;";
$emailMessage .= "}";

$emailMessage .= "</style>";

$emailMessage .= "<div>";
$emailMessage .= "<h2>Thank you for using my demo email script!</h2>";
$emailMessage .= "<h3>Your name</h3>";
$emailMessage .= "<p>$fname $lname</p>";
$emailMessage .= "<h3>Your message</h3>";
$emailMessage .= "<p>$message</p>";
$emailMessage .= "<h3>Your email address</h3>";
$emailMessage .= "<p>$email <a href='mailto:$fname $lname <$email>'>Mail yourself back!</a></p>";
$emailMessage .= "</div>";

// Set the headers so the receiver knows who sent it and can reply to them
$headers = array(
    "MIME-Version" => "1.0",
    "Content-type" => "text/html; charset=iso-8859-1",
    "From" => "$fname $lname <$email>",
    "Reply-To" => "$fname $lname <$email>",
    "X-Mailer" => "PHP/" . phpversion()
);

// If there are no error messages then send the email
if ($errors == "") {
    // Send the email
    if (mail($sendTo, $subject, $emailMessage, $headers)) {
        // email sent sucessfully
        echo "Sent email";
    } else {
        // Couldnt send email
        echo "Fail to send email";
    }
} else {
    // There were errors validaing the form inputs
    echo "Couldn't send email: <br> $errors";
}


?>