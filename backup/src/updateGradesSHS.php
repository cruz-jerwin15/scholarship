<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$ffirstsem = $_POST['ffirstsem'];
$fsecondsem = $_POST['fsecondsem'];
$sfirstsem = $_POST['sfirstsem'];
$ssecondsem = $_POST['ssecondsem'];


	$sql = "UPDATE tbl_shs_grade SET grade11_1='$ffirstsem',grade11_2='$fsecondsem',grade12_1='$sfirstsem',grade12_2='$ssecondsem' WHERE user_id='$userid'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update grade")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("seniorhigh.php","_self")';
  		echo '</script>';


?>