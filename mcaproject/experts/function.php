<?php
include('smtp/PHPMailerAutoload.php');
    require 'inc/dbconn.php';
// save records into the database
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // isset($_POST['rate'];)isset($_POST['rhythm'];)isset($_POST['Axis'];)isset($_POST['pr'];)isset($_POST['qrs'];)isset($_POST['qt'];)isset($_POST['st'];)isset($_POST['tw'];)
    $rate =$_POST['rate'];
    $rhythm =$_POST['rhythm'];
    $Axis =$_POST['axis'];
    $pr =$_POST['pr'];
    $qrs =$_POST['qrs'];
    $qt =$_POST['qt'];
    $st =$_POST['st'];
    $tw =$_POST['tw'];
    $r_desc=$_POST['r_desc'];
    $sug=$_POST['sugg'];
    $status="1";
    $impression=$_POST['impression'];
    $dtid=$_POST['dtid'];
    $userid=$_POST['userid'];
    $ecgid=$_POST['ecgid'];
    $ptemail=$_POST['ptemail'];

    // $fname =$_POST['fname'];
    $sql = "INSERT INTO f_reports(`ecgid`, `userid`, `createdby`, `h_rate`, `rhytham`, `axis`, `pr_inte`, `qrs_compl`, `qt_inte`, `st_seg`, `t_waves`, `r_desc`, `sug`,`status`, `impression`) VALUES 
    ('$ecgid','$userid','$dtid','$rate','$rhythm','$Axis','$pr','$qrs','$qt','$st','$tw','$r_desc','$sug','$status','$impression')";
    $result = $conn->query($sql);
    if($result=== true) {
        mysqli_query($conn,"update qwert_ecgs set status='Reviewed', assign_dt=$dtid where ecgid=$ecgid");
        ecg_reviewed($ptemail);
                // $sql = "SELECT reports_created from qwert_doctors where dtid='$dtid'";
                $result = mysqli_query($conn, "SELECT reports_created from qwert_doctors where dtid=$dtid");               
                $analytics = mysqli_fetch_assoc($result);
               $newreports= $analytics['reports_created']+1;
        mysqli_query($conn,"update qwert_doctors set reports_created=$newreports where dtid=$dtid");
                
		echo "Report Created!";
	}else {
        echo "Error Occurd while creating a report!";
    }

}  



function ecg_reviewed($to){
    $body="<!doctypehtml><html lang=en xmlns:o=urn:schemas-microsoft-com:office:office xmlns:v=urn:schemas-microsoft-com:vml><title></title><meta content='text/html; charset=utf-8'http-equiv=Content-Type><meta content='width=device-width,initial-scale=1'name=viewport><style>*{box-sizing:border-box}body{margin:0;padding:0}a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}#MessageViewBody a{color:inherit;text-decoration:none}p{line-height:inherit}.desktop_hide,.desktop_hide table{mso-hide:all;display:none;max-height:0;overflow:hidden}@media (max-width:670px){.desktop_hide table.icons-inner{display:inline-block!important}.icons-inner{text-align:center}.icons-inner td{margin:0 auto}.row-content{width:100%!important}.column .border,.mobile_hide{display:none}table{table-layout:fixed!important;width:100%;}.stack .column{width:100%;display:block}.mobile_hide{min-height:0;max-height:0;max-width:0;overflow:hidden;font-size:0}.desktop_hide,.desktop_hide table{display:table!important;max-height:none!important}}</style><body style=margin:0;background-color:#f3f3f3;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0;background-color:#000 width=100% class=nl-container><tr><td><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0;background-color:#f3f3f3 width=100% class='row row-1'align=center><tr><td><table border=0 cellpadding=0 cellspacing=0 role=presentation style='mso-table-lspace:0;mso-table-rspace:0;background-color:#000;background-position:center top;background-repeat:no-repeat;color:#000;width:650px'width=650 class='row-content stack'align=center><tr><td style=mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:20px;padding-bottom:0;border-top:0;border-right:0;border-bottom:0;border-left:0 class='column column-1'width=100%><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=image_block><tr><td style=padding-right:5px;width:100%;padding-left:0><div style=line-height:10px align=center><img alt=ecglive.com-logo src=https://ecglive.com/assets/mail_img/ecglogo.png style=display:block;height:auto;border:0;width:115px;max-width:100% title='ECGLIve.com logo'width=115></div></table><table border=0 cellpadding=20 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=divider_block><tr><td><div align=center><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=80%><tr></table></div></table><table border=0 cellpadding=15 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=heading_block><tr><td style=text-align:center;width:100%><h1 style='margin:0;color:#00a83a;direction:ltr;font-family:Bitter,Georgia,Times,Times New Roman,serif;font-size:28px;font-weight:400;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0'><strong><span class=tinyMce-placeholder>ECG Reviewed !</span></strong></h1></table><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=heading_block><tr><td style=text-align:center;width:100%><h3 style='margin:0;color:#fef7f7;direction:ltr;font-family:Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Tahoma,sans-serif;font-size:17px;font-weight:700;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0'><span class=tinyMce-placeholder><em> Your ECG is Reviewed by experts. You can download Report PDF from ecglive.com</em></span></h3></table><table border=0 cellpadding=10 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0;word-break:break-word width=100% class=paragraph_block><tr><td><div style='color:#fff4f4;font-size:12px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-weight:700;line-height:120%;text-align:center;direction:ltr;letter-spacing:0'><p style=margin:0>Login to ecglive.com to download report:</div></table><table border=0 cellpadding=10 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=button_block><tr><td><div align=center style='width=100%;'><a href=https://ecglive.com/reports.php target=_blank style='text-decoration:none;display:inline-block;color:#fff;background-color:#f8af08;border-radius:0;width:auto;border-top:1px solid #f8af08;font-weight:700;border-right:1px solid #f8af08;border-bottom:1px solid #f8af08;border-left:1px solid #f8af08;padding-top:10px;padding-bottom:10px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all'><span style=padding-left:40px;padding-right:40px;font-size:14px;display:inline-block;letter-spacing:normal><span style=font-size:16px;line-height:2;word-break:break-word;mso-line-height-alt:32px><span style=font-size:14px;line-height:28px data-mce-style='font-size: 14px; line-height: 28px;'>Download  Report</span></span></span></a><!--[if mso]><![endif]--></div></table><table border=0 cellpadding=10 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0;word-break:break-word width=100% class=paragraph_block><tr><td><div style='color:#fff;font-size:11px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-weight:400;line-height:120%;text-align:center;direction:rtl;letter-spacing:1px'><p style=margin:0>For technical support Write us on support@ecglive.com or WhatsApp on 976 770 0770</div></table><table border=0 cellpadding=10 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=social_block><tr><td><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=144px class=social-table align=center><tr><td style='padding:0 2px 0 2px'><a href=https://www.facebook.com/ecglive target=_blank><img alt=Facebook src=https://ecglive.com/assets/mail_img/facebook2x.png style=display:block;height:auto;border:0 title=facebook width=32 height=32></a><td style='padding:0 2px 0 2px'><a href=https://instagram.com/ecglive target=_blank><img alt=Instagram src=https://ecglive.com/assets/mail_img/instagram2x.png style=display:block;height:auto;border:0 title=Instagram width=32 height=32></a><td style='padding:0 2px 0 2px'><a href=https://wa.me/+919767700770 target=_blank><img alt=WhatsApp src=https://ecglive.com/assets/mail_img/whatsapp2x.png style=display:block;height:auto;border:0 title=WhatsApp width=32 height=32></a><td style='padding:0 2px 0 2px'><a href=mailto:support@ecglive.com target=_blank><img alt=E-Mail src=https://ecglive.com/assets/mail_img/mail2x.png style=display:block;height:auto;border:0 title=E-Mail width=32 height=32></a></table></table><table border=0 cellpadding=20 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=100% class=divider_block><tr><td><div align=center><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0 width=80%><tr><td style='font-size:1px;line-height:1px;border-top:1px solid #e1b4fc'class=divider_inner><span> </span></table></div></table><table border=0 cellpadding=0 cellspacing=0 role=presentation style=mso-table-lspace:0;mso-table-rspace:0;word-break:break-word width=100% class=text_block><tr><td style=padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px><div style=font-family:sans-serif><div style='font-size:12px;mso-line-height-alt:14.399999999999999px;color:#fff;line-height:1.2;font-family:Arial,Helvetica Neue,Helvetica,sans-serif'class=txtTinyMce-wrapper><p style=margin:0;font-size:14px;text-align:center><span style=color:#f8f8f8>ECGLive.com © ·2022</div></div></table></table></table></table>";
    $subject="ECG reviewed!";
    $mail = new PHPMailer(); 
    // $mail->SMTPDebug  = 3;
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.zoho.in";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "info@ecglive.com";
    $mail->Password = "ECGLive@2022";
    $mail->SetFrom("info@ecglive.com", "ECGLive.com");
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