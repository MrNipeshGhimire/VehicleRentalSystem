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
    <link rel="stylesheet" href="cssFile/about.css">
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/myProfile.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My Profile</title>
</head>
<body>
    
    <div class="container-1-first1">
        <!---------------top header--------------------->
          <?php  include('assets/topHeader.php');  ?>
        <!------------------------------------------------->
        <!--------------------------------------------------->
        <?php  include('assets/header.php');  ?>
        <!-----------------------------header navbar--------------->
        <div class="content-head">

            <h1>My Profile</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.php">Home</a> > My Profile</h3>
        </div>
       </div>
       <!--============PHP ============This is very important query===============-->
       <!--========================================================================-->
       <?php
                
                 $emailid = $_SESSION['EMAILID'];
                 $sql= "SELECT * FROM tblusers WHERE EmailId='$emailid' ";
                 $result= mysqli_query($con,$sql);
                 $row =mysqli_fetch_assoc($result);


                 $fullname= $row['FullName'];
                 $email = $row['EmailId'];
                 $phone = $row['ContactNo'];
                 $dob = $row['dob'];
                 $address = $row['Address'];
                 $country = $row['Country'];
                 $RegDate = $row['RegDate'];
                 $UpdationDate = $row['updateDate'];
                

                 if(isset($_POST['submit'])){
                    $fullname= $_POST['fullName'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $dob = $_POST['dob'];
                    $address = $_POST['address'];
                    $country = $_POST['country'];
                   $UpdationDate = date("Y-m-d");

                 $query = " UPDATE tblusers set FullName= '$fullname', EmailId='$email', ContactNo= '$phone', dob='$dob', Address='$address', Country='$country',updateDate='$UpdationDate' where EmailId='$emailid' ";
                 $result = mysqli_query($con,$query);
                 if($result)
                 {
                    ?>
                    <script>
                     alert('Update SuccessFully');
                   </script>
                   <?php
                 }else{
                    die(mysqli_errror($con));
                 }
                }
                 ?>

       <!--==============Profile box========-->
       <div class="profile-box">
        <div class="profile-box-img">
            <img src="cssFile/image/img1.jpeg" alt="profile">
        </div>
        <div class="profile-box-name">
            <h2><?php echo $fullname;?></h2>
            <p><?php echo $address;?></p>
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
        
        <div class="profile-setting-right-side">
        
            <h2 id="uppercase">General Settings</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <p><label for="">Reg-Date-</label>
                    <?php echo $RegDate; ?></p>
                </div>
                <div class="form-group">
                    <p><label for="">Last Update at-</label>
                    <?php echo $UpdationDate; ?></p>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Full Name</label></p>
                    <input type="text" name="fullName" value="<?php echo $fullname;?>" >
                </div>
                <div class="form-group">
                    <p><label for="Email">Email Address</label></p>
                    <input type="email" name="email" value="<?php echo $email;?>">
                </div>
                <div class="form-group">
                    <p><label for="phone">Phone Number</label></p>
                    <input type="number" name="phone" value="<?php echo $phone;?>">
                </div>
                
                <div class="form-group">
                    <p><label for="dob">Date of Birth(yyyy-mm-dd)</label></p>
                    <input type="text" name="dob" value="<?php echo $dob;?>">
                </div>
                <div class="form-group">
                    <p><label for="address">Your Address</label></p>
                    <input type="text" name="address" value="<?php echo $address;?>">
                </div>
                <div class="form-group">
                   <p><label for="country">Country</label></p>
                    <input type="text" name="country" value="<?php echo $country;?>">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn" name="submit">Save Changes<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
            <!---==================After user click the Save Changes Button=======--> 
            
        </div>
       </div>
<div class="get-our-services-box">
    <div class="get-our-services-box-left">
        <h3>Get Our Service</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui alias deleniti voluptas expedita natus voluptatum, provident adipisci ratione illum exercitationem quas incidunt quos quo rem, nulla doloribus </p>
    </div>
    <div class="get-our-services-box-right">
        <button class="btn">Contact Us</button>
    </div>
</div>


       </body>
       </html>
