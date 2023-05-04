<?php
session_start();

$filter = $_GET['typequest'];

if($filter==1){
	$_SESSION['filterquest']="ALL";
	$_SESSION['filterpage']=0;	
}else if($filter==2){
	$_SESSION['filterquest']="TEXT";
	$_SESSION['filterpage']=0;
}else if($filter==3){
	$_SESSION['filterquest']="IMAGE";
	$_SESSION['filterpage']=0;
}else{
	$_SESSION['filterquest']="TEXT/IMAGE";
	$_SESSION['filterpage']=0;
}



	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("questBank.php","_self")';
  		echo '</script>';
?>