<?php session_start();
include 'config.php';


$editoccupation = $_POST['editoccupation'];
$occupationid = $_POST['occupationid'];
$editpoints = $_POST['editpoints'];





	
	$sql = "UPDATE tbl_legend_occupation SET legend='$editoccupation',points='$editpoints' WHERE id='$occupationid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully update occupation")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("occupation.php","_self")';
  		echo '</script>';



?>