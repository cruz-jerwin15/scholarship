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
  $scholartype="shsholar";
}
//                         
    

    $sql = "SELECT * FROM tbl_score";
    $result = $conn->query($sql);
                          
    while($row = $result->fetch_assoc()){
      $academic_year = $row['academic_year'];
      $application_no = $row['application_no'];
          $points_application= $row['application'];
          $points_informed= $row['informed'];
          $points_times_apply= $row['times_apply'];
          $points_residency= $row['residency'];
          $points_bithorder= $row['bithorder'];
          $points_age= $row['age'];
          $points_civil_status= $row['civil_status'];
          $points_gwa= $row['gwa'];
          $points_exam_rating= $row['exam_rating'];
          $points_working_student= $row['working_student'];
          $points_with_honors= $row['with_honors'];
          $points_living_with= $row['living_with'];
          $points_house= $row['house'];
          $points_school= $row['school'];
          $points_college_school= $row['college_school'];
          $points_sh_school= $row['sh_school'];
          $points_jh_school= $row['jh_school'];
          $points_elementary_school= $row['elementary_school'];
          $points_awards= $row['awards'];
          $points_occupation= $row['occupation'];
          $points_occupation_mother= $row['occupation_mother'];
          $points_hea_father= $row['hea_father'];
          $points_hea_mother= $row['hea_mother'];
          $points_ami= $row['ami'];
          $points_family_member= $row['family_member'];
          $points_parent_ofw= $row['parent_ofw'];
          $points_relatives_ofw= $row['relatives_ofw'];
          $points_pwd= $row['pwd'];
          $points_deceased= $row['deceased'];
          $points_deceased_mother= $row['deceased_mother'];
          $points_single_parent= $row['single_parent'];
          $points_parent_separated= $row['parent_separated'];
          $points_interview= $row['interview'];
          $points_committee= $row['committee'];
          $points_total_points= $row['total_points'];





  
        $sql1 = "SELECT * FROM tbl_admin 
                 WHERE academic_year='$academic_year' AND
                        application_no='$application_no' AND 
                        status='$status' AND 
                        typescholar='$scholartype'";
        $result1 = $conn->query($sql1); 
    if ($result1->num_rows > 0){
        $row1 = $result1->fetch_assoc();          
    $applicant_number= $row1['applicant_number'];
    $pdf->SetTitle($title);

    $pdf->AddPage();
    $profile="profile/".$row1['image'];
    $pdf->SetFont('Times','',$header_font);
    $pdf->Image($profile,150,10,40);
    $pdf->Cell(0,$header_height,'',0,1);
    $pdf->Cell(0,$header_height,'',0,1);

   $pdf->SetFont('Times','',$header_font);
    
    $pdf->Cell(165,$header_height,"PERSONAL INFORMATION",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);

    $sql2 = "SELECT * FROM tbl_studentinfo 
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();



    $birthday=$row2['bday'];
    $today = date("Y-m-d");
    $diff =  date_diff(date_create($birthday),date_create($today));
    $age = $diff->format('%y');


    $fullname=$row2['firstname']." ".$row2['middlename']." ".$row2['lastname'];
    $address = $row2['housenumber']." ".$row2['street']." ".$row2['barangay'];
    // $applicant_number=$application_no;
    $years_residency = $row2['years_residency'];
    $number_try=$row2['number_try'];
    $age = $diff->format('%y');
    $birthorder=$row2['birthorder'];
    $civil = $row2['civil'];
    $gwa = $row2['gwa'];
    $house = $row2['type_house'];
    $school_intended=$row2['school'];
    $school_type_intended=$row2['schooltype'];
    $course_intended=$row2['course'];
    $grade_level_intended=$row2['gradelevel'];
    $exam_rating = $row2['exam_rating'];
    $total_family = $row2['total_family_member'];

    $sql3 = "SELECT * FROM tbl_added_info 
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();
    $informed=$row3['informed'];
    $working_student=$row3['working_student'];
    $living_with=$row3['living_with'];
    $occupation=$row3['occupation'];
    $hea=$row3['hea'];
    $parent_ofw=$row3['parent_ofw'];
    $relatives_ofw=$row3['relatives_ofw'];
    $pwd=$row3['pwd'];
    $single_parent=$row3['single_parent'];
    $parent_separated=$row3['parent_separated'];

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

    $total_ami=$f_ami+$m_ami;

    $sql7 = "SELECT * FROM tbl_guardianinfo
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result7 = $conn->query($sql7);
    $row7 = $result7->fetch_assoc();

    $g_fullname=$row7['fullname'];
    $g_occupation=$row7['occupation'];
   

    $pdf->Cell(65,$content_height,"Full Name",1,0,'L');
    $pdf->Cell(100,$content_height,$fullname,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Address",1,0,'L');
    $pdf->Cell(100,$content_height,$address,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Applicant No.",1,0,'L');
    $pdf->Cell(100,$content_height,$applicant_number,1,0,'L');
    $pdf->Cell(25,$content_height,$points_application,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
    $pdf->Cell(100,$content_height,$informed,1,0,'L');
    $pdf->Cell(25,$content_height,$points_informed,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Years of Residency",1,0,'L');
    $pdf->Cell(100,$content_height,$years_residency." year/s",1,0,'L');
    $pdf->Cell(25,$content_height,$points_residency,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $full="";
    $recip="";
    $shs="";
    $numbs=0;

    $sql5 = "SELECT * FROM tbl_old
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();
    if ($result5->num_rows > 0){
       
        if($row5['scholarship']=="fullscholar"){
            $full="YES";
            $numbs=1;
            $newapp="NO";
        }else{
            $full="NO";
        }
        if($row5['scholarship']=="collegerecipient"){
            $recip="YES";
            $newapp="NO";
            $numbs=1;
        }else{
            $recip="NO";
        }
        if($row5['scholarship']=="shscholar"){
            $shs="YES";
            $newapp="NO";
            $numbs=1;
        }else{
            $shs="NO";
        }
    }else{
      $newapp="YES";
       $full="NO";
       $recip="NO";
       $shs="NO";
    }
   
    $pdf->Cell(65,$content_height,"New Applicant",1,0,'L');
    $pdf->Cell(100,$content_height,$newapp,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Former Recipient",1,0,'L');
    $pdf->Cell(100,$content_height,$recip,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Former Scholar",1,0,'L');
    $pdf->Cell(100,$content_height,$full,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Number of Times Applied for Scholarship",1,0,'L');
    $pdf->Cell(100,$content_height,"$number_try",1,0,'L');
    $pdf->Cell(25,$content_height,$points_times_apply,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Age",1,0,'L');
    $pdf->Cell(100,$content_height,$age." years old",1,0,'L');
    $pdf->Cell(25,$content_height,$points_age,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Birth Order",1,0,'L');
    $pdf->Cell(100,$content_height,$birthorder,1,0,'L');
    $pdf->Cell(25,$content_height,$points_bithorder,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Civil Status",1,0,'L');
    $pdf->Cell(100,$content_height,$civil,1,0,'L');
    $pdf->Cell(25,$content_height,$points_civil_status,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"General Weighted Average",1,0,'L');
    $pdf->Cell(100,$content_height,$gwa,1,0,'L');
    $pdf->Cell(25,$content_height,$points_gwa,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Living with:",1,0,'L');
    $pdf->Cell(100,$content_height,$living_with,1,0,'L');
    $pdf->Cell(25,$content_height,$points_living_with,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"House",1,0,'L');
    $pdf->Cell(100,$content_height,$house,1,0,'L');
    $pdf->Cell(25,$content_height,$points_house,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Working Student",1,0,'L');
    $pdf->Cell(100,$content_height,$working_student,1,0,'L');
    $pdf->Cell(25,$content_height,$points_working_student,1,0,'C');

     $pdf->Cell(0,$content_height,'',0,1);
                      
     $pdf->SetFont('Times','',$header_font);                 
    $pdf->Cell(165,$header_height,"EDUCATIONAL BACKGROUND",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);
    $pdf->Cell(190,$content_height,"School",1,0,'L');
    
    $pdf->Cell(0,$content_height,'',0,1);
   
    $pdf->Cell(65,$content_height,"Elementary",1,0,'L');
    $pdf->Cell(70,$content_height,$name_school_elementary,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_elementary,1,0,'L');
    $pdf->Cell(25,$content_height,$points_elementary_school,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Junior High School",1,0,'L');
    $pdf->Cell(70,$content_height,$name_school_jh,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_jh,1,0,'L');
    $pdf->Cell(25,$content_height,$points_jh_school,1,0,'C'); 

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Senior High School",1,0,'L');
   $pdf->Cell(70,$content_height,$name_school_sh,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_sh,1,0,'L');
    $pdf->Cell(25,$content_height,$points_sh_school,1,0,'C'); 

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"College",1,0,'L');
     $pdf->Cell(70,$content_height,$name_school_college,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_college,1,0,'L');
    $pdf->Cell(25,$content_height,$points_college_school,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);



    $pdf->Cell(65,$content_height,"School Intended to Enroll",1,0,'L');
    $pdf->Cell(70,$content_height,$school_intended,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_intended,1,0,'L');
    $pdf->Cell(25,$content_height,$points_school,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Year",1,0,'L');
    $pdf->Cell(100,$content_height,$grade_level_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Course",1,0,'L');
    $pdf->Cell(100,$content_height,$course_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

     $pdf->Cell(65,$content_height,"Number of Honors/Awards Received",1,0,'L');
    $pdf->Cell(100,$content_height,$number_award,1,0,'L');
    $pdf->Cell(25,$content_height,$points_awards,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    // $pdf->Cell(0,$content_height,'',0,1);
    
    // $pdf->Cell(65,$content_height,"Graduate/Graduating with Honors",1,0,'L');
    // $pdf->Cell(100,$content_height,$ishonor,1,0,'L');
    // $pdf->Cell(25,$content_height,$points_with_honors,1,0,'C');

    // $pdf->Cell(0,$content_height,'',0,1);

    // $pdf->Cell(65,$content_height,"Number of Honors/Awards Received",1,0,'L');
    // $pdf->Cell(100,$content_height,$number_award,1,0,'L');
    // $pdf->Cell(25,$content_height,$points_awards,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$header_height,"FAMILY BACKGROUND",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


    if($f_living=="DECEASED"){
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(70,$content_height,$f_fullname,1,0,'L');
      $pdf->Cell(30,$content_height,$f_living,1,0,'L');
      $pdf->Cell(25,$content_height,$points_deceased,1,0,'C'); 
    }else{
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(100,$content_height,$f_fullname,1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C'); 
    }

  
     $pdf->Cell(0,$content_height,'',0,1);

    if($m_living=="DECEASED"){
      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(70,$content_height,$m_fullname,1,0,'L');
      $pdf->Cell(30,$content_height,$m_living,1,0,'L');
      $pdf->Cell(25,$content_height,$points_deceased_mother,1,0,'C'); 
    }else{
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
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
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(70,$content_height,$f_occupation,1,0,'L');
      $pdf->Cell(30,$content_height,$f_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,$points_occupation,1,0,'C');
    }
   

    $pdf->Cell(0,$content_height,'',0,1);

    if($m_living=="DECEASED"){
      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(100,$content_height," ",1,0,'L');
      $pdf->Cell(25,$content_height,"0",1,0,'C');
    }else{
      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(70,$content_height,$m_occupation,1,0,'L');
      $pdf->Cell(30,$content_height,$m_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,$points_occupation_mother,1,0,'C');
    }

   
    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
    $pdf->Cell(100,$content_height,$g_occupation,1,0,'L');
    $pdf->Cell(25,$content_height,"0",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(190,$content_height,"Parent Highest Educational Attainment",1,0,'L'); 

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Father",1,0,'L');
    $pdf->Cell(100,$content_height,$f_hea,1,0,'L');
    $pdf->Cell(25,$content_height,$points_hea_father,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Mother",1,0,'L');
    $pdf->Cell(100,$content_height,$m_hea,1,0,'L');
    $pdf->Cell(25,$content_height,$points_hea_mother,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(190,$content_height,"Average Monthly Income",1,0,'L'); 

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Father",1,0,'L');
    $pdf->Cell(100,$content_height,"PHP.".$f_ami,1,0,'R');
    $pdf->Cell(25,$content_height,"",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Mother",1,0,'L');
    $pdf->Cell(100,$content_height,"PHP.".$m_ami,1,0,'R');
    $pdf->Cell(25,$content_height,"",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(65,$content_height,"Total",1,0,'R');
    $pdf->Cell(100,$content_height,"PHP.".$total_ami,1,0,'R');
    $pdf->Cell(25,$content_height,$points_ami,1,0,'C');
    // $pdf->Cell(65,$content_height,"Siblings",1,0,'L');
    // $pdf->Cell(100,$content_height," ",1,0,'L');
    // $pdf->Cell(25,$content_height,"",1,0,'C');

    // $pdf->Cell(0,$content_height,'',0,1);
    
    // $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
    // $pdf->Cell(100,$content_height," ",1,0,'L');
    // $pdf->Cell(25,$content_height,"",1,0,'C');

    //  $pdf->Cell(0,$content_height,'',0,1);
    
    // $pdf->Cell(65,$content_height,"Total",1,0,'R');
    // $pdf->Cell(100,$content_height," ",1,0,'L');
    // $pdf->Cell(25,$content_height,"0",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Total Family Members",1,0,'L');
    $pdf->Cell(100,$content_height,$total_family,1,0,'L');
    $pdf->Cell(25,$content_height,$points_family_member,1,0,'C');
    // New

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$header_height,"ADDITIONAL INFORMATION",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


      $pdf->Cell(65,$content_height,"Parent OFW",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_ofw,1,0,'L');
      $pdf->Cell(25,$content_height,$points_parent_ofw,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

      $pdf->Cell(65,$content_height,"Relative OFW",1,0,'L');
      $pdf->Cell(100,$content_height,$relatives_ofw,1,0,'L');
      $pdf->Cell(25,$content_height,$points_relatives_ofw,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

      $pdf->Cell(65,$content_height,"Parent/Siblings/Relative PWD",1,0,'L');
      $pdf->Cell(100,$content_height,$pwd,1,0,'L');
      $pdf->Cell(25,$content_height,$points_pwd,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

      $pdf->Cell(65,$content_height,"Single Parent",1,0,'L');
      $pdf->Cell(100,$content_height,$single_parent,1,0,'L');
      $pdf->Cell(25,$content_height,$points_single_parent,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

        $pdf->Cell(65,$content_height,"Parent Separated",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_separated,1,0,'L');
      $pdf->Cell(25,$content_height,$points_parent_separated,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

// End new
     $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$header_height,"OTHER SOURCE POINTS",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


    if($_SESSION['studenttype']=="fullscholar"){
     
    
      $pdf->Cell(65,$content_height,"Exam Rating",1,0,'L');
      $pdf->Cell(100,$content_height,$exam_rating,1,0,'L');
      $pdf->Cell(25,$content_height,$points_exam_rating,1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);
    }

    
    
    $pdf->Cell(65,$content_height,"Interview Score",1,0,'L');
    $pdf->Cell(100,$content_height," ",1,0,'L');
    $pdf->Cell(25,$content_height,$points_interview,1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
    
    $pdf->Cell(65,$content_height,"Committee Score",1,0,'L');
    $pdf->Cell(100,$content_height," ",1,0,'L');
    $pdf->Cell(25,$content_height,$points_committee,1,0,'C');

     $pdf->Cell(0,$content_height,'',0,1);
    
     $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$content_height,"Total",1,0,'R');
    $pdf->Cell(25,$content_height,$points_total_points,1,0,'C');
  }
}

    // }
// }

$pdf->Output();
?>
