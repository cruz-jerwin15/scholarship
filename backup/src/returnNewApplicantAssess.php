<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$sql = "SELECT * FROM tbl_admin WHERE id='$users'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$academic_year = $row['academic_year'];
$application_no = $row['application_no'];
$applicant_number = "";
// $interview_score = $_POST['interview_score'];
$remarks = $_POST['remarks'];
$process = "RETURN NEW APPLICANT";

$typescholar = $_SESSION['studenttype'];



$status1 = "OPEN";
$status2 = "CURRENT";
$sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
$resulta = $conn->query($sqla);
$rowa = $resulta->fetch_assoc();

$academic_id = $rowa['id'];
$point_system = "A";

$insert2 = "INSERT INTO tbl_remarks (academic_id,user_id,scholars,process,remarks,point_system) VALUES ('$academic_id','$users','$typescholar','$process','$remarks','$point_system')";
$conn->query($insert2);


$status = "NEWAPPLICANT";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);



echo '<script language="javascript">';
echo 'alert("You successfully send back this applicant to new applicant")';
echo '</script>';
echo '<script language="javascript">';
// echo 'localStorage.setItem("notif","1")';
if ($_SESSION['studenttype'] == "collegerecipient") {
    echo 'window.open("assessmentCollegeRecipient.php","_self")';
} else if ($_SESSION['studenttype'] == "shscholar") {
    echo 'window.open("assessmentSHS.php","_self")';
} else {
    echo 'window.open("assessmentCollegeFullScholar.php","_self")';
}

echo '</script>';
