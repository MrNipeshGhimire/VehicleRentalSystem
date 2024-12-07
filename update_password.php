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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update Password</title>
</head>
<body>
    
    <div class="container-1-first1">
        <!---------------topHeader---------------------> 
            <?php  include('assets/topHeader.php');  ?>
        <!--------------------------------------------->
        <!------------------Header------------------->
          <?php   include('assets/header.php');   ?>
        <!---------------------------------------------->
        <div class="content-head">

            <h1>My Profile</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.php">Home</a> > My Profile</h3>
        </div>
       </div>
       <!--======================PHP CODE for Update Password================-->
       <!--==================================================================-->
       <?php
        $emailId = $_SESSION['EMAILID'];  //global variable
        $sql= "SELECT * from tblusers where EmailId ='$emailId' "; //session email
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);

            $email = $row['EmailId'];
            $name= $row['FullName'];
            $address = $row['Address'];
            $password = $row['Password'];

        if(isset($_POST['submit'])){
            $current_password =$_POST['current_password'];
            $type_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if($current_password == $password){ //$password is comes from database
                if($type_password == $confirm_password){
                    $sql= "UPDATE tblusers set Password ='$confirm_password'  where EmailId='$emailId' ";
                    $result = mysqli_query($con,$sql);
                    if($result)
                    {
                        ?>
                         <script>
                            alert("Password Updated Successfully");
                         </script>
                        <?php
                    }
                }
            }else{
                ?>
                     <script>
                        alert("Incorrect Password !!");
                        </script>
                        <?php
            }
        }


      ?>
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
        
        <div class="profile-setting-right-side">
            <h2 id="uppercase">Update Password</h2>
            <form action="" method="POST">
                
                <div class="form-group">
                    <p><label for="current_password">Current Password</label></p>
                    <input type="text" name="current_password">
                </div>
                <div class="form-group">
                    <p><label for="password">Password</label></p>
                    <input type="text" name="password">
                </div>
                <div class="form-group">
                    <p><label for="confirm_password">Confirm Password</label></p>
                    <input type="text" name="confirm_password">
                </div>
                
                <div class="form-group">
                    <button class="btn" type="submit" name="submit">Update<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
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
