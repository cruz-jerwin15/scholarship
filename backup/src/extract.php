<?php
session_start();
include 'config.php';
$studenttype="collegerecipient";
$status="ASSESSMENT";
$search ="fai";


  $sql="SELECT * from tbl_admin where typescholar='$studenttype' AND status='$status'";
  $result = $conn->query($sql);

 		$count=0;
   		 while($row = $result->fetch_assoc()){
   		 	$academic_year = $row['academic_year'];
   		 	$application_no = $row['application_no'];
   		 	$count++;
   		 	$sql1="SELECT * from tbl_studentinfo where academic_year='$academic_year' AND application_no='$application_no' AND school LIKE '%$search%'";
  			$result1 = $conn->query($sql1);
  			
  			 if ($result1->num_rows > 0){
  			 	$row1 = $result1->fetch_assoc();
  			 	echo $count.'. '.$row1['firstname'].' '.$row1['lastname'].' '.$row1['barangay'].' '.$row1['course'].'<br>';
  			 }
  			
   		 }
   

?>