<?php
session_start();
include 'config.php';
require 'smsSend.php';

$users = $_POST['users'];
$dates = $_POST['dates'];
$startdates = $_POST['startdates'];


$st="OPEN";
$st1="CURRENT";
$sql = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$acads=$row['id'];

$status1="ONGOING";
$sql1 = "SELECT * FROM tbl_student_exam WHERE academic_id='$acads' AND user_id='$users' AND status='$status1'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$status2="PUBLISHED";
$sql2 = "SELECT * FROM tbl_exam WHERE  status='$status2'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$exam_id=$row2['id'];
$status3="OPEN";
if ($result1->num_rows > 0){
	$update ="UPDATE tbl_student_exam SET academic_id='$acads', exam_id='$exam_id', start_date='$startdates',date_due='$dates', status='$status3' WHERE user_id='$users'";
	$conn->query($update);

	$delete = "DELETE FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$users'";
	$conn->query($delete);

}else{

	$insert2 = "INSERT INTO tbl_student_exam (academic_id,user_id,exam_id,start_date,date_due) VALUES ('$acads','$users','$exam_id','$startdates','$dates')";
	$conn->query($insert2);
	$delete = "DELETE FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$users'";
	$conn->query($delete);
}



$sqlx = "SELECT * FROM tbl_admin WHERE id='$users'";
$resultx = $conn->query($sqlx);
$rowx = $resultx->fetch_assoc();

$academic_year = $rowx['academic_year'];
$application_no =$rowx['application_no'];



$sqly = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
$resulty = $conn->query($sqly);
$rowy = $resulty->fetch_assoc();

$mobile = $rowy['phone'];
$idno=5;
$sqlz = "SELECT * FROM tbl_sms WHERE id='$idno'";
$resultz = $conn->query($sqlz);
$rowz = $resultz->fetch_assoc();

$message = stripslashes($rowz['message']);

$newmessage = $message." ".$dates;
sendMessages($mobile,$newmessage);
 echo '<script language="javascript">';
              echo 'alert("You successfully set exam to new applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	echo 'window.open("interviewCollegeFullScholar.php","_self")';
  		
  		echo '</script>';

?>