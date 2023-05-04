<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];

$process ="SCHOLARS ASSESSMENT";

$studenttype=$_SESSION['studenttype'];

$status1="OPEN";
$status2="CURRENT";
$sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
  $resulta = $conn->query($sqla);   
 $rowa = $resulta->fetch_assoc();

$academic_id = $rowa['id'];


$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks) VALUES ('$academic_id','$users','$studenttype','$process','$remarks')";
$conn->query($insert2);


$status="REMOVED";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully removed this scholars")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assess_collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assess_seniorhigh.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assess_collegefullscholar.php","_self")';
	}
  		
  		echo '</script>';

?>