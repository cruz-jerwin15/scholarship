<?php
include 'config.php';

$status="For Renewal";
$typescholar="shscholar";
	
	$sql = "SELECT * FROM tbl_renewal WHERE status='$status'";
	$result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    	$academic_year = $row['academic_year'];
    	$application_no = $row['application_no'];
    	$stats="ASSESS";
    	$stats1="RENEW";
		$update = "UPDATE tbl_admin SET status='$stats1' WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$stats'";
		$conn->query($update);

    }
  

?>