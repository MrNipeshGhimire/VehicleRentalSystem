<?php
include('connect.php');
include('checkLogin.php');
        $cid = $_GET['cid'];
       
        $sql = "UPDATE booking_table set status='cancelled' where booking_id=$cid";
        $result = mysqli_query($con,$sql);
        if($result){
            header('location:manage-booking.php');
        }else{
            die(mysqli_error($result));
           }
?>