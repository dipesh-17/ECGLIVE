<?php
// session_start();
// if (isset($_SESSION["fname"]) || isset($_SESSION["userid"])) {
//   header("location:reports.php");
// }

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
  <title>Medical Reports- Online Consultation</title>

  <style>
    .cascading-right {
      margin-right: -50px;
    }
    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }

    
.cat_btn {
    height: 50px;
    background: #777777;
    background: linear-gradient(45deg, #ececec, #ffcd02b3);
    border-radius: 11px;
    padding: 5px 25px;
    font-size: 30px;
    font-family: serif;
    font-weight: bolder;
    color: black;
    line-height: 42px;
    margin: 5%;
    max-width: 300px;
}

.btn_img {
    height: 100%;
    margin-right: 10%;
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
            <center><h2 class="fw-bold mb-5">Select Test Catagory</h2></center>
            <center><a href="upload_ecg.php"><div class='cat_btn'><img class='btn_img' src='assets/images/heart-center.png'>ECG Test</div></a></center>
            <center><a href="blood_test.php"><div class='cat_btn'><img class='btn_img' src='assets/images/blood_test.png'>Blood Test</div></a></center>
            
          </div>
        </div>
      </div>
    </div>
  </div>    
  
<?php
  require './inc/footer.php';
?>


