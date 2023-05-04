<?php
include 'config.php';



	$status="ASSESSMENT";
	$sql = "SELECT * FROM tbl_admin WHERE status='$status'";
	$result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    	$academic_year = $row['academic_year'];
    	$application_no = $row['application_no'];
    
        $sql1 = "SELECT * FROM  tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0){
                $score=0;
                $update = "UPDATE tbl_interview_score SET score='$score' WHERE academic_year='$academic_year' AND application_no='$application_no'";
                $conn->query($update);
        }else{
                $score=0;
              $insert1= "INSERT INTO tbl_interview_score 
                    (academic_year,
                     application_no,
                    score)
                   VALUES (
                     '$academic_year',
                     '$application_no',
                     '$score'
                     )";
         $conn->query($insert1);
        }
	

    }
  

?>