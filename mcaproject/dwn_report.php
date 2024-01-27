<?php 
session_start();
if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
  header("location:login.php");
}
?>

<?php
  require 'inc/dbconn.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
  <!-- Bootstrap 5 CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/styles/style.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/footer.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/pdf.css" class="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
  <title>ECGLive.com | Download Report</title>
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
    <h6 style="color: white; text-align: center;">* If report is not properly visible, Download and open pdf file *</h6>
    <div class="report-container" id="report">
        <?php
            $userid=$_SESSION["userid"];

            $ecg_id = $_GET['ecgid'];
            $sql = "SELECT * from f_reports where ecgid='$ecg_id' and userid='$userid'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) < 1){
                header("location:reports.php");
            }           
          
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $userid=$rows['userid'];
                    $sql1 = "SELECT first_name, last_name, gender, dob, phone, city from qwert_users where userid='$userid'";
                    $result1 = mysqli_query($conn, $sql1);
                        $dtid=$rows['createdby'];
                        $sql = "SELECT fname, lname, qualification, spe, reg_no from qwert_doctors where dtid='$dtid'";
                        $dtr = mysqli_query($conn, $sql);
                        $dtdata = mysqli_fetch_assoc($dtr);
                        $dtfname = $dtdata['fname'];
                        $dtlname = $dtdata['lname'];
                        $qual = $dtdata['qualification'];
                        $spe = $dtdata['spe'];
                        $dtreg_no = $dtdata['reg_no'];
                        
                    while ($userdata = mysqli_fetch_assoc($result1)) {
                        $fname = $userdata['first_name'];
                        $lname = $userdata['last_name'];
                        $gender = $userdata['gender'];
                        if ($gender=="Male") {
                            $gender="M";
                        } else {
                            $gender="F";
                        }                                        
                        $age = date_diff(date_create($userdata['dob']), date_create('now'))->y;
                        $phone = $userdata['phone'];
                        $city = $userdata['city'];
                    }
                }
            }
           
            $sql = "SELECT * from f_reports where ecgid='$ecg_id'";
            $result = mysqli_query($conn, $sql);
                while ($rdata = mysqli_fetch_assoc($result)) {
        ?>       
        <div class="brand-section">
            <div class="row">
                <div class="col-4 col-md-3">                   
                    <img class="report-logo" src="assets/shared/logo.png" alt="ECGLive.com">
                </div>
                <div class="col-4 col-md-6 header">
                    <h3 class="text-black r-heading">Provisional Report</h3>
                </div>
                <div class="col-4 col-md-3">
                    <div class="report-details">
                        <p class="text-black">Report ID: <?php echo $rdata['reportid']; ?></p>
                        <p class="text-black">Date: <?php echo $rdata['rev_date']; ?></p>                      
                    </div>
                </div>
            </div>
        </div>
        <div class="body-section">
            <div class="row">

                <div class="col-6 col-md-6">
                    <p class="">Patient Name: <?php echo $fname;?> <?php echo $lname;?></p>
                    <p class="">Gender/Age: <?php echo $gender;?>/<?php echo $age;?></p>
                    <p class="">Address: <?php echo $city;?></p>
                    <p class="">Contact no.: +91 <?php echo $phone;?></p>
                </div>

                <?php

                ?>
                <div class="col-1 col-md-3"></div>
                <div class="col-5 col-md-3"><h6>Report: <span class="status"><?php echo $rdata['impression']; ?></span></h6></div>
            </div>
            <hr>
            <h5 class="heading">Documentation: </h5>
            <h6 class="sub-point">Interpretation of ECG:</h6>
            <div class="row intr">
                <div class="col-12">
                    <p>- Rate- <?php echo $rdata['h_rate']; ?></p>
                    <p>- Rhythm <?php echo $rdata['rhytham']; ?></p>
                    <p>- Axis <?php echo $rdata['axis']; ?></p>
                    <p>- PR Interval- <?php echo $rdata['pr_inte']; ?></p>
                    <p>- QRS Complex- <?php echo $rdata['qrs_compl']; ?></p>
                    <p>- QT Interval- <?php echo $rdata['qt_inte']; ?></p>                    
                    <p>- ST Segment- <?php echo $rdata['st_seg']; ?></p>
                    <p>- T Waves- <?php echo $rdata['t_waves']; ?></p>
                </div>                
            </div>
            <h6 class="sub-point">Suggestions:</h6>
            <div class="row intr">
                <div class="col-12">
                    <?php
                        $sugs= array();
                        $sugs = explode(',',$rdata['sug']);
                        $count_sugs=count($sugs);

                        for ($i = 0; $i < $count_sugs; $i++) {
                                                                        
                        $sql = "SELECT * from qwert_suggestions where s_id=$sugs[$i]";
                        $result = mysqli_query($conn, $sql);
                        $sugdata = mysqli_fetch_assoc($result)        
                                                                        
                    ?>
                    <p><?php echo $i+1; ?>. <?php echo $sugdata['desc']; ?></p>

                    <?php } ?>
                    <p><?php echo (!$rdata['r_desc']=="") ? $i+1 : "" ; ?><?php echo ". " .$rdata['r_desc']; ?></p>
                    <!-- (isset($_POST['reg'])) ? $_POST['reg'] : die('Please enter your registration number'); -->
                </div>                
            </div>
            <br>
            <div class="dt-details">
                <hr>
                <div class="row flex">
                    <!-- <div class="">
                    </div> -->
                    <div class="dt-details">
                        <p>Dr. <?php echo $dtfname; ?> <?php echo $dtlname; ?><br>
                        <?php echo $qual; ?> <?php echo $spe; ?><br>
                        Reg. No.  <?php echo $dtreg_no; ?>
                        </p>            
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="body-section">
            <p>&copy; This is a provisional report on the basis of information provided by User.
                <a href="https://www.ecglive.com/" class="float-right">www.ecglive.com</a>
            </p>
        </div>     
    </div>
    <span class="floatbtn" id="download"><i class="fa fa-cloud-download my-floatbtn">  Download</i>  </span>    
    <script type="text/javascript" src="./assets/scripts/pdf.js"></script>
<?php require './inc/footer.php'; ?>
