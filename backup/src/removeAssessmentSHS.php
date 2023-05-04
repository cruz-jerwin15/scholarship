<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];

$process ="ASSESSMENT";


$insert2 = "INSERT INTO tbl_remarks (user_id,process,remarks) VALUES ('$users','$process','$remarks')";
$conn->query($insert2);


$status="REMOVED";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully removed this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("assessmentSHS.php","_self")';
  		echo '</script>';

?>