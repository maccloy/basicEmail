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
$fname = filter_var($fname, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);
$lname = filter_var($lname, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);
$message = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);

// Set where to send the email and the subject line
$sendTo = "nick_cloy@hotmail.com";
$subject = "Test email from homepage";

// Compose the message body
$emailMessage = "$fname $lname \n";
$emailMessage .= "$message \n";
$emailMessage .= "from: $email\n";

// Set the headers so the receiver knows who sent it and can reply to them
$headers = array(
    'From' => $email,
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/' . phpversion()
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