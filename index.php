<!--Css file of this page ==== style.css-->
<?php
include 'assets/connect.php';
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental System</title>
   
    <link rel="stylesheet" href="assets/slider.css">
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/style.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
</head>

<body>
     <div>
        <!------------register.php------------------------->
        <?php  include('assets/register.php');  ?>
        <!------------------------------------------------->
    </div>
    <div>
        <!--------------login.php---------------------->
        <?php 
        include('assets/login.php'); ?>
        <!--------------------------------------------->   
    </div>
   
   <!-- <div class="slider">-->
        <?php
        //-- ====================Top Header =============================-->
         include('assets/topheader.php');
        //--===================================================-->

        //--==================Header===========================-->
        include('assets/header.php');
        //<!---==================================================-->
        include('assets/slider.php');
        ?>
  
<!---============================Container ==============================-->
    <div class="container-find_best_vehicle_for_u">
        <div class="container-sub">
            <h2>find the best<span id="container-sub-sub"> vehicle for you</span></h2>
           <div class="container-sub-head">
            <p>The best way to visit these places is by taking a vehicle rental in Itahari as it is more flexible, quick and help to save your time and money. Rent a vehicle makes your trip worry free day trip from long and tiring traffic jams. Our vehicle rental price is very reasonable so; you may enjoy more then you expect from our vehicle rental service.</p>
           </div>
        </div>
        <!--------===========New Car========================================-->
        <div class="vehicle-head">
            <p>New Car</p>
        </div>
        <div class="container-sub-vehicle">
         <!---==================For Car===================================-->
        <!------===========================================================-->
        <?php
        $sql= "SELECT * from car_bike_table where vehicleType='car' ";
        $result = mysqli_query($con,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $vid = $row['vehicle_id'];
                $name= $row['Name'];
                $vimage = $row['image1'];
                $vehicleoverview = $row['Overview'];
                $fuelType= $row['fuelType'];
                $seat = $row['seatingCapacity'];
                $model = $row['modelYear'];
                $price = $row['pricePerDay'];
                $mileage = $row['mileage'];
            
      ?>
      <!------------------------------------------------------>
      <div class="vehicle-box-container">
        <div class="vehicle-box-img-field">
            <img src="<?php echo "admin/images/".$vimage; ?>" alt="" style="width:100%; height:180px">
        </div>
        <div class="vehicle-info-box">
            <h2><?php echo $name; ?></h2>
            <h3>Rs <?php echo $price; ?>/Day</h3>
        </div>
        <div class="vehicle-info-box-container">
            <div class="vehicle-info-box-item">
                <i class="fa fa-car" aria-hidden="true"></i>
                <p>Model: <span id="item-color"><?php echo $model; ?></span></p>
            </div>
            <div class="vehicle-info-box-item">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <p>Fuel: <span id="item-color"><?php echo $fuelType; ?></span></p>
            </div>
        </div>

        <div class="vehicle-info-box-container">
            <div class="vehicle-info-box-item">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <p>Seats: <span id="item-color"><?php echo $seat; ?></span></p>
            </div>
            <div class="vehicle-info-box-item">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                <p>Mileage: <span id="item-color"><?php echo $mileage; ?>km/hr</span></p>
            </div>
        </div>
        <?php 
        echo '
        <div class="vehicle-box-button-container">
            <div class="btn"><a href="car-detail.php?vId='.$vid.'" style="font-size:18px;padding:1px 4px">View Details</a></div>
            ';
            ?>
        </div>
    </div>
    <!---------------------------------------------------------------->
   
    
        <?php
            }}
            ?>  
        </div>
    <!------------------circleshaped-info.php-------------------------------> 
       <?php include('assets/circleshaped-info.php')   ?>
    <!-------------------------------------------------------------------------->
        <!-------======================For Bike========================-->
        <!---===================================================================-->
        <div class="vehicle-head">
            <p>New Bike</p>
        </div>
        <div class="container-sub-vehicle">
        <!------===============PHP Codes for Bike====================-->
        <?php
        $sql= "SELECT * from car_bike_table where vehicleType='bike' ";
        $result = mysqli_query($con,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $vid = $row['vehicle_id'];
                $name= $row['Name'];
                $vimage = $row['image1'];
                $vehicleoverview = $row['Overview'];
                $fuelType= $row['fuelType'];
                $seat = $row['seatingCapacity'];
                $model = $row['modelYear'];
                $price = $row['pricePerDay'];
                $mileage = $row['mileage'];
            
      ?>
       <!------------------------------------------------------->
<!----------------------Bike Box-------------------------------->
<div class="vehicle-box-container">
        <div class="vehicle-box-img-field">
            <img src="<?php echo "admin/images/".$vimage ?>" alt="" style="width:100%; height:180px">
        </div>
        <div class="vehicle-info-box">
            <h2><?php echo $name; ?></h2>
            <h3><?php echo $price; ?>/Day</h3>
        </div>
        <div class="vehicle-info-box-container">
            <div class="vehicle-info-box-item">
                <i class="fa fa-car" aria-hidden="true"></i>
                <p>Model: <span id="item-color"><?php echo $model; ?></span></p>
            </div>
            <div class="vehicle-info-box-item">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <p>Fuel: <span id="item-color"><?php echo $fuelType; ?></span></p>
            </div>
        </div>

        <div class="vehicle-info-box-container">
            <div class="vehicle-info-box-item">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <p>Seats: <span id="item-color"><?php echo $seat; ?></span></p>
            </div>
            <div class="vehicle-info-box-item">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                <p>Mileage: <span id="item-color"><?php echo $mileage; ?> km/hr</span></p>
            </div>
        </div>
        <div class="vehicle-box-button-container">
            <?php
            echo '
            <div class="btn"><a href="bike-detail.php?bId='.$vid.'" style="font-size:18px;padding:1px 4px">View Details</a></div>
            ';
            ?>
        </div>
    </div>
       <!------------------------------------------------------->
        <?php
            }}
            ?>  
        </div>
  <!------===========================================================-->
     </div>

    <!--------------------------Subscriber box----------------------------> 
    <?php
/*
        if(isset($_POST['submit1'])){
        $email = $_POST['email'];
        $sql = "INSERT into tblsubscribers(SubscriberEmail) values('$email')";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            ?>
            <script>
                alert("Subscribed");
            </script>
            <?php
        }else{
            die(mysqli_error($con));
        }
     }
     */
?>
    
    
    <!-------------------------------------------------------------------->
    <!---======================Footer=====================================-->
            <?php  include('assets/footer.php');  ?>
    <!--------------------------------------------------------------------->        
<!--
<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
-->

</body>
</html>
 