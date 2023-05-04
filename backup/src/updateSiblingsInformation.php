<?php
session_start();
include 'config.php';

$id = $_POST['ids'];
$fullname=$_POST['fullname'];
$age=$_POST['age'];
$civil=$_POST['civil'];
$livingstatus=$_POST['livingstatus'];
$grant=$_POST['grant'];
$hea=$_POST['hea'];
$occupation=$_POST['occupation'];
$monthly_salary=$_POST['monthly_salary'];
$share=$_POST['share'];
	$sql = "UPDATE tbl_siblingsinfo SET fullname='$fullname', age='$age',civil='$civil',typegrant='$grant',livingwith='$livingstatus',hea='$hea',occupation='$occupation',monthly_salary='$monthly_salary',help='$share' WHERE id='$id'";
	$conn->query($sql);

	$sql1="SELECT * from tbl_siblingsinfo WHERE id='$id'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$academic_year=$row1['academic_year'];
	$application_no = $row1['application_no'];

	$sql2="SELECT * from tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	$userid=$row2['id'];
	
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated sibling information")';
              echo '</script>';
	echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
      
      echo '</script>';


?>