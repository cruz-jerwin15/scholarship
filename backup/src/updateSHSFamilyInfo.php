<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$flname = $_POST['flname'];
$ffname = $_POST['ffname'];
$fmname = $_POST['fmname'];
$foccupation = $_POST['foccupation'];
$mlname = $_POST['mlname'];
$mfname = $_POST['mfname'];
$mmname = $_POST['mmname'];
$moccupation = $_POST['moccupation'];
$phousenumber = $_POST['phousenumber'];
$pstreet = $_POST['pstreet'];
$pbarangay = $_POST['pbarangay'];
$gross = $_POST['gross'];
$numfamily = $_POST['numfamily'];
$numsiblings = $_POST['numsiblings'];
$numboys = $_POST['numboys'];
$numgirls = $_POST['numgirls'];
$numboys = $_POST['numboys'];
$glname = $_POST['glname'];
$gfname = $_POST['gfname'];
$gmname = $_POST['gmname'];
$goccupation = $_POST['goccupation'];
$grelationship = $_POST['grelationship'];
$gphone = $_POST['gphone'];
$goccupation = $_POST['goccupation'];
$ghousenumber = $_POST['ghousenumber'];
$gstreet = $_POST['gstreet'];
$gbarangay = $_POST['gbarangay'];


	$fupdate = "UPDATE tbl_fatherinfo SET lastname='$flname',firstname='$ffname',middlename = '$fmname',occupation='$foccupation' WHERE user_id='$userid'";
	$conn->query($fupdate);

	$mupdate = "UPDATE tbl_motherinfo SET lastname='$mlname',firstname='$mfname',middlename = '$mmname',occupation='$moccupation' WHERE user_id='$userid'";
	$conn->query($mupdate);

	$pupdate = "UPDATE tbl_parentinfo SET gross='$gross',housenumber='$phousenumber',street = '$pstreet',barangay='$pbarangay',numberfamily='$numfamily',siblings='$numsiblings',girls='$numgirls',boy='$numboys' WHERE user_id='$userid'";
	$conn->query($pupdate);

	$gupdate = "UPDATE tbl_guardianinfo SET lastname='$glname',firstname='$gfname',middlename = '$gmname',occupation='$goccupation',phonenumber='$gphone',housenumber='$ghousenumber',street='$gstreet',barangay='$gbarangay',relationship='$grelationship' WHERE user_id='$userid'";
	$conn->query($gupdate);
	

		 echo '<script language="javascript">';
              echo 'alert("Successfully updated family info")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateSHS.php?id='.$userid.'","_self")';
  		echo '</script>';





?>