<?php 
session_start();
	require_once('inc/dbconn.php');
	require_once('inc/userfunctions.php');
	require_once('./imageComp.php');
	include('smtp/PHPMailerAutoload.php');
	$date = (isset($_POST['ecgdate'])?$_POST['ecgdate']:'Today');
	$symptoms = (isset($_POST['symptoms'])?$_POST['symptoms']:' ');
	$pre_illness = (isset($_POST['pre_illness'])?$_POST['pre_illness']:' ');
	$pdf = "";
	if(isset($_FILES['ecgpdf'])){
		$file = $_FILES['ecgpdf'];
		$source_name = $file['name'];
		$ext = pathinfo($source_name, PATHINFO_EXTENSION);
		$tmpFileName = $file['tmp_name'];
		$saveName = time().uniqid().".".$ext;
		$pdf = save_pdf($tmpFileName, $saveName);
	} 
		$image1 = isset($_POST['image1'])?$_POST['image1']:'';
		$image2 = isset($_POST['image2'])?$_POST['image2']:'';
		$image3 = isset($_POST['image3'])?$_POST['image3']:'';
		$imageName1 = '';
		$imageName2 = '';
		$imageName3 = '';
    if(strlen($image1)!=0){
      $imageName1 = image_save($image1);   
    }
    if(strlen($image2)!=0){
      $imageName2 = image_save($image2);   
    }
    if(strlen($image3)!=0){
      $imageName3 = image_save($image3);   
    }
    function image_save($image){
        $uploadpath   = 'Reports/Images/';
        $parts        = explode(";base64,", $image);
        $imageparts   = explode("image/", @$parts[0]);
        $imagetype    = $imageparts[1];
        $imagebase64  = base64_decode($parts[1]);
        $file         = time().uniqid() . ".".$imagetype;
        file_put_contents($uploadpath . $file, $imagebase64);
        return $file;		
    }
	$images = $imageName1.','.$imageName2.','.$imageName3;
	$userid=$_SESSION['userid'];
	$test=1;
	$res = uploadecg($userid, $date, $symptoms, $pre_illness, $pdf, $images, $test);




	if($res){
		echo "Report Submitted For Review !";
	}else{
		echo "failed to Upload Report";
	}
















	// $pl_result=mysqli_query($conn,"SELECT * from pl_premium99 where userid='$userid' and rem_rp > 0 and pl_status=1");
	// $pl_result9=mysqli_query($conn,"SELECT * from pl_basic9 where userid='$userid' and  pl_status=1");

	// if (mysqli_num_rows($pl_result) > 0){
	// 	if($res){
	// 		echo "Report Submitted For Review !";
	// 	}else{
	// 		echo "failed to Upload Report";
	// 	}
	// 	$pl_data=mysqli_fetch_assoc($pl_result);
	// 	$rem_rp=$pl_data['rem_rp'];
	// 	$rem_rp=$rem_rp-1;
	// 	$id=$pl_data['id'];
	// 	$q_result = mysqli_query($conn,"update qwert_ecgs set status='Submitted For Review' where ecgid='".$_SESSION['ins_ecgid']."' and userid='".$_SESSION['userid']."'");
	// 		if($q_result=== true) {
	// 			$email=$_SESSION['email'];
	// 			$ecg_id=$_SESSION['ins_ecgid'];
	// 			ecg_rev_mail($email);
	// 			notify_dr_mail($ecg_id);       
	// 		}
	// 	mysqli_query($conn,"update pl_premium99 set rem_rp='$rem_rp' where id='$id'");
	// }elseif (mysqli_num_rows($pl_result9) > 0){
	// 	echo "ECG Submitted For Review !";
	// 	// $pl_result=mysqli_query($conn,"SELECT * from pl_basic9 where userid='$userid' and  pl_status=1");
	// 	if (mysqli_num_rows($pl_result9) > 0){
	// 		$pl_data=mysqli_fetch_assoc($pl_result9);
	// 		$id=$pl_data['id'];
	// 		$q_result = mysqli_query($conn,"update qwert_ecgs set status='Submitted For Review' where ecgid='".$_SESSION['ins_ecgid']."' and userid='".$_SESSION['userid']."'");
	// 		if($q_result=== true) {
	// 			$email=$_SESSION['email'];
	// 			$ecg_id=$_SESSION['ins_ecgid'];
	// 			ecg_rev_mail($email);
	// 			notify_dr_mail($ecg_id);       
	// 		}
	// 		mysqli_query($conn,"update pl_basic9 set pl_status= 0 where id='$id'");
	// 	}

	// }else {
	// 	echo "ECG Uploaded & Pending for Payment";
	// }
?>