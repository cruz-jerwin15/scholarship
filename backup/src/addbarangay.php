<?php
session_start();
include 'config.php';

$barangay = $_POST['barangay'];

$sql="SELECT * from tbl_barangay where barangay='$barangay'";
$result = $conn->query($sql);
if ($result->num_rows < 1){
	$sql = "INSERT INTO tbl_barangay (barangay)
		VALUES ('$barangay')";
	$conn->query($sql);
	$_SESSION['notif']="1";
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("barangay.php","_self")';
  		echo '</script>';
}else{
	$_SESSION['notif']="0";
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("barangay.php","_self")';
  		echo '</script>';
}

?>