<?php

session_start();
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
    <th>Quantity</th>
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
<div class="footer"><p>(c) Copyright 2021.Developed with <span>&#10084;&#65039;</span> by Kaushik and Soumyamoy</p></div>
</body>
</html>