<?php
include('connect.php');
include('checkLogin.php');
  $id = $_GET['deleteid'];
  $sql = "DELETE from brand_table where id=$id";
  $result = mysqli_query($con,$sql);
  if($result){
    header('location:brands.php');
  }else{
    die(mysqli_error($con));
  }
?>