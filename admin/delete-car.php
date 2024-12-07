<?php
include('connect.php');
include('checkLogin.php');
$carid= $_GET['deleteid'];
$sql = "DELETE from car_bike_table where id=$carid";
$result = mysqli_query($con,$sql);
if($result)
{ 
    header('location:manage-car.php');
}else{
    die(mysli_error($con));
}

?>