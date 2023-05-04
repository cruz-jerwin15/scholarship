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
echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		if($_SESSION['studenttype']=="collegerecipient"){
echo 'window.open("interviewCollegeRecipient.php","_self")';
}else if($_SESSION['studenttype']=="shscholar"){
echo 'window.open("interviewSHS.php","_self")';
}
  		echo '</script>';

?>