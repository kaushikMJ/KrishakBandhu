<?php

session_start();
define('DEBUG', true);

error_reporting(0);
ini_set('display_errors', DEBUG ? 'On' : 'Off');



error_reporting(0);
ini_set('display_errors', 0);
?>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
 <link href="footer.css" rel="stylesheet">
</head>
<body>

<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Address</th>
    <th>State</th>
    <th>District</th>
    <th>PinCode</th>
    <th>Crop</th>
    <th>Season</th>
    <th>SowDate</th>
    <th>HarvestDate</th>
    <th>Area</th>
    <th>Quantity(kg)</th>
  </tr>
  <?php
  //show crops which are still listed
  include 'connection.php';
  	$qu="SELECT * from request where BMobile='NA'";
  	$doQu=mysqli_query($con,$qu);
  	if(!$doQu)
  	{
  		?>
  		<script>
  			alert("No request");
  		</script>
  		<?php
  	}

  	
  	//$d=mysqli_fetch_assoc($doQu);
  	while($row=mysqli_fetch_array($doQu))
  	{
  		$FMobile=$row['FMobile'];
  		$q="SELECT * from farmer where mobile='$FMobile'";
  		$doQue=mysqli_query($con,$q);$cQ=mysqli_num_rows($doQue);
  		if($cQ>0)
  		{
  		$rowFarmer=mysqli_fetch_array($doQue);
  		echo "<tr><td>$rowFarmer[name]</td><td>$rowFarmer[mobile]</td><td>$rowFarmer[email]</td><td>$rowFarmer[address]</td><td>$rowFarmer[state]</td><td>$rowFarmer[district]</td><td>$rowFarmer[pincode]</td><td>$row[crop]</td><td>$row[season]</td><td>$row[sowdate]</td><td>$row[harvestdate]</td><td>$row[area]</td><td>$row[quantity]</td></tr>";
  		}
  	}



  ?>
</table>
<a href="BHome.php"><button style="width:auto;position: center;">Go to Home page</button></a>
<div class="footer"><p>(c) Copyright 2022.Developed with <span>&#10084;&#65039;</span> by Kaushik and Souvik</p></div>
</body>
</html>