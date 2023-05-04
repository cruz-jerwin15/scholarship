<?php session_start();
$pages =$_POST['page'];
$_SESSION['offset'] = $pages;
echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		  		if($_SESSION['studenttype']=="collegerecipient"){
echo 'window.open("assessmentCollegeRecipient.php","_self")';
}else if($_SESSION['studenttype']=="shscholar"){
echo 'window.open("assessmentSHS.php","_self")';
}else if($_SESSION['studenttype']=="fullscholar"){
echo 'window.open("assessmentCollegeFullScholar.php","_self")';
}
  		echo '</script>';
?>