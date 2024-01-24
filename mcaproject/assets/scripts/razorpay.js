

function pay_now(amt, plan_id){


     jQuery.ajax({
           type:'post',
           url:'process_payment.php',
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
                           url:'process_payment.php',
                           data:"payment_id="+response.razorpay_payment_id+"&plan_id="+plan_id,
                           success:function(result){
                               window.location.href="reports.php";
                               
                           }
                       });
                    },
                    "prefill": {
                        "email":""
                        
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp1 = new Razorpay(options);

                rzp1.open();
                rzp1.on('payment.failed', function (response){
                    // alert(response.error.code);
                    // alert(response.error.description);
                    // alert(response.error.source);
                    // alert(response.error.step);
                    // alert(response.error.reason);
                    // alert(response.error.metadata.order_id);
                    // alert(response.error.metadata.payment_id);
                    jQuery.ajax({
                           type:'post',
                           url:'process_payment.php',
                           data:"failedpayment_id="+response.error.reason,

                        //    success:function(result){
                        //        window.location.href="thank_you.php";
                        //    }
                       });
                 });
           }
       });
    
    
}