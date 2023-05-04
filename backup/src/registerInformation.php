<?php session_start();
require 'config.php';
$userid = $_SESSION['newid'];
$email = $_POST['email'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['control_number'];


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
$street1 = $_POST['street'];
$street = addslashes($street1);
$barangay = $_POST['barangay'];
$years_residency = $_POST['years_residency'];



$contactnumber = $_POST['contactnumber'];
$course = $_POST['course'];
$years = $_POST['years'];

$_SESSION['grades']=$years;

$school1 = $_POST['school'];
$school = addslashes($school1);
$schooltype = $_POST['schooltype'];
$school_address1 = $_POST['school_address'];
$school_address = addslashes($school_address1);
$last_school_attended = $_POST['last_school_attended'];
$last_school_address1 = $_POST['last_school_address'];
$last_school_address = addslashes($last_school_address1);
$gwa = $_POST['gwa'];
$exam_rating = 0;




$living_with_family = $_POST['living_with_family'];
$total_number_family = $_POST['total_number_family'];
$source_of_living1 = $_POST['source_of_living'];
$source_of_living = addslashes($source_of_living1);
$house = $_POST['house'];
if(($house=="OWNED BY FAMILY")||($house=="OWNED BY RELATIVES")){
    $pay_monthly = "";
}else{
    $pay_monthly = $_POST['pay_monthly'];
}




    if($_SESSION['usertype']=="shs"){

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
                    living_with_family='$living_with_family',
                    total_family_member='$total_number_family',
                    source_of_living='$source_of_living',
                    type_house='$house',
                    monthly_rent='$pay_monthly',
                    phone='$contactnumber'
                   
    WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $conn->query($update);
    }else {

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
                    living_with_family='$living_with_family',
                    total_family_member='$total_number_family',
                    source_of_living='$source_of_living',
                    type_house='$house',
                    monthly_rent='$pay_monthly',
                    phone='$contactnumber'
    WHERE academic_year='$academic_year' AND application_no='$application_no'";

     $conn->query($update);
   
    }

	 $sql4="SELECT * from tbl_updated where academic_year='$academic_year' AND application_no='$application_no'";
     $result4 = $conn->query($sql4);
     if ($result4->num_rows < 1){
         $insert4= "INSERT INTO tbl_updated
                    (academic_year,
                    application_no
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no'
                )";
        $conn->query($insert4);
     }else{
        $stat="YES";
        $update4 = "UPDATE tbl_updated SET 
                    status='$stat'
        WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $conn->query($update4);
     }


	$_SESSION['step1']=1;
     $_SESSION['reg_step']=$_SESSION['reg_step']+1;
	echo '<script language="javascript">';
              echo 'alert("Successfully updated your information")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';

     echo 'window.open("educationalinformation.php","_self")';
  		
  		echo '</script>';





?>