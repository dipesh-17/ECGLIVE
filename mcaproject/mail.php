<?php
include('smtp/PHPMailerAutoload.php');
$body='<h1>Welcome to ecglive.com </h1>';
smtp_mailer('tondeavi@gmail.com','T787978ail',$body);
function smtp_mailer($to,$subject, $body){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.zoho.in";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "support@ecglive.com";
	$mail->Password = "Enter Password";
	$mail->SetFrom("support@ecglive.com", "ECGLive.com");
	$mail->Subject = $subject;
	$mail->Body =$body;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>