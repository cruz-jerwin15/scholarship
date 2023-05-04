<?php
session_start();
include 'config.php';

$select = $_GET['select'];

$studenttype=$_SESSION['studenttype'];

if($select=="ALL"){
	$_SESSION['select']="NOTALL";
}else{
	$_SESSION['select']="ALL";
}


	
	echo '<script language="javascript">';
if($_SESSION['studenttype']=="collegerecipient"){
    echo 'window.open("interviewCollegeRecipient.php","_self")';
  }else if($_SESSION['studenttype']=="shscholar"){
    echo 'window.open("interviewSHS.php","_self")';
  }else if($_SESSION['studenttype']=="fullscholar"){
    echo 'window.open("interviewCollegeFullScholar.php","_self")';
  }
    echo '</script>';
?>