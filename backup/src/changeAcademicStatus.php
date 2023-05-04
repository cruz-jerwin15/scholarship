<?php
session_start();
include 'config.php';

$id = $_GET['id'];

	$stat="CURRENT";
	$insert1 = "UPDATE tbl_academic SET status='$stat' WHERE id='$id'";
	$conn->query($insert1);



	 echo '<script language="javascript">';
              echo 'alert("You successfully close this academic year application process")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("application.php","_self")';
  		echo '</script>';


?>