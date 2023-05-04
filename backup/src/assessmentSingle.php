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
    $this->Ln(-5);
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
      $userid = $row['id'];
      $user_ids = $row['id'];

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
    $pdf->Image($profile,150,10,40);
    // $pdf->Image($profile,150,10,40);
    $pdf->Cell(0,$header_height,'',0,1);
    $pdf->Cell(0,35,'',0,1);

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

     if($scholartype=="fullscholar"){
          $gwa = $row1['gwa'];
            $pdf->Cell(65,$content_height,"General Weighted Average",1,0,'L');
            $pdf->Cell(100,$content_height,$gwa,1,0,'L');


           $sql6 = "SELECT * FROM tbl_grade_indicator WHERE min<='$gwa' AND max>='$gwa'";
            $result6 = $conn->query($sql6);
            $row6 = $result6->fetch_assoc();

            $gwa_points=$row6['points'];

            $pdf->Cell(25,$content_height,number_format($gwa_points,2),1,0,'C');

            $totalscore=$totalscore+$gwa_points;




            $pdf->Cell(0,$content_height,'',0,1);
    }else{
          $gwa = $row1['gwa'];
            $pdf->Cell(65,$content_height,"General Weighted Average",1,0,'L');
            $pdf->Cell(100,$content_height,$gwa,1,0,'L');


           $sql6 = "SELECT * FROM tbl_grade_indicator_a WHERE min<='$gwa' AND max>='$gwa'";
            $result6 = $conn->query($sql6);
            $row6 = $result6->fetch_assoc();

            $gwa_points=$row6['points'];

            $pdf->Cell(25,$content_height,number_format($gwa_points,2),1,0,'C');

            $totalscore=$totalscore+$gwa_points;




            $pdf->Cell(0,$content_height,'',0,1);
    }
     $applicant_number = $row['applicant_number'];
    $sql2 = "SELECT * FROM tbl_legend_applicant WHERE minimum<='$applicant_number' AND maximum>='$applicant_number'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    $applicant_number_points=$row2['points'];

    

    // $applicant_number_points=10;



    $pdf->Cell(65,$content_height,"Applicant No.",1,0,'L');
    $pdf->Cell(100,$content_height,$applicant_number,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql3 = "SELECT * FROM tbl_added_info WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();

    $informed = $row3['informed'];
    $working_student = $row3['working_student'];
    $self_support = $row3['self_supporting'];
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

    if(($informed=="Mayor")||($informed=="Vice Mayor")||($informed=="City Councilor")){
      $labels="informed thru/recommended";
      if($scholartype=="fullscholar"){
         $sql4 = "SELECT * FROM tbl_other_indicator WHERE label='$labels'";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_assoc();
      }else{
         $sql4 = "SELECT * FROM tbl_other_indicator_a WHERE label='$labels'";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_assoc();
      }

      $informed_points=$row4['points'];

    }else{
      $informed_points=0;
    }

    $totalscore=$totalscore+$informed_points;
    $sqla = "SELECT * FROM tbl_informed WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resulta = $conn->query($sqla);
        $rowa = $resulta->fetch_assoc();
    if ($resulta->num_rows > 0){
      if(strlen($rowa['officialname'])>0){
        $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
        $pdf->Cell(100,$content_height,$informed." / ".$rowa['officialname'],1,0,'L');
        $pdf->Cell(25,$content_height,number_format($informed_points,2),1,0,'C');
      }else{
        $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
        $pdf->Cell(100,$content_height,$informed,1,0,'L');
        $pdf->Cell(25,$content_height,number_format($informed_points,2),1,0,'C');
      }

    }else{
      $pdf->Cell(65,$content_height,"Informed Thru",1,0,'L');
      $pdf->Cell(100,$content_height,$informed,1,0,'L');
      $pdf->Cell(25,$content_height,number_format($informed_points,2),1,0,'C');
    }
      $pdf->Cell(0,$content_height,'',0,1);

      if($scholartype=="fullscholar"){
        $sql6 = "SELECT * FROM tbl_residency_indicator WHERE min<='$years_residency' AND max>='$years_residency'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();
      }else{
        $sql6 = "SELECT * FROM tbl_residency_indicator_a WHERE min<='$years_residency' AND max>='$years_residency'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();
      }



    $years_residency_points=$row6['points'];

    $totalscore=$totalscore+$years_residency_points;

    $pdf->Cell(65,$content_height,"Years of Residency",1,0,'L');
    $pdf->Cell(100,$content_height,$years_residency." year/s",1,0,'L');
    $pdf->Cell(25,$content_height,number_format($years_residency_points,2),1,0,'C');

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


    $pdf->Cell(65,$content_height,"New Applicant",1,0,'L');
    $pdf->Cell(100,$content_height,$try,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);
      $fullscholar="NO";
        $collegerecipient="NO";
        $shscholar="NO";
    $process="SCHOLAR";
    $process1="GRADUATED";
    $process2="SCHOLARS ASSESSMENT";
        $sql11 = "SELECT * FROM tbl_remarks WHERE user_id='$user_ids' AND (process='$process' OR process='$process1' OR process='$process2') ";
        $result11 = $conn->query($sql11);


        if ($result11->num_rows <= 0){

            $fullscholar ="NO";
            $collegerecipient ="NO";
            $shscholar ="NO";

        }else{
      $row11 = $result11->fetch_assoc();
      if($row11['scholars']=="fullscholar"){
          $fullscholar="YES";
      }
      if($row11['scholars']=="collegerecipient"){
          $collegerecipient="YES";
      }
      if($row11['scholars']=="shscholar"){
          $shscholar="YES";
      }


        }

    if(($scholartype=="fullscholar")||($scholartype=="collegerecipient")){


        $pdf->Cell(65,$content_height,"Former Scholar",1,0,'L');
        $pdf->Cell(100,$content_height,$fullscholar,1,0,'L');
        $pdf->Cell(25,$content_height,"-",1,0,'C');

        $pdf->Cell(0,$content_height,'',0,1);

        $pdf->Cell(65,$content_height,"Former College Recipient",1,0,'L');
        $pdf->Cell(100,$content_height,$collegerecipient,1,0,'L');
        $pdf->Cell(25,$content_height,"-",1,0,'C');

        $pdf->Cell(0,$content_height,'',0,1);

        $pdf->Cell(65,$content_height,"Former Senior High Recipient",1,0,'L');
        $pdf->Cell(100,$content_height,$shscholar,1,0,'L');
        $pdf->Cell(25,$content_height,"-",1,0,'C');

        $pdf->Cell(0,$content_height,'',0,1);
    }else{
        $pdf->Cell(65,$content_height,"Former Senior High Recipient",1,0,'L');
        $pdf->Cell(100,$content_height,$shscholar,1,0,'L');
        $pdf->Cell(25,$content_height,"-",1,0,'C');

        $pdf->Cell(0,$content_height,'',0,1);
    }


    $pdf->Cell(65,$content_height,"Number of Times Applied for Scholarship",1,0,'L');
    $pdf->Cell(100,$content_height,$number_try,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $today = date("Y-m-d");
    $diff =  date_diff(date_create($birthday),date_create($today));
    $age = $diff->format('%y');

    if($age>=23){
      $labels="age 23 above";
      if($scholartype=="fullscholar"){
         $sql6 = "SELECT * FROM tbl_other_indicator WHERE label='$labels'";
      $result6 = $conn->query($sql6);
      $row6 = $result6->fetch_assoc();
      }else{
         $sql6 = "SELECT * FROM tbl_other_indicator_a WHERE label='$labels'";
      $result6 = $conn->query($sql6);
      $row6 = $result6->fetch_assoc();
      }


      $age_points=$row6['points'];
    }else{

      $age_points=0;
    }

    if($informed_points==0){
      $totalscore=$totalscore+$age_points;
    }


    $pdf->Cell(65,$content_height,"Age",1,0,'L');
    $pdf->Cell(100,$content_height,$age." years old",1,0,'L');
    $pdf->Cell(25,$content_height,number_format($age_points,2),1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);


    $sql5 = "SELECT * FROM tbl_legend_birth_order WHERE legend='$birthorder'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $birthorder_points=$row5['points'];



    $pdf->Cell(65,$content_height,"Birth Order",1,0,'L');
    $pdf->Cell(100,$content_height,$birthorder,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

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



    $pdf->Cell(65,$content_height,"Civil Status",1,0,'L');
    $pdf->Cell(100,$content_height,$civil_status,1,0,'L');
    $pdf->Cell(25,$content_height,"",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

       $sql5 = "SELECT * FROM tbl_legend_living_with WHERE legend='$living_with'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $living_with_points=$row5['points'];


    $pdf->Cell(65,$content_height,"Living with :",1,0,'L');
    $pdf->Cell(100,$content_height,$living_with,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);


    $typehouse = $row1['type_house'];

    $sql5 = "SELECT * FROM tbl_legend_house WHERE legend='$typehouse'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $typehouse_points=$row5['points'];



    $pdf->Cell(65,$content_height,"House",1,0,'L');
    $pdf->Cell(100,$content_height,$typehouse,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if($working_student=="YES"){
      $labels="working student";
      if($scholartype=="fullscholar"){
         $sql5 = "SELECT * FROM tbl_other_indicator WHERE label='$labels'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
      }else{
         $sql5 = "SELECT * FROM tbl_other_indicator_a WHERE label='$labels'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
      }


      $working_student_points=$row5['points'];
    }else{
      $working_student_points=0;
    }

    if($informed_points==0){
      $totalscore=$totalscore+$working_student_points;
    }


    $pdf->Cell(65,$content_height,"Working Student",1,0,'L');
    $pdf->Cell(100,$content_height,$working_student,1,0,'L');
    $pdf->Cell(25,$content_height,number_format($working_student_points,2),1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if($self_support=="YES"){
      $labels="Self-Supporting";
     if($scholartype=="fullscholar"){
         $sql5 = "SELECT * FROM tbl_other_indicator WHERE label='$labels'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
      }else{
         $sql5 = "SELECT * FROM tbl_other_indicator_a WHERE label='$labels'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
      }

      $self_support_points=$row5['points'];
    }else{
      $self_support_points=0;
    }

    if($informed_points==0){
      $totalscore=$totalscore+$self_support_points;
    }


    $pdf->Cell(65,$content_height,"Self-Supporting",1,0,'L');
    $pdf->Cell(100,$content_height,$self_support,1,0,'L');
    $pdf->Cell(25,$content_height,number_format($self_support_points,2),1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if($student_pwd=="YES"){
       $labels="applicant pwd";
     if($scholartype=="fullscholar"){
         $sql5 = "SELECT * FROM tbl_other_indicator WHERE label='$labels'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
      }else{
         $sql5 = "SELECT * FROM tbl_other_indicator_a WHERE label='$labels'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
      }

    $pwd_student_points=$row5['points'];
    }else{
      $pwd_student_points=0;
    }


    if($informed_points==0){
      $totalscore=$totalscore+$pwd_student_points;
    }



    $pdf->Cell(65,$content_height,"Student PWD",1,0,'L');
    $pdf->Cell(100,$content_height,$student_pwd,1,0,'L');
    $pdf->Cell(25,$content_height,number_format($pwd_student_points,2),1,0,'C');

     $pdf->Cell(0,$content_height,'',0,1);



    $school_intended=$row1['school'];
    $school_type_intended=$row1['schooltype'];
    $course_intended=$row1['course'];
    $grade_level_intended=$row1['gradelevel'];




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



    $pdf->Cell(65,$content_height,"Elementary",1,0,'L');
    $pdf->Cell(70,$content_height,$name_school_elementary,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_elementary,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);



    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_jh'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_jh_points=$row5['points'];



    $pdf->Cell(65,$content_height,"Junior High School",1,0,'L');
    $pdf->Cell(70,$content_height,$name_school_jh,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_jh,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);



    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_sh'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_sh_points=$row5['points'];



    $pdf->Cell(65,$content_height,"Senior High School",1,0,'L');
   $pdf->Cell(70,$content_height,$name_school_sh,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_sh,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);



    $pdf->Cell(65,$content_height,"College",1,0,'L');
     $pdf->Cell(70,$content_height,$name_school_college,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_college,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_intended'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_intended_points=$row5['points'];




    $pdf->Cell(65,$content_height,"School Intended to Enroll",1,0,'L');
    $pdf->Cell(70,$content_height,$school_intended,1,0,'L');
    $pdf->Cell(30,$content_height,$school_type_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if($_SESSION['studenttype']=="fullscholar"){
     $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
    }else if($_SESSION['studenttype']=="collegerecipient"){
      $pdf->Cell(65,$content_height,"Year Level",1,0,'L');
    }else{
      $pdf->Cell(65,$content_height,"Grade Level",1,0,'L');
    }

    $pdf->Cell(100,$content_height,$grade_level_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if($_SESSION['studenttype']=="fullscholar"){
      $pdf->Cell(65,$content_height,"Course",1,0,'L');
    }else if($_SESSION['studenttype']=="collegerecipient"){
       $pdf->Cell(65,$content_height,"Course",1,0,'L');
    }else{
       $pdf->Cell(65,$content_height,"Strand",1,0,'L');
    }



    $pdf->Cell(100,$content_height,$course_intended,1,0,'L');
    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

     $sql5 = "SELECT * FROM tbl_legend_graduating_honors WHERE legend='$ishonor'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $ishonor_points=$row5['points'];



    $pdf->Cell(65,$content_height,"Graduate/Graduating with Honors",1,0,'L');
    $pdf->Cell(100,$content_height,$ishonor,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

     $sql6 = "SELECT * FROM tbl_legend_award WHERE minimum<='$number_award' AND maximum>='$number_award'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $award_points=$row6['points'];



    $pdf->Cell(65,$content_height,"Number of Honors/Awards Received",1,0,'L');
    $pdf->Cell(100,$content_height,$number_award,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    // Start here
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

     $sql12 = "SELECT * FROM tbl_husbandwifeinfo
            WHERE academic_year='$academic_year' AND
                  application_no='$application_no'";
    $result12 = $conn->query($sql12);
    $row12 = $result12->fetch_assoc();

    $hw_fullname=$row12['fullname'];
    $hw_living=$row12['living'];
    $hw_occupation=$row12['occupation'];
    $hw_place_of_work=$row12['place_of_work'];
    $hw_hea=$row12['hea'];
    $hw_ami=0;
    if($hw_living=="DECEASED"){
      $hw_ami=0;
    }else{
      $hw_ami=$row12['ami'];
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
    $g_relationship = $row7['relationship'];
     $g_ami=0;
    if(strlen($g_fullname)<=0){
      $g_ami=0;
    }else{
      $g_ami=$row7['ami'];
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



      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(70,$content_height,$f_fullname,1,0,'L');
      $pdf->Cell(30,$content_height,$f_living,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }else{
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(100,$content_height,$f_fullname,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }


     $pdf->Cell(0,$content_height,'',0,1);

    if($m_living=="DECEASED"){
        $sql5 = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$m_living'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $m_living_points=$row5['points'];



      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(70,$content_height,$m_fullname,1,0,'L');
      $pdf->Cell(30,$content_height,$m_living,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }else{
      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(100,$content_height,$m_fullname,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }


    $pdf->Cell(0,$content_height,'',0,1);

     if(strlen($hw_fullname)>0){

      $pdf->Cell(65,$content_height,"Spouse",1,0,'L');
      $pdf->Cell(100,$content_height,$hw_fullname,1,0,'L');

      $pdf->Cell(25,$content_height,"-",1,0,'C');
       $pdf->Cell(0,$content_height,'',0,1);
    }



    $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
    if(strlen($g_fullname)>0){
         $pdf->Cell(100,$content_height,$g_fullname." ( ". $g_relationship." )",1,0,'L');
    }else{
         $pdf->Cell(100,$content_height,$g_fullname,1,0,'L');
    }

    $pdf->Cell(25,$content_height,"--",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    $pdf->Cell(190,$content_height,"Occupation",1,0,'L');

     $pdf->Cell(0,$content_height,'',0,1);

    if($f_living=="DECEASED"){
      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(100,$content_height," ",1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }else{
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$f_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $f_occupation_points=$row5['points'];




      $pdf->Cell(65,$content_height,"Father",1,0,'L');
      $pdf->Cell(70,$content_height,$f_occupation,1,0,'L');
      $pdf->Cell(30,$content_height,$f_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
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




      $pdf->Cell(65,$content_height,"Mother",1,0,'L');
      $pdf->Cell(70,$content_height,$m_occupation,1,0,'L');
      $pdf->Cell(30,$content_height,$m_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }


    $pdf->Cell(0,$content_height,'',0,1);

    if(strlen($hw_fullname)>0){
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$hw_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $hw_occupation_points=$row5['points'];




        $pdf->Cell(65,$content_height,"Spouse",1,0,'L');
        $pdf->Cell(70,$content_height,$hw_occupation,1,0,'L');
        $pdf->Cell(30,$content_height,$hw_place_of_work,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
        $pdf->Cell(0,$content_height,'',0,1);
     }


     if(strlen($g_fullname)>0){
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$g_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $g_occupation_points=$row5['points'];




      $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
      $pdf->Cell(100,$content_height,$g_occupation,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
    }else{
      $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
      $pdf->Cell(100,$content_height,"",1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
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


    }


    $pdf->Cell(65,$content_height,"Father",1,0,'L');
    $pdf->Cell(100,$content_height,$f_hea,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

      if($m_living=="DECEASED"){
        $m_hea="";
        $m_hea_points=0;
    }else{
        $sql5 = "SELECT * FROM  tbl_legend_hea WHERE legend='$m_hea'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

         $m_hea_points=$row5['points'];
    }

    $pdf->Cell(65,$content_height,"Mother",1,0,'L');
    $pdf->Cell(100,$content_height,$m_hea,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

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

     if(strlen($hw_fullname)>0){
        $pdf->Cell(65,$content_height,"Spouse",1,0,'L');
        $pdf->Cell(100,$content_height,"PHP. ".$hw_ami,1,0,'R');
        $pdf->Cell(25,$content_height,"-",1,0,'C');

        $pdf->Cell(0,$content_height,'',0,1);
    }

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


      $sqld = "SELECT * FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no' AND help='YES'";
    $resultd = $conn->query($sqld);
    $sibling_total=0;
       if ($resultd->num_rows > 0){
           while ($rowd = $resultd->fetch_assoc()){
                if(strlen($rowd['monthly_salary'])<=0){
                    $sibling_total=$sibling_total+0;
                }else{
                    if(is_numeric($rowd['monthly_salary'])){
                        $sibling_total =$sibling_total+$rowd['monthly_salary'];
                    }else{
                        if(strpos($rowb['monthly_salary'], ",") !== false){
                            $s_salary = str_replace(",","",$rowb['monthly_salary']);
                            $sibling_total=$sibling_total+$s_salary;
                         }else{
                         $sibling_total=$sibling_total+0;
                        }
                    }

                }
           }

        $pdf->Cell(65,$content_height,"Sibling/s",1,0,'L');
        $pdf->Cell(100,$content_height,"PHP. ".$sibling_total,1,0,'R');
        $pdf->Cell(25,$content_height,"-",1,0,'C');


        $pdf->Cell(0,$content_height,'',0,1);
       }

    $sqle = "SELECT * FROM tbl_grandparent WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $resulte = $conn->query($sqle);
    $grand_ami=0;
    if ($resulte->num_rows > 0){
        $rowe = $resulte->fetch_assoc();
        if($rowe['ami']<=0){
             $grand_ami=0;
        }else{
             $grand_ami=$rowe['ami'];
             $pdf->Cell(65,$content_height,"Grandparent/s",1,0,'L');
            $pdf->Cell(100,$content_height,"PHP. ".$rowe['ami'],1,0,'R');
            $pdf->Cell(25,$content_height,"-",1,0,'C');
            $pdf->Cell(0,$content_height,'',0,1);
        }
    }else{
         $grand_ami=0;
    }


    if(strlen($g_fullname)>0){
      if($g_ami==""){
        $g_ami=0;
      }
      $pdf->Cell(65,$content_height,"Guardian",1,0,'L');
      $pdf->Cell(100,$content_height,"PHP. ".$g_ami,1,0,'R');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
       $pdf->Cell(0,$content_height,'',0,1);
      $total_ami = (int)$f_ami + (int)$m_ami + (int)$g_ami + (int)$sibling_total+ (int)$hw_ami+ (int)$grand_ami;
    }else{
       $total_ami = (int)$f_ami + (int)$m_ami + (int)$sibling_total+ (int)$hw_ami+ (int)$grand_ami;
    }

    if($scholartype=="fullscholar"){
      $sql6 = "SELECT * FROM tbl_income_indicator WHERE min<='$total_ami' AND max>='$total_ami'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();
      }else{
        $sql6 = "SELECT * FROM tbl_income_indicator_a WHERE min<='$total_ami' AND max>='$total_ami'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();
      }




    $total_ami_points=$row6['points'];

    $totalscore=$totalscore+$total_ami_points;


    $pdf->Cell(65,$content_height,"Total",1,0,'R');
    $pdf->Cell(100,$content_height,"PHP. ".$total_ami,1,0,'R');
    $pdf->Cell(25,$content_height,number_format($total_ami_points,2),1,0,'C');


    $pdf->Cell(0,$content_height,'',0,1);


    $total_member = $row1['total_family_member'];





      $sql6 = "SELECT * FROM  tbl_legend_total_family_member WHERE minimum<='$total_member' AND maximum>='$total_member'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $total_member_points=$row6['points'];



    $pdf->Cell(65,$content_height,"Total Family Members",1,0,'L');
    $pdf->Cell(100,$content_height,$total_member,1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');
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




      $pdf->Cell(65,$content_height,"Parent OFW",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_ofw,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

       $sql5 = "SELECT * FROM  tbl_legend_member_ofw WHERE legend='$relatives_ofw'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $relatives_ofw_points=$row5['points'];




      $pdf->Cell(65,$content_height,"Other Family Member/s OFW",1,0,'L');
      $pdf->Cell(100,$content_height,$relatives_ofw,1,0,'L');
      $pdf->Cell(25,$content_height,"-",1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

      if($pwd=="YES"){
        $labels="parents/other member pwd";
        if($scholartype=="fullscholar"){
          $sql5 = "SELECT * FROM  tbl_other_indicator WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }else{
        $sql5 = "SELECT * FROM  tbl_other_indicator_a WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }


        $pwd_points=$row5['points'];
      }else{
        $pwd_points=0;
      }

      if($informed_points==0){
      $totalscore=$totalscore+$pwd_points;
    }


      $pdf->Cell(65,$content_height,"Parent/Other Family Member/s PWD",1,0,'L');
      $pdf->Cell(100,$content_height,$pwd,1,0,'L');
      $pdf->Cell(25,$content_height,number_format($pwd_points,2),1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

       if($single_parent=="YES"){
        $labels="single parent";
        if($scholartype=="fullscholar"){
          $sql5 = "SELECT * FROM  tbl_other_indicator WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }else{
        $sql5 = "SELECT * FROM  tbl_other_indicator_a WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }

        $single_parent_points=$row5['points'];
      }else{
        $single_parent_points=0;
      }

    if($informed_points==0){
      $totalscore=$totalscore+$single_parent_points;
    }

      $pdf->Cell(65,$content_height,"Single Parent",1,0,'L');
      $pdf->Cell(100,$content_height,$single_parent,1,0,'L');
      $pdf->Cell(25,$content_height,number_format($single_parent_points,2),1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

       if($parent_separated=="YES"){
        $labels="parents separated";
       if($scholartype=="fullscholar"){
          $sql5 = "SELECT * FROM  tbl_other_indicator WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }else{
        $sql5 = "SELECT * FROM  tbl_other_indicator_a WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }

        $parent_separated_points=$row5['points'];
      }else{
        $parent_separated_points=0;
      }

      if($informed_points==0){
      $totalscore=$totalscore+$parent_separated_points;
    }

        $pdf->Cell(65,$content_height,"Parent Separated",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_separated,1,0,'L');
      $pdf->Cell(25,$content_height,number_format($parent_separated_points,2),1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

      if(($f_living=="DECEASED")||($m_living=="DECEASED")){
        $labels="parent deceased";
       if($scholartype=="fullscholar"){
          $sql5 = "SELECT * FROM  tbl_other_indicator WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }else{
        $sql5 = "SELECT * FROM  tbl_other_indicator_a WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }

        $parent_deceased="YES";
        $parent_deceased_points=$row5['points'];
      }else{
        $parent_deceased_points=0;
        $parent_deceased="NO";
      }

      if($informed_points==0){
      $totalscore=$totalscore+$parent_deceased_points;
      }

        $pdf->Cell(65,$content_height,"Parent Deceased",1,0,'L');
      $pdf->Cell(100,$content_height,$parent_deceased,1,0,'L');
      $pdf->Cell(25,$content_height,number_format($parent_deceased_points,2),1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

      if(($f_living=="DECEASED")&&($m_living=="DECEASED")){
        $labels="both parents deceased";
        if($scholartype=="fullscholar"){
          $sql5 = "SELECT * FROM  tbl_other_indicator WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }else{
        $sql5 = "SELECT * FROM  tbl_other_indicator_a WHERE label='$labels'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
      }

        $parents_deceased="YES";
        $parents_deceased_points=$row5['points'];
      }else{
        $parents_deceased_points=0;
        $parents_deceased="NO";
      }

      if($informed_points==0){
      $totalscore=$totalscore+$parents_deceased_points;
      }

        $pdf->Cell(65,$content_height,"Parents Deceased",1,0,'L');
      $pdf->Cell(100,$content_height,$parents_deceased,1,0,'L');
      $pdf->Cell(25,$content_height,number_format($parents_deceased_points,2),1,0,'C');
      $pdf->Cell(0,$content_height,'',0,1);

// End new
     // $pdf->Cell(0,$content_height,'',0,1);

    $pdf->SetFont('Times','',$header_font);

    $pdf->Cell(165,$header_height,"OTHER SOURCE POINTS",1,0,'C');
    $pdf->Cell(25,$header_height,"POINTS",1,0,'C');
    $pdf->Cell(0,$header_height,'',0,1);

    $pdf->SetFont('Times','',$content_font);


    if($_SESSION['studenttype']=="fullscholar"){

    $exam=0;
    $st="OPEN";
      $st1="CURRENT";
      $sqly = "SELECT * FROM tbl_academic WHERE status='$st' OR status='$st1'";
      $resulty = $conn->query($sqly);
      $rowy = $resulty->fetch_assoc();
      $acads = $rowy['id'];

         $sqlz = "SELECT * FROM tbl_student_exam WHERE academic_id='$acads' AND user_id='$userid'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      $exam_id = $rowz['exam_id'];

       $sql12 = "SELECT * FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$userid'";
     $result12 = $conn->query($sql12);

    if($result12->num_rows > 0){
        $sql14 = "SELECT COUNT(*) as items FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$userid'";
        $result14 = $conn->query($sql14);
        $row14 = $result14->fetch_assoc();
        $items= $row14['items'];

        $correct="CORRECT";
         $sql15 = "SELECT COUNT(*) as correct FROM tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$userid' AND status='$correct'";
        $result15 = $conn->query($sql15);
        $row15 = $result15->fetch_assoc();
        $ans= $row15['correct'];


         $form_id=1;
          $sqly = "SELECT * FROM tbl_formula WHERE id='$form_id'";
          $resulty = $conn->query($sqly);
          $rowy = $resulty->fetch_assoc();

          $base = $rowy['formula'];
          $under= 100-$base;
        $exam = (($ans/$items)*$under)+$base;


         // $exam = 54321;

    }else{
      $exam=0.00;
    }

$exam_rating = $exam;


     $exam_rating = $exam;
    $sql6 = "SELECT * FROM  tbl_exam_indicator WHERE min<='$exam_rating' AND max>='$exam_rating'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $exam_points=$row6['points'];

     $totalscore=$totalscore+$exam_points;

      $pdf->Cell(65,$content_height,"Exam Rating",1,0,'L');
      $pdf->Cell(100,$content_height,round($exam_rating,2),1,0,'L');
      $pdf->Cell(25,$content_height,number_format($exam_points,2),1,0,'C');
      $pdf->Cell(0,$content_height,"",0,1);
    }else{
      $exam_points=0;
      $totalscore=$totalscore+$exam_points;
    }

    $sql7 = "SELECT * FROM  tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result7 = $conn->query($sql7);
    $row7 = $result7->fetch_assoc();

    $interview_points = $row7['score'];
    //$totalscore=$totalscore+$interview_points;

    $pdf->Cell(65,$content_height,"Interview Score",1,0,'L');
    $pdf->Cell(100,$content_height," ",1,0,'L');
    $pdf->Cell(25,$content_height,"-",1,0,'C');

    $pdf->Cell(0,$content_height,'',0,1);

    if(($_SESSION['usertype']=="admin")||($_SESSION['usertype']=="superadmin")){
        if(($scholartype=="collegerecipient")||($scholartype=="shscholar")){
              $sql8 = "SELECT SUM(score) as scores FROM  tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
              $result8 = $conn->query($sql8);
              $row8 = $result8->fetch_assoc();

              $committee_points = $row8['scores'];
              //$totalscore=$totalscore+$committee_points;

                $sqlz = "SELECT * FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
                $resultz = $conn->query($sqlz);
                 if ($resultz->num_rows > 0){
                    $counter=0;
                     while($rowz = $resultz->fetch_assoc()){
                        $counter++;
                        $committeid=$rowz['committee_id'];


                        $sqly = "SELECT * FROM tbl_admin WHERE username='$committeid'";
                        $resulty = $conn->query($sqly);
                        $rowy = $resulty->fetch_assoc();
                        $fullnames = $rowy['firstname']." ".$rowy['lastname'];
                            $pdf->Cell(65,$content_height,"Committee Member",1,0,'L');
                            $pdf->Cell(100,$content_height,$fullnames,1,0,'L');
                            $pdf->Cell(25,$content_height,$rowz['score'],1,0,'C');

                            $pdf->Cell(0,$content_height,'',0,1);
                     }



                 }else{

                 }
        }else{
            $sql8 = "SELECT SUM(score) as scores FROM  tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
              $result8 = $conn->query($sql8);
              $row8 = $result8->fetch_assoc();

              $committee_points = $row8['scores'];
              $totalscore=$totalscore+$committee_points;

                $sqlz = "SELECT * FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
                $resultz = $conn->query($sqlz);
                 if ($resultz->num_rows > 0){
                    $counter=0;
                     while($rowz = $resultz->fetch_assoc()){
                        $counter++;
                        $committeid=$rowz['committee_id'];


                        $sqly = "SELECT * FROM tbl_admin WHERE username='$committeid'";
                        $resulty = $conn->query($sqly);
                        $rowy = $resulty->fetch_assoc();
                        $fullnames = $rowy['firstname']." ".$rowy['lastname'];
                            $pdf->Cell(65,$content_height,"Admin Score",1,0,'L');
                            $pdf->Cell(100,$content_height,$fullnames,1,0,'L');
                            $pdf->Cell(25,$content_height,$rowz['score'],1,0,'C');

                            $pdf->Cell(0,$content_height,'',0,1);
                     }



                 }else{

                 }
        }

    }else{
          if(($scholartype=="collegerecipient")||($scholartype=="shscholar")){
             $sql8 = "SELECT SUM(score) as scores FROM  tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
              $result8 = $conn->query($sql8);
              $row8 = $result8->fetch_assoc();

              $committee_points = $row8['scores'];
              $totalscore=$totalscore+$committee_points;

                  $sqlz = "SELECT COUNT(*) as num FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
                  $resultz = $conn->query($sqlz);
                  $rowz = $resultz->fetch_assoc();
                  $numbers=$rowz['num'];



            $pdf->Cell(65,$content_height,"Committee Score",1,0,'L');
            $pdf->Cell(100,$content_height,"Out of ".$numbers." committee",1,0,'L');
            $pdf->Cell(25,$content_height,$committee_points,1,0,'C');

             $pdf->Cell(0,$content_height,'',0,1);
            }




    }


 $pdf->SetFont('Times','',$header_font);

            $pdf->Cell(165,$content_height,"Total",1,0,'R');
            $pdf->Cell(25,$content_height,$totalscore,1,0,'C');

}




$pdf->Output();
?>
