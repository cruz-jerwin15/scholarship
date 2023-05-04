<?php session_start();

$page = $_SESSION['page'];
$limit=$_SESSION['limit'];
$offset =$_SESSION['offset'];

$offset = ($page*$limit)+1;
$page=$page+1;
$_SESSION['page']=$page;
$_SESSION['offset']=$offset;

	   echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
  
        echo 'window.open("requestpassword.php","_self")';
        echo '</script>';
?>