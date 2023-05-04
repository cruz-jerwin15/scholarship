<?php
session_start();
include 'config.php';

$email = $_POST['email'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$birthday = $_POST['birthday'];
$birthplace = $_POST['birthplace'];
$birthorder = $_POST['birthorder'];
$gender = $_POST['gender'];
$citizen = $_POST['citizen'];
$religion = $_POST['religion'];
$housenumber = $_POST['housenumber'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$contactnumber = $_POST['contactnumber'];
$facebook = $_POST['facebook'];
$course = $_POST['course'];
$years = $_POST['years'];
$school = $_POST['school'];
$schooltype = $_POST['schooltype'];


$password = md5($birthday);
$image="avatar.png";
$usertype="college";
$typescholar="fullscholar";
$status="PASS";

  $year =date('Y');
  $month=date('m');
  $day=date('d');

  $dates = $year."-".$month."-".$day;
  $date=date_create($dates,timezone_open("Asia/Manila"));
  $dates = date_format($date,"Y-m-d");

$sql="SELECT * from tbl_admin where username='$email'";
$result = $conn->query($sql);
if ($result->num_rows < 1){
	$sql1="SELECT * from  tbl_studentinfo where lastname='$lastname' AND firstname='$firstname' AND middlename='$middlename'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows < 1){
		$insert= "INSERT INTO tbl_admin (username,usertype,password,lastname,firstname,image,dates,typescholar,status)
		VALUES ('$email','$usertype','$password','$lastname','$firstname','$image','$dates','$typescholar','$status')";
		$conn->query($insert);
		 $last_id = $conn->insert_id;

 $inserta= "INSERT INTO tbl_whatschool (userid,school,schooltype,course,years)
    VALUES ('$last_id','$school','$schooltype','$course','$years')";
    $conn->query($inserta);

        $insert1 = "INSERT INTO tbl_studentinfo (user_id,firstname,lastname,middlename,gender,bday,birthplace,birthorder,citizenship,religion,housenumber,street,barangay,facebook,phone)VALUES ('$last_id','$firstname','$lastname','$middlename','$gender','$birthday','$birthplace','$birthorder','$citizen','$religion','$housenumber','$street','$barangay','$facebook','$contactnumber')";
        $conn->query($insert1);

         echo '<script language="javascript">';
              echo 'alert("Successfully add student information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
	}else{
		 echo '<script language="javascript">';
              echo 'alert("Student is already in the system")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  	 echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
	}


	
}else{
	 echo '<script language="javascript">';
              echo 'alert("Email is not available")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  	 echo 'window.open("newCollegeFullScholar.php","_self")';
  		echo '</script>';
}

?>