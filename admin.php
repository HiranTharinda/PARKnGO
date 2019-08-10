<?php
session_start();
error_reporting(0);
require_once "includes/config.php";

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($link,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <title>Admin | Log in</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dark">
  <a href = "index.php">
    <input type="button" name="login" class="fadeIn fourth" value="Back">
  </a>
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
              <center>
                <div>
                  <h2 style="color: #fff">Admin</h2>
                </div>
              </center>
              <div class="login-form">
                <form method="post">
                  <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
                  <div class="wrapper fadeInDown">
                    <div id="formContent">
                      <h2 class="active"> Log in </h2>
                      <form>
                        <input type="text" id="login" class="fadeIn second" required="true"  name="username" placeholder="username">
                        <input type="password" id="password" class="fadeIn third" name="password" required="true"  placeholder="password">
                        <input type="submit" name="login" class="fadeIn fourth" value="Log In">
                      </form> 
                    </div>
                  </div>
              </div>
            </div>
        </div> 
    </div>       
</body>
</html>
