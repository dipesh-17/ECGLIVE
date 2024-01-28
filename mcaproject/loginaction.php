<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_email']) && isset($_POST['login_password'])) {
     
    $email =$_POST['login_email'];
    $password =$_POST['login_password'];
    $password = md5($password);
    require 'inc/dbconn.php';

    $sqlcheck = "SELECT email FROM qwert_users WHERE email = '$email' ";
    $checkResult = $conn->query($sqlcheck);
    if($checkResult->num_rows < 1) {
      echo "Incorrect Email";
      exit;         
    }else{  

        $sql = "SELECT * FROM qwert_users where email='$email' AND password='$password' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            session_start();		
            $_SESSION['fname'] = $data['first_name'];
            $_SESSION['userid'] = $data['userid'];
            $_SESSION['email'] = $data['email'];
            // header("location:reports.php");
        }else{
            echo "Incorrect Password"; 
        }    
    }
}

?>