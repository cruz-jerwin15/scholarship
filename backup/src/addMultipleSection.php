<?php
session_start();
include 'config.php';

$section = $_POST['section'];
$exam_id = $_SESSION['exam_id'];
foreach ($section as $sec) {
  if($sec==0){

  }else{
  	$insert2 = "INSERT INTO tbl_exam_section
			(exam_id,
			 section_id) 
			 VALUES 
			 ('$exam_id',
			 '$sec')";
	$conn->query($insert2);
  }
}




 	echo '<script language="javascript">';
              echo 'alert("You successfully add new section to the list")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examList.php","_self")';
  		echo '</script>';

?>