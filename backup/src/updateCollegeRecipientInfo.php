<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$lastname = $_POST['lastnames'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$birthday = $_POST['birthday'];
$birthplace = $_POST['birthplace'];
$birthorder = $_POST['birthorder'];
$gender = $_POST['gender'];
$religion = $_POST['religion'];
$citizenship = $_POST['citizenship'];
$housenumber = $_POST['housenumber'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$facebook = $_POST['facebook'];
$phone = $_POST['phone'];


	$update = "UPDATE tbl_studentinfo SET lastname='$lastname',
	firstname='$firstname',
	middlename = '$middlename',gender='$gender',
	bday='$birthday',
	birthplace='$birthplace',
	birthorder='$birthorder',
	citizenship='$citizenship',
	religion='$religion',
	housenumber='$housenumber',
	street='$street',
	barangay='$barangay',
	facebook='$facebook',
	phone='$phone'
	WHERE user_id='$userid'";
		$conn->query($update);

	$update1 = "UPDATE tbl_admin SET lastname='$lastname',
	firstname='$firstname' WHERE id='$userid'";
		$conn->query($update1);

	
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated student info")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateCollegeRecipient.php?id='.$userid.'","_self")';
  		echo '</script>';





?>