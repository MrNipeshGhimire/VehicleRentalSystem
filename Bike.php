<!--=======Bike.php CSS car-detail.css=============----->
<?php
include('assets/connect.php');
session_start();
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
    <title>Bike Page</title>
</head>

<body>
    
    <div class="container-1-first1">
        <!---------------=========topHeader=======----------------->
        <?php 
         include('assets/topHeader.php'); 
       // <!-------------------------------------------------------------->
        //<!-------------Header-------------------------->
           include('assets/header.php');
        ?>
        <!------------------------------------------------>
        <div class="content-head">

            <h1>Bike Listing</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.php">Home</a> > Bike Listing</h3>
        </div>
    </div>

    <!----======================Bike Listing=================================-->
    <!--================PHP ========================-->
    <?php 
    $sql = "SELECT Name, pricePerDay, image1 from car_bike_table where vehicleType ='bike' ORDER BY vehicle_id DESC LIMIT 2 ";
    // ORDER BY id DESC LIMIT 2 means if fetch the last and second last row of the table//
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)>0){
       ?>
   
    <div class="car-list">
        <div class="car-list-left">
            <div class="car-title">
                <i class="fa fa-car" aria-hidden="true"></i>
                <h2>Recently Listed Bikes</h2>
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
       <?php //for bike count
 $sql = "SELECT vehicle_id from car_bike_table where vehicleType ='bike'";
 if($result=mysqli_query($con,$sql)){
    $rowcount = mysqli_num_rows($result);
 }
 ?>
        <div class="car-list-right">
            <div class="listing-head">
                <p><?php echo $rowcount ?> Listing</p>
            </div>
            
            <!------------------Car ra bike 2 otai ko Css file same ho so class ko name same xa---------------------->
            <!--------------Bike List----------------->
            <!------------------Car ra bike 2 otai ko Css file same ho so.. class ko name same xa---------------------->
            <?php  
                  $sql= "SELECT * from car_bike_table where vehicleType='bike'";
                  $result = mysqli_query($con,$sql);
                  
                  while($row=mysqli_fetch_assoc($result)){
                    $id =$row['vehicle_id'];
                    $name =$row['Name'];
                    $price = $row['pricePerDay'];
                    $fuel = $row['fuelType'];
                    $model =$row['modelYear'];
                    $seat = $row['seatingCapacity'];
                    $image = $row['image1'];          
?>
            <div class="listing-car-item">
                <div>
                    <img src="<?php echo "admin/images/".$image ?>" alt="">
                </div>
                <div id="vehicle-detail">
                    <div>
                       <?php echo '<p id="p">'.$name.'</p> ';?>
                       <?php echo '<p>Rs '.$price.' Per Day</p>'; ?>
                    </div>
                    <div class="vehicle-detail-sub">
                        <div>
                            <i class="fa fa-user" aria-hidden="true"></i>
                           <?php echo '<p>'.$seat.' seats</p>';?>
                        </div>
                        <div>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                           <?php echo' <p>'.$model.' Model</p> '; ?>
                        </div>
                        <div>
                            <i class="fa fa-motorcycle" aria-hidden="true"></i>
                            <?php echo '<p>'.$fuel.'</p> ';?>
                        </div>
                    </div>
                    <div class="vehicle-listing-btn">
                    <button class="btn">
                            <?php
                            echo '
                            <a href="bike-detail.php?bId='.$id.' ">View Details</a>
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>                    
                            ';
                            ?>
                        </button>
                    </div>
                </div>
            </div>
                  <?php
                  }
                  ?>
            <!--------------------------------------------->

        </div>
    </div>


    <!---======================Footer=====================================-->
    <?php  include('assets/footer.php'); ?>
    <!----------------------------------------------------------------->
</body>

</html>

<!--Bike.html page car.html page ko reference ho so code same xa just content ma tra  change gareko ho -->