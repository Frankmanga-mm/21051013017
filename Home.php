<?php
session_start();
//$_SESSION['login']=$name;
//header("location:users.php");
error_reporting(0);
include("connect.php");
if(isset($_POST['login'])){
$Email=mysqli_escape_string($conn,$_POST['Email']);
$Pass=mysqli_escape_string($conn,$_POST['pass']);
//$Pass=mysqli_escape_string($conn,$_POST['role']);
$sent="SELECT * FROM user WHERE Email='$Email' AND activation_status='Activated'";
$sql=mysqli_query($conn,$sent);
if(mysqli_num_rows($sql)==1){
$row=mysqli_fetch_array($sql);
$Password=$row['Password'];
$Email=$row['Email'];
$role=$row['role'];
if(password_verify($Pass,$Password)){
	session_start();
	$_SESSION['role']=$role;
	$_SESSION['Email']=$Email;
	if($_SESSION['role']=='Admin')
	{
		header("location:Users.php");
	die();
	}
else{
	header("location:more.php");
	die();
}
}
else{

	$fr="wrong password or username";
}



}
}

//}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:#ffffcc;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;

}

.dropdown:hover .dropdown-content {
  display: block;
}




		*{

			margin:0 0;
		}
	#all{background-color:#ffffcc;
		height:100vh ;
		width:auto ;
	background-image:url("../photoes/2.jpg");
	min-height:200px;
	background-position:center;
background-repeat:no-repeat;
background-size:cover;
position:relative;}

#us{border-radius:26px ;
margin-left: 26px;
margin-top: 26px;}

#pass{border-radius:26px ;
margin-left:26px;
margin-top: 26px;}

#lg{border-radius:26px ;
margin-left:100px;
margin-top: 26px;}


	 	
	 	#link{
		height:20vh ;
		width:auto ;
	background-color:;
	animation: glow o.5s ease-in-out infinite alternate;

	 }	
#log{
	background-color:;
	height: 90%;
	width: 40%;
	float:left;
 }
 #ko{
 	float:left;
 	background-color:;
	height:80vh;
	width:50%;
	font-family:Times New  Roman;
 }
 #ms{
 	background-image:url("../photoes/geo.jpg");
	min-height:400px;
	background-position:center;
background-repeat:no-repeat;
background-size:cover;
position:relative;
 }

	</style>
</head>
<body>
<div id="all">
	<div id="link">
		<div class="dropdown">
  <span style="font-size:30px;">Menu</span>
  <div class="dropdown-content">
  	<table><tr>
  	<td><a href="home.php" id="hom" style="margin-left:90px; font-size:30px;">Home</a></td>
            	<td> <a href="image.php" id="img"style="margin-left:150px;font-size:30px;">Image</a></td>
            	<td><a href="about.php" id="abt" style="margin-left:180px;font-size:30px;">About</a></td>
          	<td> <a href="contacts.php" id="contact" style="margin-left:250px;font-size:30px; ">Contact</a></td>
       </tr>
       </table>
  </div>
</div>	
	</div><div id="ko"><pre><h1>
    FOR MORE REVISSION  YOUR WORMLY WELCOME
  </h1>
</pre>
	</div>

    <div id="log">
    	<center><div Id="ms"style="height:50vh;width:60%;margin-top:30px;border: 1px solid red;background-color:gray; border-radius:26px;">
    		<form method="POST">
	<table> 
	<h1 id="ln"> <img src=""><pre>ONLINE-PASTPAPER</pre></h1>
	<tr><td><img src="../photoes/image.png" height="30px"width="30px" style="border-radius:50%;"><input type="text" name="Email" placeholder="username" id="us"></td></tr>
	<tr><td><img src="../photoes/lock.png" height="30px"width="30px" style="border-radius:50%;"><input type="password" name="pass" placeholder="password" id="pass"></td></tr>
	<tr><td style="color:red;"><?php echo $fr ?></td></tr>
	<tr><td><b>You don't have an acount</b><br>
	<a href="register.php" id="su"><b>sign up here</b></a></td></tr></td>
	</tr>
	<tr><td><b>Forgot password</b><br>
	<a href="pwd_reset.php" id="su">Reset here</a></td></tr></td>
	<tr><td><input type="submit" name="login" value="login" id="lg"></td></tr>
	
	</tr>
</table>
</form>	
    	</div>

    </center>
    </div>


</div>
</body>
</html>