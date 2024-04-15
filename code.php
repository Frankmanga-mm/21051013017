<?php
session_start();
$Email = $_SESSION['user'];
$codeErr = "";
if(isset($_POST['send'])){
	$code = $_POST['code'];
	if(!empty($code)){
		require_once ('connect.php');
		$check = "SELECT * FROM user WHERE codes= '$code'";
		$run = mysqli_query($conn,$check);
		$rows = mysqli_num_rows($run);
		if($rows===1){
			$data = mysqli_fetch_assoc($run);
			$ex_code = $data['codes'];
			$trials = $data['trials'];
			header("location:new_pwd.php");

			//if($code===$ex_code){
			//	$codeErr = "Code Verified!";
				//$delete = "DELETE FROM password_reset WHERE Email = '$Email'";
			// 	$run = mysqli_query($conn,$delete);
			// 	header('Refresh:2;url=new_pwd.php');
			// }else{
			// 	if($trials==3){
			// 		$codeErr = "Account Disabled";
			// 	}else{
			// 		$increment = 1;
			// 		$add = "UPDATE password_reset SET trials = trials+'$increment'";
			// 		$run = mysqli_query($conn,$add);
			// 		$codeErr = "Invalid code";

			// 	}
			// }
		//}else{
			//$codeErr = "No records";
	
		//}
		}
	}
	else{
		$codeErr = "* code is required!";
	}
}







?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Code</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off">
		<input type="text" name="code" placeholder="Enter Code">
		<button name="send">Send</button>
	</form>
	<p style="color:red;"><?php echo $codeErr;?></p>
</body>
</html>