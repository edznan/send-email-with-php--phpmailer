<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "./vendor/autoload.php";

// initialize PHPMailer
$mail = new PHPMailer(true);

$mail->isSMTP();            
$mail->Host = "smtp-mail.outlook.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";  

$mail->SMTPAuth = true;                          
$mail->Username = "YOUR OUTLOOK EMAIL";                 
$mail->Password = "YOUR OUTLOOK PASSWORD";          

// sender information
$mail->From = "me@outlook.com";
$mail->FromName = "John Doe";

// reply to address and name
$mail->addReplyTo("me@outlook.com", "Reply");

// receiver information
$mail->addAddress("friend@gmail.com", "Friend Name");

// body 
$mail->Body = "Hi, this is my first PHPMailer email. <br> Nice to talk to you, friend! <br> Bye.";
// subject
$mail->Subject = "PHPMailer Test";

// send it as HTML email
$mail->isHTML(true);

try {
    $mail->send();
    echo "Email is sent successfully!";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
