<?php session_start();
$studenttype=$_SESSION['studenttype'];
$page = $_SESSION['page'];
$limit=$_SESSION['limit'];
$offset =$_SESSION['offset'];

$offset = ($page*$limit)+1;
$page=$page+1;
$_SESSION['page']=$page;
$_SESSION['offset']=$offset;

	 echo '<script language="javascript">';
 
        echo 'window.open("reportsGraduate.php","_self")';
        echo '</script>';
     
?>