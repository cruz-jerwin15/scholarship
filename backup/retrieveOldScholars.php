<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$code = $_POST['code'];
$status = "OK";
$remarks= $_POST['remarks'];

$sqla = "SELECT * FROM tbl_pin WHERE pin='$code'";
$resulta = $conn->query($sqla);
 $rowa = $resulta->fetch_assoc();

 if ($resulta->num_rows > 0){
   $sql = "SELECT * FROM tbl_admin WHERE id='$users'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0){
     $row = $result->fetch_assoc();

     $update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
     $conn->query($update3);

     date_default_timezone_set("Asia/Manila");
       $year =date('Y');
       $month=date('m');
       $day=date('d');
       $hour=date('H');
       $minute=date('i');
       $seconds=date('s');

       $datess=$year."-".$month."-".$day;
       $timesss = $hour.":".$minute.":".$seconds;
       $date_time=$datess." ".$timesss;
       $process="RETRIEVED REMOVED APPLICANT";
       $user_id = $_SESSION['userid'];
       $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$users','$process','$remarks','$datess','$timesss','$date_time')";
       $conn->query($sql1);

     $remove="YES";
     $update3 = "DELETE from tbl_remarks WHERE user_id='$users' AND remove='$remove'";
     $conn->query($update3);

     echo '<script language="javascript">';
    echo 'alert("Removed applicant successfully change status.")';
    echo '</script>';

   }else{
     echo '<script language="javascript">';
    echo 'alert("Applicant does not exist.")';
    echo '</script>';
   }

 }else{
   echo '<script language="javascript">';
  echo 'alert("Pin code is incorrect.")';
  echo '</script>';

 }


 echo '<script language="javascript">';
   // echo 'localStorage.setItem("notif","1")';
 if($_SESSION['studenttype']=="collegerecipient"){
   echo 'window.open("reportsRemovedApplicant.php","_self")';
 }else if($_SESSION['studenttype']=="shscholar"){
   echo 'window.open("reportsRemovedApplicant.php","_self")';
 }else{
   echo 'window.open("reportsRemovedApplicant.php","_self")';
 }

     echo '</script>';






?>
