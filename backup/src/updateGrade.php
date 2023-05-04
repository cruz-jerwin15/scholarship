<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$ffirstsem = $_POST['ffirstsem'];
$fsecondsem = $_POST['fsecondsem'];
$sfirstsem = $_POST['sfirstsem'];
$ssecondsem = $_POST['ssecondsem'];
$tfirstsem = $_POST['tfirstsem'];
$tsecondsem = $_POST['tsecondsem'];
$fofirstsem = $_POST['fofirstsem'];
$fosecondsem = $_POST['fosecondsem'];
$fifirstsem = $_POST['fifirstsem'];
$fisecondsem = $_POST['fisecondsem'];


	$sql = "INSERT INTO tbl_college_grades (user_id,first_fsem,first_ssem,second_fsem,second_ssem,third_fsem,third_ssem,fourth_fsem,fourth_ssem,fifth_fsem,fifth_ssem)
		VALUES ('$userid','$ffirstsem','$fsecondsem','$sfirstsem','$ssecondsem','$tfirstsem','$tsecondsem','$fofirstsem','$fosecondsem','$fifirstsem','$fisecondsem')";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update grade")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("collegefullscholar.php","_self")';
	}
  		
  		echo '</script>';


?>