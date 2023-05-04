<?php session_start();
$pages =$_POST['page'];
$_SESSION['offset'] = $pages;
echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		  				if($_SESSION['studenttype']=="collegerecipient"){
echo 'window.open("committee_recipient.php","_self")';
}else if($_SESSION['studenttype']=="shscholar"){
echo 'window.open("committee_shs.php","_self")';
}else if($_SESSION['studenttype']=="fullscholar"){
echo 'window.open("committee_fullscholar.php","_self")';
}
  		echo '</script>';
?>