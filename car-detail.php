<!---car-detail.css---->
<?php
include 'assets/connect.php';
session_start();
//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="cssFile/style.css">
    <link rel="stylesheet" href="cssFile/car-detail.css">
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Car-detail</title>
</head>

<body>
    
        <?php
        //<!--------------------top Header------------------------------------>
           include('assets/topHeader.php');
        //<!--------------------------------------------------------->
        //<!---------------navbar header--------------------------->
           include('assets/header.php');
        //<!---------------------------------------------------------->
        ?>
    <!---------=====================PHP code================================--> 
       <?php
     
          $id = $_GET['vId'];    //get carId  from another page car.php
          $sql= "SELECT * from car_bike_table where vehicle_id='$id' ";
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_assoc($result);

          $vehicle_name = $row['Name'];
          $brand = $row['brand'];
          $overview  = $row['Overview'];
          $price  = $row['pricePerDay'];
          $fuel = $row['fuelType'];
          $model  = $row['modelYear'];
          $seats = $row['seatingCapacity'];
          $img1 = $row['image1'];
          $img2 = $row['image2'];
          $img3 = $row['image3'];
          $mileage = $row['mileage'];


      ?>
    <!-------------------------------------------------------------------------->
    <!---=======================Photo Container=====================-->
    <div class="photo-container">
        <div class="photo-container-photo-box">
            <img src=" <?php echo "admin/images/".$img1; ?>" alt="" width="96%" height="200px">
        </div>
        <div id="photo-container-center-photo-box">
            <img src="<?php echo "admin/images/".$img2; ?>" alt="" width="100%" height="260px">
        </div>
        <div class="photo-container-photo-box">
            <img src="<?php echo "admin/images/".$img3; ?>" alt="" width="96%" height="200px">
        </div>

    </div>
    <!---=================Name and Rent Charge of vehicle==============-->
    <div class="name-and-price-listing">
        <div class="name-and-price-listing-p">
            <p><?php echo $vehicle_name." , ". $model?></p>
        </div>
        <div class="name-and-price-listing-p">
            <p>$ <?php echo $price ?> Per Day</p>
        </div>
    </div>
    <!---=================model fuel type and seats box container==================-->
    <div class="model-fuel-type-and-seats-container">
        <div class="model-fuel-type-and-seats-container-box">
            <div class="model-fuel-type-and-seats-container-box-icon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <div class="model-fuel-type-and-seats-container-box-second">
                <p><?php echo $model ?></p>
            </div>
            <div class="model-fuel-type-and-seats-container-box-third">
                <p>Reg Year</p>
            </div>
        </div>
        <div class="model-fuel-type-and-seats-container-box">
            <div class="model-fuel-type-and-seats-container-box-icon">
                <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
            <div class="model-fuel-type-and-seats-container-box-second">
                <p><?php echo $fuel ?></p>
            </div>
            <div class="model-fuel-type-and-seats-container-box-third">
                <p>Fuel Type</p>
            </div>
        </div>
        <div class="model-fuel-type-and-seats-container-box">
            <div class="model-fuel-type-and-seats-container-box-icon">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </div>
            <div class="model-fuel-type-and-seats-container-box-second">
                <p><?php echo $seats ?></p>
            </div>
            <div class="model-fuel-type-and-seats-container-box-third">
                <p>Seats</p>
            </div>
        </div>
         <!-------------------------------------------->
         <div class="model-fuel-type-and-seats-container-box">
            <div class="model-fuel-type-and-seats-container-box-icon">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </div>
            <div class="model-fuel-type-and-seats-container-box-second">
                <p><?php echo $mileage ?> km/l</p>
            </div>
            <div class="model-fuel-type-and-seats-container-box-third">
                <p>Mileage</p>
            </div>
        </div>
        <!------------------------------------------------------->
    </div>
 <!----=====================================================================-->
 <div class="vehicle-overview-and-booking-container">
   <div class="vehicle-booking-container-left-side">
    <h2>Description</h2>
    <p><?php echo $overview ?> </p>
   
   </div>
<!---=========================Third container ====vehicle overview==booking-->
<!----===================Booking part=========================================-->
<?php
     
      $emailId= $_SESSION['EMAILID'];
      $sql = "SELECT * from tblusers WHERE EmailId='$emailId' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
      $user_id = $row['user_id'];
      $email = $row['EmailId'];
      $id = $_GET['vId'];    //get carId  from another page car.php //last ko button ma xa link//
      $_SESSION['CARID']=$_GET['vId'];
      
      if(isset($_POST['submit'])){
        //======Check if user is logged in or not========//
        if(strlen($_SESSION['EMAILID'])==0){
            ?>
            <script>
                alert("Unable to Book before Login");
            </script>
              <?php             
        }else{
            $fromDate =$_POST['fromDate'];
            $toDate = $_POST['toDate'];
            $message= $_POST['message'];
            $vehicleType = 'car';
            $sql = "INSERT into booking_table(user_id, vehicleId,FromDate,ToDate,message,vehicleType) values( '$user_id','$id','$fromDate','$toDate','$message','$vehicleType')";
            $result1= mysqli_query($con,$sql);
            if($result1){
                ?>
                  <script>
                    alert("Booking Successful");
                  </script>
                <?php
            }else{
                die(mysqli_error($con));
            }
    
      }
    }
      ?>
  
<div class="vehicle-booking-container-right-side">
    <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Book Now</p>
    <form action="" method="POST">
        <div class="vehicle-booking-container-form">
            <input type="date" name="fromDate" placeholder="From Date(dd/mm/yyyy)" required>
        </div>
        <div class="vehicle-booking-container-form">
            <input type="date" name="toDate" placeholder="To Date(dd/mm/yyyy)" required>
        </div>
        <div class="vehicle-booking-container-form">
            <textarea id="booking-messageBox" type="textarea" name="message" placeholder="Message"></textarea>
        </div>
        <div class="vehicle-booking-container-form">
            <!--===Check if user is logged in or not===============-->
            <?php
            if($_SESSION['EMAILID']==0){
                ?>
            <button type="submit" class="btn-booking" name="submit">Login For Book</button>
            <?php }else{
                ?>
                <button type="submit" class="btn-booking" name="submit">Book Now</button>
            <?php
            }
            ?>
        </div>   
    </form>
</div>
</div>

   <!---======================Footer=====================================-->
      <?php  include('assets/footer.php');   ?>
   <!----------------------------------------------------------------------->
</body>
</html>