<?php session_start();
include('pdf_mc_table5.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";


$spacing = $_GET['spacing'];

 




$header_font=12;
$content_font=9;
$header_height=11;
$content_height=7;
$w=35;
$h=16;

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
    

   date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');
$hour=date('G');
$min=date('i');
$sec=date('s');

$dates=$year."-".$month."-".$day;

     // $pdf->SetFont('Arial','',9);
     //                      $pdf->SetWidths(Array(10,40,30,30,30,30,30));
     //                      $pdf->SetLineHeight(5);
     //                      $pdf->SetAligns(Array('C','C','C','C','C','C','C'));
     //                             $pdf->Row(Array(
     //                        'NO.',
     //                        'NAME OF SCHOLARS',
     //                        'BARANGAY',
     //                        'SCHOOLS',
     //                        'BATCH',
     //                        'YEAR & COURSE',
     //                        'GENERAL WEIGHTED AVERAGE'
                            
     //                       ));

    $pdf->Cell(0,17,'',0,1);
     $filter =$_SESSION['search'];
     $stats="TRANSFER CURRENT";
     if($filter=="ALL"){
                      if($_SESSION['whatsearch']=="ALL"){
                        $pdf->Cell(190,$header_height,"TRANSFER REPORTS",0,0,'C');
                        $pdf->Cell(190,7,'',0,1);
                        $pdf->Cell(190,$header_height,"AS OF ".$dates,0,0,'C');
                        $pdf->Cell(190,10,'',0,1);

                         $sql = "SELECT tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.scholars,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$stats'
                                       ORDER BY tbl_admin.id";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'EMAIL',
                                    'SCHOOL YEAR',
                                    'FROM GRANT'
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
                                    $academic_id=$row['academic_id'];
                                    $sqlz="SELECT * from tbl_renew_year WHERE id='$academic_id'";
                                    $resultz = $conn->query($sqlz);
                                    $rowz = $resultz->fetch_assoc();
                                    $sems = $rowz['semester'];
                                    $scholars=$row['scholars'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $email = $row['username'];

                                    if($scholars=="fullscholar"){
                                      $grant ="FULL SCHOLARSHIP";
                                    }else if($scholars=="collegerecipient"){
                                      $grant ="COLLEGE RECIPIENT";
                                    }

                                    // $barangay=strtoupper($row['barangay']);
                                    // $school=strtoupper($row['school']);
                                    // $typescholar=$row['typescholar'];
                                    // $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                     $pdf->SetFont('Arial','',9);
                                   $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $email,
                                        $sems,
                                        $grant
                                       ));
                              }
                          
                                   
                                
                  }else{
                    $sem = $_SESSION['whatsearch'];

                     $sqlx="SELECT * from tbl_renew_year WHERE semester='$sem'";
                                $resultx = $conn->query($sqlx);
                                $rowx = $resultx->fetch_assoc();
                                $acad = $rowx['id'];
                                  $pdf->Cell(190,$header_height,"TRANSFER REPORTS",0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,$sem,0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,"AS OF ".$dates,0,0,'C');
                                $pdf->Cell(190,10,'',0,1);
                                
                                  $sql = "SELECT tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.scholars,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$stats' AND tbl_remarks.academic_id='$acad'
                                       ORDER BY tbl_admin.id";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'EMAIL',
                                    'SCHOOL YEAR',
                                    'FROM GRANT'
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
                                    $academic_id=$row['academic_id'];
                                    $sqlz="SELECT * from tbl_renew_year WHERE id='$academic_id'";
                                    $resultz = $conn->query($sqlz);
                                    $rowz = $resultz->fetch_assoc();
                                    $sems = $rowz['semester'];
                                    $scholars=$row['scholars'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $email = $row['username'];

                                    if($scholars=="fullscholar"){
                                      $grant ="FULL SCHOLARSHIP";
                                    }else if($scholars=="collegerecipient"){
                                      $grant ="COLLEGE RECIPIENT";
                                    }

                                    // $barangay=strtoupper($row['barangay']);
                                    // $school=strtoupper($row['school']);
                                    // $typescholar=$row['typescholar'];
                                    // $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                     $pdf->SetFont('Arial','',9);
                                   $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $email,
                                        $sems,
                                        $grant
                                       ));
                              }
                                
                  }
                
              }else{
                if($filter=="FULL SCHOLARSHIP"){
                  $scholarship="fullscholar";
                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                  $scholarship="collegerecipient";
                }
               
                
                  if($_SESSION['whatsearch']=="ALL"){

                               

                     $pdf->Cell(190,$header_height,"TRANSFER REPORTS",0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->Cell(190,$header_height,"STO. TOMAS SCHOLARS",0,0,'C');
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->Cell(190,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }
                                $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,"AS OF ".$dates,0,0,'C');
                                $pdf->Cell(190,10,'',0,1);
                              
                                   $sql = "SELECT tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.scholars,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$stats' AND tbl_remarks.scholars='$scholarship'
                                       ORDER BY tbl_admin.id";

                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'EMAIL',
                                    'SCHOOL YEAR',
                                    'FROM GRANT'
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
                                    $academic_id=$row['academic_id'];
                                    $sqlz="SELECT * from tbl_renew_year WHERE id='$academic_id'";
                                    $resultz = $conn->query($sqlz);
                                    $rowz = $resultz->fetch_assoc();
                                    $sems = $rowz['semester'];
                                    $scholars=$row['scholars'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $email = $row['username'];

                                    if($scholars=="fullscholar"){
                                      $grant ="FULL SCHOLARSHIP";
                                    }else if($scholars=="collegerecipient"){
                                      $grant ="COLLEGE RECIPIENT";
                                    }

                                    // $barangay=strtoupper($row['barangay']);
                                    // $school=strtoupper($row['school']);
                                    // $typescholar=$row['typescholar'];
                                    // $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                     $pdf->SetFont('Arial','',9);
                                   $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $email,
                                        $sems,
                                        $grant
                                       ));
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

                                 $pdf->Cell(190,$header_height,"TRANSFER REPORTS",0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                if($filter=="FULL SCHOLARSHIP"){
                                  $pdf->Cell(190,$header_height,"STO. TOMAS SCHOLARS",0,0,'C');
                                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                                  $pdf->Cell(190,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }
                                 $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,$sem,0,0,'C');
                                $pdf->Cell(190,7,'',0,1);
                                $pdf->Cell(190,$header_height,"AS OF ".$dates,0,0,'C');
                                $pdf->Cell(190,10,'',0,1);

                                  $sql = "SELECT tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.scholars,tbl_remarks.academic_id
                                      FROM tbl_admin 
                                      INNER JOIN tbl_studentinfo 
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      JOIN tbl_remarks
                                      ON tbl_admin.id=tbl_remarks.user_id
                                      WHERE tbl_remarks.process='$stats' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.academic_id='$acad'
                                       ORDER BY tbl_admin.id";
                          
                                  $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'EMAIL',
                                    'SCHOOL YEAR',
                                    'FROM GRANT'
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
                                    $academic_id=$row['academic_id'];
                                    $sqlz="SELECT * from tbl_renew_year WHERE id='$academic_id'";
                                    $resultz = $conn->query($sqlz);
                                    $rowz = $resultz->fetch_assoc();
                                    $sems = $rowz['semester'];
                                    $scholars=$row['scholars'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $email = $row['username'];

                                    if($scholars=="fullscholar"){
                                      $grant ="FULL SCHOLARSHIP";
                                    }else if($scholars=="collegerecipient"){
                                      $grant ="COLLEGE RECIPIENT";
                                    }

                                    // $barangay=strtoupper($row['barangay']);
                                    // $school=strtoupper($row['school']);
                                    // $typescholar=$row['typescholar'];
                                    // $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);

                                     $pdf->SetFont('Arial','',9);
                                   $pdf->SetWidths(Array(10,60,50,40,40));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $email,
                                        $sems,
                                        $grant
                                       ));
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