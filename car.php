<!---   CSS == vehicle.css--->
<!---for button css (btn) == footer.css-->
<?php
session_start();
include('assets/connect.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFile/style.css">
    <link rel="stylesheet" href="cssFile/about.css">
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/vehicle.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Car</title>
</head>

<body>

    <div class="container-1-first1">
        <?php
        //---------------------topheader--link----------------------------------//
          include('assets/topheader.php');
        //==================================================//
        //-----------------header-----------------------//
          include('assets/header.php');
        //---------------------------------------------------//
        ?>
        <div class="content-head">

            <h1>Car Listing</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.html">Home</a> > Car Listing</h3>
        </div>
    </div>

    <!----======================Vehicle Listing=================================-->
    <!--================PHP ========================-->
    <?php 
    $sql = "SELECT Name, pricePerDay, image1 from car_bike_table where vehicleType='car' ORDER BY vehicle_id DESC LIMIT 2";
    // ORDER BY id DESC LIMIT 2 means if fetch the last and second last row of the table//
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)>0){
       ?>
   
    <!------------------------------------------------->
    <div class="car-list">
        <div class="car-list-left">
            <div class="car-title">
                <i class="fa fa-car" aria-hidden="true"></i>
                <h2>Recently Listed Cars</h2>
            </div>
            <?php
                while($row=mysqli_fetch_assoc($result)){
                    $img = $row['image1'];
                    ?>
            <div class="car-image-info">
                <div>
                    <img src="<?php echo "admin/images/".$img; ?>" alt="">
                </div>
                <div>
                    <p id="font-p"><?php echo $row['Name']; ?></p>
                    <p>Rs <?php echo $row['pricePerDay']; ?> /Day</p>
                   
                </div>
            </div>
            <?php
                      }
                    ?>  
            <?php
        }
?>
            
        </div>
        <!---===================================-->
        <?php //for car counting
 $sql = "SELECT vehicle_id from car_bike_table where vehicleType='car'";
 if($result=mysqli_query($con,$sql)){
    $rowcount = mysqli_num_rows($result);
 }
 ?>
        <div class="car-list-right">
            <div class="listing-head">
                <p><?php echo $rowcount ?> Listing</p>
            </div>
            <?php
        $sql= "SELECT * from car_bike_table where vehicleType='car' ";
        $result = mysqli_query($con,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $vid = $row['vehicle_id'];
                $name= $row['Name'];
                $image = $row['image1'];
                $vehicleoverview = $row['Overview'];
                $fuelType= $row['fuelType'];
                $seat = $row['seatingCapacity'];
                $model = $row['modelYear'];
                $price = $row['pricePerDay'];
               // $_SESSION['vehicle_id'] = $row['id'];
?>
            <div class="listing-car-item">
                <div>
                <img src="<?php echo "admin/images/".$image; ?>" alt="">
                
                </div>
                <div id="vehicle-detail">
                    <div>
                      <?php echo ' <p id="p">'.$name.'</p> '?>
                       <?php echo ' <p>Rs '.$price.' Per/Day</p> '?>
                    </div>
                    <div class="vehicle-detail-sub">
                        <div>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo '<p>'.$seat.' Seats</p>'?>
                        </div>
                        <div>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo'<p>'.$model.' Model</p> '?>
                        </div>
                        <div>
                            <i class="fa fa-car" aria-hidden="true"></i>
                            <?php echo'    <p> '.$fuelType.'</p> '  ?>
                        </div>
                    </div>
                    <div class="vehicle-listing-btn">
                        <button class="btn">
                            <?php
                            echo '
                            <a href="car-detail.php?vId='.$vid.' ">View Details</a>
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>                    
                            ';
                            ?>
                        </button>
                    </div>
                </div>
            </div>
            
            <?php
            }}
            ?>
        </div>
        
    </div>


    <!---======================Footer=====================================-->
    <?php
         include('assets/footer.php');
    //================================================================//
    ?>
</body>

</html>