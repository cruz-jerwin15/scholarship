<?php
session_start();


$id = $_GET['id'];

$_SESSION['exam']="EDIT";

$_SESSION['exam_id']=$id;
 // 	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examList.php","_self")';
  		echo '</script>';
?>