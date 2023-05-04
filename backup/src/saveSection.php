<?php
session_start();
include 'config.php';



$section_title = $_POST['section_title'];
$instruction = $_POST['instruction'];
$section_color = $_POST['section_color'];
$timer = $_POST['timer'];


$section_title_1 = addslashes($section_title);
$instruction_1 = addslashes($instruction);




date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;



$insert2 = "INSERT INTO tbl_section
			(title,
			 instruction,
			 colors,
			 timer,
			 date_created) 
			 VALUES 
			 ('$section_title_1',
			 '$instruction_1',
			 '$section_color',
			 '$timer',
			  '$dates')";
$conn->query($insert2);

$_SESSION['section']="NULL";

 	echo '<script language="javascript">';
              echo 'alert("You successfully add new section")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("sectionList.php","_self")';
  		echo '</script>';

?>