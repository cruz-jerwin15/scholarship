<?php session_start();
require 'config.php';
$userid	=$_POST['userid'];
$school=$_POST['school'];
$schooladdress=$_POST['schooladdress'];
$highestyear=$_POST['highestyear'];
$genweight =$_POST['genweight'];
$bursary=$_POST['grant'];
$scholar=$_POST['scholar'];


$sql="SELECT * from tbl_educational where user_id='$userid'";
$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$update1 = "UPDATE tbl_educational SET 
		school='$school', 
		address='$schooladdress',
		highestyear='$highestyear',
		genweight='$genweight',
		bursary='$bursary'
		WHERE user_id='$userid'";
		$conn->query($update1);
	
		$update2 = "UPDATE tbl_admin SET 
		typescholar='$scholar'
		WHERE id='$userid'";
		$conn->query($update2);

		$_SESSION['counter']=4;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("familybackground.php","_self")';
  		echo '</script>';
	}else{
		$insert = "INSERT INTO tbl_educational (user_id,school,address,highestyear,genweight,bursary)VALUES ('$userid','$school','$schooladdress','$highestyear','$genweight','$bursary')";
		$conn->query($insert);

		$update2 = "UPDATE tbl_admin SET 
		typescholar='$scholar'
		WHERE id='$userid'";
		$conn->query($update2);

		$_SESSION['counter']=4;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("familybackground.php","_self")';
  		echo '</script>';
	}
?>