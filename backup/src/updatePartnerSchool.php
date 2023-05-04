<?php session_start();
include 'config.php';


$schoolid = $_POST['schoolid'];
$address = $_POST['address'];
$contactnumber = $_POST['contactnumber'];
$website = $_POST['website'];

	
	

	$sql = "UPDATE tbl_partnerschool SET address='$address',contactnumber='$contactnumber',website='$website' WHERE id='$schoolid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully update partner school information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("partner_school.php","_self")';
  		echo '</script>';



?>