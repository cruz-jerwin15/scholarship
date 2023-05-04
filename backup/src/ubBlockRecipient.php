<?php
session_start();
include 'config.php';
$userid=$_GET['id'];



$process="BLOCK";

$scholars="shscholar";
$sqla = "SELECT * FROM tbl_remarks WHERE process='$process' AND user_id='$userid'";
$resulta = $conn->query($sqla);   
$rowa = $resulta->fetch_assoc();
$academic_id=$rowa['academic_id'];
$rem = $rowa['remove'];
$remarks = $rowa['remarks'];

if($rem=="YES"){
  $status="REMOVED";
}else{
  $status='GRADUATED';
}

$remove ="NO";

$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$userid'";
$conn->query($update3);

$update3 = "UPDATE tbl_remarks SET remove='$remove' WHERE user_id='$userid' AND process='$process'";
$conn->query($update3);



if($rem=="YES"){
  $pross="SCHOLARS ASSESSMENT";
}else{
  $pross='GRADUATED';
}

$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks) VALUES ('$academic_id','$userid','$scholars','$pross','$remarks')";
$conn->query($insert2);

	
 	echo '<script language="javascript">';
              echo 'alert("You successfully unblock former shs recipients")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	
      echo 'window.open("blockReport.php","_self")';
      echo '</script>';
    
?>