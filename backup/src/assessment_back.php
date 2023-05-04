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