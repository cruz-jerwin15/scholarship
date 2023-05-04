<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$sql = "SELECT * FROM tbl_admin WHERE id='$users'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$academic_year=$row['academic_year'];
$application_no = $row['application_no'];
$applicant_number = "";
$interview_score = $_POST['interview_score'];
$remarks = $_POST['remarks'];
$process ="INTERVIEW";


$status1="OPEN";
$status2="CURRENT";
$sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
$resulta = $conn->query($sqla);   
$rowa = $resulta->fetch_assoc();

$academic_id = $rowa['id'];

$typescholar = $_SESSION['studenttype'];

$sql5="SELECT MAX(applicant_number) as maxnumber from tbl_admin WHERE  typescholar='$typescholar' AND academic_id='$academic_id'";
      $result5 = $conn->query($sql5);
      if ($result5->num_rows > 0){
        $row5 = $result5->fetch_assoc();
        $applicant_number=$row5['maxnumber']+1;     
}

$update3 = "UPDATE tbl_admin SET applicant_number='$applicant_number' WHERE academic_year='$academic_year' and application_no='$application_no'";
$conn->query($update3);





$insert4 = "INSERT INTO tbl_interview_score (academic_year,application_no,score) VALUES ('$academic_year','$application_no','$interview_score')";
$conn->query($insert4);


$status1="OPEN";
$status2="CURRENT";
$sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
  $resulta = $conn->query($sqla);   
 $rowa = $resulta->fetch_assoc();

$academic_id = $rowa['id'];

$point_id=1;
$sqlz = "SELECT * FROM tbl_point_system WHERE id='$point_id'";
$resultz = $conn->query($sqlz);
$rowz = $resultz->fetch_assoc();
$point_system = $rowz['point_system'];
$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks,point_system) VALUES ('$academic_id','$users','$typescholar','$process','$remarks','$point_system')";
$conn->query($insert2);


$status="ASSESSMENT";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);



 echo '<script language="javascript">';
              echo 'alert("You successfully send new applicant for assessment")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("interviewCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
    echo 'window.open("interviewSHS.php","_self")';
  }else{
    echo 'window.open("interviewCollegeFullScholar.php","_self")';
  }
  		
  		echo '</script>';
?>