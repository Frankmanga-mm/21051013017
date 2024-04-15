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
    $mail->Host       = 'mail.atchosting.ac.tz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ahmour@atchosting.ac.tz';                     //SMTP username
    $mail->Password   = 'S@n10102020';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ahmour@atchosting.ac.tz', 'Online past paper system');
    $mail->addAddress($email);
    $mail->addReplyTo('ahmour@atchosting.ac.tz', 'Information');
// <a href='21051013017/OPS/verifypassword.php?email=$email&&code=$code'>Click this link  to reset password  </a>"
    //Content
    $message = " <a href='localhost/21051013017/OPS/verify_pwd.php?email=$email&&code=$code'>Click this link  to reset password </a>";
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'reset password';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>