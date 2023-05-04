<?php
session_start();
include 'config.php';

$status="OK";
$typescholar="shscholar";
$sql="SELECT * from tbl_admin where status='$status' AND typescholar='$typescholar'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$academic_year=$row['academic_year'];
		$application_no=$row['application_no'];
		$sql1="SELECT * from tbl_studentinfo where academic_year='$academic_year' AND application_no='$application_no'";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0){
			while($row1 = $result1->fetch_assoc()){
				$bday = $row1['bday'];
				
				if($bday==""){
					$password=md5("youthdevelopment");
					$update3 = "UPDATE tbl_admin SET password='$password' where academic_year='$academic_year' AND application_no='$application_no'";
					$conn->query($update3);
				}
			}
		}
		
	}
}

	


?>