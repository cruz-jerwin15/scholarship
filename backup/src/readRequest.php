<?php
session_start();
include 'config.php';

$users = $_POST['users'];





$status="READ";
$update3 = "UPDATE tbl_password SET status='$status'WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
  
        echo 'window.open("requestpassword.php","_self")';
        echo '</script>';


?>