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
   if($studenttype=="fullscholar"){
        echo 'window.open("removedApplicantFulls.php","_self")';
        echo '</script>';
      }else if($studenttype=="collegerecipient"){
        echo 'window.open("removedApplicantRecipient.php","_self")';
        echo '</script>';
      }else if($studenttype=="shscholar"){
        echo 'window.open("removedApplicantSH.php","_self")';
        echo '</script>';
      } 
?>