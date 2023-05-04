<?php session_start();
require 'config.php';
$userid	=$_POST['userid'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$relationship=$_POST['relationship'];
$grant=$_POST['grant'];


$sql="SELECT * from tbl_siblingsinfo where user_id='$userid' AND firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname'";
$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$_SESSION['notif']="2";
	}else{
		$insert = "INSERT INTO tbl_siblingsinfo (user_id,lastname,firstname,middlename,typegrant,relationship)VALUES ('$userid','$lastname','$firstname','$middlename','$grant','$relationship')";
		$conn->query($insert);
		$_SESSION['notif']="1";
	}

		$_SESSION['counter']=5;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("siblings.php","_self")';
  		echo '</script>';

?>