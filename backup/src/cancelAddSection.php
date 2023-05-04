<?php
session_start();

$_SESSION['section']="NULL";

	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("sectionList.php","_self")';
  		echo '</script>';
?>