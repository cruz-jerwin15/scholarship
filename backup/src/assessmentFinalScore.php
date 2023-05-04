<?php  session_start();

require 'config.php';






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
    


    $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND typescholar='$scholartype' ORDER BY applicant_number";
    $result = $conn->query($sql);
      $count=0;                    
    while($row = $result->fetch_assoc()){
        $count++;
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



  

    if($scholartype=="fullscholar"){
          $gwa = $row1['gwa'];

             $totalscore=$totalscore+$gwa;

           
    }

    $applicant_number = $row['applicant_number'];
    $sql2 = "SELECT * FROM tbl_legend_applicant WHERE minimum<='$applicant_number' AND maximum>='$applicant_number'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $applicant_number_points=$row2['points'];

    $totalscore=$totalscore+$applicant_number_points;

  

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
       
      }else{
        
      }
    
    }else{
    
    }

   

    $sql6 = "SELECT * FROM tbl_legend_residency WHERE minimum<='$years_residency' AND maximum>='$years_residency'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $years_residency_points=$row6['points'];

    $totalscore=$totalscore+$years_residency_points;

  

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
   
   
  
        $fullscholar="NO";
        $collegerecipient="NO";
        $shscholar="NO";
        $sql11 = "SELECT * FROM tbl_former WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $result11 = $conn->query($sql11);
        if ($result11->num_rows > 0){
          $row11 = $result11->fetch_assoc();
            $fullscholar =$row11['fullscholar'];
            $collegerecipient =$row11['collegerecipient'];
            $shscholar =$row11['shscholar'];
        
        }else{
            $fullscholar="NO";
            $collegerecipient="NO";
            $shscholar="NO";
        }

    if(($scholartype=="fullscholar")||($scholartype=="collegerecipient")){

       
       
    }else{
        
    }

   



    $today = date("Y-m-d");
    $diff =  date_diff(date_create($birthday),date_create($today));
    $age = $diff->format('%y');


    $sql6 = "SELECT * FROM tbl_legend_age WHERE minimum<='$age' AND maximum>='$age'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $age_points=$row6['points'];

     $totalscore=$totalscore+$age_points;



    $sql5 = "SELECT * FROM tbl_legend_birth_order WHERE legend='$birthorder'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $birthorder_points=$row5['points'];

    $totalscore=$totalscore+$birthorder_points;

 

    $sql6 = "SELECT COUNT(*) as sibs FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $numbersiblings=$row6['sibs'];



    $sql5 = "SELECT * FROM  tbl_legend_civil_status WHERE legend='$civil_status'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $civilstatus_points=$row5['points'];

     $totalscore=$totalscore+$civilstatus_points;


    if(($scholartype=="collegerecipient")||($scholartype=="shscholar")){
          $gwa = $row1['gwa'];

            $sql6 = "SELECT * FROM tbl_legend_gwa WHERE minimum<='$gwa' AND maximum>='$gwa'";
            $result6 = $conn->query($sql6);
            $row6 = $result6->fetch_assoc();

            $gwa_points=$row6['points'];

             $totalscore=$totalscore+$gwa_points;

    }
  

    $sql5 = "SELECT * FROM tbl_legend_living_with WHERE legend='$living_with'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $living_with_points=$row5['points'];

     $totalscore=$totalscore+$living_with_points;

 


    $typehouse = $row1['type_house'];

    $sql5 = "SELECT * FROM tbl_legend_house WHERE legend='$typehouse'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $typehouse_points=$row5['points'];

    $totalscore=$totalscore+$typehouse_points;



    $sql5 = "SELECT * FROM tbl_legend_working WHERE legend='$working_student'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $working_student_points=$row5['points'];

    $totalscore=$totalscore+$working_student_points;

 

    $sql5 = "SELECT * FROM tbl_legend_pwd WHERE legend='$student_pwd'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $pwd_student_points=$row5['points'];

    $totalscore=$totalscore+$pwd_student_points;


 


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
                      
  

    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_elementary'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_elementary_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_elementary_points;
   


    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_jh'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_jh_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_jh_points;

   


    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_sh'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_sh_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_sh_points;



     

	 if($_SESSION['studenttype']=="fullscholar"){
			 $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_college'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_college_points=$row5['points'];

    $totalscore=$totalscore;
    }else if($_SESSION['studenttype']=="collegerecipient"){
		$totalscore=$totalscore;
    }else{
      $totalscore=$totalscore;
    }
 

    $sql5 = "SELECT * FROM tbl_legend_school WHERE legend='$school_type_intended'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $school_type_intended_points=$row5['points'];

    $totalscore=$totalscore+ $school_type_intended_points;


 

   if($_SESSION['studenttype']=="fullscholar"){
   
    }else if($_SESSION['studenttype']=="collegerecipient"){
     
    }else{
      
    }
   
 

    if($_SESSION['studenttype']=="fullscholar"){
    
    }else if($_SESSION['studenttype']=="collegerecipient"){
      
    }else{
      
    }
   

   


     $sql5 = "SELECT * FROM tbl_legend_graduating_honors WHERE legend='$ishonor'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    $ishonor_points=$row5['points'];

    $totalscore=$totalscore+ $ishonor_points;
  

     $sql6 = "SELECT * FROM tbl_legend_award WHERE minimum<='$number_award' AND maximum>='$number_award'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $award_points=$row6['points'];

     $totalscore=$totalscore+$award_points;

  


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
    $g_relationship = $row7['relationship'];
     $g_ami=0;
    if(strlen($g_fullname)>0){
      $g_ami=0;
    }else{
      $g_ami=$row6['ami'];
    }




    if($f_living=="DECEASED"){
        $sql5 = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$f_living'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $f_living_points=$row5['points'];

        $totalscore=$totalscore+ $f_living_points;

  
    }else{
     
    }

  
 

    if($m_living=="DECEASED"){
        $sql5 = "SELECT * FROM tbl_legend_parent_deceased WHERE legend='$m_living'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $m_living_points=$row5['points'];

        $totalscore=$totalscore+ $m_living_points;

    
    }else{
     
    }

   
  
    if(strlen($g_fullname)>0){
        
    }else{
        
    }
   
 

    if($f_living=="DECEASED"){
    
    }else{
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$f_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $f_occupation_points=$row5['points'];

        $totalscore=$totalscore+ $f_occupation_points;


    }
   

  

    if($m_living=="DECEASED"){
     
    }else{
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$m_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $m_occupation_points=$row5['points'];

        $totalscore=$totalscore+ $m_occupation_points;


    
    }

   


  
    if(strlen($g_occupation)>0){
       $sql5 = "SELECT * FROM tbl_legend_occupation WHERE legend='$g_occupation'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $g_occupation_points=$row5['points'];

        $totalscore=$totalscore+ $g_occupation_points;


    
    }else{
     
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

   
    $total_ami = 0;

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
        }
    }else{
         $grand_ami=0;
    }

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
   
     $total_ami = (int)$f_ami + (int)$m_ami + (int)$g_ami + (int)$sibling_total + (int)$hw_ami+ (int)$grand_ami;
    }else{
        $total_ami = (int)$f_ami + (int)$m_ami + (int)$sibling_total  + (int)$hw_ami+ (int)$grand_ami;
    }
    

  

      $sql6 = "SELECT * FROM tbl_legend_ami WHERE minimum<='$total_ami' AND maximum>='$total_ami'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $total_ami_points=$row6['points'];

     $totalscore=$totalscore+$total_ami_points;


 

    $total_member = $row1['total_family_member'];



    

      $sql6 = "SELECT * FROM  tbl_legend_total_family_member WHERE minimum<='$total_member' AND maximum>='$total_member'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $total_member_points=$row6['points'];

     $totalscore=$totalscore+$total_member_points;
 
    // New


  

        $sql5 = "SELECT * FROM  tbl_legend_parent_ofw WHERE legend='$parent_ofw'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $parent_ofw_points=$row5['points'];

        $totalscore=$totalscore+$parent_ofw_points;


  

       $sql5 = "SELECT * FROM  tbl_legend_member_ofw WHERE legend='$relatives_ofw'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $relatives_ofw_points=$row5['points'];

        $totalscore=$totalscore+ $relatives_ofw_points;


  

          $sql5 = "SELECT * FROM  tbl_legend_pwd WHERE legend='$pwd'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $pwd_points=$row5['points'];

        $totalscore=$totalscore+ $pwd_points;

   

        $sql5 = "SELECT * FROM  tbl_legend_parent_single WHERE legend='$single_parent'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $single_parent_points=$row5['points'];

        $totalscore=$totalscore+ $single_parent_points;

    

       $sql5 = "SELECT * FROM  tbl_legend_parent_separated WHERE legend='$parent_separated'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        $parent_separated_points=$row5['points'];

        $totalscore=$totalscore+ $parent_separated_points;


// End new
    


    if($_SESSION['studenttype']=="fullscholar"){
     
     $exam_rating = $row1['exam_rating'];
    $sql6 = "SELECT * FROM  tbl_legend_exam WHERE minimum<='$exam_rating' AND maximum>='$exam_rating'";
    $result6 = $conn->query($sql6);
    $row6 = $result6->fetch_assoc();

    $exam_points=$row6['points'];

     $totalscore=$totalscore+$exam_points;
    
 
    }else{
      $exam_points=0;
      $totalscore=$totalscore+$exam_points;
    }

    $sql7 = "SELECT * FROM  tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result7 = $conn->query($sql7);
    $row7 = $result7->fetch_assoc();

    $interview_points = $row7['score'];
    $totalscore=$totalscore+$interview_points;
    

    
     

    $sqlz = "SELECT * FROM tbl_finalscore WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $resultz = $conn->query($sqlz);
    $rowz = $resultz->fetch_assoc();
    if ($resultz->num_rows <= 0){
          $insert1= "INSERT INTO tbl_finalscore 
                     (academic_year,
                     application_no,
                     score
                    )
                   VALUES (
                     '$academic_year',
                     '$application_no',
                     '$totalscore')";
         $conn->query($insert1);
    }else{

    }   

    

}

  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
      if($_SESSION['studenttype']=="collegerecipient"){
echo 'window.open("assessmentCollegeRecipient.php","_self")';
}else if($_SESSION['studenttype']=="shscholar"){
echo 'window.open("assessmentSHS.php","_self")';
}else if($_SESSION['studenttype']=="fullscholar"){
echo 'window.open("assessmentCollegeFullScholar.php","_self")';
} 

     echo '</script>';



?>
