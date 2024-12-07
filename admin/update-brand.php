<?php
include('connect.php');
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
      <?php include('header-top.php'); ?>
    <div class="dashboard-container"> 
       <?php include('header-left.php') ?>
       <div class="dashboard-container-right">
       <div class="data-container-2">
        <!--=========PHP=================--> 
        <?php
        $bid = $_GET['updateid'];
        $sql= "SELECT * from brand_table where id=$bid";
        $result=mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
           if(isset($_POST['submit'])){
            $name = $_POST['brand'];
            $sql = "UPDATE brand_table set name='$name' where id=$bid ";
            $result = mysqli_query($con,$sql);
            if($result){
                header('location:brands.php');
            }else{
                die(mysqli_error($con));
            }
           }

     ?>
            <h2>Update Brand Name</h2>
            <form action="" method="POST">
               
                <div class="form-group">
                    <p><label for="brand">Brand</label></p>
                    <input type="text" name="brand" value="<?php echo $name ?>" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-1" name="submit">Update
                    </button>
                </div>
            </form>
        <!--------------------------------------------->
       </div>
       </div>
    </div>
</body>
</html>

      