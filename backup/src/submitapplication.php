<?php session_start();
require 'config.php';
$userid	=$_SESSION['userid'];
$status="PASS";
	$update5 = "UPDATE tbl_admin SET 
		status='$status'
		WHERE id='$userid'";
		$conn->query($update5);

		$_SESSION['notif']="5";
		echo '<script language="javascript">';
		echo 'window.open("uploadphoto.php","_self")';
		echo '</script>';

?>