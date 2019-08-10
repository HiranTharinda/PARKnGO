<?php
// Initialize the session
session_start();
require_once "includes/config.php";
$durationText="Duration";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: userlogin.php");
    exit;
}
?>


<!doctype html>
<html class="no-js" lang="">
<head>
   <title>PARK N GO</title></head>
   <link rel="stylesheet" href="assets/css/styleUser.css">
<body>

<?php include_once('includes/userHeader.php');?>

<?php
        $ret=mysqli_query($link,"select * from dealers");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
                $dealerId = $row['did'];
                $customerId = $_SESSION['uid'];
                $b   = $row['Total']; 
                $d   = $row['Booked'];
                $available = $b-$d;
?>



                <div class="container">
                        <form method="POST" action="userDashboard.php">
                                <h1><?php  echo $row['Address'];?></h1>
                                <p><b><center>Available Parking Spot</center></b></p>
                                <center><b style = "font-size:60px; color:#ee5253"><center><?php  echo($available);?></center></b>

                                <select id="duration" name="duration">
                                        <option value="1"><?php echo($durationText);?></option>
                                        <option value="2">2hrs</option>
                                        <option value="3">3hrs</option>
                                        <option value="4">4hrs</option>
                                </select> 

                                <input type="hidden" name="ID" value= <?php echo $dealerId ?>>
                                <div class="button-container">
                                        <button type="submit" class="button" name="cancel"><span>Cancel</span></button>
                                        <button type="submit" class="button" name="book"><span>Book</span></button>
                                </div>
                        </form>
                </div>
<?php }  ?>


<?php
        if(isset($_POST['book'])){
                $duration = $_REQUEST['duration'];
                $durationText = $duration."hrs";
                $dealerId = $_POST['ID'];

                $sqlbook = "INSERT INTO booking (customerId, dealerId, duration) VALUES (?,?,?); ";
                if($stmt = mysqli_prepare($link, $sqlbook)){
                        mysqli_stmt_bind_param($stmt, "iii", $customerId,$dealerId,$duration);
                        if(mysqli_stmt_execute($stmt)){
                        echo "done";
                        } else{
                        echo "Something went wrong. Please try again later.";
                        }
                }
        }   
        else {
    }
?>

<?php
    if(isset($_POST['cancel'])){
        echo" dhur";
    }
    else {
    
    }
?>

</body>
</html>