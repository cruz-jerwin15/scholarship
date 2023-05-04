<?php
session_start();
include 'config.php';
$academic_year = $_POST['academic_year'];
$academic_id = $_POST['academic_id'];
$application_no = $_POST['application_no'];

$school_id = $_POST['school_id'];
$registration_form = $_POST['registration_form'];

$sqlb = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
  $resultb = $conn->query($sqlb);   
 $rowb = $resultb->fetch_assoc();

 $student_id=$rowb['id'];


	$sql = "UPDATE  tbl_renew SET school_id='$school_id',registration_form='$registration_form' WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
	$conn->query($sql);
	// echo $sql;
	// $studenttype=$_SESSION['studenttype'];



	$user_id = $_SESSION['userid'];
	$process = "RENEWAL REQUIREMENTS";

	date_default_timezone_set("Asia/Manila");
    $year =date('Y');
    $month=date('m');
    $day=date('d');
    $hour=date('H');
    $minute=date('i');
    $seconds=date('s');

    $datess=$year."-".$month."-".$day;
    $timesss = $hour.":".$minute.":".$seconds;
   $date_time=$datess." ".$timesss;

	if($school_id==1){
		$remarks = "Approved renewal school id";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
		 	$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }		
	}else if($school_id==0){
		$remarks = "Disapproved renewal school id";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
			$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }	
	}

	if($registration_form==1){
		$remarks = "Approved renewal registration form";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
			$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }		
	}else if($registration_form==0){
		$remarks = "Disapproved renewal registration form";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
		 	$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }		
	}


	echo '<script language="javascript">';
              echo 'alert("Successfully update renewal requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("seniorhigh.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("collegefullscholar.php","_self")';
	}
  		
  		echo '</script>';
  	

?>