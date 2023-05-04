<?php session_start();
$studenttype=$_SESSION['studenttype'];
$page = $_SESSION['page'];
$limit=$_SESSION['limit'];
$offset =$_SESSION['offset'];

$offset = ($offset-$limit);
$page=$page-1;
$_SESSION['page']=$page;
$_SESSION['offset']=$offset;

	  echo '<script language="javascript">';
 
        echo 'window.open("reportOfficialCurrentResult.php","_self")';
        echo '</script>';
?>