<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: dealerlogin.php");
    exit;
}
?>

<!doctype html>

 <html class="no-js" lang="">
<head>
    <title>ParkIt</title></head>
<body>

<?php include_once('includes/dealerHeader.php');?>
</body>
</html>