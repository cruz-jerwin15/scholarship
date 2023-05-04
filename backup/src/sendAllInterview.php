<?php
session_start();
include 'config.php';
require 'sendBulk.php';
$smsid = $_POST['smsid'];

$title = $_POST['message'];

		$sqlc = "SELECT * FROM tbl_sms WHERE process='$title'";
		$resultc = $conn->query($sqlc);   
		$rowc = $resultc->fetch_assoc();

		$message = $rowc['message'];
		$messages = stripslashes($message);

$contact ="";
foreach ($smsid as $key => $sms) {
	
	if($sms>0){
		$sqla = "SELECT * FROM tbl_admin WHERE id='$sms'";
		$resulta = $conn->query($sqla);   
		$rowa = $resulta->fetch_assoc();

		$academic_year=$rowa['academic_year'];
		$application_no = $rowa['application_no'];

		$sqlb = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$resultb = $conn->query($sqlb);   
		$rowb = $resultb->fetch_assoc();

		$contact .= $rowb['phone'].",";
        // sendMessages($contact,$messages);
	}
 


}
$contacts = rtrim($contact, ",");


sendMessages($contacts,$messages);


echo '<script language="javascript">';
              echo 'alert("You successfully sent your message")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	

	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("interviewCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("interviewSHS.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("interviewCollegeFullScholar.php","_self")';
	}
  		
  		echo '</script>';
 

?>