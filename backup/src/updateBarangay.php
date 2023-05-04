<?php session_start();
include 'config.php';


$barangayid = $_POST['barangayid'];
$barangay = $_POST['editbarangay'];





	
	$sql = "UPDATE tbl_barangay SET barangay='$barangay' WHERE id='$barangayid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully update barangay")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("barangay.php","_self")';
  		echo '</script>';



?>