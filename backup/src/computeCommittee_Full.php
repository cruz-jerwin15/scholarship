<?php session_start();
include 'config.php';


$academic_year=$_GET['academic_year'];
$application_no=$_GET['application_no'];

$sql1 = "SELECT * FROM tbl_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
if($row1['committee']<=0){
	 $sql = "SELECT AVG(score) as average FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$average=$row['average'];

	$update3 = "UPDATE tbl_score SET committee='$average',total_points=total_points+'$average' WHERE academic_year='$academic_year' AND application_no='$application_no'";
$conn->query($update3);

	echo '<script language="javascript">';
              echo 'alert("You successfully compute applicant score. ")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assessmentCollegeFullScholar.php","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assessmentCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assessmentSHS.php","_self")';
	}
  		
  		echo '</script>';
}else{
	echo '<script language="javascript">';
              echo 'alert("You already computer the score of the applicant. ")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assessmentCollegeFullScholar.php","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assessmentCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assessmentSHS.php","_self")';
	}
  		
  		echo '</script>';
}


?>