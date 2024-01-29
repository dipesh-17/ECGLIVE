<?php
session_start();
if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
    header("location:login.php");
}  
require './inc/top.php';
require './inc/header.php';
?>
    <div class="profile-container">
        <?php
            $userid=$_SESSION["userid"];
            $sql = "SELECT * from qwert_users where userid='$userid'";
            $result = mysqli_query($conn, $sql);
            $u_data = mysqli_fetch_assoc($result);                     
                                    
        ?>
        <div class="container">
        <div class="row">
            <!-- ===== ===== User Main-Profile ===== ===== -->
            <section class="userProfile card col-0">
                <div class="profile">
                    <figure><img src="man.webp" alt="profile" width="250px" height="250px"></figure>
                </div>
            </section>
            <!-- ===== ===== User Details Sections ===== ===== -->
            <section class="userDetails card">
                <div class="userName">
                    <h1 class="name"><?php echo $u_data['first_name']; ?> <?php echo $u_data['last_name']; ?></h1>   
                </div>
                <!-- <div class="btns">
                    <ul>
                        <li class="sendMsg active">
                            <i class="ri-check-fill ri"></i>
                            <a href="#">Edit</a>
                        </li>

                    </ul>
                </div> -->
            </section>
        </div>

        <div class="row">
            <section class="ad_section card">
                <div class="work"></div>  
                <div class="skills"></div>
            </section>
            <!-- ===== ===== info & About Sections ===== ===== -->
            <section class="info_about card">
                <div class="tabs">
                    <ul>
                        <li class="info active">
                            <i class="ri-eye-fill ri"></i>
                            <span>Personal Information</span>
                        </li>
                        <!-- <li class="about ">
                            <i class="ri-user-3-fill ri"></i>
                            <span>About</span>
                        </li> -->
                    </ul>
                </div>

                <div class="contact_info">
                    <h1 class="heading">Contact Information</h1>
                    <ul>
                        <li class="phone">
                            <h1 class="label">Phone:</h1>
                            <span class="info">+91 <?php echo $u_data['phone']; ?></span>
                        </li>   

                        <li class="email">
                            <h1 class="label">E-mail:</h1>
                            <span class="info"><?php echo $u_data['email']; ?></span>
                        </li>

                        <li class="birthday">
                            <h1 class="label">Date Of Birth:</h1>
                            <span class="info"><?php echo $u_data['dob']; ?></span>
                        </li>

                        <li class="sex">
                            <h1 class="label">Gender:</h1>
                            <span class="info"><?php echo $u_data['gender']; ?></span>
                        </li>

                        <li class="address">
                            <h1 class="label">Address:</h1>
                            <span class="info"><?php echo $u_data['city']; ?>, <?php echo $u_data['country']; ?></span>
                        </li>
                    </ul>
                </div>

                <div class="basic_info">
                    <h1 class="heading">Active Plans</h1>
                    <?php
                        $sql = "SELECT * from pl_premium99 where userid='$userid' and pl_status=1";
                        $result = mysqli_query($conn, $sql);
                        $p_data = mysqli_fetch_assoc($result);
                        if (mysqli_num_rows($result) > 0) {                         
                    ?>
                    <ul>
                        <li class="birthday">
                            <h1 class="label">Enrolled Date:</h1>
                            <span class="info"><?php echo $p_data['pl_s_date']; ?></span>
                        </li>
                        <li class="sex">
                            <h1 class="label">Reports Remaining:</h1>
                            <span class="info"><?php echo $p_data['rem_rp']; ?></span>
                        </li>
                    </ul>
                    <?php
                        }else{
                            ?>
                                <h5 class="text-center">No Active plan!</h5>
                            <?php
                        }
                    ?>
                </div>
            </section>
        </div>
        </div>
    </div>   
<?php
  include('./inc/footer.php');
?>