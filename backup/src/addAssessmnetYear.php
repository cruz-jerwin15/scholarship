<?php
session_start();
include 'config.php';

$academic_year = $_POST['academic_year'];
$semester = $_POST['semester'];
$includes = $_POST['includes'];

$sql="SELECT * from tbl_renew_year where academic_year='$academic_year' AND sem='$semester'";
$result = $conn->query($sql);
if ($result->num_rows < 1){

	$sem_label =$academic_year." ".$semester." Semester";


	$stat="CLOSED";
	$insert1 = "UPDATE tbl_renew_year SET status='$stat' WHERE status='CURRENT' OR status='OPEN'";
	$conn->query($insert1);

	$insert = "INSERT INTO tbl_renew_year(academic_year,sem,semester)
		VALUES ('$academic_year','$semester','$sem_label')";
	$conn->query($insert);

	if($includes=="YES"){
		$stats="ASSESS";
		$stats1="OK";
		$fullscholar="fullscholar";
		$collegerecipient="collegerecipient";
		$shscholar="shscholar";
		$update = "UPDATE tbl_admin SET status='$stats' WHERE status='$stats1' AND (typescholar='$fullscholar' OR typescholar='$collegerecipient' OR typescholar='$shscholar')";
		$conn->query($update);
	}else{
		$stats="ASSESS";
		$stats1="OK";
		$fullscholar="fullscholar";
		$collegerecipient="collegerecipient";
		$update = "UPDATE tbl_admin SET status='$stats' WHERE status='$stats1' AND (typescholar='$fullscholar' OR typescholar='$collegerecipient')";
		$conn->query($update);
	}



	 echo '<script language="javascript">';
              echo 'alert("You successfully create new assessment year")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("manageAssessment.php","_self")';
  		echo '</script>';
}else{
	 echo '<script language="javascript">';
              echo 'alert("Assessment year already in the system")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("manageAssessment.php","_self")';
  		echo '</script>';
}

?>
