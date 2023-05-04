<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];

$process ="ASSESSMENT";

$typescholar = $_SESSION['studenttype'];

$st="CURRENT";
$sql = "SELECT * FROM tbl_academic WHERE status='$st'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$acads=$row['id'];
$remove="YES";
$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,process,scholars,remarks,remove) VALUES ('$acads','$users','$process','$typescholar','$remarks','$remove')";
$conn->query($insert2);


$status="REMOVED";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully removed this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assessmentCollegeFullScholar.php","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assessmentCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assessmentSHS.php","_self")';
	}
  		
  		echo '</script>';

?>