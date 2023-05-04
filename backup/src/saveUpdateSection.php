<?php
session_start();
include 'config.php';



$section_title = $_POST['section_title'];
$instruction = $_POST['instruction'];
$section_color = $_POST['section_color'];
$timer = $_POST['timer'];


$section_title_1 = addslashes($section_title);
$instruction_1 = addslashes($instruction);




$id=$_SESSION['section_id'];



$insert2 = "UPDATE tbl_section
			SET title='$section_title_1',instruction='$instruction_1',colors='$section_color',timer='$timer'
			WHERE id='$id'";
$conn->query($insert2);

$_SESSION['section']="NULL";

 	echo '<script language="javascript">';
              echo 'alert("You successfully update section")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("sectionList.php","_self")';
  		echo '</script>';

?>