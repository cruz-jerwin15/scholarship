<?php
session_start();
include 'config.php';
$studenttype=$_SESSION['studenttype'];
$users = $_POST['users'];



$scholartype="";

if($studenttype=="fullscholar"){
  $scholartype="collegerecipient";
}else{
  $scholartype="fullscholar";
}

$process="TRANSFER APPLICANT";
  
  $insert2 = "INSERT INTO tbl_remarks (user_id,process,scholars,remarks) VALUES ('$users','$process','$studenttype','$remarks')";
  $conn->query($insert2);

  $sqla = "SELECT MAX(applicant_number) as maxnum FROM  tbl_admin WHERE typescholar='$scholartype'";
  $resulta = $conn->query($sqla);
  $rowa = $resulta->fetch_assoc();

  $newnum=$rowa['maxnum']+1;

  $update3 = "UPDATE tbl_admin SET typescholar='$scholartype',applicant_number='$newnum' WHERE id='$users'";
  $conn->query($update3);

 
  $sql8 = "SELECT * FROM  tbl_admin WHERE id='$users'";
  $result8 = $conn->query($sql8);
  $row8 = $result8->fetch_assoc();

  $academic_year=$row8['academic_year'];
  $application_no=$row8['application_no'];

      $delete = "DELETE FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $conn->query($delete);
     $delete1 = "DELETE FROM tbl_finalscore WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $conn->query($delete1);


	
 	echo '<script language="javascript">';
              echo 'alert("You successfully transfer new applicant for other scholarship/financial assistance")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($studenttype=="fullscholar"){
  		echo 'window.open("assessmentCollegeFullScholar.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="collegerecipient"){
  		echo 'window.open("assessmentCollegeRecipient.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="shscholar"){
      echo 'window.open("newSHS.php","_self")';
      echo '</script>';
    }
?>