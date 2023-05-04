<?php
include 'config.php';
    if(isset($_GET['mainid'])){
    	$Name = filter($_GET['mainid'])
    $sql = " SELECT
	a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.educ,
    a.year_level,
    a.batch,
    b.Barangay AS brgy,
    c.LastSchoolAttended AS last_school,
    a.status,
    a.assessment,
    a.year_level,
    c.course,
    c.assessment_grade,
    a.remarks,
    c.GWA_now
    
    
FROM tbl_userinfo a
INNER JOIN tbl_useraddress b
ON a.id = b.user_id
INNER JOIN tbl_school c
ON a.id = c.user_id

WHERE a.user_name = '$Name' ";
	mysqli_query($conn, $sql);
    }
?>