<?php
session_start();
if (!isset($_SESSION["fname"]) || !isset($_SESSION['userid'])) {
  header("location:login.php");
}  

require './inc/top.php';
require './inc/header.php'; 

  $userid=$_SESSION['userid'];
  $sql = "SELECT * from qwert_ecgs where userid='$userid' ORDER BY create_date DESC";
  $result = mysqli_query($conn, $sql); 
  ?>

<div class="container1">
  <?php
  if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
    $cdate = $rows['create_date'];
    $date = strtotime($cdate);
    $date = date('d/m/y', $date);
    $dtid=$rows['assign_dt'];
    $sql = "SELECT fname, lname from qwert_doctors where dtid='$dtid'";
    $result1 = mysqli_query($conn, $sql);
    $dtdata = mysqli_fetch_assoc($result1);

    ?>  
      
  <div class="card cardcustom">
        <?php
          if ($rows['status']=="Pending For payment") {
            $bgcolor="#ff8787cc";//red
            $dtdata['fname']="--";
          
          } elseif ($rows['status']=="Submitted For Review") {
            $bgcolor="#ffe087";//orange
            $dtdata['fname']="--";
            
          }else {
            $bgcolor="#adff87d1";//green
            
          }     
        ?>

      <div class="card-header row" style="background:<?php echo $bgcolor; ?>;">
        <div class="col-7 col-md-9">
          <p>Submitted On: <?php echo $date;//$rows['create_date']; ?></p>
        </div>
        <div class="col-5 col-md-3">
          <p class="card-subtitle mb-2 text-muted" style="font-style: italic;">Reviewed By : Dr. <?php echo $dtdata['fname'];?> <?php //echo $dtdata['lname'];?></p>
        </div>       
      </div>
      <div class="row p-2">
        <div class="col-8 col-md-9">
          <p><?php echo $rows['status']; ?></p>
        </div>
        <div class="col-4 col-md-3">
          <p class="card-subtitle mb-2 text-muted">*</p>
        </div>
      </div>
      <div class="row py-2">        
          <div class="col-4 col-lg-5">
          <?php //echo $rows['sug2']; ?>
          </div>
          <div class="col-2 col-lg-3">
          </div>
          <div class="col-3 col-lg-2">
            <?php
            if ($rows['status']=="Pending For payment") {
              ?>
                <a href="plans.php?ecgid=<?php echo $rows['ecgid'];?>" class="btn btn-success btn-sm">Pay Now</a>
              <?php              
            }else {
              ?>
                <a href="view_report.php?ecgid=<?php echo $rows['ecgid'];?>" class="btn btn-success btn-sm">View</a>
              <?php              
            }
            ?>
          </div>
          <div class="col-3 col-lg-2">          
            <input type="hidden" class="delete_report_value" value="<?php echo $rows['ecgid']; ?>" >
            <a href="javascript:void(0)" class="delete_report btn btn-danger btn-sm"> Delete</a>          
          </div>        
      </div>    
  </div>

  <?php
    }
  }else {
    ?>
    <div class="card not-found">
      <h4>No record found</h4>    
  </div>
  <?php
  }
  ?>  
   <br><h3><FONT COLOR=WHITE><b>Note : Your request has been forwarded to doctor once it's 
    reviewed you can get report by clicking 'VIEW'</b></FONT></h3>
</div>
<?php
require './inc/footer.php';
global $id;

function reviewedby($id){

  require 'inc/dbconn.php';
  $sql = "SELECT * from qwert_doctors where dtid='$id'";
  $result = mysqli_query($conn, $sql);
 
    while ($rows = mysqli_fetch_assoc($result)) {
        $doctorName = $rows['name'];
    }
    return $doctorName;
}
?>

<script>
$(document).ready(function(){

  // Delete 
  $('.delete_report').click(function(e){
    e.preventDefault();
    // Delete id
    var reportid = $(this).closest("div").find('.delete_report_value').val();
    swal({
      title: "Are you sure?",
      text: "You can not get back this report!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
     if(willDelete){
       // AJAX Request
       $.ajax({
         url: 'delete_report.php',
         type: 'POST',
         data: { 
           "delete_btn_set":1,
           "report_id": reportid,
           },
         success: function(response){
            swal("Report has been deleted!", {
              icon: "success",
              timer:1500,
              buttons: false,
            })
            .then((result)=>{
              location.reload();
     
            });
          }          

        })
      }

    }) 
  });
});
</script>

