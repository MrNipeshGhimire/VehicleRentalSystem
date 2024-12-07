<?php
include 'connect.php';

//for brand count
 $sql = "SELECT brand_id from brand_table";
 if($result=mysqli_query($con,$sql)){
    $rowcount1 = mysqli_num_rows($result);
 }
 //for new bike count
 $sql = "SELECT vehicle_id from car_bike_table where vehicleType='bike'";
 if($result=mysqli_query($con,$sql)){
    $rowcount2 = mysqli_num_rows($result);
 }
 //for new car
 $sql = "SELECT vehicle_id from car_bike_table where vehicleType='car'";
 if($result=mysqli_query($con,$sql)){
    $rowcount3 = mysqli_num_rows($result);
 }
 //for subscribers count
 $sql = "SELECT user_id from tblusers";
 if($result=mysqli_query($con,$sql)){
    $rowcount4 = mysqli_num_rows($result);
 }
 

?>
<div class="container-info-show">
       
        <div class="container-info-show-sub">
            <h1> <?php echo' '.$rowcount1.''; ?></h1>
            <p>Brands</p>
        </div>
        <div class="container-info-show-sub">
        <h1> <?php echo' '.$rowcount2.''; ?></h1>
            <p>New Car for Rent</p>
        </div>
        <div class="container-info-show-sub">
        <h1> <?php echo' '.$rowcount3.''; ?></h1>
            <p>New Bike for Rent</p>
        </div>
        <div class="container-info-show-sub">
        <h1> <?php echo' '.$rowcount4.''; ?></h1>
            <p>Users</p>
        </div>
    </div>