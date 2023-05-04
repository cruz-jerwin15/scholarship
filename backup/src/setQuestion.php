<?php
session_start();

$quest = $_GET['quest'];

if($quest==1){
	$_SESSION['question']="ADD";
}
 // 	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("questBank.php","_self")';
  		echo '</script>';
?>