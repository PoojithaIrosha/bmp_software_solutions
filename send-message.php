<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assets/phpmailer/Exception.php';
require 'assets/phpmailer/PHPMailer.php';
require 'assets/phpmailer/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$message = $_POST["message"];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'softwaresolutionsbmp@gmail.com';                     //SMTP username
    $mail->Password = 'racplqkmozbjdexw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('softwaresolutionsbmp@gmail.com', 'BMP Software Solutions');     //Add a recipient
    $mail->addReplyTo($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message From ' . $name;
    $mail->Body = "Name: {$name}<br>Contact No: {$mobile}<br>Email: {$email}<br>Message: {$message}";

    $mail->send();
    echo 'Message sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
