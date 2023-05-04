<?php session_start();
include 'config.php';

$ids = $_POST['ids'];
$lastname = $_POST['editlastname'];
$firstname = $_POST['editfirstname'];
$position = $_POST['editposition'];




	
	$sql = "UPDATE tbl_officers SET firstname='$firstname', lastname='$lastname', position='$position' WHERE id='$ids'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update officer information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("officers.php","_self")';
  		echo '</script>';



?>