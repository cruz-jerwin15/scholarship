<?php
session_start();
include 'config.php';

$school = $_POST['schoolintended'];
$schooltype = $_POST['schooltype'];
$course = $_POST['course'];
$years = $_POST['yearlevel'];
$userid=$_SESSION['userid'];

	$update1 = "UPDATE tbl_whatschool SET school='$school',
	schooltype='$schooltype', course='$course', years='$years' WHERE userid='$userid'";
		$conn->query($update1);


		 echo '<script language="javascript">';
              echo 'alert("Successfully updated school intended to enrol")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateNewCollegeRecipient.php?id='.$userid.'","_self")';
  		echo '</script>';
?>