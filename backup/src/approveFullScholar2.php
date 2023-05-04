<?php
session_start();
include 'config.php';
$studenttype=$_SESSION['studenttype'];
$users = $_POST['users'];

$remarks = $_POST['remarks'];
$pincode = $_POST['pin'];




$sqla = "SELECT * FROM tbl_pin WHERE pin='$pincode'";
$resulta = $conn->query($sqla);   
if($resulta->num_rows>0){
    $status="INTERVIEW";
    $update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
    $conn->query($update3);
    echo '<script language="javascript">';
              echo 'alert("You successfully send new applicant for interview")';
              echo '</script>';
}else{
    echo '<script language="javascript">';
              echo 'alert("Wrong pin code.")';
              echo '</script>';
}




 	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($studenttype=="fullscholar"){
  		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="collegerecipient"){
  		echo 'window.open("newCollegeRecipient.php","_self")';
  		echo '</script>';
  	}else if($studenttype=="shscholar"){
      echo 'window.open("newSHS.php","_self")';
      echo '</script>';
    }
?>