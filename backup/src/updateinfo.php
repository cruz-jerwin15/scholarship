<?php session_start();
include 'config.php';

$username = $_SESSION['username'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];





	
	$sql = "UPDATE tbl_admin SET firstname='$firstname', lastname='$lastname' WHERE username='$username'";
	$conn->query($sql);
	  $_SESSION['lastname']=$lastname;
       $_SESSION['firstname']=$firstname;
	 echo '<script language="javascript">';
              echo 'alert("You successfully update your information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("personalprofile.php","_self")';
  		echo '</script>';



?>