<?php session_start();
header("Content-Type: text/html; charset=LATIN-1");
require "config.php";
$status="APPROVED";
$userid=$_SESSION['newid'];

echo '<script language="javascript">';
              echo 'localStorage.setItem("timer","NULL")';
              echo '</script>';

$_SESSION['exam_number']=0;
$_SESSION['exam_time']=0;
$_SESSION['exam_timer']=0;
$_SESSION['start_time']=0;
$_SESSION['exam_start']="NO";

$reg_step=$_SESSION['reg_step'];

$academic_year ="";
$application_no ="";
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
$hw_corresponding="";
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
$self_support="";


$grand_ami=0;

$count1=0;
$count2=0;
$count3=0;
$count4=0;

$sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $email = $row['username'];
    $image = $row['image'];
    $stats=$row['status'];
    $application_no=$row['application_no'];
    $academic_year=$row['academic_year'];
    $applicant_number=$row['application_no'];
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
        $hw_corresponding=$row8['corresponding'];
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

    $sql10 = "SELECT * FROM tbl_grandparent WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result10 = $conn->query($sql10);
    if ($result10->num_rows > 0){
      $row10 = $result10->fetch_assoc();
        $grand_ami=$row10['ami'];
    }else{
      $grand_ami=0;
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
         $self_support=$row9['self_supporting'];
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

    if($birthday!=""){
      $_SESSION['step1']=1;
    }
   
  }else{
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("login.php","_self")';
      echo '</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8"> -->
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YDO</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="../assetss/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assetss/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assetss/vendors/css/vendor.bundle.addons.css">

     <link rel="stylesheet" href="../assetss/vendors/iconfonts/font-awesome/css/font-awesome.min.css" /> 
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assetss/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assetss/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../assetss/images/favicon.png" />
     <script>
    var ids;

    function getRemoveId(id){
        ids = id;
        
    }
    function removeUser(){
      window.open("removeSiblings.php?id="+ids,"_self");
    }
    function disableFatherAll(){
      var status = document.getElementById('f_living').value;
      
      if(status=="DECEASED"){
        document.getElementById('f_address').value="";
        document.getElementById('f_contact_number').value="";
        document.getElementById('f_corresponding').value="";
        document.getElementById('f_company').value="";
        document.getElementById('f_place_of_work').value="";
        document.getElementById('f_ami').value="";
        document.getElementById('f_age').value="";

        document.getElementById('f_address').disabled=true;
        document.getElementById('f_contact_number').disabled=true;
        document.getElementById('f_corresponding').disabled=true;
        document.getElementById('f_company').disabled=true;
         document.getElementById('f_place_of_work').disabled=true;
        document.getElementById('f_occupation').disabled=true;
        document.getElementById('f_hea').disabled=true;
        document.getElementById('f_ami').disabled=true;
        document.getElementById('f_age').disabled=true;
      }else{
        document.getElementById('f_address').disabled=false;
        document.getElementById('f_contact_number').disabled=false;
        document.getElementById('f_corresponding').disabled=false;
        document.getElementById('f_company').disabled=false;
         document.getElementById('f_place_of_work').disabled=false;
        document.getElementById('f_occupation').disabled=false;
        document.getElementById('f_hea').disabled=false;
        document.getElementById('f_ami').disabled=false;
        document.getElementById('f_age').disabled=false;
      }
    }
     function disableMotherAll(){
      var status = document.getElementById('m_living').value;
      
      if(status=="DECEASED"){
        document.getElementById('m_address').value="";
        document.getElementById('m_contact_number').value="";
        document.getElementById('m_corresponding').value="";
        document.getElementById('m_company').value="";
        document.getElementById('m_place_of_work').value="";
        document.getElementById('m_ami').value="";
        document.getElementById('m_age').value="";

        document.getElementById('m_address').disabled=true;
        document.getElementById('m_contact_number').disabled=true;
        document.getElementById('m_corresponding').disabled=true;
        document.getElementById('m_company').disabled=true;
         document.getElementById('m_place_of_work').disabled=true;
        document.getElementById('m_occupation').disabled=true;
        document.getElementById('m_hea').disabled=true;
        document.getElementById('m_ami').disabled=true;
        document.getElementById('m_age').disabled=true;

      }else{
        document.getElementById('m_address').disabled=false;
        document.getElementById('m_contact_number').disabled=false;
        document.getElementById('m_corresponding').disabled=false;
        document.getElementById('m_company').disabled=false;
         document.getElementById('m_place_of_work').disabled=false;
        document.getElementById('m_occupation').disabled=false;
        document.getElementById('m_hea').disabled=false;
        document.getElementById('m_ami').disabled=false;
        document.getElementById('m_age').disabled=false;
      }
    }
    function disableHouse(){
      var status = document.getElementById('house').value;

      if((status=="OWNED BY FAMILY")||(status=="OWNED BY RELATIVES")){
        document.getElementById('pay_monthly').disabled=true;
        document.getElementById('pay_monthly').value="";
      }else{
        document.getElementById('pay_monthly').disabled=false;
      }
    }
    function disableHusbandWifeAll(){
      var status = document.getElementById('hw_living').value;
      if((status=="DECEASED")||(status=="N/A")){
        document.getElementById('hw_ami').disabled=true;
        document.getElementById('hw_hea').disabled=true;
        document.getElementById('hw_place_of_work').disabled=true;
        document.getElementById('hw_occupation').disabled=true;
        document.getElementById('hw_contact_number').disabled=true;
        document.getElementById('hw_address').disabled=true;
        document.getElementById('hw_fullname').disabled=true;
       
      }else{
         document.getElementById('hw_ami').disabled=false;
        document.getElementById('hw_hea').disabled=false;
        document.getElementById('hw_place_of_work').disabled=false;
        document.getElementById('hw_occupation').disabled=false;
        document.getElementById('hw_contact_number').disabled=false;
        document.getElementById('hw_address').disabled=false;
        document.getElementById('hw_fullname').disabled=false;
      }
    }
    function disableGuardian(){
      var status = document.getElementById('living_with_family').value;
     document.getElementById('g_living').value=status;
      if(status=="YES"){
        
        document.getElementById('g_fullname').disabled=true;
        document.getElementById('g_relationship').disabled=true;
        document.getElementById('g_address').disabled=true;
        document.getElementById('g_contactnumber').disabled=true;
        document.getElementById('g_age').disabled=true;
        document.getElementById('g_occupation').disabled=true;
        document.getElementById('g_ami').disabled=true;
        document.getElementById('g_corresponding').disabled=true;
      }else{
         // alert(status);

         document.getElementById('g_fullname').disabled=false;
        document.getElementById('g_relationship').disabled=false;
        document.getElementById('g_address').disabled=false;
        document.getElementById('g_contactnumber').disabled=false;
        document.getElementById('g_age').disabled=false;
        document.getElementById('g_occupation').disabled=false;
        document.getElementById('g_ami').disabled=false;
         document.getElementById('g_corresponding').disabled=false;
      }
    }
    function getInformed(){
      var inform = document.getElementById('informed').value;
      if(inform=="YDO-Scholarship Page"){
        document.getElementById('nameofficial').disabled=true;
      }else{
        document.getElementById('nameofficial').disabled=false;
      }
    }
    function changeColor(){
      // var firstname= document.getElementById('firstname').value;
      // var middlename= document.getElementById('middlename').value;
      // var lastname= document.getElementById('lastname').value;
      // var birthday= document.getElementById('birthday').value;
      // var birthplace= document.getElementById('birthplace').value;
      // var birthorder= document.getElementById('birthorder').value;
      // if(firstname.length>0){
      //     document.getElementById('firstname').style.backgroundColor='#bae7ff';
      // }else{
      //     document.getElementById('firstname').style.backgroundColor='#ffffff';
      // }
      // if(middlename.length>0){
      //     document.getElementById('middlename').style.backgroundColor='#bae7ff';
      // }else{
      //     document.getElementById('middlename').style.backgroundColor='#ffffff';
      // }
      //  if(lastname.length>0){
      //     document.getElementById('lastname').style.backgroundColor='#bae7ff';
      // }else{
      //     document.getElementById('lastname').style.backgroundColor='#ffffff';
      // }
      //   if(birthday.length>0){
      //     document.getElementById('birthday').style.backgroundColor='#bae7ff';
      // }else{
      //     document.getElementById('birthday').style.backgroundColor='#ffffff';
      // }
      //  if(birthplace.length>0){
      //     document.getElementById('birthplace').style.backgroundColor='#bae7ff';
      // }else{
      //     document.getElementById('birthplace').style.backgroundColor='#ffffff';
      // }
      //  if(birthorder.length>0){
      //     document.getElementById('birthorder').style.backgroundColor='#bae7ff';
      // }else{
      //     document.getElementById('birthorder').style.backgroundColor='#ffffff';
      // }
    
    }
    function initLoad(){
      disableFatherAll();
      disableMotherAll();
      disableHouse();
      disableHusbandWifeAll();
      disableGuardian();
      changeColor();
    }
  </script>
  </head>
  <body onload="initLoad()">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
       <?php
            include 'logo.php';
       ?>
        <?php
            include 'Notif.php';
        ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php
            include 'sidepanel.php';
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                   <h4 class="page-title">
                        Step 4: Family Background
                   </h4>
                </div>
              </div>
            </div>   
            <div class="row">
              <!-- Start -->
                      <form method="POST" action="registerfamilyInformation.php">
                      <div class="col-md-12">
                          <div class="row">

                            
                                <input type="hidden" name="userid" value="<?php echo $userid?>">
                                <input type="hidden" name="academic_year" value="<?php echo $academic_year?>">
                                <input type="hidden" name="application_no" value="<?php echo $application_no?>">
                           
                            <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight: 600;">Father's Full Name<span style="color:red;">*</span></label>
                                          <input type="text" name="f_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>"
                                          value="<?php echo $f_fullname?>" required="true">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Choose Living or Deceased</label>
                                         <select name="f_living" id="f_living" class="form-control" onChange="disableFatherAll()">
                                            <?php
                                              if($f_living=="LIVING"){
                                                echo ' <option value="LIVING" selected="selected">Living</option>';
                                              }else{
                                                echo ' <option value="LIVING">Living</option>';
                                              }
                                            ?>
                                            <?php
                                              if($f_living=="DECEASED"){
                                                echo ' <option value="DECEASED" selected="selected">Deceased</option>';
                                              }else{
                                                echo ' <option value="DECEASED">Deceased</option>';
                                              }
                                            ?>
                                         </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Address <span style="color:red;">* Required if Living</span></label>
                                          <input type="text" name="f_address" id="f_address" class="form-control" placeholder="Address" 
                                          value="<?php echo $f_address?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Age <span style="color:red;">* Required if Living</span></label>
                                          <input type="number" name="f_age" id="f_age" class="form-control" placeholder="Age" 
                                          value="<?php echo $f_age?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number <span style="color:red;">* Required if Living</span></label>
                                          <input type="text" name="f_contact_number" id="f_contact_number" class="form-control" placeholder="Contact Number" 
                                          value="<?php echo $f_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation If not in the list, choose Others<span style="color:red;">* Required if Living</span></label>

                                          <select name="f_occupation" id="f_occupation" class="form-control">
                                            <?php
                                              $sql4="SELECT * FROM tbl_legend_occupation";
                                              $result4 = $conn->query($sql4);

                                              if($f_occupation=="Others"){
                                                echo '<option value="Others" selected="selected">';
                                                   echo 'Others</option>';
                                                   while($row4 = $result4->fetch_assoc()){
                                                    echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                   }
                                              }else{
                                                 while($row4 = $result4->fetch_assoc()){
                                                if($f_occupation==$row4['legend']){
                                                   echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '" selected="selected">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                }else{
                                                   echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                }
                                              }
                                              echo '<option value="Others">';
                                                   echo 'Others</option>';
                                              }

                                             

                                            ?>


                                          </select>

                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >If Occupation is not in the list,please specify here</label>
                                          <input type="text" name="f_corresponding" id="f_corresponding" class="form-control" placeholder="Please specify your father's occupation" 
                                          value="<?php echo $f_corresponding?>">
                                      </div>
                                  </div>
                                  <!-- Father -->
                                  




                                  <!-- Father -->
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Company name </label>
                                          <input type="text" name="f_company" id="f_company" class="form-control" placeholder="Company name" value="<?php echo $f_company?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Place of Work </label>
                                          <input type="text" name="f_place_of_work" id="f_place_of_work" class="form-control" placeholder="Place of Work" 
                                          value="<?php echo $f_place_of_work?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Highest Educational Attainment <span style="color:red;">* Required if Living</span></label>
                                         <select name="f_hea" id="f_hea" class="form-control">
                                           <?php
                      
                        $sql9 = "SELECT * FROM tbl_legend_hea";
                                         $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                if($row9['legend']==$f_hea){
                                    echo '<option value="';
                                    echo $row9['legend'];
                                    echo '" selected="selected">';
                                    echo $row9['legend'];
                                    echo '</option>';
                                }else{
                                   echo '<option value="';
                                    echo $row9['legend'];
                                    echo '">';
                                    echo $row9['legend'];
                                    echo '</option>';
                                }
                              }
                            }
                          ?>  
                                         </select>
                                        
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Monthly Income <span style="color:red;">* Required if Living</span></label>
                                          <input type="number" name="f_ami" id="f_ami" class="form-control" placeholder="Average Monthly Income" 
                                          value="<?php echo $f_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Father -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight: 600;">Mother's Full Name<span style="color:red;">*</span></label>
                                          <input type="text" name="m_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>" value="<?php echo $m_fullname?>" required="true">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Choose Living or Deceased</label>
                                         <select name="m_living" id="m_living" onChange="disableMotherAll()" class="form-control">
                                             <?php
                                              if($m_living=="LIVING"){
                                                echo ' <option value="LIVING" selected="selected">Living</option>';
                                              }else{
                                                echo ' <option value="LIVING">Living</option>';
                                              }
                                            ?>
                                            <?php
                                              if($m_living=="DECEASED"){
                                                echo ' <option value="DECEASED" selected="selected">Deceased</option>';
                                              }else{
                                                echo ' <option value="DECEASED">Deceased</option>';
                                              }
                                            ?>
                                         </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Address <span style="color:red;">* Required if Living</span></label>
                                          <input type="text" name="m_address" id="m_address" class="form-control" placeholder="Address" value="<?php echo $m_address?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Age <span style="color:red;">* Required if Living</span></label>
                                          <input type="number" name="m_age" id="m_age" class="form-control" placeholder="Age" 
                                          value="<?php echo $m_age?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number <span style="color:red;">* Required if Living</span></label>
                                          <input type="text" name="m_contact_number" id="m_contact_number" class="form-control" placeholder="Contact Number" value="<?php echo $m_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation If not in the list, choose Others<span style="color:red;">* Required if Living</span></label>
                                         <select name="m_occupation" id="m_occupation" class="form-control">
                                            <?php
                                              $sql4="SELECT * FROM tbl_legend_occupation";
                                              $result4 = $conn->query($sql4);

                                              if($m_occupation=="Others"){
                                                echo '<option value="Others" selected="selected">';
                                                   echo 'Others</option>';
                                                   while($row4 = $result4->fetch_assoc()){
                                                    echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                   }
                                              }else{
                                                 while($row4 = $result4->fetch_assoc()){
                                                if($m_occupation==$row4['legend']){
                                                   echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '" selected="selected">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                }else{
                                                   echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                }
                                              }
                                              echo '<option value="Others">';
                                                   echo 'Others</option>';
                                              }
                                            ?>


                                          </select>
                                      </div>
                                  </div>
                                   <!-- Father -->
                                 <div class="col-md-12">
                                      <div class="form-group">
                                         <label >If Occupation is not in the list,please specify here</label>
                                          <input type="text" name="m_corresponding" id="m_corresponding" class="form-control" placeholder="Please specify your mother's occupation" 
                                          value="<?php echo $m_corresponding?>">
                                      </div>
                                  </div>

                                  <!-- Father -->
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Company name </label>
                                          <input type="text" name="m_company" id="m_company" class="form-control" placeholder="Company name" value="<?php echo $m_company?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Place of Work </label>
                                          <input type="text" name="m_place_of_work" id="m_place_of_work" class="form-control" placeholder="Place of Work" value="<?php echo $m_place_of_work?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Highest Educational Attainment </label>
                                         <select name="m_hea" id="m_hea" class="form-control">
                                            <?php
                      
                        $sql9 = "SELECT * FROM tbl_legend_hea";
                                         $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                if($row9['legend']==$m_hea){
                                    echo '<option value="';
                                    echo $row9['legend'];
                                    echo '" selected="selected">';
                                    echo $row9['legend'];
                                    echo '</option>';
                                }else{
                                   echo '<option value="';
                                    echo $row9['legend'];
                                    echo '">';
                                    echo $row9['legend'];
                                    echo '</option>';
                                }
                              }
                            }
                          ?>  
                                         </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Monthly Income <span style="color:red;">* Required if Living</span></label>
                                          <input type="number" name="m_ami" id="m_ami" class="form-control" placeholder="Average Monthly Income" value="<?php echo $m_ami;?>">
                                      </div>
                                  </div>
                                  <!-- End Mother -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Spouse:Choose Living, Deceased or N/A</label>
                                         <select name="hw_living" id="hw_living" class="form-control" onChange="disableHusbandWifeAll()">
                                           <?php
                                              if($hw_living=="N/A"){
                                                echo ' <option value="N/A" selected="selected">N/A</option>';
                                              }else{
                                                echo ' <option value="N/A">N/A</option>';
                                              }
                                            ?>
                                            <?php
                                              if($hw_living=="LIVING"){
                                                echo ' <option value="LIVING" selected="selected">Living</option>';
                                              }else{
                                                echo ' <option value="LIVING">Living</option>';
                                              }
                                            ?>
                                            <?php
                                              if($hw_living=="DECEASED"){
                                                echo ' <option value="DECEASED" selected="selected">Deceased</option>';
                                              }else{
                                                echo ' <option value="DECEASED">Deceased</option>';
                                              }
                                            ?>
                                           
                                         </select>
                                      </div>
                                    </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight: 600;">Spouse Full Name</label>
                                          <input type="text" name="hw_fullname" id="hw_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>"  
                                          value="<?php echo $hw_fullname?>">
                                      </div>
                                  </div>
                                   
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Address </label>
                                          <input type="text" name="hw_address" id="hw_address" class="form-control" placeholder="Address"
                                           value="<?php echo $hw_address?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number </label>
                                          <input type="text" name="hw_contact_number" id="hw_contact_number" class="form-control" placeholder="Contact Number" 
                                           value="<?php echo $hw_contact_number?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation If not in the list, choose Others</label>
                                         <select name="hw_occupation" id="hw_occupation" class="form-control">
                                            <?php
                                              $sqla="SELECT * FROM tbl_legend_occupation";
                                              $resulta = $conn->query($sqla);

                                              if($hw_occupation=="Others"){
                                                echo '<option value="Others" selected="selected">';
                                                   echo 'Others</option>';
                                                   while($rowa = $resulta->fetch_assoc()){
                                                    echo '<option value="';
                                                   echo $rowa['legend'];
                                                   echo '">';
                                                   echo $rowa['legend'];
                                                   echo '</option>';
                                                   }
                                              }else{
                                                 while($rowa = $resulta->fetch_assoc()){
                                                if($hw_occupation==$rowa['legend']){
                                                   echo '<option value="';
                                                   echo $rowa['legend'];
                                                   echo '" selected="selected">';
                                                   echo $rowa['legend'];
                                                   echo '</option>';
                                                }else{
                                                   echo '<option value="';
                                                   echo $rowa['legend'];
                                                   echo '">';
                                                   echo $rowa['legend'];
                                                   echo '</option>';
                                                }
                                              }
                                              echo '<option value="Others">';
                                                   echo 'Others</option>';
                                              }
                                            ?>


                                          </select>
                                      </div>
                                  </div>
                                   <!-- Father -->
                                 <div class="col-md-12">
                                      <div class="form-group">
                                         <label >If Occupation is not in the list,please specify here</label>
                                          <input type="text" name="hw_corresponding" id="hw_corresponding" class="form-control" placeholder="Please specify your spouse's occupation" 
                                          value="<?php echo $hw_corresponding?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Place of Work </label>
                                          <input type="text" name="hw_place_of_work" id="hw_place_of_work" class="form-control" placeholder="Place of Work" 
                                           value="<?php echo $hw_place_of_work?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Highest Educational Attainment </label>
                                          <input type="text" name="hw_hea" id="hw_hea" class="form-control" placeholder="Highest Educational Attainment" 
                                           value="<?php echo $hw_hea?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Monthly Income <span style="color:red;"></label>
                                          <input type="number" name="hw_ami" id="hw_ami" class="form-control" placeholder="Average Monthly Income"
                                          value="<?php echo $hw_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Wife -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight: 600;">If Living with Guardian, answer below</label>
                                         <input type="hidden" name="g_living" id="g_living">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Guardian's Full Name</label>
                                          <input type="text" name="g_fullname" id="g_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>" 
                                          value="<?php echo $g_fullname?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Relationship</label>
                                          <input type="text" name="g_relationship" id="g_relationship" class="form-control" placeholder="Relationship" 
                                          value="<?php echo $g_relationship?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Address</label>
                                          <input type="text" name="g_address" id="g_address" class="form-control" placeholder="Address" 
                                          value="<?php echo $g_address?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number</label>
                                          <input type="text" name="g_contactnumber" id="g_contactnumber" class="form-control" placeholder="Address" 
                                          value="<?php echo $g_contactnumber?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Age</label>
                                          <input type="text" name="g_age" id="g_age" class="form-control" placeholder="Age" 
                                          value="<?php echo $g_age?>">
                                      </div>
                                  </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Monthly Income <span style="color:red;"></label>
                                          <input type="number" name="g_ami" id="g_ami" class="form-control" placeholder="Average Monthly Income"
                                          value="<?php echo $g_ami?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation If not in the list, choose Others</label>
                                         <select name="g_occupation" id="g_occupation" class="form-control">
                                            <?php
                                              $sql4="SELECT * FROM tbl_legend_occupation";
                                              $result4 = $conn->query($sql4);

                                              if($g_occupation=="Others"){
                                                echo '<option value="Others" selected="selected">';
                                                   echo 'Others</option>';
                                                   while($row4 = $result4->fetch_assoc()){
                                                    echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                   }
                                              }else{
                                                 while($row4 = $result4->fetch_assoc()){
                                                if($g_occupation==$row4['legend']){
                                                   echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '" selected="selected">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                }else{
                                                   echo '<option value="';
                                                   echo $row4['legend'];
                                                   echo '">';
                                                   echo $row4['legend'];
                                                   echo '</option>';
                                                }
                                              }
                                              echo '<option value="Others">';
                                                   echo 'Others</option>';
                                              }
                                            ?>


                                          </select>
                                      </div>
                                  </div>
                                   <!-- Father -->
                                 <div class="col-md-12">
                                      <div class="form-group">
                                         <label >If Occupation is not in the list,please specify here</label>
                                          <input type="text" name="g_corresponding" id="g_corresponding" class="form-control" placeholder="Please specify your guardian's occupation" 
                                          value="<?php echo $g_corresponding?>">
                                      </div>
                                  </div>
                                

                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Add Grand Parent monthly income if they share. <span style="color:red;"></label>
                                          <input type="number" name="grand_ami" id="grand_ami" class="form-control" placeholder="Average Monthly Income" min="0"
                                          value="<?php echo $grand_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Guardian -->
                                   <?php
                      
                        echo '<div class="col-md-12" style="text-align: left;">
                                      <input type="submit" value="Update Family Background" style="background-color:#36cfc9;color:#ffffff;" class="btn btn-secondary">
                                  </div>';
                      
                     ?>
                                   
                                </div>
                            </div>
                            
                          </div>
                      </div>
                    </form> 
      
                
                  
              <!-- End -->
            </div>
      



          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php
              include 'footer.php';
         ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </div>

<div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send My Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="sendApplication.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">Please make sure that you fill-out all the required fields.</span>
            </p>
         </div>
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Send">
      </div>
    </div>
  </form>
  </div>
</div>


<?php
$sqlb = "SELECT * FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
$resultb = $conn->query($sqlb);
if ($resultb->num_rows > 0){
  while($rowb = $resultb->fetch_assoc()){
echo '<div class="modal fade" id="updateSiblings';
echo $rowb['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Siblings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateSiblingsInformationRegister.php" method="post">
      <div class="modal-body">
        <div class="row">
                     <input type="hidden" name="ids" value="';
                     echo $rowb['id'];
                     echo '">
                      <input type="hidden" name="userid" value="';
                     echo $userid;
                     echo '">
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="firstname">Full name</label>
                            <div class="input-group">
                              <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" value="';
                              echo $rowb['fullname'];
                              echo '" required>
                          
                            </div>
                          </div>
                      </div>
                        <div class="col-md-12">
                         <div class="form-group">
                            <label for="hea">Highest Educational Attainment</label>
                            <div class="input-group">
                              <input type="text" name="hea" id="hea" class="form-control" placeholder="Highest Educational Attainment" value="';
                               echo $rowb['hea'];
                              echo '" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="age">Age</label>
                            <div class="input-group">
                              <input type="number" name="age" id="age" class="form-control" placeholder="Age" value="';
                               echo $rowb['age'];
                              echo '"required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="civil">Civil Status</label>
                            <div class="input-group">
                              <select class="form-control" name="civil">';
                                
                              $sqld = "SELECT * FROM tbl_legend_civil_status";
                              $resultd = $conn->query($sqld);
                              if ($resultd->num_rows > 0){
                                while($rowd = $resultd->fetch_assoc()){
                                  if($rowd['legend']==$rowb['civil']){
                                      echo ' <option value="';
                                       echo $rowd['legend'];
                                      echo '" selected="selected">';
                                      echo $rowd['legend'];
                                     echo '</option>';
                                  }else{
                                      echo ' <option value="';
                                   echo $rowd['legend'];
                                  echo '">';
                                  echo $rowd['legend'];
                                 echo '</option>';
                                  }
                                
                                }
                              }
                               
                              echo '</select>
                        
                            </div>
                          </div>
                      </div>
                         <div class="col-md-12">
                         <div class="form-group">
                            <label for="civil">Living Status</label>
                            <div class="input-group">
                              <select class="form-control" name="livingstatus">';
                               
                              $sqld = "SELECT * FROM tbl_siblings_living";
                              $resultd = $conn->query($sqld);
                              if ($resultd->num_rows > 0){
                                while($rowd = $resultd->fetch_assoc()){
                                  if($rowd['legend']==$rowb['livingwith']){
                                     echo ' <option value="';
                                   echo $rowd['legend'];
                                  echo '" selected="selected">';
                                  echo $rowd['legend'];
                                 echo '</option>';
                                  }else{
                                     echo ' <option value="';
                                   echo $rowd['legend'];
                                  echo '">';
                                  echo $rowd['legend'];
                                 echo '</option>';
                                  }
                                 
                                }
                              }
                                
                              echo '</select>
                          
                            </div>
                          </div>
                      </div>';
                       echo '<div class="col-md-12">
                         <div class="form-group">
                          <label for="occupation"> Bursary/Grant</label>
                            <div class="input-group">';
                     
                                echo' <input type="text" id="grant" name="grant" class="form-control" placeholder="Bursary/Gant/Enter N/A if none" value="';
                                  echo $rowb['typegrant'];
                                 echo '" required>';
                        echo '</div>
                          </div>
                      </div>';
                         
                       echo '<div class="col-md-12">
                         <div class="form-group">
                          <label for="occupation"> Occupation</label>
                            <div class="input-group">
                                 <input type="text" id="occupation" name="occupation" class="form-control" placeholder="Occupation" value="';
                                  echo $rowb['occupation'];
                                 echo '">
                            </div>
                          </div>
                      </div>'; 

                       if(strlen($rowb['monthly_salary'])<=0){
                          $s_salary=0;
                       }else{
                          if(is_numeric($rowb['monthly_salary'])){
                            $s_salary = $rowb['monthly_salary'];
                          }else{
                             if(strpos($rowb['monthly_salary'], ",") !== false){
                                $s_salary = str_replace(",","",$rowb['monthly_salary']);
                             }else{
                                 $s_salary=0;
                             }   
                          }
                       }
                      
                      echo '<div class="col-md-12">
                         <div class="form-group">
                          <label for="monthly_salary"> If Working, Monthly Salary</label>
                            <div class="input-group">
                                 <input type="number" id="monthly_salary" name="monthly_salary" class="form-control" placeholder="Monthly Salary" value="';

                                  echo $s_salary;
                                 echo '">
                            </div>
                          </div>
                      </div> ';
                     echo ' <div class="col-md-12">
                         <div class="form-group">
                          <label for="occupation"> If Working, Share Monthly Salary?</label>
                            <div class="input-group">
                               <select class="form-control" name="share">';
                                 if($rowb['help']=="NO"){
                                   echo '<option value="NO" selected="selected">NO</option>';
                                   echo '<option value="YES">YES</option>';
                                 }else{
                                     echo '<option value="YES" selected="selected">YES</option>';
                                    echo '<option value="NO">NO</option>';
                                 }
                                
                               echo '</select>
                            </div>
                          </div>
                      </div> 
         
         
           
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
}
}
?>
<?php
$sqlc = "SELECT * FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND
application_no='$application_no'";
$resultc = $conn->query($sqlc);
if ($resultc->num_rows > 0){
  while($rowc = $resultc->fetch_assoc()){
echo '<div class="modal fade" id="removeModal';
echo $rowc['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form action="removeSiblingsInfoRegister.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Siblings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" name="id" value="';
      echo $rowc['id'];
      echo '">
       <input type="hidden" name="userid" value="';
      echo $userid;
      echo '">
        Press [Yes] if you want to remove this siblings.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Yes</button>
      </div>
    </div>
  </div>
  </form>
</div>';
}
}
?>

<div class="modal fade" id="addSiblings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Siblings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="registersiblingsInformation.php" method="POST">
      <div class="modal-body">
        <div class="row">
                    <input type="hidden" name="userid" value="<?php echo $userid?>">
                                <input type="hidden" name="academic_year" value="<?php echo $academic_year?>">
                                <input type="hidden" name="application_no" value="<?php echo $application_no?>">
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="firstname">Full name</label>
                            <div class="input-group">
                              <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required>
                          
                            </div>
                          </div>
                      </div>
                        <div class="col-md-12">
                         <div class="form-group">
                            <label for="hea">Highest Educational Attainment</label>
                            <div class="input-group">
                              <input type="text" name="hea" id="hea" class="form-control" placeholder="Highest Educational Attainment" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="age">Age</label>
                            <div class="input-group">
                              <input type="number" name="age" id="age" class="form-control" placeholder="Age" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="civil">Civil Status</label>
                            <div class="input-group">
                              <select class="form-control" name="civil">
                                <?php
                              $sqld = "SELECT * FROM tbl_legend_civil_status";
                              $resultd = $conn->query($sqld);
                              if ($resultd->num_rows > 0){
                                while($rowd = $resultd->fetch_assoc()){
                                  echo ' <option value="';
                                   echo $rowd['legend'];
                                  echo '">';
                                  echo $rowd['legend'];
                                 echo '</option>';
                                }
                              }
                                ?>
                              </select>
                           <!--    <input type="text" name="civil" id="civil" class="form-control" placeholder="Civil Status" required> -->
                            </div>
                          </div>
                      </div>
                         <div class="col-md-12">
                         <div class="form-group">
                            <label for="civil">Living Status</label>
                            <div class="input-group">
                              <select class="form-control" name="livingstatus">
                                <?php
                              $sqld = "SELECT * FROM tbl_siblings_living";
                              $resultd = $conn->query($sqld);
                              if ($resultd->num_rows > 0){
                                while($rowd = $resultd->fetch_assoc()){
                                  echo ' <option value="';
                                   echo $rowd['legend'];
                                  echo '">';
                                  echo $rowd['legend'];
                                 echo '</option>';
                                }
                              }
                                ?>
                              </select>
                           <!--    <input type="text" name="civil" id="civil" class="form-control" placeholder="Civil Status" required> -->
                            </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                         <div class="form-group">
                          <label for="grant"> Grant Enjoyed</label>
                            <div class="input-group">
                                 <input type="text" id="grant" name="grant" class="form-control" value="N/A"placeholder="Bursary/Gant/Enter N/A if none" required>
                            </div>
                          </div>
                      </div> 
                       <div class="col-md-12">
                         <div class="form-group">
                          <label for="occupation"> Occupation</label>
                            <div class="input-group">
                                 <input type="text" id="occupation" name="occupation" class="form-control" placeholder="Occupation">
                            </div>
                          </div>
                      </div> 
                      <div class="col-md-12">
                         <div class="form-group">
                          <label for="monthly_salary"> If Working, Monthly Salary</label>
                            <div class="input-group">
                                 <input type="number" id="monthly_salary" name="monthly_salary" class="form-control" placeholder="Monthly Salary">
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12">
                         <div class="form-group">
                          <label for="occupation"> If Working, Share Monthly Salary?</label>
                            <div class="input-group">
                               <select class="form-control" name="share">
                                  <option value="NO">NO</option>
                                 <option value="YES">YES</option>
                               </select>
                            </div>
                          </div>
                      </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form> 
    <!-- End of form -->
    </div>
  </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assetss/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assetss/vendors/js/vendor.bundle.addons.js"></script>
     <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../assetss/js/shared/off-canvas.js"></script>
    <script src="../assetss/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assetss/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>