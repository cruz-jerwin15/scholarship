<?php
session_start();

$_SESSION['questtype']="TEXT";
$_SESSION['question']="NULL";

	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("questBank.php","_self")';
  		echo '</script>';
?>