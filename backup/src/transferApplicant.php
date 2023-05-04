<?php
session_start();
include 'config.php';
$studenttype=$_SESSION['studenttype'];
$users = $_POST['users'];
$transfer = $_POST['transfer'];




$usertype="";
$scholartype="";
if($transfer=="Senior High School"){
  $usertype="shs";
  $scholartype="shscholar";
}else if($transfer=="College Recipient"){
  $usertype="college";
  $scholartype="collegerecipient";
}else{
  $usertype="college";
  $scholartype="fullscholar";
}


$update3 = "UPDATE tbl_admin SET usertype='$usertype', typescholar='$scholartype' WHERE id='$users'";
$conn->query($update3);
	
 	echo '<script language="javascript">';
              echo 'alert("You successfully transfer new applicant for other scholarship/financial assistance")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
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