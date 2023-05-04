<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];


$process ="OK";
$typescholar = $_SESSION['studenttype'];

$st="CURRENT";
$sql = "SELECT * FROM tbl_academic WHERE status='$st'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$acads=$row['id'];

$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,process,scholars,remarks) VALUES ('$acads','$users','$process','$typescholar','$remarks')";
$conn->query($insert2);

// $insert2 = "INSERT INTO tbl_collegeschool (user_id,school) VALUES ('$users','$school')";
// $conn->query($insert2);


$status="OK";
$update3 = "UPDATE tbl_admin SET status='$status'WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully approve new assessment")';
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