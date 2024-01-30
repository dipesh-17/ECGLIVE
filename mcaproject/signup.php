<?php
require_once('inc/dbconn.php');
include('smtp/PHPMailerAutoload.php');
require_once('inc/userfunctions.php');

// check if email is already taken
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {
	// validate email
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sqlcheck = "SELECT email FROM qwert_users WHERE email = '$email' ";
	$checkResult = $conn->query($sqlcheck);
	// check if email already taken
	if($checkResult->num_rows > 0) {
		echo "Sorry! email already Registerd. Please try another.";         
               
	}

}
// save records into the database
elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {
        
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $dob =$_POST['dob'];
    $gender =$_POST['gender'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $password =$_POST['password'];
        $city="";
    $country="";
    // $city=ipdetails(3);
    // $country=ipdetails(1);

    $password = md5($password); // Encrypt password
   
    $sql = "INSERT INTO qwert_users(first_name,last_name,gender,dob,phone,email,city,country,password,tc,usertype) VALUES ('$fname','$lname','$gender','$dob','$phone','$email','$city','$country','$password','Accepted','0')";
    $result = $conn->query($sql);
   
    if($result=== true) {
        // $body="<h1>Hello Welcome to ecglive.com </h1>";
        // smtp_mailer($email,'Registration Successfull on ECGLive.com',$body);
        reg_done_mail($email, $fname);        
		echo "Registration Successful!";
	}

    sleep(1);
    if ( $result === TRUE) {

        $sql = "SELECT * FROM qwert_users where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            session_start();
            $_SESSION['fname'] = $data['first_name']; 
            $_SESSION['userid'] = $data['userid'];        
            $_SESSION['email'] = $data['email'];        
            // header("location:../reports.php");
        }  
    }        
}

function ipdetails($number){


    $ip = getRealIP();  
 
    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    
    $country = $ipdat->geoplugin_countryName;
    $state = $ipdat->geoplugin_region;
    $city = $ipdat->geoplugin_city;
    if ($number==1) {
       return $country;
    }    
    if ($number==2) {
       return $state;
    }    
    if ($number==3) {
       return $city;
    }
    
    function getRealIP()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            $ip = $_SERVER["HTTP_FORWARDED"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        if (strpos($ip, ',') > 0) {
            $ip = substr($ip, 0, strpos($ip, ','));
        }
        return $ip;
    } 

} 


?>