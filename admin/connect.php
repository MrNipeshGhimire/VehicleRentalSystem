<?php
$con = new mysqli('localhost','root','','car_bike_rental_db');
if(!$con)
{
    die(mysqli_error($con));
}

?>