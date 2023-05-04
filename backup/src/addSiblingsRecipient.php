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
			 echo '<script language="javascript">';
              echo 'alert("Siblings already in the list")';
              echo '</script>';
			echo '<script language="javascript">';
				// echo 'localStorage.setItem("notif","1")';
		  		echo 'window.open("viewUpdateNewCollegeRecipient.php?id='.$userid.'","_self")';
		  		echo '</script>';
	}else{
		$insert = "INSERT INTO tbl_siblingsinfo (user_id,lastname,firstname,middlename,typegrant,relationship)VALUES ('$userid','$lastname','$firstname','$middlename','$grant','$relationship')";
		$conn->query($insert);
		 echo '<script language="javascript">';
              echo 'alert("Successfully add siblings")';
              echo '</script>';
			echo '<script language="javascript">';
				// echo 'localStorage.setItem("notif","1")';
		  		echo 'window.open("viewUpdateNewCollegeRecipient.php?id='.$userid.'","_self")';
		  		echo '</script>';
	}

		

?>