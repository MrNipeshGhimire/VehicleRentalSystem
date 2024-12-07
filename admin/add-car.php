<?php
include('connect.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title> Add Car</title>
</head>
<body>
      <?php include('header-top.php'); ?>
    <div class="dashboard-container"> 
       <?php include('header-left.php') ?>
       <div class="dashboard-container-right">
       <div class="data-container-2">
            <h2>Add new Car</h2>
            <form action="" method="POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <p><label for="fullname">Car Title</label></p>
                    <input type="text" name="name" required>
                </div>
                <!--========Brand of vehicle ============-->
                <div class="form-group">
                    <p><label for="fullname">Select Brand</label></p>
                    <select name="brand" class="select">
                    <option>--Select Brand--</option>
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
               <!---Price per Day-->
                <div class="form-group">
                    <p><label for="fullname">Price Per Day</label></p>
                    <input type="text" name="price" required>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Select Fuel Type</label></p>
                    <select name="fuel">
                   <option>--Select Fuel Type--</option>
                   <option value="petrol">Petrol</option>
                   <option value="Diesel">Diesel</option>
                   <option value="CNG">CNG</option>
                   </select>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Model Year</label></p>
                    <input type="text" name="model" required>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Seating Capacity</label></p>
                    <input type="text" name="seat" required>
                </div>
                <div class="form-group">
                    <p><label for="fullname">Mileage</label></p>
                    <input type="text" name="mileage" required>
                </div>
                <!---------Upload Images---------------->
                <div class="form-group">
                    <p><label for="image" class="uploadImage">Upload Images</label></p>
                    <input id="imgClass" type="file" name="img1" required>
                    <input  id="imgClass" type="file" name="img2" required>
                    <input id="imgClass" type="file" name="img3" required>
                </div>
                <div class="form-group">
                    <p><label for="overview">Car Overview</label></p>
                    <textarea type="textarea" name="overview" required style="width:680px; height:78px; outline:none; padding:10px; border:1px solid rgb(216, 206, 206);  background-color: #272c4a; color:#fff">
                     </textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-1" name="submit">Add
                    </button>
                </div>
            </form>
        <!--------------------------------------------->
       </div>
       </div>
    </div>
</body>
<!--------==========PHP SECTION for Adding Car details=======------->
<?php
   if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $fuel = $_POST['fuel'];
    $model = $_POST['model'];
    $seat = $_POST['seat'];
    $mileage=$_POST['mileage'];
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
    $overview = $_POST['overview'];

    //for accessing brand id
    $sql_query = "SELECT brand_id from brand_table WHERE name = '$brand'";
    $res = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_assoc($res);
    $brand_id = $row['brand_id'];

    $sql = "INSERT INTO car_bike_table(Name,brand_id,pricePerDay,fuelType,modelYear,seatingCapacity,mileage,image1,image2,image3,Overview,vehicleType) values('$name','$brand_id','$price','$fuel','$model','$seat','$mileage','$img1','$img2','$img3','$overview','car')";
    $result = mysqli_query($con,$sql);
    if($result){
       
        move_uploaded_file($_FILES['img1']['tmp_name'], "images/".$_FILES['img1']['name']);
        move_uploaded_file($_FILES['img2']['tmp_name'], "images/".$_FILES['img2']['name']);
        move_uploaded_file($_FILES['img3']['tmp_name'], "images/".$_FILES['img3']['name']);
        header('location:manage-car.php');
        ?>
         <script>
            alert("Car Added Successfully");
         </script>
        <?php
   }else{
    die(mysqli_error($con));
   }
 }
?>
</html>

      