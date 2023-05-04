<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$stats = $_POST['status'];

$remarks = $_POST['remarks'];

if($stats=="REMOVED"){
	$removed ="YES";
}else{
	$removed ="GRADUATE";
}

$process="BLOCK";
$status1="OPEN";
	$status2="CURRENT";
	$sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
	  $resulta = $conn->query($sqla);   
	 $rowa = $resulta->fetch_assoc();

	$acad = $rowa['id'];
	$scholar = $_SESSION['studenttype'];
$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks,remove) VALUES ('$acad','$users','$scholar','$process','$remarks','$removed')";
$conn->query($insert2);

// $insert2 = "INSERT INTO tbl_collegeschool (user_id,school) VALUES ('$users','$school')";
// $conn->query($insert2);

$stat="BLOCK";
$update3 = "UPDATE tbl_admin SET status='$stat'WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully block recipients.")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	
		echo 'window.open("assess_seniorhigh.php","_self")';
	
  		
  		echo '</script>';

?>