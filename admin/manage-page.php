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
    <?php include('header-top.php');  ?>
    <div class="dashboard-container"> 
    <?php  include('header-left.php');    ?>
       <div class="dashboard-container-right">  <!-- style.css -->
         <!---------------container-1=========-->
         <div class="data-container">
         <div class="data-container-1">
            <!---===================PHP for Managing Page===-----> 
            <?php  

              $sql = "SELECT details from manage_page where type='aboutus' ";
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_assoc($result);
                $detail1 = $row['details'];
             ?>
            <!---------------------------------------------------->
            <h2>Manage Pages</h2>
            <form action="" method="POST">
            <div class="form-field">
                <label for="contact">About Us Page</label><br>
                <textarea name="about" id="" value="<?php echo $detail ?>"style=" outline:none; padding:10px; border:1px solid rgb(216, 206, 206);  background-color: #272c4a; color:#fff" cols="80" rows="15"><?php echo $detail1 ?></textarea>
            </div>
            <div class="manage-page-btn-field">
            <button type="submit" class="btn-1" name="submit">Save Changes</button>
        </div>
        <!--========PHP for About us page======-->
         <?php  
            if(isset($_POST['submit'])){
                $about = $_POST['about'];
                $sql = "UPDATE manage_page set details='$about' where id=1 ";
                $result = mysqli_query($con,$sql);
                if($result){
                    ?>
                    <script>
                        alert("Updated Successfully");
                        location.replace("manage-page.php");
                    </script>
                    <?php
                }
            }
            ?>
            <!---------------------------------------------------------->
            <!---===================PHP for Managing Page privacy policy===-----> 
            <?php  

              $sql = "SELECT details from manage_page where type='privacy' ";
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_assoc($result);
                $detail2 = $row['details'];
             ?>
            <!---------------------------------------------------->
            <div class="form-field">
                <label for="contact">Privacy policy</label><br>
                <textarea name="privacy" id="" cols="80" rows="15"style=" outline:none; padding:10px; border:1px solid rgb(216, 206, 206);  background-color: #272c4a; color:#fff"><?php echo $detail2 ?></textarea>
            </div>
            </div>
             <div class="manage-page-btn-field">
            <button type="submit" class="btn-1" name="submit">Save Changes</button>
        </div>
         <!--========PHP for privacy policy page======-->
         <?php  
            if(isset($_POST['submit'])){
                $about = $_POST['privacy'];
                $sql = "UPDATE manage_page set details='$about' where id=2 ";
                $result = mysqli_query($con,$sql);
                if($result){
                    ?>
                    <script>
                         alert("Updated Successfully");
                        location.replace("manage-page.php");
                    </script>
                    <?php
                }
            }
            ?>
             <!---==========PHP for Managing Page Terms and conditions===-----> 
             <?php  

                $sql = "SELECT details from manage_page where type='termsAndConditions' ";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                $detail3 = $row['details'];
                ?>
                <!---------------------------------------------------->
            <div class="form-field">
                <label for="contact">Terms and Conditions</label><br>
                <textarea name="terms" id="" cols="80" rows="15" style=" outline:none; padding:10px; border:1px solid rgb(216, 206, 206);  background-color: #272c4a; color:#fff"><?php echo $detail3 ?></textarea>
            </div>
           <!--========PHP for Terms and Conditions page======-->
         <?php  
            if(isset($_POST['submit'])){
                $terms = $_POST['terms'];
                $sql = "UPDATE manage_page set details='$terms' where id=3 ";
                $result = mysqli_query($con,$sql);
                if($result){
                    ?>
                    <script>
                         alert("Updated Successfully");
                        location.replace("manage-page.php");
                    </script>
                    <?php
                }
            }
            ?>
        <div class="manage-page-btn-field">
            <button type="submit" class="btn-1" name="submit">Save Changes</button>
        </div>
        </form>
    </div>
    </div>
</body>
</html>

