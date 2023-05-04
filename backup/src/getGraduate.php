<?php
session_start();
include 'config.php';

$process ="GRADUATED";
$sql = "SELECT * FROM tbl_remarks WHERE process='$process'";
$result = $conn->query($sql);
$count=0;
while($row = $result->fetch_assoc()){
	$count++;
	$userid = $row['user_id'];

	$sql1 = "SELECT * FROM tbl_admin WHERE id='$userid'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$academic_year=$row1['academic_year'];
	$application_no=$row1['application_no'];

	$sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();

	echo $count.". ".$userid." ".$row2['lastname']." ".$row2['firstname']."<br>";
}




?>