<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];

$typescholar=$_SESSION['studenttype'];

	$sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$academic_year = $row['academic_year'];
	$application_no=$row['application_no'];

	$renewstats="OK";
    $update = "UPDATE tbl_admin SET status='$renewstats' WHERE academic_year='$academic_year' AND application_no='$application_no'";
	$conn->query($update);

	$status1="OPEN";
	$status2="CURRENT";
	$sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
	  $resulta = $conn->query($sqla);   
	 $rowa = $resulta->fetch_assoc();

	$acad = $rowa['id'];
	$pross="RENEW OK";
	$remarks="NONE";
	$remove="";
	  $insert= "INSERT INTO tbl_remarks
                            (academic_id,
                           user_id,
                           scholars,
                           process,
                           remarks,
                           remove
                           )
                         VALUES (
                           '$acad',
                           '$userid',
                           '$typescholar',
                           '$pross',
                           '$remarks',
                           '$remove'
                 )";
     $conn->query($insert);



	
	echo '<script language="javascript">';
              echo 'alert("Successfully send scholars to current scholars.")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("renew_collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("renew_seniorhigh.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("renew_collegefullscholar.php","_self")';
	}
  		
  		echo '</script>';
  	

?>