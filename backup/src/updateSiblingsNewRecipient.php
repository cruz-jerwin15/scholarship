<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$id = $_POST['ids'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$firstname = $_POST['firstname'];
$grant = $_POST['grant'];
$relationship = $_POST['relationship'];

	$sql = "UPDATE tbl_siblingsinfo SET lastname='$lastname', firstname='$firstname',middlename='$middlename',typegrant='$grant',relationship='$relationship' WHERE id='$id'";
	$conn->query($sql);
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated sibling information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateNewCollegeRecipient.php?id='.$userid.'","_self")';
  		echo '</script>';


?>