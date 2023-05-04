<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$lastname = $_POST['lastname'];
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

$sql="SELECT * from tbl_studentinfo where user_id='$userid'";
$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$update1 = "UPDATE tbl_studentinfo SET 
		firstname='$firstname', 
		lastname='$lastname',
		middlename='$middlename',
		gender='$gender',
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
		$conn->query($update1);

		$update = "UPDATE tbl_admin SET firstname='$firstname', lastname='$lastname' WHERE id='$userid'";
		$conn->query($update);

		$_SESSION['firstname']=$firstname;
		$_SESSION['lastname']=$lastname;

		$_SESSION['counter']=3;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("educationalinfo.php","_self")';
  		echo '</script>';

	}else{

		$insert = "INSERT INTO tbl_studentinfo (user_id,firstname,lastname,middlename,gender,bday,birthplace,birthorder,citizenship,religion,housenumber,street,barangay,facebook,phone)VALUES ('$userid','$firstname','$lastname','$middlename','$gender','$birthday','$birthplace','$birthorder','$citizenship','$religion','$housenumber','$street','$barangay','$facebook','$phone')";
		$conn->query($insert);
		$update = "UPDATE tbl_admin SET firstname='$firstname', lastname='$lastname' WHERE id='$userid'";
		$conn->query($update);

		$_SESSION['firstname']=$firstname;
		$_SESSION['lastname']=$lastname;

		$_SESSION['counter']=3;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("educationalinfo.php","_self")';
  		echo '</script>';

	}



?>