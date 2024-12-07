<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title> Manage Contact us query</title>
</head>
<body>
    
    <?php include('header-top.php');  ?>
    <div class="dashboard-container"> 
    <?php  include('header-left.php');    ?>
       <div class="dashboard-container-right">  <!-- style.css -->
         <!---------------container-1=========-->
         <div class="data-container">
         <div class="data-container-1">
            <h2>Manage Customer Contact</h2>
            <table class="data-table">
                <tr class="data-table-row">
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Message</th>
                    <th>Posting Date</th>
                    
                </tr>
                <?php
                
                    $sql = "SELECT * from contact_from_user";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $message = $row['message'];
                        $postingDate = $row['postingDate'];
               echo '
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$phone.'</td>
                    <td><p>'.$message.'</p></td>
                    <td>'.$postingDate.'</td>
                </tr>
                ';
                    }
                ?>
                
            </table>
        </div>
       
    </div>
    </div>
</body>

</html>
