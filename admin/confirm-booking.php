<?php
include('connect.php');
        $cid = $_GET['cid'];
       
        $sql = "UPDATE booking_table set status='Confirmed' where booking_id=$cid";
        $result = mysqli_query($con,$sql);
        if($result){
            header('location:manage-booking.php');
        }else{
            die(mysqli_error($result));
           }
?>