<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];
$typeofscholar = $_POST['typeofscholar'];
$school = $_POST['school'];

$process ="ASSESSMENT";


$insert2 = "INSERT INTO tbl_remarks (user_id,process,remarks) VALUES ('$users','$process','$remarks')";
$conn->query($insert2);

$insert2 = "INSERT INTO tbl_collegeschool (user_id,school) VALUES ('$users','$school')";
$conn->query($insert2);


$status="OK";
$update3 = "UPDATE tbl_admin SET status='$status',typescholar='$typeofscholar' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully approve new assessment")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("assessmentCollegeFullScholar.php","_self")';
  		echo '</script>';

?>