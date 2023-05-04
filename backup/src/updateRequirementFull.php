<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$applicationform = $_POST['applicationform'];
$birthcertificate = $_POST['birthcertificate'];
$gradereport = $_POST['gradereport'];
$schoolclearance = $_POST['schoolclearance'];
$parentvotersid = $_POST['parentvotersid'];
$housesketch = $_POST['housesketch'];
$barangayclearance = $_POST['barangayclearance'];
$picture = $_POST['picture'];
$itr = $_POST['itr'];
$exam = $_POST['exam'];

	$sql = "INSERT INTO tbl_full_requirements (user_id,applicationform,birthcertificate,gradereport,schoolclearance,parentvotersid,housesketch,barangayclearance,picture,itr,exam)VALUES ('$userid','$applicationform','$birthcertificate','$gradereport','$schoolclearance','$parentvotersid','$housesketch','$barangayclearance','$picture','$itr','$exam')";
	$conn->query($sql);
	$studenttype=$_SESSION['studenttype'];
	if($studenttype=="fullscholar"){
	 echo '<script language="javascript">';
              echo 'alert("Successfully update requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
  	}

?>