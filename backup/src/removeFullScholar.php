<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$studenttype=$_SESSION['studenttype'];
$remarks = $_POST['remarks'];

$process ="REQUIREMENTS";


$status1="OPEN";
$status2="CURRENT";
$sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
  $resulta = $conn->query($sqla);   
 $rowa = $resulta->fetch_assoc();

$academic_id = $rowa['id'];

$remove="YES";
$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks,remove) VALUES ('$academic_id','$users','$studenttype','$process','$remarks','$remove')";
$conn->query($insert2);


$status="REMOVED";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

	

	if($studenttype=="fullscholar"){
 echo '<script language="javascript">';
              echo 'alert("You successfully removed this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	
		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
	
		
	
  		
}else if($_SESSION['studenttype']=="collegerecipient"){
	 echo '<script language="javascript">';
              echo 'alert("You successfully removed this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	
		echo 'window.open("newCollegeRecipient.php","_self")';
  		echo '</script>';
}else if($_SESSION['studenttype']=="shscholar"){
	 echo '<script language="javascript">';
              echo 'alert("You successfully removed this applicant")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

	
		echo 'window.open("newSHS.php","_self")';
  		echo '</script>';
}
?>