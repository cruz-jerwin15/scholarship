<?php
session_start();

$id=$_GET['id'];
$_SESSION['section']="ADDQUESTION";
$_SESSION['section_id']=$id;

	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("sectionList.php","_self")';
  		echo '</script>';
?>