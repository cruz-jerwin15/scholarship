<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$email = $_POST['email'];
$academic_year = $_POST['academic_year'];
$control_number = $_POST['control_number'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$birthday = $_POST['birthday'];
$birthplace = $_POST['birthplace'];
$birthorder = $_POST['birthorder'];
$civil = $_POST['civil'];
$gender = $_POST['gender'];
$citizen = $_POST['citizen'];
$religion = $_POST['religion'];
$housenumber = $_POST['housenumber'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$years_residency = $_POST['years_residency'];

$contactnumber = $_POST['contactnumber'];
$course = $_POST['course'];
$years = $_POST['years'];

$school = $_POST['school'];
$schooltype = $_POST['schooltype'];
$school_address = $_POST['school_address'];
$last_school_attended = $_POST['last_school_attended'];
$last_school_address = $_POST['last_school_address'];
$gwa = $_POST['gwa'];

if($_SESSION['studenttype']=="fullscholar"){
    $exam_rating = $_POST['exam_rating'];
}else{
    $exam_rating = 0;
}


$living_with_family = $_POST['living_with_family'];
$total_number_family = $_POST['total_number_family'];
$source_of_living = $_POST['source_of_living'];
$house = $_POST['house'];
$pay_monthly = $_POST['pay_monthly'];




	$update = "UPDATE tbl_studentinfo SET 
					firstname='$firstname',
                    middlename='$middlename',
                    lastname='$lastname',
                    gender='$gender',
                    bday='$birthday',
                    birthplace='$birthplace',
                    birthorder='$birthorder',
                    civil='$civil',
                    citizenship='$citizen',
                    religion='$religion',
                    housenumber='$housenumber',
                    street='$street',
                    barangay='$barangay',
                    years_residency='$years_residency',
                    school='$school',
                    schooltype='$schooltype',
                    school_address='$school_address',
                    course='$course',
                    last_school='$last_school_attended',
                    last_school_address='$last_school_address',
                    gradelevel='$years',
                    gwa='$gwa',
                    exam_rating='$exam_rating',
                    living_with_family='$living_with_family',
                    total_family_member='$total_number_family',
                    source_of_living='$source_of_living',
                    type_house='$house',
                    monthly_rent='$pay_monthly',
                    phone='$contactnumber'
	WHERE academic_year='$academic_year' AND application_no='$control_number'";
		$conn->query($update);

	
	echo '<script language="javascript">';
              echo 'alert("Successfully updated student info")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

    if($_SESSION['studenttype']=="fullscholar"){
        echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
    }else if($_SESSION['studenttype']=="collegerecipient"){
        echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
    }else if($_SESSION['studenttype']=="shscholar"){
        echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
    }
  		
  		echo '</script>';





?>