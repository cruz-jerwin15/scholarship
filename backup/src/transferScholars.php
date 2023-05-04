<?php
session_start();
include 'config.php';

$users = $_POST['users'];

$remarks = $_POST['remarks'];


$process ="TRANSFER CURRENT";

$status1="OPEN";
	$status2="CURRENT";
	$sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
	  $resulta = $conn->query($sqla);   
	 $rowa = $resulta->fetch_assoc();

	$acad = $rowa['id'];
	$scholar = $_SESSION['studenttype'];
$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks) VALUES ('$acad','$users','$scholar','$process','$remarks')";
$conn->query($insert2);

// $insert2 = "INSERT INTO tbl_collegeschool (user_id,school) VALUES ('$users','$school')";
// $conn->query($insert2);
$typescholar="";
if($_SESSION['studenttype']=="fullscholar"){
		$typescholar="collegerecipient";
}else{
	$typescholar="fullscholar";
}

$update3 = "UPDATE tbl_admin SET typescholar='$typescholar'WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully transfer scholars.")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assess_collegefullscholar.php","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assess_collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assess_seniorhigh.php","_self")';
	}
  		
  		echo '</script>';

?>