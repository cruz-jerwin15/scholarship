<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$transfer = $_POST['transfer'];

$remarks = $_POST['remarks'];


$process ="GRADUATED";


$insert2 = "INSERT INTO tbl_remarks (user_id,process,remarks) VALUES ('$users','$process','$remarks')";
$conn->query($insert2);

$usertype="college";
$typescholar="";
if($transfer=="College Financial Assistance"){
	$typescholar="collegerecipient";
}else{
	$typescholar="fullscholar";
}


$status="NEWAPPLICANT";
$update3 = "UPDATE tbl_admin SET status='$status', usertype='$usertype', typescholar='$typescholar' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully send senior high to college")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("collegefullscholar.php","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("seniorhigh.php","_self")';
	}
  		
  		echo '</script>';

?>