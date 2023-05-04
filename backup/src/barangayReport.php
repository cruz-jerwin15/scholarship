<?php  session_start();
require('fpdf/fpdf.php');
require 'config.php';


class PDF extends FPDF
{
// Page header
function Header()
{
   // Logo
  global $title;
    // global $image="1565921280.png";
  $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // $this->Image('profile/1565921280.png',140,10,50);
    $this->SetFont('Arial','B',12);
    $this->SetLineWidth(1);
    $this->Cell(10,15,$title,0,0,'L');
    $this->Ln(20);
}


// Page footer
function Footer()
{
   // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
  
}
}



$pdf = new PDF();
$header_font=10;
$content_font=8;
$header_height=11;
$content_height=7;
$title = '';
$scholartype="";

//                         
    

           
    
    $pdf->SetTitle($title);

    $pdf->AddPage();
    // $profile="profile/".$row1['image'];
    $pdf->SetFont('Times','',$header_font);
    // $pdf->Image($profile,150,10,40);
    $pdf->Cell(0,$header_height,'',0,1);
    $pdf->Cell(0,$header_height,'',0,1);

   $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(20,$header_height,"#",1,0,'C');
    $pdf->Cell(30,$header_height,"Barangay",1,0,'C');
    $pdf->Cell(40,$header_height,"SHS Scholars",1,0,'C');
    $pdf->Cell(40,$header_height,"College Recipient",1,0,'C');
    $pdf->Cell(30,$header_height,"College Full Scholars",1,0,'C');
    $pdf->Cell(30,$header_height,"Total Scholars",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


     $status="OK";
    $status1="GRADUATED";
    $usertype="superadmin";
    $usertype1="admin";
    $filter =$_SESSION['search'];
    $whatsearch=$_SESSION['whatsearch'];
    $order=$_SESSION['order'];
    $limit=$_SESSION['limit'];
    $off=$_SESSION['offset']-1;

      if( $filter=="ALL"){
            if($order=="ASC"){
                      $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay ASC";
              }else{
                  $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay DESC";
              }
            $result = $conn->query($sql);
            $counter=0;
            while($row = $result->fetch_assoc()){
              $counter=$counter+1;
                $pdf->Cell(20,$header_height,$counter,1,0,'C');
              $barangay=$row['barangay'];
               $pdf->Cell(30,$header_height,$barangay,1,0,'C');
                $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="shscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_shscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_shscholar=$count_shscholar+1;
                    }

                 }
                
                 $pdf->Cell(40,$header_height, $count_shscholar,1,0,'C');
                 $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="collegerecipient";
                $status="OK";
                $status1="GRADUATED";
                $count_recipient=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_recipient=$count_recipient+1;
                    }

                 }
                  $pdf->Cell(40,$header_height,$count_recipient,1,0,'C');
               
                   $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="fullscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_fullscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_fullscholar=$count_fullscholar+1;
                    }

                 }
                  $pdf->Cell(30,$header_height,$count_fullscholar,1,0,'C');
                
               
                $total_scholars=$count_fullscholar+$count_recipient+$count_shscholar;
                
               $pdf->Cell(30,$header_height,$total_scholars,1,0,'C'); 
                $pdf->Cell(0,$header_height,'',0,1);
          }

          }else  if( $filter=="ACADEMIC YEAR"){
            if($order=="ASC"){
                      $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay ASC";
              }else{
                  $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay DESC";
              }
            $result = $conn->query($sql);
            $counter=0;
            while($row = $result->fetch_assoc()){
              $counter=$counter+1;
                $pdf->Cell(20,$header_height,$counter,1,0,'C');
              $barangay=$row['barangay'];
               $pdf->Cell(30,$header_height,$barangay,1,0,'C');
                $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay' AND academic_year='$whatsearch'";
                $result1 = $conn->query($sql1);
                $typescholar="shscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_shscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_shscholar=$count_shscholar+1;
                    }

                 }
                
                 $pdf->Cell(40,$header_height, $count_shscholar,1,0,'C');
                 $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay' AND academic_year='$whatsearch'";
                $result1 = $conn->query($sql1);
                $typescholar="collegerecipient";
                $status="OK";
                $status1="GRADUATED";
                $count_recipient=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_recipient=$count_recipient+1;
                    }

                 }
                  $pdf->Cell(40,$header_height,$count_recipient,1,0,'C');
               
                   $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay' AND academic_year='$whatsearch'";
                $result1 = $conn->query($sql1);
                $typescholar="fullscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_fullscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_fullscholar=$count_fullscholar+1;
                    }

                 }
                  $pdf->Cell(30,$header_height,$count_fullscholar,1,0,'C');
                
               
                $total_scholars=$count_fullscholar+$count_recipient+$count_shscholar;
                
               $pdf->Cell(30,$header_height,$total_scholars,1,0,'C'); 
                $pdf->Cell(0,$header_height,'',0,1);
          }

          }else if(($filter=="OK")||($filter=="GRADUATED")){
            if($order=="ASC"){
                      $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay ASC";
              }else{
                  $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay DESC";
              }
            $result = $conn->query($sql);
            $counter=0;
            while($row = $result->fetch_assoc()){
              $counter=$counter+1;
                $pdf->Cell(20,$header_height,$counter,1,0,'C');
              $barangay=$row['barangay'];
               $pdf->Cell(30,$header_height,$barangay,1,0,'C');
                $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="shscholar";
                if($filter=="OK"){
                  $status="OK";
                }else if($filter=="GRADUATED"){
                  $status="GRADUATED";
                }
                $count_shscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$status'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_shscholar=$count_shscholar+1;
                    }

                 }
                
                 $pdf->Cell(40,$header_height, $count_shscholar,1,0,'C');
                 $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="collegerecipient";
                if($filter=="OK"){
                  $status="OK";
                }else if($filter=="GRADUATED"){
                  $status="GRADUATED";
                }
                $count_recipient=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$status'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_recipient=$count_recipient+1;
                    }

                 }
                  $pdf->Cell(40,$header_height,$count_recipient,1,0,'C');
               
                   $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="fullscholar";
                if($filter=="OK"){
                  $status="OK";
                }else if($filter=="GRADUATED"){
                  $status="GRADUATED";
                }
                $count_fullscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$status'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_fullscholar=$count_fullscholar+1;
                    }

                 }
                  $pdf->Cell(30,$header_height,$count_fullscholar,1,0,'C');
                
               
                $total_scholars=$count_fullscholar+$count_recipient+$count_shscholar;
                
               $pdf->Cell(30,$header_height,$total_scholars,1,0,'C'); 
                $pdf->Cell(0,$header_height,'',0,1);
          }

          }
   
    //              $academic_year = $row['academic_year'];
    //               $application_no=$row['application_no'];
    //               $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    //                   $result1 = $conn->query($sql1);
    //                   $row1 = $result1->fetch_assoc();
    // $fullname=$row1['lastname'].", ".$row1['firstname']." ".$row1['middlename'];
    // $pdf->Cell(20,$header_height,$counter,1,0,'C');
    // $pdf->Cell(30,$header_height,$row['academic_year'],1,0,'C');
    // $pdf->Cell(40,$header_height,$fullname,1,0,'C');

    // if($row['typescholar']=="shscholar"){
    //    $pdf->Cell(40,$header_height,"SHS Scholarship",1,0,'C');    
    // }else if($row['typescholar']=="collegerecipient"){
    //    $pdf->Cell(40,$header_height,"College Recipient",1,0,'C');  
    // }else if($row['typescholar']=="fullscholar"){
    //    $pdf->Cell(40,$header_height,"College Full Scholarship",1,0,'C');
                                  
    // }

    // $pdf->Cell(30,$header_height,$row1['barangay'],1,0,'C');
    // if($row['status']=="OK"){
    //   $stats ="Current Scholars";
    // }else if($row['status']=="GRADUATED"){
    //   $stats ="Graduate";
    // }
    // $pdf->Cell(30,$header_height,$stats,1,0,'C');
    // $pdf->Cell(0,$header_height,'',0,1);                          
                                 
    //               $counter=$counter+1;       
    //             }
    //       }else{

    //       }
   
  


    // }
// }

$pdf->Output();
?>
