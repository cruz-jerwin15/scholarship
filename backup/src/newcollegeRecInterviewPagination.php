<?php session_start();
$pages =$_POST['page'];
$_SESSION['offset'] = $pages;
echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

if($_SESSION['studenttype']=="collegerecipient"){
echo 'window.open("interviewCollegeRecipient.php","_self")';
}else if($_SESSION['studenttype']=="shscholar"){
echo 'window.open("interviewSHS.php","_self")';
}
  		
  		echo '</script>';
?>