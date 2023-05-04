<?php
include 'config.php';

$sql = "SELECT * FROM tbl_renew_year WHERE status='OPEN'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$academic_id=$row['id'];
echo $academic_id;

$stat="ASSESS";
$sql1 = "SELECT * FROM tbl_admin WHERE status='$stat'";
$result1 = $conn->query($sql1);
while($row1 = $result1->fetch_assoc()){
	$academic_year = $row1['academic_year'];
	$application_no = $row1['application_no'];
	$sql2 = "SELECT * FROM tbl_grade_submit WHERE application_no='$application_no' AND academic_year='$academic_year' AND academic_id='$academic_id'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0){
		$row2 = $result2->fetch_assoc();
	}else{
		
		$grades=0;
		$insert1= "INSERT INTO tbl_grade_submit
                        (academic_id,
                        academic_year,
                        application_no,
                        grades
                       )
                      VALUES (
                        '$academic_id',
                        '$academic_year',
                        '$application_no',
                        '$grades'
                         )";
    $conn->query($insert1);
	}
}
?>