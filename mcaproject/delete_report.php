<?php
session_start();
require 'inc/dbconn.php';
if (isset($_POST['delete_btn_set'])) {
    $reportid = $_POST['report_id'];
    $sql = "DELETE FROM `qwert_ecgs` WHERE ecgid='$reportid'";
    $result= mysqli_query($conn, $sql);
}
?>