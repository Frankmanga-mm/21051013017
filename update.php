<?php 
include("connect.php");
if(isset($_GET['m'])){
	$id=base64_decode($_GET['m']);
		$sent="SELECT * FROM  user WHERE  id='$id'";
$sql=mysqli_query($conn,$sent);
if(mysqli_num_rows($sql)==1){

	while($row=mysqli_fetch_array($sql)){
$idd=$row['id'];
$Fname=$row['Fname'];
$Sname=$row['Sname'];
$Lname=$row['Lname'];
$Phone=$row['Phone'];
$Address=$row['Address'];
$Gender=$row['Gender'];
$Email=$row['Email'];

}
}
}
if(isset($_POST['button'])){
	$id=$_POST['id'];
$Fname=$_POST['Fname'];
$Sname=$_POST['Sname'];
$Lname=$_POST['Lname'];
$Phone=$_POST['Phone'];
$Address=$_POST['Address'];
$Gender=$_POST['Gender'];
$Email=$_POST['Email'];



$sql="UPDATE user SET  Fname='$Fname',Sname='$Sname',Lname='$Lname',Phone='$Phone',Address='$Address',Gender='$Gender',Email='$Email' where id='$id'";
$sqr=mysqli_query($conn,$sql);
if($sqr){
header("location:Users.php") ;
}
else{
	echo"Unable to update";
}
}
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

	border-radius:26px;
	margin-top:10px;
}

#F{
border-radius:26px;
	margin-top:10px;
margin-left: 100%;
}

#Sn{

	border-radius:26px;
}

#Ln{

	border-radius:26px;

}
#Em{

	border-radius:26px;
}
#Ad{

	border-radius:26px;
}
#Ph{

	border-radius:26px;

}
#lg{
	border-radius:26px ;
	margin-top:30px ;
margin-left: 30%;
background:blue;
}


#sel{
	border-radius:26px ;
	margin-left:100% ;
}
#cl{
	border-radius:26px ;
	margin-left:80% ;
	margin-top:30px ;
	background:red ;
}


#pass{

	border-radius:26px;

</style>

</head>
<body>
	<div id="log">
<form method="POST">
	<table align="center">
		<tr><td></td><td><input type="hidden" name="id"  value="<?php echo  $idd?>" id="id"></td></tr>
		<tr><td>First name</td><td><input type="text" name="Fname"  value="<?php echo  $Fname?>" id="Fn"></td></tr>
		<tr><td>Second name</td><td><input type="text" name="Sname" id="Sn" value="<?php echo  $Sname?>"></td></tr>
		<tr><td>Last name</td><td><input type="text" name="Lname" id="Ln" value="<?php echo  $Lname?>"></td></tr>
		<tr><td>Phone</td><td><input type="text" name="Phone" id="Ln"value="<?php echo  $Phone?>"></td></tr>
		<tr><td>Address</td><td><input type="text" name="Address" id="Ad" value="<?php echo  $Address?>"></td></tr>
		<tr><td>Select gender<select id="sel" name="Gender" value="<?php echo $Gender?>">
			<option> </option>
			<option>male</option>
			<option>female</option>
		</select>
		</td></tr>
			<tr><td>Email</td><td><input type="text" name="Email" id="Em" value="<?php echo $Email?>"></td></tr>
		<tr><td><input type="reset" name="button"  value="Cancel" id="cl"></td><td><input type="submit" name="button"  value="update" id="lg"> </td></tr>
  
			
	</table>
</form>
</div>
</body>
</html>