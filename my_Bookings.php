<!---myprofile.css---->
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
    <link rel="stylesheet" href="cssFile/style.css">
    <link rel="stylesheet" href="cssFile/about.css">
    <link rel="stylesheet" href="cssFile/myProfile.css">
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <!--================My Booking.php ko CSS myprofile.css ma xa=========-->
    <!--------==============================================----------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My Booking</title>
</head>
<body>
    
    <div class="container-1-first1">
        <!------------------top header---------->
        <?php  include('assets/topHeader.php');  ?>
        <!--------------------------------------------->
        <!------------------Header  Navbar-------------------->
        <?php  include('assets/header.php');   ?>
        <!---------------------------------------------->
        <div class="content-head">

            <h1>My Bookings</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.php">Home</a> > My Bookings</h3>
        </div>
       </div>
   <!--============PHP ============This is very important query===============-->
   <!--===========profile box ko lagi=====================================-->
   <?php
      $emailId = $_SESSION['EMAILID'];
      //$userid = $_SESSION['USERID'];
     
      $sql = "SELECT * from tblusers WHERE EmailId='$emailId' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
      $user_id =$row['user_id'];
      $email = $row['EmailId'];
      $name = $row['FullName'];
      $address = $row['Address'];

   ?>
<!----------------------------------------------------------------------------------->
       <!--==============Profile box========-->
       <div class="profile-box">
        <div class="profile-box-img">
            <img src="cssFile/image/img1.jpeg" alt="profile">
        </div>
        <div class="profile-box-name">
            <h2><?php echo $name; ?></h2>
            <p><?php echo $address; ?></p>
            <p><?php echo $email; ?></p>
        </div>
       </div>
       <!-------------------------------------------------------->
       <div class="profile-info-container">
        <div class="profile-setting-left-side">
           <ul>
            <li><a href="myProfile.php">Profile Settings</a></li>
            <li><a href="update_password.php">Update Password</a></li>
            <li><a href="my_Bookings.php">My Booking</a></li>
            <li><a href="logout.php">Sign Out</a></li>
           </ul>
        </div>
        <!--===============Yesko css myprofile.css ma xa==========-->
        <div class="profile-setting-right-side">
            <h2 id="uppercase">My Bookings</h2>
<!----------------------------------------------------------------------------->
  <!---------==================PHP CODE=====================================-->   
  <?php 
        $emailId= $_SESSION['EMAILID'];
        $sql = "SELECT * from booking_table WHERE user_id ='$user_id' ";
        $result = mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_assoc($result)){

         //   $userEmail = $row['userEmail'];
            $vehicleId = $row['vehicleId'];
            $fromDate = $row['fromDate'];
            $toDate = $row['toDate'];
            $message = $row['message'];
            $vehicleType = $row['vehicleType'];
            $status = $row['status'];

            //==date difference=== //
            $from = new DateTime($fromDate);
            $to = new  DateTime($toDate);
            $day_diff = $to->diff($from); //date difference 
           // $no_of_days = ($day_diff/(60*60*24));
  /*Note: booking gareko vehicle car ho ki bike ho bhanera tha pauna ko lagi
          booking_table ko vehicleType domain use bhako xa */    
//===========if the vehicle is Car=========================//
            if($vehicleType == 'car')
            {
            $sql1 = "SELECT Name,pricePerDay, image1 from car_bike_table where vehicle_id= '$vehicleId' ";
            $result1 = mysqli_query($con,$sql1);
           $row1 = mysqli_fetch_assoc($result1);
            
    ?>
       <!---================================================================-->
             <div class="profile-setting-right-side-car-booking-box">
                <div class="profile-setting-right-side-car-booking-box-div">
                    <img src="<?php echo "admin/images/".$row1['image1'];  ?>" alt="" style="width:200px; height:134px">
                </div>
                <div class="profile-setting-right-side-car-booking-box-detail">
                    <h3><?php echo $row1['Name']; ?></h3>
                    <p>From  <span class="date-color"><?php echo $fromDate ?></span class="date-color"> To <span class="date-color"><?php echo $toDate ?></span></p>
                    <p>Total Days:<span class="date-color"> <?php echo $day_diff->d; ?></span></p>
                    <p>Rent per day:<span class="date-color"> Rs <?php echo $row1['pricePerDay']; ?></span></p>
                    <p>Total:<span class="date-color"> Rs <?php echo $row1['pricePerDay']*$day_diff->d; ?></span></p>
                </div>
                <div class="profile-setting-right-side-car-booking-confirm">
                    <?php
                    if($status=='Confirmed'){
                    echo'
                    <button id="btn-confirm" style="background-color:rgb(3, 143, 3);
                    color:#fff">Booking Confirmed</button>
                    ';}else if($status==null){
                        echo '
                        <button id="btn-confirm">Not Confirm yet</button>
                        ';
                    }else if($status=='cancelled'){
                        echo '
                        <button id="btn-confirm" style="background-color:red; color:#fff">Booking Cancelled</button>
                        ';
                    }
                    ?>
                </div>
             </div>
             <?php
            }
            /*Note: booking gareko vehicle car ho ki bike ho bhanera tha pauna ko lagi booking_table ko vehicleType domain use bhako xa */    
          //===========if the vehicle is bike=========================//
          if($vehicleType == 'bike')
            {
            $sql2 = "SELECT Name,pricePerDay, image1 from car_bike_table where vehicle_id= '$vehicleId' ";
            $result2 = mysqli_query($con,$sql2);
           $row2 = mysqli_fetch_assoc($result2);
            
    ?>
       <!---================================================================-->
             <div class="profile-setting-right-side-car-booking-box">
                <div class="profile-setting-right-side-car-booking-box-div">
                    <img src="<?php echo "admin/images/".$row2['image1'];  ?>" alt="" style="width:200px; height:134px">
                </div>
                <div class="profile-setting-right-side-car-booking-box-detail">
                    <h3><?php echo $row2['Name']; ?></h3>
                    <p>From  <span class="date-color"><?php echo $fromDate ?></span class="date-color"> To <span class="date-color"><?php echo $toDate ?></span></p>
                    <p>Total Days:<span class="date-color"> <?php echo $day_diff->d;  ?></span></p>
                    <p>Rent per day:<span class="date-color"> Rs <?php echo $row2['pricePerDay']; ?></span></p>
                    <p>Total:<span class="date-color"> Rs <?php echo $row2['pricePerDay']*$day_diff->d; ?></span></p>
                </div>
                <div class="profile-setting-right-side-car-booking-confirm">
                    <?php
                    if($status=='Confirmed'){
                    echo'
                    <button id="btn-confirm" style="background-color:rgb(3, 143, 3); color:#fff; border:0.5px solid rgb(3, 143, 3)">Booking Confirmed</button>
                    ';}else if($status==null){
                        echo '
                        <button id="btn-confirm">Not Confirm yet</button>
                        ';
                    }else if($status=='cancelled'){
                        echo '
                        <button id="btn-confirm" style="background-color:red; color:#fff">Booking Cancelled</button>
                        ';
                    }
                    ?>
                </div>
             </div>
             <?php
            }








           }
        
        ?>
 <!---------------------------------------------------------------------------->
 
        </div>
       </div>
<div class="get-our-services-box">
    <div class="get-our-services-box-left">
        <h3>Get Our Service</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui alias deleniti voluptas expedita natus voluptatum, provident adipisci ratione illum exercitationem quas incidunt quos quo rem, nulla doloribus </p>
    </div>
    <div class="get-our-services-box-right">
        <button class="btn" ><a href="contact.php">Contact Us</a></button>
    </div>
</div>


       </body>
       </html>
