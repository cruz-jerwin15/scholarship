<?php session_start();
include 'config.php';
$username=$_SESSION['username'];

$academic_year=$_POST['acad'];
$application_no=$_POST['application'];
$score = $_POST['score'];


 $sql = "SELECT * FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no' AND committee_id='$username'";
$result = $conn->query($sql);
if ($result->num_rows <= 0){
	$insert = "INSERT INTO tbl_committee_score (academic_year,application_no,committee_id,score)VALUES ('$academic_year','$application_no','$username','$score')";
		$conn->query($insert);
}else{
	$update3 = "UPDATE tbl_committee_score SET score='$score' WHERE academic_year='$academic_year' AND application_no='$application_no' AND committee_id='$username'";
	$conn->query($update3);
}

	echo '<script language="javascript">';
              echo 'alert("You successfully add your score. ")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("committee_fullscholar.php","_self")';
	}else if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("committee_recipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("committee_shs.php","_self")';
	}
  		
  		echo '</script>';
?>