<?php
session_start();
include 'config.php';


$exam = $_SESSION['exam_number'];



$section_id =$_SESSION['section_id'];

if($exam_time<=1){
$newexam = $exam+100;
}else{
	$newexam = $exam+1;
}



// echo $_SESSION['exam_time'];

$answer=$_POST['answer'];
$answerid=$_POST['answerid'];


$_SESSION['exam_number']=$newexam;

date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;

foreach ($answer as $key => $ans) {
	$quest_id= $answerid[$key];
	if(strlen($ans)<=0){
		$ans1="NO ANSWER";
	}else{
		$ans1 = addslashes($ans);
	}
	
	
}



	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	
		echo 'window.open("examsss.php","_self")';
	
  		
  		echo '</script>';

?>