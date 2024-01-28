<?php
session_start();
if (isset($_SESSION["fname"]) || isset($_SESSION["userid"])) {
  header("location:upload_ecg.php");
}
// require './inc/top.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
  <meta name="title" content="Online ECG Interpretation | ECG Reading | ECGLive.com">
  <meta name="description" content="Upload your ECG Photos or PDF on ecglive.com. Our Experts will analyze your ECG within 15 min  and provide report.">
  <meta name="keywords" content="Online ECG Interpretation, ECG reading, ecglive, ecglive.com, Experts advice on ecg, online second opinion on ecg">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <title>ECGLive.com | Log In</title>

  <!-- Bootstrap 5 CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/styles/style.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/footer.css" class="stylesheet">
  <!-- <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css"> -->
  <title>ECGLive.com | Experts advice on your ECG</title>

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
<div class="container py-2">
  <div class="row g-0 align-items-center">
    <div class="col-lg-6 col-md-9 mx-auto mb-5 mb-lg-0">
      <div class="card cascading-right" style="
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
        <div class="card-body p-5 shadow-5">
          <h2 class="fw-bold mb-5">Log In</h2>
          <form method="POST" action="" id="login_form">
            <div id="form_error">
              <p id="error_email"></p>
              <p id="error_password"></p>
            </div>
            <div class="row justify-content-center">           

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label for="email">Email</label>
              <input type="email" id="login_email" name="login_email" class="form-control" placeholder="Email ID" required/>
            </div>
            <div class="form-outline mb-4">
            <label for="password">Password</label>
              <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Password" required/>
            </div>
            <input type="submit" class="btn-custom btn-w-full" name="patient_login" id="patient_login" value="Log In">
            <div class="forward-link">
              <p>Click here to <a href="register.php"><i>Create New Account</i></a> </p> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>

$("#patient_login").click(function (e) {

  $('#patient_login').val('Please wait...');
  $("#patient_login").attr('disabled', true);
  $.ajax({
    url: "loginaction.php",
    type: "POST",
    data: $('#login_form').serialize(),

    success: function (result) {      
      if (result) {
        swal("Login Successful", { 
          icon: "success",
          timer: 8000,
          buttons: false,
        })
        $('#login_form')['0'].reset();
        location.replace("upload_ecg.php");
      } 
      else {
        $('#form_error').text(result).css('display', 'block');        
      }
      // $('#login_form')['0'].reset();
      $('#patient_login').val('Log In');
      $("#patient_login").attr('disabled', false);
      // location.replace("upload_ecg.php");
    }
  }); 
});
</script>

<?php
require './inc/footer.php';
?>