<?php
require 'config.php';
	$typescholar="TRANSFER CURRENT";
	$sql4 = "SELECT * FROM tbl_remarks WHERE process='$typescholar'";
      $result4 = $conn->query($sql4);
      if ($result4->num_rows > 0){
      	while($row4 = $result4->fetch_assoc()){
      		$user_id=$row4['user_id'];
      		$sql = "SELECT * FROM tbl_admin WHERE id='$user_id'";
      		$result = $conn->query($sql);
      		$row = $result->fetch_assoc();
      		echo $row['academic_year']." ".$row['application_no']."<br>";
      		

      	}
      }

?>