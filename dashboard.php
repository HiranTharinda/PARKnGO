<?php
session_start();
error_reporting(0);
require_once "includes/config.php";

error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>


<!doctype html>
<html class="no-js" lang="">
  <head>
    <title>PARKnGO</title>
    <link rel="stylesheet" href="assets/css/styleTables.css">
  </head>
  <body style = "background-color: #fff">

  <?php include_once('includes/adminHeader.php');?>
  <Center>
    <h2 style="color: #56baed">Pending</h2>
    <table>
    <thead>
    <tr>
      <th>Booking ID</th>
      <th>Dealername</th>
      <th>Username</th>
      <th>Parking Location</th>
      <th>Duration</th>
      <th>Requested Time</th>
      <th>Available Spots</th>
      <th>Approve</th>
    </tr>
  </thead>
  <tbody>

  <?php 
        $sql = "SELECT *
        FROM booking INNER JOIN dealers ON booking.dealerId=dealers.did INNER JOIN users ON booking.customerId=users.uid" ;

        $ret=mysqli_query($link,$sql);
      
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
          $bid = $row['bookingid']; 
          $did = $row['did'];
          $user= $row['username']; 
          $Address= $row['Address']; 
          $uid = $row['uid']; 
          $duration = $row['duration'];
          $time = $row['time'];
          $available= $row['Total']-$row['Booked'];
  ?>

    <tr>
      <td><?php  echo $bid;?></td>
      <td><?php  echo $did;?></td>
      <td><?php  echo $user;?></td>
      <td><?php  echo $Address;?></td>
      <td><?php  echo $duration;?></td>
      <td><?php  echo $time;?></td>
      <td><?php  echo $available;?></td>
    
      <td> 
          <form method="POST" action="dashboard.php">
          <input type="hidden" name="dur" value= <?php echo $duration ?>>
          <input type="hidden" name="bid" value= <?php echo $bid ?>>
          <input type="hidden" name="did" value= <?php echo $did ?>>
          <input type="hidden" name="uid" value= <?php echo $uid ?>>
          <input type="submit" style="background-color: #ff6b6b" class="Redbutton" name="cancel" value="Cancel"></input>
          <input type="submit" class="button" name="approve" value="Approve" ></input></td>
      </form>
    </tr>
    <?php }  ?>
  </tbody>
</table>

<br>
<h2 style="color: #56baed">Approved</h2>
<table>
  <thead>
    <tr>
      <th>Approved ID</th>
      <th>Dealername</th>
      <th>Username</th>
      <th>Parking Location</th>
      <th>Approved Time</th>
      <th>Duration</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>

  <?php 
        $sql = "SELECT *
        FROM approved INNER JOIN dealers ON approved.appdid=dealers.did INNER JOIN users ON approved.appcid=users.uid" ;

        $ret=mysqli_query($link,$sql);
      
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
          $aid = $row['approveid']; 
          $did = $row['appdid'];
          $user= $row['username'];
          $Address= $row['Address']; 
          $timeApp = $row['timeApp'];
          $duration = $row['appduration'];    
  ?>
    <tr>
      <td><?php  echo $aid;?></td>
      <td><?php  echo $did;?></td>
      <td><?php  echo $user;?></td>
      <td><?php  echo $Address;?></td>
      <td><?php  echo $timeApp;?></td>
      <td><?php  echo $duration;?></td>
      <td> 
          <form method="POST" action="dashboard.php">
          <input type="hidden" name="bid" value= <?php echo $aid ?>>
          <input type="hidden" name="did" value= <?php echo $did ?>>
          <input type="submit" class="button" style="background-color: #ff6b6b" name="remove" value="Remove"></input></td>
          </form>
    </tr>
    <?php }  ?>
  </tbody>
</table>
</Center>


<?php
        if(isset($_POST['cancel'])){
                echo $bid = $_REQUEST['bid'];
                $sql="DELETE FROM booking WHERE bookingid = $bid";
                mysqli_query( $link,$sql);
    }
?>

<?php
        if(isset($_POST['remove'])){
               
                echo $bid = $_REQUEST['bid'];
                echo $did = $_REQUEST['did'];
                
                $sql="DELETE FROM approved WHERE approveid = $bid";
                mysqli_query( $link,$sql);
                $sql4 = "UPDATE dealers SET Booked = Booked - 1 WHERE did = $did";
                mysqli_query( $link,$sql4);
    }
?>

<?php
        if(isset($_POST['approve'])){
                
                $did = $_REQUEST['did'];
                $bid = $_REQUEST['bid'];
                $uid = $_REQUEST['uid'];
                $duration = $_REQUEST['dur'];

                $sql = "UPDATE dealers SET Booked = Booked + 1 WHERE did = $did" ;
                mysqli_query( $link,$sql);

                $sql3 = "INSERT INTO approved (approveid, appcid, appdid, appduration) VALUES ($bid, $uid, $did, $duration)";
                mysqli_query( $link,$sql3);

                $sql4 ="DELETE FROM booking WHERE bookingid = $bid";
                mysqli_query( $link,$sql4);
              }
?>
</body>
</html>
<?php } ?>