<?php session_start();
require "config.php";
	$academic_id=9;
	$status="ASSESSMENT";
    $typescholar="collegerecipient";
  $sql10 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' ORDER BY totalscore DESC";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows >0){
    	  while($row10 = $result10->fetch_assoc()){
             $count++;
                            $academic_year=$row10['academic_year'];
                            $application_no=$row10['application_no'];
                            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();
                            echo $count."*/".$row5['lastname'].","." ".$row5['firstname'].".".$row10['academic_year']."-",$row10['application_no']."-".$row10['totalscore']."-".$others."-".$row10['applicant_number']."<br>";
          }
    }
		



?>