<?php
session_start();
include 'config.php';



$exam_title = $_POST['exam_title'];
$instruction = $_POST['instruction'];
$exam_color = $_POST['exam_color'];

// $answer = $_POST['answer'];
// $examtype = $_POST['examtype'];


$exam_title_1 = addslashes($exam_title);
$instruction_1 = addslashes($instruction);




date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;



$insert2 = "INSERT INTO tbl_exam
			(title,
			 instruction,
			 colors,
			 date_created)
			 VALUES
			 ('$exam_title_1',
			 '$instruction_1',
			 '$exam_color',
			  '$dates')";
$conn->query($insert2);

$_SESSION['exam']="NULL";

 	echo '<script language="javascript">';
              echo 'alert("You successfully add new exam")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examList.php","_self")';
  		echo '</script>';

?>
