<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
     
    $email =$_POST['email'];
    $password =$_POST['password'];
    $password = md5($password);
    require 'inc/dbconn.php';

    $sqlcheck = "SELECT email FROM qwert_doctors WHERE email = '$email' ";
    $checkResult = $conn->query($sqlcheck);
    if($checkResult->num_rows < 1) {
      echo "Incorrect Email";
      exit;         
    }else{  

        $sql = "SELECT * FROM qwert_doctors where email='$email' AND password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            session_start();		
            $_SESSION['1wdvhi0'] = $data['fname'];
            $_SESSION['1wdvhi1'] = $data['dtid'];
            // header("location:reports.php");
        }else{
            echo "Incorrect Password"; 
        }    
    }
}

?>