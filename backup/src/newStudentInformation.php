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
$content_font=10;
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
    $applicant_number="";
$lastname ="";
$firstname="";
$middlename ="";
$birthday ="";
$birthplace ="";
$birthorder ="";
$civil ="";
$gender ="";
$citizen ="";
$religion ="";
$housenumber ="";
$street ="";
$barangay ="";
$years_residency ="";
$studenttype ="";

$contactnumber ="";
$course ="";
$years ="";

$school ="";
$schooltype ="";
$school_address ="";
$last_school_attended ="";
$last_school_address ="";
$gwa ="";
$exam_rating ="";

$living_with_family ="";
$total_number_family ="";
$source_of_living ="";
$house ="";
$pay_monthly ="";

$image="";

$usertype="";
$typescholar="";
$status="";


$isgraduating = "";
$ishonor = "";
$how_many_term = "";

$name_school_college = "";
$school_type_college = "";
$school_address_college = "";
$year_level_college = "";
$honor_college = "";
$list_honor_college = "";

$name_school_sh = "";
$school_type_sh = "";
$school_address_sh = "";
$year_level_sh = "";
$honor_sh = "";
$list_honor_sh = "";

$name_school_jh = "";
$school_type_jh = "";
$school_address_jh = "";
$year_level_jh = "";
$honor_jh = "";
$list_honor_jh = "";

$name_school_elementary = "";
$school_type_elementary = "";
$school_address_elementary = "";
$year_level_elementary = "";
$honor_elementary = "";
$list_honor_elementary = "";


$f_fullname="";
$f_living="";
$f_address="";
$f_contact_number="";
$f_occupation="";
$f_place_of_work="";
$f_hea="";
$f_ami="";
$f_corresponding="";
$f_company="";
$f_age="";

$m_fullname="";
$m_living="";
$m_address="";
$m_contact_number="";
$m_occupation="";
$m_place_of_work="";
$m_hea="";
$m_ami="";
$m_corresponding="";
$m_company="";
$m_age="";

$hw_fullname="";
$hw_living="";
$hw_address="";
$hw_contact_number="";
$hw_occupation="";
$hw_place_of_work="";
$hw_hea="";
$hw_ami="";


$g_fullname="";
$g_relationship="";
$g_address="";
$g_age="";
$g_occupation="";
$g_contactnumber="";
$g_corresponding="";
$g_ami="";
$stats="";

 $officialname="";
$informed ="";
$working_student ="";
$living_with ="";
$occupation ="";
$hea ="";
$parent_ofw ="";
$relatives_ofw ="";
$pwd ="";
$single_parent ="";
$parent_separated ="";

$sql = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $email = $row['username'];
    $image = $row['image'];
    $stats=$row['status'];
    $application_no=$row['application_no'];
    $academic_year=$row['academic_year'];
    $applicant_number=$row['applicant_number'];
    $studenttype=$row['typescholar'];

    $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      $lastname =$row1['lastname'];
      $firstname=$row1['firstname'];
      $middlename =$row1['middlename'];
      $birthday =$row1['bday'];
      $birthplace =$row1['birthplace'];
      $birthorder =$row1['birthorder'];
      $gender =$row1['gender'];
      $civil =$row1['civil'];
      $citizen =$row1['citizenship'];
      $religion =$row1['religion'];
      $housenumber =$row1['housenumber'];
      $street =$row1['street'];
      $barangay =$row1['barangay'];
      $years_residency =$row1['years_residency'];
      $number_try=$row1['number_try'];

      $contactnumber =$row1['phone'];
      $course =$row1['course'];
      $years =$row1['gradelevel'];

      $school =$row1['school'];
      $schooltype =$row1['schooltype'];
      $school_address =$row1['school_address'];
      $last_school_attended =$row1['last_school'];
      $last_school_address =$row1['last_school_address'];
      $gwa =$row1['gwa'];
      if($gwa==0.00){
        $gwa ="";
      }else{
        $gwa =$row1['gwa'];
      }
      
      $exam_rating =$row1['exam_rating'];

      $living_with_family =$row1['living_with_family'];
      $total_number_family =$row1['total_family_member'];
      $source_of_living =$row1['source_of_living'];
      $house =$row1['type_house'];
      $pay_monthly =$row1['monthly_rent'];
      $count1=1;
    }else{

    }
    $sql5 = "SELECT * FROM tbl_educational_background WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result5 = $conn->query($sql5);
    if ($result5->num_rows > 0){
        $row5 = $result5->fetch_assoc();
        $isgraduating = $row5['isgraduating'];
        $ishonor =  $row5['ishonor'];
        $how_many_term =  $row5['how_many_term'];

        $name_school_college = $row5['name_school_college'];
        $school_type_college = $row5['school_type_college'];
        $school_address_college = $row5['school_address_college'];
        $year_level_college = $row5['year_level_college'];
        $honor_college = $row5['honor_college'];
        $list_honor_college = $row5['list_honor_college'];

        $name_school_sh = $row5['name_school_sh'];
        $school_type_sh = $row5['school_type_sh'];
        $school_address_sh = $row5['school_address_sh'];
        $year_level_sh = $row5['year_level_sh'];
        $honor_sh = $row5['honor_sh'];
        $list_honor_sh = $row5['list_honor_sh'];

        $name_school_jh = $row5['name_school_jh'];
        $school_type_jh = $row5['school_type_jh'];
        $school_address_jh = $row5['school_address_jh'];
        $year_level_jh = $row5['year_level_jh'];
        $honor_jh = $row5['honor_jh'];
        $list_honor_jh = $row5['list_honor_jh'];

        $name_school_elementary = $row5['name_school_elementary'];
        $school_type_elementary = $row5['school_type_elementary'];
        $school_address_elementary = $row5['school_address_elementary'];
        $year_level_elementary = $row5['year_level_elementary'];
        $honor_elementary = $row5['honor_elementary'];
        $list_honor_elementary = $row5['list_honor_elementary'];
         $count2=1;
    }else{

    }

    $sql2 = "SELECT * FROM tbl_fatherinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0){
      $row2 = $result2->fetch_assoc();
        $f_fullname=$row2['fullname'];
        $f_living=$row2['living'];
        $f_address=$row2['address'];
        $f_contact_number=$row2['contact_number'];
        $f_occupation=$row2['occupation'];
        $f_place_of_work=$row2['place_of_work'];
        $f_hea=$row2['hea'];
        $f_ami=$row2['ami'];
        $comma = ",";
        if(strpos($f_ami, ",") == true){
          $f_ami = str_replace($comma,"",$f_ami);
         
        }

       $f_ami = (int)$f_ami;
        $f_corresponding=$row2['corresponding'];
        $f_company=$row2['companyname'];
        $f_age=$row2['age'];
  $count3=1;
    }else{

    }

    $sql7 = "SELECT * FROM tbl_motherinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result7 = $conn->query($sql7);
    if ($result7->num_rows > 0){
      $row7 = $result7->fetch_assoc();
        $m_fullname=$row7['fullname'];
        $m_living=$row7['living'];
        $m_address=$row7['address'];
        $m_contact_number=$row7['contact_number'];
        $m_occupation=$row7['occupation'];
        $m_place_of_work=$row7['place_of_work'];
        $m_hea=$row7['hea'];
        $m_ami=$row7['ami'];

        $comma = ",";
        if(strpos($m_ami, ",") == true){
          $m_ami = str_replace($comma,"",$m_ami);
        }

       $m_ami = (int)$m_ami;
        $m_corresponding=$row7['corresponding'];
         $m_company=$row7['companyname'];
         $m_age=$row7['age'];
         $count3=1;
    }else{

    }

    $sql8 = "SELECT * FROM tbl_husbandwifeinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result8 = $conn->query($sql8);
    if ($result8->num_rows > 0){
      $row8 = $result8->fetch_assoc();
        $hw_fullname=$row8['fullname'];
        $hw_living=$row8['living'];
        $hw_address=$row8['address'];
        $hw_contact_number=$row8['contact_number'];
        $hw_occupation=$row8['occupation'];
        $hw_place_of_work=$row8['place_of_work'];
        $hw_hea=$row8['hea'];
        $hw_ami=$row8['ami'];
  $count3=1;
    }else{

    }

    $sql3 = "SELECT * FROM tbl_guardianinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0){
      $row3 = $result3->fetch_assoc();
        $g_fullname=$row3['fullname'];
        $g_relationship=$row3['relationship'];
        $g_address=$row3['address'];
        $g_age=$row3['age'];
        $g_occupation=$row3['occupation'];
        $g_contactnumber=$row3['contactnumber'];
        $g_ami=$row3['ami'];
         $g_corresponding=$row3['corresponding'];
        $comma = ",";
        if(strpos($g_ami, ",") == true){
          $g_ami = str_replace($comma,"",$g_ami);
         
        }

       $g_ami = (int)$g_ami;
  $count3=1;
    }else{

    }

     $sql9 = "SELECT * FROM tbl_added_info WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result9 = $conn->query($sql9);
    if ($result9->num_rows > 0){
      $row9 = $result9->fetch_assoc();
        $informed =$row9['informed'];
        $working_student =$row9['working_student'];
        $living_with =$row9['living_with'];
        $occupation =$row9['occupation'];
        $hea =$row9['hea'];
        $parent_ofw =$row9['parent_ofw'];
        $relatives_ofw =$row9['relatives_ofw'];
        $pwd =$row9['pwd'];
        $single_parent =$row9['single_parent'];
        $parent_separated =$row9['parent_separated'];
         $student_pwd =$row9['student_pwd'];
  $count4=1;

    }else{

    }

     $sql10 = "SELECT * FROM tbl_informed WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows > 0){
      $row10 = $result10->fetch_assoc();
        $officialname =$row10['officialname'];
  $count4=1;

    }else{

    }

    if($birthday!=""){
      $_SESSION['step1']=1;
    }
   
  }else{
    
  }
    $fullname = $firstname." ".$middlename." ".$lastname;
    $address= $housenumber." ".$street." ".$barangay;

    $pdf->SetTitle($title);

     $pdf->AddPage();
    $profile="profile/".$row['image'];
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,150,10,40);
    // $pdf->Image($profile,150,10,40);
    $pdf->Cell(0,$header_height,'',0,1);
    $pdf->Cell(0,$header_height,'',0,1);

   $pdf->SetFont('Times','',$header_font);
    
    $pdf->Cell(190,$header_height,"PERSONAL INFORMATION",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);

    $pdf->Cell(65,$content_height,"Barangay",1,0,'L');
    $pdf->Cell(125,$content_height,$barangay,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Full Name",1,0,'L');
    $pdf->Cell(125,$content_height,$fullname,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Applicant Number",1,0,'L');
    $pdf->Cell(125,$content_height,$applicant_number,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Email",1,0,'L');
    $pdf->Cell(125,$content_height,$email,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Birthday",1,0,'L');
    $pdf->Cell(125,$content_height,$birthday,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Birth Place",1,0,'L');
    $pdf->Cell(125,$content_height,$birthplace,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Birth Order",1,0,'L');
    $pdf->Cell(125,$content_height,$birthorder,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Civil Status",1,0,'L');
    $pdf->Cell(125,$content_height,$civil,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Gender",1,0,'L');
    $pdf->Cell(125,$content_height,$gender,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Citizenship",1,0,'L');
    $pdf->Cell(125,$content_height,$citizen,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Religion",1,0,'L');
    $pdf->Cell(125,$content_height,$religion,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(125,$content_height,$address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
   
    $pdf->Cell(65,$content_height,"Years of Residency",1,0,'L');
    $pdf->Cell(125,$content_height,$years_residency,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Contact Number",1,0,'L');
    $pdf->Cell(125,$content_height,$contactnumber,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Number of Times Applied",1,0,'L');
    $pdf->Cell(125,$content_height,$number_try,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    if(($scholartype=="fullscholar")||($scholartype=="collegerecipient")){
      $pdf->Cell(65,$content_height,"Course Intended To Take",1,0,'L');
    }else{
      $pdf->Cell(65,$content_height,"Strand/Track Intended To Take",1,0,'L');
    }
    

    
    $pdf->Cell(125,$content_height,$course,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     if(($scholartype=="fullscholar")||($scholartype=="collegerecipient")){
      $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
    }else{
      $pdf->Cell(65,$content_height,"Grade Level",1,0,'L');
    }

    
    $pdf->Cell(125,$content_height,$years,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"School Intended To Enroll",1,0,'L');
    $pdf->Cell(125,$content_height,$school,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"School Type",1,0,'L');
    $pdf->Cell(125,$content_height,$schooltype,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"School Address",1,0,'L');
    $pdf->Cell(125,$content_height,$school_address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Last School Attended",1,0,'L');
    $pdf->Cell(125,$content_height,$last_school_attended,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"School Address",1,0,'L');
    $pdf->Cell(125,$content_height,$last_school_address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"General Weighted Average",1,0,'L');
    $pdf->Cell(125,$content_height,$gwa,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Living With the Family",1,0,'L');
    $pdf->Cell(125,$content_height,$living_with,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Total Number of Family Member",1,0,'L');
    $pdf->Cell(125,$content_height,$total_number_family,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Source of Living",1,0,'L');
    $pdf->Cell(125,$content_height,$source_of_living,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Type of House",1,0,'L');
    $pdf->Cell(125,$content_height,$house,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Monthly Rent",1,0,'L');
    $pdf->Cell(125,$content_height,$pay_monthly,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(190,$header_height,"EDUCATIONAL BACKGROUND",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);

    if(($scholartype=="fullscholar")||($scholartype=="collegerecipient")){
         $pdf->Cell(190,$content_height,"College",1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);

          $pdf->Cell(65,$content_height,"Name of School Attended",1,0,'L');
          $pdf->Cell(125,$content_height,$name_school_college,1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);

          $pdf->Cell(65,$content_height,"School Type",1,0,'L');
          $pdf->Cell(125,$content_height,$school_type_college,1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);

           $pdf->Cell(65,$content_height,"School Address",1,0,'L');
          $pdf->Cell(125,$content_height,$school_address_college,1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);
          
          $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
          $pdf->Cell(125,$content_height,$year_level_college,1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);

          $pdf->Cell(65,$content_height,"Number of Honors/Award",1,0,'L');
          $pdf->Cell(125,$content_height,$honor_college,1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);

          $pdf->Cell(65,$content_height,"List of Honors/Award Received",1,0,'L');
          $pdf->Cell(125,$content_height,$list_honor_college,1,0,'L');
          $pdf->Cell(0,$content_height,'',0,1);
    }

   

   
    $pdf->Cell(190,$content_height,"Senior High",1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Name of School Attended",1,0,'L');
    $pdf->Cell(125,$content_height,$name_school_sh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"School Type",1,0,'L');
    $pdf->Cell(125,$content_height,$school_type_sh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"School Address",1,0,'L');
    $pdf->Cell(125,$content_height,$school_address_sh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
    $pdf->Cell(125,$content_height,$year_level_sh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Number of Honors/Award",1,0,'L');
    $pdf->Cell(125,$content_height,$honor_sh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"List of Honors/Award Received",1,0,'L');
    $pdf->Cell(125,$content_height,$list_honor_sh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

  $pdf->Cell(190,$content_height,"Junior High",1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Name of School Attended",1,0,'L');
    $pdf->Cell(125,$content_height,$name_school_jh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"School Type",1,0,'L');
    $pdf->Cell(125,$content_height,$school_type_jh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"School Address",1,0,'L');
    $pdf->Cell(125,$content_height,$school_address_jh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
    $pdf->Cell(125,$content_height,$year_level_jh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Number of Honors/Award",1,0,'L');
    $pdf->Cell(125,$content_height,$honor_jh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"List of Honors/Award Received",1,0,'L');
    $pdf->Cell(125,$content_height,$list_honor_jh,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(190,$content_height,"Elementary",1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Name of School Attended",1,0,'L');
    $pdf->Cell(125,$content_height,$name_school_elementary,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"School Type",1,0,'L');
    $pdf->Cell(125,$content_height,$school_type_elementary,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"School Address",1,0,'L');
    $pdf->Cell(125,$content_height,$school_address_elementary,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
    $pdf->Cell(125,$content_height,$year_level_elementary,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Number of Honors/Award",1,0,'L');
    $pdf->Cell(125,$content_height,$honor_elementary,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"List of Honors/Award Received",1,0,'L');
    $pdf->Cell(125,$content_height,$list_honor_elementary,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);


     $pdf->Cell(190,$header_height,"FAMILY BACKGROUND",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


    $pdf->Cell(65,$content_height,"Father's Full Name",1,0,'L');
    $pdf->Cell(125,$content_height,$f_fullname,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Choose Living or Deceased",1,0,'L');
    $pdf->Cell(125,$content_height,$f_living,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(125,$content_height,$f_address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Age",1,0,'L');
    $pdf->Cell(125,$content_height,$f_age,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Contact Number",1,0,'L');
    $pdf->Cell(125,$content_height,$f_contact_number,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Occupation",1,0,'L');
    $pdf->Cell(125,$content_height,$f_occupation,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Company Name",1,0,'L');
    $pdf->Cell(125,$content_height,$f_company,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Place of Work",1,0,'L');
    $pdf->Cell(125,$content_height,$f_place_of_work,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
   

    $pdf->Cell(65,$content_height,"Highest Educational Attainment",1,0,'L');
    $pdf->Cell(125,$content_height,$f_hea,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Average Monthly Income",1,0,'L');
    $pdf->Cell(125,$content_height,$f_ami,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);




    $pdf->Cell(65,$content_height,"Mother's Full Name",1,0,'L');
    $pdf->Cell(125,$content_height,$m_fullname,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Choose Living or Deceased",1,0,'L');
    $pdf->Cell(125,$content_height,$m_living,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(125,$content_height,$m_address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Age",1,0,'L');
    $pdf->Cell(125,$content_height,$m_age,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Contact Number",1,0,'L');
    $pdf->Cell(125,$content_height,$m_contact_number,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Occupation",1,0,'L');
    $pdf->Cell(125,$content_height,$m_occupation,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Company Name",1,0,'L');
    $pdf->Cell(125,$content_height,$m_company,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Place of Work",1,0,'L');
    $pdf->Cell(125,$content_height,$m_place_of_work,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
   

    $pdf->Cell(65,$content_height,"Highest Educational Attainment",1,0,'L');
    $pdf->Cell(125,$content_height,$m_hea,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Average Monthly Income",1,0,'L');
    $pdf->Cell(125,$content_height,$m_ami,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);


    if(strlen($hw_fullname)<=0){

    }else{
    $pdf->Cell(65,$content_height,"Spouse's Full Name",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_fullname,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Choose Living or Deceased",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_living,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    
    $pdf->Cell(65,$content_height,"Contact Number",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_contact_number,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Occupation",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_occupation,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Highest Educational Attainment",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_hea,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Average Monthly Income",1,0,'L');
    $pdf->Cell(125,$content_height,$hw_ami,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    }
   if(strlen($g_fullname)>0){
     $pdf->Cell(65,$content_height,"Guardian's Full Name",1,0,'L');
      $pdf->Cell(125,$content_height,$g_fullname,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Relationship",1,0,'L');
    $pdf->Cell(125,$content_height,$g_relationship,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(125,$content_height,$g_address,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Age",1,0,'L');
    $pdf->Cell(125,$content_height,$g_age,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Occupation",1,0,'L');
    $pdf->Cell(125,$content_height,$g_occupation,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Average Monthly Income",1,0,'L');
    $pdf->Cell(125,$content_height,$g_ami,1,0,'L');
    $pdf->Cell(0,$content_height,'',0,1);
   }
   
    $sqla = "SELECT * FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $resulta = $conn->query($sqla);
          if ($resulta->num_rows > 0){
                    $pdf->Cell(190,$header_height,"SIBLINGS INFORMATIONS",1,0,'C');
           $pdf->Cell(0,$header_height,'',0,1);

        $pdf->SetFont('Times','',$content_font);
          
            while($rowa = $resulta->fetch_assoc()){

                $pdf->Cell(65,$content_height,"Name",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['fullname'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                $pdf->Cell(65,$content_height,"Highest Educational Attainment",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['hea'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                 $pdf->Cell(65,$content_height,"Age",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['age'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                 $pdf->Cell(65,$content_height,"Civil Status",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['civil'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                 $pdf->Cell(65,$content_height,"Grant Enjoyed",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['typegrant'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                 $pdf->Cell(65,$content_height,"Occupation",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['occupation'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                 $pdf->Cell(65,$content_height,"Monthly Salary",1,0,'L');
                $pdf->Cell(125,$content_height,$rowa['monthly_salary'],1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);
              
            }
        }

      $pdf->Cell(190,$header_height,"ADDITIONAL INFORMATIONS",1,0,'C');
      $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);  

                $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
                $pdf->Cell(125,$content_height,$informed,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1); 

                $pdf->Cell(65,$content_height,"Name of Officials who informed.",1,0,'L');
                $pdf->Cell(125,$content_height,$officialname,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                 $pdf->Cell(65,$content_height,"Working Student?.",1,0,'L');
                $pdf->Cell(125,$content_height,$working_student,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                  $pdf->Cell(65,$content_height,"Parents OFW?.",1,0,'L');
                $pdf->Cell(125,$content_height,$parent_ofw,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                  $pdf->Cell(65,$content_height,"Other Family Member/s OFW?.",1,0,'L');
                $pdf->Cell(125,$content_height,$relatives_ofw,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                  $pdf->Cell(65,$content_height,"Parents/Other Family Member PWD?.",1,0,'L');
                $pdf->Cell(125,$content_height,$pwd,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                  $pdf->Cell(65,$content_height,"Single Parent?.",1,0,'L');
                $pdf->Cell(125,$content_height,$single_parent,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                  $pdf->Cell(65,$content_height,"Parents Separated?.",1,0,'L');
                $pdf->Cell(125,$content_height,$parent_separated,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

                  $pdf->Cell(65,$content_height,"Student PWD?.",1,0,'L');
                $pdf->Cell(125,$content_height,$student_pwd,1,0,'L');
                $pdf->Cell(0,$content_height,'',0,1);

$pdf->Output();
?>
