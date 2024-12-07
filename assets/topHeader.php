<!--=======topHeader.php ko CSS style.css ma xa=====-->
<!--=======CSS of button ==> footer.css-->
<?php
include('connect.php');

?>
        <div class="container-0">
            <div class="container-0-nav">
                <div class="container-0-nav-content-0">
                    <img src="cssFile/image/logo.png" alt="" width="70px">
                </div>
            </div>
    
            <div class="container-0-nav">
                
                <div class="icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="container-0-nav-content">
                    <h3>For Support Mail Us:</h3>
                    <p>vehicleRental@gmail.com</p>
                </div>
            </div>
    
            <div class="container-0-nav">
                <div class="icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="container-0-nav-content">
                    <h3>Service Helpline Contact Us:</h3>
                    <p>9811041929</p>
                </div>
            </div>

            <div class="container-0-nav" id="container-0-nav-id">
                <!--============for login box=======-->
                <button class="btn" id="active1" onclick="showModal()"><a href="# ">Login</a></button><!--====Login.css====-->
                <!--=======for register box========--->
                <button class="btn" id="active2" onclick="showModal1()"><a href="#">Register</a></button><!--======register.css====-->
            </div>
        </div>