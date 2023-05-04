<?php
session_start();
include 'config.php';

$school_name = $_POST['school_name'];
$address = $_POST['address'];
$contactnumber = $_POST['contactnumber'];
$website = $_POST['website'];

$sql="SELECT * from tbl_partnerschool where school_name='$school_name'";
$result = $conn->query($sql);
if ($result->num_rows < 1){
	$sql1 = "INSERT INTO tbl_partnerschool (school_name,address,contactnumber,website)
		VALUES ('$school_name','$address','$contactnumber','$website')";
	$conn->query($sql1);

	echo '<script language="javascript">';
	
	  		echo 'alert("Successfully add new partner school")';
	  		echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("partner_school.php","_self")';
  		echo '</script>';
}else{
		echo '<script language="javascript">';
	
	  		echo 'alert("Partner school is already in the system")';
	  		echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("partner_school.php","_self")';
  		echo '</script>';
}

?>