<?php session_start();
include 'config.php';

$ids = $_POST['ids'];
$req = $_POST['editfirstname'];





	
	$sql = "UPDATE tbl_list_req SET listreq='$req'WHERE id='$ids'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("requirements.php","_self")';
  		echo '</script>';



?>