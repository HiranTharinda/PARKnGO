<!doctype html>

 <html class="no-js" lang="">
<head>
    <title>PARKnGO</title>
    <link rel="stylesheet" href="assets/css/styleTables.css">
  </head>
<body style = "background-color: #fff">

<?php include_once('includes/dealerHeader.php');?>
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
          $bid = $row['bid']; 
          $did = $row['did'];
          $user= $row['username']; 
          $Address= $row['Address']; 
          $duration = $row['duration'];
          $available= $row['Total']-$row['Booked'];
?>
    <tr>
      <td><?php  echo $bid;?></td>
      <td><?php  echo $did;?></td>
      <td><?php  echo $user;?></td>
      <td><?php  echo $Address;?></td>
      <td><?php  echo $duration;?></td>
      <td><?php  echo $available;?></td>

     
    
      <td> 
          <form method="POST" action="dashboard.php">
          <input type="hidden" name="bid" value= <?php echo $bid ?>>
          <input type="hidden" name="did" value= <?php echo $did ?>>
          <input type="submit" class="Redbutton" name="cancel" value="Cancel" onClick="window.location.reload();"></input>
          <input type="submit" class="button" name="approve" value="Approve" onClick="window.location.reload();"></input></td>
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
      <th>Booking ID</th>
      <th>Dealername</th>
      <th>Username</th>
      <th>Parking Location</th>
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
          $bid = $row['bookingId']; 
          $did = $row['appdid'];
          $user= $row['username']; 
          $Address= $row['Address']; 
          $duration = $row['appduration'];

        
?>
    <tr>
      <td><?php  echo $bid;?></td>
      <td><?php  echo $did;?></td>
      <td><?php  echo $user;?></td>
      <td><?php  echo $Address;?></td>
      <td><?php  echo $duration;?></td>

  
     
    
      <td> 
          <form method="POST" action="dashboard.php">
          <input type="hidden" name="bid" value= <?php echo $bid ?>>
          <input type="hidden" name="did" value= <?php echo $did ?>>
          <input type="submit" class="button" name="remove" value="Remove" onClick="window.location.reload();"></input></td>
          </form>
    </tr>
    <?php }  ?>
  </tbody>
</table>
</Center>


<?php
        if(isset($_POST['cancel'])){
                $bid = $_REQUEST['bid'];
                $sql="DELETE FROM booking WHERE bid = $bid";
                mysqli_query( $link,$sql);
    }
?>


<?php
        if(isset($_POST['remove'])){
                $bid = $_REQUEST['bid'];
                $sql="DELETE FROM approved WHERE bookingId = $bid";
                mysqli_query( $link,$sql);
    }
?>

<?php
        if(isset($_POST['approve'])){
                
                $did = $_REQUEST['did'];
                $bid = $_REQUEST['bid'];

                $sql = "UPDATE dealers SET Booked = Booked + 1 WHERE did = $did";
              
                mysqli_query( $link,$sql);

                $sql2 = "SELECT * FROM booking WHERE bid = $bid" ;
                mysqli_query( $link,$sql2);
                $uid = $row['customerId'];
              
                $duration = $row['duration'];
                echo $duration; 
                
                $sql3="DELETE FROM booking WHERE bid = $bid";
                mysqli_query( $link,$sql3);
              }

      
?>


</head>
<body>
</body>
</html>
