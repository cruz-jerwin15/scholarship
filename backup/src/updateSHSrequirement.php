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

	$sql = "INSERT INTO tbl_college_requirements (user_id,applicationform,birthcertificate,gradereport,schoolclearance,parentvotersid,studentregistration,housesketch,barangayclearance,picture,itr,exam)VALUES ('$userid','$applicationform','$birthcertificate','$gradereport','$schoolclearance','$parentvotersid','$studentregistration','$housesketch','$barangayclearance','$picture','$itr','$exam')";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("newSHS.php","_self")';
  		echo '</script>';


?>