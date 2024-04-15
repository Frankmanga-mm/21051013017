<?php 
$Email="";
$codes="";
//Required Files
require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

//namespaces
use Mailer\PHPMailer\PHPMailer;
use Mailer\PHPMailer\SMTP;
use Mailer\PHPMailer\Exception;

//create instance of phpmailer
$mail = new Mailer();

//set mail to use smtp
$mail->isSMTP();

//smtp host
$mail->Host = "smtp.gmail.com";

//smtp authentication
$mail->SMTPAuth = "true";

//set type of encryption (ssl/tls)
$mail->SMTPSecure = "tls";

//set smtp port
$mail->Port = "587";

//set mail username
$mail->Username = "home.codeacady@gmail.com";

//set mail password
$mail->Password = "iloveafrica12AF";

//mail subject
$mail->Subject = "Password Reset";


//sender email
$mail->setFrom('home.codeacady@gmail.com','Efood Online');

//html support
$mail->isHTML(true);
//email body

//function sendSms($room,$hostel,$name){
$mail->Body = "<p>Dear <b>$Email</b>, You have requested password reset Use Code: <b>$codes</b></p><p style='color:darkblue;'><b>&copy; 2022 eFood Online - Code Academy</b>";
//}

//receiver mail address
$mail->addAddress($Email);

//send email
$mail->Send();

//Close connection
$mail->smtpClose();





?>