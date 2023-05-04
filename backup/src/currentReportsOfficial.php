<?php session_start();
include('pdf_mc_table5.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";

$filterss = $_GET['filter'];
$spacing = $_GET['spacing'];

 




$header_font=12;
$content_font=9;
$header_height=11;
$content_height=7;
$w=35;
$h=16;

date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');
$hour=date('G');
$min=date('i');
$sec=date('s');

$dates=$year."-".$month."-".$day;
$monthNum  = $month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March
$dates=$monthName." ".$day.", ".$year;

 $pdf->SetTitle($title);
      $pdf->AddPage('P','Legal');
    $profile="img/citylogo.png";
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,52,10,25);
 
    $pdf->Cell(190,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,5,'',0,1);

    $pdf->Cell(190,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,5,'',0,1);

    $pdf->Cell(190,10,"City of Sto. Tomas",0,0,'C');
    

   
    $pdf->SetFont('Times','',$header_font);

     // $pdf->SetFont('Arial','',9);
     //                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
     //                      $pdf->SetLineHeight(5);
     //                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
     //                             $pdf->Row(Array(
     //                        'NO.',
     //                        'NAME OF SCHOLARS',
     //                        'BARANGAY',
     //                        'SCHOOL',
     //                        'BATCH',
     //                        'YEAR & COURSE',
     //                        'GWA'
                            
     //                       ));

    $pdf->Cell(0,17,'',0,1);
     $filter =$_SESSION['search'];
     $stats="ASSESSMENT RESULT";
     $process="RENEW OK";
     if($filter=="ALL"){
                      if($_SESSION['whatsearch']=="ALL"){
                        $pdf->Cell(190,$header_height,"ASSESSMENT RESULT",0,0,'C');
                        $pdf->Cell(190,7,'',0,1);
                        $pdf->Cell(190,$header_height,"as of ".$dates,0,0,'C');
                        $pdf->Cell(190,10,'',0,1);
                          if($filterss=="LastName"){
                             $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process'
                                      ORDER BY tbl_studentinfo.lastname";

                              // $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_renewal.academic_id
                              // FROM tbl_admin 
                              // INNER JOIN tbl_studentinfo 
                              // ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                              // JOIN tbl_renewal
                              // ON tbl_admin.academic_year=tbl_renewal.academic_year AND tbl_admin.application_no=tbl_renewal.application_no
                              // WHERE tbl_renewal.status='$stats'
                              //   ORDER BY tbl_studentinfo.lastname";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="Barangay"){
                               $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process'
                                      ORDER BY tbl_studentinfo.barangay";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                      $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="School"){
                               $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process'
                                      ORDER BY tbl_studentinfo.school";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                      $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="Grade"){
                              $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_grade_submit.grades
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                       JOIN tbl_grade_submit
                                      ON tbl_admin.academic_year=tbl_grade_submit.academic_year AND tbl_admin.application_no=tbl_grade_submit.application_no
                                      WHERE tbl_remarks.process='$process'
                                      ORDER BY tbl_grade_submit.grades DESC";



                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    //   $academic_year = $row['academic_year'];
                                    // $application_no=$row['application_no'];
                                    // $academic_id=$row['academic_id'];

                                    // $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                    //  $result2 = $conn->query($sql2);
                                    //  $row2 = $result2->fetch_assoc();
                                     $grades=$row['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="Batch"){
                            $types="fullscholar";
                                $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_grade_submit.grades,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                       JOIN tbl_grade_submit
                                      ON tbl_admin.academic_year=tbl_grade_submit.academic_year AND tbl_admin.application_no=tbl_grade_submit.application_no
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$types'
                                      ORDER BY tbl_admin.batch";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    //   $academic_year = $row['academic_year'];
                                    // $application_no=$row['application_no'];
                                    // $academic_id=$row['academic_id'];

                                    // $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                    //  $result2 = $conn->query($sql2);
                                    //  $row2 = $result2->fetch_assoc();
                                     $grades=$row['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $batch=strtoupper($row['batch']);
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }
                                   
                                
                  }else{
                    $sem = $_SESSION['whatsearch'];

                     $sqlz="SELECT * from tbl_renew_year WHERE semester='$sem'";
                                $resultz = $conn->query($sqlz);
                                $rowz = $resultz->fetch_assoc();
                                $acad = $rowz['id'];

                                $pdf->Cell(190,$header_height,"ASSESSMENT RESULT",0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,$sem,0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,"as of ".$dates,0,0,'C');
                                $pdf->Cell(190,10,'',0,1);
                           
                                     if($filterss=="LastName"){
                             $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_studentinfo.lastname";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="Barangay"){
                                $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_studentinfo.barangay";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                      $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="School"){
                               $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_studentinfo.school";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                      $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="Grade"){
                            // Here
                                $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_grade_submit.grades
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                       JOIN tbl_grade_submit
                                      ON tbl_admin.academic_year=tbl_grade_submit.academic_year AND tbl_admin.application_no=tbl_grade_submit.application_no
                                      WHERE tbl_remarks.process='$process' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_grade_submit.grades DESC";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRANT',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    //   $academic_year = $row['academic_year'];
                                    // $application_no=$row['application_no'];
                                    // $academic_id=$row['academic_id'];

                                    // $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                    //  $result2 = $conn->query($sql2);
                                    //  $row2 = $result2->fetch_assoc();
                                     $grades=$row['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $typeschool,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }else if($filterss=="Batch"){
                            $types="fullscholar";
                                $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_grade_submit.grades,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                       JOIN tbl_grade_submit
                                      ON tbl_admin.academic_year=tbl_grade_submit.academic_year AND tbl_admin.application_no=tbl_grade_submit.application_no
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$types' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_admin.batch";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'GRADE & TRACK/YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    //   $academic_year = $row['academic_year'];
                                    // $application_no=$row['application_no'];
                                    // $academic_id=$row['academic_id'];

                                    // $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                    //  $result2 = $conn->query($sql2);
                                    //  $row2 = $result2->fetch_assoc();
                                     $grades=$row['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $batch=strtoupper($row['batch']);
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }
                                
                  }
                
              }else{
                if($filter=="FULL SCHOLARSHIP"){
                  $scholarship="fullscholar";
                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                  $scholarship="collegerecipient";
                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                  $scholarship="shscholar";
                }
               
                
                  if($_SESSION['whatsearch']=="ALL"){

                                $pdf->Cell(190,$header_height,"ASSESSMENT RESULT",0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->Cell(190,$header_height,"STO. TOMAS SCHOLARS",0,0,'C');
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->Cell(190,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                  $pdf->Cell(190,$header_height,"SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }
                                $pdf->Cell(190,7,'',0,1);
                        $pdf->Cell(190,$header_height,"as of ".$dates,0,0,'C');
                       
                                $pdf->Cell(190,10,'',0,1);

                      if($filterss=="LastName"){
                              $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$scholarship'
                                      ORDER BY tbl_studentinfo.lastname";

                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }



                                     
                              }
                          }else if($filterss=="Barangay"){
                             $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$scholarship'
                                      ORDER BY tbl_studentinfo.barangay";

                                  if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }
                                  }
                          }else if($filterss=="School"){
                               $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$scholarship'
                                      ORDER BY tbl_studentinfo.school";

                                  if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }
                                  }
                          }else if($filterss=="Grade"){
                            //Test Here
                                $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_grade_submit.academic_id,tbl_grade_submit.grades,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      -- JOIN tbl_remarks
                                      -- ON tbl_admin.id=tbl_remarks.user_id
                                      JOIN tbl_grade_submit
                                      ON tbl_admin.academic_year=tbl_grade_submit.academic_year AND tbl_admin.application_no=tbl_grade_submit.application_no
                                      WHERE tbl_admin.typescholar='$scholarship'
                                      ORDER BY tbl_grade_submit.grades DESC";

                                  if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                $id = $row['id'];
                                $ac = $row['academic_id'];
                                $sqlx ="SELECT * FROM tbl_remarks WHERE user_id='$id' AND academic_id='$ac' AND process='$process'";
                                $resultx = $conn->query($sqlx);
                                if ($resultx->num_rows > 0){
                                     $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                 
                                     $grades=$row['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }
                                }

                                   
                              }
                          }else if($filterss=="Batch"){
                            $types="fullscholar";
                               $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$types'
                                      ORDER BY tbl_admin.batch";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                      $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];
                                     

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $batch=strtoupper($row['batch']);
                                   $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }



                             
                                 
                                
                  }else{
                     if($filter=="FULL SCHOLARSHIP"){
                        $scholarship="fullscholar";
                      }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                        $scholarship="collegerecipient";
                      }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                        $scholarship="shscholar";
                      }
                    $sem = $_SESSION['whatsearch'];
                      $sqlz="SELECT * from tbl_renew_year WHERE semester='$sem'";
                                $resultz = $conn->query($sqlz);
                                $rowz = $resultz->fetch_assoc();
                                $acad = $rowz['id'];

                                $pdf->Cell(190,$header_height,"ASSESSMENT RESULT",0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->Cell(190,$header_height,"STO. TOMAS SCHOLARS",0,0,'C');
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->Cell(190,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                  $pdf->Cell(190,$header_height,"SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }
                                 $pdf->Cell(190,7,'',0,1);
                                 $pdf->Cell(190,$header_height,$sem,0,0,'C');
                               $pdf->Cell(190,7,'',0,1);
                        $pdf->Cell(190,$header_height,"as of ".$dates,0,0,'C');
                        $pdf->Cell(190,10,'',0,1);


                            if($filterss=="LastName"){

                              $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$scholarship' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_studentinfo.lastname";

                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }



                                     
                              }
                          }else if($filterss=="Barangay"){

                                $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$scholarship' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_studentinfo.barangay";

                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }



                                     
                              }
                          }else if($filterss=="School"){

                                 $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$scholarship' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_studentinfo.school";

                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }



                                     
                              }
                          }else if($filterss=="Grade"){
                              $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_grade_submit.academic_id,tbl_grade_submit.grades,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      -- JOIN tbl_remarks
                                      -- ON tbl_admin.id=tbl_remarks.user_id
                                      JOIN tbl_grade_submit
                                      ON tbl_admin.academic_year=tbl_grade_submit.academic_year AND tbl_admin.application_no=tbl_grade_submit.application_no
                                      WHERE tbl_admin.typescholar='$scholarship' AND tbl_grade_submit.academic_id='$acad'
                                      ORDER BY tbl_grade_submit.grades DESC";

                                  if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                                   $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,50,40,30,40,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'GRADE & TRACK',
                                    'GWA'
                                    
                                   ));
                                }


                                  
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                $id = $row['id'];
                                $ac = $row['academic_id'];
                                $sqlx ="SELECT * FROM tbl_remarks WHERE user_id='$id' AND academic_id='$ac' AND process='$process'";
                                $resultx = $conn->query($sqlx);
                                if ($resultx->num_rows > 0){
                                     $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                    $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                 
                                     $grades=$row['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $typescholar=$row['typescholar'];
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $batch = $row['batch'];

                                    if($scholarship=="fullscholar"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="collegerecipient"){
                                      $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }else if($scholarship=="shscholar"){
                                      $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,50,40,30,40,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                                    }
                                }

                                   
                              }
                          }else if($filterss=="Batch"){
                            $types="fullscholar";
                               $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school,tbl_remarks.academic_id,tbl_admin.batch
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$process' AND tbl_admin.typescholar='$types' AND tbl_remarks.academic_id='$acad'
                                      ORDER BY tbl_admin.batch";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'BARANGAY',
                                    'SCHOOL',
                                    'BATCH',
                                    'YEAR & COURSE',
                                    'GWA'
                                    
                                   ));
                               $result = $conn->query($sql);
                                 $count=0;
                              while($row = $result->fetch_assoc()){
                                    $count=$count+1;
                                    $middlename =strtoupper($row['middlename']);
                                    if((strlen($middlename)<=0)||($middlename=="N/A")){
                                      $mid = "";
                                    }else{
                                      $mid = substr($middlename, 0,1).".";
                                    }

                                  
                                     $academic_year = $row['academic_year'];
                                    $application_no=$row['application_no'];
                                    $academic_id=$row['academic_id'];

                                    $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $batch=strtoupper($row['batch']);
                                    $gradelevel = strtoupper($row['gradelevel']." year ".$row['course']);

                                    if($typescholar=="fullscholar"){
                                      $typeschool="FULL SCHOLARS";
                                    }else if($typescholar=="collegerecipient"){
                                      $typeschool="COLLEGE RECIPIENT";
                                    }else if($typescholar=="shscholar"){
                                      $typeschool="SHS RECIPIENT";
                                    }
                                     $pdf->SetFont('Arial','',9);
                                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
                                      $pdf->SetLineHeight(5);
                                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $batch,
                                        $gradelevel,
                                        $grades
                                        
                                       ));
                              }
                          }
                                    
                                
                  }
              }
                // $result = $conn->query($sql);
                // $result1 = $conn->query($sql1);
                // $row1 = $result1->fetch_assoc();
                // $total=$row1['total'];


    // $stats="OPEN";
    // $sql = "SELECT * FROM tbl_assesment WHERE status='$stats'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $sy =$row['academic_year'].' '.$row['semester'].' semester';
    
    // $pdf->Cell(335,$header_height,"ASSESSMENT / GRADE EVALUATION",0,0,'C');
    // $pdf->Cell(0,5,'',0,1);
    // if($_SESSION['studenttype']=="fullscholar"){
    //     $pdf->Cell(335,$header_height,"STO. TOMAS COLLEGE FULL SCHOLARSHIP",0,0,'C');
    // }else if($_SESSION['studenttype']=="collegerecipient"){
    //     $pdf->Cell(335,$header_height,"STO. TOMAS COLLEGE FINANCIAL ASSISTANCE",0,0,'C');
    // }else{
    //     $pdf->Cell(335,$header_height,"STO. TOMAS SENIOR HIGH SCHOOL FINANCIAL ASSISTANCE",0,0,'C');
    // }

    //   $status1="OPEN";
    // $status2="CURRENT";
    // $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
    //   $resulta = $conn->query($sqla);   
    //  $rowa = $resulta->fetch_assoc();
    //  $academic_id=$rowa['id'];
    //   if(($_SESSION['studenttype']=="fullscholar")||($_SESSION['studenttype']=="collegerecipient")){
    //      $sy =$rowa['academic_year'].' '.$rowa['sem'].' semester';
    //   }else{
    //      $sy =$rowa['academic_year'];
    //   }
   

    // $pdf->Cell(0,5,'',0,1);    
    //  $pdf->Cell(335,$header_height,strtoupper("S.Y. ".$sy),0,0,'C');
    // $pdf->Cell(0,10,'',0,1);  






  
    

    

     

     
        
  $pdf->SetFont('Times','',13);
 
  // $pdf->Cell(335,10,"",1,0,'L');
  $pdf->Cell(0,$spacing,'',0,1);
  $pdf->Cell(190,10,"Prepared by:",0 ,0,'L');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(190,10,"MS. CATHERINE V. MENDOZA, MMT",0,0,'L');
  $pdf->Cell(0,7,'',0,1);
  $pdf->Cell(190,10,"Youth Development Officer II-ICO",0 ,0,'L');

  $pdf->Cell(0,15,'',0,1);
  $pdf->Cell(190,10,"Recommending Approval:",0 ,0,'L');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(190,10,"MR. SALVADOR M. GELING",0,0,'L');
  $pdf->Cell(0,7,'',0,1);
  $pdf->Cell(190,10,"City Administrator-ICO",0 ,0,'L');


  $pdf->Cell(0,15,'',0,1);
  $pdf->Cell(190,10,"Approved by:",0 ,0,'L');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(190,10,"HON. EDNA P. SANCHEZ",0,0,'L');
  $pdf->Cell(0,7,'',0,1);
  $pdf->Cell(190,10,"City Mayor",0 ,0,'L');
  




$pdf->Output();

?>