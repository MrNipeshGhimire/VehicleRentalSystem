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
    <?php include('header-top.php');
    include('checkLogin.php');  ?>
    <div class="dashboard-container"> 
    <?php  include('header-left.php');    ?>
       <div class="dashboard-container-right">  <!-- style.css -->
         <!---------------container-1=========-->
         <div class="data-container">
         <div class="data-container-1">
            <h2>Manage Cars</h2>
            <table class="data-table">
                <tr class="data-table-row">
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Price per Day</th>
                    <th>Fuel Type</th>
                    <th>Model Year</th>
                    <th>Action</th>
                </tr>
                <!-----=======PHP for Displaying Bike Details=====-------------> 
                <?php 
                include('connect.php');
                $sql = "SELECT * from car_bike_table WHERE vehicleType='car'";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['vehicle_id'];
                    $name = $row['Name'];
                    $brand_id = $row['brand_id'];
                    $price = $row['pricePerDay'];
                    $fuel = $row['fuelType'];
                    $model = $row['modelYear'];
                    $seat = $row['seatingCapacity'];
                    $img1 = $row['image1'];
                    $img2 = $row['image2'];
                    $img3 = $row['image3'];
                    $overview = $row['Overview'];

                    $sql1 = "SELECT name from brand_table WHERE brand_id = '$brand_id'";
                    $result1 = mysqli_query($con,$sql1);
                    $row1= mysqli_fetch_assoc($result1);
                    $brand = $row1['name'];
                    echo '
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$brand.'</td>
                    <td>'.$price.'</td>
                    <td>'.$fuel.'</td>
                    <td>'.$model.'</td>
                    <td>
                        <button  class="btn-1"><a href="update-car.php?updateid='.$id.'">Update</a></button>
                        <button  class="btn-2"><a href="delete-car.php?deleteid='.$id.'">Delete</a></button>
                    </td>
                </tr>
                ';
                }
                ?>
            </table>
        </div>
        <div class="add-new">
            <button type="button" class="btn-1"><a href="add-car.php">Add New Car</a></button>
        </div>
    </div>
    </div>
</body>
</html>
