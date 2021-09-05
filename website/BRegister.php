<?php
//make connection with database
	session_start();
	//include 'bootstrap.php';
    error_reporting(0);
    ini_set('display_errors', 0);
?>
<html>
    <title>Krishak Bandhu</title>
    <link rel="stylesheet" href="FMakeRequest.css">
    <head>
         <link href="footer.css" rel="stylesheet">
        <h2 style="color: red;">Register Yourself</h2>
    </head>
    <body style="background-color: green;background-image: none">

    	<?php
    	include 'connection.php';
    		if(isset($_POST['submit']))
    		{
    			$name=mysqli_real_escape_string($con,$_POST['name']);
    			$email=mysqli_real_escape_string($con,$_POST['email']);
    			$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    			$address=mysqli_real_escape_string($con,$_POST['address']);
    			$state=mysqli_real_escape_string($con,$_POST['state']);
    			$district=mysqli_real_escape_string($con,$_POST['district']);
    			
    			$pincode=mysqli_real_escape_string($con,$_POST['pincode']);
    			$password=mysqli_real_escape_string($con,$_POST['password']);
    			$cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);


    			$pass=password_hash($password, PASSWORD_BCRYPT);
    			$cpass=password_hash($cpassword, PASSWORD_BCRYPT);

    			//check is user registered before
    			$emailQuery="SELECT email FROM buyer where email='$email'";
    			$query=mysqli_query($con,$emailQuery);
    			$countQuery=mysqli_num_rows($query);
    			if($countQuery>0)
    			{
    				?>
    						<script >
    							alert("A User with the same emailId exists");
    						</script>
    						<?php
    			}
    			else
    			{
    				//check if password and cpassword are equal
    				if($password===$cpassword)
    				{
    					$insertQuery="INSERT into buyer(name,email,mobile,address,state,district,pincode,password,cpassword) VALUES('$name','$email','$mobile','$address','$state','$district','$pincode','$pass','$cpass')";

    					$iQuery=mysqli_query($con,$insertQuery);

    					if($iQuery){
    						?>
    						<script >
    							alert("REGISTERED SUCCESSFULLY");
    						</script>
    						<?php
    					}
    					else{
    						?>
    						<script >
    							alert("INSERTION FAILED");
    						</script>
    						<?php
    					}
    				}
    				else
    				{
    					?>
    						<script >
    							alert("PASSWORD NOT MATCHING");
    						</script>
    						<?php
    				}
    			}
    		}


    	?>




    	
        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <table style="border-style: dashed;border-width: 8px;font-size: 18px;">
            <tr>
                <td>Company Name</td>
                <td><input type="text" required id="name" placeholder="Enter Company name" name="name" /></td>
            </tr>
            <tr>
                <td>Email Id</td>
                <td><input type="email" required id="email" placeholder="Enter email id" name="email" /></td>
            </tr>
            <tr>
                <td>Mobile No.</td>
                <td><input type="number" required id="mobile" placeholder="Enter mobile no." name="mobile" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea rows="2" cols="25" required placeholder="Enter  address" name="address"></textarea></td>
            </tr>
            <tr>
                <td>State</td>
                <td><input type="text" required placeholder="Enter state name" id="state" name="state"></td>
            </tr>
            <tr>
                <td>District</td>
                <td><input type="text" required placeholder="Enter district name" id="district" name="district"></td>
            </tr>
            
            <tr>
                <td>Pin Code</td>
                <td><input type="text" required placeholder="Enter pincode" id="pincode" name="pincode"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" required placeholder="Create Password" id="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" required placeholder="Confirm Password" id="cpassword" name="cpassword"></td>
            </tr>
            

            <tr ><td ><button type="submit" name="submit" style="width:80px;position: center;">Submit</button></td></tr>
        </table>
        </form> 
        <div style="font-size:30px;text-decoration-color:red;" class="center">Already have an account?<a href="BLogin.php?doit=BLogin">SignIn</a></div>
        <div class="footer"><p>(c) Copyright 2021.Developed with <span>&#10084;&#65039;</span> by Kaushik and Soumyamoy</p></div>
    </body>
</html>