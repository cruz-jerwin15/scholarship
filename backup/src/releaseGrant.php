<?php session_start();
include('pdf_mc_table5.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";

$filterss = $_GET['filter'];
$spacing = $_GET['spacing'];
$grants = $_GET['grant'];
$grant = number_format($_GET['grant'],2);


$category=$_SESSION['category'];
$cat="";

if($category=="Public"){
  $cat="Public / State Universities";

}else{
  $cat="Private / Institute";
}






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
     $stats="OK";
     $process="RENEW OK";

     $filter=$_SESSION['studenttype'];

                                $st1="OPEN";
                                $st2="CURRENT";
                                $sqlz="SELECT * from tbl_renew_year WHERE status='$st1' OR status='$st2'";
                                $resultz = $conn->query($sqlz);
                                $rowz = $resultz->fetch_assoc();
                                $acad = $rowz['id'];
                                $semester=$rowz['semester'];

                                $pdf->Cell(335,$header_height,"RELEASE GRANT",0,0,'C');
                                $pdf->Cell(335,7,'',0,1);
                                if($filter=="fullscholar"){
                                  $pdf->Cell(335,$header_height,"STO. TOMAS SCHOLARS",0,0,'C');
                                }else if($filter=="collegerecipient"){
                                  $pdf->Cell(335,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }else if($filter=="shscholar"){
                                  $pdf->Cell(335,$header_height,"SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE RECIPIENTS",0,0,'C');
                                }
                                 $pdf->Cell(335,7,'',0,1);
                                 $pdf->Cell(335,$header_height,$semester,0,0,'C');
                                  $pdf->Cell(335,7,'',0,1);
                                 $pdf->Cell(335,$header_height,strtoupper($cat),0,0,'C');

                        $pdf->Cell(335,10,'',0,1);

                        if($filterss=="LastName"){
                          if($filter=="collegerecipient"){
                            $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                        FROM tbl_admin
                                        INNER JOIN tbl_studentinfo
                                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                        WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.schooltype='$cat'
                                        ORDER BY tbl_studentinfo.lastname";
                          }else{
                            $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                        FROM tbl_admin
                                        INNER JOIN tbl_studentinfo
                                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                        WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats'
                                        ORDER BY tbl_studentinfo.lastname";
                          }

                      }else if($filterss=="Barangay"){
                        if($filter=="collegerecipient"){
                          $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                        FROM tbl_admin
                                        INNER JOIN tbl_studentinfo
                                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                        WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.schooltype='$cat'
                                        ORDER BY tbl_studentinfo.barangay";
                        }else{
                          $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                        FROM tbl_admin
                                        INNER JOIN tbl_studentinfo
                                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                        WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats'
                                        ORDER BY tbl_studentinfo.barangay";
                        }

                      }else if($filterss=="PRIVATE SCHOOL"){
                        $typeschool="Private / Institute";
                        $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                      FROM tbl_admin
                                      INNER JOIN tbl_studentinfo
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.schooltype='$typeschool'
                                      ORDER BY tbl_studentinfo.lastname";
                      }else if($filterss=="PUBLIC SCHOOL"){
                        $typeschool="Public / State Universities";
                        $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                      FROM tbl_admin
                                      INNER JOIN tbl_studentinfo
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.schooltype='$typeschool'
                                      ORDER BY tbl_studentinfo.lastname";
                      }else if($filterss=="School"){
                        if($filter=="collegerecipient"){
                          $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                        FROM tbl_admin
                                        INNER JOIN tbl_studentinfo
                                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                        WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.schooltype='$cat'
                                        ORDER BY tbl_studentinfo.school";
                        }else{
                          $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                        FROM tbl_admin
                                        INNER JOIN tbl_studentinfo
                                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                        WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats'
                                        ORDER BY tbl_studentinfo.school";
                        }

                      }else if($filterss=="GRADE 11"){
                        $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                      FROM tbl_admin
                                      INNER JOIN tbl_studentinfo
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.gradelevel LIKE '%$filterss%'
                                      ORDER BY tbl_studentinfo.school";
                      }else if($filterss=="GRADE 12"){
                        $sql = "SELECT tbl_admin.username,tbl_admin.academic_year,tbl_admin.application_no,tbl_studentinfo.firstname,tbl_studentinfo.middlename,tbl_studentinfo.lastname,tbl_studentinfo.barangay,tbl_studentinfo.course,tbl_studentinfo.gradelevel,tbl_admin.typescholar,tbl_studentinfo.school
                                      FROM tbl_admin
                                      INNER JOIN tbl_studentinfo
                                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                                      WHERE tbl_admin.typescholar='$filter' AND tbl_admin.status='$stats' AND tbl_studentinfo.gradelevel LIKE '%$filterss%'
                                      ORDER BY tbl_studentinfo.school";
                      }


                                      $pdf->SetFont('Arial','',9);
                                  $pdf->SetWidths(Array(15,50,60,50,50,20,30,15,50));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C'));
                                         $pdf->Row(Array(
                                    'NO.',
                                    'NAME',
                                    'ADDRESS',
                                    'SCHOOL',
                                    'YEAR & COURSE',
                                    'GRADE (GWA)',
                                    'AMOUNT',
                                    'NO.',
                                    'SIGNATURE'
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

                                    $stat1="OPEN";
                                    $stat2="CURRENT";
                                    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$stat1' OR status='$stat2'";
                                    $resulta = $conn->query($sqla);
                                    $rowa = $resulta->fetch_assoc();

                                    $academic_id=$rowa['id'];

                                     $sql2 = "SELECT * FROM tbl_grade_submit WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$acad'";
                                     $result2 = $conn->query($sql2);
                                     $row2 = $result2->fetch_assoc();
                                     $grades=$row2['grades'];

                                    $fullname = strtoupper($row['lastname'].', '.$row['firstname']." ".$mid);
                                    $barangay=strtoupper($row['barangay']);
                                    $school=strtoupper($row['school']);
                                    $gradelevel = strtoupper($row['gradelevel']." ".$row['course']);
                                    $blank="";
                                     $pdf->SetFont('Arial','',9);
                                       $pdf->SetWidths(Array(15,50,60,50,50,20,30,15,50));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C'));
                                             $pdf->Row(Array(
                                        $count,
                                        $fullname,
                                        $barangay,
                                        $school,
                                        $gradelevel,
                                        $grades,
                                        $grant,
                                        $count,
                                        $blank

                                       ));


                                  }
                                  $totals = $grants*$count;
                                  $grandtotal="Php.". number_format($totals);
                                   $pdf->SetFont('Arial','',12 );
                                       $pdf->SetWidths(Array(245,95));
                                  $pdf->SetLineHeight(5);
                                  $pdf->SetAligns(Array('L','L'));
                                             $pdf->Row(Array(
                                        "GRANT TOTAL:",
                                        $grandtotal


                                       ));
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
  $pdf->Cell(90,10,"Prepared by:",0 ,0,'C');
  $pdf->Cell(155,10,"Recommending Approval:",0 ,0,'C');
  $pdf->Cell(90,10,"Approved by:",0 ,0,'C');
  $pdf->Cell(0,13,'',0,1);
  $pdf->Cell(90,10,"MS. CATHERINE V. MENDOZA, MMT",0,0,'C');
  $pdf->Cell(155,10,"MR. SEVERINO M. MEDALLA",0,0,'C');
  $pdf->Cell(90,10,"ATTY. ARTH JHUN AGUILAR MARASIGAN",0,0,'C');
  $pdf->Cell(0,7,'',0,1);
  $pdf->Cell(90,10,"Youth Development Officer (CYDSD)",0 ,0,'C');
  $pdf->Cell(155,10,"City Administrator",0 ,0,'C');
  $pdf->Cell(90,10,"Public Servant/City Mayor",0 ,0,'C');


  $pdf->SetFont('Times','',10);
   $pdf->Cell(335,10,'',0,1);
   $newdate=$monthName." ".$day.", ".$year;
  $pdf->Cell(335,$header_height,"AS OF ".$newdate,0,0,'R');






$pdf->Output();

?>
