<?php
//make connection with database
session_start();error_reporting(0);
ini_set('display_errors', 0);
if(!isset($_SESSION['name']) && (!$_GET['doit']==="FLogin"))
 {
    header('location:Flogin.php?doit=logout');
 }
 
?>
<html>
    <title>Krishak Bandhu</title>
    <link rel="stylesheet" href="FMakeRequest.css">
    <head style="margin-top: 80px;">
        <h1 style="text-decoration-color: red;">Farmer Log In Page</h1>
         <link href="footer.css" rel="stylesheet">
    </head>
    <body style="background-color: green;background-image: none">


         <?php
                include 'connection.php';
                if(isset($_POST['submit']))
                {
                    $email=$_POST['email'];
                    $password=$_POST['password'];

                    $query="SELECT * from farmer where email='$email'";
                    $doQuery=mysqli_query($con,$query);
                    $countQu=mysqli_num_rows($doQuery);
                    if($countQu>0)
                    {
                        $getPass=mysqli_fetch_assoc($doQuery);
                        $dbPass=$getPass['password'];
                        $_SESSION['email']=$getPass['email'];
                        $_SESSION['name']=$getPass['name'];
                       $_SESSION['state']=$getPass['state'];
                       $_SESSION['district']=$getPass['district'];
                       $_SESSION['village']=$getPass['village'];
                       $_SESSION['pincode']=$getPass['pincode'];
                       $_SESSION['mobile']=$getPass['mobile'];
                        //password_verfiy return true if password matches with the encrypted password in databse
                        $passDecode=password_verify($password, $dbPass);
                        if($passDecode)
                        {
                            ?>
                            <script >
                                alert("Login successful");
                            </script>
                            <?php
                            header('location:FHome.php');

                        }
                        else
                        {
                            ?>
                            <script >
                                alert("Login Unsuccessful.  Incorrect Password");
                            </script>
                            <?php
                        }

                        
                    }
                    else
                    {
                         ?>
                            <script >
                                alert("The email  is incorrect");
                            </script>
                            <?php
                    }
                }



            ?>





        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <table style="border-style: dashed;border-width: 10px;margin-top: 150px;">
            

            <tr>
                <td style="font-size: 25px;">Email Id</td>
                <td><input type="email" id="email" required placeholder="Enter your email id" name="email" /></td>
            </tr>
           
            <tr>
                <td style="font-size: 25px;">Password</td>
                <td><input type="password" required placeholder="Enter password" id="state" name="password"></td>
            </tr>
            
           
        </table>
        <a href="FHome.php?"><button name="submit" style="height:30px;width:80px;position: center;margin-top: 20px;">Submit</button></a>
        </form>
       
        <div class="footer"><p>(c) Copyright 2021.Developed with <span>&#10084;&#65039;</span> by Kaushik and Soumyamoy</p></div>
    </body>
</html>