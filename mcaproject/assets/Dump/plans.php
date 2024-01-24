<?php
session_start();

require './inc/top.php';
require './inc/header.php';
$_SESSION['ins_ecgid']=$_GET['ecgid'];  
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<main class="mainbg">
  <div class="container">
      <br>
      <h4 class="text-center">Select Plan to proceed</h4>
      <hr>
      <div class="row bnm">
      <u><h2 class="section-title pb-2">Plans</h2></u> 
        <div class="col-lg-4 col-md-6 col-sm-6 mb-4 pcardw">
          <div class=" pcard h-100 card_bs">
            <div class=" pcard-body">
              <div class="text-center p-3">
                <h5 class=" pcard-title">Basic</h5>
                <span class="h2">₹19</span>/Report                
              </div>
              <p class=" pcard-text text-center" >Pay for the single report </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> 1 ECG Review</li>
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg> Free Cunsaltation</li>
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg>Report PDF</li>
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
              </svg>Review in 15 Min</li>
            </ul>
            <div class=" pcard-body text-center">
            <form>
              <input type="button" class="btn btn-outline-warning btn-md" style="border-radius:30px" name="btn" id="btn" value="Buy Now" onclick="pay_now(19,19)"/>
       
            </form>     
            </div>
          </div>
        </div>
			 <div class="col-lg-4 col-md-6 col-sm-6 mb-4 pcardw">
          <div class=" pcard h-100 card_bs">
            <div class=" pcard-body">
              <div class="text-center p-3">
                <h5 class=" pcard-title">Standard</h5>              
             
                <span class="h2">₹199</span>/Year 
                
              </div>
              <p class=" pcard-text text-center">Yearly Plan with 12 ECG Reviews</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> 12 ECG Review</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Free Cunsaltation</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg>Report PDF</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg>Review in 15 Min</li>
            </ul>
            <div class=" pcard-body text-center"> 
              <form>
                <input type="button" class="btn btn-outline-warning btn-md" style="border-radius:30px" name="btn" id="btn" value="Buy Now" onclick="pay_now(199,199)"/>
              </form>             
            </div>
          </div>
        </div>
      </div>
  </div>
</main>
<script>
    function pay_now(amt, plan_id){
     jQuery.ajax({
           type:'post',
           url:'process_report_pay.php',
           data:"amt="+amt+"&plan_id="+plan_id,
           success:function(result){
               
               var options = {
                    "key": "rzp_live_sBsRZ5I9z49XI0", 
                    "amount": amt*100, 
                    "currency": "INR",
                    "name": "ECGLive.com",
                    "description": "Yearly Plan Subscription",
                    "image": "https://ecglive.com/assets/shared/ecglive_logo_blackbg.png",
                    "handler": function (response){
                       jQuery.ajax({
                           type:'post',
                           url:'process_report_pay.php',
                           data:"payment_id="+response.razorpay_payment_id+"&plan_id="+plan_id,
                           success:function(result){
                               window.location.href="reports.php";
                               
                           }
                       });
                    },                        
               
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp1 = new Razorpay(options);

                rzp1.open();
                rzp1.on('payment.failed', function (response){
                    jQuery.ajax({
                           type:'post',
                           url:'process_report_pay.php',
                           data:"failedpayment_id="+response.error.reason,
                       });
                 });
           }
       });   
    
}
</script>

<?php
require './inc/footer.php';
?>