<?php
session_start();
include 'config.php';
$studenttype=$_SESSION['studenttype'];
$users = $_POST['users'];

$remarks = $_POST['remarks'];

$process ="INTERVIEW";

$sql = "SELECT * FROM tbl_admin WHERE id='$users'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$acads=$row['academic_id'];

$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks) VALUES ('$acads','$users','$studenttype','$process','$remarks')";
$conn->query($insert2);


$status="REMOVED";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully removed this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("interviewCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("interviewSHS.php","_self")';
	}
  		
  		echo '</script>';

?>