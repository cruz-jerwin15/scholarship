<?php
session_start();




$_SESSION['section']="ADD";

 // 	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("sectionList.php","_self")';
  		echo '</script>';
?>