<?php
session_start();
include 'config.php';

$users = $_SESSION['username'];

$status="NEWAPPLICANT";
$update3 = "UPDATE tbl_admin SET status='$status'WHERE username='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully send your application. Please submit all the requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	echo 'window.open("uploadrequirements.php","_self")';
  		
  		echo '</script>';

?>