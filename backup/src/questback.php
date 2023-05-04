<?php session_start();

$page =$_SESSION['filterpage'];


$page=$page-1;

$_SESSION['filterpage']=$page;

	 echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
 
      echo 'window.open("questBank.php","_self")';
      echo '</script>';
   
?>