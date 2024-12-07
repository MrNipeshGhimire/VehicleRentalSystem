<?php
         
         include("connect.php");
         if(isset($_POST['submit2'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];

         //verifying the unique email//
         

       //  $verify_query = mysqli_query($con,"SELECT EmailId FROM tblusers WHERE EmailId='$email'");
         $sql = "SELECT EmailId from tblusers WHERE EmailId = '$email' ";
         $result = mysqli_query($con,$sql);

         if(mysqli_num_rows($result) !=0 ){
            ?>
            <script>
               alert("This email is used, Try another One !!")
            </script>
                    <?php
         }
         else{

            mysqli_query($con,"INSERT INTO tblusers(FullName,EmailId,Password,ContactNo) VALUES('$username','$email','$password','$phone')") or die("Error Occured");

          /*  echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";  */
            ?>
            <script>
                alert("Registration Successful");
            </script>
            <?php
         }

         }
         
        ?> 
    <div class="overlay1" onclick="closeModal1()"></div>
    <div class="login-form1" id="registerForm1">
        <span onclick="closeModal1()">&times;</span>
        <h2>Register Now</h2>
        <form action="" method="POST">
           <div class="login-form-box1">
              <label for="">Username</label>
              <input type="text" name="username" required>
           </div>
           <div class="login-form-box1">
            <label for="">Email</label>
            <input type="text" name="email" required>
         </div>
         <div class="login-form-box1">
            <label for="">Password</label>
            <input type="text" name="password" required>
         </div>
           <div class="login-form-box1">
            <label for="">Phone</label>
            <input type="phone" name="phone" required>
         </div>
         <button type="submit" name="submit2" class="btn-login">Register</button>
         <div class="dont_have_account_box1">
         <!--<p>Already a member?</p><a href="assets/login.php">Login</a>-->
       
        </div>
        </form>
    </div>

    <script>
    function showModal1(){
        document.querySelector('.overlay1').classList.add('showoverlay1');
        document.querySelector('.login-form1').classList.add('showloginform1');
    }
    function closeModal1(){
        document.querySelector('.overlay1').classList.remove('showoverlay1');
        document.querySelector('.login-form1').classList.remove('showloginform1');
    }
   </script>