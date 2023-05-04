<?php session_start();
require "config.php";
$studenttype=$_SESSION['studenttype'];

$id = $_POST['ids'];


$sqlg = "SELECT * FROM tbl_admin WHERE id='$id'";
$resultg = $conn->query($sqlg);
$rowg = $resultg->fetch_assoc();

$search = $rowg['username'];


$_SESSION['search']="EMAIL";
$_SESSION['whatsearch']=$search;
$_SESSION['order']='ASC';
$_SESSION['limit']=10;
$_SESSION['offset']=1;
$_SESSION['page']=1;
      
  



  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
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