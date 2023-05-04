<?php
session_start();
include 'config.php';

$users = $_POST['users'];



$status="NEWAPPLICANT";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully retrieved student information")';
              echo '</script>';
	$studenttype=$_SESSION['studenttype'];
	if($studenttype=="fullscholar"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("removedApplicantFull.php","_self")';
  		echo '</script>';
	}else if($studenttype=="collegerecipient"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("removedApplicantRecipient.php","_self")';
  		echo '</script>';
	}else if($studenttype=="shscholar"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("removedApplicantSHS.php","_self")';
  		echo '</script>';
	}

?>