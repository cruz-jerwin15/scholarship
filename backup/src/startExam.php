<?php
session_start();
include 'config.php';



$userid=$_SESSION['newid'];
$exam_id=$_SESSION['exam_id'];
$_SESSION['exam_start']="YES";
$_SESSION['start_time']=1;






$st="CURRENT";
$st1="OPEN";
$sql = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$acads=$row['id'];

$status="ONGOING";
$update3 = "UPDATE tbl_student_exam SET status='$status' WHERE user_id='$userid' AND academic_id='$acads' AND exam_id='$exam_id'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You can now start your exam")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	
		echo 'window.open("onlineExam.php","_self")';
	
  		
  		echo '</script>';

?>