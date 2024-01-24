<?php
session_start();
require_once('inc/dbconn.php');
require_once('inc/userfunctions.php');
include('smtp/PHPMailerAutoload.php');

if(isset($_POST['amt']) && isset($_POST['plan_id'])){
    $amt=$_POST['amt'];
    $plan_id=$_POST['plan_id'];
    $userid=$_SESSION['userid'];    
    $p_status="Pending"; 
    mysqli_query($conn,"insert into payment(userid,amount,p_status,plan_id) values('$userid','$amt','$p_status','$plan_id')");
    $_SESSION['OID']=mysqli_insert_id($conn);
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID']) && isset($_POST['plan_id'])){
    $payment_id=$_POST['payment_id'];
    $plan_id=$_POST['plan_id'];
    $userid=$_SESSION['userid'];
    $pl_s_date=date("d/m/Y");
    $pl_e_date=date('d/m/Y', strtotime('+1 year'));
    $tr_id=$_SESSION['OID'];
    
    
    $p_result=mysqli_query($conn,"update payment set p_status='complete',pay_id='$payment_id' where tr_id='".$_SESSION['OID']."'");
    if($p_result=== true) {
        $email=$_SESSION['email'];        
        $fname=$_SESSION['fname'];
        $date= date("d F Y");
        payment_rec_mail($email, $plan_id, $fname, $date);               
    }    
    // Update plans in db
    if ($plan_id==19) {
        mysqli_query($conn,"insert into pl_basic9(userid,transaction_id,rp_allow,pl_status,pl_s_date) values('$userid','$tr_id', 1, 0,'$pl_s_date')");
        if(isset($_SESSION['ins_ecgid'])){
            $q_result =mysqli_query($conn,"update qwert_ecgs set status='Submitted For Review' where ecgid='".$_SESSION['ins_ecgid']."' and userid='".$_SESSION['userid']."'");
			if($q_result=== true) {
				$email=$_SESSION['email'];
				$ecg_id=$_SESSION['ins_ecgid'];
				ecg_rev_mail($email);
				notify_dr_mail($ecg_id);       
			}
        }
    }    
    if ($plan_id==199) {
        mysqli_query($conn,"insert into pl_premium99(userid,transaction_id,rp_allow,rem_rp,pl_s_date,pl_e_date,pl_status) values('$userid','$tr_id', 12,11, '$pl_s_date', '$pl_e_date',1)");
        if(isset($_SESSION['ins_ecgid'])){
            $q_result = mysqli_query($conn,"update qwert_ecgs set status='Submitted For Review' where ecgid='".$_SESSION['ins_ecgid']."' and userid='".$_SESSION['userid']."'");
            if($q_result=== true) {
				$email=$_SESSION['email'];
				$ecg_id=$_SESSION['ins_ecgid'];
				ecg_rev_mail($email);
				notify_dr_mail($ecg_id);       
			}
        }
    }

}

?>