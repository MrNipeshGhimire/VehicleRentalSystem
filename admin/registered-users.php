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
    <?php include('header-top.php'); include('checkLogin.php');  ?>
    <div class="dashboard-container"> 
    <?php  include('header-left.php');    ?>
       <div class="dashboard-container-right">  <!-- style.css -->
         <!---------------container-1=========-->
         <div class="data-container">
         <div class="data-container-1">
            <h2>Registered Users</h2>
            <table class="data-table">
                
                <tr class="data-table-row">
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Reg. Date</th>
                </tr>
                <!--=========PHP for Registered Users======-->
                <?php
                include 'connect.php';
                $sql = "SELECT * from tblusers ";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $sn = $row['user_id'];
                    $name= $row['FullName'];
                    $email = $row['EmailId'];
                    $contact = $row['ContactNo'];
                    $dob = $row['dob'];
                    $address = $row['Address'];
                    $country = $row['Country'];
                    $reg = $row['RegDate'];

                echo '
                <tr>
                    <td>'.$sn.'</td>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$contact.'</td>
                    <td>'.$dob.'</td>
                    <td>'.$address.'</td>
                    <td>'.$country.'</td>
                    <td>'.$reg.'</td>
                    
                </tr>
                ';
                 }?>
            </table>
        </div>
       
    </div>
    </div>
</body>
</html>
