<?php
session_start();
include 'config.php';




$choice_text_a = $_POST['choice_text_a'];
$choice_text_b = $_POST['choice_text_b'];
$choice_text_c = $_POST['choice_text_c'];
$choice_text_d = $_POST['choice_text_d'];
$choice_text_e = $_POST['choice_text_e'];
$answer = $_POST['answer'];
$examtype = $_POST['examtype'];



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


date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;

  		$file_name = $_FILES['question_image']['name'];
      $file_size =$_FILES['question_image']['size'];
      $file_tmp =$_FILES['question_image']['tmp_name'];
      $file_type=$_FILES['question_image']['type'];
      $file_ext = explode('.',$file_name);
      $file_ext = end($file_ext);
      $file_ext = strtolower($file_ext);

      $file_ext=strtolower(end(explode('.',$file_name)));
      
    $temp = explode(".", $_FILES["question_image"]["name"]);
    $count++;
    $enc = md5($count);
	$newfilename = round(microtime(true)) . $enc .'.' . end($temp);

     $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="The extension of the image of your question is not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 200000){
         $errors[]='The file size of your question image must be equal or less  than 200 KB';
      }




$insert2 = "INSERT INTO tbl_questbank 
			(quest_type,
			 question_image,
			 choice_text_a,
			 choice_text_b,
			 choice_text_c,
			 choice_text_d,
			 choice_text_e,
			 answer,
			 date_created) 
			 VALUES 
			 ('$examtype',
			  '$newfilename',
			  '$choice_text_a_1',
			  '$choice_text_b_1',
			  '$choice_text_c_1',
			  '$choice_text_d_1',
			  '$choice_text_e_1',
			  '$correct_answer',
			  '$dates')";
$conn->query($insert2);

move_uploaded_file($file_tmp,"questimage/".$newfilename);

 	echo '<script language="javascript">';
              echo 'alert("You successfully add new question")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("questBank.php","_self")';
  		echo '</script>';

?>