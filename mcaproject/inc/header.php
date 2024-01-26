<header class="primary-header flex">
  <div>
    <a href="https://ecglive.com"><img src="assets/shared/ecglogo.png" alt="ECGlive.com -logo" class="logo" /></a>
  </div>
  <button type="button" class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
    <span class="sr-only">Menu</span>
  </button>
  <nav>
    <ul id="primary-navigation" class="primary-navigation underline-indicators flex">
     
        <a href="index.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"><li> Home</li></a>
  
        <!-- <a href="upload_ecg.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"><li> Upload ECG</li></a> -->
<!--active-->
        <a href="reports.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"><li> Reports</li></a>      
      
         <!-- <a href="https://blog.ecglive.com" target="blank" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2">
        <li>Blog</li></a>   -->
      <?php
        if(!isset($_SESSION['fname'])){
      ?>    
        <a href="login.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"> <li> Login</li></a>
        <a href="register.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"> <li> Sign Up</li></a>
      <?php
        }else{
      ?>
              <a href="profile.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"> 
        <li>My Profile</li></a>   
        <a href="logout.php" class="ff-sans-cond uppercase text-white fs-300 letter-spacing-2"> <li> Logout</li></a>
     
      <?php } ?>
    </ul>
  </nav>
</header>