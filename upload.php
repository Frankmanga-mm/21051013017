
<?php


include('data.php');
session_start();

if(isset($_POST['upload'])) {
    
    $file = $_FILES['picha'];
    $file_name = $file['name'];
    $filesize = $file['size'];
    $file_temp = $file["tmp_name"];
  
    $ext = explode('.', $file_name);
    $extension = strtolower(end($ext));
    $allowed_extensions = array('jpeg', 'jpg', 'png','HEIC');
    if(in_array($extension, $allowed_extensions)) {
      if($filesize <= 5000000) {
        $fileName = $file_name;
        $newDestination ='picha/'.$fileName;
        $newDestination=htmlspecialchars($newDestination);
        move_uploaded_file($file_temp, $newDestination);
        $query= "UPDATE user SET picha='$fileName' WHERE Email='".$_SESSION['Email']."' ";
        if(mysqli_query($conn,$query)){
        header('location:more.php');

        }

        else{ echo "Failed to upload";
        }


    }

    else{
        echo " file size should be less than 5 mb";
    }
}   
else{
    echo "extensions allowed are .png , .jpeg ,jpg, .HEIC";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="upload.php" enctype="multipart/form-data">

<input type="file" name="picha" id="picha"> </br></br>


<input type="submit" value="upload" name="upload"><br>
<div align="center" style="float:left;"><a href="logout.php">Logout</div>

    </form>
</body>
</html>