<?php
session_start();
if(!isset($_SESSION['name']))
 {
    header('location:Flogin.php');
 }
 error_reporting(0);
ini_set('display_errors', 0);
?>


<html>
    <title>Krishak Bandhu</title>
    <link rel="stylesheet" href="FMakeRequest.css">
     <link href="footer.css" rel="stylesheet">
    <head>
        <h1>Krishak Bandhu</h1>
    </head>
    <body>


        <?php
            include 'connection.php';
            if(isset($_POST['submit']))
            {
                $crop=$_POST['crop'];
                $sowdate=$_POST['sowdate'];
                $area=$_POST['area'];
                $harvestdate=$_POST['harvestdate'];
                $season=$_POST['season'];
                $quantity=$_POST['quantity'];
                $FMobile=$_SESSION['mobile'];
                $BMobile='NA';

                //if crop name ,sowdate,harvest date are all same,dont register
                $check="SELECT FMobile,crop,sowdate,harvestdate from request where crop='$crop' and sowdate=$sowdate and harvestdate='$harvestdate' and FMobile='$FMobile'" ;
                $doCheck=mysqli_query($con,$check);
                $numCheck=mysqli_num_rows($doCheck);
                if($numCheck>0)
                {
                    ?>
                            <script >
                                alert("Same crop with same sowdate and harvestdate is already listed");
                            </script>
                            <?php
                }
                else
                {
                    $ins="INSERT into request(crop,season,sowdate,harvestdate,area,quantity,FMobile,BMobile) VALUES('$crop','$season','$sowdate','$harvestdate','$area','$quantity','$FMobile','$BMobile')";

                    $doIns=mysqli_query($con,$ins);
                    if($doIns)
                    {
                        ?>
                            <script >
                                alert("Successfully listed!");
                            </script>
                            <?php
                    }
                    else
                    {
                        ?>
                            <script >
                                alert("Unsuccessfull listing!");
                            </script>
                            <?php
                    }
                }
            }


        ?>





       <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <table style="border-style: dashed;border-width: 10px;font-size: 18px;">
           
            <tr>
                <td>Crop Name</td>
                <td><input type="text" placeholder="Enter crop name" id="crop" name="crop"></td>
            </tr>
            <tr>
                <td>Cultivation Season</td>
                <td><input type="text" placeholder="Cultivation seacon" id="season" name="season"></td>
            </tr>
            <tr>
                <td>Sowing Date(approx)</td>
                <td><input type="text" placeholder="in DD/MM/YYYY" id="sowdate" name="sowdate"/></td>
            </tr>
            <tr>
                <td>Harvesting Date(approx)</td>
                <td><input type="text" placeholder="in DD/MM/YYYY" name="harvestdate"></td>
            </tr>
            <tr>
                <td>Area under cultivation</td>
                <td>
                    <input type="text" id="area" name="area" placeholder="Area(in hectares)"/>
                    
                </td>
            </tr>
            <tr>
                <td>Production Quantity</td>
                <td>
                <input type="text" id="quantity" name="quantity" placeholder="Quantity(approx)"/>
                    
                </td>
            </tr>
            <tr ><td ><button type="submit" name="submit" style="width:80px;position: center;">Submit</button></td></tr>
        </table>
        </form>
        <a href="FHome.php"><button style="width:auto;position: center;">Go to Home page</button></a>
        <div class="footer"><p>(c) Copyright 2021.Developed with <span>&#10084;&#65039;</span> by Kaushik and Soumyamoy</p></div>
    </body>
</html>