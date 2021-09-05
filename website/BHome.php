<?php
 include 'bootstrap.php';
 session_start();

 
 if(!isset($_SESSION['name']))
 {
    header('location:Blogin.php?doit=logout');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
  <link href="footer.css" rel="stylesheet">
</head>
<body style="background-image: url('s4.jpg');height: 100%;background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
  
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li style="margin-right:10px;" class="nav-item">
        <a class="nav-link"  href="BShowRequest.php">Crops to Buy<span class="sr-only">(current)</span></a>
      </li>
      <!--<li style="margin-right:10px;" class="nav-item">
        <a class="nav-link" href="BAcceptedRequest.php">Purchased crops</a>
      </li>-->
      
    </ul>
   
      <a href="BLogout.php"><button class="btn btn-outline-success my-2 my-sm-0">Logout</button></a>
    
  </div>




  </div>
</nav>
<br><br><br>
<div style="font-size: 20px;font-weight: bold;"class="container">
    Hello <?php  echo "{$_SESSION['name']} ! Welcome to your home page."   ?>
    <br><br><br>
    Here, you can list your crops for sale.<br><br><br>
    Did you forget what crops you listed before?<br><br><br>
    Don't worry.Click on "Your Listings" in the above navigation bar to view all the listings you have put up in the past.
    <div class="footer"><p>(c) Copyright 2021.Developed with <span>&#10084;&#65039;</span> by Kaushik and Soumyamoy</p></div>
</body>
</html>