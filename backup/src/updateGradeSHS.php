<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$ffirstsem = $_POST['ffirstsem'];
$fsecondsem = $_POST['fsecondsem'];
$sfirstsem = $_POST['sfirstsem'];
$ssecondsem = $_POST['ssecondsem'];



	$sql = "INSERT INTO tbl_shs_grade (user_id,grade11_1,grade11_2,grade12_1,grade12_2)
		VALUES ('$userid','$ffirstsem','$fsecondsem','$sfirstsem','$ssecondsem')";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update grade")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("seniorhigh.php","_self")';
  		echo '</script>';


?>