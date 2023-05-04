<?php
session_start();
include 'config.php';

$id=$_SESSION['questid'];


$question_text = $_POST['question_text'];
$choice_text_a = $_POST['choice_text_a'];
$choice_text_b = $_POST['choice_text_b'];
$choice_text_c = $_POST['choice_text_c'];
$choice_text_d = $_POST['choice_text_d'];
$choice_text_e = $_POST['choice_text_e'];
$answer = $_POST['answer'];



$question_text_1 = addslashes($question_text);
$choice_text_a_1 = addslashes($choice_text_a);
$choice_text_b_1 = addslashes($choice_text_b);
$choice_text_c_1 = addslashes($choice_text_c);
$choice_text_d_1 = addslashes($choice_text_d);
$choice_text_e_1 = addslashes($choice_text_e);

$correct_answer="";
if($answer=="A"){
	$correct_answer=$choice_text_a_1;
}else if($answer=="B"){
	$correct_answer=$choice_text_b_1;
}else if($answer=="C"){
	$correct_answer=$choice_text_c_1;
}else if($answer=="D"){
	$correct_answer=$choice_text_d_1;
}else if($answer=="E"){
	$correct_answer=$choice_text_e_1;
}





$insert2 = "UPDATE tbl_questbank 
			SET question_text='$question_text_1',
			 choice_text_a='$choice_text_a_1',
			 choice_text_b='$choice_text_b_1',
			 choice_text_c='$choice_text_c_1',
			 choice_text_d='$choice_text_d_1',
			 choice_text_e='$choice_text_e_1',
			 answer='$correct_answer'
			 WHERE id='$id'";
			
$conn->query($insert2);



 	echo '<script language="javascript">';
              echo 'alert("You successfully update question")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("questBank.php","_self")';
  		echo '</script>';

?>