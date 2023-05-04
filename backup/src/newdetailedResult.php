<?php session_start();
include('pdf_mc_table.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";



if($_SESSION['studenttype']=="fullscholar"){
 $scholartype="fullscholar";
 $typescholar="fullscholar";
}else if($_SESSION['studenttype']=="collegerecipient"){
 $scholartype="collegerecipient";
 $typescholar="collegerecipient";
}else{
  $scholartype="shscholar";
  $typescholar="shscholar";
}




$header_font=14;
$content_font=9;
$header_height=11;
$content_height=7;
$w=35;
$h=16;

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

  // $pdf->Cell(0,10,'',0,1);
  // $pdf->Cell(270,10,"",0,0,'L');
  // $pdf->Cell(100,10,"As of ".$months." ".$day.", ".$year,0 ,0,'L');


 $pdf->SetTitle($title);

      $pdf->AddPage('L',array(210.59,330.02));
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

     $pdf->Cell(0,20,'',0,1);

    $st="OPEN";
      $st1="CURRENT";
      $sqlj = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
      $resultj = $conn->query($sqlj);
      $rowj = $resultj->fetch_assoc();
      $acads = $rowj['academic_year'];
      $academic_id =$rowj['id'];

    if($_SESSION['studenttype']=="fullscholar"){
      $pdf->Cell(335,$header_height,"APPLICANTS ASSESSMENT SUMMARY REPORT",0,0,'C');
       $pdf->Cell(0,5,'',0,1);
       $pdf->Cell(335,$header_height,"COLLEGE SCHOLARSHIP",0,0,'C');

    }else if($_SESSION['studenttype']=="collegerecipient"){
       $pdf->Cell(335,$header_height,"APPLICANTS ASSESSMENT SUMMARY REPORT",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(335,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE",0,0,'C');
    }else{
       $pdf->Cell(335,$header_height,"APPLICANTS ASSESSMENT SUMMARY REPORT",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(335,$header_height,"SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE",0,0,'C');
    }
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(335,$header_height,strtoupper("S.Y. ".$acads." Semester"),0,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(335,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);





 if($_SESSION['studenttype']=="fullscholar"){
  $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(14,41,41,22,28,27,27,18,18,18,22,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
     $pdf->Row(Array(
         'NO.',
  'Last Name',
  'First Name',
  'Middle Initial',
  'Barangay',
  'School',
  'Year & Course',
  'Exam (50)',
  'Grade (30)',
  'Income (10)',
  'Residency (5)',
  'Others (5)',
  'Total Points (100)'
 ));
  }else if($_SESSION['studenttype']=="collegerecipient"){
    $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(14,45,45,22,36,27,27,20,18,22,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
     $pdf->Row(Array(
         'NO.',
  'Last Name',
  'First Name',
  'Middle Initial',
  'Barangay',
  'School',
  'Year & Course',
  'Income (40)',
  'Grade (30)',
  'Residency (20)',
  'Others (10)',
  'Total Points (100)'
 ));
    }else{
      $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(14,45,45,22,36,27,27,20,18,22,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
     $pdf->Row(Array(
         'NO.',
  'Last Name',
  'First Name',
  'Middle Initial',
  'Barangay',
  'School',
  'Grade & Track',
  'Income (40)',
  'Grade (30)',
  'Residency (20)',
  'Others (10)',
  'Total Points (100)'
 ));
    }

// $fromrange=$_GET['fromrange'];
//
//   if($fromrange<=0){
//     $fromrange=0;
//   }else{
//     $fromrange=$fromrange-1;
//   }
//
// $torange=$_GET['totalstudent'];

//college recipient
  if(($scholartype=="collegerecipient")||($scholartype=="shscholar")){
     $sql10 = "SELECT DISTINCT(totalscore) FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' ORDER BY totalscore DESC";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows > 0){
      $count=0;
      while($row10 = $result10->fetch_assoc()){

            $totalscore=$row10['totalscore'];
        $sql1 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 1){
                $sql2 = "SELECT DISTINCT(others) FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' ORDER BY others DESC";
                $result2 = $conn->query($sql2);
                while($row2 = $result2->fetch_assoc()){
                    $others=$row2['others'];

                    $sql3 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others'";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 1){
                        $sql4 = "SELECT * FROM tbl_college_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others' ORDER BY applicant_number ASC";
                        $result4 = $conn->query($sql4);
                        while($row4 = $result4->fetch_assoc()){
                          $academic_year=$row4['academic_year'];
                            $application_no=$row4['application_no'];
                          $stat="ASSESSMENT";
                            $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                            $resultb = $conn->query($sqlb);
                            if ($resultb->num_rows > 0){
                              $count++;


                            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();

                            $lastname = strtoupper($row5['lastname']);
                            $firstname = strtoupper($row5['firstname']);
                            $mids = strtoupper($row5['middlename']);
                            $address = $row5['barangay'];
                            $course =$row5['course'];
                            $year = $row5['gradelevel'];
                            $school = $row5['school'];
                            $incomes = $row4['income'];
                            $grades = $row4['grade'];
                            $residencys = $row4['residency'];
                            $totalothers = $row4['others'];
                            $totalscores = $row4['totalscore'];
                           if($mids=="N/A"){
                             $middleini="";
                           }else{
                                $middleini =strtoupper(substr($row5['middlename'],0,1).'.');
                           }

                            $pdf->SetFont('Arial','',10);
                           $pdf->SetWidths(Array(14,45,45,22,36,27,27,20,18,22,17,17));
                      $pdf->SetLineHeight(5);
                       $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                                     $pdf->Row(Array(
                                    $count,
                                      strtoupper($lastname),
                                      strtoupper($firstname),
                                      strtoupper($middleini),
                                      $address,
                                      $school,
                                       $year." / ".$course,
                                      $incomes,
                                      $grades,
                                      $residencys,
                                      $totalothers,
                                      $totalscores
                                   ));
                            }

                        }

                    }else{

                        $row3 = $result3->fetch_assoc();
                        $academic_year=$row3['academic_year'];
                            $application_no=$row3['application_no'];

                             $stat="ASSESSMENT";
                            $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                            $resultb = $conn->query($sqlb);
                            if ($resultb->num_rows > 0){
                              $count++;
                                $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();

                            $lastname = strtoupper($row5['lastname']);
                            $firstname = strtoupper($row5['firstname']);
                            $mids = strtoupper($row5['middlename']);
                            $address = $row5['barangay'];
                            $course =$row5['course'];
                            $year = $row5['gradelevel'];
                            $school = $row5['school'];
                            $incomes = $row3['income'];
                            $grades = $row3['grade'];
                            $residencys = $row3['residency'];
                            $totalothers = $row3['others'];
                            $totalscores = $row3['totalscore'];
                           if($mids=="N/A"){
                             $middleini="";
                           }else{
                                $middleini =strtoupper(substr($row5['middlename'],0,1).'.');
                           }
                            $pdf->SetFont('Arial','',10);
                           $pdf->SetWidths(Array(14,45,45,22,36,27,27,20,18,22,17,17));
                      $pdf->SetLineHeight(5);
                       $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                                     $pdf->Row(Array(
                                    $count,
                                      strtoupper($lastname),
                                      strtoupper($firstname),
                                      strtoupper($middleini),
                                      $address,
                                      $school,
                                      $year." / ".$course,
                                      $incomes,
                                      $grades,
                                      $residencys,
                                      $totalothers,
                                      $totalscores
                                   ));
                            }

                    }





                }
            }else{

                $row1 = $result1->fetch_assoc();
                        $academic_year=$row1['academic_year'];
                            $application_no=$row1['application_no'];
                             $stat="ASSESSMENT";
                            $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                            $resultb = $conn->query($sqlb);
                            if ($resultb->num_rows > 0){
                              $count++;
                              $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();

                            $lastname = strtoupper($row5['lastname']);
                            $firstname = strtoupper($row5['firstname']);
                            $mids = strtoupper($row5['middlename']);
                            $address = $row5['barangay'];
                            $course =$row5['course'];
                            $year = $row5['gradelevel'];
                            $school = $row5['school'];
                            $incomes = $row1['income'];
                            $grades = $row1['grade'];
                            $residencys = $row1['residency'];
                            $totalothers = $row1['others'];
                            $totalscores = $row1['totalscore'];
                           if($mids=="N/A"){
                             $middleini="";
                           }else{
                                $middleini =strtoupper(substr($row5['middlename'],0,1).'.');
                           }
                            $pdf->SetFont('Arial','',10);
                          $pdf->SetWidths(Array(14,45,45,22,36,27,27,20,18,22,17,17));
                      $pdf->SetLineHeight(5);
                       $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                                     $pdf->Row(Array(
                                    $count,
                                      strtoupper($lastname),
                                      strtoupper($firstname),
                                      strtoupper($middleini),
                                      $address,
                                      $school,
                                      $year." / ".$course,
                                      $incomes,
                                      $grades,
                                      $residencys,
                                      $totalothers,
                                      $totalscores
                                   ));
                            }

            }


      }
    }




  }else{
     $sql10 = "SELECT DISTINCT(totalscore) FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' ORDER BY totalscore DESC";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows > 0){
      $count=0;
      while($row10 = $result10->fetch_assoc()){

            $totalscore=$row10['totalscore'];
        $sql1 = "SELECT * FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 1){
                $sql2 = "SELECT DISTINCT(others) FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' ORDER BY others DESC";
                $result2 = $conn->query($sql2);
                while($row2 = $result2->fetch_assoc()){
                    $others=$row2['others'];

                    $sql3 = "SELECT * FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others'";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 1){
                        $sql4 = "SELECT * FROM tbl_scholar_grade WHERE typescholar='$typescholar' AND academic_id='$academic_id' AND totalscore='$totalscore' AND others='$others' ORDER BY applicant_number ASC";
                        $result4 = $conn->query($sql4);
                        while($row4 = $result4->fetch_assoc()){

                            $academic_year=$row4['academic_year'];
                            $application_no=$row4['application_no'];



                            $stat="ASSESSMENT";
                            $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                            $resultb = $conn->query($sqlb);
                            if ($resultb->num_rows > 0){

                              $count++;
                               $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();

                            $lastname = strtoupper($row5['lastname']);
                            $firstname = strtoupper($row5['firstname']);
                            $mids = strtoupper($row5['middlename']);
                            $address = $row5['barangay'];
                            $course =$row5['course'];
                            $year = $row5['gradelevel'];
                            $school = $row5['school'];
                            $incomes = $row4['income'];
                            $grades = $row4['grade'];
                            $exam = $row4['exam'];
                            $residencys = $row4['residency'];
                            $totalothers = $row4['others'];
                            $totalscores = $row4['totalscore'];
                           if($mids=="N/A"){
                             $middleini="";
                           }else{
                                $middleini =strtoupper(substr($row5['middlename'],0,1).'.');
                           }

                               $pdf->SetFont('Arial','',10);
      $pdf->SetWidths(Array(14,41,41,22,28,27,27,18,18,18,22,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                                     $pdf->Row(Array(
                                    $count,
                                      strtoupper($lastname),
                                      strtoupper($firstname),
                                      strtoupper($middleini),
                                      $address,
                                      $school,
                                      $year." / ".$course,
                                       $exam,
                                       $grades,
                                      $incomes,

                                      $residencys,
                                      $totalothers,
                                      $totalscores
                                   ));
                            }


                        }

                    }else{
                      $stat="ASSESSMENT";
                      $row3 = $result3->fetch_assoc();
                      $academic_year=$row3['academic_year'];
                            $application_no=$row3['application_no'];
                            $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                            $resultb = $conn->query($sqlb);
                            if ($resultb->num_rows > 0){
                               $count++;

                            $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();

                            $lastname = strtoupper($row5['lastname']);
                            $firstname = strtoupper($row5['firstname']);
                            $mids = strtoupper($row5['middlename']);
                            $address = $row5['barangay'];
                            $course =$row5['course'];
                            $year = $row5['gradelevel'];
                            $school = $row5['school'];
                            $incomes = $row3['income'];
                            $grades = $row3['grade'];
                             $exam = $row3['exam'];
                            $residencys = $row3['residency'];
                            $totalothers = $row3['others'];
                            $totalscores = $row3['totalscore'];
                           if($mids=="N/A"){
                             $middleini="";
                           }else{
                                $middleini =strtoupper(substr($row5['middlename'],0,1).'.');
                           }
                              $pdf->SetFont('Arial','',10);
      $pdf->SetWidths(Array(14,41,41,22,28,27,27,18,18,18,22,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                                     $pdf->Row(Array(
                                    $count,
                                      strtoupper($lastname),
                                      strtoupper($firstname),
                                      strtoupper($middleini),
                                      $address,
                                      $school,
                                     $year." / ".$course,
                                       $exam,
                                       $grades,
                                      $incomes,
                                      $residencys,
                                      $totalothers,
                                      $totalscores
                                   ));
                            }

                    }





                }
            }else{

                 $stat="ASSESSMENT";
                $row1 = $result1->fetch_assoc();
                        $academic_year=$row1['academic_year'];
                            $application_no=$row1['application_no'];

                            $application_no=$row1['application_no'];
                            $sqlb = "SELECT * FROM tbl_admin WHERE application_no='$application_no' AND academic_year='$academic_year' AND status='$stat'";
                            $resultb = $conn->query($sqlb);
                            if ($resultb->num_rows > 0){
                              $count++;
                               $sql5 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();

                            $lastname = strtoupper($row5['lastname']);
                            $firstname = strtoupper($row5['firstname']);
                            $mids = strtoupper($row5['middlename']);
                            $address = $row5['barangay'];
                            $course =$row5['course'];
                            $year = $row5['gradelevel'];
                            $school = $row5['school'];
                            $incomes = $row1['income'];
                            $grades = $row1['grade'];
                             $exam = $row1['exam'];
                            $residencys = $row1['residency'];
                            $totalothers = $row1['others'];
                            $totalscores = $row1['totalscore'];
                           if($mids=="N/A"){
                             $middleini="";
                           }else{
                                $middleini =strtoupper(substr($row5['middlename'],0,1).'.');
                           }
                             $pdf->SetFont('Arial','',10);
     $pdf->SetWidths(Array(14,41,41,22,28,27,27,18,18,18,22,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                                     $pdf->Row(Array(
                                    $count,
                                      strtoupper($lastname),
                                      strtoupper($firstname),
                                      strtoupper($middleini),
                                      $address,
                                      $school,
                                      $year." / ".$course,
                                        $exam,
                                       $grades,
                                      $incomes,
                                      $residencys,
                                      $totalothers,
                                      $totalscores
                                   ));
                            }



            }


      }
    }
  }





// End Exam



$numspacing = $_GET['spacing'];
  // $pdf->Cell(335,10,"",1,0,'L');
  // $pdf->Cell(0,$numspacing,'',0,1);
  $pdf->Cell(0,$numspacing,'',0,1);
  $pdf->Cell(90,10,"Prepared by:",0 ,0,'C');
  $pdf->Cell(145,10,"Recommending Approval:",0 ,0,'C');
  $pdf->Cell(80,10,"Approved by:",0 ,0,'C');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(90,10,"MS. CATHERINE V. MENDOZA, MMT",0,0,'C');
  $pdf->Cell(145,10,"ENGR. SEVERINO M. MEDALLA",0,0,'C');
  $pdf->Cell(80,10,"ATTY. ARTH JHUN AGUILAR MARASIGAN",0,0,'C');
  $pdf->Cell(0,7,'',0,1);
  $pdf->Cell(90,10,"Youth Development Officer (CYDSD)",0 ,0,'C');
  $pdf->Cell(145,10,"City Administrator",0 ,0,'C');
  $pdf->Cell(80,10,"Public Servant/City Mayor",0 ,0,'C');














$pdf->Output();

?>
