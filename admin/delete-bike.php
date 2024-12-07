<?php
include('connect.php');
include('checkLogin.php');
$bid= $_GET['deleteid'];
$sql = "DELETE from car_bike_table where id=$bid";
$result = mysqli_query($con,$sql);
if($result)
{
    
    header('location:manage-bike.php');
}else{
    die(mysli_error($con));
}

?>