<?php
session_start();
error_reporting(0);
require_once "includes/config.php";
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['vpmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($link, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
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
    <title>VPMS - Admin Profile</title>
   

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

  
    <!-- Right Panel -->

<?php include_once('includes/adminHeader.php');?>

 


                                
           

    <div class="clearfix"></div>

  





<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
              <center>
                <div>
                  <h2 style="color: #fff">Customer</h2>
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
$adminid=$_SESSION['vpmsaid'];
$ret=mysqli_query($link,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Admin Name</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="adminname" name="adminname" type="text" value="<?php  echo $row['AdminName'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">User Name</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="username" name="username" type="text" value="<?php  echo $row['UserName'];?>"  readonly='true'></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Contact Number</label></div>
                                        <div class="col-12 col-md-9"> <input class="form-control " id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input class="form-control " id="email" name="email" type="text" value="<?php  echo $row['Email'];?>" required="true" readonly='true'></div>
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