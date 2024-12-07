<?php
include 'connect.php';
 
   if(isset($_POST['submit']))
   {
    $email= $_POST['email'];
    $password= $_POST['password'];

   $sql= "SELECT * from tblusers where EmailId='$email' and Password='$password' ";
    $result=mysqli_query($con, $sql);
    $row =mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
       
       $_SESSION['EMAILID']=$row['EmailId'];
       $_SESSION['USERID']==$row['user_id'];
        $_SESSION['username']= $row['FullName'];
               ?>
                <script>
                    location.replace("index.php");
                </script>     
                <?php
    }else{
        ?>
        <script>
            alert("Login Failed");
        </script>     
        <?php
    }
    
   }
   ?>

  
    <div class="overlay" onclick="closeModal()"></div>
    <div class="login-form" id="loginForm">
        <span onclick="closeModal()">&times;</span>
        <h2>Login</h2>
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
         <div class="dont_have_account_box">
            
        </div>
        </form>
    </div>
<script>
    function showModal(){
        document.querySelector('.overlay').classList.add('showoverlay');
        document.querySelector('.login-form').classList.add('showloginform');
    }
    function closeModal(){
        document.querySelector('.overlay').classList.remove('showoverlay');
        document.querySelector('.login-form').classList.remove('showloginform');
    }
</script>
