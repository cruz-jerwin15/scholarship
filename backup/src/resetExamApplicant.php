<?php
session_start();
include 'config.php';
require 'smsSend.php';

$users = $_POST['users'];



$delete = "DELETE FROM tbl_answer_student WHERE user_id='$users'";
$conn->query($delete);


$delete1 = "DELETE FROM tbl_student_exam WHERE user_id='$users'";
$conn->query($delete1);




 echo '<script language="javascript">';
              echo 'alert("You successfully reset applicant examination.")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	echo 'window.open("interviewCollegeFullScholar.php","_self")';
  		
  		echo '</script>';

?>