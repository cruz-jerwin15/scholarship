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
    // echo 'localStorage.setItem("notif","1")';
  if($studenttype=="fullscholar"){
      echo 'window.open("newCollegeFullScholar.php","_self")';
      echo '</script>';
    }else if($studenttype=="collegerecipient"){
      echo 'window.open("newCollegeRecipient.php","_self")';
      echo '</script>';
    }else if($studenttype=="shscholar"){
      echo 'window.open("newSHS.php","_self")';
      echo '</script>';
    }
?>