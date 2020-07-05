<?php

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$message = $_POST["message"];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = "Invalid format and please re-enter valid email <br>";
} else {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
}

$fname = filter_var($fname, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);
$lname = filter_var($lname, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);
$message = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);

echo "$fname $lname <br>";
echo "$message <br>";
echo "$email <br>";



?>