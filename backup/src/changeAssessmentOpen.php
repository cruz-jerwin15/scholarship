<?php
session_start();
include 'config.php';

$id = $_GET['id'];

	$stat="OPEN";
	$insert1 = "UPDATE tbl_renew_year SET status='$stat' WHERE id='$id'";
	$conn->query($insert1);



	 echo '<script language="javascript">';
              echo 'alert("You successfully re-open this year assessment process")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("manageAssessment.php","_self")';
  		echo '</script>';


?>