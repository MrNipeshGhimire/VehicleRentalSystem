<?php
include('connect.php');
include('checkLogin.php');
//error_reporting(0);
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
            <h2>Manage Booking</h2>
            <table class="data-table">
                <tr class="data-table-row">
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Vehicle</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                
                    $sql = "SELECT * from booking_table";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['booking_id'];
                        $user_id = $row['user_id'];
                        $vehicleId = $row['vehicleId'];
                        $fromDate = $row['fromDate'];
                        $toDate = $row['toDate'];
                        $message = $row['message'];
                        $status = $row['status'];
                        $vehicleType = $row['vehicleType'];

                       // ======for accessing userName through userEmail=====//
                       $sql1 = "SELECT FullName from tblusers where user_id ='$user_id' ";
                       $accessName = mysqli_query($con,$sql1);
                       $row1=mysqli_fetch_assoc($accessName);
                       $userName = $row1['FullName'];  
                       
                       //======for accessing vehicleName with the help of vehicleId==//
                       if($vehicleType=='car'){
                        $sqlcar = "SELECT Name from car_bike_table where vehicle_id='$vehicleId' ";
                        $resultCar = mysqli_query($con,$sqlcar);
                        $rowCar = mysqli_fetch_assoc($resultCar);
                        $vehicleName = $rowCar['Name'];
                       }else{
                        $sqlBike = "SELECT Name from car_bike_table where vehicle_id='$vehicleId' ";
                        $resultBike = mysqli_query($con,$sqlBike);
                        $rowBike = mysqli_fetch_assoc($resultBike);
                        $vehicleName = $rowBike['Name'];
                       }
 


               echo '
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$userName.'</td>
                    <td>'.$vehicleName.'</td>
                    <td>'.$fromDate.'</td>
                    <td>'.$toDate.'</td>
                    <td>'.$message.'</td>
                    <td>'.$status.'</td>
                    <td style="display:flex" >
                        <button type="submit" name="confirm" class="btn-1"><a href="confirm-booking.php?cid='.$id.'">Confirm</a></button>
                        <button class="btn-2"><a href="cancel-booking.php?cid='.$id.'">Cancel</a></button>
                    </td>
                </tr>
                ';
                    }
                ?>
                
            </table>
        </div>
       
    </div>
    </div>
</body>
<script>
    function clickFunction()
    {
        return Confirmed;
    }
</script>
</html>
