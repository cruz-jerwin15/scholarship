<?php session_start();
include 'config.php';


$messageid = $_POST['messageid'];
$message = $_POST['message'];



$message = addslashes($message);

	
	$sql = "UPDATE tbl_sms SET message='$message' WHERE id='$messageid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully update message")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("smsSettings.php","_self")';
  		echo '</script>';



?>