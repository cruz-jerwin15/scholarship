<?php session_start();
include 'config.php';


$schoolid = $_POST['schoolid'];


	
	

	$sql = "DELETE from tbl_partnerschool WHERE id='$schoolid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully remove partner school")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("partner_school.php","_self")';
  		echo '</script>';



?>