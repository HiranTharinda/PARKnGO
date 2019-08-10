<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PARKnGO | Home</title>

<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body bgcolor="#ffffff">
<?php include_once('includes/header.php');?>

        


    <div class="w3-content w3-display-container" style="max-width:100%">
    <img class="mySlides" src="images/slide1.jpg" style="width:100%">
        <img class="mySlides" src="images/Slide2.jpg" style="width:100%">
  
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
<center>
  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-16" style="max-width:800px" id="band">
    <h2 class="w3-wide">THE PARKING SPACE PROVIDER</h2>
    <p style="text-align:center">Tired of trying to find a parking slot? Tired of peeling your eyes to search for a free space?
    All these tirings and pains are no more. <b>Park & GO</b> gives you the liberty to book a parking slot with just a single click!

</p>
    <div >
      <div class="w3-second">
      <a href = "userLogin.php">
    <input type="button" name="login" class="fadeIn fourth" value="Book your Spot!">
  </a>
      </div>
      
      <p class="w3-opacity"><i>Want to make money with excess space?</i></p>
      <div class="w3-second">
      <a href = "dealerLogin.php">
    <input type="button" name="login" class="fadeIn fourth" value="Become a Dealer!">
  </a>
    
    </div>
  </div>
  </center>


    
  <div class="footer">
  <p></p>
</div>

</body>

</html>

