<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];


	$sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$email = $row['username'];
	$academic_year = $row['academic_year'];
	$application_no=$row['application_no'];

	$status="OPEN";
	$sql1 = "SELECT * FROM tbl_assesment WHERE status='$status'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$academic_id = $row1['id'];
	// echo $academic_id;


	$sql2 = "SELECT * FROM tbl_renew WHERE academic_id='$academic_id' AND 
			academic_year='$academic_year' AND application_no='$application_no'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	 if ($result2->num_rows <= 0){
	 	  $insert= "INSERT INTO tbl_renew
                           (academic_id,
                          academic_year,
                          application_no
                          )
                        VALUES (
                          '$academic_id',
                          '$academic_year',
                          '$application_no'
                )";
            $conn->query($insert);
	 }else{

	 }

	 $sql3 = "SELECT * FROM tbl_renew_label WHERE academic_id='$academic_id' AND 
			academic_year='$academic_year' AND application_no='$application_no'";
	$result3 = $conn->query($sql3);
	$row3 = $result3->fetch_assoc();
	 if ($result3->num_rows <= 0){
	 	  $insert1= "INSERT INTO tbl_renew_label
                           (academic_id,
                          academic_year,
                          application_no
                          )
                        VALUES (
                          '$academic_id',
                          '$academic_year',
                          '$application_no'
                )";
            $conn->query($insert1);
	 }else{

	 }


	 $sqla = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
	$resulta = $conn->query($sqla);
	$rowa = $resulta->fetch_assoc();
	$fullname =$rowa['firstname']." ".$rowa['lastname'];

	    $to = $email;
         $subject = "Renewal Requirements";
        $message = "Hi ".$fullname.", 

<br><br>Congratulations!

<br><br>You have been recommended for renewal this coming 1st Semester/SY 2020-2021 for Sto. Tomas Scholarship Program and hereby informed that you are qualified and that you are required to submit your new Registration Form/Enrollment Form SY 2020-2021 and new School ID.

<br><br> You may now submit your requirements online.

<br><br>Please be guided on the following procedure:
<br>1. Just Log in to www.cityofstotomas.gov.ph/scholarship using the unique password which you have received from YDO's 1st email (for Assessment Online.)
<br>2. Proceed to Renewal Requirements Tab at the left corner under Main Menu then upload the requirements (new Registration Form/Enrollment Form SY 2020-2021 and new School ID)

<br><br>This is a system-generated email. Please do not reply.

<br><br>Thank you and keep safe.

<br><br>From:
<br>YDO";
                        
                         
                         $header = "From:youthdevelopment@cityofstotomas.gov.ph \r\n";
                         $header .= "MIME-Version: 1.0\r\n";
                         $header .= "Content-type: text/html\r\n";
                         
                         $retval = mail ($to,$subject,$message,$header);






	// $sql = "UPDATE tbl_grade_submit SET grades='$newgrade' WHERE id='$userid'";
	// $conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("Successfully send email to scholars")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("collegefullscholar.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("seniorhigh.php","_self")';
	}
  		echo '</script>';


?>