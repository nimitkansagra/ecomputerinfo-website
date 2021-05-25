<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'auto'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = 'mail.ecomputerinfo.co.in';
$mail->Port = 587; // TCP port to connect to
$mail->IsHTML(true);
$mail->Username = 'noreply@ecomputerinfo.co.in';
$mail->Password = '?vxyOp]b$o3m';
$mail->SetFrom('noreply@ecomputerinfo.co.in', 'Computer Info');
$mail->Subject = "Hello";
$mail->Body = "Hola";
$mail->AddAddress('nimitkansagra@outlook.com');

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}