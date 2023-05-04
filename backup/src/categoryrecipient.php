<?php
session_start();

$_SESSION['category']=$_GET['category'];
$process=$_GET['process'];

if($process=="New Applicant"){
  header('Location:newCollegeRecipient.php');
}else if($process=="Interview"){
  header('Location:interviewCollegeRecipient.php');
}else if($process=="Assessment"){
  header('Location:assessmentCollegeRecipient.php');
}else if($process=="RemovedApplicant"){
  header('Location:removedApplicantRecipient.php');
}else if($process=="Current"){
  header('Location:collegerecipient.php');
}else if($process=="Assess"){
  header('Location:assess_collegerecipient.php');
}else if($process=="Renew"){
  header('Location:renew_collegerecipient.php');
}


?>
