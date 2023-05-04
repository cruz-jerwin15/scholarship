<?php
session_start();




$_SESSION['exam']="ADD";

 // 	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examList.php","_self")';
  		echo '</script>';
?>