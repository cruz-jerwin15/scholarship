<?php session_start();
include 'config.php';

$occupationid = $_POST['occupationid'];

	
	$sql = "DELETE from tbl_legend_occupation WHERE id='$occupationid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully removed occupation")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("occupation.php","_self")';
  		echo '</script>';



?>