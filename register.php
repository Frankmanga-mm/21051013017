<?php
include('gred.php');
error_reporting(1);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style type="text/css">
		#log{
			height:450px;
			width:350px;
			border-radius:26px;
			background:gray;
			margin-left:30%;
			margin-bottom:20px;
			background-image:url("../photoes/geo.jpg");
	min-height:380px;
	background-position:center;
background-repeat:no-repeat;
background-size:cover;
position:relative;
		}
#Fn{
margin-left:26px;
	border-radius:26px;
	margin-top:10px;
}

#Sn{
margin-left:26px;
	border-radius:26px;
}

#Ln{
margin-left:26px;
	border-radius:26px;

}
#Em{
margin-left:26px;
	border-radius:26px;
}
#Ad{
margin-left:26px;
	border-radius:26px;
}
#Ph{

	border-radius:26px;
	margin-left:26px;

}
#lg{
	border-radius:26px ;
	margin-top:30px ;
margin-left: 30%;
background:blue;
}


#sel{
	border-radius:26px ;
	margin-left:35% ;
}
#cl{
	border-radius:26px ;
	margin-left:8% ;
	margin-top:30px ;
	background:red ;
}


#pass{

	border-radius:26px;
}
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
		height:80vh ;
		width:auto ;
	background-image:url("../photoes/4.webp");
	min-height:400px;
	background-position:center;
background-repeat:no-repeat;
background-size:cover;
position:relative;}

#color{
	margin-left:30px;
}

#us{border-radius:26px ;
margin-left: 26px;
margin-top: 26px;}

#pass{border-radius:26px ;
margin-left:26px;
margin-top: 26px;}

#lg{border-radius:26px ;
margin-left: 8%;
margin-top: 26px;}


	 	
	 	#link{
		height:20vh ;
		width:auto ;
	background-color:;

	// }	
	 //log{
	//background-color:;
	//height: 80vh;
	//width: 50%;
	//float:left;
 //}
 #ko{
 	float:left;
 	background-color:;
	height:80vh;
	width:50%;
	font-family:Times New  Roman;
 }
 #ms{
 	background-image:url("K.HEIC");
	min-height:200px;
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
		
	</div>


</style>

</head>
<body>
	<div id="log">
<form method="POST">
	<table align="center">
		<tr><td>First name</td><td><input type="text" name="Fname" id="Fn"></td></tr>
		<tr><td>Second name</td><td><input type="text" name="Sname" id="Sn"></td></tr>
		<tr><td>Last name</td><td><input type="text" name="Lname" id="Ln"></td></tr>
		<tr><td>Phone</td><td><input type="Number" name="Phone" id="Ln"></td></tr>
		<tr><td>Address</td><td><input type="text" name="Address" id="Ad"></td></tr>
		<tr><td>Select gender</td><td><select id="sel" name="Gender" style="align="center">
			<option> </option>
			<option>male</option>
			<option>female</option>
		</select>
		</td></tr>
			<tr><td>Email</td><td><input type="Email" name="Email" id="Em"></td></tr>
			<tr><td>Password</td><td><input type="password" name="Password" id="pass"></td></tr>
			<tr><td>Confirm password</td><td><input type="password" name="Cpassword" id="pass"></td></tr>
			<div id="color"><tr><td style="color:red;"><?php echo $fn ?></td></tr></div>
		<tr><td><input type="reset" name="button"  value="Cancel" id="cl"></td><td><input type="submit" name="button"  value="register" id="lg"> </td></tr>
  
			
	</table>
</form>
<div>
</body>
</html>