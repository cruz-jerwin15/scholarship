<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$newgrade = $_POST['newgrade'];


	$sql = "UPDATE tbl_grade_submit SET grades='$newgrade' WHERE id='$userid'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update grades")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assess_collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assess_collegefullscholar.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assess_seniorhigh.php","_self")';
	}
  		echo '</script>';


?>