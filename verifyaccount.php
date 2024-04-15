
<?php 

require('connect.php');
$mail = $_GET['Email'];
$code = $_GET['code'];

if (isset($mail) && isset($code)) {
    $query="select * from user where Email='$mail' ";
    if($result=mysqli_query($conn,$query)){
                if(mysqli_num_rows($result)==1){
     
             while($rows=mysqli_fetch_array($result)){
              $codes=$rows['codes'];


              if($code===$codes){
                  $insert="UPDATE user SET activation_status='activated'";
             
    if(mysqli_query($conn,$insert)){
     header('location:../index.php');

          }
        }     
}
}
else{echo"email or code not found";}
}
else{echo"failed to connect";}
}

?>