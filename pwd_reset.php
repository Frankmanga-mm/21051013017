<?php

include("connect.php");


if(isset($_POST['reset'])){

//recieve the values inserted in the reset page and remove special characters

    $email=strtolower(mysqli_real_escape_string($conn,stripslashes(htmlentities(strip_tags(trim(($_POST['email'])))))));

    $code=substr(md5(mt_rand()),0,5);
    //check if last name exists in the database

$select="select * from user where Email='$email'";
if($sql=mysqli_query($conn,$select)){
if(mysqli_num_rows($sql)==1){

    while($row=mysqli_fetch_array($sql)){
   $Email=$row['Email'];
   require('pwd_reset_email.php');
$query="update user set codes='$code' where Email='$email'";
if(mysqli_query($conn,$query)){
      $error="an email has been sent to your account";

}
 
else{
    $error=" Failed to connect to the database";
}
    }

}

else{
    $error=" email not found,kindly use the email you  were registered with";
}

}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <title>reset password</title>
    </head>
<body>
    
<main class="page landing-page">
       
<center>
<div id="divreset">
    <form method="POST">
    <pre>
    <p style="color:black"><b><h2>RESET PASSWORD</h2></b></p>
    <i class="fa fa-user"></i>   <input type="email" name="email" placeholder="enter your email">

    <input type="reset" name="cancel" value="cancel" style="background-color:red;color:white" >  <input type="submit" name="reset" value="reset"style="background-color:blue;color:white">

    </pre>
    </form>
   
    <div  id ="error" style="color:white">  <?php if(isset($error)){
        echo $error;
    
    } ?>  </div>

    
    </div>
    </center>
    </main>
    
</body>
</html>