<?php session_start();
$pages =$_POST['page'];
$_SESSION['offset'] = $pages;
echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("assessmentSHS.php","_self")';
  		echo '</script>';
?>