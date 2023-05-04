<?php session_start();

require 'config.php';
	$scholars ="fullscholar";

	$sql3 = "SELECT * FROM tbl_admin WHERE typescholar='$scholars' AND status='OK'";
	$result3 = $conn->query($sql3);

	
		while($row3 = $result3->fetch_assoc()){
			$academic_year=$row3['academic_year'];
			$application_no=$row3['application_no'];
			$gradelevel="";
			if($row3['batch']=="3rd"){
				$gradelevel="3RD";
			}else if($row3['batch']=="4th"){
				$gradelevel="2ND";
			}else if($row3['batch']=="5th"){
				$gradelevel="1ST";
			}


			$update="UPDATE tbl_studentinfo set gradelevel='$gradelevel' WHERE application_no='$application_no' AND academic_year='$academic_year'";
		    		$conn->query($update);
		}
	


?>