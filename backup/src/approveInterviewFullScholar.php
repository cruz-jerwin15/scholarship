<?php
session_start();
include 'config.php';

$users = $_POST['users'];
$academic_year=$_POST['academic_year'];
$application_no = $_POST['application_no'];
 $applicant_number="";
$interview_score = $_POST['interview_score'];
$remarks = $_POST['remarks'];
$process ="INTERVIEW";
$application=0.00;
$informed=0.00;
$times_apply=0.00;
$residency=0.00;
$bithorder=0.00;
$age=0.00;
$civil_status=0.00;
$gwa=0.00;
$exam_rating=0.00;
$working_student=0.00;
$with_honors=0.00;
$living_with=0.00;
$house=0.00;
$school=0.00;
$awards=0.00;
$occupation=0.00;
$hea=0.00;
$ami=0.00;
$family_member=0.00;
$parent_ofw=0.00;
$relatives_ofw=0.00;
$pwd=0.00;
$deceased=0.00;
$deceased_mother=0.00;
$single_parent=0.00;
$parent_separated=0.00;
$interview=0.00;

$informed_record;
$working_student_record;
$living_with_record;
$occupation_record;
$hea_record;
$parent_ofw_record;
$relatives_ofw_record;
$pwd_record;
$single_parent_record;
$parent_separated_record;
$civil_record;
$ami_record;

$typescholar = $_SESSION['studenttype'];

$sql5="SELECT MAX(applicant_number) as maxnumber from tbl_admin WHERE academic_year='$academic_year' AND typescholar='$typescholar'";
      $result5 = $conn->query($sql5);
      if ($result5->num_rows > 0){
        $row5 = $result5->fetch_assoc();
        $applicant_number=$row5['maxnumber']+1;     
}

$update3 = "UPDATE tbl_admin SET applicant_number='$applicant_number' WHERE academic_year='$academic_year' and application_no='$application_no'";
$conn->query($update3);



$sqla = "SELECT * FROM tbl_admin 
    WHERE academic_year='$academic_year' AND
        application_no='$application_no'";
$resulta = $conn->query($sqla);
  if ($resulta->num_rows > 0){
      $rowa = $resulta->fetch_assoc();
      $applicant_number=$rowa['applicant_number'];
  }
// echo $applicant_number;
$sql = "SELECT * FROM tbl_legend_applicant 
		WHERE minimum<='$application_no' AND
			  maximum>='$application_no'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$application=$row['points'];
  }

$sql1 = "SELECT * FROM tbl_added_info
		 WHERE academic_year='$academic_year' AND
		 		application_no='$application_no' ";
$result1 = $conn->query($sql1);
  if ($result1->num_rows > 0){
  		$row1 = $result1->fetch_assoc();
  		$informed_record=$row1['informed'];
  		$working_student_record=$row1['working_student'];
  		$living_with_record=$row1['living_with'];
  		$hea_record=$row1['hea'];
  		$parent_ofw_record=$row1['parent_ofw'];
  		$relatives_ofw_record=$row1['relatives_ofw'];
  		$pwd_record=$row1['pwd'];
  		$single_parent_record=$row1['single_parent'];
  		$parent_separated_record=$row1['parent_separated'];
  		$ami_record=$row1['ami'];
 }

$sql = "SELECT * FROM  tbl_legend_informed 
		WHERE legend='$informed_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$informed=$row['points'];
  }



$number_try_record;
$birth_order_record;
$years_residency_record;
$birth_order_record;
$birth_day_record;
$school_type_record;
$gwa_record;
$exam_rating_record;
$total_family_member_record;
$type_house_record;

$sql1 = "SELECT * FROM tbl_studentinfo
		 WHERE academic_year='$academic_year' AND
		 		application_no='$application_no' ";
$result1 = $conn->query($sql1);
  if ($result1->num_rows > 0){
  		$row1 = $result1->fetch_assoc();
  		$number_try_record=$row1['number_try'];
		$birth_order_record=$row1['birthorder'];
		$birth_day_record=$row1['bday'];
		$years_residency_record=$row1['years_residency'];
		$school_type_record=$row1['schooltype'];
		$gwa_record=$row1['gwa'];
		$exam_rating_record=$row1['exam_rating'];
		$total_family_member_record=$row1['total_family_member'];
		$type_house_record=$row1['type_house'];
		$civil_record=$row1['civil'];
 }

$with_honors_records="";
$number_honors="";
$college_type_record="";
$sh_type_record="";
$jh_type_record="";
$elementary_type_record="";
 $sql1 = "SELECT * FROM tbl_educational_background
		 WHERE academic_year='$academic_year' AND
		 		application_no='$application_no' ";
$result1 = $conn->query($sql1);
  if ($result1->num_rows > 0){
  		$row1 = $result1->fetch_assoc();
  		$with_honors_records=$row1['ishonor'];
  		if($_SESSION['studenttype']=="fullscholar"){
  			  $number_honors=$row1['honor_sh'];

          if($row1['name_school_college']==""){
            $college_type_record="";
          }else{
            $college_type_record=$row1['school_type_college'];
          }
          if($row1['name_school_sh']==""){
             $sh_type_record="";
          }else{
            $sh_type_record=$row1['school_type_sh'];
          }
          if($row1['name_school_jh']==""){
             $jh_type_record="";
          }else{
            $jh_type_record=$row1['school_type_jh'];
          }
         if($row1['name_school_elementary']==""){
             $elementary_type_record="";
          }else{
            $elementary_type_record=$row1['school_type_elementary'];
          }
         
         
  		}else if($_SESSION['studenttype']=="collegerecipient"){
  			$number_honors=$row1['honor_sh'];
         if($row1['name_school_college']==""){
            $college_type_record="";
          }else{
            $college_type_record=$row1['school_type_college'];
          }
          if($row1['name_school_sh']==""){
             $sh_type_record="";
          }else{
            $sh_type_record=$row1['school_type_sh'];
          }
          if($row1['name_school_jh']==""){
             $jh_type_record="";
          }else{
            $jh_type_record=$row1['school_type_jh'];
          }
         if($row1['name_school_elementary']==""){
             $elementary_type_record="";
          }else{
            $elementary_type_record=$row1['school_type_elementary'];
          }
  		}else{
  			$number_honors=$row1['honor_jh'];;
         if($row1['name_school_college']==""){
            $college_type_record="";
          }else{
            $college_type_record=$row1['school_type_college'];
          }
          if($row1['name_school_sh']==""){
             $sh_type_record="";
          }else{
            $sh_type_record=$row1['school_type_sh'];
          }
          if($row1['name_school_jh']==""){
             $jh_type_record="";
          }else{
            $jh_type_record=$row1['school_type_jh'];
          }
         if($row1['name_school_elementary']==""){
             $elementary_type_record="";
          }else{
            $elementary_type_record=$row1['school_type_elementary'];
          }
  		}
		
 }


$sql = "SELECT * FROM  tbl_legend_numbertimes 
		WHERE legend='$number_try_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$times_apply=$row['points'];
 }

$sql = "SELECT * FROM tbl_legend_residency
		WHERE minimum<='$years_residency_record' AND
			  maximum>='$years_residency_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$residency=$row['points'];
  }


$sql = "SELECT * FROM  tbl_legend_birth_order 
		WHERE legend='$birth_order_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$bithorder=$row['points'];
 }

$today = date("Y-m-d");
$diff =  date_diff(date_create($birth_day_record),date_create($today));
$ages = $diff->format('%y');

$sql = "SELECT * FROM  tbl_legend_age 
		WHERE minimum<='$ages' AND
			  maximum>='$ages'";

$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$age=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_civil_status 
		WHERE legend='$civil_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$civil_status=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_gwa 
		WHERE minimum<='$gwa_record' AND
			  maximum>='$gwa_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$gwa=$row['points'];
 }

 $sql = "SELECT * FROM  tbl_legend_gwa 
    WHERE minimum<='$exam_rating_record' AND
        maximum>='$exam_rating_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $exam_rating=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_working 
		WHERE legend='$working_student_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$working_student=$row['points'];
 }

 $sql = "SELECT * FROM  tbl_legend_graduating_honors 
		WHERE legend='$with_honors_records'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$with_honors=$row['points'];
 }

 $sql = "SELECT * FROM  tbl_legend_living_with 
		WHERE legend='$living_with_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$living_with=$row['points'];
 }
$sql = "SELECT * FROM  tbl_legend_house 
		WHERE legend='$type_house_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$house=$row['points'];
 }

$college_school=0.00;
$sh_school=0.00;
$jh_school=0.00;
$sh_school=0.00;


$sql = "SELECT * FROM  tbl_legend_school 
		WHERE legend='$school_type_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$school=$row['points'];
 }
// School Type
$sql = "SELECT * FROM  tbl_legend_school 
    WHERE legend='$college_type_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $college_school=$row['points'];
 }

 $sql = "SELECT * FROM  tbl_legend_school 
    WHERE legend='$sh_type_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $sh_school=$row['points'];
 }
$sql = "SELECT * FROM  tbl_legend_school 
    WHERE legend='$jh_type_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $jh_school=$row['points'];
 }
$sql = "SELECT * FROM  tbl_legend_school 
    WHERE legend='$elementary_type_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $elementary_school=$row['points'];
 }
 // End School Type


$sql = "SELECT * FROM  tbl_legend_award 
		WHERE minimum<='$number_honors' AND
			  maximum>='$number_honors'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$awards=$row['points'];
 }








$father_d=0;
$mother_d=0;
$father_ami;
$f_o="";
$m_o="";
$sql1 = "SELECT * FROM  tbl_fatherinfo 
    WHERE academic_year='$academic_year' AND 
          application_no='$application_no'";
$result1 = $conn->query($sql1);
  if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      if($row1['living']=="DECEASED"){
          $father_ami=0.00;
          $father_d=$row1['living'];
          $f_o="NONE";
      }else{
        $father_ami=$row1['ami'];
        $f_o=$row1['corresponding'];
      }
      
 }

$sql = "SELECT * FROM  tbl_legend_parent_deceased 
    WHERE legend='$father_d'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $deceased=$row['points'];
 }

$mother_ami;
 $sql2 = "SELECT * FROM  tbl_motherinfo 
    WHERE academic_year='$academic_year' AND 
          application_no='$application_no'";
$result2 = $conn->query($sql2);
  if ($result2->num_rows > 0){
      $row2 = $result2->fetch_assoc();
      if($row2['living']=="DECEASED"){
          $mother_ami=0.00;
          $mother_d=$row2['living'];
          $m_o="NONE";
      }else{
        $mother_ami=$row2['ami'];
        $m_o=$row2['corresponding'];
      }
 }



$sql = "SELECT * FROM  tbl_legend_occupation 
    WHERE legend='$f_o'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $occupation=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_occupation 
    WHERE legend='$m_o'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $f_occupation=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_parent_deceased 
    WHERE legend='$mother_d'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $deceased_mother=$row['points'];
 }


$ami_records = $father_ami+$mother_ami;

 $sql = "SELECT * FROM  tbl_legend_ami 
		WHERE minimum<='$ami_records' AND
        maximum>='$ami_records'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$ami=$row['points'];
 }




$sql = "SELECT * FROM  tbl_legend_total_family_member 
		WHERE minimum<='$total_family_member_record' AND
			  maximum>='$total_family_member_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$family_member=$row['points'];
 }

 $sql = "SELECT * FROM  tbl_legend_parent_ofw 
		WHERE legend='$parent_ofw_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$parent_ofw=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_member_ofw 
		WHERE legend='$relatives_ofw_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$relatives_ofw=$row['points'];
 }

$sql = "SELECT * FROM  tbl_legend_pwd 
		WHERE legend='$pwd_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$pwd=$row['points'];
 }


$count=0;
$father_hea;

$sql2 = "SELECT * FROM  tbl_fatherinfo 
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
$result2 = $conn->query($sql2);
  if ($result2->num_rows > 0){
  		$row2 = $result2->fetch_assoc();
  		$father_hea=$row2['hea'];
  		if($row2['living']=="DECEASED"){
  			$count=$count+1;
  		}
 }
$mother_hea;
 $sql3 = "SELECT * FROM  tbl_motherinfo 
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
$result3 = $conn->query($sql3);
  if ($result3->num_rows > 0){
  		$row3 = $result3->fetch_assoc();
  		$mother_hea=$row3['hea'];
  		if($row3['living']=="DECEASED"){
  			$count=$count+1;
  		}
 }
$hea_father=0.00;
$hea_mother=0.00;
$sql = "SELECT * FROM  tbl_legend_hea 
    WHERE legend='$father_hea'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $hea_father=$row['points'];
 }
$sql = "SELECT * FROM  tbl_legend_hea 
    WHERE legend='$mother_hea'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $hea_mother=$row['points'];
 }

if($count==1){
	$deceased_record="1 DECEASED";
}else if($count==2){
	$deceased_record="BOTH PARENT";
}else{
	$deceased_record="BOTH LIVING";
}



$sql = "SELECT * FROM  tbl_legend_parent_single 
		WHERE legend='$single_parent_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$single_parent=$row['points'];
 }

 $sql = "SELECT * FROM  tbl_legend_parent_separated 
		WHERE legend='$parent_separated_record'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
  		$row = $result->fetch_assoc();
  		$parent_separated=$row['points'];
 }


$interview=$interview_score;
$committee=0.00;
  $total_points=$application+$informed+$times_apply+$residency+$bithorder+$age+$civil_status+$gwa+$exam_rating+$working_student+$with_honors+$living_with+$house+$school+$college_school+$sh_school+$jh_school+$elementary_school+$awards+$occupation+$f_occupation+$hea_father+$hea_mother+$ami+$family_member+$parent_ofw+$relatives_ofw+$pwd+$deceased+$deceased_mother+$single_parent+$parent_separated+$interview+$committee;



 $sqla = "SELECT * FROM  tbl_score 
		  WHERE academic_year='$academic_year' AND application_no='$application_no' ";
 $resulta = $conn->query($sqla);
  if ($resulta->num_rows <= 0){
  		 $insert= "INSERT INTO tbl_score	 
                    (academic_year,
                    application_no,
                    application,  
					informed,
					times_apply,
					residency,
					bithorder,
					age,
					civil_status,
					gwa,
          exam_rating,
					working_student,
					with_honors,
					living_with,
					house,
					school,
          college_school,
          sh_school,
          jh_school,
          elementary_school,
					awards,
					occupation,
          occupation_mother,
					hea_father,
          hea_mother,
					ami,
					family_member,
					parent_ofw,
					relatives_ofw,
					pwd,
					deceased,
          deceased_mother,
					single_parent,
					parent_separated,
					interview,
					committee,
          total_points)
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$application',  
					'$informed',
					'$times_apply',
					'$residency',
					'$bithorder',
					'$age',
					'$civil_status',
					'$gwa',
          '$exam_rating',
					'$working_student',
					'$with_honors',
					'$living_with',
					'$house',
					'$school',
          '$college_school',
          '$sh_school',
          '$jh_school',
          '$elementary_school',
					'$awards',
					'$occupation',
          '$f_occupation',
					'$hea_father',
          '$hea_mother',
					'$ami',
					'$family_member',
					'$parent_ofw',
					'$relatives_ofw',
					'$pwd',
					'$deceased',
          '$deceased_mother',
					'$single_parent',
					'$parent_separated',
					'$interview',
					'$committee',
          '$total_points')";
        $conn->query($insert);
  		
 }







$insert2 = "INSERT INTO tbl_remarks (user_id,process,remarks) VALUES ('$users','$process','$remarks')";
$conn->query($insert2);

$status="ASSESSMENT";
$update3 = "UPDATE tbl_admin SET status='$status' WHERE id='$users'";
$conn->query($update3);

 echo '<script language="javascript">';
              echo 'alert("You successfully send new applicant for assessment")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("interviewCollegeFullScholar.php","_self")';
	}
  		
  		echo '</script>';

?>