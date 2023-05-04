<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$school = $_POST['school'];
$schooladdress = $_POST['schooladdress'];
$highest = $_POST['highest'];
$genweight = $_POST['genweight'];
$grant = $_POST['grant'];



	$update = "UPDATE tbl_educational SET school='$school',
	address='$schooladdress',
	highestyear = '$highest',genweight='$genweight',
	bursary='$grant'
	WHERE user_id='$userid'";
	$conn->query($update);

	

	
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated student educational info")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateOldCollegeRecord.php?id='.$userid.'","_self")';
  		echo '</script>';





?>