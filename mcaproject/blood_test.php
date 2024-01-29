<?php
session_start();
if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
    header("location:login.php");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/styles/style.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/footer.css" class="stylesheet">
  <link rel="stylesheet" href="./assets/styles/addecg.css" class="stylesheet">
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
<!-- ./inc/functions.php -->
<div class="page">
<!-- <div class="col-lg-3 sidenav1">
    <h2>poster</h2>
</div> -->
<div class="form-container col-9 col-lg-9">
        <form action="" id="addecg" method="post" enctype="multipart/form-data">
            <fieldset id="form1">
                <div class="fieldset-content">
                    <div class="form-row" id="pdfups">
                            <p><strong> Upload PDF file</strong></p>
                        <div class="input-group mb-3 col-sm-12 col-lg-8">                            
                            <input type="file" class="-input gray-400" name="ecgpdf" id="ecgpdf" accept="application/pdf, application/vnd.ms-excel">
                                                                     
                        </div>
                    </div>
                    <hr><h6 class="text-center">OR</h6><hr>                   

                    <div class="form-row" id="imagesups">                          
                        <p><strong>Upload Report Images</strong></p>
                        <div class="input-group mb-3 col-sm-12 col-lg-8">                             
                            <div class="img-input-box">
                                <div class="imgs">
                                    <input type="text" name="image1" hidden id="image1">
                                    <button type = "button" class = "btn-warning">
                                    <i class = "fa fa-upload"></i>Select Image 1
                                        <input type="file" name="ecgimage1" id="ecgimage1" onchange="loadImageFile('image1');" accept="image/*">
                                    </button>
                                    <div class="preview" id="previewecgimage1"><button>Delete</button></div>
                                </div>

                                <div class="imgs">
                                    <input type="text" name="image2" hidden id="image2">
                                    <button type = "button" class = "btn-warning">
                                    <i class = "fa fa-upload"></i>Select Image 2
                                        <input type="file" name="ecgimage2" id="ecgimage2" onchange="loadImageFile('image2');" accept="image/*">
                                    </button>
                                    <div class="preview" id="previewecgimage2"><button>Delete</button></div>
                                </div>

                                <div class="imgs">
                                    <input type="text" name="image3" hidden id="image3">
                                    <button type = "button" class = "btn-warning">
                                    <i class = "fa fa-upload"></i>Select Image 3
                                        <input type="file" name="ecgimage3" id="ecgimage3" onchange="loadImageFile('image3');" accept="image/*">
                                    </button>
                                    <div class="preview" id="previewecgimage3"><button>Delete</button></div>
                                </div>                                
                            </div>                            
                        </div>
                    </div>            
                </div>
                <div class="fieldset-footer">
                    <span class="pull-left">Step 1 of 2</span>
                    <div class="form-btns">
                        <button class="nxt-btn f1pg buttoncustom" type="button" id="next1">Next</button>
                    </div>                    
                </div>
            </fieldset>
            <fieldset id="form2">
            <div class="fieldset-content">
                <h6 class="text-center">Add some extra information</h6><hr>
                    <div class="form-group">
                        <label for="ecgdate" class="cblabel">Test date</label>
                        <input type="date" name="ecgdate" id="ecgdate" class="date" placeholder="" />
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <p><b>Symptoms :</b></p>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="symptoms" value="Chest Pain" name="symptoms[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Chest Pain</label>
                        </div>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="symptoms" value="Breathing difficulty" name="symptoms[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Breathing difficulty</label>
                        </div>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox"  id="symptoms"value="Dizziness" name="symptoms[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Dizziness</label>
                        </div>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="symptoms" value="Palpitation" name="symptoms[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Palpitation</label>
                        </div>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="symptoms" value="Vomiting" name="symptoms[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Vomiting</label>
                        </div>
                    </div>
                    <div class="col-6">
                         <p><b>Previous illness :</b></p>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="pre_illness" value="Hypertension" name="pre_illness[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Hypertension</label>
                        </div>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="pre_illness" value="Diabetes" name="pre_illness[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Diabetes</label>
                        </div>
                        <div class="form-check col-4 col-md-8">
                            <input class="form-check-input" type="checkbox" id="pre_illness" value="Cardiac illness" name="pre_illness[]">
                            <label class="form-check-label form-label cblabel" for="flexCheckDefault">Previous Cardiac illness</label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="fieldset-footer">
                    <span class="pull-left">Step 2 of 2</span>
                    <div class="form-btns">
                        <button class="nxt-btn buttoncustom" type="button" id="back1">Back</button>
                        <input type="button" class="nxt-btn1 buttoncustom" type="submit" id="submitbtn" name="reportecg" value="Submit"></button>
                    </div>
                </div>
            </fieldset>
        </form>
        <div class="step-row">
            <div id="progress"></div>
            <div class="step-col hzl"><small>Upload Files</small></div>
            <div class="step-col"><small>Test Information</small></div> 
        </div>
    </div>
</div>
    <script type="text/javascript" src="assets/scripts/ecgupload.js"></script>
    <script type="text/javascript" src="assets/scripts/image-resize.min.js"></script>
<?php
    require './inc/formscript.php';
    require './inc/footer.php';
?>



