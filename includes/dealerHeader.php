<?php 
$dname = $_SESSION['username'];
?>
<link rel="stylesheet" href="assets/css/style.css">
<div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
    Welcome, <b><?php echo $dname ?>!</b>
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  
  <div class="nav-links">
  <a href="dealerpark.php" target="_self">My Car Park</a>
    <a href="dealerProfile.php" target="_self">My Profile</a>
    <a href="dealer-password-change.php" target="_self">Change Password</a>
    <a style ="padding-right:24px" href="userLogout.php" target="_self">Logout</a>
  </div>
</div>


