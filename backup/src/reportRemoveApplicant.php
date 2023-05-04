<?php session_start();
include('pdf_mc_table2.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";



if($_SESSION['search']=="FULL SCHOLARSHIP"){
 $scholartype="fullscholar";
}else if($_SESSION['search']=="COLLEGE EDUCATIONAL ASSISTANCE"){
 $scholartype="collegerecipient";
}else if($_SESSION['search']=="SHS EDUCATIONAL ASSISTANCE"){
 $scholartype="shscholar";
}else{
  $scholartype="all";
}

  $filter =$_SESSION['search'];
  $whatsearch=$_SESSION['whatsearch'];
  $order=$_SESSION['order'];
  $limit=$_SESSION['limit'];
  $off=$_SESSION['offset']-1;


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
 
      $pdf->AddPage('L',"Letter");
    $profile="img/citylogo.png";
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,100,10,25);
    $pdf->Cell(70,10,"",0,0,'L');
    $pdf->Cell(150,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(70,10,"",0,0,'L');
    $pdf->Cell(150,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(70,10,"",0,0,'L');
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
        $pdf->Cell(270,$header_height,"LIST OF REMOVED COLLEGE FULL SCHOLARSHIP APPLICANTS",0,0,'C');
       $pdf->Cell(0,5,'',0,1);
        if(strlen($whatsearch)<=0){
        $pdf->Cell(0,15,'',0,1);
        }else{
           $pdf->Cell(0,5,'',0,1);    
          $pdf->Cell(270,$header_height,strtoupper("S.Y. ".$whatsearch),0,0,'C');
          $pdf->Cell(0,15,'',0,1);
        }
   
    }else if($scholartype=="collegerecipient"){
        $pdf->Cell(270,$header_height,"LIST OF REMOVED COLLEGE EDUCATIONAL ASSISTANCE APPLICANTS",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
         if(strlen($whatsearch)<=0){
        $pdf->Cell(0,15,'',0,1);
        }else{
           $pdf->Cell(0,5,'',0,1);    
          $pdf->Cell(270,$header_height,strtoupper("S.Y. ".$whatsearch),0,0,'C');
          $pdf->Cell(0,15,'',0,1);
        }
    }else if($scholartype=="shscholar"){
      $pdf->Cell(270,$header_height,"LIST OF SHS EDUCATIONAL ASSISTANCE APPLICANTS",0,0,'C');
      $pdf->Cell(0,5,'',0,1);
       if(strlen($whatsearch)<=0){
        $pdf->Cell(0,15,'',0,1);
        }else{
           $pdf->Cell(0,5,'',0,1);    
          $pdf->Cell(270,$header_height,strtoupper("S.Y. ".$whatsearch),0,0,'C');
          $pdf->Cell(0,15,'',0,1);
        }
    }else{
      $pdf->Cell(270,$header_height,"LIST OF GRADUATE SCHOLARS AND RECIPIENTS",0,0,'C');
      $pdf->Cell(0,15,'',0,1);
    }
    

       


  $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(20,40,40,40,40,84));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C','C','C','C'));
     $pdf->Row(Array(
         'NO.',
  'Name',
  'Email',
  'Barangay',
  'Contact Number',
  'Remarks'
 ));

 
                $status="REMOVED";
                $remove="YES";
                if($filter=="ALL"){
                  if($order=="ASC"){
                    $sql ="SELECT * FROM tbl_remarks WHERE remove='$remove' ORDER BY user_id ASC LIMIT ".$limit." OFFSET ".$off;

                    
                  }else{
                    $sql ="SELECT * FROM tbl_remarks WHERE remove='$remove' ORDER BY user_id DESC LIMIT ".$limit." OFFSET ".$off;

                    
                  }
              }else if($filter=="ACADEMIC YEAR"){
                  if($order=="ASC"){
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id ASC ";
                   
                 
                  }else{
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id DESC ";
                   
                 
                  }
              }else if($filter=="FULL SCHOLARSHIP"){
                $scholarship="fullscholar";
                  if($order=="ASC"){
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id ASC ";
                   
             
                  }else{
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id DESC ";;
                   
              
                  }
              }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                $scholarship="collegerecipient";
                  if($order=="ASC"){
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id ASC ";
                   
                 
                  }else{
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id DESC ";
                   
                 
                  }
              }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                $scholarship="shscholar";
                  if($order=="ASC"){
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id ASC ";
                   
                  
                  }else{
                     $sql = "SELECT tbl_remarks.user_id,tbl_remarks.remarks
                        FROM tbl_remarks 
                        INNER JOIN tbl_academic 
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_academic.academic_year LIKE '$whatsearch%' AND tbl_remarks.scholars='$scholarship' AND tbl_remarks.remove='$remove' ORDER BY tbl_remarks.user_id DESC ";
                   
                 
                  }
              }
                $result = $conn->query($sql);
               
               
             
 
                $count=0;
                 while($row = $result->fetch_assoc()){
                    $user_id=$row['user_id'];
                      $sql2 = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                      FROM tbl_admin 
                      INNER JOIN tbl_studentinfo 
                      ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no 
                      WHERE tbl_admin.id='$user_id'";
                      $result2 = $conn->query($sql2);
                      $row2 = $result2->fetch_assoc();
                 
                    $count++;
                     $pdf->SetFont('Arial','',10);
                   $pdf->SetWidths(Array(20,40,40,40,40,84));
                  $pdf->SetLineHeight(5);
                   $pdf->SetAligns(Array('C','C','C','C','C','C'));
                       $pdf->Row(Array(
                           $count,
                    $row2['lastname'].", ".$row2['firstname'],
                    $row2['username'],
                    $row2['barangay'],
                    $row2['phone'],
                    $row['remarks']
                   ));
                  }
      
        
//               $pdf->SetFont('Arial','',10);
//       $pdf->SetWidths(Array(14,29,29,22,17,39,27,27,36,36,17,17));
// $pdf->SetLineHeight(5);
//  $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
//                $pdf->Row(Array(
//               $count,
//               strtoupper($lastname),
//               strtoupper($firstname),
//               strtoupper($middleini),
//               $applicant_number,
//               $address,
//               $recipient,
//               $full,
//               $school,
//               $course,
//               $interview_score,
//               number_format($totalscore,2)
//              ));
          

  


  

$pdf->Output();

?>