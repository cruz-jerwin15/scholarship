<?php session_start();
$pages =$_POST['page'];
$_SESSION['offset'] = $pages;
$studenttype=$_SESSION['studenttype'];
	if($studenttype=="fullscholar"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("collegefullscholar.php","_self")';
  		echo '</script>';
	}else if($studenttype=="collegerecipient"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("collegerecipient.php","_self")';
  		echo '</script>';
	}else if($studenttype=="shscholar"){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("seniorhigh.php","_self")';
  		echo '</script>';
	}
?>