
<?php


include('data.php');
session_start();

if(isset($_POST['document'])) {
    
    $file = $_FILES['document'];
    $file_name = $file['name'];
    $filesize = $file['size'];
    $file_temp = $file["tmp_name"];
  
    $ext = explode('.', $file_name);
    $extension = strtolower(end($ext));
    $allowed_extensions = array('pdf','docx','PPT',);
    if(in_array($extension, $allowed_extensions)) {
      if($filesize <= 5000000) {
        $fileName = $file_name;
        $newDestination ='documents/'.$fileName;
        $newDestination=htmlspecialchars($newDestination);
        move_uploaded_file($file_temp, $newDestination);
        $query= "INSERT INTO documents(document)VALUE('$fileName')";
        if(mysqli_query($conn,$query)){
            echo "document uploaded successfully";
            
            header("location:users.php");

        }

        else{ echo "failed";
        }


    }

    else{
        echo " file size should be less than 5 mb";
    }
}   
else{
    echo "extensions allowed are .PDF , .DOCX,";
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
    <form method="POST" action="upload_sample.php" enctype="multipart/form-data">

<input type="file" name="document" id="picha"> </br></br>


<input type="submit" value="upload" name="document"><br>
<div align="center" style="float:left;"><a href="logout.php">Logout</div>

    </form>
</body>
</html>