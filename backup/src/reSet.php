<?php
include 'config.php';

$status="ASSESS";
$typescholar="collegerecipient";
	
	$sql = "SELECT * FROM tbl_admin WHERE status='$status' AND typescholar='$typescholar'";
	$result = $conn->query($sql);
	$count=0;
	$counts=0;
    while($row = $result->fetch_assoc()){
    	$academic_year = $row['academic_year'];
    	$application_no = $row['application_no'];
    	$username = $row['username'];

    	$stat=1;

    	$sql1 = "SELECT * FROM tbl_grade_submit WHERE 
    	academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$stat'";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0){
			
		}else{
			$grade=0;
		$insert= "INSERT INTO tbl_grade_submit 
                    (academic_id,
                    academic_year,
                    application_no,
                    grades)
                  VALUES (
                  	'$stat',
                    '$academic_year',
                    '$application_no',
                    '$grade')";
        $conn->query($insert);
		}
		// 	$stat=1;
	 //    	$sql2 = "SELECT * FROM tbl_assess_req WHERE 
	 //    	academic_year='$academic_year' AND application_no='$application_no' AND
	 //    	school_id='$stat' AND registration_form='$stat' AND school_clearance='$stat' AND gradereport='$stat'";
		// 	$result2 = $conn->query($sql2);
		// 	if ($result2->num_rows > 0){
				
		// 		$status1="RENEW";
		// 		$update = "UPDATE tbl_admin SET status='$status1' WHERE academic_year='$academic_year' AND application_no='$application_no'";
		// 		$conn->query($update);
		// 	}else{
		// 		$status1="ASSESS";
		// 		$update = "UPDATE tbl_admin SET status='$status1' WHERE academic_year='$academic_year' AND application_no='$application_no'";
		// 		$conn->query($update);
		// 	}
		// }
    }
  

?>