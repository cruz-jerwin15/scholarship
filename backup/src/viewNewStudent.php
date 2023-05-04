<?php session_start();
header("Content-Type: text/html; charset=LATIN-1");
require "config.php";
$status="APPROVED";
$userid=$_GET['id'];

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
$hw_place_of_work="";
$hw_hea="";
$hw_ami="";


$g_fullname="";
$g_relationship="";
$g_address="";
$g_age="";
$g_occupation="";
$g_contactnumber="";

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
      }else{
         // alert(status);

         document.getElementById('g_fullname').disabled=false;
        document.getElementById('g_relationship').disabled=false;
        document.getElementById('g_address').disabled=false;
        document.getElementById('g_contactnumber').disabled=false;
        document.getElementById('g_age').disabled=false;
        document.getElementById('g_occupation').disabled=false;
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
                    <?php
                      if($_SESSION['studenttype']=="fullscholar"){
                        echo "New College Full Scholar Applicant Information";
                      }else  if($_SESSION['studenttype']=="collegerecipient"){
                        echo "New College Recipient Applicant Information";
                      }else  if($_SESSION['studenttype']=="shscholar"){
                        echo "New Senior High School Applicant Information";
                      }

                    ?>

                  </h4>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="page-header-toolbar">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="col-md-12">
                    <div class="row">
                       
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-8" style="text-align:center;">
                              <center><img src="profile/<?php echo $image;?>" class="img-xs rounded-circle"  style="width:250px;height:250px"/></center>
                          </div>
                           <div class="col-md-2">
                          </div>
                           <div class="col-md-2">
                          </div>
                         
                           <div class="col-md-2">
                          </div>
                        <!-- </form> -->
                        </div>
                      </div>
               
                      <div class="col-md-12" style="margin-top:4em">
                          <div class="row">
                             <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Personal Information</label>

                        </div>
                      </div>
                            <div class="col-md-2">
                              
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                      
        <form class="form-horizontal" action="updateInformation.php" method="post">            
              <div class="col-md-12">
                  <div class="row">
                   <div class="col-md-12">
                    <div class="form-group">
                      
                      <label >Email</label>
                       <input type="hidden" name="userid" value="<?php echo $userid?>">
                       <input type="hidden" name="email" value="<?php echo $email?>">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="true" 
                        value="<?php echo $email?>"
                        disabled>
                    </div>
                  </div>
                 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Academic Year</label>
                        <input type="hidden" name="academic_year" value="<?php echo $academic_year?>">
                        <input type="text"  class="form-control" placeholder="Academic Year (e.g. 2019-2020)" required="true" 
                        value="<?php echo $academic_year?>"
                        disabled>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Control Number</label>
                       <input type="hidden" name="control_number" value="<?php echo $application_no?>">
                        <input type="text" name="control_number" class="form-control" placeholder="Control number" required="true"  
                        value="<?php 
                          if(strlen($applicant_number)==1){
                            echo "000".$applicant_number;
                          }else if(strlen($applicant_number)==2){
                            echo "00".$applicant_number;
                          } else if(strlen($applicant_number)==3){
                            echo "0".$applicant_number;
                          } else if(strlen($applicant_number)==4){
                            echo $applicant_number;
                          } 
                          

                        ?>"
                        disabled>
                    </div>
                  </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Number of Times Applied </label>
                        <input type="text" name="firstname" class="form-control" placeholder="Times applied" required="true" value="<?php echo $number_try?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >First Name <span style="color:red;">*</span></label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First name" required="true" onChange="changeColor()"  
                        value="<?php echo $firstname?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Middle Name<span style="color:red;">*</span></label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name" required="true" id="middlename" onChange="changeColor()" 
                        value="<?php echo $middlename?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Last Name<span style="color:red;">*</span></label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name" required="true" id="lastname" onChange="changeColor()"  
                        value="<?php echo $lastname?>">
                    </div>
                  </div>
                  
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Birthday<span style="color:red;">*</span></label>
                        <input type="date" name="birthday" class="form-control" placeholder="2019-10-01" required="true"  id="birthday" onChange="changeColor()"
                        value="<?php echo $birthday?>">
                    </div>
                  </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label >Birth Place<span style="color:red;">*</span></label>
                        <input type="text" name="birthplace" class="form-control" placeholder="Birthplace" required="true" id="birthplace" onChange="changeColor()"
                        value="<?php echo $birthplace?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Birth Order<span style="color:red;">*</span></label>
                        <select name="birthorder" id="birthorder" onChange="changeColor()" class="form-control">
                          <?php
                             $sql9 = "SELECT * FROM tbl_legend_birth_order";
                            $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                if($row9['legend']==$birthorder){
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
                      <label >Civil<span style="color:red;">*</span></label>
                        <select name="civil" class="form-control">
                          <?php
                            if($civil=="SINGLE"){
                              echo '<option value="SINGLE" selected="selected">Single</option>';
                            }else{
                              echo '<option value="SINGLE">Single</option>';
                            }
                          ?>
                           <?php
                            if($civil=="MARRIED"){
                              echo '<option value="MARRIED" selected="selected">Married</option>';
                            }else{
                              echo '<option value="MARRIED">Married</option>';
                            }
                          ?> 
                          <?php
                            if($civil=="SINGLE PARENT"){
                              echo '<option value="SINGLE PARENT" selected="selected">Single Parent</option>';
                            }else{
                              echo '<option value="SINGLE PARENT">Single Parent</option>';
                            }
                          ?>  
                            
                        </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Gender<span style="color:red;">*</span></label>
                        <select name="gender" class="form-control">
                          <?php
                            if($gender=="MALE"){
                              echo '<option value="MALE" selected="selected">Male</option>';
                            }else{
                              echo '<option value="MALE">Male</option>';
                            }
                          ?>
                           <?php
                            if($gender=="FEMALE"){
                              echo '<option value="FEMALE" selected="selected">Female</option>';
                            }else{
                              echo '<option value="FEMALE">Female</option>';
                            }
                          ?>  
                            
                        </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Citizenship<span style="color:red;">*</span></label>
                        <input type="text" name="citizen" class="form-control" placeholder="Citizenship" required="true"  
                        value="<?php echo $citizen?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Religion<span style="color:red;">*</span></label>
                        <input type="text" name="religion" class="form-control" placeholder="Religion" required="true"  
                        value="<?php echo $religion?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >House Number<span style="color:red;">*</span></label>
                        <input type="text" name="housenumber" class="form-control" placeholder="House Number" required="true"  
                        value="<?php echo $housenumber?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Street<span style="color:red;">*</span></label>
                        <input type="text" name="street" class="form-control" placeholder="Street" required="true"  
                        value="<?php echo $street?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Barangay<span style="color:red;">*</span></label>
                      <select name="barangay" class="form-control">
                        <?php

                            $sqla = "SELECT * FROM tbl_barangay";
                            $resulta = $conn->query($sqla);
                            while($rowa = $resulta->fetch_assoc()){
                                if($barangay==$rowa['barangay']){
                                  echo '<option value="';
                                  echo $rowa['barangay'];
                                  echo '" selected="selected">';
                                   echo $rowa['barangay'];
                                  echo '</option>';
                                }else{
                                  echo '<option value="';
                                  echo $rowa['barangay'];
                                  echo '">';
                                   echo $rowa['barangay'];
                                  echo '</option>';
                                }
                            }
                        ?>
                      </select>


                     
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Year(s) of Residency in Sto.Tomas<span style="color:red;">*</span></label>
                        <input type="number" name="years_residency" class="form-control" placeholder="Years of Residency" required="true"  
                        value="<?php echo $years_residency?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Contact Number<span style="color:red;">*</span></label>
                        <input type="text" name="contactnumber" class="form-control" placeholder="Contact Number" required="true"  
                        value="<?php echo $contactnumber?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Number of Times Applied<span style="color:red;">*</span></label>
                        <input type="number" name="number_try" id="number_try" class="form-control" placeholder="Number of times applied" required="true"  
                        value="<?php echo $number_try?>">
                    </div>
                  </div>
                  <?php
                    if($_SESSION['studenttype']=="shscholar"){
                      echo ' <div class="col-md-12">
                        <div class="form-group">
                          <label >Track Intended to Take<span style="color:red;">*</span></label>
                            <input type="text" name="course" class="form-control" placeholder="Track" required="true"  
                            value="';
                             echo $course;
                             echo '">
                        </div>
                      </div>';
                       echo '<div class="col-md-12">
                    <div class="form-group">
                      <label >Grade<span style="color:red;">*</span></label>
                        <select name="years" class="form-control">';
                         
                            if($years=="GRADE 11"){
                              echo '<option value="GRADE 11" selected="selected">GRADE 11</option>';
                            }else{
                              echo '<option value="GRADE 11">GRADE 11</option>';
                            }
                         
                          
                            
                         
                           
                        
                            
                        echo '</select>
                    </div>
                  </div>';
                    }else{
                      if($_SESSION['studenttype']=="fullscholar"){
                           echo ' <div class="col-md-12">
                        <div class="form-group">
                          <label >Course Intended to Take<span style="color:red;">*</span></label>
                            <input type="text" name="course" class="form-control" placeholder="Course" required="true"  
                            value="';
                            echo $course;
                            echo '">
                        </div>
                      </div>';
                      echo '<div class="col-md-12">
                    <div class="form-group">
                      <label >Year Level<span style="color:red;">*</span></label>
                        <select name="years" class="form-control">';
                         
                            if($years=="1ST"){
                              echo '<option value="1ST" selected="selected">1st</option>';
                            }else{
                              echo '<option value="1ST">1st</option>';
                            }
                         
                          
                           
                        
                            
                        echo '</select>
                    </div>
                  </div>';
                      }else{
                         echo ' <div class="col-md-12">
                        <div class="form-group">
                          <label >Course Intended to Take<span style="color:red;">*</span></label>
                            <input type="text" name="course" class="form-control" placeholder="Course" required="true"  
                            value="';
                            echo $course;
                            echo '">
                        </div>
                      </div>';
                      echo '<div class="col-md-12">
                    <div class="form-group">
                      <label >Year Level<span style="color:red;">*</span></label>
                        <select name="years" class="form-control">';
                         
                            if($years=="1ST"){
                              echo '<option value="1ST" selected="selected">1st</option>';
                            }else{
                              echo '<option value="1ST">1st</option>';
                            }
                         
                          
                            if($years=="2ND"){
                              echo '<option value="2ND" selected="selected">2nd</option>';
                            }else{
                              echo '<option value="2ND">2nd</option>';
                            }
                         
                            if($years=="3RD"){
                              echo '<option value="3RD" selected="selected">3rd</option>';
                            }else{
                              echo '<option value="3RD">3rd</option>';
                            }
                        
                            if($years=="4TH"){
                              echo '<option value="4TH" selected="selected">4th</option>';
                            }else{
                              echo '<option value="4TH">4th</option>';
                            }
                         
                            if($years=="5TH"){
                              echo '<option value="5TH" selected="selected">5th</option>';
                            }else{
                              echo '<option value="5TH">5th</option>';
                            }
                        
                            
                        echo '</select>
                    </div>
                  </div>';
                      }
                     
                    }

                  ?>
                 
                  <?php
                    if($_SESSION['studenttype']=="fullscholar"){
                      echo ' <div class="col-md-12">
                      <div class="form-group">
                        <label >School Intended To Enrol<span style="color:red;">*</span></label>
                         <select name="school"class="form-control">';
                         if($school=="FAITH Colleges"){
                            echo '<option value="FAITH Colleges" selected="selected">FAITH Colleges</option>';
                         }else{
                            echo '<option value="FAITH Colleges">FAITH Colleges</option>';
                         }
                         if($school=="Tanauan Institute"){
                            echo '<option value="Tanauan Institute" selected="selected">Tanauan Institute</option>';
                         }else{
                            echo '<option value="Tanauan Institute">Tanauan Institute</option>';
                         }
                         if($school=="Marcelino Fule Memorial College"){
                            echo '<option value="Marcelino Fule Memorial College" selected="selected">Marcelino Fule Memorial College</option>';
                         }else{
                            echo '<option value="Marcelino Fule Memorial College">Marcelino Fule Memorial College</option>';
                         }

                         echo '</select>
                         
                      </div>
                    </div>';
                    }else{
                      echo ' <div class="col-md-12">
                      <div class="form-group">
                        <label >School Intended To Enrol<span style="color:red;">*</span></label>
                          <input type="text" name="school" class="form-control" placeholder="School Name" required="true"  
                          value="';
                          echo $school;
                          echo '">
                      </div>
                    </div>';
                    }

                  ?>
                 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >School Type<span style="color:red;">*</span></label>
                        <select name="schooltype" class="form-control">
                          <?php
                           $sql9 = "SELECT * FROM tbl_legend_school";
                            $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$schooltype){
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
                       <label >School Address<span style="color:red;">*</span></label>
                        <input type="text" name="school_address" class="form-control" placeholder="School Address" required="true"  
                        value="<?php echo $school_address?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >Last School Attended<span style="color:red;">*</span></label>
                        <input type="text" name="last_school_attended" class="form-control" placeholder="Last School" required="true"  
                        value="<?php echo $last_school_attended?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >Last School Attended Address<span style="color:red;">*</span></label>
                        <input type="text" name="last_school_address" class="form-control" placeholder="School Address" required="true"  
                        value="<?php echo $last_school_address?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >General Weighted Average<span style="color:red;">*</span></label>
                        <input type="text" name="gwa" class="form-control" placeholder="G.W.A." required="true"  
                        value="<?php echo $gwa?>">
                    </div>
                  </div>
             <!--     <div class="col-md-12">
                            <div class="form-group">
                              <label >Exam Rating</label> -->
                                <input type="hidden" name="exam_rating" class="form-control" placeholder="Exam Rating" required="true" value="<?php echo $exam_rating?>">  
                         
                    
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Living With family<span style="color:red;">*</span></label>
                        <select name="living_with_family" id="living_with_family" onChange="disableGuardian()" class="form-control">
                            <?php 
                              if($living_with_family=="YES"){
                                 echo '<option value="YES" selected="selected">Yes</option>';
                              }else{
                                echo '<option value="YES">Yes</option>';
                              }
                            ?>
                             <?php 
                              if($living_with_family=="NO"){
                                  echo '<option value="NO" selected="selectected">No</option>';
                              }else{
                                echo '<option value="NO">No</option>';
                              }
                            ?>
                           
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label >Total Number of Family<span style="color:red;">*</span></label>
                        <input type="number" name="total_number_family" class="form-control" placeholder="Total Number of Family" required="true"  
                        value="<?php echo $total_number_family?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label >Source of Living<span style="color:red;">*</span></label>
                        <input type="text" name="source_of_living" class="form-control" placeholder="Source of Living" required="true"  
                        value="<?php echo $source_of_living?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >House<span style="color:red;">*</span></label>
                        <select name="house" id="house" class="form-control" onChange="disableHouse()">
                          <?php
                            if($house=="OWNED BY FAMILY"){
                              echo '<option value="OWNED BY FAMILY" selected="selected">Owned by Family</option>';
                            }else{
                              echo '<option value="OWNED BY FAMILY">Owned by Family</option>';
                            }

                          ?>
                            <?php
                            if($house=="OWNED BY RELATIVES"){
                              echo '<option value="OWNED BY RELATIVES" selected="selected">Owned by Relatives</option>';
                            }else{
                              echo '<option value="OWNED BY RELATIVES">Owned by Relatives</option>';
                            }

                          ?>
                          <?php
                            if($house=="RENTING"){
                              echo '<option value="RENTING" selected="selected">Renting</option>';
                            }else{
                              echo '<option value="RENTING">Renting</option>';
                            }

                          ?>
                          <?php
                            if($house=="PAYING-TO-OWN"){
                              echo '<option value="PAYING-TO-OWN" selected="selected">Paying-to-own</option>';
                            }else{
                              echo '<option value="PAYING-TO-OWN">Paying-to-own</option>';
                            }

                          ?> 
                            
                        </select>
                    </div>
                  </div> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>How much paying monthly (If renting or paying-to-own)</label>
                       <input type="text" name="pay_monthly" id="pay_monthly" class="form-control" placeholder="How much paying monthly"  
                        value="<?php echo $pay_monthly?>">  
                    </div>
                  </div> 


 
                  

              </div>
          </div>
        </form>
                                </div>
                            </div>
                            <div class="col-md-2">
                              
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <hr>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Educational Background</label>

                        </div>
                      </div>
                      <!-- Start Educational Background -->
                      <form method="POST" action="educationalbackground.php">
                       <div class="col-md-12">
                          <div class="row">

                            <div class="col-md-2">
                              
                            </div>
                            <div class="col-md-8">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="hidden" name="userid" value="<?php echo $userid?>">
                                        <input type="hidden" name="academic_year" value="<?php echo $academic_year?>">
                                        <input type="hidden" name="application_no" value="<?php echo $application_no?>">
                                        <?php
                                           if(($_SESSION['studenttype']=="fullscholar")||($_SESSION['studenttype']=="shscholar")){
                                            echo ' <label >Graduating this semester/term?<span style="color:red;">*</span></label>
                                          <select name="isgraduating" class="form-control">';
                                              if($isgraduating=="YES"){
                                                echo ' <option value="YES" selected="selected">Yes</option>';
                                              }else{
                                                echo ' <option value="YES">Yes</option>';
                                              }

                                               if($isgraduating=="NO"){
                                                echo ' <option value="NO" selected="selected">No</option>';
                                              }else{
                                                echo ' <option value="NO">No</option>';
                                              }
                                              echo '</select>';
                                          }

                                        ?>
                                       
                                            
                                           
                                        
                                      </div>
                                  </div>
                                  <?php

                                 if(($_SESSION['studenttype']=="fullscholar")||($_SESSION['studenttype']=="shscholar")){
                                      echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >If graduating, are you graduating with honors? If not graduating, do not answer this.<span style="color:red;">*</span></label>
                                          <select name="ishonor" class="form-control">';
                                           
                                              if($ishonor=="YES"){
                                                echo ' <option value="YES" selected="selected">Yes</option>';
                                              }else{
                                                echo ' <option value="YES">Yes</option>';
                                              }
                                           
                                           
                                              if($ishonor=="NO"){
                                                echo ' <option value="NO" selected="selected">No</option>';
                                              }else{
                                                echo ' <option value="NO">No</option>';
                                              }
                                            
                                        echo '</select>
                                      </div>
                                  </div>';
                                  }

                                  ?>
                                 <?php
                                    if(($_SESSION['studenttype']=="fullscholar")||($_SESSION['studenttype']=="shscholar")){
                                        echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >If not graduating, how many sem/term needed including the current sem/term?<span style="color:red;">*</span></label>
                                         <input type="number" name="how_many_term" class="form-control" placeholder="How many sem/term"
                                         value="';
                                          echo $how_many_term;
                                          echo '">   
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <hr>
                                  </div>';

                                     }

                                 ?>
                                 <?php
                                  if(($_SESSION['studenttype']=="fullscholar")||($_SESSION['studenttype']=="shscholar")){

                                  }else{
                                    echo '  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight:600;">College</label>
                                      </div>
                                    </div>';
                                    echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended<span style="color:red;">*</span></label>
                                         <input type="text" name="name_school_college" class="form-control" placeholder="Name of School" value="';
                                         echo $name_school_college;
                                         echo '" required="true">  
                                      </div>
                                  </div>';
                                  echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type<span style="color:red;">*</span></label>
                                         <select name="school_type_college" class="form-control">';
                                          $sql9 = "SELECT * FROM tbl_legend_school";
                            $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$school_type_college){
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
                                          
                                             
                                           
                                         echo '</select>
                                      </div>
                                  </div>';
                                  echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Address<span style="color:red;">*</span></label>
                                          <input type="text" name="school_address_college" class="form-control" placeholder="Address of School" value="';
                                           echo $school_address_college;
                                           echo '" required="true">
                                      </div>
                                  </div>';
                                  echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level<span style="color:red;">*</span></label>
                                         <select name="year_level_college" class="form-control">';
                        $stat="COLLEGE";
                        $sql9 = "SELECT * FROM tbl_yearlevel WHERE status='$stat'";
                                         $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$year_level_college){
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


                            echo '</select>';

                                          //  echo $year_level_college;
                                          //  echo '" required="true">
                                      echo '</div>
                                  </div>';
                                  echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Number of Honors/Award</label>
                                          <input type="number" name="honor_college" class="form-control" placeholder="Number of honors/award" value="';
                                           echo $honor_college;
                                           echo '">
                                      </div>
                                  </div>';
                                  echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >List of Honors/Award Received (if any,must separated with /)</label>
                                          <input type="text" name="list_honor_college" class="form-control" placeholder="Number of honors/award" value="';
                                           echo $list_honor_college;
                                           echo '">
                                      </div>
                                  </div>';
                                  echo ' <div class="col-md-12">
                                      <hr>
                                  </div>';
                                  }


                                 ?>
                                
                                   
                                  
                                 
                                  
                                 
                                  
                                  <!-- End COllege -->
                                 <?php
                                   if($_SESSION['studenttype']=="shscholar"){

                                  }else{
                                    echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight:600;">Senior High School</label>
                                      </div>
                                    </div>';
                                    echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended<span style="color:red;">*</span></label>
                                         <input type="text" name="name_school_sh" class="form-control" placeholder="Name of School" value="';
                                            echo $name_school_sh;
                                            echo '" >  
                                      </div>
                                  </div>';
                                  echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type<span style="color:red;">*</span></label>
                                         <select name="school_type_sh" class="form-control">';
                                         $sql9 = "SELECT * FROM tbl_legend_school";
                                              $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$school_type_sh){
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
                                          
                                         echo '</select>
                                      </div>
                                  </div>';
                                  echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Address<span style="color:red;">*</span></label>
                                          <input type="text" name="school_address_sh" class="form-control" placeholder="Address of School" value="';
                                            echo $school_address_sh;
                                            echo '" >
                                      </div>
                                  </div>';
                                  echo '<div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level<span style="color:red;">*</span></label>
                                         <select name="year_level_sh" class="form-control">';
                        $stat="SH";
                        $sql9 = "SELECT * FROM tbl_yearlevel WHERE status='$stat'";
                                         $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$year_level_sh){
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


                            echo '</select>';
                                          
                                      echo '</div>
                                  </div>';
                                  echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Number of Honors/Award</label>
                                          <input type="number" name="honor_sh" class="form-control" placeholder="Number of honors/award" value="';
                                             echo $honor_sh;
                                             echo '">
                                      </div>
                                  </div>';
                                  echo ' <div class="col-md-12">
                                      <div class="form-group">
                                        <label >List of Honors/Award Received (if any,must separated with "/")</label>
                                          <input type="text" name="list_honor_sh" class="form-control" placeholder="Number of honors/award" value="';
                                             echo $list_honor_sh;
                                             echo '">
                                      </div>
                                  </div>';
                                  echo '  <div class="col-md-12">
                                      <hr>
                                  </div>';
                                  }

                                 ?>
                                  
                                  
                                  
                                  
                                  
                                 
                                 
                                  <!-- End Senior High School -->
                                 
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight:600;">Junior High School<span style="color:red;">*</span></label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended<span style="color:red;">*</span></label>
                                         <input type="text" name="name_school_jh" class="form-control" placeholder="Name of School" value="<?php echo $name_school_jh?>" required="true"> 
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type<span style="color:red;">*</span></label>
                                         <select name="school_type_jh" class="form-control">
                                           <?php
                                            $sql9 = "SELECT * FROM tbl_legend_school";
                                             $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$school_type_jh){
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
                                        <label >School Address<span style="color:red;">*</span></label>
                                          <input type="text" name="school_address_jh" class="form-control" placeholder="Address of School" value="<?php echo $school_address_jh?>" required="true">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level<span style="color:red;">*</span></label>
                                        <select name="year_level_jh" class="form-control">
                                          <?php
                        $stat="JH";
                        $sql9 = "SELECT * FROM tbl_yearlevel WHERE status='$stat'";
                                         $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$year_level_jh){
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


                            echo '</select>';
                            ?>
                                         
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Number of Honors/Award</label>
                                          <input type="number" name="honor_jh" class="form-control" placeholder="Number of honors/award" value="<?php echo $honor_jh?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >List of Honors/Award Received (if any,must separated with '/')</label>
                                          <input type="text" name="list_honor_jh" class="form-control" placeholder="Number of honors/award" value="<?php echo $list_honor_jh?>">
                                      </div>
                                  </div>
                                  <!-- End of Junior High school -->
                                   <div class="col-md-12">
                                      <hr>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="font-weight:600;">Elementary<span style="color:red;">*</span></label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended<span style="color:red;">*</span></label>
                                         <input type="text" name="name_school_elementary" class="form-control" placeholder="Name of School" value="<?php echo $name_school_elementary?>" required="true"> 
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type<span style="color:red;">*</span></label>
                                         <select name="school_type_elementary" class="form-control">
                                           <?php
                                            $sql9 = "SELECT * FROM tbl_legend_school";
                                             $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$school_type_elementary){
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
                                        <label >School Address<span style="color:red;">*</span></label>
                                          <input type="text" name="school_address_elementary" class="form-control" placeholder="Address of School" value="<?php echo $school_address_elementary?>" required="true">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level<span style="color:red;">*</span></label>
                                         <select name="year_level_elementary" class="form-control">
                                          <?php
                        $stat="ES";
                        $sql9 = "SELECT * FROM tbl_yearlevel WHERE status='$stat'";
                                         $result9 = $conn->query($sql9);
                            if ($result9->num_rows > 0){
                              while($row9 = $result9->fetch_assoc()){
                                 if($row9['legend']==$year_level_elementary){
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


                            echo '</select>';
                            ?>
                                        
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Number of Honors/Award</label>
                                          <input type="number" name="honor_elementary" class="form-control" placeholder="Number of honors/award" value="<?php echo $honor_elementary?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >List of Honors/Award Received (if any,must separated with '/')</label>
                                          <input type="text" name="list_honor_elementary" class="form-control" placeholder="Number of honors/award" value="<?php echo $list_honor_elementary?>">
                                      </div>
                                  </div>
                                                 
                                  
                              </div>
                            </div>
                            <div class="col-md-2">
                            
                            </div>
                          </div>
                       </div>
                     </form>
                       <!-- End Educational Background -->
                       <!-- Family Background -->
                        <div class="col-md-12">
                          <hr>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Family Background</label>

                        </div>
                      </div>
                    <form method="POST" action="familyInformation.php">
                      <div class="col-md-12">
                          <div class="row">

                            <div class="col-md-2">
                                <input type="hidden" name="userid" value="<?php echo $userid?>">
                                <input type="hidden" name="academic_year" value="<?php echo $academic_year?>">
                                <input type="hidden" name="application_no" value="<?php echo $application_no?>">
                            </div>
                            <div class="col-md-8">
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
                                        <label >Address </label>
                                          <input type="text" name="f_address" id="f_address" class="form-control" placeholder="Address" 
                                          value="<?php echo $f_address?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Age </label>
                                          <input type="number" name="f_age" id="f_age" class="form-control" placeholder="Age" 
                                          value="<?php echo $f_age?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number </label>
                                          <input type="text" name="f_contact_number" id="f_contact_number" class="form-control" placeholder="Contact Number" 
                                          value="<?php echo $f_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation If not in the list, choose Others</label>

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
                                        <label >Highest Educational Attainment </label>
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
                                        <label >Average Monthly Income </label>
                                          <input type="text" name="f_ami" id="f_ami" class="form-control" placeholder="Average Monthly Income" 
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
                                        <label >Address </label>
                                          <input type="text" name="m_address" id="m_address" class="form-control" placeholder="Address" value="<?php echo $m_address?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Age </label>
                                          <input type="number" name="m_age" id="m_age" class="form-control" placeholder="Age" 
                                          value="<?php echo $m_age?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number </label>
                                          <input type="text" name="m_contact_number" id="m_contact_number" class="form-control" placeholder="Contact Number" value="<?php echo $m_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation If not in the list, choose Others</label>
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
                                        <label >Average Monthly Income </label>
                                          <input type="text" name="m_ami" id="m_ami" class="form-control" placeholder="Average Monthly Income" value="<?php echo $m_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Mother -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Houseband/Wife:Choose Living, Deceased or N/A</label>
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
                                        <label style="font-weight: 600;">Husband's/Wife Full Name</label>
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
                                        <label >Occupation </label>
                                          <input type="text" name="hw_occupation" id="hw_occupation" class="form-control" placeholder="Occupation"  
                                          value="<?php echo $hw_occupation?>">

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
                                          <input type="text" name="hw_ami" id="hw_ami" class="form-control" placeholder="Average Monthly Income"v
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
                                        <label >Occupation</label>
                                          <input type="text" name="g_occupation" id="g_occupation" class="form-control" placeholder="Occupation" value="<?php echo $g_occupation?>">
                                      </div>
                                  </div>
                                  <!-- End Guardian -->
                                
                                   
                                </div>
                            </div>
                            <div class="col-md-2">
                              
                            </div>
                          </div>
                      </div>
                    </form>
                       <!-- End Family Background -->
                    </div>
                  <!-- End Personal Information -->
                   

                       <div class="col-md-12"><hr></div>
                       
                      
                       <div class="col-md-12">
                         <h4 class="card-title">List of Sibling(s)</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                   
                          </div>
                        </div>
                        <div class="col-md-12">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  
                                 
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $sqla = "SELECT * FROM tbl_siblingsinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                                    $resulta = $conn->query($sqla);
                                    if ($resulta->num_rows > 0){
                                      $count=1;
                                      while($rowa = $resulta->fetch_assoc()){
                                        echo '<tr>';
                                        echo '<td>';
                                        echo $count;
                                        echo '</td>';
                                        echo '<td>';
                                        echo $rowa['fullname'];
                                        echo '</td>';
                                       
                                  
                                        echo '</tr>';
                                        $count = $count+1;
                                      }
                                    }
                                ?>
                                
                              </tbody>
                          </table>
                        </div>

                        <div class="col-md-12"><hr></div>
                           <div class="col-md-12">
                           <h4 class="card-title">Additional Information</h4>
                      <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                     
                            </div>
                            <form  action="additionalInformation.php" method="post">
                            <div class="col-md-12">
                                  <div class="row">
                                    <input type="hidden" name="userid" 
                                    value="<?php echo $userid?>">
                                     <input type="hidden" name="academic_year" 
                                    value="<?php echo $academic_year?>">
                                     <input type="hidden" name="application_no" 
                                    value="<?php echo $application_no?>">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Informed Thru<span style="color:red;">*</span></label>
                                                 <select name="informed" id="informed" onChange="getInformed()" class="form-control">
                                                  <?php
                                                    $sqla = "SELECT * FROM tbl_legend_informed";
                                  $resulta = $conn->query($sqla);
                                    if ($resulta->num_rows > 0){
                                      while($rowa = $resulta->fetch_assoc()){
                                        if($informed==$rowa['legend']){
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

                                    }

                                                  ?>
                                                 
                                                 
                                                 </select>
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Please add thename of officials who informed you<span style="color:red;">*</span></label>
                                                <input type="text" name="nameofficial"
                                                id="nameofficial"
                                                placeholder="Enter name of officials"
                                                value="<?php echo $officialname?>" class="form-control">
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Working Student<span style="color:red;">*</span></label>
                                                 <select name="working_student" class="form-control">
                                                  <?php
                                                    if($working_student=="YES"){
                                                      echo '<option value="YES" selected="YES">Yes</option>';
                                                    }else{
                                                      echo '<option value="YES">Yes</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($working_student=="NO"){
                                                      echo '<option value="NO" selected="NO">NO</option>';
                                                    }else{
                                                      echo '<option value="NO">NO</option>';
                                                    }
                                                  ?>
                                                 
                                                 
                                                 </select>
                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Living With<span style="color:red;">*</span></label>
                                                 <select name="living_with" class="form-control">
                                                  <?php
                                                    if($living_with=="FAMILY"){
                                                      echo '<option value="FAMILY" selected="selected">FAMILY</option>';
                                                    }else{
                                                      echo '<option value="FAMILY">FAMILY</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($living_with=="GUARDIAN"){
                                                      echo '<option value="GUARDIAN" selected="selected">GUARDIAN</option>';
                                                    }else{
                                                      echo '<option value="GUARDIAN">GUARDIAN</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($living_with=="INDEPENDENT/SELF SUPPORTING"){
                                                      echo '<option value="INDEPENDENT/SELF SUPPORTING" selected="selected">INDEPENDENT/SELF SUPPORTING</option>';
                                                    }else{
                                                      echo '<option value="INDEPENDENT/SELF SUPPORTING">INDEPENDENT/SELF SUPPORTING</option>';
                                                    }
                                                  ?>
                                                 
                                                 </select>
                                              </div>
                                            </div>

                                           

                                           

                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Parents OFW<span style="color:red;">*</span></label>
                                                 <select name="parent_ofw" class="form-control">
                                                 <?php
                                                    if($parent_ofw=="YES"){
                                                      echo '<option value="YES" selected="YES">Yes</option>';
                                                    }else{
                                                      echo '<option value="YES">Yes</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($parent_ofw=="NO"){
                                                      echo '<option value="NO" selected="NO">NO</option>';
                                                    }else{
                                                      echo '<option value="NO">NO</option>';
                                                    }
                                                  ?>
                                                 </select>
                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Other Family Member/s OFW<span style="color:red;">*</span></label>
                                                 <select name="relatives_ofw" class="form-control">
                                                  <?php
                                                    if($relatives_ofw=="YES"){
                                                      echo '<option value="YES" selected="YES">Yes</option>';
                                                    }else{
                                                      echo '<option value="YES">Yes</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($relatives_ofw=="NO"){
                                                      echo '<option value="NO" selected="NO">NO</option>';
                                                    }else{
                                                      echo '<option value="NO">NO</option>';
                                                    }
                                                  ?>
                                                 </select>
                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Parents/Other Family Member PWD<span style="color:red;">*</span></label>
                                                 <select name="pwd" class="form-control">
                                                 <?php
                                                    if($pwd=="YES"){
                                                      echo '<option value="YES" selected="YES">Yes</option>';
                                                    }else{
                                                      echo '<option value="YES">Yes</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($pwd=="NO"){
                                                      echo '<option value="NO" selected="NO">NO</option>';
                                                    }else{
                                                      echo '<option value="NO">NO</option>';
                                                    }
                                                  ?>
                                                 </select>
                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Single Parent<span style="color:red;">*</span></label>
                                                 <select name="single_parent" class="form-control">
                                                  <?php
                                                    if($single_parent=="YES"){
                                                      echo '<option value="YES" selected="YES">Yes</option>';
                                                    }else{
                                                      echo '<option value="YES">Yes</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($single_parent=="NO"){
                                                      echo '<option value="NO" selected="NO">NO</option>';
                                                    }else{
                                                      echo '<option value="NO">NO</option>';
                                                    }
                                                  ?>
                                                 </select>
                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <label>Parents Separated<span style="color:red;">*</span></label>
                                                 <select name="parent_separated" class="form-control">
                                                  <?php
                                                    if($parent_separated=="YES"){
                                                      echo '<option value="YES" selected="YES">Yes</option>';
                                                    }else{
                                                      echo '<option value="YES">Yes</option>';
                                                    }
                                                  ?>
                                                  <?php
                                                    if($parent_separated=="NO"){
                                                      echo '<option value="NO" selected="NO">NO</option>';
                                                    }else{
                                                      echo '<option value="NO">NO</option>';
                                                    }
                                                  ?>
                                                 </select>
                                              </div>
                                            </div>
                                          

                                        </div>
                                       
                                    </div>
                                     <div class="col-md-2">
                                    </div>
                                  </div>
                            </div>
                          </form>
                 <!-- End of 8 -->
                     <?php
                       if(($stats=="PREAPPLICATION")||($stats=="REMOVED")){
                        $num = $_SESSION['step1']+$count2+$count3+$count4;
                      
                        if($num>=4){
                          echo '  <div class="col-md-12" style="text-align: right;margin-top:1em;">
                          <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#modalApprove">
                            Submit Application
                            </button>';
                        }else{
                          echo '  <div class="col-md-12" style="text-align: right;margin-top:1em;">
                          <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#modalApprove" disabled>
                            Submit Application
                            </button>';
                        }
                        

                      echo '</div>';
                      }

                     ?>
                     
                    </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
          

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

echo '<div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="updateSiblingsInformation.php" method="post">
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
                                  echo 'N/A';
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
                      </div> 
                      <div class="col-md-12">
                         <div class="form-group">
                          <label for="monthly_salary"> If Working, Monthly Salary</label>
                            <div class="input-group">
                                 <input type="text" id="monthly_salary" name="monthly_salary" class="form-control" placeholder="Monthly Salary" value="';
                                  echo $rowb['monthly_salary'];
                                 echo '">
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
     <form action="removeSiblingsInfo.php" method="post">
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
      <form action="siblingsInformation.php" method="POST">
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
                                 <input type="text" id="monthly_salary" name="monthly_salary" class="form-control" placeholder="Monthly Salary">
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