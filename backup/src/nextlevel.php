<?php session_start();
		$_SESSION['counter']=2;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("studentprofile.php","_self")';
  		echo '</script>';

?>