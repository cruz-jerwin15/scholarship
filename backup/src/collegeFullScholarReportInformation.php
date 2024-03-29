<?php  session_start();
require('fpdf/fpdf.php');
require 'config.php';
$academic_year=$_GET['academic_year'];
 $application_no=$_GET['application_no'];
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
$header_font=12;
$content_font=8;
$header_height=11;
$content_height=7;
$title = '';
$scholartype="";
 $status="ASSESSMENT";
if($_SESSION['studenttype']=="fullscholar"){
 $scholartype="fullscholar";
}else if($_SESSION['studenttype']=="collegerecipient"){
 $scholartype="collegerecipient";
}else{
  $scholartype="shscholar";
}
//                         
    


    $sql = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result = $conn->query($sql);
                          
    while($row = $result->fetch_assoc()){
      $totalscore=0;
      $academic_year=$row['academic_year'];
      $application_no = $row['application_no'];
      $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
      $result1 = $conn->query($sql1);
      $row1 = $result1->fetch_assoc();
      $fullname = $row1['firstname']." ".$row1['middlename']." ".$row1['lastname'];
      if($row1['housenumber']=="N/A"){
        $housenumber="";
      }else{
        $housenumber=$row1['housenumber'];
      }
      if($row1['street']=="N/A"){
        $street="";
      }else{
        $street=$row1['street'];
      }
      $address = $housenumber." ".$street." ".$row1['barangay'];
      $years_residency=$row1['years_residency'];
      $number_try = $row1['number_try'];
      $birthday=$row1['bday'];
      $birthorder=$row1['birthorder'];
      $civil_status=$row1['civil'];

    $pdf->SetTitle($title);

     $pdf->AddPage();
    $profile="profile/".$row['image'];
    $pdf->SetFont('Times','',$header_font);
    // $pdf->Image($profile,150,10,40);
    // $pdf->Image($profile,150,10,40);
    $pdf->Cell(0,$header_height,'',0,1);
    $pdf->Cell(0,$header_height,'',0,1);

   $pdf->SetFont('Times','',$header_font);
    
    $pdf->Cell(165,$header_height,"PERSONAL INFORMATION",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


    $pdf->Cell(65,$content_height,"Full Name",1,0,'L');
    $pdf->Cell(100,$content_height,$fullname,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(100,$content_height,$address,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $applicant_number = $row['applicant_number'];
    $sql2 = "SELECT * FROM tbl_legend_applicant WHERE minimum<='$applicant_number' AND maximum>='$applicant_number'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $applicant_number_points=$row2['points'];

    $totalscore=$totalscore+$applicant_number_points;

    $pdf->Cell(65,$content_height,"Applicant No.",1,0,'L');
    $pdf->Cell(100,$content_height,$applicant_number,1,0,'L');
    $pdf->Cell(25,$content_height,$applicant_number_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql3 = "SELECT * FROM tbl_added_info WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();
   
    $informed = $row3['informed'];
    $working_student = $row3['working_student'];
    $living_with = $row3['living_with'];
    $occupation = $row3['occupation'];
    $hea = $row3['hea'];
    $ami = $row3['ami'];
    $parent_ofw = $row3['parent_ofw'];
    $relatives_ofw = $row3['relatives_ofw'];
    $pwd = $row3['pwd'];
    $single_parent = $row3['single_parent'];
    $parent_separated = $row3['parent_separated'];
    $student_pwd = $row3['student_pwd'];

    $sql4 = "SELECT * FROM tbl_informed WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();

    $sql5 = "SELECT * FROM tbl_legend_informed WHERE legend='$informed'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $informed_points=$row5['points'];

    $totalscore=$totalscore+$informed_points;
    if ($result4->num_rows > 0){
      if(strlen($row4['officialname'])>0){
        $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
        $pdf->Cell(100,$content_height,$informed." / ".$row4['officialname'],1,0,'L');
        $pdf->Cell(25,$content_height,"",1,0,'C');
      }else{
        $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
        $pdf->Cell(100,$content_height,$informed,1,0,'L');
        $pdf->Cell(25,$content_height,$informed_points,1,0,'C');
      }
    
    }else{
      $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
      $pdf->Cell(100,$content_height,$informed,1,0,'L');
      $pdf->Cell(25,$content_height,"",1,0,'C');
    }


   

    $pdf->Cell(0,$content_height,'',0,1);

    $sql6 = "SELECT * FROM tbl_legend_residency WHERE minimum<='$years_residency' AND maximum>='$years_residency'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $years_residency_points=$row6['points'];

    $totalscore=$totalscore+$years_residency_points;

    $pdf->Cell(65,$content_height,"Years of Residency",1,0,'L');
    $pdf->Cell(100,$content_height,$years_residency." year/s",1,0,'L');
    $pdf->Cell(25,$content_height,$years_residency_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if($number_try>1){
      $try="NO";
    }else{
      $try="YES";
    }

    $sql6 = "SELECT * FROM tbl_legend_numbertimes WHERE legend='$number_try'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $number_try_points=$row6['points'];
     $totalscore=$totalscore+$number_try_points;
   
    $pdf->Cell(65,$content_height,"New Applicant",1,0,'L');
    $pdf->Cell(100,$content_height,$try,1,0,'L');
    $pdf->Cell(25,$content_height,"",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Former Recipient",1,0,'L');
    $pdf->Cell(100,$content_height,"",1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Former Scholar",1,0,'L');
    $pdf->Cell(100,$content_height,"",1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Number of Times Applied for Scholarship",1,0,'L');
    $pdf->Cell(100,$content_height,$number_try,1,0,'L');
    $pdf->Cell(25,$content_height,$number_try_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $today = date("Y-m-d");
    $diff =  date_diff(date_create($birthday),date_create($today));
    $age = $diff->format('%y');


    $sql6 = "SELECT * FROM tbl_legend_age WHERE minimum<='$age' AND maximum>='$age'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $age_points=$row6['points'];

     $totalscore=$totalscore+$age_points;

    $pdf->Cell(65,$content_height,"Age",1,0,'L');
    $pdf->Cell(100,$content_height,$age." years old",1,0,'L');
    $pdf->Cell(25,$content_height,$age_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);


    $sql5 = "SELECT * FROM tbl_legend_birth_order WHERE legend='$birthorder'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $birthorder_points=$row5['points'];

    $totalscore=$totalscore+$birthorder_points;

    $pdf->Cell(65,$content_height,"Birth Order",1,0,'L');
    $pdf->Cell(100,$content_height,$birthorder,1,0,'L');
    $pdf->Cell(25,$content_height,$birthorder_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);


    $sql6 = "SELECT COUNT(*) as sibs FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $numbersiblings=$row6['sibs'];


    $pdf->Cell(65,$content_height,"Number of Siblings",1,0,'L');
    $pdf->Cell(100,$content_height,$numbersiblings,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM  tbl_legend_civil_status WHERE legend='$civil_status'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $civilstatus_points=$row5['points'];

     $totalscore=$totalscore+$civilstatus_points;

    $pdf->Cell(65,$content_height,"Civil Status",1,0,'L');
    $pdf->Cell(100,$content_height,$civil_status,1,0,'L');
    $pdf->Cell(25,$content_height,$civilstatus_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $gwa = $row1['gwa'];

    $sql6 = "SELECT * FROM tbl_legend_gwa WHERE minimum<='$gwa' AND maximum>='$gwa'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $gwa_points=$row6['points'];

     $totalscore=$totalscore+$gwa_points;

    $pdf->Cell(65,$content_height,"General Weighted Average",1,0,'L');
    $pdf->Cell(100,$content_height,$gwa,1,0,'L');
    $pdf->Cell(25,$content_height,$gwa_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM tbl_legend_living_with WHERE legend='$living_with'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $living_with_points=$row5['points'];

     $totalscore=$totalscore+$living_with_points;

    $pdf->Cell(65,$content_height,"Living with Family:",1,0,'L');
    $pdf->Cell(100,$content_height,$living_with,1,0,'L');
    $pdf->Cell(25,$content_height,$living_with_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);


    $typehouse = $row1['type_house'];

    $sql5 = "SELECT * FROM tbl_legend_house WHERE legend='$typehouse'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $typehouse_points=$row5['points'];

    $totalscore=$totalscore+$typehouse_points;

    $pdf->Cell(65,$content_height,"House",1,0,'L');
    $pdf->Cell(100,$content_height,$typehouse,1,0,'L');
    $pdf->Cell(25,$content_height,$typehouse_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);


    $sql5 = "SELECT * FROM tbl_legend_working WHERE legend='$working_student'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $working_student_points=$row5['points'];

    $totalscore=$totalscore+$working_student_points;

    $pdf->Cell(65,$content_height,"Working Student",1,0,'L');
    $pdf->Cell(100,$content_height,$working_student,1,0,'L');
    $pdf->Cell(25,$content_height,$working_student_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM tbl_legend_pwd WHERE legend='$student_pwd'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $pwd_student_points=$row5['points'];

    $totalscore=$totalscore+$pwd_student_points;


    $pdf->Cell(65,$content_height,"Student PWD",1,0,'L');
    $pdf->Cell(100,$content_height,$student_pwd,1,0,'L');
    $pdf->Cell(25,$content_height,$pwd_student_points,1,0,'C');

     $pdf->Cell(0,$content_height,'',0,1);



    $school_intended=$row1['school'];
    $school_type_intended=$row1['schooltype'];
    $course_intended=$row1['course'];
    $grade_level_intended=$row1['gradelevel'];
    $exam_rating = $row1['exam_rating'];
    $total_family = $row1['total_family_member'];


    $sql4 = "SELECT * FROM tbl_educational_background
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();

    $isgraduating =$row4['isgraduating'];
    $ishonor=$row4['ishonor'];
    $name_school_college=$row4['name_school_college'];
    $honor_college=$row4['honor_college'];
    if($name_school_college==""){
       $school_type_college="";
    }else{
       $school_type_college=$row4['school_type_college'];
    }

   
    $name_school_sh=$row4['name_school_sh'];
    $honor_sh=$row4['honor_sh'];
    if($name_school_sh==""){
       $school_type_sh="";
    }else{
       $school_type_sh=$row4['school_type_sh'];
    }
   
    $name_school_jh=$row4['name_school_jh'];
    $honor_jh=$row4['honor_jh'];
    if($name_school_jh==""){
       $school_type_jh="";
    }else{
       $school_type_jh=$row4['school_type_jh'];
    }
    
    $name_school_elementary=$row4['name_school_elementary'];
    $honor_elementary=$row4['honor_elementary'];
    if($name_school_elementary==""){
       $school_type_elementary="";
    }else{
       $school_type_elementary=$row4['school_type_elementary'];
    }
   
   $number_award ="";

   if($_SESSION['studenttype']=="fullscholar"){
       $number_award =$honor_sh;
   }else if($_SESSION['studenttype']=="collegerecipient"){
       $number_award =$honor_sh;
   }else{
       $number_award =$honor_jh;
   }
                      
    $pdf->SetFont('Times','',$header_font);                 
    $pdf->Cell(165,$header_height,"EDUCATIONAL BACKGROUND",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);
    $pdf->Cell(190,$content_height,"School",1,0,'L');
    
    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_elementary'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_elementary_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_elementary_points;
   
    $pdf->Cell(65,$content_height,"Elementary",1,0,'L');
    $pdf->Cell(70,$content_height,$name_school_elementary,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_elementary,1,0,'L');
    $pdf->Cell(25,$content_height,$school_type_elementary_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_jh'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_jh_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_jh_points;

    $pdf->Cell(65,$content_height,"Junior High School",1,0,'L');
    $pdf->Cell(70,$content_height,$name_school_jh,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_jh,1,0,'L');
    $pdf->Cell(25,$content_height,$school_type_jh_points,1,0,'C'); 

    $pdf->Cell(0,$content_height,'',0,1);


    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_sh'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_sh_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_sh_points;

    $pdf->Cell(65,$content_height,"Senior High School",1,0,'L');
   $pdf->Cell(70,$content_height,$name_school_sh,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_sh,1,0,'L');
    $pdf->Cell(25,$content_height,$school_type_sh_points,1,0,'C'); 

    $pdf->Cell(0,$content_height,'',0,1);

      $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_college'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_college_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_college_points;

    $pdf->Cell(65,$content_height,"College",1,0,'L');
     $pdf->Cell(70,$content_height,$name_school_college,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_college,1,0,'L');
    $pdf->Cell(25,$content_height,$school_type_college_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_intended'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_intended_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_intended_points;


    $pdf->Cell(65,$content_height,"School Intended to Enroll",1,0,'L');
    $pdf->Cell(70,$content_height,$school_intended,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_intended,1,0,'L');
    $pdf->Cell(25,$content_height,$school_type_intended_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Year",1,0,'L');
    $pdf->Cell(100,$content_height,$grade_level_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Course",1,0,'L');
    $pdf->Cell(100,$content_height,$course_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

     $sql5 = "SELECT * FROM tbl_legend_graduating_honors WHERE legend='$ishonor'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $ishonor_points=$row5['points'];

    $totalscore=$totalscore+ $ishonor_points;
    
    $pdf->Cell(65,$content_height,"Graduate/Graduating with Honors",1,0,'L');
    $pdf->Cell(100,$content_height,$ishonor,1,0,'L');
    $pdf->Cell(25,$content_height,$ishonor_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1); 

     $sql6 = "SELECT * FROM tbl_legend_award WHERE minimum<='$number_award' AND maximum>='$number_award'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $award_points=$row6['points'];

     $totalscore=$totalscore+$award_points;

    $pdf->Cell(65,$content_height,"Number of Honors/Awards Received",1,0,'L');
    $pdf->Cell(100,$content_height,$number_award,1,0,'L');
    $pdf->Cell(25,$content_height,$award_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);



    $sql5 = "SELECT * FROM tbl_fatherinfo
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $f_fullname=$row5['fullname'];
    $f_living=$row5['living'];
    $f_occupation=$row5['occupation'];
    $f_place_of_work=$row5['place_of_work'];
    $f_hea=$row5['hea'];
    $f_ami=0;
    if($f_living=="DECEASED"){
      $f_ami=0;
    }else{
      $f_ami=$row5['ami'];
    }


    $sql6 = "SELECT * FROM tbl_motherinfo
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $m_fullname=$row6['fullname'];
    $m_living=$row6['living'];
    $m_occupation=$row6['occupation'];
    $m_place_of_work=$row6['place_of_work'];
    $m_hea=$row6['hea'];
    $m_ami=0;
    if($m_living=="DECEASED"){
      $m_ami=0;
    }else{
      $m_ami=$row6['ami'];
    }


   $sql7 = "SELECT * FROM tbl_guardianinfo
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result7 = $conn->query($sql7);
    $row7 = $result7->fetch_assoc();

    $g_fullname=$row7['fullname'];
    $g_occupation=$row7['occupation'];
     $g_ami=0;
    if(strlen($g_fullname)>0){
      $g_ami=0;
    }else{
      $g_ami=$row6['ami'];
    }

    $pdf->Cell(165,$header_height,"FAMILY BACKGROUND",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);



    if($f_living=="DECEASED"){
        $sql5 = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$f_living'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $f_living_points=$row5['points'];

        $totalscore=$totalscore+ $f_living_points;

      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(70,$content_height,$f_fullname,1,0,'L');
      $pdf->Cell(30,$content_height,$f_living,1,0,'L');
      $pdf->Cell(25,$content_height,$f_living_points,1,0,'C'); 
    }else{
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(100,$content_height,$f_fullname,1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C'); 
    }

  
     $pdf->Cell(0,$content_height,'',0,1);

    if($m_living=="DECEASED"){
        $sql5 = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$m_living'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $m_living_points=$row5['points'];

        $totalscore=$totalscore+ $m_living_points;

      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(70,$content_height,$m_fullname,1,0,'L');
      $pdf->Cell(30,$content_height,$m_living,1,0,'L');
      $pdf->Cell(25,$content_height,$m_living_points,1,0,'C'); 
    }else{
      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(100,$content_height,$m_fullname,1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C'); 
    }

   
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
    $pdf->Cell(100,$content_height,$g_fullname,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C'); 

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(190,$content_height,"Occupation",1,0,'L');

     $pdf->Cell(0,$content_height,'',0,1);

    if($f_living=="DECEASED"){
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(100,$content_height," ",1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C');
    }else{
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$f_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $f_occupation_points=$row5['points'];

        $totalscore=$totalscore+ $f_occupation_points;


      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(70,$content_height,$f_occupation,1,0,'L');
      $pdf->Cell(30,$content_height,$f_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,$f_occupation_points,1,0,'C');
    }
   

    $pdf->Cell(0,$content_height,'',0,1);

    if($m_living=="DECEASED"){
      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(100,$content_height," ",1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C');
    }else{
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$m_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $m_occupation_points=$row5['points'];

        $totalscore=$totalscore+ $m_occupation_points;


      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(70,$content_height,$m_occupation,1,0,'L');
      $pdf->Cell(30,$content_height,$m_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,$m_occupation_points,1,0,'C');
    }

   
    $pdf->Cell(0,$content_height,'',0,1);

  
    if(strlen($g_occupation)>0){
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$g_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $g_occupation_points=$row5['points'];

        $totalscore=$totalscore+ $g_occupation_points;


      $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
      $pdf->Cell(100,$content_height,$g_occupation,1,0,'L');
      $pdf->Cell(25,$content_height,$g_occupation_points,1,0,'C');
    }else{
      $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
      $pdf->Cell(100,$content_height,"",1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C');
    }


 

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(190,$content_height,"Parent Highest Educational Attainment",1,0,'L'); 

    $pdf->Cell(0,$content_height,'',0,1);

    if($f_living=="DECEASED"){
        $f_hea="";
        $f_hea_points=0;
    }else{
        $sql5 = "SELECT * FROM  tbl_legend_hea WHERE legend='$f_hea'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

         $f_hea_points=$row5['points'];

        $totalscore=$totalscore+$f_hea_points;
    }


    $pdf->Cell(65,$content_height,"Father",1,0,'L');
    $pdf->Cell(100,$content_height,$f_hea,1,0,'L');
    $pdf->Cell(25,$content_height,$f_hea_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

      if($m_living=="DECEASED"){
        $m_hea="";
        $m_hea_points=0;
    }else{
        $sql5 = "SELECT * FROM  tbl_legend_hea WHERE legend='$m_hea'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

         $m_hea_points=$row5['points'];

        $totalscore=$totalscore+$m_hea_points;
    }

    $pdf->Cell(65,$content_height,"Mother",1,0,'L');
    $pdf->Cell(100,$content_height,$m_hea,1,0,'L');
    $pdf->Cell(25,$content_height,$m_hea_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(190,$content_height,"Average Monthly Income",1,0,'L'); 

    $pdf->Cell(0,$content_height,'',0,1);


    $pdf->Cell(65,$content_height,"Father",1,0,'L');
    $pdf->Cell(100,$content_height,"PHP. ".$f_ami,1,0,'R');
    $pdf->Cell(25,$content_height,"-",1,0,'C');
   

    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Mother",1,0,'L');
    $pdf->Cell(100,$content_height,"PHP. ".$m_ami,1,0,'R');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    $total_ami = 0;

    

    if(strpos($f_ami, ",") == true){
        $f_ami = str_replace(",","",$f_ami);
    }
    if(strpos($m_ami, ",") == true){
        $m_ami = str_replace(",","",$m_ami);
    }

    if(strpos($g_ami, ",") == true){
        $g_ami = str_replace(",","",$g_ami);
    }


    if(strlen($g_fullname)>0){
      if($g_ami==""){
        $g_ami=0;
      }
      $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
      $pdf->Cell(100,$content_height,"PHP. ".$g_ami,1,0,'R');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
       $pdf->Cell(0,$content_height,'',0,1);
      $total_ami = (int)$f_ami + (int)$m_ami + (int)$g_ami;
    }else{
       $total_ami = (int)$f_ami + (int)$m_ami;
    }
    

   

      $sql6 = "SELECT * FROM tbl_legend_ami WHERE minimum<='$total_ami' AND maximum>='$total_ami'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $total_ami_points=$row6['points'];

     $totalscore=$totalscore+$total_ami_points;


    $pdf->Cell(65,$content_height,"Total",1,0,'R');
    $pdf->Cell(100,$content_height,"PHP. ".$total_ami,1,0,'R');
    $pdf->Cell(25,$content_height,$total_ami_points,1,0,'C');
  

    $pdf->Cell(0,$content_height,'',0,1);


    $total_member = $row1['total_family_member'];



    

      $sql6 = "SELECT * FROM  tbl_legend_total_family_member WHERE minimum<='$total_member' AND maximum>='$total_member'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $total_member_points=$row6['points'];

     $totalscore=$totalscore+$total_member_points;
    
    $pdf->Cell(65,$content_height,"Total Family Members",1,0,'L');
    $pdf->Cell(100,$content_height,$total_member,1,0,'L');
    $pdf->Cell(25,$content_height,$total_member_points,1,0,'C');
    // New

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$header_height,"ADDITIONAL INFORMATION",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);

        $sql5 = "SELECT * FROM  tbl_legend_parent_ofw WHERE legend='$parent_ofw'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $parent_ofw_points=$row5['points'];

        $totalscore=$totalscore+$parent_ofw_points;


      $pdf->Cell(65,$content_height,"Parent OFW",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_ofw,1,0,'L');
      $pdf->Cell(25,$content_height,$parent_ofw_points,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

       $sql5 = "SELECT * FROM  tbl_legend_member_ofw WHERE legend='$relatives_ofw'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $relatives_ofw_points=$row5['points'];

        $totalscore=$totalscore+ $relatives_ofw_points;


      $pdf->Cell(65,$content_height,"Other Relatives OFW",1,0,'L');
      $pdf->Cell(100,$content_height,$relatives_ofw,1,0,'L');
      $pdf->Cell(25,$content_height,$relatives_ofw_points,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

          $sql5 = "SELECT * FROM  tbl_legend_pwd WHERE legend='$pwd'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $pwd_points=$row5['points'];

        $totalscore=$totalscore+ $pwd_points;

      $pdf->Cell(65,$content_height,"Other Relatives PWD",1,0,'L');
      $pdf->Cell(100,$content_height,$pwd,1,0,'L');
      $pdf->Cell(25,$content_height,$pwd_points,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

        $sql5 = "SELECT * FROM  tbl_legend_parent_single WHERE legend='$single_parent'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $single_parent_points=$row5['points'];

        $totalscore=$totalscore+ $single_parent_points;

      $pdf->Cell(65,$content_height,"Single Parent",1,0,'L');
      $pdf->Cell(100,$content_height,$single_parent,1,0,'L');
      $pdf->Cell(25,$content_height,$single_parent_points,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

       $sql5 = "SELECT * FROM  tbl_legend_parent_separated WHERE legend='$parent_separated'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $parent_separated_points=$row5['points'];

        $totalscore=$totalscore+ $parent_separated_points;

        $pdf->Cell(65,$content_height,"Parent Separated",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_separated,1,0,'L');
      $pdf->Cell(25,$content_height,$parent_separated_points,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

// End new
     $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$header_height,"OTHER SOURCE POINTS",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


    if($_SESSION['studenttype']=="fullscholar"){
     
     $exam_rating = $row1['exam_rating'];
    $sql6 = "SELECT * FROM  tbl_legend_exam WHERE minimum<='$exam_rating' AND maximum>='$exam_rating'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $exam_points=$row6['points'];

     $totalscore=$totalscore+$exam_points;
    
      $pdf->Cell(65,$content_height,"Exam Rating",1,0,'L');
      $pdf->Cell(100,$content_height,$exam_rating,1,0,'L');
      $pdf->Cell(25,$content_height,$exam_points,1,0,'C');
      $pdf->Cell(0,$content_height,"",0,1);
    }else{
      $exam_points=0;
      $totalscore=$totalscore+$exam_points;
    }

    $sql7 = "SELECT * FROM  tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result7 = $conn->query($sql7);
    $row7 = $result7->fetch_assoc();

    $interview_points = $row7['score'];
    $totalscore=$totalscore+$interview_points;
    
    $pdf->Cell(65,$content_height,"Interview Score",1,0,'L');
    $pdf->Cell(100,$content_height," ",1,0,'L');
    $pdf->Cell(25,$content_height,$interview_points,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    
  
      $sql8 = "SELECT AVG(score) as scores FROM  tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
      $result8 = $conn->query($sql8);
      $row8 = $result8->fetch_assoc();

      $committee_points = $row8['scores'];
      $totalscore=$totalscore+$committee_points;

          $sqlb = "SELECT COUNT(*) as num FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $resultb = $conn->query($sqlb);
          $rowb = $resultb->fetch_assoc();
          $numbers=$rowb['num'];
    




    $pdf->Cell(65,$content_height,"Committee Score",1,0,'L');
    $pdf->Cell(100,$content_height,"Out of ".$numbers." committee",1,0,'L');
    $pdf->Cell(25,$content_height,round($committee_points,4),1,0,'C');

     $pdf->Cell(0,$content_height,'',0,1);
    
     $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$content_height,"Total",1,0,'R');
    $pdf->Cell(25,$content_height,$totalscore,1,0,'C');



}

  


$pdf->Output();
?>
