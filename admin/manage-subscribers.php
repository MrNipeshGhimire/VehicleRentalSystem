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
       <div class="dashboard-container-right">  <!-- style.css -->
         <!---------------container-1=========-->
         <div class="data-container">
         <div class="data-container-1">
            <h2>Manage Subscribers</h2>
            <table class="data-table">
                <tr class="data-table-row">
                    <th>S.N</th>
                    <th>Email ID</th>
                    <th>Subscription Date</th>
                    
                </tr>
                <?php  
                $sql = "SELECT * from tblsubscribers";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $name =$row['SubscriberEmail'];
                    $date =$row['subscribeDate'];
                    echo '
                <tr>
                    <td>'.$id.'</td>    
                    <td>'.$name.'</td>
                    <td>'.$date.'</td> 
                </tr>
                ';
                }?>
                
            </table>
        </div>
       
    </div>
    </div>
</body>
</html>
