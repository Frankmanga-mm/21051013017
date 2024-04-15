 <?php 
include("connect.php");
if(isset($_GET['m'])){
$k=base64_decode($_GET['m']);
$row="DELETE FROM `user` WHERE `user`.`id` = $k";
$sent=mysqli_query($conn,$row);
if($sent){
	header("location:Users.php")or die();
}
else{
	"Unable to delete";
}

}



?>