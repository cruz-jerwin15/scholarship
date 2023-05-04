<?php session_start();
include('pdf_mc_table.php');
require 'database.php';
$pdf = new PDF_MC_Table();


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
    $profile="img/companylogo.png";
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,140,10,25);
    $pdf->Cell(110,10,"",0,0,'L');
    $pdf->Cell(150,10,"CARUS MOBILE",0,0,'C');
    $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(110,10,"",0,0,'L');
    $pdf->Cell(150,10,"NAME THAT COLOR",0,0,'C');
  
    

   
    $pdf->SetFont('Times','',$header_font);

     $pdf->Cell(0,20,'',0,1);

   
    
   
  
    $pdf->Cell(335,$header_height,"TOP 50",0,0,'C');
   
    
    $pdf->Cell(0,5,'',0,1);    
    $pdf->Cell(335,$header_height,"As of ".$months." ".$day.", ".$year,0,0,'C');
    $pdf->Cell(0,10,'',0,1);






  $pdf->SetFont('Arial','',10);
 $pdf->SetWidths(Array(50,50,50));
$pdf->SetLineHeight(5);
 $pdf->SetAligns(Array('C','C','C'));
     $pdf->Row(Array(
         'RANK',
  'USERNAME',
  'POINTS'

 ));
 
     $dates = $_GET['dates'];
          echo $dates;
          $sql = "SELECT * FROM tbl_rank where dates='$dates' ORDER BY points DESC";
          $result = $conn->query($sql);
          $count =1;
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
              $user_id = $row['user_id'];
                $sql1 = "SELECT * FROM tbl_account where user_id='$user_id'";
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
            $pdf->SetFont('Arial','',10);
            $pdf->SetWidths(Array(50,50,50));
        $pdf->SetLineHeight(5);
         $pdf->SetAligns(Array('C','C','C'));
                       $pdf->Row(Array(
                      $count,
                      strtoupper($row1['username']),
                      strtoupper($row['points'])
                     ));
            }
          }
   
  
          
          
        
       

 


  

$pdf->Output();

?>