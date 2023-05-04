<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$id = $_POST['ids'];
$fullname=$_POST['fullname'];
$age=$_POST['age'];
$civil=$_POST['civil'];
$grant=$_POST['grant'];
$hea=$_POST['hea'];
$occupation=$_POST['occupation'];
$monthly_salary=$_POST['monthly_salary'];

	$sql = "UPDATE tbl_siblingsinfo SET fullname='$fullname', age='$age',civil='$civil',typegrant='$grant',hea='$hea',occupation='$occupation',monthly_salary='$monthly_salary' WHERE id='$id'";
	$conn->query($sql);
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated sibling information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
	}
  		
  		echo '</script>';


?>