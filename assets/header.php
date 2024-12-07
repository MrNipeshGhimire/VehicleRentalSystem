<!--======header.php ko CSS ==> style.css====-->
<!--=========================================-->
<nav id="navBar-second">
            <div class="logo-text">
                <h1>Yaa</h1>
                <h1 class="h1-color">Tra.</h1>
            </div>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Vehicle</a>
                    <div class="sub-menu1">
                        <ul>
                            <li><a href="Bike.php">Bike</a></li>
                            <li><a href="car.php">Car</a></li>
                            
                        </ul>
                    </div>
                </li>
                
                <li><a href="contact.php">Contact Us</a></li>
                <!--==============Check if user is logged in or not==========-->
                <!--=========================================================-->
                <?php 
                  if(strlen($_SESSION['EMAILID'])===0){
                  }else{
                 $userProfile = $_SESSION['username'];
                 $sql= "SELECT * FROM tblusers WHERE FullName='$userProfile' ";
                 $data= mysqli_query($con,$sql);
                 $result =mysqli_fetch_assoc($data);
                ?>
                <li><div id="user-profile-show-bar"><i class="fa fa-user" aria-hidden="true"> 
                    <?php echo''.$result['FullName'].'';?></i></div>
                    <div class="sub-menu1">
                        <ul>
                            <li><a href="myProfile.php">Profile Setting</a></li>
                            <li><a href="update_password.php">Update Password</a></li>
                            <li><a href="my_Bookings.php">My Booking</a></li>
                            <li><a href="./logout.php">Sign Out</a></li>
                        </ul>
                    </div>
                </li>
                <?php
                  }
                  ?>
                
                <!--<?php echo $_SESSION['username'];?>---this is need-->
            </ul>
        </nav>
        