<?php
//check if admin is logged in or not //
//this checkLogin.php is used to avoid the direct access to the page with logged in.//
session_start();
if(!isset($_SESSION['EMAILID'])){
   ?>
   <script>
    location.replace("adminLogin.php");
   </script>
   <?php
}
?>