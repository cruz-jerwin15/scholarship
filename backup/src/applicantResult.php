<?php session_start();
include('pdf_mc_table.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype = "";

$numberscholar = $_GET['no'];

if ($_SESSION['studenttype'] == "fullscholar") {
  $scholartype = "fullscholar";
  $typescholar = "fullscholar";
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $scholartype = "collegerecipient";
  $typescholar = "collegerecipient";
} else {
  $scholartype = "shscholar";
  $typescholar = "shscholar";
}
$pin = $_GET['pin'];
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



$header_font = 12;
$content_font = 9;
$header_height = 11;
$content_height = 7;
$w = 35;
$h = 16;

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

// $pdf->Cell(0,5,'',0,1);
// $pdf->Cell(270,10,"",0,0,'L');
// $pdf->Cell(100,10,"As of ".$months." ".$day.", ".$year,0 ,0,'L');

$pdf->SetFont('Times', '', $header_font);

$pdf->Cell(0, 17, '', 0, 1);

$stats = "OPEN";
$sql = "SELECT * FROM tbl_batch WHERE status='$stats'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sy = $row['batch'] . ' 1ST SEMESTER';
$sy1 = $row['batch'];

$st = "OPEN";
$st1 = "CURRENT";
$sqly = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
$resulty = $conn->query($sqly);
$rowy = $resulty->fetch_assoc();
$acads = $rowy['id'];
$academic = $rowy['academic_year'];
$academic_id = $acads;
$fyear = substr($academic, 0, 4);

if ($_SESSION['studenttype'] == "fullscholar") {
  $pdf->Cell(325, $header_height, "OFFICIAL RESULT FOR " . $fyear . " COLLEGE APPLICANTS FOR FULL SCHOLARSHIP", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, "(NEW BATCH OF STO. TOMAS SCHOLARS)", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, "STO. TOMAS SCHOLARSHIP PROGRAM", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, strtoupper("S.Y. " . $academic), 0, 0, 'C');
  $pdf->Cell(0, 10, '', 0, 1);
  $pdf->Cell(325, $header_height, "As of " . $months . " " . $day . ", " . $year, 0, 0, 'C');
  $pdf->Cell(0, 10, '', 0, 1);
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $pdf->Cell(325, $header_height, "OFFICIAL RESULT FOR " . $fyear . " COLLEGE APPLICANTS FOR EDUCATIONAL ASSISTANCE", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, "(NEW BATCH OF COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS)", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, "STO. TOMAS SCHOLARSHIP PROGRAM", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, strtoupper("S.Y. " . $academic), 0, 0, 'C');
  $pdf->Cell(0, 10, '', 0, 1);
  $pdf->Cell(325, $header_height, "As of " . $months . " " . $day . ", " . $year, 0, 0, 'C');
  $pdf->Cell(0, 10, '', 0, 1);
} else {
  $pdf->Cell(325, $header_height, "OFFICIAL RESULT FOR " . $fyear . " SENIOR HIGH SCHOOL APPLICANTS", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, "(NEW BATCH OF SHS EDUCATIONAL ASSISTANCE RECIPIENTS)", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, "STO. TOMAS SCHOLARSHIP PROGRAM", 0, 0, 'C');
  $pdf->Cell(0, 5, '', 0, 1);
  $pdf->Cell(325, $header_height, strtoupper("S.Y. " . $academic), 0, 0, 'C');
  $pdf->Cell(0, 10, '', 0, 1);
  $pdf->Cell(325, $header_height, "As of " . $months . " " . $day . ", " . $year, 0, 0, 'C');
  $pdf->Cell(0, 10, '', 0, 1);
}




$pdf->SetFont('Arial', '', 10);
$pdf->SetWidths(array(20, 75, 60, 97, 60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C'));
if ($_SESSION['studenttype'] == "fullscholar") {
  $pdf->Row(array(
    'NO.',
    'NAME OF STUDENT',
    'BARANGAY',
    'YEAR & COURSE',
    'SCHOOL'
  ));
} else if ($_SESSION['studenttype'] == "collegerecipient") {
  $pdf->Row(array(
    'NO.',
    'NAME OF STUDENT',
    'BARANGAY',
    'YEAR & COURSE',
    'SCHOOL'
  ));
} else {
  $pdf->Row(array(
    'NO.',
    'NAME OF STUDENT',
    'BARANGAY',
    'GRADE & STRAND',
    'SCHOOL'
  ));
}
$order = $_GET['order'];

if ($order == "Score") {

  if (($scholartype == "collegerecipient") || ($scholartype == "shscholar") || ($scholartype == "fullscholar")) {

    $sql10 = "SELECT DISTINCT(score),id FROM tbl_finalscore WHERE academic_id='$academic_id' ORDER BY score DESC";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows > 0) {
      $count = 0;

      while ($row10 = $result10->fetch_assoc()) {
        $score_id = $row10['id'];
        $sql11 = "SELECT * FROM tbl_finalscore WHERE id='$score_id'";
        $result11 = $conn->query($sql11);
        if ($result11->num_rows > 0) {
          while ($row11 = $result11->fetch_assoc()) {
            $academic_year = $row11['academic_year'];
            $application_no = $row11['application_no'];
            $stat = "ASSESSMENT";

            $sql12 = "SELECT * FROM tbl_admin WHERE status='$stat' AND academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$scholartype'";
            $result12 = $conn->query($sql12);
            if ($result12->num_rows > 0) {
              $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
              $result5 = $conn->query($sql5);
              $row5 = $result5->fetch_assoc();

              $lastname = strtoupper($row5['lastname']);
              $firstname = strtoupper($row5['firstname']);
              $mids = strtoupper($row5['middlename']);
              $address = $row5['barangay'];
              $course = $row5['course'];
              $year = $row5['gradelevel'];
              $school = $row5['school'];

              if ($mids == "N/A") {
                $middleini = "";
                $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
              } else {
                $middleini = substr($mids, 0, 1) . '.';
                $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
              }
              $yearcourse = $year . " / " . $course;
              $count++;
              $pdf->SetFont('Arial', '', 10);
              $pdf->SetWidths(array(20, 75, 60, 97, 60));
              $pdf->SetLineHeight(5);
              $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
              $pdf->Row(array(
                $count,
                strtoupper($fullname),
                $address,
                // $row11['score'],
                $yearcourse,
                $school

              ));
            }
          }
        }
        if ($count >= $numberscholar) {
          break;
        }
      }
    }
  } else {
    $sql10 = "SELECT DISTINCT(totalscore) FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' ORDER BY totalscore DESC";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows > 0) {
      $count = 0;
      while ($row10 = $result10->fetch_assoc()) {

        $totalscore = $row10['totalscore'];
        $sql1 = "SELECT * FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 1) {
          $sql2 = "SELECT DISTINCT(others) FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' ORDER BY others DESC";
          $result2 = $conn->query($sql2);
          while ($row2 = $result2->fetch_assoc()) {
            $others = $row2['others'];

            $sql3 = "SELECT * FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others'";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 1) {
              $sql4 = "SELECT * FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others' ORDER BY applicant_number ASC";
              $result4 = $conn->query($sql4);
              while ($row4 = $result4->fetch_assoc()) {

                if ($count > $numberscholar) {
                  break;
                }

                $academic_year = $row4['academic_year'];
                $application_no = $row4['application_no'];
                $stat = "ASSESSMENT";
                $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                $resultb = $conn->query($sqlb);
                if ($resultb->num_rows > 0) {
                  $count++;
                  $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                  $result5 = $conn->query($sql5);
                  $row5 = $result5->fetch_assoc();

                  $lastname = strtoupper($row5['lastname']);
                  $firstname = strtoupper($row5['firstname']);
                  $mids = strtoupper($row5['middlename']);
                  $address = $row5['barangay'];
                  $course = $row5['course'];
                  $year = $row5['gradelevel'];
                  $school = $row5['school'];
                  $incomes = $row4['income'];
                  $grades = $row4['grade'];
                  $residencys = $row4['residency'];
                  $totalothers = $row4['others'];
                  $totalscores = $row4['totalscore'];
                  if ($mids == "N/A") {
                    $middleini = "";
                    $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
                  } else {
                    $middleini = substr($mids, 0, 1) . '.';
                    $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
                  }

                  $yearcourse = $year . " / " . $course;


                  $pdf->SetFont('Arial', '', 10);
                  $pdf->SetWidths(array(20, 75, 60, 97, 60));
                  $pdf->SetLineHeight(5);
                  $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
                  $pdf->Row(array(
                    $count,
                    strtoupper($fullname),
                    $address,
                    $yearcourse,
                    $school

                  ));
                }
              }
            } else {

              if ($count > $numberscholar) {
                break;
              }
              $row3 = $result3->fetch_assoc();
              $academic_year = $row3['academic_year'];
              $application_no = $row3['application_no'];

              $stat = "ASSESSMENT";
              $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
              $resultb = $conn->query($sqlb);
              if ($resultb->num_rows > 0) {
                $count++;
                $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                $result5 = $conn->query($sql5);
                $row5 = $result5->fetch_assoc();

                $lastname = strtoupper($row5['lastname']);
                $firstname = strtoupper($row5['firstname']);
                $mids = strtoupper($row5['middlename']);
                $address = $row5['barangay'];
                $course = $row5['course'];
                $year = $row5['gradelevel'];
                $school = $row5['school'];
                $incomes = $row3['income'];
                $grades = $row3['grade'];
                $residencys = $row3['residency'];
                $totalothers = $row3['others'];
                $totalscores = $row3['totalscore'];
                if ($mids == "N/A") {
                  $middleini = "";
                  $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
                } else {
                  $middleini = substr($mids, 0, 1) . '.';
                  $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
                }
                $yearcourse = $year . " / " . $course;


                $pdf->SetFont('Arial', '', 10);
                $pdf->SetWidths(array(20, 75, 60, 97, 60));
                $pdf->SetLineHeight(5);
                $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
                $pdf->Row(array(
                  $count,
                  strtoupper($fullname),
                  $address,
                  $yearcourse,
                  $school

                ));
              }
            }
          }
        } else {

          if ($count > $numberscholar) {
            break;
          }
          $row1 = $result1->fetch_assoc();
          $academic_year = $row1['academic_year'];
          $application_no = $row1['application_no'];
          $stat = "ASSESSMENT";
          $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
          $resultb = $conn->query($sqlb);
          if ($resultb->num_rows > 0) {
            $count++;
            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
            $result5 = $conn->query($sql5);
            $row5 = $result5->fetch_assoc();

            $lastname = strtoupper($row5['lastname']);
            $firstname = strtoupper($row5['firstname']);
            $mids = strtoupper($row5['middlename']);
            $address = $row5['barangay'];
            $course = $row5['course'];
            $year = $row5['gradelevel'];
            $school = $row5['school'];
            $incomes = $row1['income'];
            $grades = $row1['grade'];
            $residencys = $row1['residency'];
            $totalothers = $row1['others'];
            $totalscores = $row1['totalscore'];
            if ($mids == "N/A") {
              $middleini = "";
              $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
            } else {
              $middleini = substr($mids, 0, 1) . '.';
              $fullname = $lastname . ', ' . $firstname . ' ' . $middleini;
            }
            $yearcourse = $year . " / " . $course;


            $pdf->SetFont('Arial', '', 10);
            $pdf->SetWidths(array(20, 75, 60, 97, 60));
            $pdf->SetLineHeight(5);
            $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
            $pdf->Row(array(
              $count,
              strtoupper($fullname),
              $address,
              $yearcourse,
              $school

            ));
          }
        }
        if ($count > $numberscholar) {
          break;
        }
      }
    }
  }
} else if ($order == "Lastname") {
  $status1 = "ASSESSMENT";
  $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_studentinfo.school
          FROM tbl_admin
          INNER JOIN tbl_studentinfo
          ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
          WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype'  ORDER BY tbl_studentinfo.lastname ASC LIMIT " . $numberscholar;;
} else if ($order == "Barangay") {
  $status1 = "ASSESSMENT";
  $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_studentinfo.school
          FROM tbl_admin
          INNER JOIN tbl_studentinfo
          ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
          WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype'  ORDER BY tbl_studentinfo.barangay ASC LIMIT " . $numberscholar;
  $result = $conn->query($sql);
  $count = 0;
  while ($row = $result->fetch_assoc()) {
    $count++;
    $academic_year = $row['academic_year'];
    $application_no = $row['application_no'];
    // $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    // $result2 = $conn->query($sql2);
    // $row2 = $result2->fetch_assoc();
    $pdf->SetFont('Arial', '', 10);

    $mids = strtoupper($row['middlename']);
    if ($mids == "N/A") {
      $middleini = "";
      $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $middleini;
    } else {
      $middleini = substr($row['middlename'], 0, 1) . '.';
      $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $middleini;
    }


    $address = $row['barangay'];
    $yearcourse = $row['gradelevel'] . " / " . $row['course'];
    $school = $row['school'];

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetWidths(array(20, 75, 60, 97, 60));
    $pdf->SetLineHeight(5);
    $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
    $pdf->Row(array(
      $count,
      strtoupper($fullname),
      $address,
      $yearcourse,
      $school

    ));
  }
} else if ($order == "School") {
  $status1 = "ASSESSMENT";
  $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_studentinfo.school
          FROM tbl_admin
          INNER JOIN tbl_studentinfo
          ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
          WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype'  ORDER BY tbl_studentinfo.school ASC LIMIT " . $numberscholar;

  $result = $conn->query($sql);
  $count = 0;
  while ($row = $result->fetch_assoc()) {
    $count++;
    $academic_year = $row['academic_year'];
    $application_no = $row['application_no'];
    // $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    // $result2 = $conn->query($sql2);
    // $row2 = $result2->fetch_assoc();
    $pdf->SetFont('Arial', '', 10);

    $mids = strtoupper($row['middlename']);
    if ($mids == "N/A") {
      $middleini = "";
      $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $middleini;
    } else {
      $middleini = substr($row['middlename'], 0, 1) . '.';
      $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $middleini;
    }


    $address = $row['barangay'];
    $yearcourse = $row['gradelevel'] . " / " . $row['course'];
    $school = $row['school'];

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetWidths(array(20, 75, 60, 97, 60));
    $pdf->SetLineHeight(5);
    $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
    $pdf->Row(array(
      $count,
      strtoupper($fullname),
      $address,
      $yearcourse,
      $school

    ));
  }
} else if ($order == "Grade Level") {
  $status1 = "ASSESSMENT";
  $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_studentinfo.school
          FROM tbl_admin
          INNER JOIN tbl_studentinfo
          ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
          WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype'  ORDER BY tbl_studentinfo.gradelevel ASC LIMIT " . $numberscholar;

  $result = $conn->query($sql);
  $count = 0;
  while ($row = $result->fetch_assoc()) {
    $count++;
    $academic_year = $row['academic_year'];
    $application_no = $row['application_no'];
    // $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    // $result2 = $conn->query($sql2);
    // $row2 = $result2->fetch_assoc();
    $pdf->SetFont('Arial', '', 10);

    $mids = strtoupper($row['middlename']);
    if ($mids == "N/A") {
      $middleini = "";
      $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $middleini;
    } else {
      $middleini = substr($row['middlename'], 0, 1) . '.';
      $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $middleini;
    }


    $address = $row['barangay'];
    $yearcourse = $row['gradelevel'] . " / " . $row['course'];
    $school = $row['school'];

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetWidths(array(20, 75, 60, 97, 60));
    $pdf->SetLineHeight(5);
    $pdf->SetAligns(array('C', 'L', 'L', 'L', 'L'));
    $pdf->Row(array(
      $count,
      strtoupper($fullname),
      $address,
      $yearcourse,
      $school

    ));
  }
}



$numspacing = $_GET['numspacing'];
// $pdf->Cell(335,10,"",1,0,'L');
$pdf->Cell(0, $numspacing, '', 0, 1);

$pdf->Cell(90, 10, "Prepared by:", 0, 0, 'C');
$pdf->Cell(145, 10, "Recommending Approval:", 0, 0, 'C');
$pdf->Cell(80, 10, "Approved by:", 0, 0, 'C');
$pdf->Cell(0, 13, '', 0, 1);
$pdf->Cell(90, 10, "MS. CATHERINE V. MENDOZA, MMT", 0, 0, 'C');
$pdf->Cell(145, 10, "ENGR. SEVERINO M. MEDALLA", 0, 0, 'C');
$pdf->Cell(80, 10, "ATTY. ARTH JHUN AGUILAR MARASIGAN", 0, 0, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Cell(90, 10, "Scholarship Division Chief", 0, 0, 'C');
$pdf->Cell(145, 10, "City Administrator", 0, 0, 'C');
$pdf->Cell(80, 10, "Public Servant/City Mayor", 0, 0, 'C');






$pdf->Output();
