<?php session_start();
include('pdf_mc_table5.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";
$count=0;
$filter = $_POST['ren_filter'];
$spacing = $_POST['spacing'];

 $status="ASSESSMENT";
if($_SESSION['studenttype']=="fullscholar"){
 $scholartype="fullscholar";
}else if($_SESSION['studenttype']=="collegerecipient"){
 $scholartype="collegerecipient";
}else{
  $scholartype="shscholar";
}

$category=$_SESSION['category'];
$cat="";

if($category=="Public"){
  $cat="Public / State Universities";

}else{
  $cat="Private / Institute";
}

date_default_timezone_set("Asia/Manila");
    $year =date('Y');
    $month=date('m');
    $day=date('d');


    if($month==1){
      $months="January";
    }else if($month==2){
      $months="February";
    }else if($month==3){
      $months="March";
    }else if($month==4){
      $months="April";
    }else if($month==5){
      $months="May";
    }else if($month==6){
      $months="June";
    }else if($month==7){
      $months="July";
    }else if($month==8){
      $months="August";
    }else if($month==9){
      $months="September";
    }else if($month==10){
      $months="October";
    }else if($month==11){
      $months="November";
    }else if($month==12){
      $months="December";
    }


$header_font=12;
$content_font=9;
$header_height=11;
$content_height=7;
$w=35;
$h=16;

 $pdf->SetTitle($title);
      $pdf->AddPage('L','Legal');
    $profile="img/citylogo.png";
    $aksyon="img/aksyonbilis.png";
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,125,10,25);

    $pdf->Cell(335,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,5,'',0,1);

    $pdf->Cell(335,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,5,'',0,1);

    $pdf->Cell(335,10,"City of Sto. Tomas",0,0,'C');
    $pdf->Image($aksyon,200,5,45);


    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(0,17,'',0,1);

    $stats="OPEN";
    $sql = "SELECT * FROM tbl_assesment WHERE status='$stats'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sy =$row['academic_year'].' '.$row['semester'].' semester';

    $pdf->Cell(335,$header_height,"ASSESSMENT / GRADE EVALUATION",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
    if($_SESSION['studenttype']=="fullscholar"){
        $pdf->Cell(335,$header_height,"STO. TOMAS COLLEGE FULL SCHOLARSHIP",0,0,'C');
    }else if($_SESSION['studenttype']=="collegerecipient"){
        $pdf->Cell(335,$header_height,"STO. TOMAS COLLEGE FINANCIAL ASSISTANCE",0,0,'C');
    }else{
        $pdf->Cell(335,$header_height,"STO. TOMAS SENIOR HIGH SCHOOL FINANCIAL ASSISTANCE",0,0,'C');
    }

      $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];

         $sy =$rowa['academic_year'].' '.$rowa['sem'].' semester';


    $pdf->Cell(0,5,'',0,1);
     $pdf->Cell(335,$header_height,strtoupper("S.Y. ".$sy),0,0,'C');
     $pdf->Cell(0,10,'',0,1);
    $pdf->Cell(325,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
$pdf->Cell(0,10,'',0,1);



 if($_SESSION['studenttype']=="fullscholar"){
  $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,40,25,25,20,30,20,20,25,70,50));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C'));
       $pdf->Row(Array(
        'NO.',
  'NAME OF SCHOLARS',
  'BARANGAY',
  'SCHOOLS',
  'BATCH',
  'YEAR & COURSE',
  'NO GRADE BELOW 80',
  'WITH GRADE BELOW 80',
  'GENERAL WEIGHTED AVERAGE',
  'REMARKS',
  'FINAL ASSESSMENT/ RECOMMENDATION'
 ));
    }else if($_SESSION['studenttype']=="collegerecipient"){
      $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
       $pdf->Row(Array(
  'NO.',
  'NAME OF SCHOLARS',
  'BARANGAY',
  'SCHOOLS',
  'YEAR & COURSE',
  'NO FAILING GRADE',
  'WITH FAILING GRADE',
  'GENERAL WEIGHTED AVERAGE',
  'REMARKS',
  'FINAL ASSESSMENT/ RECOMMENDATION'
 ));
    }else{
      $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
       $pdf->Row(Array(
  'NO.',
  'NAME OF SCHOLARS',
  'BARANGAY',
  'SCHOOLS',
  'GRADE & STRAND',
 'NO FAILING GRADE',
  'WITH FAILING GRADE',
  'GENERAL WEIGHTED AVERAGE',
  'REMARKS',
  'FINAL ASSESSMENT/ RECOMMENDATION'
 ));
    }

    if($filter=="ALL") {
         $status1="For Renewal";
  $sql1 = "SELECT * FROM tbl_renewal WHERE status='$status1' AND academic_id='$academic_id' AND typescholar='$scholartype'";
    $result1 = $conn->query($sql1);
    $count=0;
    while($row1 = $result1->fetch_assoc()){

      $academic_year=$row1['academic_year'];
      $application_no=$row1['application_no'];
      $grade = $row1['grades'];
      $remarks = $row1['remarks'];
      $status=$row1['status'];

      $sql4 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' ";
      $result4 = $conn->query($sql4);
      if ($result4->num_rows > 0){



          $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $result2 = $conn->query($sql2);
          $row2 = $result2->fetch_assoc();








      $sql10 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
      $result10 = $conn->query($sql10);
      $row10 = $result10->fetch_assoc();

 $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];




      $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $result3 = $conn->query($sql3);
      $row3 = $result3->fetch_assoc();

      $gwa = $row3['grades'];

      $middlename =strtoupper($row2['middlename']);
      if((strlen($middlename)<=0)||($middlename=="N/A")){
        $mid = "";
      }else{
        $mid = substr($middlename, 0,1).".";
      }

      $fullname = $row2['lastname'].', '.$row2['firstname']." ".$mid;
      $barangay = strtoupper($row2['barangay']);
      $school = strtoupper($row2['school']);
      $yearcourse = strtoupper($row2['gradelevel']." / ". $row2['course']);
      if($_SESSION['studenttype']=="fullscholar"){
        $academic_year=$row10['batch'];
    }else if($_SESSION['studenttype']=="collegerecipient"){
        $academic_year=$academic_year;
    }else{
        $academic_year=$academic_year;
    }



      if($_SESSION['studenttype']=="fullscholar"){
         $pdf->SetFont('Arial','',10);

     $pdf->SetWidths(Array(10,40,25,25,20,30,20,20,25,70,50));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C'));
         $count=$count+1;
             if($grade=="No Grade Below 80"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $academic_year,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Grade Below 80"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $academic_year,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $academic_year,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }else if($_SESSION['studenttype']=="collegerecipient"){
             $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C'));
           $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
             $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
             $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }else{
           $count=$count+1;
              $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }

    }
  }
    }else  if($filter=="SCHOOL") {

      if($_SESSION['studenttype']=="fullscholar"){
              $status4="For Renewal";
       $sql = "SELECT tbl_admin.id,tbl_admin.batch,tbl_admin.academic_year,tbl_admin.application_no, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_renewal.grades,tbl_renewal.remarks,tbl_renewal.status
       FROM tbl_admin
       INNER JOIN tbl_studentinfo
       ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
       JOIN tbl_renewal
        ON tbl_admin.academic_year=tbl_renewal.academic_year AND tbl_admin.application_no=tbl_renewal.application_no
       WHERE tbl_renewal.academic_id='$academic_id' AND tbl_renewal.typescholar='$scholartype' AND tbl_renewal.status='$status4' ORDER BY tbl_studentinfo.school ASC";
                        ;
        $result = $conn->query($sql);
        $count=0;
        while($row = $result->fetch_assoc()){
            $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
            $remarks = $row['remarks'];
            $status=$row['status'];
            $grade = $row['grades'];

             $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();

              $gwa = $row3['grades'];



           $middlename =strtoupper($row['middlename']);
      if((strlen($middlename)<=0)||($middlename=="N/A")){
        $mid = "";
      }else{
        $mid = substr($middlename, 0,1).".";
      }

      $fullname = $row['lastname'].', '.$row['firstname']." ".$mid;
            $barangay = strtoupper($row['barangay']);
            $school = strtoupper($row['school']);
            $yearcourse = strtoupper($row['gradelevel']." / ". $row['course']);

             if($_SESSION['studenttype']=="fullscholar"){
                    $academic_years=$row['batch'];
                }else if($_SESSION['studenttype']=="collegerecipient"){
                    $academic_years=$academic_year;
                }else{
                    $academic_years=$academic_year;
                }


      if($_SESSION['studenttype']=="fullscholar"){
         $pdf->SetFont('Arial','',10);

      $pdf->SetWidths(Array(10,40,25,25,20,30,20,20,25,70,50));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C','C'));
         $count=$count+1;
             if($grade=="No Grade Below 80"){
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'YES',
                  'NO',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else if($grade=="With Grade Below 80"){
                $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'NO',
                  'YES',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else{
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  '',
                  '',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }
              }else if($_SESSION['studenttype']=="collegerecipient"){
             $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C'));
           $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        } else{
           $count=$count+1;
              $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }//end if
        }
      }else if($_SESSION['studenttype']=="collegerecipient"){
          $sql7 = "SELECT DISTINCT(school) as sschool FROM tbl_studentinfo order by school ASC";
          $result7 = $conn->query($sql7);
          while($row7 = $result7->fetch_assoc()){
              $newschool=$row7['sschool'];

                $status4="For Renewal";
       $sql = "SELECT tbl_admin.id,tbl_admin.batch,tbl_admin.academic_year,tbl_admin.application_no, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_renewal.grades,tbl_renewal.remarks,tbl_renewal.status
       FROM tbl_admin
       INNER JOIN tbl_studentinfo
       ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
       JOIN tbl_renewal
        ON tbl_admin.academic_year=tbl_renewal.academic_year AND tbl_admin.application_no=tbl_renewal.application_no
       WHERE tbl_renewal.academic_id='$academic_id' AND tbl_renewal.typescholar='$scholartype' AND tbl_renewal.status='$status4' AND tbl_studentinfo.school='$newschool'";
                        ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
            $remarks = $row['remarks'];
            $status=$row['status'];
            $grade = $row['grades'];

             $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();

              $gwa = $row3['grades'];



            $middlename =strtoupper($row['middlename']);
      if((strlen($middlename)<=0)||($middlename=="N/A")){
        $mid = "";
      }else{
        $mid = substr($middlename, 0,1).".";
      }

      $fullname = $row['lastname'].', '.$row['firstname']." ".$mid;
            $barangay = strtoupper($row['barangay']);
            $school = strtoupper($row['school']);
            $yearcourse = strtoupper($row['gradelevel']." / ". $row['course']);

             if($_SESSION['studenttype']=="fullscholar"){
                    $academic_years=$row['batch'];
                }else if($_SESSION['studenttype']=="collegerecipient"){
                    $academic_years=$academic_year;
                }else{
                    $academic_years=$academic_year;
                }


      if($_SESSION['studenttype']=="fullscholar"){
         $pdf->SetFont('Arial','',10);

      $pdf->SetWidths(Array(10,50,25,25,20,30,20,20,25,70,50));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C','C'));
         $count=$count+1;
             if($grade=="No Grade Below 80"){
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'YES',
                  'NO',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else if($grade=="With Grade Below 80"){
                $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'NO',
                  'YES',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else{
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  '',
                  '',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }
              }else if($_SESSION['studenttype']=="collegerecipient"){
             $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C'));
           $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        } else{
           $count=$count+1;
              $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }//end if
        }

          }//end while
      }else if($_SESSION['studenttype']=="shscholar"){
          $sql7 = "SELECT DISTINCT(school) as sschool FROM tbl_studentinfo order by school ASC";
          $result7 = $conn->query($sql7);
          while($row7 = $result7->fetch_assoc()){
              $newschool=$row7['sschool'];

                $status4="For Renewal";
       $sql = "SELECT tbl_admin.id,tbl_admin.batch,tbl_admin.academic_year,tbl_admin.application_no, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_renewal.grades,tbl_renewal.remarks,tbl_renewal.status
       FROM tbl_admin
       INNER JOIN tbl_studentinfo
       ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
       JOIN tbl_renewal
        ON tbl_admin.academic_year=tbl_renewal.academic_year AND tbl_admin.application_no=tbl_renewal.application_no
       WHERE tbl_renewal.academic_id='$academic_id' AND tbl_renewal.typescholar='$scholartype' AND tbl_renewal.status='$status4' AND tbl_studentinfo.school='$newschool'";
                        ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
            $remarks = $row['remarks'];
            $status=$row['status'];
            $grade = $row['grades'];

             $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();

              $gwa = $row3['grades'];



           $middlename =strtoupper($row['middlename']);
      if((strlen($middlename)<=0)||($middlename=="N/A")){
        $mid = "";
      }else{
        $mid = substr($middlename, 0,1).".";
      }

      $fullname = $row['lastname'].', '.$row['firstname']." ".$mid;
            $barangay = strtoupper($row['barangay']);
            $school = strtoupper($row['school']);
            $yearcourse = strtoupper($row['gradelevel']." / ". $row['course']);

             if($_SESSION['studenttype']=="fullscholar"){
                    $academic_years=$row['batch'];
                }else if($_SESSION['studenttype']=="collegerecipient"){
                    $academic_years=$academic_year;
                }else{
                    $academic_years=$academic_year;
                }


      if($_SESSION['studenttype']=="fullscholar"){
         $pdf->SetFont('Arial','',10);

      $pdf->SetWidths(Array(10,50,25,25,20,30,20,20,25,70,50));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C','C'));
         $count=$count+1;
             if($grade=="No Grade Below 80"){
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'YES',
                  'NO',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else if($grade=="With Grade Below 80"){
                $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'NO',
                  'YES',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else{
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  '',
                  '',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }
              }else if($_SESSION['studenttype']=="collegerecipient"){
             $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C'));
           $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        } else{
           $count=$count+1;
              $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }//end if
        }

          }//end while
      }//end if typescholar


    }else  if($filter=="LASTNAME") {
      $status4="For Renewal";
       $sql = "SELECT tbl_admin.id,tbl_admin.batch,tbl_admin.academic_year,tbl_admin.application_no, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_renewal.grades,tbl_renewal.remarks,tbl_renewal.status
       FROM tbl_admin
       INNER JOIN tbl_studentinfo
       ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
       JOIN tbl_renewal
        ON tbl_admin.academic_year=tbl_renewal.academic_year AND tbl_admin.application_no=tbl_renewal.application_no
       WHERE tbl_renewal.academic_id='$academic_id' AND tbl_renewal.typescholar='$scholartype' AND tbl_renewal.status='$status4' ORDER BY tbl_studentinfo.lastname ASC";
                        ;
        $result = $conn->query($sql);
        $count=0;
        while($row = $result->fetch_assoc()){
            $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
            $remarks = $row['remarks'];
            $status=$row['status'];
            $grade = $row['grades'];

             $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();

              $gwa = $row3['grades'];



             $middlename =strtoupper($row['middlename']);
      if((strlen($middlename)<=0)||($middlename=="N/A")){
        $mid = "";
      }else{
        $mid = substr($middlename, 0,1).".";
      }

      $fullname = $row['lastname'].', '.$row['firstname']." ".$mid;
            $barangay = strtoupper($row['barangay']);
            $school = strtoupper($row['school']);
            $yearcourse = strtoupper($row['gradelevel']." / ". $row['course']);

             if($_SESSION['studenttype']=="fullscholar"){
                    $academic_years=$row['batch'];
                }else if($_SESSION['studenttype']=="collegerecipient"){
                    $academic_years=$academic_year;
                }else{
                    $academic_years=$academic_year;
                }


      if($_SESSION['studenttype']=="fullscholar"){
         $pdf->SetFont('Arial','',10);

      $pdf->SetWidths(Array(10,40,25,25,20,30,20,20,25,70,50));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C','C'));
         $count=$count+1;
             if($grade=="No Grade Below 80"){
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'YES',
                  'NO',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else if($grade=="With Grade Below 80"){
                $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'NO',
                  'YES',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else{
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  '',
                  '',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }
              }else if($_SESSION['studenttype']=="collegerecipient"){
             $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C'));
           $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        } else{
           $count=$count+1;
              $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }//end if
        }
    }else  if($filter=="GRADE LEVEL") {
      $status4="For Renewal";
       $sql = "SELECT tbl_admin.id,tbl_admin.batch,tbl_admin.academic_year,tbl_admin.application_no, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_renewal.grades,tbl_renewal.remarks,tbl_renewal.status
       FROM tbl_admin
       INNER JOIN tbl_studentinfo
       ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
       JOIN tbl_renewal
        ON tbl_admin.academic_year=tbl_renewal.academic_year AND tbl_admin.application_no=tbl_renewal.application_no
       WHERE tbl_renewal.academic_id='$academic_id' AND tbl_renewal.typescholar='$scholartype' AND tbl_renewal.status='$status4' ORDER BY tbl_studentinfo.gradelevel ASC";
                        ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
            $remarks = $row['remarks'];
            $status=$row['status'];
            $grade = $row['grades'];

             $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();

              $gwa = $row3['grades'];



           $middlename =strtoupper($row['middlename']);
      if((strlen($middlename)<=0)||($middlename=="N/A")){
        $mid = "";
      }else{
        $mid = substr($middlename, 0,1).".";
      }

      $fullname = $row['lastname'].', '.$row['firstname']." ".$mid;
            $barangay = strtoupper($row['barangay']);
            $school = strtoupper($row['school']);
            $yearcourse = strtoupper($row['gradelevel']." / ". $row['course']);

             if($_SESSION['studenttype']=="fullscholar"){
                    $academic_years=$row['batch'];
                }else if($_SESSION['studenttype']=="collegerecipient"){
                    $academic_years=$academic_year;
                }else{
                    $academic_years=$academic_year;
                }


      if($_SESSION['studenttype']=="fullscholar"){
         $pdf->SetFont('Arial','',10);

      $pdf->SetWidths(Array(10,50,25,25,20,30,20,20,25,70,50));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C','C'));
         $count=$count+1;
             if($grade=="No Grade Below 80"){
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'YES',
                  'NO',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else if($grade=="With Grade Below 80"){
                $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  'NO',
                  'YES',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }else{
                 $pdf->Row(Array(
                  $count,$fullname,
                  $barangay,
                  $school,
                  $academic_years,
                  $yearcourse,
                  '',
                  '',
                  $gwa,
                  $remarks,
                  $status
                 ));
            }
              }else if($_SESSION['studenttype']=="collegerecipient"){
             $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('L','L','C','C','C','C','C','C','C','C'));
           $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        } else{
           $count=$count+1;
              $pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(10,50,25,25,30,20,20,25,70,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'YES',
            'NO',
            $gwa,
            $remarks,
            $status
           ));
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            'NO',
            'YES',
            $gwa,
            $remarks,
            $status
           ));
      }else{
           $pdf->Row(Array(
            $count,
            $fullname,
            $barangay,
            $school,
            $yearcourse,
            '',
            '',
            $gwa,
            $remarks,
            $status
           ));
      }
        }//end if
        }
    }//end if//end if

  // $pdf->Cell(335,10,"",1,0,'L');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(20,$spacing,"",0,0,'L');
  $pdf->Cell(137.5,10,"Prepared by:",0 ,0,'L');
  $pdf->Cell(167.5,10,"Noted by:",0 ,0,'L');
  $pdf->Cell(0,10,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
 if($_SESSION['studenttype']=="fullscholar"){
         $pdf->Cell(137.5,10,"MARRIJOY B. MUHALLIN",0,0,'L');
    }else if($_SESSION['studenttype']=="collegerecipient"){
        $pdf->Cell(137.5,10,"JENNIFER JOYCE M. MALAIBA",0,0,'L');
    }else{
         $pdf->Cell(137.5,10,"JEZZE CHRISTIAN M. MEDALLA",0,0,'L');
    }
  $pdf->Cell(167.5,10,"CATHERINE V. MENDOZA",0 ,0,'L');
  $pdf->Cell(0,5,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
  if($_SESSION['studenttype']=="fullscholar"){
        $pdf->Cell(137.5,10,"Administrative Aide II",0 ,0,'L');
     }else if($_SESSION['studenttype']=="collegerecipient"){
         $pdf->Cell(137.5,10,"Administrative Assistant",0 ,0,'L');
     }else{
          $pdf->Cell(137.5,10,"Administrative Assistant",0 ,0,'L');
     }

  $pdf->Cell(167.5,10,"Scholarship Division Chief",0 ,0,'L');



$pdf->Output();

?>
