<?php
include ('connect.php');
include('checkLogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title> Admin Dashboard</title>
</head>
<body>
    <!---===================PHP FILE FOR Admin Profile=====================--> 
  <?php
   $email = $_SESSION['EMAILID'];
       $sql = "SELECT * from tblusers where EmailId='$email'";
       $result = mysqli_query($con,$sql);
       $row = mysqli_fetch_assoc($result);
                    $name = $row['FullName'];
                    $email = $row['EmailId'];
                    $phone = $row['ContactNo'];
                    $address = $row['Address'];
                    $country = $row['Country'];
                    
    ?>
    <!--------------------------------------------------------------------->
      <?php include('header-top.php'); ?>
    <div class="dashboard-container"> 
       <?php include('header-left.php') ?>
       <div class="dashboard-container-right">
       <div class="data-container-2">
            <h2>Admin Profile</h2>
             <!--==============Profile box========-->
       <div class="profile-box">
        <div class="profile-box-img">
            <img src="images/Nipesh.jpg" alt="profile">
        </div>
        <div class="profile-box-name">
            <h2><?php echo $name; ?></h2>
            <p><?php echo $address; ?></p>
            
        </div>
       </div>
       <!-------------------------------------------------------->
            <form action="" method="POST" >
               
                <div class="form-group">
                    <p><label for="fullname">Full Name</label></p>
                    <input type="text" name="FullName" value="<?php echo $name ?>" required>
                </div>
                
                <div class="form-group">
                    <p><label for="fullname">Email</label></p>
                    <input type="email" name="EmailId" value="<?php echo $email ?>" required>
                </div>
                <div class="form-group">
                    <p><label for="phone">Phone</label></p>
                    <input type="text" name="ContactNo" value="<?php echo $phone ?>" required>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Address</label></p>
                    <input type="text" name="Address" value="<?php echo $address ?>" required>
                </div>
                <div class="form-group">
                    <p><label for="country">Country</label></p>
                    <input type="text" name="Country" value="<?php echo $country ?>" required>
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn-1" name="submit">Save Changes
                    </button>
                </div>
            </form>
        <!--------------------------------------------->
       </div>
       </div>
    </div>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $name = $_POST['FullName'];
    $email = $_POST['EmailId'];
    $phone = $_POST['ContactNo'];
    $address = $_POST['Address'];
    $country = $_POST['Country'];
    
    //For udate query of car_table//
    $sql = "UPDATE tblusers set FullName='$name', EmailId='$email', ContactNo='$phone',Address='$address',Country='$country' where EmailId='$email'";
    $result = mysqli_query($con,$sql);
    if($result){
       ?>
       <script>
        alert("Update Successfully");
        location.replace("adminProfile.php");
       </script>
       <?php
    }else{
        die(mysqli_error($con));
    }
    
  }


?>

