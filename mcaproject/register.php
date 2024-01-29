<?php
session_start();
if (isset($_SESSION["fname"]) || isset($_SESSION["userid"])) {
  header("location:reports.php");
}

// require './inc/top.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
  <!-- Bootstrap 5 CDN Link -->
  <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/styles/style.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/footer.css" class="stylesheet">
  <!-- <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css"> -->
  <title>ECGLive.com | Create Account</title>

  <style>
    .cascading-right {
      margin-right: -50px;
    }
    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>
</head>
<body>

<?php
require './inc/header.php';
?>
  <div class="container">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 col-md-9 mx-auto mb-5 mb-lg-0">
        <div class="card cascading-right" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
          <div class="card-body p-5 shadow-5">
            <h2 class="fw-bold mb-5">Sign Up</h2>
            <form action="" method="POST" id="registration_form">
              <div id="form_error"></div>
              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-outline">
                    <label for="fmane">First Name</label>
                    <input type="text" id="fname" class="form-control" name="fname" placeholder="First name" minlength="3" />
                    <small id="error_fname"></small>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-outline">
                  <label for="lmane">Last Name</label>
                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" minlength="3" />
                    <small id="error_lname"></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mt-1 mb-1">
                  Gender:
                  <input class="form-check-input" type="radio" name="gender" value="Male" id="" required>
                  <label class="form-check-label" for="gender" >
                    Male
                  </label>
                  <input class="form-check-input pr-4" type="radio" name="gender" value="Female" id="" required>
                  <label class="form-check-label" for="gender" >
                    Female
                  </label>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-outline mb-2">
                  <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth" />
                    <small id="error_dob"></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-outline mb-2">
                    <label for="phone">Phone No.</label>            
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone No." minlength="10"/>
                    <small id="error_phone"></small>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-outline mb-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email ID" minlength="10" />
                    <small id="error_email"></small>
                  </div>
                </div>              
              </div>
              <div class="form-outline mb-2">
              <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" minlength="6" />
                <small id="error_password"></small>
              </div>
              <div class="form-outline mb-2">
              <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Confirm Password" minlength="6" />
                <small id="error_confirm-password"></small>
                <p id="messege"></p>
              </div>
              <div class="form-check d-flex mb-2">
                <input class="form-check-input me-2" type="checkbox" value="" id="tandc" name="tandc" />
                <label class="form-check-label" for="terms and conditions">
                  I accept all <a href="#">terms and conditions</a>
                </label>
              </div>
              <small id="error_tc"></small>
              <input type="submit" class="btn-custom btn-w-full" name="register-patient" id="register-patient" value="Register">
              <div class="forward-link">
                <p>Already have an Account <a href="login.php"><i>Login Here</i></a> </p> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>    
  <script src="assets/scripts/formvalidations.js"></script>  
<?php
  require './inc/footer.php';
?>


