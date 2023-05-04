<?php
session_start();
include 'config.php';



$exam_title = $_POST['exam_title'];
$instruction = $_POST['instruction'];
$exam_color = $_POST['exam_color'];




$exam_title_1 = addslashes($exam_title);
$instruction_1 = addslashes($instruction);




$id=$_SESSION['exam_id'];



$update ="UPDATE tbl_exam SET title='$exam_title_1',instruction='$instruction_1', colors='$exam_color' WHERE id='$id'";
$conn->query($update);

$_SESSION['exam']="NULL";

 	echo '<script language="javascript">';
              echo 'alert("You successfully update exam")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examList.php","_self")';
  		echo '</script>';

?>