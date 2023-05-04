<?php session_start();

require 'config.php';



$fromrange = $_GET['fromrange'];
$torange = $_GET['totalstudent'];


$scholartype = "";
$status = "ASSESSMENT";
if ($_SESSION['studenttype'] == "fullscholar") {
  $scholartype = "fullscholar";
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $scholartype = "collegerecipient";
} else {
  $scholartype = "shscholar";
}
//
$counting = 0;
$sqlaa = "SELECT * FROM tbl_academic WHERE status='OPEN' OR status='CURRENT'";
$resultaa = $conn->query($sqlaa);
$rowaa = $resultaa->fetch_assoc();
$academic_ids = $rowaa['id'];

$sql = "SELECT * FROM tbl_admin WHERE status='$status' AND typescholar='$scholartype'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $counting++;
  if (($counting >= $fromrange) && ($counting <= $torange)) {
    $totalscore = 0;
    $academic_year = $row['academic_year'];
    $application_no = $row['application_no'];
    $userid = $row['id'];
    // Student info
    $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    //Additional Info
    $sql3 = "SELECT * FROM tbl_added_info WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();

    $informed = $row3['informed'];
    $working_student = $row3['working_student'];
    $living_with = $row3['living_with'];
    $occupation = $row3['occupation'];
    $hea = $row3['hea'];
    $ami = $row3['ami'];
    $parent_ofw = $row3['parent_ofw'];
    $relatives_ofw = $row3['relatives_ofw'];
    $pwd = $row3['pwd'];
    $single_parent = $row3['single_parent'];
    $parent_separated = $row3['parent_separated'];
    $student_pwd = $row3['student_pwd'];

    // Educational Background
    $sql4 = "SELECT * FROM tbl_educational_background
              WHERE academic_year='$academic_year' AND
                    application_no='$application_no'";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
      $row4 = $result4->fetch_assoc();

      $school_type_college = $row4['school_type_college'];
      $school_type_sh = $row4['school_type_sh'];
      $school_type_jh = $row4['school_type_jh'];
      $school_type_elementary = $row4['school_type_elementary'];
      $isgraduating = $row4['isgraduating'];
      $ishonor = $row4['ishonor'];
      $honorsh = $row4['honor_sh'];
      $honorjh = $row4['honor_jh'];
    } else {


      $school_type_college = "";
      $school_type_sh = "";
      $school_type_jh = "";
      $school_type_elementary = "";
      $isgraduating = "";
      $ishonor = "";
      $honorsh = "";
      $honorjh = "";
    }


    // GWA

    if ($scholartype == "fullscholar") {
      $gwa = $row1['gwa'];
      $totalscore = $totalscore + $gwa;
    } else {
      $gwa = $row1['gwa'];
      $newgwa = 0;
      $sqla = "SELECT * FROM tbl_legend_gwa WHERE minimum<='$gwa' AND maximum>='$gwa'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $newgwa = $rowa['points'];
      } else {
        $newgwa = 0;
      }
      $totalscore = $totalscore + $newgwa;
    }

    //Applicant Number
    $applicant_number = $row['applicant_number'];
    $applicant_points = 0;
    $sqla = "SELECT * FROM tbl_legend_applicant WHERE minimum<='$applicant_number' AND maximum>='$applicant_number'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $applicant_points = $rowa['points'];
    } else {
      $applicant_points = 0;
    }
    $totalscore = $totalscore + $applicant_points;

    // Informed Thru
    $sqla = "SELECT * FROM tbl_legend_informed WHERE legend='$informed'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Residency
    $years_residency = $row1['years_residency'];

    $sqla = "SELECT * FROM tbl_legend_residency WHERE minimum<='$years_residency' AND maximum>='$years_residency'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Number of try
    $number_try = $row1['number_try'];

    $sqla = "SELECT * FROM tbl_legend_numbertimes WHERE legend='$number_try'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    //birthday
    $birthday = $row1['bday'];
    $today = date("Y-m-d");
    $diff =  date_diff(date_create($birthday), date_create($today));
    $age = $diff->format('%y');

    $sqla = "SELECT * FROM tbl_legend_age WHERE minimum<='$age' AND maximum>='$age'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Birth order
    $birthorder = $row1['birthorder'];

    $sqla = "SELECT * FROM tbl_legend_birth_order WHERE legend='$birthorder'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Civil status
    $civil_status = $row1['civil'];
    $sqla = "SELECT * FROM tbl_legend_civil_status WHERE legend='$civil_status'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Living with

    $sqla = "SELECT * FROM tbl_legend_living_with WHERE legend='$living_with'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // House type
    $typehouse = $row1['type_house'];

    $sqla = "SELECT * FROM tbl_legend_house WHERE legend='$typehouse'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Working Student

    $sqla = "SELECT * FROM tbl_legend_working WHERE legend='$working_student'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Student PWD
    $sqla = "SELECT * FROM tbl_legend_pwd WHERE legend='$student_pwd'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }


    // Elementary
    $sqla = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_elementary'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Junior High
    $sqla = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_jh'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Senior High
    if ($scholartype != "shscholar") {
      $sqla = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_sh'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $totalscore = $totalscore + $rowa['points'];
      } else {
        $totalscore = $totalscore + 0;
      }
    }


    // College
    $school_type_intended = $row1['schooltype'];
    $sqla = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_intended'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Is Honor
    $sqla = "SELECT * FROM tbl_legend_graduating_honors WHERE legend='$ishonor'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Number of honor
    if ($scholartype != "shscholar") {
      $number_award = $honorsh;
    } else {
      $number_award = $honorjh;
    }
    $sqla = "SELECT * FROM tbl_legend_award WHERE minimum<='$number_award' AND maximum>='$number_award'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }



    // Father info

    $sql5 = "SELECT * FROM tbl_fatherinfo
              WHERE academic_year='$academic_year' AND
                    application_no='$application_no'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $f_fullname = $row5['fullname'];
    $f_living = $row5['living'];
    $f_occupation = $row5['occupation'];
    $f_place_of_work = $row5['place_of_work'];
    $f_hea = $row5['hea'];
    $f_ami = 0;
    if ($f_living == "DECEASED") {
      $f_ami = 0;
    } else {
      $f_ami = $row5['ami'];
    }

    if ($f_living == "DECEASED") {
      $sqla = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$f_living'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $totalscore = $totalscore + $rowa['points'];
      } else {
        $totalscore = $totalscore + 0;
      }
    } else {
      $totalscore = $totalscore + 0;
    }

    // Mother info

    $sql6 = "SELECT * FROM tbl_motherinfo
              WHERE academic_year='$academic_year' AND
                    application_no='$application_no'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $m_fullname = $row6['fullname'];
    $m_living = $row6['living'];
    $m_occupation = $row6['occupation'];
    $m_place_of_work = $row6['place_of_work'];
    $m_hea = $row6['hea'];
    $m_ami = 0;
    if ($m_living == "DECEASED") {
      $m_ami = 0;
    } else {
      $m_ami = $row6['ami'];
    }

    if ($m_living == "DECEASED") {
      $sqla = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$m_living'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $totalscore = $totalscore + $rowa['points'];
      } else {
        $totalscore = $totalscore + 0;
      }
    } else {
      $totalscore = $totalscore + 0;
    }
    // Guardian Info
    $sql7 = "SELECT * FROM tbl_guardianinfo
             WHERE academic_year='$academic_year' AND
                   application_no='$application_no'";
    $result7 = $conn->query($sql7);
    $row7 = $result7->fetch_assoc();

    $g_fullname = $row7['fullname'];
    $g_occupation = $row7['occupation'];
    $g_relationship = $row7['relationship'];
    $g_ami = 0;
    if (strlen($g_fullname) <= 0) {
      $g_ami = 0;
    } else {
      $g_ami = $row7['ami'];
    }

    //Houseband/Wife Info
    $sql12 = "SELECT * FROM tbl_husbandwifeinfo
           WHERE academic_year='$academic_year' AND
                 application_no='$application_no'";
    $result12 = $conn->query($sql12);
    $row12 = $result12->fetch_assoc();

    $hw_fullname = $row12['fullname'];
    $hw_living = $row12['living'];
    $hw_occupation = $row12['occupation'];
    $hw_place_of_work = $row12['place_of_work'];
    $hw_hea = $row12['hea'];
    $hw_ami = 0;
    if ($hw_living == "DECEASED") {
      $hw_ami = 0;
    } else {
      $hw_ami = $row12['ami'];
    }

    // Father Work
    if ($f_living != "DECEASED") {
      $sqla = "SELECT * FROM tbl_legend_occupation WHERE legend='$f_occupation'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $totalscore = $totalscore + $rowa['points'];
      } else {
        $totalscore = $totalscore + 0;
      }
    } else {
      $totalscore = $totalscore + 0;
    }
    // Mother Work
    if ($m_living != "DECEASED") {
      $sqla = "SELECT * FROM tbl_legend_occupation WHERE legend='$m_occupation'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $totalscore = $totalscore + $rowa['points'];
      } else {
        $totalscore = $totalscore + 0;
      }
    } else {
      $totalscore = $totalscore + 0;
    }

    // Guardian Work

    // $sqla = "SELECT * FROM tbl_legend_occupation WHERE legend='$g_occupation'";
    // $resulta = $conn->query($sqla);
    //   if($resulta->num_rows>0){
    //     $rowa = $resulta->fetch_assoc();
    //     $totalscore = $totalscore+$rowa['points'];
    //   }else{
    //     $totalscore = $totalscore+0;
    //   }

    // Houseband/Wife Work
    // $sqla = "SELECT * FROM tbl_legend_occupation WHERE legend='$hw_occupation'";
    // $resulta = $conn->query($sqla);
    //   if($resulta->num_rows>0){
    //     $rowa = $resulta->fetch_assoc();
    //     $totalscore = $totalscore+$rowa['points'];
    //   }else{
    //     $totalscore = $totalscore+0;
    //   }

    // Father HEA
    $sqla = "SELECT * FROM tbl_legend_hea WHERE legend='$f_hea'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Mother HEA
    $sqla = "SELECT * FROM tbl_legend_hea WHERE legend='$m_hea'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Sibling ami
    $sqld = "SELECT * FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no' AND help='YES'";
    $resultd = $conn->query($sqld);
    $sibling_total = 0;
    if ($resultd->num_rows > 0) {
      while ($rowd = $resultd->fetch_assoc()) {
        if (strlen($rowd['monthly_salary']) <= 0) {
          $sibling_total = $sibling_total + 0;
        } else {
          if (is_numeric($rowd['monthly_salary'])) {
            $sibling_total = $sibling_total + $rowd['monthly_salary'];
          } else {
            if (strpos($rowb['monthly_salary'], ",") !== false) {
              $s_salary = str_replace(",", "", $rowb['monthly_salary']);
              $sibling_total = $sibling_total + $s_salary;
            } else {
              $sibling_total = $sibling_total + 0;
            }
          }
        }
      }
    }
    // Total AMI
    $total_ami = (int)$f_ami + (int)$m_ami + (int)$g_ami + (int)$hw_ami + (int)$sibling_total;

    $sqla = "SELECT * FROM tbl_legend_ami WHERE minimum<='$total_ami' AND maximum>='$total_ami'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Total Family Member
    $total_member = $row1['total_family_member'];

    $sqla = "SELECT * FROM tbl_legend_total_family_member WHERE minimum<='$total_member' AND maximum>='$total_member'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }


    // Parent OFW
    $sqla = "SELECT * FROM tbl_legend_parent_ofw WHERE legend='$parent_ofw'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }

    // Member OFW
    $sqla = "SELECT * FROM tbl_legend_member_ofw WHERE legend='$relatives_ofw'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Member PWD

    $sqla = "SELECT * FROM tbl_legend_pwd WHERE legend='$pwd'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Single Parent
    $sqla = "SELECT * FROM tbl_legend_parent_single WHERE legend='$single_parent'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Parent Separated
    $sqla = "SELECT * FROM tbl_legend_parent_separated WHERE legend='$parent_separated'";
    $resulta = $conn->query($sqla);
    if ($resulta->num_rows > 0) {
      $rowa = $resulta->fetch_assoc();
      $totalscore = $totalscore + $rowa['points'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // Exam
    if ($scholartype == "fullscholar") {
      $exam = 0;
      $st = "OPEN";
      $st1 = "CURRENT";
      $sqly = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
      $resulty = $conn->query($sqly);
      $rowy = $resulty->fetch_assoc();
      $acads = $rowy['id'];

      $sqlz = "SELECT * FROM tbl_student_exam WHERE academic_id='$acads' AND user_id='$userid'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      $exam_id = $rowz['exam_id'];

      $sql12 = "SELECT * FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$userid'";
      $result12 = $conn->query($sql12);

      if ($result12->num_rows > 0) {
        $sql14 = "SELECT COUNT(*) as items FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$userid'";
        $result14 = $conn->query($sql14);
        $row14 = $result14->fetch_assoc();
        $items = $row14['items'];

        $correct = "CORRECT";
        $sql15 = "SELECT COUNT(*) as correct FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$userid' AND status='$correct'";
        $result15 = $conn->query($sql15);
        $row15 = $result15->fetch_assoc();
        $ans = $row15['correct'];


        $form_id = 1;
        $sqly = "SELECT * FROM tbl_formula WHERE id='$form_id'";
        $resulty = $conn->query($sqly);
        $rowy = $resulty->fetch_assoc();

        $base = $rowy['formula'];
        $under = 100 - $base;
        $exam = (($ans / $items) * $under) + $base;


        // $exam = 54321;

      } else {
        $exam = 0.00;
      }

      $exam_rating = $exam;

      $sqla = "SELECT * FROM tbl_legend_exam WHERE minimum<='$exam_rating' AND maximum>='$exam_rating'";
      $resulta = $conn->query($sqla);
      if ($resulta->num_rows > 0) {
        $rowa = $resulta->fetch_assoc();
        $totalscore = $totalscore + $rowa['points'];
      } else {
        $totalscore = $totalscore + 0;
      }
    } else {
      $totalscore = $totalscore + 0;
    }
    // Interview Score
    $sql7 = "SELECT * FROM  tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result7 = $conn->query($sql7);

    if ($result7->num_rows > 0) {
      $row7 = $result7->fetch_assoc();
      $totalscore = $totalscore + $row7['score'];
    } else {
      $totalscore = $totalscore + 0;
    }
    // echo $row1['lastname']."-".$totalscore."<br>";

    $sqlz = "SELECT * FROM tbl_finalscore WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_ids'";
    $resultz = $conn->query($sqlz);
    $rowz = $resultz->fetch_assoc();
    if ($resultz->num_rows <= 0) {
      $insert1 = "INSERT INTO tbl_finalscore
                 (academic_id,
                  academic_year,
                 application_no,
                 score
                )
               VALUES (
                 '$academic_ids',
                 '$academic_year',
                 '$application_no',
                 '$totalscore')";
      $conn->query($insert1);
    } else {
      $insert1 = "UPDATE tbl_finalscore SET score='$totalscore' WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_ids'";
      $conn->query($insert1);
    }
  } //end if
} //end of while







echo '<script language="javascript">';
// echo 'localStorage.setItem("notif","1")';
if ($_SESSION['studenttype'] == "collegerecipient") {
  echo 'window.open("assessmentCollegeRecipient.php","_self")';
} else if ($_SESSION['studenttype'] == "shscholar") {
  echo 'window.open("assessmentSHS.php","_self")';
} else if ($_SESSION['studenttype'] == "fullscholar") {
  echo 'window.open("assessmentCollegeFullScholar.php","_self")';
}

echo '</script>';
