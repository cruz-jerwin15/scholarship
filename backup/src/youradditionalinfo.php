<?php session_start();
require 'config.php';

$userid = $_POST['userid'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];
$informed = $_POST['informed'];
if($informed=="YDO-Scholarship Page"){
  $nameofficial = "";
}else{
  $nameofficial = $_POST['nameofficial'];
}
$working_student = $_POST['working_student'];
$living_with = $_POST['living_with'];
$occupation = "NONE";
$hea = "NONE";
$parent_ofw = $_POST['parent_ofw'];
$relatives_ofw = $_POST['relatives_ofw'];
$pwd = $_POST['pwd'];
$single_parent = $_POST['single_parent'];
$parent_separated = $_POST['parent_separated'];
 

	 $sql="SELECT * from tbl_added_info where academic_year='$academic_year' AND application_no='$application_no'";
  	 $result = $conn->query($sql);
  	 if ($result->num_rows < 1){
     
  	 	$insert= "INSERT INTO tbl_added_info 
                    (academic_year,
                    application_no,
                    informed,
                    working_student,
                    living_with,
                    occupation,
                    hea,
                    parent_ofw,
                    relatives_ofw,
                    pwd,
                    single_parent,
                    parent_separated)
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$informed',
                    '$working_student',
                    '$living_with',
                    '$occupation',
                    '$hea',
                    '$parent_ofw',
                    '$relatives_ofw',
                    '$pwd',
                    '$single_parent',
                    '$parent_separated')";
        $conn->query($insert);
        $insert1= "INSERT INTO  tbl_informed (academic_year,application_no,officialname)
          VALUES ('$academic_year','$application_no','$nameofficial')";
          $conn->query($insert1);
         $_SESSION['step4']=1;
         echo '<script language="javascript">';
              echo 'alert("Successfully added additional information")';
              echo '</script>';
        echo '<script language="javascript">';
        //   // echo 'localStorage.setItem("notif","1")';
         
          echo 'window.open("studentregister.php","_self")';
         
           
            echo '</script>';
  	 }else{
  	 	$update = "UPDATE tbl_added_info SET 
					informed='$informed',
                    working_student='$working_student',
                    living_with='$living_with',
                    occupation='$occupation',
                    hea='$hea',
                    parent_ofw='$parent_ofw',
                    relatives_ofw='$relatives_ofw',
                    pwd='$pwd',
                    single_parent='$single_parent',
                    parent_separated='$parent_separated'
	WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update);
    $update1 = "UPDATE tbl_informed SET 
          officialname='$nameofficial'
  WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $conn->query($update1);
    $_SESSION['step4']=1;
		  echo '<script language="javascript">';
              echo 'alert("Successfully updated additional information")';
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