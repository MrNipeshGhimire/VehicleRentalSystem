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
    <?php include('header-top.php');  ?>
    <div class="dashboard-container"> 
     <?php  include('header-left.php');    ?>
       <div class="dashboard-container-right">
        <!---------------container-1=========-->
        <div class="brand-container-1">
            <table class="brand-table">
                
                <tr class="brand-table-row">
                    <th>S.N</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
                <?php  
                $sql = "SELECT * from brand_table";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['brand_id'];
                    $name =$row['name'];
                    echo '
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>
                        <button  class="btn-1"><a href="update-brand.php?updateid='.$id.'">Update</a></button>
                        <button class="btn-2"><a href="delete-brands.php?deleteid='.$id.'">Delete</a></button>
                    </td>
                </tr>
                ';
                }
                ?>
                
            </table>
        </div>
        <?php
        if(isset($_POST['submit'])){
            $brand = $_POST['brand'];

            $sql = "INSERT into brand_table(name) values('$brand')";
            $result = mysqli_query($con,$sql);
            if($result){
                //header('location:brands.php');
                ?>
                <script>
                    location.replace("brands.php");
                </script>
                <?php
            }else{
                die(mysqli_error($con));
            }
        }
        ?>
        <div class="brand-container-2">
            <h2>Create a Brand</h2>
            <form action="" method="POST">
                <div>
                    <label for="brand"> Brand Name</label>
                    <input type="text" name ="brand" valye="Enter brand name"><br>
                    
                </div>
                <button type="submit" class="btn-1" name="submit">Create</button>
            </form>
        </div>
        <!--------------------------------------------->
       </div>
    </div>
    <br><br><br>
</body>
</html>
