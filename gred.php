<?php 

include("connect.php"); 
if(isset($_POST['button'])){
$Fname=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Fname'])))));


if(empty($_POST['Fname'])){
	$fn="Fill Your first name";

}
else{
$Sname=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Sname'])))));
if(empty($_POST['Sname'])){
	$fn="Fill Your second name";
}
else{
$Lname=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Lname'])))));

if(empty($_POST['Lname'])){
	$fn="Fill Your last name";
}
else{
$Phone=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Phone'])))));

if(empty($_POST['Phone'])){
	$fn="Fill  Your Phone number";
}
else{
$Address=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Address'])))));

if(empty($_POST['Address'])){
	$fn="Fill Your Address";
}
else{
$Gender=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Gender'])))));

if(empty($_POST['Gender'])){
	$fn="Select Your Genger";
}
else{
$Email=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Email'])))));
if(empty($_POST['Email'])){
	$fn="Fill Your Email";
}
else{
$Password=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Password'])))));

if(empty($_POST['Password'])){
	$fn="Fill Your Password";
}
else{

  $Cpassword=mysqli_escape_string($conn,stripcslashes(htmlentities(strip_tags(trim($_POST['Cpassword'])))));
if($Password==$Cpassword){
$hash=password_hash($Password, PASSWORD_DEFAULT);
$select="SELECT Email FROM user WHERE Email='$Email'";
$row=mysqli_query($conn,$select);
if(mysqli_num_rows($row)>0){
$rows=mysqli_fetch_assoc($row);
if($Email==isset($rows['Email'])){
	$fn="Email exist";
}

}
else{
	 $number=rand(1000,9999);
	 //die("$number");
$sent="INSERT INTO user(Fname,Sname,Lname,Phone,Address,Gender,Email,Password,codes)VALUES('$Fname','$Sname','$Lname','$Phone','$Address','$Gender','$Email','$hash','$number')";
if(mysqli_query($conn,$sent)){
	  session_start();
        //$number=rand(1000,9999);
        // $_SESSION['code_number']=$number;
        // $_SESSION['email_id']=$Email;
        // $Email=base64_encode($Email);
        require_once("email_account_activation.php");
        echo"message sent to email";
        //header("location:../index.php");
//$sk="Thank you for your registration you have registerrd successfully";
}
else{
	$fn="Registration was failed";
}
}
} 
else{

	$fn="Password does not match";
}

}
}
}
}
}
}
}
}
}
?>