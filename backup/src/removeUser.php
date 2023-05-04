<?php session_start();
include 'config.php';

$ids = $_GET['id'];
$status="REMOVED";

$sql = "UPDATE tbl_admin SET status='$status' WHERE id='$ids'";
$conn->query($sql);

$_SESSION['notif']="2";
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("userlist.php","_self")';
  		echo '</script>';

?>