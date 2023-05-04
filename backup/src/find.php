<?php session_start();
require "config.php";
	$academic_id=9;
	$status="ASSESSMENT";
    $typescholar="collegerecipient";
  $sql10 = "SELECT DISTINCT(totalscore) FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' ORDER BY totalscore DESC";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows >=0){
    	$count=0;
    	while($row10 = $result10->fetch_assoc()){
            
            $totalscore=$row10['totalscore'];
    		$sql1 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 1){
                $sql2 = "SELECT DISTINCT(others) FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' ORDER BY others DESC";
                $result2 = $conn->query($sql2);
                while($row2 = $result2->fetch_assoc()){
                    $others=$row2['others'];

                    $sql3 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others'";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 1){
                        $sql4 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others' ORDER BY applicant_number ASC";
                        $result4 = $conn->query($sql4);
                        while($row4 = $result4->fetch_assoc()){
                            $count++;
                            $academic_year=$row4['academic_year'];
                            $application_no=$row4['application_no'];
                            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();
                            echo $count."*/".$row5['lastname'].","." ".$row5['firstname'].".".$row4['academic_year']."-",$row4['application_no']."-".$totalscore."-".$others."-".$row4['applicant_number']."<br>";
                        }

                    }else{
                        $count++;
                         $row3 = $result3->fetch_assoc();
                         $academic_year=$row3['academic_year'];
                            $application_no=$row3['application_no'];
                            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();
                       
                        echo $count."*/".$row5['lastname'].","." ".$row5['firstname'].".".$row3['academic_year']."-",$row3['application_no']."-".$totalscore."-".$others."-".$row3['applicant_number']."<br>";
                    }
                    



                 
                }
            }else{
                $count++;

                $row1 = $result1->fetch_assoc();
                  $academic_year=$row1['academic_year'];
                            $application_no=$row1['application_no'];
                            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();
               echo $count."*/".$row5['lastname'].","." ".$row5['firstname'].".".$row1['academic_year']."-",$row1['application_no']."-".$totalscore."-".$row1['others']."-".$row1['applicant_number']."<br>";
            }
    		
    		
    	}
    }
		



?>