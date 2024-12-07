<?php
include('connect.php');
//session_start();--session is already start in checklogin.php--
//check if admin is logged in or not //
//this chcckLogin.php is used to avoid the direct access to the page with logged in.//
include('checkLogin.php');  // admin le login nagari page lai direct access garna mildaina
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title> Admin Dashboard</title>
</head>
<?php 

//for reg. User count
$sql = "SELECT user_id from tblusers";
if($result=mysqli_query($con,$sql)){
   $rowcount1 = mysqli_num_rows($result);
}
//for new car count
$sql = "SELECT vehicle_id from car_bike_table where vehicleType='bike' ";
if($result=mysqli_query($con,$sql)){
   $rowcount2 = mysqli_num_rows($result);
}
//for new bike count
$sql = "SELECT vehicle_id from car_bike_table where vehicleType='car' ";
if($result=mysqli_query($con,$sql)){
   $rowcount3 = mysqli_num_rows($result);
}
//for Booking  count
$sql = "SELECT booking_id from booking_table";
if($result=mysqli_query($con,$sql)){
   $rowcount4 = mysqli_num_rows($result);
}

//for Booking  count
$sql = "SELECT id from contact_from_user";
if($result=mysqli_query($con,$sql)){
   $rowcount5 = mysqli_num_rows($result);
}

?>
<body>
    <?php  include('header-top.php');  ?>
    <div class="dashboard-container"> 
       <?php include('header-left.php'); ?>
       <div class="dashboard-container-right">
        <div class="dashboard-data-box-container">
            <div class="dashboard-data-box">
                <h2><?php echo $rowcount1 ?></h2>
                <p>Reg Users</p>
                <div class="dashboard-data-box-fulldetail">
                    <p><a href="registered-users.php">Full detail</a></p>
                </div>
            </div>
            <!----------------------------------->
            <div class="dashboard-data-box">
                <h2><?php echo $rowcount3 ?></h2>
                <p>Listed Bikes</p>
                <div class="dashboard-data-box-fulldetail">
                    <p><a href="manage-bike.php">Full detail</a></p>
                </div>
            </div>
            <!-------------------------------------------->
             <!----------------------------------->
             <div class="dashboard-data-box">
                <h2><?php echo $rowcount2 ?></h2>
                <p>Listed Cars</p>
                <div class="dashboard-data-box-fulldetail">
                    <p><a href="manage-car.php">Full detail</a></p>
                </div>
            </div>
            <!-------------------------------------------->
             <!----------------------------------->
             <div class="dashboard-data-box">
                <h2><?php echo $rowcount4 ?></h2>
                <p>Total Bookings</p>
                <div class="dashboard-data-box-fulldetail">
                    <p><a href="manage-booking.php">Full detail</a></p>
                </div>
            </div>
            <!-------------------------------------------->
            <!----------------------------------->
            <div class="dashboard-data-box">
                <h2><?php echo $rowcount5 ?></h2>
                <p>Queries</p>
                <div class="dashboard-data-box-fulldetail">
                    <p><a href="manage_contactUs_query.php">Full detail</a></p>
                </div>
            </div>
            <!-------------------------------------------->
        </div>
       </div>
    </div>
</body>
</html>
