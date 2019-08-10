<?php
session_start();
require_once "includes/config.php";
error_reporting(0);
if (strlen($_SESSION['did']==0)) {
  header('location:dealerLogin.php');
  } else{
if(isset($_POST['submit']))
{
$did=$_SESSION['did'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($link,"select did from dealers where did ='$did' and  password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($link,"update dealer set password='$newpassword' where did='$did'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dealer Change Password</title>
   

    
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>

</head>

    <!-- Right Panel -->

    <?php include_once('includes/dealerHeader.php');?>

       





<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
              <center>
                <div>
                  <h2 style="color: #fff">Change Password</h2>
                </div>
              </center>
              <div class="login-form">
                <form method="post">
                                       
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>

<?php
$did=$_SESSION['did'];
$ret=mysqli_query($link,"select * from dealers where did='$did'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Current Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="currentpassword" class=" form-control" required= "true" value=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">New Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="newpassword" class="form-control" value="" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
                                        <div class="col-12 col-md-9"> <input type="password" name="confirmpassword" class="form-control" value="" required="true"></div>
                                    </div>
                                    <?php } ?>
                                   <p style="text-align: center;"> <Input type="submit" class="btn btn-primary btn-sm" name="submit" value="Change Password" ></p>
                                </form>
                                </div>
                  </div>
                    </div>
                  </div>
              </div>
            </div>
        </div> 
    </div>       


</body>
</html>
<?php }  ?>