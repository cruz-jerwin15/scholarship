<?php session_start();
include('pdf_mc_table.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype = "";

$pin = $_GET['pin'];

if ($_SESSION['studenttype'] == "fullscholar") {
  $scholartype = "fullscholar";
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $scholartype = "collegerecipient";
} else {
  $scholartype = "shscholar";
}

if ($_SESSION['usertype'] == "superadmin") {
} else {
  $sqlb = "SELECT * FROM tbl_pin WHERE pin='$pin'";
  $resultb = $conn->query($sqlb);

  if ($resultb->num_rows <= 0) {
    echo '<script language="javascript">';
    echo 'alert("Wrong pin number")';
    echo '</script>';
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
    if ($_SESSION['studenttype'] == "fullscholar") {
      echo 'window.open("assessmentCollegeFullScholar.php","_self")';
    } else if ($_SESSION['studenttype'] == "collegerecipient") {
      echo 'window.open("assessmentCollegeRecipient.php","_self")';
    } else if ($_SESSION['studenttype'] == "shscholar") {
      echo 'window.open("assessmentSHS.php","_self")';
    }

    echo '</script>';
  }
}


$header_font = 14;
$content_font = 9;
$header_height = 11;
$content_height = 7;
$w = 35;
$h = 16;

date_default_timezone_set("Asia/Manila");
$year = date('Y');
$month = date('m');
$day = date('d');


if ($month == 1) {
  $months = "January";
} else if ($month == 2) {
  $months = "February";
} else if ($month == 3) {
  $months = "March";
} else if ($month == 4) {
  $months = "April";
} else if ($month == 5) {
  $months = "May";
} else if ($month == 6) {
  $months = "June";
} else if ($month == 7) {
  $months = "July";
} else if ($month == 8) {
  $months = "August";
} else if ($month == 9) {
  $months = "September";
} else if ($month == 10) {
  $months = "October";
} else if ($month == 11) {
  $months = "November";
} else if ($month == 12) {
  $months = "December";
}

// $pdf->Cell(0,10,'',0,1);
// $pdf->Cell(270,10,"",0,0,'L');
// $pdf->Cell(100,10,"As of ".$months." ".$day.", ".$year,0 ,0,'L');


$pdf->SetTitle($title);

$pdf->AddPage('L', array(210.59, 330.02));
$profile = "img/citylogo.png";
$aksyon = "img/aksyonbilis.png";
$pdf->SetFont('Times', '', $header_font);
$pdf->Image($profile, 125, 10, 25);

$pdf->Cell(335, 10, "Republic of the Philippines", 0, 0, 'C');
$pdf->Cell(0, 5, '', 0, 1);

$pdf->Cell(335, 10, "Province of Batangas", 0, 0, 'C');
$pdf->Cell(0, 5, '', 0, 1);

$pdf->Cell(335, 10, "City of Sto. Tomas", 0, 0, 'C');
$pdf->Image($aksyon, 200, 5, 45);



$pdf->SetFont('Times', '', $header_font);

$pdf->Cell(0, 20, '', 0, 1);

$st = "OPEN";
$st1 = "CURRENT";
$sqlj = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
$resultj = $conn->query($sqlj);
$rowj = $resultj->fetch_assoc();
$acads = $rowj['academic_year'];
$acad_id = $rowj['id'];


if ($_SESSION['studenttype'] == "fullscholar") {
  $pdf->Cell(335, $header_height, "APPLICANTS ASSESSMENT SUMMARY REPORT FOR FULL SCHOLARSHIP", 0, 0, 'C');
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $pdf->Cell(335, $header_height, "APPLICANTS ASSESSMENT SUMMARY REPORT", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(335, $header_height, "COLLEGE EDUCATIONAL ASSISTANCE", 0, 0, 'C');
} else {
  $pdf->Cell(335, $header_height, "APPLICANTS ASSESSMENT SUMMARY REPORT", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(335, $header_height, "SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE", 0, 0, 'C');
}
$pdf->Cell(0, 5, '', 0, 1);
$pdf->Cell(335, $header_height, strtoupper("S.Y. " . $acads), 0, 0, 'C');
$pdf->Cell(0, 5, '', 0, 1);
$pdf->Cell(335, $header_height, "As of " . $months . " " . $day . ", " . $year, 0, 0, 'C');
$pdf->Cell(0, 10, '', 0, 1);





if ($_SESSION['studenttype'] == "fullscholar") {
  $pdf->SetFont('Arial', '', 10);
  $pdf->SetWidths(array(14, 29, 29, 22, 17, 27, 27, 36, 36, 22, 17, 17, 17));
  $pdf->SetLineHeight(5);
  $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
  $pdf->Row(array(
    'NO.',
    'Last Name',
    'First Name',
    'Middle Initial',
    'Application No.',
    'Former Recipient',
    'Former Scholar',
    'School',
    'Year & Course',
    'GWA',
    'Exam Rating',
    'Exam Points',
    'Total Points'

  ));
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $pdf->SetFont('Arial', '', 10);
  $pdf->SetWidths(array(14, 29, 29, 22, 17, 39, 27, 27, 36, 36, 17, 17));
  $pdf->SetLineHeight(5);
  $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
  $pdf->Row(array(
    'NO.',
    'Last Name',
    'First Name',
    'Middle Initial',
    'Application No.',
    'Barangay',
    'Former Recipient',
    'Former Scholar',
    'School',
    'Year & Course',
    'Interview Points',
    'Total Points'

  ));
} else {
  $pdf->SetFont('Arial', '', 10);
  $pdf->SetWidths(array(14, 29, 32, 22, 30, 39, 55, 53, 17, 17));
  $pdf->SetLineHeight(5);
  $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
  $pdf->Row(array(
    'NO.',
    'Last Name',
    'First Name',
    'Middle Initial',
    'Application No.',
    'Barangay',
    'School',
    'Grade & Track',
    'Interview Points',
    'Total Points'

  ));
}

$status1 = "ASSESSMENT";

$sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_finalscore.score,tbl_admin.applicant_number
        FROM tbl_admin
        INNER JOIN tbl_finalscore
        ON tbl_admin.academic_year=tbl_finalscore.academic_year AND tbl_admin.application_no=tbl_finalscore.application_no
        WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype' AND tbl_finalscore.academic_id='$acad_id' ORDER BY tbl_finalscore.score DESC";
$result = $conn->query($sql);
$count = 0;
while ($row = $result->fetch_assoc()) {
  $count++;
  $academic_year = $row['academic_year'];
  $application_no = $row['application_no'];
  $userid = $row['id'];
  $totalscore = $row['score'];
  $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $pdf->SetFont('Arial', '', 10);


    $firstname = $row2['firstname'];
    $lastname = $row2['lastname'];
    $mids = strtoupper($row2['middlename']);
    if ($mids == "N/A") {
      $middleini = "";
    } else {
      $middleini = substr($row2['middlename'], 0, 1) . '.';
    }

    $applicant_number = $row['applicant_number'];
    $address = $row2['barangay'];
    $course = $row2['course'];
    $year = $row2['gradelevel'];
  }


  if (($scholartype == "collegerecipient") || ($scholartype == "shscholar")) {
    $course = $year . " " . $course;
  } else {
    $course = $year . " " . $course;
  }

  $school = $row2['school'];
  // Exam
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
  if (isset($rowz['exam_id']) == NULL) {
    $exam_id = 0;
  } else {
    $exam_id = $rowz['exam_id'];
  }


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



  // End Exam

  $exam = number_format($exam, 2);
  if ($scholartype == "fullscholar") {
    $gwa = $row2['gwa'];
  } else {
    $gwa = 0;
  }


  $sql6 = "SELECT * FROM  tbl_legend_gwa WHERE minimum<='$gwa' AND maximum>='$gwa'";
  $result6 = $conn->query($sql6);
  if ($result6->num_rows > 0) {
    $row6 = $result6->fetch_assoc();

    $gwa_points = $row6['points'];
  } else {


    $gwa_points = 0;
  }


  $sql6 = "SELECT * FROM  tbl_legend_exam WHERE minimum<='$exam' AND maximum>='$exam'";
  $result6 = $conn->query($sql6);


  if ($result6->num_rows > 0) {
    $row6 = $result6->fetch_assoc();

    $exam_points = $row6['points'];
  } else {


    $exam_points = 0;
  }



  $sqlz = "SELECT * FROM tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
  $resultz = $conn->query($sqlz);
  $rowz = $resultz->fetch_assoc();

  $interview_score = $rowz['score'];

  $sql3 = "SELECT * FROM tbl_former WHERE academic_year='$academic_year' AND application_no='$application_no'";
  $result3 = $conn->query($sql3);
  $row3 = $result3->fetch_assoc();
  if ($result3->num_rows > 0) {
    $recipient = $row3['collegerecipient'];
    $full = $row3['fullscholar'];

    if ($recipient == "NO") {
      $recipient = $row3['shscholar'];
    }
  } else {
    $recipient = "NO";
    $full = "NO";
  }



  if ($scholartype == "collegerecipient") {
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetWidths(array(14, 29, 29, 22, 17, 39, 27, 27, 36, 36, 17, 17));
    $pdf->SetLineHeight(5);
    $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
    $pdf->Row(array(
      $count,
      strtoupper($lastname),
      strtoupper($firstname),
      strtoupper($middleini),
      $applicant_number,
      $address,
      $recipient,
      $full,
      $school,
      $course,
      $interview_score,
      number_format($totalscore, 2)
    ));
  } else if ($scholartype == "shscholar") {
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetWidths(array(14, 29, 32, 22, 30, 39, 55, 53, 17, 17));
    $pdf->SetLineHeight(5);
    $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
    $pdf->Row(array(
      $count,
      strtoupper($lastname),
      strtoupper($firstname),
      strtoupper($middleini),
      $applicant_number,
      $address,
      $school,
      $course,
      $interview_score,
      number_format($totalscore, 2)
    ));
  } else {
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetWidths(array(14, 29, 29, 22, 17, 27, 27, 36, 36, 22, 17, 17, 17));
    $pdf->SetLineHeight(5);
    $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
    $pdf->Row(array(
      $count,
      strtoupper($lastname),
      strtoupper($firstname),
      strtoupper($middleini),
      $applicant_number,
      $recipient,
      $full,
      $school,
      $course,
      $gwa,
      number_format($exam, 2),
      $exam_points,
      number_format($totalscore, 2)
    ));
  }
}

$numspacing = $_GET['spacing'];
// $pdf->Cell(335,10,"",1,0,'L');
$pdf->Cell(0, $numspacing, '', 0, 1);
$pdf->Cell(90, 10, "Prepared by:", 0, 0, 'C');
$pdf->Cell(140, 10, "Recommending Approval:", 0, 0, 'C');
$pdf->Cell(90, 10, "Approved by:", 0, 0, 'C');
$pdf->Cell(0, 13, '', 0, 1);
$pdf->Cell(90, 10, "MS. CATHERINE V. MENDOZA, MMT", 0, 0, 'C');
$pdf->Cell(140, 10, "ENGR. SEVERINO M. MEDALLA", 0, 0, 'C');
$pdf->Cell(90, 10, "ATTY. ARTH JHUN AGUILAR MARASIGAN", 0, 0, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Cell(90, 10, "Scholarship Division Chief", 0, 0, 'C');
$pdf->Cell(140, 10, "City Administrator", 0, 0, 'C');
$pdf->Cell(90, 10, "Public Servant/City Mayor", 0, 0, 'C');




$pdf->Output();
