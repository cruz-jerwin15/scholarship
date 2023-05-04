<?php
session_start();
include 'config.php';

$quest_id = $_POST['quest'];
$section_id = $_SESSION['section_id'];
foreach($quest_id as $quest) {
  if($quest==0){

  }else{
  	// echo $quest."<br>";
  	$delete = "DELETE FROM tbl_section_quest WHERE id='$quest'";
	$conn->query($delete);
  }
}




 	echo '<script language="javascript">';
              echo 'alert("You successfully remove question to the list")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	$path="setViewQuestion.php?id=".$section_id;
  		echo 'window.open("'.$path.'","_self")';
  		echo '</script>';

?>