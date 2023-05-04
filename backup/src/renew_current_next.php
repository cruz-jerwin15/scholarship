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
   if($studenttype=="fullscholar"){
        echo 'window.open("renew_collegefullscholar.php","_self")';
        echo '</script>';
      }else if($studenttype=="collegerecipient"){
        echo 'window.open("renew_collegerecipient.php","_self")';
        echo '</script>';
      }else if($studenttype=="shscholar"){
        echo 'window.open("renew_seniorhigh.php","_self")';
        echo '</script>';
      } 
?>