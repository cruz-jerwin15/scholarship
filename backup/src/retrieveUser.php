<?php session_start();
include 'config.php';

$ids = $_GET['id'];
$status="APPROVED";

$sql = "UPDATE tbl_admin SET status='$status' WHERE id='$ids'";
$conn->query($sql);

$_SESSION['notif']="1";
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("removedUser.php","_self")';
  		echo '</script>';

?>