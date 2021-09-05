<?php 
include 'connection.php';
?>

<html>
<title>Krishak Bandhu</title>
<link rel="stylesheet" href="t.css">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <h1>Krishak Bandhu</h1>
     <link href="footer.css" rel="stylesheet">
</head>

<body style="background-image: url(s3.jpg); background-position: center; background-size: cover;background-repeat: no-repeat;">
   
        <div class="container">
          
          <p>A one stop website where farmer can place a request to sell their their crops,and a buyer can buy them</p>      
          <p>Resize the browser window to see the effect.</p>  
          <br><br><br><br><br><br>
          <div class="row">
            <div class="col-sm-3" style="margin:70px;">
                <p style="color:blue;text-align:left;">Farmers can login and showcase their produce for the buyers/factories</p>
              <a href="FRegister.php?"><button type="button" class="btn btn-primary" style="float: left;">Farmers</button></a>
            </div>
            <div class="col-sm-3" style="margin:70px;">
                <p style="color:blue;text-align:left;">Buyers can login and view the requests placed by the farmer</p>
              <a href="BRegister.php?"><button type="button" class="btn btn-primary" style="float: left;">Buyers</button></a>  
            </div>
          </div>

          <?php


          ?>
        </div>
    
   <div class="footer"><p>(c) Copyright 2021.Developed with <span>&#10084;&#65039;</span> by Kaushik and Soumyamoy</p></div>
</body>

</html>