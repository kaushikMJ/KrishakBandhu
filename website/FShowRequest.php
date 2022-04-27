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
table, th {
  border: 1px solid black;
}
td{
  border: 1px solid black;text-align: center;
}
</style>
 <link href="footer.css" rel="stylesheet">
</head>
<body>

<table style="margin:auto;width:100%">
  <tr>
    
    <th>Crop</th>
    <th>Season</th>
    <th>SowDate</th>
    <th>HarvestDate</th>
    <th>Area</th>
    <th>Quantity(kg)</th>
    <th>Operation</th>
  </tr>
  <?php
  //show crops which are still listed
  include 'connection.php';
  	$qu="SELECT * from request where FMobile='$_SESSION[mobile]' and BMobile = 'NA'";
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
  		//$cQ=mysqli_num_rows($doQue);
  		
  		//$rowFarmer=mysqli_fetch_array($doQue);
  		echo "<tr><td>$row[crop]</td><td>$row[season]</td><td>$row[sowdate]</td><td>$row[harvestdate]</td><td>$row[area]</td><td>$row[quantity]</td>
        <td><a href='FRequestDelete.php?id=$row[id]'><button>Delete if sold</button></a></td>
      </tr>";
  		
  	}



  ?>
</table>
<a href="FHome.php"><button style="width:auto;position: center;">Go to Home page</button></a>
<div class="footer"><p>(c) Copyright 2022.Developed with <span>&#10084;&#65039;</span> by Kaushik and Souvik</p></div>
</body>
</html>