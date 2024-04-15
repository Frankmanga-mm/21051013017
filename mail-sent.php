<?php session_start() ?>
<!doctype html>
<html>
    <head>
        <title>
            Sent Code To Mail
     </title>
    </head>
    <body >
        <div class="container">
            <div class="row  w3-margin">
                <div class="justify-content-center">
                    <div class="container w3-card-2  phone-padding-5">
                        <div class="w3-container w3-border-bottom" style="padding: 0">
                            <img  src="../assets/logo/logoD.png" style="width: 100px;height: 75px;float: left">
                            <h4 class="pull-left">Past Paper Brands</h4><br><br>
                           
                        </div>
                        <div class="w3-container w3-margin">
                     <h5>Your Verification Code Have Been Sent to <span class="w3-text-blue"><?php echo $_SESSION['Email']; 
                            unset($_SESSION['Email']) ?></span></h5>
                            <a href="index.php" class="btn btn-sm btn-primary">Login</a>
                        </div>
                        <div class="w3-container w3-border-top">
                            <h5><i>Past Paper Brand</i></h5>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>


