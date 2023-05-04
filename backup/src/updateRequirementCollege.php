<?php
session_start();
include 'config.php';

$student_id = $_POST['userid'];
	$user_id = $_SESSION['userid'];
	$process = "NEW REQUIREMENTS";

	date_default_timezone_set("Asia/Manila");
    $year =date('Y');
    $month=date('m');
    $day=date('d');
    $hour=date('H');
    $minute=date('i');
    $seconds=date('s');

    $datess=$year."-".$month."-".$day;
    $timesss = $hour.":".$minute.":".$seconds;
    $date_time=$datess." ".$timesss;
if($_SESSION['studenttype']=="shscholar"){
	$yourvotersid ="";
}else{
	
	$yourvotersid = $_POST['yourvotersid'];
	
	
}
$applicationform = $_POST['applicationform'];
$birthcertificate = $_POST['birthcertificate'];
$schoolclearance = $_POST['schoolclearance'];
$gradereport = $_POST['gradereport'];
$housesketch = $_POST['housesketch'];
$barangayclearance = $_POST['barangayclearance'];
$parentvotersid = $_POST['parentvotersid'];
$indigency = $_POST['indigency'];

$itr = $_POST['itr'];
$picture = $_POST['picture'];


// if($_SESSION['studenttype']=="fullscholar"){
// 	$studentregistration = 0;
// }else{
// 	$studentregistration = $_POST['studentregistration'];
// }


	

	$sql = "INSERT INTO tbl_college_requirements (user_id,applicationform,birthcertificate,gradereport,schoolclearance,parentvotersid,yourvotersid,housesketch,barangayclearance,itr,indigency,picture)VALUES ('$student_id','$applicationform','$birthcertificate','$gradereport','$schoolclearance','$parentvotersid','$yourvotersid','$housesketch','$barangayclearance','$itr','$indigency','$picture')";
	$conn->query($sql);

//Birth
	if($birthcertificate==1){
		$remarks = "Approved birth certificate";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		 	$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
		 	$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }
	}else if($birthcertificate==0){
		$remarks = "Disapproved birth certificate";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		  	$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
		 	$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }		
	}
//School Clearance
	if($schoolclearance==1){
		$remarks = "Approved school clearance";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		 	$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
		 	$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }
	}else if($schoolclearance==0){
		$remarks = "Disapproved school clearance";
		$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
		 $result = $conn->query($query);
		 if ($result->num_rows <= 0){
		  	$sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
			$conn->query($sql1);
		 }else{
		 	$row = $result->fetch_assoc();
		 	$logid=$row['id'];
		 	$sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
			$conn->query($sql1);
		 }		
	}
//Grade Report
if($gradereport==1){
	$remarks = "Approved grade report";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($gradereport==0){
	$remarks = "Disapproved grade report";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
//$housesketch = $_POST['housesketch'];
if($housesketch==1){
	$remarks = "Approved house sketch";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($housesketch==0){
	$remarks = "Disapproved house sketch";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
//$barangayclearance = $_POST['barangayclearance'];
if($barangayclearance==1){
	$remarks = "Approved barangay clearance";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($barangayclearance==0){
	$remarks = "Disapproved barangay clearance";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
//$parentvotersid = $_POST['parentvotersid'];
if($parentvotersid==1){
	$remarks = "Approved parent voters id";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($parentvotersid==0){
	$remarks = "Disapproved parent voters id";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
//$indigency = $_POST['indigency'];
if($indigency==1){
	$remarks = "Approved indigency";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($indigency==0){
	$remarks = "Disapproved indigency";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}

//$itr = $_POST['itr'];
if($itr==1){
	$remarks = "Approved income tax return";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($itr==0){
	$remarks = "Disapproved income tax return";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
//$picture = $_POST['picture'];
if($picture==1){
	$remarks = "Approved 2 x 2 picture";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($picture==0){
	$remarks = "Disapproved 2 x 2 picture";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
//$applicationform = $_POST['applicationform'];
if($applicationform==1){
	$remarks = "Approved application form";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		 $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
	 
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }
}else if($applicationform==0){
	$remarks = "Disapproved application form";
	$query="SELECT * FROM tbl_log WHERE remarks = '$remarks' AND student_id='$student_id'";
	 $result = $conn->query($query);
	 if ($result->num_rows <= 0){
		  $sql1 = "INSERT INTO tbl_log (user_id,student_id,process,remarks,dates,timess,date_time) values ('$user_id','$student_id','$process','$remarks','$datess','$timesss','$date_time')";
		$conn->query($sql1);
	 }else{
		 $row = $result->fetch_assoc();
		 $logid=$row['id'];
		 $sql1 = "UPDATE tbl_log SET dates='$datess', timess='$timesss',remarks='$remarks', user_id='$user_id',date_time='$date_time' WHERE id='$logid'";
		$conn->query($sql1);
	 }		
}
	// $studenttype=$_SESSION['studenttype'];
	
	echo '<script language="javascript">';
              echo 'alert("Successfully update requirements")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("newCollegeRecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("newSHS.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("newCollegeFullScholar.php","_self")';
	}
  		
  		echo '</script>';
  	

?>