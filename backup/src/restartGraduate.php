<?php
session_start();
include 'config.php';
$status="For Renewal";
$process="REQUIREMENTS";
$process1="INTERVIEW";
$process2="ASSESSMENT";
$typescholar="shscholar";
$yes="YES";

	
			$sql2 = "SELECT DISTINCT(user_id) FROM tbl_remarks WHERE remove!='$yes' AND process='$process1' AND scholars='$typescholar'";
			$result2 = $conn->query($sql2);
			$count=0;
			while($row2 = $result2->fetch_assoc()){
					$count++;
				$user_id=$row2['user_id'];
				$sql1 = "SELECT * FROM tbl_admin WHERE id='$user_id' AND typescholar='$typescholar' AND status='$process2'";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0){

				}else{
					$count++;
 		
 					echo $count." ".$user_id."<br>";
				}
			}

			// $sql2 = "SELECT DISTINCT(user_id) FROM tbl_remarks WHERE remove!='$yes' AND process='$process1' AND scholars='$typescholar'";
			// $result2 = $conn->query($sql2);
			// $count=0;
			// while($row2 = $result2->fetch_assoc()){
			// 	$count++;
			// 	$user_id=$row2['user_id'];
 		// 		$sql1 = "SELECT COUNT(user_id) as total FROM tbl_remarks WHERE remove!='$yes' AND process='$process1' AND scholars='$typescholar' AND user_id=''";
			// 	$result1 = $conn->query($sql1);
			// 	$row1 = $result1->fetch_assoc();
 		// 		echo $count." ".$user_id." COUNT".$row1['total']."<br>";
			// }

 	// $sql1 = "SELECT * FROM tbl_admin WHERE status='ASSESSMENT' AND typescholar='$typescholar'";
 	// 	$result1 = $conn->query($sql1);
 	// $count=0;
 	// while($row1 = $result1->fetch_assoc()){
 	// 	$user_id = $row1['id'];
 	// 	$sql2 = "SELECT * FROM tbl_remarks WHERE user_id='$user_id' AND process='$process1' AND scholars='$typescholar'";
 	// 	$result2 = $conn->query($sql2);
 	// 	if ($result2->num_rows > 0){
 	// 		// $count++;
 		
 	// 		// echo $count." ".$row1['username']."<br>";
 		
 	// 	}else{
 	// 		$count++;
 		
 	// 		echo $count." ".$user_id." ".$row1['username']."NONE<br>";
 	// 	}
 	
 	// }

// $type="shscholar";
// 	$sql = "SELECT * FROM tbl_remarks WHERE process='$process'";
// 	$result = $conn->query($sql);
// 	$count=0;
//     while($row = $result->fetch_assoc()){
    	
//     	$userid = $row['user_id'];
//   //   	// echo $count.")".$userid.'<br>';

//     	$sql1 = "SELECT * FROM tbl_admin WHERE id='$userid'";
// 		$result1 = $conn->query($sql1);
// 		$row1 = $result1->fetch_assoc();
// 		$typescholar = $row1['typescholar'];
// 		$status=$row1['status'];
// 		$remarks = $row['remarks'];
// 		// echo $row['process'].'<br>';

// 		if($status=="ASSESSMENT"){
// 			$count++;
// 			echo $count.")".$typescholar.'/'.$status.'/'.$remarks.'<br>';
// 			$update = "UPDATE tbl_remarks SET scholars='$type' WHERE user_id='$userid' AND process='$process'";
// 			$conn->query($update);
// 		}


//   //   	$application_no = $row['application_no'];
//   //   	$stats="ASSESS";
//   //   	$stats1="RENEW";
// 		// $update = "UPDATE tbl_admin SET status='$stats1' WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$stats'";
// 		// $conn->query($update);

//     }
  

	// $sql = "UPDATE tbl_siblingsinfo SET lastname='$lastname', firstname='$firstname',middlename='$middlename',typegrant='$grant',relationship='$relationship' WHERE id='$id'";
	// $conn->query($sql);

// REQUIREMENTS
// GRADUATED
// SCHOLARS
// INTERVIEW
// ASSESSMENT
// TRANSFER

?>
