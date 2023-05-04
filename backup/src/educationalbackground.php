<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];
$gradelevel = $_POST['gradelevel'];
// echo $_SESSION['studenttype'];
if(($_SESSION['studenttype']=="shscholar")||($_SESSION['studenttype']=="fullscholar")||($_SESSION['studenttype']=="collegerecipient")){
      $isgraduating = $_POST['isgraduating'];
     $ishonor = $_POST['ishonor'];
     $how_many_term = $_POST['how_many_term'];
   
}else{
        $isgraduating = "NO";
     $ishonor = "NO";
     $how_many_term = 0; 
}

// if($_SESSION['studenttype']=="fullscholar"){
//      $isgraduating = $_POST['isgraduating'];
//      $ishonor = $_POST['ishonor'];
//      $how_many_term = $_POST['how_many_term'];       
// }else if($_SESSION['studenttype']=="collegerecipient"){
//      $isgraduating = "NO";
//      $ishonor = "NO";
//      $how_many_term = 0;  
// }else if($_SESSION['studenttype']=="shscholar"){
//      $isgraduating = "NO";
//      $ishonor = "NO";
//      $how_many_term = 0;  
// }

if(($_SESSION['studenttype']=="shscholar")||($_SESSION['studenttype']=="fullscholar")){
      $name_school_college = "";
     $school_type_college = "";
     $school_address_college = "";
     $year_level_college = "";
     $honor_college = "";
     $list_honor_college = "";
}else{
     $name_school_college = addslashes($_POST['name_school_college']);
     $school_type_college = addslashes($_POST['school_type_college']);
     $school_address_college = addslashes($_POST['school_address_college']);
     $year_level_college = $_POST['year_level_college'];
     $honor_college = $_POST['honor_college'];
     $list_honor_college = $_POST['list_honor_college'];
}

if($_SESSION['studenttype']=="shscholar"){
$name_school_sh ="";
$school_type_sh = "";
$school_address_sh = "";
$year_level_sh ="";
$honor_sh ="";
$list_honor_sh ="";
	if($gradelevel=="GRADE 12"){
		$name_school_sh = addslashes($_POST['name_school_sh']);
		$school_type_sh = addslashes($_POST['school_type_sh']);
		$school_address_sh = addslashes($_POST['school_address_sh']);
		$year_level_sh = $_POST['year_level_sh'];
		$honor_sh = $_POST['honor_sh'];
		$list_honor_sh = $_POST['list_honor_sh']; 
	}
}else{
    $name_school_sh = addslashes($_POST['name_school_sh']);
$school_type_sh = addslashes($_POST['school_type_sh']);
$school_address_sh = addslashes($_POST['school_address_sh']);
$year_level_sh = $_POST['year_level_sh'];
$honor_sh = $_POST['honor_sh'];
$list_honor_sh = $_POST['list_honor_sh']; 
}



$name_school_jh = addslashes($_POST['name_school_jh']);
$school_type_jh = addslashes($_POST['school_type_jh']);
$school_address_jh = addslashes($_POST['school_address_jh']);
$year_level_jh = $_POST['year_level_jh'];
$honor_jh = $_POST['honor_jh'];
$list_honor_jh = $_POST['list_honor_jh'];

$name_school_elementary = addslashes($_POST['name_school_elementary']);
$school_type_elementary = addslashes($_POST['school_type_elementary']);
$school_address_elementary = addslashes($_POST['school_address_elementary']);
$year_level_elementary = $_POST['year_level_elementary'];
$honor_elementary = $_POST['honor_elementary'];
$list_honor_elementary = $_POST['list_honor_elementary'];
	
	 $sql="SELECT * from tbl_educational_background where academic_year='$academic_year' AND application_no='$application_no'";
	 $result = $conn->query($sql);
	 if ($result->num_rows < 1){
	 	 $insert= "INSERT INTO tbl_educational_background 
                    (academic_year,
                    application_no,
                    isgraduating,
                    ishonor,
                    how_many_term,
                    name_school_college,
                    school_type_college,
                    school_address_college,
                    year_level_college,
                    honor_college,
                    list_honor_college,
                    name_school_sh,
                    school_type_sh,
                    school_address_sh,
                    year_level_sh,
                    honor_sh,
                    list_honor_sh,
                    name_school_jh,
                    school_type_jh,
                    school_address_jh,
                    year_level_jh,
                    honor_jh,
                    list_honor_jh,
                    name_school_elementary,
                    school_type_elementary,
                    school_address_elementary,
                    year_level_elementary,
                    honor_elementary,
                    list_honor_elementary
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$isgraduating',
                    '$ishonor',
                    '$how_many_term',
                    '$name_school_college',
                    '$school_type_college',
                    '$school_address_college',
                    '$year_level_college',
                    '$honor_college',
                    '$list_honor_college',
                    '$name_school_sh',
                    '$school_type_sh',
                    '$school_address_sh',
                    '$year_level_sh',
                    '$honor_sh',
                    '$list_honor_sh',
                    '$name_school_jh',
                    '$school_type_jh',
                    '$school_address_jh',
                    '$year_level_jh',
                    '$honor_jh',
                    '$list_honor_jh',
                    '$name_school_elementary',
                    '$school_type_elementary',
                    '$school_address_elementary',
                    '$year_level_elementary',
                    '$honor_elementary',
                    '$list_honor_elementary'
                )";
        $conn->query($insert);
	 }else{
	 	$update = "UPDATE tbl_educational_background SET 
					isgraduating='$isgraduating',
                    ishonor='$ishonor',
                    how_many_term='$how_many_term',
                    name_school_college='$name_school_college',
                    school_type_college='$school_type_college',
                    school_address_college='$school_address_college',
                    year_level_college='$year_level_college',
                    honor_college='$honor_college',
                    list_honor_college='$list_honor_college',
                    name_school_sh='$name_school_sh',
                    school_type_sh='$school_type_sh',
                    school_address_sh='$school_address_sh',
                    year_level_sh='$year_level_sh',
                    honor_sh='$honor_sh',
                    list_honor_sh='$list_honor_sh',
                    name_school_jh='$name_school_jh',
                    school_type_jh='$school_type_jh',
                    school_address_jh='$school_address_jh',
                    year_level_jh='$year_level_jh',
                    honor_jh='$honor_jh',
                    list_honor_jh='$list_honor_jh',
                    name_school_elementary='$name_school_elementary',
                    school_type_elementary='$school_type_elementary',
                    school_address_elementary='$school_address_elementary',
                    year_level_elementary='$year_level_elementary',
                    honor_elementary='$honor_elementary',
                    list_honor_elementary='$list_honor_elementary'
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

$_SESSION['step2']=1;
	
	echo '<script language="javascript">';
              echo 'alert("Successfully updated educational background info")';
              echo '</script>';
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
      
      echo '</script>';





?>