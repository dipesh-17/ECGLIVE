<?php
session_start();
if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
  header("location:login.php");
}
require './inc/top.php';
require './inc/header.php'; 
?>
<div class="container report-s">
  <div class="xs-pd-20-10 pd-ltr-20">
    <?php
      $ecg_id = $_GET['ecgid'];
      $sql = "SELECT * from qwert_ecgs where ecgid='$ecg_id'";
      $result = mysqli_query($conn, $sql);
      while ($rows = mysqli_fetch_assoc($result)) {              
    ?>
    <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-20">
        <div class="pull-left">
          <h4 class="text-blue h4"><b>Submitted for Review</b><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-12 m-tb-10">
          <form>
            <div class="form-group">
            <h6 class="mb-20 h4">Date and Time</h6>
              <label><?php echo $rows['create_date']; ?></label>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-sm-12 m-tb-10">
          <div class="mb-20">
            <h6 class="mb-20 h4">Clinical Symptoms</h6>
            <?php 
              $sympt= array();
              $sympt = explode(',',$rows['symptoms']);
              $count_sympt=count($sympt);                                            
            ?>
            <?php for ($i = 0; $i < $count_sympt; $i++) { ?>
              <p><?php echo $sympt[$i]; ?>,</p>
            <?php } ?>          
          </div>
        </div>
        <div class="col-md-4 col-sm-12 m-tb-10">
          <div class="mb-20">
            <h6 class="mb-20 h4">Clinical Symptoms</h6>
            <?php 
              $preill= array();
              $preill = explode(',',$rows['pre_illness']);
              $count_preill=count($preill);                                            
            ?>
            <?php for ($i = 0; $i < $count_preill; $i++) { ?>
            <p><?php echo $preill[$i]; ?>,</p>
            <?php } ?>        
          </div>
        </div>
      </div>
      <div class="row mt-4 img_row">
        <?php 
          $imgurls= array();
          $imgurls = explode(',',$rows['images']);
          $count_imgurls=count($imgurls);                                                                                 
        ?>
        <div class="col-lg-8 col-md-12" id="ecgimages">
          <?php for ($i = 0; $i < $count_imgurls; $i++) { ?>
          <img src="Reports/Images/<?php echo $imgurls[$i]; ?>" alt="ECG Image <?php echo $i; ?>" class="" style="width: 28%; max-height: 150px;">

          <?php } ?>
        </div>    
                                            
          <div class="">
            <?php $pdf = $rows['pdf']; if (!$pdf=="") { ?>
                  <iframe src="Reports/pdf/<?php echo $rows['pdf']; ?>" width="100%" height="400px"></iframe>
            <?php }else { }                                                
        ?> 
                                        
      </div>                                          

      <div class="row mt-4">
        <?php
          if ($rows['status']=="Reviewed") {
            $disablelink=""; $bg="";          
          }else {
            $disablelink="isdisabled";
            $bg="gray";           
          }
        ?>
        <a href="dwn_report.php?ecgid=<?php echo $ecg_id;?>" class="<?php echo $disablelink; ?>" >
          <button type="button" class="btn btn-success mx-2" style="background:<?php echo $bg; ?>;">GET YOUR REPORT HERE!</button>
        </a>
      </div>
    </div>
    <?php } ?>
  </div>  
</div>
<?php require './inc/footer.php'; ?>
