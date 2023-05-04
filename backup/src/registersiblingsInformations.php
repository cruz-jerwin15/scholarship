<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];

$fullname=addslashes($_POST['fullname']);
$livingstatus=addslashes($_POST['livingstatus']);
$age=$_POST['age'];
$civil=addslashes($_POST['civil']);
$grant=addslashes($_POST['grant']);
$hea=addslashes($_POST['hea']);
$occupation=addslashes($_POST['occupation']);
$monthly_salary=addslashes($_POST['monthly_salary']);
$share=$_POST['share'];

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
					monthly_salary,
					help)
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
					'$monthly_salary',
					'$share')";
		$conn->query($insert);

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
	}

		

?>