<?php
session_start();
include 'assets/connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFile/style.css">
    <link rel="stylesheet" href="cssFile/about.css">
    
    <link rel="stylesheet" href="cssFile/footer.css">
    <link rel="stylesheet" href="cssFile/register.css">
    <link rel="stylesheet" href="cssFile/login.css">
    <link rel="stylesheet" href="cssFile/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact us</title>
</head>
<style>
    span{
        color:red;
    }
    span p{
        margin-top:5px;
    }
</style>
<?php
  //==for testing the input data==//
  function test_input($data){
    $data = trim($data); //space 
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

        $name_err = $email_err = $phone_err = NULL;
        $name = $email = $phone =NULL;
        $flag = true;
      if(isset($_POST['submit'])){

       
        //name validation//
        if(empty($_POST['name'])){
            $name_err = "Name is required";
            $flag = false;
        }else{
            $name = test_input($_POST['name']);
        }
        //email validation//
        if(empty($_POST['email'])){
            $email_err = "Email is required";
            $flag = false;
        }else{
            $email = test_input($_POST['email']);
        }
        
        //phone validation//
        if(empty($_POST['phone'])){
            $phone_err = "Phone number is required";
            $flag = false;
        }else{
            $phone = test_input($_POST['phone']);
        }

        $message = test_input($_POST['message']);
 
        //submit form if validate successfully
        if($flag){
        $sql ="INSERT into contact_from_user(name,email,phone,message) values('$name','$email','$phone','$message')";
        $result= mysqli_query($con,$sql);
        if($result)
        {
            ?>
            <script>
                alert("Successfully Sent");
            </script>
            <?php
        }else{
            die(mysqli_error($con));
        }
    }

      }


?>
<body>
<div>
        <!------------register.php------------------------->
        <?php // include('assets/register.php');  ?>
        <!------------------------------------------------->
    </div>
    <div>
        <!--------------login.php---------------------->

        <?php 
       // include('assets/login.php'); ?>
        <!--------------------------------------------->   
    </div>
    <div class="container-1-first1">
        <?php
        //<!-----------------------topHeader---------------------------->
              include('assets/topHeader.php');
       // <!---------------------------------------------------------->
       // <!---------------------Header---------------------------->
              include('assets/header.php');
       // <!-------------------------------------------------------->
        ?>
        <div class="content-head">

            <h1>Contact us</h1>
        </div>
        <div class="content-head-sub">
            <h3><a class="btn1" href="index.html">Home</a> > Contact us</h3>
        </div>
       </div>
       <!----====================Container   contact us==================-->
      <div class="contactus-container">
        <div class="contactus-container-leftside">
            <div class="leftside-head">
                <h2>Get in touch using the form below</h2>
            </div>
            <div class="leftside-form-content">
               
                <form action="" method="POST" >
                 <div class="leftside-form-content-sub">
                    <label for="name">Full Name <span id="required">*</span></label><br>
                    <input type="text" name="name" placeholder="">
                    <span><p><?php echo $name_err; ?></p></span>
                 </div>
                 <div class="leftside-form-content-sub">
                    <label for="email">Email Address <span id="required">*</span></label><br>
                    <input type="email" name="email" placeholder="">
                    <span><p><?php echo $email_err; ?></p></span>
                 </div>
                 <div class="leftside-form-content-sub">
                    <label for="name">Phone Number <span id="required">*</span></label><br>
                    <input type="text" name="phone" placeholder="">
                    <span><p><?php echo $phone_err; ?></p></span>
                 </div>
                <!-- <div class="leftside-form-content-sub">
                    <label for="message">Message</label><br>
                    <input id="messageBox" type="text" name="message">
                 </div>-->
                 <div class="leftside-form-content-sub">
                 <label for="message">Message</label><br>
                 <textarea type="textarea" name="message" required style="width:400px; height:100px; outline:none; padding:10px; border:1px solid rgb(216, 206, 206); color:#000;margin-top:8px;font-size: 1.2rem;">
                     </textarea>
                 </div>
                 
                 <div class="leftside-form-content-sub">
                    <button type="submit"class="btn-p" name="submit">Send Message <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>
                 </div>
                 </form>
            
            </div>
        </div>
        <!-----===============Right side div=========-->
      
        <div class="contactus-container-rightside">
            <div class="rightside-head">
                <h2>Contact Info</h2>
                <div class="rightside-contact-content">
                    <div>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p> Itahari, Nepal</p>
                    </div>
                    <div>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p>9811041929</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p>vehicleRental@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
<!------------====================Footer==================-->
        <?php include('assets/footer.php');   ?>
<!---------------------------------------------------------->
</body>
</html>