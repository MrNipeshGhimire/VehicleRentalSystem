<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="adminLogin.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>

<?php
include 'connect.php';
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    //checking user is admin or not 
    $sql = "SELECT EmailId, userRole from tblusers WHERE EmailId='$email' AND userRole='admin'";
    $result= mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1){
        $sql1 = "SELECT user_id,EmailId, password from tblusers WHERE EmailId='$email' AND password = '$password'";
        $result1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
       if(mysqli_num_rows($result1)==1){
        
            session_start();
           $_SESSION['EMAILID']=$row1['EmailId'];
            $_SESSION['USERID']==$row1['id'];
            
            ?>
            <script>
                location.replace('dashboard.php');
            </script>
            <?php
            
       }else{
        ?>
            <script>
               alert('Incorrect Password');
            </script>
            <?php
       }
    }else{
        ?>
        <script>
            alert("You are not System's Admin");
        </script>
        <?php
    }

  }


?>

<div class="login-form" id="loginForm">  
        <h2>Admin Login</h2>
        <form action="" method="POST">
           <div class="login-form-box">
              <label for="">Email</label>
              <input type="email" name="email" required>
           </div>
           <div class="login-form-box">
            <label for="">Password</label>
            <input type="password" name="password">
         </div>
         <button type="submit" name="submit" class="btn-login">Login</button>
         
        </form>
    </div>
</body>
</html>