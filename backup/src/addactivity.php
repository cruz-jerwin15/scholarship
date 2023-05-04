<?php
session_start();
include 'config.php';

$date = $_POST['date'];
$title = $_POST['title'];
$activity = $_POST['activity'];

$dayname = date('D', strtotime($date));


$sql="SELECT * from tbl_activity where title='$title' AND dates='$date'";
$result = $conn->query($sql);
if ($result->num_rows < 1){
	$sql = "INSERT INTO tbl_activity (dates,title,description,dayname)
		VALUES ('$date','$title','$activity','$dayname')";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully add activity to the calendar ")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("calendar.php","_self")';
  		echo '</script>';
}else{
	 echo '<script language="javascript">';
              echo 'alert("Activity already in the calendar")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("calendar.php","_self")';
  		echo '</script>';
}

?>