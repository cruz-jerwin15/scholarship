<?php
session_start();
include 'config.php';

$date = $_POST['editdate'];
$title = $_POST['edittitle'];
$activity = $_POST['editactivity'];
$ids = $_POST['actid'];
$dayname = date('D', strtotime($date));



	$sql = "UPDATE tbl_activity SET dates='$date',title='$title',dayname='$dayname',description='$activity' WHERE id='$ids'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully update activity to the calendar ")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("calendar.php","_self")';
  		echo '</script>';


?>