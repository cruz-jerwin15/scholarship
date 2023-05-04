<?php session_start();
include('pdf_mc_table.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";





 $filter =$_SESSION['search'];
  $whatsearch=$_SESSION['whatsearch'];
  $order=$_SESSION['order'];
  $limit=$_SESSION['limit'];
  $off=$_SESSION['offset']-1;


$header_font=12;
$content_font=9;
$header_height=11;
$content_height=7;
$w=35;
$h=16;
$scholar="";
if($filter=="FULL SCHOLARSHIP"){
  $scholar="fullscholar";
}else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
  $scholar="collegerecipient";
}else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
  $scholar="shscholar";
}else{
  $scholar="ALL";
}

 $pdf->SetTitle($title);
      $pdf->AddPage('L',array(210.59,330.02));
    $profile="img/citylogo.png";
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,130,10,25);
    $pdf->Cell(100,10,"",0,0,'L');
    $pdf->Cell(150,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(100,10,"",0,0,'L');
    $pdf->Cell(150,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(100,10,"",0,0,'L');
    $pdf->Cell(150,10,"City of Sto. Tomas",0,0,'C');

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
    
  // $pdf->Cell(0,5,'',0,1);
  // $pdf->Cell(270,10,"",0,0,'L');
  // $pdf->Cell(100,10,"As of ".$months." ".$day.", ".$year,0 ,0,'L');
   
    $pdf->SetFont('Times','',$header_font);

     $pdf->Cell(0,17,'',0,1);

   
   
    if($scholar=="fullscholar"){
       $pdf->Cell(325,$header_height,"OFFICIAL RESULT FOR ".$whatsearch." COLLEGE APPLICANTS FOR FULL SCHOLARSHIP",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"(NEW BATCH OF STO. TOMAS SCHOLARS)",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"STO. TOMAS SCHOLARSHIP PROGRAM",0,0,'C');
          $pdf->Cell(0,5,'',0,1);    
    $pdf->Cell(325,$header_height,strtoupper("S.Y. ".$whatsearch),0,0,'C');
    $pdf->Cell(0,10,'',0,1);    
    $pdf->Cell(325,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);
    }else if($scholar=="collegerecipient"){
       $pdf->Cell(325,$header_height,"OFFICIAL RESULT FOR ".$whatsearch." COLLEGE APPLICANTS FOR EDUCATIONAL ASSISTANCE",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"(NEW BATCH OF COLLEGE EDUCATIONAL ASSISTANCE RECIPIENTS)",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"STO. TOMAS SCHOLARSHIP PROGRAM",0,0,'C');
          $pdf->Cell(0,5,'',0,1);    
    $pdf->Cell(325,$header_height,strtoupper("S.Y. ".$sy),0,0,'C');
    $pdf->Cell(0,10,'',0,1);    
    $pdf->Cell(325,$header_height,"As of ".$months." ".$whatsearch.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);
    }else if($scholar=="shscholar"){
       $pdf->Cell(325,$header_height,"OFFICIAL RESULT FOR ".$whatsearch." SHS APPLICANTS FOR EDUCATIONAL ASSISTANCE",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"(NEW BATCH OF SHS EDUCATIONAL ASSISTANCE RECIPIENTS)",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"STO. TOMAS SCHOLARSHIP PROGRAM",0,0,'C');
          $pdf->Cell(0,5,'',0,1);    
    $pdf->Cell(325,$header_height,strtoupper("S.Y. ".$whatsearch),0,0,'C');
    $pdf->Cell(0,10,'',0,1);    
    $pdf->Cell(325,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);
    }else{
        $pdf->Cell(325,$header_height,"OFFICIAL RESULT FOR COLLEGE FULL SCHOLARSHIP, COLLEGE EDUCATIONAL ASSISTANCE AND SHS EDUCATIONAL ASSISTANCE",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(325,$header_height,"STO. TOMAS SCHOLARSHIP PROGRAM",0,0,'C');
          $pdf->Cell(0,5,'',0,1);    
     
    $pdf->Cell(325,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);
    }
    



$pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(20,75,60,97,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C','C','C'));
 if($_SESSION['studenttype']=="fullscholar"){
       $pdf->Row(Array(
  'NO.',
  'NAME OF STUDENT',
  'BARANGAY',
  'YEAR & COURSE',
  'SCHOOL'
 ));
  }else if($_SESSION['studenttype']=="collegerecipient"){
       $pdf->Row(Array(
         'NO.',
 'NAME OF STUDENT',
  'BARANGAY',
  'YEAR & COURSE',
  'SCHOOL'
 ));
    }else{
      $pdf->Row(Array(
         'NO.',
  'NAME OF STUDENT',
  'BARANGAY',
  'GRADE & STRAND',
  'SCHOOL'
 ));
    }
    

                $status="OK";
                $remove="YES";

              if($filter=="ALL"){
                    $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];
                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' ORDER BY tbl_admin.id ASC  ";

                       
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' ORDER BY tbl_admin.id ASC  ";;

                        
                  }
              }else if($filter=="FULL SCHOLARSHIP"){
                $scholarship="fullscholar";
                $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];
               

                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id ASC  ";

                       
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id DESC  ";
                  }
              }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                $scholarship="collegerecipient";
               
                $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];
               

                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id ASC  ";

                       
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id DESC  ";
                  }
              }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                $scholarship="shscholar";
                $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];
               

                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id ASC  ";

                       
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay,tbl_studentinfo.gradelevel
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id DESC  ";
                  }
              }
                $result = $conn->query($sql);
             
           

   
     
      $count=0;
       while($row = $result->fetch_assoc()){
        $count++;
        $academic_year=$row['academic_year'];
        $application_no=$row['application_no'];
          // $sql2 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
          // $result2 = $conn->query($sql2);
          // $row2 = $result2->fetch_assoc();
           $pdf->SetFont('Arial','',10);

            $mids = strtoupper($row['middlename']);
           if($mids=="N/A"){
             $middleini="";
              $fullname = $row['lastname'].', '.$row['firstname'].' '.$middleini;
           }else{
                $middleini =substr($row['middlename'],0,1).'.';
                 $fullname = $row['lastname'].', '.$row['firstname'].' '.$middleini;
           }

          
           $address = $row['barangay'];
           $yearcourse = $row['gradelevel']." / ".$row['course'];
           $school = $row['school'];

        $pdf->SetFont('Arial','',10);
         $pdf->SetWidths(Array(20,75,60,97,60));
        $pdf->SetLineHeight(5);
        $pdf->SetAligns(Array('C','L','L','L','L'));
           $pdf->Row(Array(
            $count,
            strtoupper($fullname),
            $address,
            $yearcourse,
            $school
          
           ));
        
       }

  


   



$pdf->Output();

?>