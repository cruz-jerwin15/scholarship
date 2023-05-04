<?php
session_start();

$quest = $_GET['typequest'];


if($quest==1){
	$_SESSION['questtype']="TEXT";
}else if($quest==2){
	$_SESSION['questtype']="IMAGE";
}else if($quest==3){
	$_SESSION['questtype']="TEXT/IMAGE";
}else{
	$_SESSION['questtype']="IMAGE/TEXT";
}
 // 	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("questBank.php","_self")';
  		echo '</script>';
?>