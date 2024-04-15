<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		#tb{
    background-color:gray;
    height:100%;
    width: 100%;
    background-image:url("../photoes/geo.jpg");
    min-height:100%;
    background-position:center;
background-repeat:no-repeat;
background-size:cover;
position:relative;}
}
	</style>
</head>
<div id="tb">
<body>
	
	<center><table><tr><td style="background:green;"><a href="Mathematics.php">Documents</a></td></tr></table></center>
	<center>
<table border="1">
<tr>
		<td>Sno</td>
		<td>FirstName</td>
		<td>SecondName</td>
		<td>LastName</td>
		<td>Phone</td>
		<td>Address</td>
		<td>Gender</td>
		<td>Email</td>
		<td>Picha</td>
		<td colspan="2">manage user</td>
	</tr>
	
	<?php
	include("connect.php");
	error_reporting(0);
	$sent="SELECT * FROM user";
	$Sno=1;
	$sql=mysqli_query($conn,$sent);
	while($row=mysqli_fetch_array($sql)){
$k=$row['id'];
$FirstName=$row['Fname'];
$SecondName=$row['Sname'];
$LastName=$row['Lname'];
$Phone=$row['Phone'];
$Address=$row['Address'];
$Gender=$row['Gender'];
$Email=$row['Email'];
$fileName=$row['picha'];

//$file=$row['file'];

echo"<tr>";
echo"<td>$Sno</td>";
echo"<td>$FirstName</td>";
echo"<td>$SecondName</td>";
echo"<td>$LastName</td>";
echo"<td>$Phone</td>";
echo"<td>$Address</td>";
echo"<td>$Gender</td>";
echo"<td>$Email</td>";
 echo"<td><img src='picha/$fileName'height='40px' weight='40px'></td>"; ?>
<td><a href='update.php?m=<?php echo base64_encode($k)?>'>edit</a></td>";
<td> <a href='delete.php?m=<?php echo base64_encode($k)?>'>delete</a></td>";
<?php
echo"</tr>";
$Sno++;
	}

	?>


</table>
</center>
<center>
<table>
	<tr>
<td style="background:gray;"><a href="excel.php">Print excel</a></td>

<td style="background:yellow;"><a href="PDFreport.php">Print pdf</a></td>

<td style="background:green;"><a href="upload_sample.php">Upload document</a></td>
</tr>
<tr><td style="background:red;"><a href="logout.php">Logout</td></tr>

</table>
</center>
</body>
</div>
</html>