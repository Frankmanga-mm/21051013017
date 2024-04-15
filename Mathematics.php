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
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
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

.dropdown:hover .dropdown-content {
  display: block;
}




        *{

            margin:0 0;
        }
    #all{background-color:#ffffcc;
        height:100vh ;
        width:auto ;}
#us{border-radius:26px ;
margin-left: 26px;
margin-top: 26px;}

#pass{border-radius:26px ;
margin-left:26px;
margin-top: 26px;}

#lg{border-radius:26px ;
margin-left:100px;
margin-top: 26px;}

#tb{
    background-color:gray;
    height:60%;
    width: 30%;
    background-image:url("../photoes/geo.jpg");
    min-height:200px;
    background-position:center;
background-repeat:no-repeat;
background-size:cover;
position:relative;}
}
        
        #link{
        height:60px ;
        width:auto ;
    background-color:gold;

     }  
#log{
    background-color:;
    height: 80vh;
    width: 50%;
    float:left;

 }
 #ko{
    float:left;
    background-color:;
    height:80vh;
    width:50%;
    font-family:Times New  Roman;
 }
#books{
    background-color:;
    margin-top:60px;
    width:300px;
    height:300px;
    margin-left:500px;
    border-radius: 26px;
    border: 1px solid red;
}
    </style>
</head>
<body>
<div id="all">
    <div id="link">
        <div class="dropdown">
  <span style="font-size:30px;">Menu</span>
  <div class="dropdown-content">
  <p>
    <a href="home.php" id="hom" style="margin-left:90px; font-size:30px;">Home</a>
           <a href="image.php" id="img"style="margin-left:150px;font-size:30px;">Image</a>
          <a href="about.php" id="abt" style="margin-left:180px;font-size:30px;">About</a>
         <a href="contacts.php" id="contact" style="margin-left:250px;font-size:30px; ">Contact</a>
  </p>
  </div>
</div>
        
    </div>

</head>
<body>
    
    <center>
<table border="1" id="tb">
    <tr>
    
    <?php
    include("connect.php");
    error_reporting(0);
    $sent="SELECT * FROM documents";
   // $Sno=1;
    $sql=mysqli_query($conn,$sent);
    while($row=mysqli_fetch_array($sql)){
$k=$row['id'];
$fileName=$row['document'];

//$file=$row['file'];

echo"<tr>";
 echo"<td><a href='documents/$fileName'><center>Click here to download</center></a></td>"; 
echo"</tr>";
//$Sno++;
    }

    ?>

<tr><td align="center"><a href="logout.php">Logout</td></tr>
</table>
</center>

</body>
</html>