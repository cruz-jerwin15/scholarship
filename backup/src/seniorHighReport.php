<?php
session_start();
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
$title = '';

$filter =$_SESSION['search'];
$whatsearch=$_SESSION['whatsearch'];
                          
$order=$_SESSION['order'];
$limit=$_SESSION['limit'];
                          // if($_SESSION['offset']<=1){
                          //   $off=$_SESSION['offset'];
                          // }else{
$off=$_SESSION['offset']-1;
                          // }

  $status="ASSESSMENT";
                          $user ="shs";
                           $scholar ="shscholar";
                          $usertype="admin";

if( $filter=="ALL"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id ASC limit $limit OFFSET $off";
                            }else{
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id DESC limit $limit OFFSET $off";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="FIRST NAME"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname ASC limit $limit OFFSET $off";
                            }else{
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname DESC limit $limit OFFSET $off";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="LAST NAME"){
                             if($order=="ASC"){
                                  $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname ASC limit $limit OFFSET $off";
                             }else{
                                  $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname DESC limit $limit OFFSET $off";
                             }
                           
                             $result = $conn->query($sql);
                          }else if( $filter=="EMAIL"){
                             if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username ASC limit $limit OFFSET $off";
                             }else{
                               $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username DESC limit $limit OFFSET $off";
                             }
                            
                             $result = $conn->query($sql);
                          }
    if ($result->num_rows > 0){                      
    while($row = $result->fetch_assoc()){

    
$pdf->SetTitle($title);
$pdf->AddPage();
$profile="profile/".$row['image'];
$pdf->Image($profile,140,10,50);

$pdf->SetFont('Times','',14);
$userid = $row['id'];

    $sql1 = "SELECT * FROM tbl_studentinfo WHERE user_id='$userid'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

$name="Name: ".$row1['firstname']." ".$row1['middlename']." ". $row1['lastname'];
$bday = $row1['bday'];
$birthorder="Birth Order: ".$row1['birthorder'];

$date1 = strtotime($bday);  
$date2 = strtotime(date("Y/m/d")); 

$diff = abs($date2 - $date1); 
$years = floor($diff / (365*60*60*24));  

$age = "Age: ".$years." years old";

    $sql2 = "SELECT * FROM tbl_educational WHERE user_id='$userid'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

$school="School: ".$row2['school'];
$gwa="GWA: ".$row2['genweight'];

    $sql3 = "SELECT * FROM tbl_course WHERE user_id='$userid'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();

$course = "Year & Course : ".$row3['course'];

    $sql4 = "SELECT * FROM  tbl_parentinfo WHERE user_id='$userid'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();

$gross ="Family Total Monthly Gross Income: Php. ".$row4['gross'];
$family ="Total Number of Family Member: ".$row4['numberfamily'];


    $sql5 = "SELECT * FROM   tbl_fatherinfo WHERE user_id='$userid'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();
$fathername="Father: ".$row5['firstname']." ".$row5['middlename']." ".$row5['lastname'];
$fatheroccupation="Occupation: ".$row5['occupation'];

    $sql6 = "SELECT * FROM   tbl_motherinfo WHERE user_id='$userid'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();
$mothername="Mother: ".$row6['firstname']." ".$row6['middlename']." ".$row6['lastname'];
$motheroccupation="Occupation: ".$row6['occupation'];

    $process="REQUIREMENTS";
    $sql8 = "SELECT * FROM tbl_remarks WHERE user_id='$userid' AND process='$process'";
    $result8 = $conn->query($sql8);
    $row8 = $result8->fetch_assoc();

$requirement="Requirements: ".$row8['remarks'];

    $process="INTERVIEW";
    $sql8 = "SELECT * FROM tbl_remarks WHERE user_id='$userid' AND process='$process'";
    $result8 = $conn->query($sql8);
    $row8 = $result8->fetch_assoc();

$interview="Interview: ".$row8['remarks'];

$pdf->Cell(10,10,$name,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$age,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$school,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$course,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$gwa,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$gross,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$family,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$birthorder,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$fathername,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$fatheroccupation,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$mothername,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$motheroccupation,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,'Remarks: ',0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$requirement,0,0,'L');
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(10,10,$interview,0,0,'L');
$pdf->Cell(0,10,'',0,1);

                          
}
}

$pdf->Output();
?>
