<?php session_start();
$what = $_POST['filter'];
$search = $_POST['searchshs'];
$order= $_POST['order'];
$limit= $_POST['limit'];

$_SESSION['search']=$what;
$_SESSION['whatsearch']=$search;
$_SESSION['order']=$order;
$_SESSION['limit']=$limit;
$_SESSION['offset']=1;
$studenttype=$_SESSION['studenttype'];

	if($studenttype=="fullscholar"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("removedApplicantFull.php","_self")';
  		echo '</script>';
	}else if($studenttype=="collegerecipient"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("removedApplicantRecipient.php","_self")';
  		echo '</script>';
	}else if($studenttype=="shscholar"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("removedApplicantSHS.php","_self")';
  		echo '</script>';
	}



?>