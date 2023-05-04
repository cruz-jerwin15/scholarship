<?php session_start();
$what = $_POST['filter'];
$search = $_POST['searchshs'];
$order= $_POST['order'];


$_SESSION['search']=$what;
$_SESSION['whatsearch']=$search;
$_SESSION['order']=$order;

$_SESSION['offset']=1;
echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		
echo 'window.open("barangayRecords.php","_self")';

  		echo '</script>';

?>