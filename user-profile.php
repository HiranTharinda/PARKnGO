<?php

session_start();

error_reporting(0);
require_once "includes/config.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: userlogin.php");
    exit;
} else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['uid'];
    $email=$_POST['email'];

  
     $query=mysqli_query($link, "update users set  email='$email' where uid='$uid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
<link rel="stylesheet" href="assets/css/style.css">
    <title>PARKnGO - User Profile</title>
   


</head>

  

<?php include_once('includes/userHeader.php');?>
                
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
              <center>
                <div>
                  <h2 style="color: #fff">User Profile</h2>
                </div>
              </center>
              <div class="login-form">
                <form method="post">
                  <div class="wrapper fadeInDown">
                    <div id="formContent">
                      <h2 class="active"> Log in </h2>
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   <?php
$uid = $_SESSION['uid'];
$ret=mysqli_query($link,"select * from users where uid = $uid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="adminname" name="dealername" type="text" value="<?php  echo $row['username'];?>" readonly='true'></div>
                                    </div>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input class="form-control " id="email" name="email" type="text" value="<?php  echo $row['email'];?>" required="true" ></div>
                                    </div>
                                  
                                    
                                    <?php } ?>
                                   <p style="text-align: center;"> <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Update" /></p>
                                </form>
                    </div>
                  </div>
              </div>
            </div>
        </div> 
    </div>       
</body>
</html>
<?php }  ?>