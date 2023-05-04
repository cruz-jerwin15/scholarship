<?php
session_start();
include 'config.php';

$academic_year = $_POST['academic_year'];
$academic_sem = $_POST['academic_sem'];

$ay = $academic_year."-".$academic_sem;

$sql="SELECT * from tbl_academic where academic_year='$ay'";
$result = $conn->query($sql);
if ($result->num_rows < 1){

	$insert = "INSERT INTO tbl_academic(academic_year)
		VALUES ('$ay')";
	$conn->query($insert);
	$stat="CLOSED";
	$insert1 = "UPDATE tbl_academic SET status='$stat' WHERE status='CURRENT'";
	$conn->query($insert1);



	 echo '<script language="javascript">';
              echo 'alert("You successfully create new academic year")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("application.php","_self")';
  		echo '</script>';
}else{
	 echo '<script language="javascript">';
              echo 'alert("Academic year already in the system")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("application.php","_self")';
  		echo '</script>';
}

?>
