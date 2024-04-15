     
<?php

session_start();
include("connect.php");


if(isset($_POST['newpass'])){

$Passsword=strtolower(mysqli_real_escape_string($conn,stripslashes(htmlentities(strip_tags(trim(($_POST['Password'])))))));

if(empty($Passsword)){  echo"password cannot be empty";}

else{
    

$Cpassword=strtolower(mysqli_real_escape_string($conn,stripslashes(htmlentities(strip_tags(trim(($_POST['Cpassword'])))))));

if(empty($Cpassword)){  echo" confirm password cannot be empty";} 

else{
if($Passsword===$Cpassword){

	 

$newsiri=password_hash($Passsword, PASSWORD_DEFAULT);
    $update="update user set Password='$newsiri' where Email='".$_SESSION['email']."'";
if(mysqli_query($conn,$update)){
    header('location:../index.php');
}



else{

    $error="failed to change password";
}
}


else{
    $error="passwords do not match";
}
}

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <title>Create New Password</title>
   
</head>
<body>
    
    
<main class="page landing-page">
<div id="divall">  
<center>
<div id="divnew">
    <form method="POST">
    <pre>
    <p style="color:black"><b><h2></h2></b></p>CREATE A NEW PASSWORD
    <i class="fa fa-lock"></i>   <input type="password" name="Password" placeholder="enter new password">

    <i class="fa fa-lock"></i>   <input type="password" name="Cpassword" placeholder="confirm new password">

    <input type="reset" name="cancel" value="cancel" style="background-color:red;color:white">  <input type="submit" name="newpass" value="create new password"style="background-color:blue;color:white">

    </pre>
    </form>
   
    <div  id ="error" style="color:white">  <?php if(isset($error)){
        echo $error;
    
    } ?>  </div>

    
    </div>
    </center>
    </main>
</div>
</body>
</html>  
