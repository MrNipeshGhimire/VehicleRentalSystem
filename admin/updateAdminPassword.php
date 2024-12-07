<?php
include 'connect.php';
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
    
    <!--------------------------------------------------------------------->
      <?php include('header-top.php'); ?>
    <div class="dashboard-container"> 
       <?php include('header-left.php') ?>
       <div class="dashboard-container-right">
       <div class="data-container-2">
            <h2>Update Admin Password</h2>
            <!--==============Profile box========-->
       <div class="profile-box">
        <div class="profile-box-img">
            <img src="images/Nipesh.jpg" alt="profile">
        </div>
        <div class="profile-box-name">
            <h2>Nipesh Ghimire<?php //echo $name; ?></h2>
            <p>Kerabari<?php //echo $address; ?></p>
            <p>nipesh@gmail.com<?php //echo $email; ?></p>
        </div>
       </div>
       <!-------------------------------------------------------->
            <form action="" method="POST" >
               
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
<!--======================PHP CODE for Update Password================-->
       <!--==================================================================-->
       <?php
        $emailId = $_SESSION['EMAILID'];  //global variable
        $sql= "SELECT * from tblusers where EmailId ='$emailId' "; //session email
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);

            $email = $row['EmailId'];
            
            $password = $row['password'];

        if(isset($_POST['submit'])){
            $current_password =$_POST['current_password'];
            $type_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if($current_password == $password){ //$password is comes from database
                if($type_password == $confirm_password){
                    $sql= "UPDATE tblusers set password ='$confirm_password'  where EmailId='$emailId' ";
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