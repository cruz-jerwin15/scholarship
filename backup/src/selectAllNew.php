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
if($studenttype=="fullscholar"){
  		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="collegerecipient"){
  		echo 'window.open("newCollegeRecipient.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="shscholar"){
      echo 'window.open("newSHS.php","_self")';
      echo '</script>';
    }
?>