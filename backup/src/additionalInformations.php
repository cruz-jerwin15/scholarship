<?php session_start();
require 'config.php';

$userid = $_POST['userid'];
// $edit_status=$_SESSION['editstatus'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];
$informed = addslashes($_POST['informed']);
if($informed=="YDO-Scholarship Page"){
  $nameofficial = "";
}else{
  $nameofficial = addslashes($_POST['nameofficial']);
}
$working_student = $_POST['working_student'];



$living_with = $_POST['living_with'];
$occupation = "NONE";
$hea = "NONE";
$parent_ofw = $_POST['parent_ofw'];
$relatives_ofw = $_POST['relatives_ofw'];
$pwd = $_POST['pwd'];
$student_pwd = $_POST['student_pwd'];
$single_parent = $_POST['single_parent'];
$parent_separated = $_POST['parent_separated'];

if($living_with=="INDEPENDENT/SELF SUPPORTING"){
  $self_support = "YES";
}else{
  $self_support = "NO";
}







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
                     student_pwd,
                     self_supporting,
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
                    '$student_pwd',
                    '$self_support',
                    '$parent_separated')";
        $conn->query($insert);
        $insert1= "INSERT INTO  tbl_informed (academic_year,application_no,officialname)
          VALUES ('$academic_year','$application_no','$nameofficial')";
          $conn->query($insert1);
          // if($edit_status=="PREAPPLICATION"){
          //   $status11="NEWAPPLICANT";
          // }else{
          //    $status11=$edit_status;
          // }

            // $update11 ="UPDATE tbl_admin SET status='$status11' WHERE academic_year='$academic_year' AND application_no='$application_no'";
            //       $conn->query($update11);


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







         $_SESSION['step4']=1;
          if($edit_status=="PREAPPLICATION"){
             echo '<script language="javascript">';
              echo 'alert("Successfully added additional information")';
              echo '</script>';
      echo '<script language="javascript">';
          }else{
              echo '<script language="javascript">';
              echo 'alert("Successfully updated additional information")';
              echo '</script>';
      echo '<script language="javascript">';
          }

    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("updatestudent.php","_self")';

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
                    student_pwd='$student_pwd',
                    self_supporting='$self_support',
                    parent_separated='$parent_separated'
	WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update);

      

    $update1 = "UPDATE tbl_informed SET
          officialname='$nameofficial'
  WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $conn->query($update1);

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




    $_SESSION['step4']=1;

		  echo '<script language="javascript">';
              echo 'alert("Successfully updated additional information")';
              echo '</script>';


      echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

    echo 'window.open("updateNewStudent.php?id=';
    echo $userid;
    echo '","_self")';

      echo '</script>';


  	 }

?>
