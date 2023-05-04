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

// selectAllAssessment
	
	echo '<script language="javascript">';
if($_SESSION['studenttype']=="collegerecipient"){
    echo 'window.open("assessmentCollegeRecipient.php","_self")';
  }else if($_SESSION['studenttype']=="shscholar"){
    echo 'window.open("assessmentSHS.php","_self")';
  }else if($_SESSION['studenttype']=="fullscholar"){
    echo 'window.open("assessmentCollegeFullScholar.php","_self")';
  }
    echo '</script>';
?>