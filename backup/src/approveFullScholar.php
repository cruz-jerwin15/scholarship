<?php
session_start();
include 'config.php';
$studenttype=$_SESSION['studenttype'];
$users = $_POST['users'];

$remarks = $_POST['remarks'];

$process ="REQUIREMENTS";

$status1="OPEN";
$status2="CURRENT";
$sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
  $resulta = $conn->query($sqla);   
 $rowa = $resulta->fetch_assoc();

$academic_id = $rowa['id'];


$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks) VALUES ('$academic_id','$users','$studenttype','$process','$remarks')";
$conn->query($insert2);




$status="INTERVIEW";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

	
 	echo '<script language="javascript">';
              echo 'alert("You successfully send new applicant for interview")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($studenttype=="fullscholar"){
  		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="collegerecipient"){
  		echo 'window.open("newCollegeRecipient.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="shscholar"){
      echo 'window.open("newSHS.php","_self")';
      echo '</script>';
    }
?>