<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'atchosting.ac.tz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'system1556@gmail.com';                     //SMTP username
    $mail->Password   = '1903bahati';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('system1556@gmail.com', 'Online Patient Registration System');
    $mail->addAddress("mangafrank20@gmail.com");
    $mail->addReplyTo('system1556@gmail.com', 'Information');
// <a href='atchosting.ac.tz/OPRS/php/verifyaccount.php?email=$email&&code=$code'>Click this link  to activate account </a>";
    //Content
    $message = "sms";
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ACCOUNT ACTIVATION';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>