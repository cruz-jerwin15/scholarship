<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$applicationform = $_POST['applicationform'];
$birthcertificate = $_POST['birthcertificate'];
$gradereport = $_POST['gradereport'];
$schoolclearance = $_POST['schoolclearance'];
$parentvotersid = $_POST['parentvotersid'];
$studentregistration = $_POST['studentregistration'];
$housesketch = $_POST['housesketch'];
$barangayclearance = $_POST['barangayclearance'];
$picture = $_POST['picture'];
$itr = $_POST['itr'];
$exam = $_POST['exam'];

	$sql = "UPDATE tbl_college_requirements SET applicationform='$applicationform',birthcertificate='$birthcertificate',gradereport='$gradereport',schoolclearance='$schoolclearance',parentvotersid='$parentvotersid',studentregistration='$studentregistration',housesketch='$housesketch',barangayclearance='$barangayclearance',picture='$picture',itr='$itr',exam='$exam' WHERE user_id='$userid'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("newCollegeRecipient.php","_self")';
  		echo '</script>';


?>