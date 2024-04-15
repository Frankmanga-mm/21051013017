<?php
//Import PHPMailer classes into the global namespace
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
//require 'activate.php';
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //-----------------Server settings--------------------

    //Enable verbose debug output
     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //Send using SMTP
    $mail->isSMTP();
     //Set the SMTP server to send through                                            
  
     $mail->Host       = 'atchosting.ac.tz';
     //Enable SMTP authentication                    
    $mail->SMTPAuth   = true;    
    //SMTP username                              
    $mail->Username   = 'ahmour@atchosting.ac.tz'; 
    //SMTP password                    
    $mail->Password   = 'S@n10102020';  
     //Enable implicit TLS encryption                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`         
    $mail->Port       = 465;                                  

    //---------------------Recipients-------------------------
    $mail->setFrom('ahmour@atchosting.ac.tz','OCWS');
    $mail->addAddress($Email);
    // $mail->addAddress($email, 'Human resource');     
    //Add a recipient
    //  $mail->addAddress('nahlanawarmunga805@gmail.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('nahlanawarmunga805@gmail.com');
    // $mail->addBCC('nahlanawarmunga805@gmail.com');

    //--------------------Attachments-----------------------------
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Activation Code';
    $mail->Body    =" <a href='localhost/21051013017/OPS/verifyaccount.php?Email=$Email&&code=$number'>Click this link  to activate account </a>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //--------------------send-----------------------------

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  
}
?>