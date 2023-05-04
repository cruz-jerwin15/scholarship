<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];

$fullname=$_POST['fullname'];
$livingstatus=$_POST['livingstatus'];
$age=$_POST['age'];
$civil=$_POST['civil'];
$grant=$_POST['grant'];
$hea=$_POST['hea'];
$occupation=$_POST['occupation'];
$monthly_salary=$_POST['monthly_salary'];

$sql="SELECT * from tbl_siblingsinfo where academic_year='$academic_year' AND application_no='$application_no' AND fullname='$fullname'";
$result = $conn->query($sql);
	if ($result->num_rows > 0){
			 echo '<script language="javascript">';
              echo 'alert("Siblings already in the list")';
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
	}else{
		$insert = "INSERT INTO tbl_siblingsinfo (
					academic_year,
					application_no,
					fullname,
					livingwith,
					age,
					civil,
					hea,
					typegrant,
					occupation,
					monthly_salary)
					VALUES (
					'$academic_year',
					'$application_no',
					'$fullname',
					'$livingstatus',
					'$age',
					'$civil',
					'$hea',
					'$grant',
					'$occupation',
					'$monthly_salary')";
		$conn->query($insert);
		 echo '<script language="javascript">';
              echo 'alert("Successfully add siblings")';
              echo '</script>';
			echo '<script language="javascript">';
				// echo 'localStorage.setItem("notif","1")';
		  	 if($_SESSION['status']=="OK"){
         echo 'window.open("updatestudent.php","_self")';
    }else{
         echo 'window.open("studentregister.php","_self")';
    }

		  		echo '</script>';
	}

		

?>