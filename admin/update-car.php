<?php
include 'connect.php';
include('checkLogin.php');
$carid = $_GET['updateid'];
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
    <!---===================PHP FILE FOR UPDATE CAR=====================--> 
  <?php
    $carid = $_GET['updateid'];
       $sql = "SELECT * from car_bike_table where vehicle_id=$carid ";
       $result = mysqli_query($con,$sql);
       $row = mysqli_fetch_assoc($result);
                    $name = $row['Name'];
                    $brand_id = $row['brand_id'];
                    $overview = $row['Overview'];
                    $price = $row['pricePerDay'];
                    $fuel = $row['fuelType'];
                    $model = $row['modelYear'];
                    $seat = $row['seatingCapacity'];
                    $img1 = $row['image1'];
                    $img2 = $row['image2'];
                    $img3 = $row['image3'];
    ?>
    <!--------------------------------------------------------------------->
      <?php include('header-top.php'); ?>
    <div class="dashboard-container"> 
       <?php include('header-left.php') ?>
       <div class="dashboard-container-right">
       <div class="data-container-2">
            <h2>Update Car Details</h2>
            <form action="" method="POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <p><label for="fullname">Car Title</label></p>
                    <input type="text" name="name" value="<?php echo $name ?>" required>
                </div>
                <!--========Brand of vehicle ============-->
                <?php
                $sql1 = "SELECT name from brand_table WHERE brand_id = '$brand_id'";
                $result1 = mysqli_query($con,$sql1);
                $row1= mysqli_fetch_assoc($result1);
                $brand = $row1['name'];
                ?>
                <div class="form-group">
                    <p><label for="fullname">Brand</label></p>
                    <select name="brand" class="select">
                    <option><?php echo $brand ?></option>
                        <?php
                        $sql= "SELECT * from brand_table";
                        $result=mysqli_query($con,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $name = $row['name'];
                        ?>
                   <option><?php echo $name; ?></option>
                   <?php
                } ?>
                   </select>
                </div>
              <!--=====Fuel type of Vehicle=====-->
                <div class="form-group">
                    <p><label for="fullname">Price Per Day</label></p>
                    <input type="text" name="price" value="<?php echo "$price" ?>" required>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Fuel Type</label></p>
                    <select name="fuel">
                   <option><?php echo $fuel; ?></option>
                   <option value="petrol">Petrol</option>
                   <option value="Diesel">Diesel</option>
                   <option value="CNG">CNG</option>
                   </select>
                </div>
                
                <div class="form-group">
                    <p><label for="fullname">Model Year</label></p>
                    <input type="text" name="model" value="<?php echo "$model" ?>" required>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Seating Capacity</label></p>
                    <input type="text" name="seat" value="<?php echo "$seat" ?>" required>
                </div>
                <!---------Upload Images---------------->
                <div class="form-group">
                    <h2><label for="image" >Upload Images</label></h2>

                    <p>Current Image</p>
                    <img src="<?php echo "./images/".$img1; ?>" alt="" style="width:200px; height:140px">
                    <input id="imgClass" type="file" name="new_img1">
                     <input type="hidden" name="old_img1" value="<?php echo $img1; ?>">
                      <!--type="hidden" le input box hide garxa-->

                      <br><br>
                     <p>Current Image</p>
                    <img src="<?php echo "./images/".$img2 ?>" alt="" style="width:200px; height:140px">
                    <input id="imgClass" type="file" name="new_img2">
                    <input type="hidden" name="old_img2" value="<?php echo $img2; ?>">

                    <br><br>
                    <p>Current Image</p>
                    <img src="<?php echo "./images/".$img3 ?>" alt="" style="width:200px; height:140px">
                    <input id="imgClass" type="file" name="new_img3">
                    <input type="hidden" name="old_img3" value="<?php echo $img3; ?>">
                </div>
                <div class="form-group">
                    <p><label for="overview">Car Overview</label></p>
                    <textarea type="textarea" name="overview" value="<?php echo $overview; ?>" style="width:400px; height:78px; outline:none; padding:10px; border:1px solid rgb(216, 206, 206);background-color: #272c4a; color:#fff">
                    <?php echo $overview; ?>
                     </textarea>
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
<?php
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $fuel = $_POST['fuel'];
    $model = $_POST['model'];
    $seat = $_POST['seat'];
    $overview = $_POST['overview'];

    $new_img1 = $_FILES['new_img1']['name'];
    $new_img2 = $_FILES['new_img2']['name'];
    $new_img3 = $_FILES['new_img3']['name'];

    $old_img1 = $_POST['old_img1'];
    $old_img2 = $_POST['old_img2'];
    $old_img3 = $_POST['old_img3'];
      //for image 1//
    if($new_img1!= ''){
        $update_filename1 = $_FILES['new_img1']['name']; 
    }else{
        $update_filename1 =$old_img1;
    }
    //for image 2//
    if($new_img2!= ''){
        $update_filename2 = $_FILES['new_img2']['name'];
    }else{
        $update_filename2 =$old_img2;
    }
    // for image3
    if( $new_img3!= ''){
        $update_filename3 = $_FILES['new_img3']['name'];
    }else{
        $update_filename3 =$old_img3;
    }

    //For udate query of car_table//
    $sql = "UPDATE car_bike_table set Name='$name', brand='$brand',pricePerDay='$price', fuelType='$fuel',modelYear='$model',seatingCapacity='$seat',image1='$update_filename1',image2='$update_filename2',image3='$update_filename3',Overview='$overview' where vehicle_id=$carid ";
    $result = mysqli_query($con,$sql);
    if($result){
        //=====image 1========//
       if($_FILES['new_img1']['name']!='')
       {
        move_uploaded_file($_FILES['new_img1']['tmp_name'], "images/".$_FILES['new_img1']['name']);
        unlink("images/".$old_img1);
       }

        //=====image 2========//
        if($_FILES['new_img2']['name']!='')
        {
         move_uploaded_file($_FILES["new_img2"]['tmp_name'], "images/".$_FILES["new_img2"]["name"] );
         unlink("images/".$old_img2);
        }

         //=====image 3========//
       if($_FILES['new_img3']['name']!='')
       {
        move_uploaded_file($_FILES["new_img3"]['tmp_name'], "images/".$_FILES["new_img3"]["name"] );
        unlink("images/".$old_img3);
       }
       //location('header:manage-car.php');
       ?>
       <script>
        alert("Update Successfully");
        location.replace("manage-car.php");
       </script>
       <?php
    }else{
        die(mysqli_error($con));
    }
    
  }


?>