<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];

$process ="INTERVIEW";


$insert2 = "INSERT INTO tbl_remarks (user_id,process,remarks) VALUES ('$users','$process','$remarks')";
$conn->query($insert2);


$status="ASSESSMENT";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully send new applicant for assessment")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("interviewSHS.php","_self")';
  		echo '</script>';

?>