<?php session_start();

include 'config.php';

$year=7;
$process="RENEW OK";
	$query="SELECT * FROM tbl_remarks WHERE academic_id = '$year' AND process='$process'";
 $result = $conn->query($query);
 if ($result->num_rows > 0){
 	while($row = $result->fetch_assoc()){
 		$id=$row['user_id'];
 		$status="OK";
 		$update = "UPDATE tbl_admin SET status='$status' WHERE id='$id'";
 		$conn->query($update);
 	}

 }
?>