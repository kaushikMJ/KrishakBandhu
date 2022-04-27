<?php
//make connection with database
	session_start();
	define('DEBUG', true);

error_reporting(0);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

	//include 'bootstrap.php';
    error_reporting(0);
    ini_set('display_errors', 0);
?>
<html>
<head>
	<style>
		.content{
			border-style: double;
			padding: 10px;
			position: absolute;
		    left: 50%;
		    top: 50%;
		    -webkit-transform: translate(-50%, -50%);
		    transform: translate(-50%, -50%);
		}


	</style>

</head>
<body>

	<?php
		include 'connection.php';
		//$id=$_GET['id'];
		//echo $id;
		if(isset($_POST['submit']) )
		{
			//echo $id; 

			$BMobile=mysqli_real_escape_string($con,$_POST['phoneNo']);
			$idd=mysqli_real_escape_string($con,$_POST['id']);
			$query="update request set BMobile='$BMobile' where id=$idd";
			$doQuery=mysqli_query($con,$query);
			//$num=mysqli_num_rows($doQuery);
			if($doQuery)
			{
				?>
				<script>
					alert("updated");
				</script>
				<?php
			}
			header('location:FShowRequest.php');
		}

	?>


	<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
	<div class="content">
		
		<p>
			Write the phone number of the buyer&nbsp&nbsp
			 <input type="number" name="phoneNo" placeholder="8888888888" pattern="[6-9]{1}[0-9]{9}" maxlength="10"  title="Ten digits code" required/> 
		</p>
		<p>
			<button type="submit" name="submit" style="width:80px;position: center;margin-left: 40%;">Submit</button>
		</p>
		<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    		<form>
                <input type="button" value="Go back!" onclick="history.back()">
            </form>
	</div>
	</form>
</body>

</html>