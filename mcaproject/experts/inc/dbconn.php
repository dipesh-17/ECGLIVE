<?php
    $server = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "mcaproject";
    // Create connection
    $conn = new mysqli($server, $username, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>