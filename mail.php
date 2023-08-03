<?php
$to = "abhishek.hajare@mitaoe.ac.in";
$subject = "Test email";
$message = "This is a test email sent from PHP.";

$headers = "From: Farmagrimitaoe@gmail.com\r\n";
$headers .= "Reply-To: Farmagrimitaoe@gmail.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);
?>