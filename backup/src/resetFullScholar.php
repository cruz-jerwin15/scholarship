<?php
session_start();
include 'config.php';

$users = $_POST['users'];









$status="PREAPPLICATION";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

	
$studenttype=$_SESSION['studenttype'];
	if($studenttype=="fullscholar"){
 echo '<script language="javascript">';
              echo 'alert("You successfully reset this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	
		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
	
		
	
  		
}else if($_SESSION['studenttype']=="collegerecipient"){
	 echo '<script language="javascript">';
              echo 'alert("You successfully reset this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	
		echo 'window.open("newCollegeRecipient.php","_self")';
  		echo '</script>';
}else if($_SESSION['studenttype']=="shscholar"){
	 echo '<script language="javascript">';
              echo 'alert("You successfully reset this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	
		echo 'window.open("newSHS.php","_self")';
  		echo '</script>';
}
?>