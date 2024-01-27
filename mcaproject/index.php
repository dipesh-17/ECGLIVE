
<?php
  require 'inc/dbconn.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
  <meta name="title" content="Online ECG Interpretation | ECG Reading | ECGLive.com">
  <meta name="description" content="Upload your ECG Photos or PDF on ecglive.com. Our Experts will analyze your ECG within 15 min  and provide report.">
  <meta name="keywords" content="Online ECG Interpretation, ECG reading, ecglive, ecglive.com, Experts advice on ecg, online second opinion on ecg">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
    <title>ECGLive.com | Experts advice on your ECG</title>
  <!-- Bootstrap 5 CDN Link -->
  <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/styles/style.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/footer.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/reviews.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/team.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/features.css" class="stylesheet">
  
  
  <link rel="apple-touch-icon" sizes="180x180" href="fevicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="fevicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="fevicon/favicon-16x16.png">
<link rel="manifest" href="fevicon/site.webmanifest">

   
  <style>
    .cascading-right {
      margin-right: -50px;
    }
    h2 {
    text-align: center;
    margin-bottom: 40px;
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
  session_start();
  require './inc/header.php';
?>
<div class="bgimg">


<section id="hero" class="d-flex align-items-center ">

  <div class="container ">
      
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Medical Reports-Online Consultation</h1>
          <h2>Experts advice on Medical Reports</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="select_report.php" class="btn-get-started scrollto">Submit Medical Report</a>            
          </div>
          
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/images/ECG-heart.svg" class="img-fluid animated" alt="">
       </div>
      </div>
  </div>
 
</section>
</div>
<main class="mainbg">
  <div class="container">

    <?php
      include('./inc/features.php');
       include('./inc/about.php');
       //include('./inc/team.php');
       //include('./inc/pricing.php');
       //include('./inc/customerreview.php');
    ?>

  </div>

</main>
<script async src="assets/scripts/razorpay.js"></script>
<script async src="https://checkout.razorpay.com/v1/checkout.js"></script>

<?php
require './inc/footer.php';
?>