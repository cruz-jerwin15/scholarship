<?php session_start();
include('pdf_mc_table5.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";
 $status="ASSESSMENT";
 $cat="";
if($_SESSION['studenttype']=="fullscholar"){
 $scholartype="fullscholar";
}else if($_SESSION['studenttype']=="collegerecipient"){
 $scholartype="collegerecipient";
 if($_SESSION['category']=="Public"){
   $cat="Public / State Universities";
 }else{
   $cat="Private / Institute";
 }
}else{
  $scholartype="shscholar";
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
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,120,10,25);
    // $pdf->Cell(100,10,"",0,0,'L');
    $pdf->Cell(335,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
    // $pdf->Cell(110,10,"",0,0,'L');
    $pdf->Cell(335,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,5,'',0,1);
    // $pdf->Cell(110,10,"",0,0,'L');
    $pdf->Cell(335,10,"City of Sto. Tomas",0,0,'C');



    $pdf->SetFont('Times','',$header_font);

     $pdf->Cell(0,17,'',0,1);

    $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];

         $sy =$rowa['academic_year'].' '.$rowa['sem'].' semester';


    $pdf->Cell(335,$header_height,"ASSESSMENT / GRADE EVALUATION",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
    if($_SESSION['studenttype']=="fullscholar"){
        $pdf->Cell(335,$header_height,"STO. TOMAS COLLEGE FULL SCHOLARSHIP",0,0,'C');
    }else if($_SESSION['studenttype']=="collegerecipient"){
        $pdf->Cell(335,$header_height,"STO. TOMAS COLLEGE FINANCIAL ASSISTANCE",0,0,'C');
    }else{
        $pdf->Cell(335,$header_height,"STO. TOMAS SENIOR HIGH SCHOOL FINANCIAL ASSISTANCE",0,0,'C');
    }
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(335,$header_height,strtoupper("S.Y. ".$sy),0,0,'C');
    $pdf->Cell(0,10,'',0,1);

    $pdf->Cell(325,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
$pdf->Cell(0,10,'',0,1);


$pdf->SetFont('Arial','',10);
$pdf->SetWidths(Array(50,25,25,20,30,20,20,25,70,50));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C'));
 if($_SESSION['studenttype']=="fullscholar"){
       $pdf->Row(Array(
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
       $pdf->Row(Array(
  'NAME OF SCHOLARS',
  'BARANGAY',
  'SCHOOLS',
  'BATCH',
  'YEAR & COURSE',
  'NO FAILING GRADE',
  'WITH FAILING GRADE',
  'GENERAL WEIGHTED AVERAGE',
  'REMARKS',
  'FINAL ASSESSMENT/ RECOMMENDATION'
 ));
    }else{
       $pdf->Row(Array(
  'NAME OF SCHOLARS',
  'BARANGAY',
  'SCHOOLS',
  'BATCH',
  'GRADE & STRAND',
 'NO FAILING GRADE',
  'WITH FAILING GRADE',
  'GENERAL WEIGHTED AVERAGE',
  'REMARKS',
  'FINAL ASSESSMENT/ RECOMMENDATION'
 ));
    }


  $sql1 = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id'  AND typescholar='$scholartype'";
    $result1 = $conn->query($sql1);
    $count=0;
    while($row1 = $result1->fetch_assoc()){

      $academic_year=$row1['academic_year'];
      $application_no=$row1['application_no'];

      

      $grade = $row1['grades'];
      $remarks = $row1['remarks'];
      $status=$row1['status'];

      $sql4 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
      $result4 = $conn->query($sql4);
      if ($result4->num_rows > 0){


      $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();

      $sql10 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
      $result10 = $conn->query($sql10);
      $row10 = $result10->fetch_assoc();

      $sql3 = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id'AND academic_year='$academic_year' AND application_no='$application_no'";
      $result3 = $conn->query($sql3);
      $row3 = $result3->fetch_assoc();

      if(isset($row3['grades'])){
        $gwa = $row3['grades'];
      }else{
        $gwa=0;
      }





      $fullname = $row2['firstname'].' '.$row2['lastname'];
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



      $pdf->SetFont('Arial','',10);

      $pdf->SetWidths(Array(50,25,25,20,30,20,20,25,70,50));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('L','C','C','C','C','C','C','C','C','C'));


       if($_SESSION['studenttype']=="fullscholar"){
         $count=$count+1;
             if($grade=="No Grade Below 80"){
           $pdf->Row(Array(
            $count.'. '.$fullname,
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
            $count.'. '.$fullname,
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
            $count.'. '.$fullname,
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
            $count=$count+1;
            if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count.'. '.$fullname,
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
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count.'. '.$fullname,
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
            $count.'. '.$fullname,
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
        }else{
            $count=$count+1;
           if($grade=="No Failing Grade"){
           $pdf->Row(Array(
            $count.'. '.$fullname,
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
      }else if($grade=="With Failing Grade"){
          $pdf->Row(Array(
            $count.'. '.$fullname,
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
            $count.'. '.$fullname,
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
        }



    }
  }
  // $pdf->Cell(335,10,"",1,0,'L');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
  $pdf->Cell(137.5,10,"Prepared by:",0 ,0,'L');
  $pdf->Cell(167.5,10,"Noted by:",0 ,0,'L');
  $pdf->Cell(0,10,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
if($_SESSION['studenttype']=="fullscholar"){
         $pdf->Cell(137.5,10,"MARRIJOY B. MUHALLIN",0,0,'L');
    }else if($_SESSION['studenttype']=="collegerecipient"){
        $pdf->Cell(137.5,10,"MARRIJOY B. MUHALLIN",0,0,'L');
    }else{
         $pdf->Cell(137.5,10,"PRINCESS A. HALILI",0,0,'L');
    }
  $pdf->Cell(167.5,10,"CATHERINE V. MENDOZA",0 ,0,'L');
  $pdf->Cell(0,5,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
  $pdf->Cell(137.5,10,"Administrative Assistant",0 ,0,'L');
  $pdf->Cell(167.5,10,"Youth Development Officer III - ICO",0 ,0,'L');



$pdf->Output();

?>
