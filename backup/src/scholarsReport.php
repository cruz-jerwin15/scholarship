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
    $pdf->Cell(30,$header_height,"Academic Year",1,0,'C');
    $pdf->Cell(40,$header_height,"Name",1,0,'C');
    $pdf->Cell(40,$header_height,"Scholarship",1,0,'C');
    $pdf->Cell(30,$header_height,"Barangay",1,0,'C');
    $pdf->Cell(30,$header_height,"Status",1,0,'C');
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
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status'OR status='$status1' order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE status='$status'OR status='$status1' order by id  DESC ";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="ACADEMIC YEAR"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE academic_year='$whatsearch' AND (status='$status' OR status='$status1') order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE academic_year='$whatsearch' AND (status='$status' OR status='$status1') order by id  DESC ";
                            }
                           
                             $result = $conn->query($sql);
                          }else if($filter=="OK"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE status='$status' order by id  DESC ";
                            }
                           
                             $result = $conn->query($sql);

                          }else if($filter=="GRADUATED"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status1' order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE status='$status1' order by id  DESC ";
                            }
                           
                             $result = $conn->query($sql);

                          }else if( $filter=="SHS"){
                            $typescholar="shscholar";
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE typescholar='$typescholar' AND (status='$status' OR status='$status1') order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE academic_year='$whatsearch' AND (status='$status' OR status='$status1') order by id  DESC ";
                            }
                           
                             $result = $conn->query($sql);
                          }else if( $filter=="COLLEGE RECIPIENT"){
                            $typescholar="collegerecipient";
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE typescholar='$typescholar' AND (status='$status' OR status='$status1') order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE academic_year='$whatsearch' AND (status='$status' OR status='$status1') order by id  DESC ";
                            }
                           
                             $result = $conn->query($sql);
                          }else if( $filter=="COLLEGE FULL SCHOLARSHIP"){
                            $typescholar="fullscholar";
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE typescholar='$typescholar' AND (status='$status' OR status='$status1') order by id ASC ";
                            }else{
                              $sql = "SELECT * FROM tbl_admin WHERE academic_year='$whatsearch' AND (status='$status' OR status='$status1') order by id  DESC ";
                            }
                           
                             $result = $conn->query($sql);
                          }
           if ($result->num_rows > 0){
              $counter=1;
                            
                while($row = $result->fetch_assoc()){
                 $academic_year = $row['academic_year'];
                  $application_no=$row['application_no'];
                  $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                      $result1 = $conn->query($sql1);
                      $row1 = $result1->fetch_assoc();
    $fullname=$row1['lastname'].", ".$row1['firstname']." ".$row1['middlename'];
    $pdf->Cell(20,$header_height,$counter,1,0,'C');
    $pdf->Cell(30,$header_height,$row['academic_year'],1,0,'C');
    $pdf->Cell(40,$header_height,$fullname,1,0,'C');

    if($row['typescholar']=="shscholar"){
       $pdf->Cell(40,$header_height,"SHS Scholarship",1,0,'C');    
    }else if($row['typescholar']=="collegerecipient"){
       $pdf->Cell(40,$header_height,"College Recipient",1,0,'C');  
    }else if($row['typescholar']=="fullscholar"){
       $pdf->Cell(40,$header_height,"College Full Scholarship",1,0,'C');
                                  
    }

    $pdf->Cell(30,$header_height,$row1['barangay'],1,0,'C');
    if($row['status']=="OK"){
      $stats ="Current Scholars";
    }else if($row['status']=="GRADUATED"){
      $stats ="Graduate";
    }
    $pdf->Cell(30,$header_height,$stats,1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);                          
                                 
                  $counter=$counter+1;       
                }
          }else{

          }
   
  


    // }
// }

$pdf->Output();
?>
