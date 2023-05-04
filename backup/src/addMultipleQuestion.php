<?php
session_start();
include 'config.php';

$quest_id = $_POST['quest'];
$section_id = $_SESSION['section_id'];
foreach ($quest_id as $quest) {
  if($quest==0){

  }else{
  	$insert2 = "INSERT INTO tbl_section_quest
			(section_id,
			 quest_id) 
			 VALUES 
			 ('$section_id',
			 '$quest')";
	$conn->query($insert2);
  }
}




 	echo '<script language="javascript">';
              echo 'alert("You successfully add new question to the list")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("sectionList.php","_self")';
  		echo '</script>';

?>