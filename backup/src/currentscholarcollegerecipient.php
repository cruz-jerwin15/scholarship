<?php
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
    $this->SetFont('Arial','B',15);
    $this->SetLineWidth(1);
    $this->Cell(30,15,$title,0,0,'C');
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
$title = 'Current College Recipient';
$pdf->SetTitle($title);
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Cell(10,10,'#',1,0,'C');
$pdf->Cell(35,10,'Barangay',1,0,'C');
$pdf->Cell(70,10,'Student Name',1,0,'C');
$pdf->Cell(80,10,'Course',1,1,'C');

$pdf->SetFont('Times','',10);
$status="ASSESSMENT";
$scholar="fullscholar";
$sql = "SELECT DISTINCT(barangay),user_id,middlename FROM tbl_studentinfo ORDER BY barangay";
    $result = $conn->query($sql);
    $count=1;
    while($row = $result->fetch_assoc()){
    $barangayname = $row['barangay'];
    $userid = $row['user_id'];
    $middlename = $row['middlename'];
    $status="OK";
    $typescholar="collegerecipient";
    $sql1 = "SELECT * FROM tbl_admin WHERE id='$userid' AND status='$status' AND typescholar='$typescholar'";
    $result1 = $conn->query($sql1);
    
    while($row1 = $result1->fetch_assoc()){
        $studentname= $row1['firstname']." ".$middlename." ".$row1['lastname'];
        $pdf->Cell(10,10,$count,1,0,'C');
        $pdf->Cell(35,10,$barangayname,1,0,'C');
        $pdf->Cell(70,10,$studentname,1,0,'C');
        
        $sql2 = "SELECT * FROM tbl_course WHERE user_id='$userid'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();

        $pdf->Cell(80,10,$row2['course'],1,1,'C');
       

        $count=$count+1;
    }

   


                          
    }

$pdf->Output();
?>
