<?php
session_start();
include 'assets/connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="cssFile/about.css">
    <link rel="stylesheet" href="cssFile/style.css">
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>About Page</title>
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
    <div class="container-1-first1">
     <?php   //---------------------top header-------------------------//
                  include('assets/topHeader.php');
        //-----------------------------------------------------------//
        //-----------------header--------------------------//
             include('assets/header.php');
        ?>
        <!--------------------------------------------------->
        
        <div class="content-head">

            <h1>About Us</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.php">Home</a> > About Us</h3>
        </div>
       </div>
       <!----------------------------------------------------------->
       <div class="container-2">
        <div class="left_side"></div>
        <div class="right_side">
            <h2>About Us</h2>
            <!---=============PHP of Contact Us------------=------======-->
            <?php
            $sql = "SELECT details from manage_page where  id=1 ";
            $result= mysqli_query($con,$sql);
           $row = mysqli_fetch_assoc($result);
                $about = $row['details'];  
                ?>
                <p style=" margin:10px;  font-size: 1.2rem; text-align: justify;"><?php echo $about ?></p>
        </div>
    </div>
   
    <!---======================Footer=====================================-->
   <?php   include('assets/footer.php');    ?>
  <!------------------------------------------------------------------>
</body>
</html>