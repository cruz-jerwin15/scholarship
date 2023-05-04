<?php session_start();
include('pdf_mc_table.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";



if($_SESSION['search']=="FULL SCHOLARSHIP"){
 $scholartype="fullscholar";
}else if($_SESSION['search']=="COLLEGE EDUCATIONAL ASSISTANCE"){
 $scholartype="collegerecipient";
}else{
  $scholartype="shscholar";
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
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,140,10,25);
    $pdf->Cell(110,10,"",0,0,'L');
    $pdf->Cell(150,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(110,10,"",0,0,'L');
    $pdf->Cell(150,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(110,10,"",0,0,'L');
     $pdf->SetFont('Times','',16);
    $pdf->Cell(150,10,"City of Sto. Tomas",0,0,'C');
    

   
    $pdf->SetFont('Times','',$header_font);

     $pdf->Cell(0,20,'',0,1);

    $stats="OPEN";
    $sql = "SELECT * FROM tbl_batch WHERE status='$stats'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sy =$row['batch'];
    
   
    if($scholartype=="fullscholar"){
       $pdf->Cell(335,$header_height,"APPLICANTS ASSESSMENT SUMMARY REPORT FOR FULL SCHOLARSHIP",0,0,'C');
   
    }else if($scholartype=="collegerecipient"){
       $pdf->Cell(335,$header_height,"APPLICANTS ASSESSMENT SUMMARY REPORT",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(335,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE",0,0,'C');
    }else{
       $pdf->Cell(335,$header_height,"APPLICANTS ASSESSMENT SUMMARY REPORT",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(335,$header_height,"SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE",0,0,'C');
    }
    $pdf->Cell(0,5,'',0,1);    
    $pdf->Cell(335,$header_height,strtoupper("S.Y. ".$sy),0,0,'C');
    $pdf->Cell(0,5,'',0,1);    
    $pdf->Cell(335,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);





 if($scholartype=="fullscholar"){
  $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(14,29,29,22,17,27,27,36,36,22,17,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
     $pdf->Row(Array(
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
  }else if($scholartype=="collegerecipient"){
    $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(14,29,29,22,17,39,27,27,36,36,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
        $pdf->Row(Array(
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
    }else{
      $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(14,29,32,22,30,39,55,53,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
      $pdf->Row(Array(
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

    $whatsearch=$_SESSION['whatsearch'];
    $remove="";
    $process="INTERVIEW";
                     
    $sqlab = "SELECT tbl_remarks.user_id
    FROM tbl_remarks 
    INNER JOIN tbl_academic 
    ON tbl_academic.id=tbl_remarks.academic_id
    WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND scholars='$scholartype' AND tbl_remarks.remove='$remove' AND process='$process'";
     $resultab = $conn->query($sqlab);

    
   
      $count=0;
       while($rowab = $resultab->fetch_assoc()){
        $count++;
          $userid=$rowab['user_id'];
          $sql = "SELECT tbl_admin.academic_year,tbl_admin.application_no,tbl_finalscore.score,tbl_admin.applicant_number 
        FROM tbl_admin
        INNER JOIN tbl_finalscore 
        ON tbl_admin.academic_year=tbl_finalscore.academic_year AND tbl_admin.application_no=tbl_finalscore.application_no  
        WHERE tbl_admin.id='$userid'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
        $academic_year=$row['academic_year'];
        $application_no=$row['application_no'];
        $totalscore=$row['score'];
          $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $result2 = $conn->query($sql2);
          $row2 = $result2->fetch_assoc();
           $pdf->SetFont('Arial','',10);

           $firstname = $row2['firstname'];
           $lastname =$row2['lastname'];
           $mids = strtoupper($row2['middlename']);
           if($mids=="N/A"){
             $middleini="";
           }else{
                $middleini =substr($row2['middlename'],0,1).'.';
           }
         
           $applicant_number =$row['applicant_number'];
           $address = $row2['barangay'];
           $course =$row2['course'];
           $year = $row2['gradelevel'];

           if(($scholartype=="collegerecipient")||($scholartype=="shscholar")){
              $course = $year." ".$course;
           }else{
              $course = $year." ".$course;
           }

           $school = $row2['school'];
           $exam = number_format($row2['exam_rating'],0);
           $gwa = $row2['gwa'];

            $sql6 = "SELECT * FROM  tbl_legend_gwa WHERE minimum<='$gwa' AND maximum>='$gwa'";
            $result6 = $conn->query($sql6);
            $row6 = $result6->fetch_assoc();

            $gwa_points = $row6['points'];

            $sql6 = "SELECT * FROM  tbl_legend_exam WHERE minimum<='$exam' AND maximum>='$exam'";
            $result6 = $conn->query($sql6);
            $row6 = $result6->fetch_assoc();

            $exam_points=$row6['points'];

          $sqlz = "SELECT * FROM tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $resultz = $conn->query($sqlz);
          $rowz = $resultz->fetch_assoc();

          $interview_score = $rowz['score'];

          $sql3 = "SELECT * FROM tbl_former WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $result3 = $conn->query($sql3);
          $row3 = $result3->fetch_assoc();
          if ($result3->num_rows > 0){
            $recipient = $row3['collegerecipient'];
            $full = $row3['fullscholar'];

            if($recipient=="NO"){
              $recipient = $row3['shscholar'];
            }
          }else{
            $recipient = "NO";
            $full = "NO";
          }
          

      
          if($scholartype=="collegerecipient"){
              $pdf->SetFont('Arial','',10);
      $pdf->SetWidths(Array(14,29,29,22,17,39,27,27,36,36,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
               $pdf->Row(Array(
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
              number_format($totalscore,2)
             ));
           }else if($scholartype=="shscholar"){
              $pdf->SetFont('Arial','',10);
      $pdf->SetWidths(Array(14,29,32,22,30,39,55,53,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
               $pdf->Row(Array(
              $count,
              strtoupper($lastname),
              strtoupper($firstname),
              strtoupper($middleini),
              $applicant_number,
              $address,
              $school,
              $course,
              $interview_score,
              number_format($totalscore,2)
             ));
           }else{
              $pdf->SetFont('Arial','',10);
       $pdf->SetWidths(Array(14,29,29,22,17,27,27,36,36,22,17,17,17));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
                $pdf->Row(Array(
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
                number_format($exam,0),
                $exam_points,
                number_format($totalscore,2)
               ));
           }
          
        
       }

  $numspacing = $_GET['spacing'];
  // $pdf->Cell(335,10,"",1,0,'L');
  $pdf->Cell(0,$numspacing,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
  $pdf->Cell(100,10,"Prepared by:",0 ,0,'L');
  $pdf->Cell(100,10,"Recommending Approval:",0 ,0,'L');
   $pdf->Cell(100,10,"Approved by:",0 ,0,'L');
  $pdf->Cell(0,20,'',0,1);
  $pdf->Cell(20,20,"",0,0,'L');

  $pdf->Cell(100.5,10,"MS. CATHERINE V. MENDOZA",0,0,'L');
  $pdf->Cell(100,10,"MR. SALVADOR M. GELING",0 ,0,'L');
  $pdf->Cell(100,10,"HON. EDNA P. SANCHEZ",0 ,0,'L');
  $pdf->Cell(0,5,'',0,1);
  $pdf->Cell(20,10,"",0,0,'L');
  $pdf->Cell(100,10,"Youth Development Officer II - OIC",0 ,0,'L');
  $pdf->Cell(100,10,"City Administrator - OIC",0 ,0,'L');
  $pdf->Cell(100,10,"City Mayor",0 ,0,'L');


  

$pdf->Output();

?>