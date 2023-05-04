<?php session_start();
include('pdf_mc_table1.php');
require 'config.php';
$pdf = new PDF_MC_Table();

$title = '';
$scholartype="";



if($_SESSION['studenttype']=="fullscholar"){
 $scholartype="fullscholar";
}else if($_SESSION['studenttype']=="collegerecipient"){
 $scholartype="collegerecipient";
}else{
  $scholartype="shscholar";
}




$header_font=12;
$content_font=9;
$header_height=11;
$content_height=7;
$w=35;
$h=16;

 $pdf->SetTitle($title);
      $pdf->AddPage('P','Letter');
    $profile="img/citylogo.png";
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,60,10,25);
    $pdf->Cell(30,10,"",0,0,'L');
    $pdf->Cell(150,10,"Republic of the Philippines",0,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(30,10,"",0,0,'L');
    $pdf->Cell(150,10,"Province of Batangas",0,0,'C');
     $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(30,10,"",0,0,'L');
    $pdf->Cell(150,10,"City of Sto. Tomas",0,0,'C');
    

   
    $pdf->SetFont('Times','',$header_font);

     $pdf->Cell(0,17,'',0,1);

    $stats="OPEN";
    $sql = "SELECT * FROM tbl_batch WHERE status='$stats'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sy =$row['batch'].' 1ST SEMESTER';
    
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

    if($_SESSION['studenttype']=="fullscholar"){
        $pdf->Cell(200,$header_height,"STO. TOMAS COLLEGE FULL SCHOLARSHIP",0,0,'C');
       $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(200,$header_height,"APPLICATION SUMMARY PER BARANGAY",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(200,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    }else if($_SESSION['studenttype']=="collegerecipient"){
      $pdf->Cell(200,$header_height,"COLLEGE EDUCATIONAL ASSISTANCE PROGRAM",0,0,'C');
       $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(200,$header_height,"APPLICATION SUMMARY PER BARANGAY",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(200,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    }else{
       $pdf->Cell(200,$header_height,"SENIOR HIGH SCHOOL EDUCATIONAL ASSISTANCE PROGRAM",0,0,'C');
       $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(200,$header_height,"APPLICATION SUMMARY PER BARANGAY",0,0,'C');
        $pdf->Cell(0,5,'',0,1);
        $pdf->Cell(200,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    }
   
    $pdf->Cell(0,10,'',0,1);  



$pdf->SetFont('Arial','',12);
$pdf->SetWidths(Array(20,120,57));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','C','C'));
 
  $pdf->Row(Array(
  'NO.',
  'BARANGAY',
  'NUMBER OF APPLICANTS'
 ));
    $status1 ="ASSESSMENT";
    $sql = "SELECT * FROM  tbl_barangay ORDER BY barangay";
    $result = $conn->query($sql);
    $count=0;
    $total=0;
    while($row = $result->fetch_assoc()){
      $count++;
      $barangay = $row['barangay'];
      $sql1 = "SELECT COUNT(tbl_admin.id) as subtotal 
         FROM tbl_admin
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype' AND tbl_studentinfo.barangay='$barangay'";
      $result1 = $conn->query($sql1);
      $row1 = $result1->fetch_assoc();
      $subtotal=$row1['subtotal'];
      $total = $total+$subtotal;
      $pdf->SetFont('Arial','',12);
      $pdf->SetWidths(Array(20,120,57));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('C','C','C'));
           $pdf->Row(Array(
            $count,
            $barangay,
            $subtotal));
    }
     $pdf->SetFont('Arial','',12);
      $pdf->SetWidths(Array(140,57));
      $pdf->SetLineHeight(5);
      $pdf->SetAligns(Array('R','C'));
    $pdf->Row(Array(
            'TOTAL: ',
            $total));
  
$pdf->Output();

?>