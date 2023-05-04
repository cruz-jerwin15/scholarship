<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$code = $_POST['code'];
$status = "OK";

$remarks= $_POST['remarks'];
$usertype = $_POST['usertype'];

$typescholar="";
$types="";

$sqla = "SELECT * FROM tbl_pin WHERE pin='$code'";
$resulta = $conn->query($sqla);
 $rowa = $resulta->fetch_assoc();

 if ($resulta->num_rows > 0){
   $sql = "SELECT * FROM tbl_admin WHERE id='$users'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0){
     $row = $result->fetch_assoc();
     $application_no=$row['application_no'];
     $academic_year=$row['academic_year'];
     if($usertype=="fullscholar"){
       $type="college";
       $typescholar="fullscholar";
     }else if($usertype=="shscholar"){
       $type="shs";
       $typescholar="shscholar";
     }else{
       $type="college";
       if($usertype=="collegerecipient_public"){
         $typescholar="collegerecipient";
         $typeschool="Public / State Universities";
       }else{
         $typescholar="collegerecipient";
         $typeschool="Private / Institute";
       }

     }


     $update3 = "UPDATE tbl_admin SET status='$status',usertype='$type',typescholar='$typescholar' WHERE id='$users'";
     $conn->query($update3);

     if($typescholar=="collegerecipient"){
       $update5 = "UPDATE tbl_studentinfo SET schooltype='$typeschool' WHERE application_no='$application_no' AND academic_year='$academic_year'";
       $conn->query($update5);
     }

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
