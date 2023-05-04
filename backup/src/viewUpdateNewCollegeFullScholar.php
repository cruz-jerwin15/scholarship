<?php session_start();

require "config.php";
$status="APPROVED";
$userid=$_GET['id'];

$academic_year ="";
$application_no ="";
$lastname ="";
$firstname="";
$middlename ="";
$birthday ="";
$birthplace ="";
$birthorder ="";
$gender ="";
$citizen ="";
$religion ="";
$housenumber ="";
$street ="";
$barangay ="";
$years_residency ="";

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

$m_fullname="";
$m_living="";
$m_address="";
$m_contact_number="";
$m_occupation="";
$m_place_of_work="";
$m_hea="";
$m_ami="";

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





$sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $email = $row['username'];
    $image = $row['image'];
    $application_no=$row['application_no'];
    $academic_year=$row['academic_year'];

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
      $citizen =$row1['citizenship'];
      $religion =$row1['religion'];
      $housenumber =$row1['housenumber'];
      $street =$row1['street'];
      $barangay =$row1['barangay'];
      $years_residency =$row1['years_residency'];

      $contactnumber =$row1['phone'];
      $course =$row1['course'];
      $years =$row1['gradelevel'];

      $school =$row1['school'];
      $schooltype =$row1['schooltype'];
      $school_address =$row1['school_address'];
      $last_school_attended =$row1['last_school'];
      $last_school_address =$row1['last_school_address'];
      $gwa =$row1['gwa'];
      $exam_rating =$row1['exam_rating'];

      $living_with_family =$row1['living_with_family'];
      $total_number_family =$row1['total_family_member'];
      $source_of_living =$row1['source_of_living'];
      $house =$row1['type_house'];
      $pay_monthly =$row1['monthly_rent'];
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

    }else{

    }

   
  }else{
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("loginform.php","_self")';
      echo '</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
  </script>
  </head>
  <body>
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
                  <?php
                    if($_SESSION['studenttype']=="fullscholar"){
                      echo ' <h4 class="page-title">New College Full Scholar Applicant Information</h4>';
                    }else if($_SESSION['studenttype']=="collegerecipient"){
                      echo ' <h4 class="page-title">New College Recipient Applicant Information</h4>';
                    }

                  ?>
                  
                  
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
                        <form action="updatenewcollegefullprofile.php" method="post" enctype="multipart/form-data">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-8">
                              <center><img src="profile/<?php echo $image;?>" class="img-xs rounded-circle"  style="width:250px;height:250px"/></center>
                          </div>
                           <div class="col-md-2">
                          </div>
                           <div class="col-md-2">
                          </div>
                          <div class="col-md-8" style="margin-top:2em">
                             <div class="row">
                              
                               <div class="col-md-6" style="text-align: right;">
                                      <input type="hidden" name="collegeedit" value="<?php echo $userid;?>" />
                                   
                                    <input type="file" name="image" id="image">
                                </div>
                                <div class="col-md-6" style="padding-left:10em">
                                    
                                      <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
                                     
                                </div>
                              <!-- </form> -->
                             </div>
                          </div>
                           <div class="col-md-2">
                          </div>
                        <!-- </form> -->
                        </div>
                      </div>
                    </form>
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
                      
        <form class="form-horizontal" action="updateNewCollegeFullScholarInfo.php" method="post">            
              <div class="col-md-12">
                  <div class="row">
                   <div class="col-md-12">
                    <div class="form-group">
                      <input type="hidden" name="userid" value="<?php echo $userid?>">
                      <label >Email</label>
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
                        value="<?php echo $application_no?>"
                        disabled>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First name" required="true"  
                        value="<?php echo $firstname?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Middle Name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name" required="true"  
                        value="<?php echo $middlename?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name" required="true"  
                        value="<?php echo $lastname?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Birtday</label>
                        <input type="date" name="birthday" class="form-control" placeholder="2019-10-01" required="true"  
                        value="<?php echo $birthday?>">
                    </div>
                  </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label >Birth Place</label>
                        <input type="text" name="birthplace" class="form-control" placeholder="Birthplace" required="true"  
                        value="<?php echo $birthplace?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Birth Order</label>
                        <select name="birthorder" class="form-control">
                          <?php
                            if($birthorder=="1ST"){
                              echo '<option value="1ST" selected="selected">1st</option>';
                            }else{
                              echo '<option value="1ST">1st</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="2ND"){
                              echo '<option value="2ND" selected="selected">2nd</option>';
                            }else{
                              echo '<option value="2ND">2nd</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="3RD"){
                              echo '<option value="3RD" selected="selected">3rd</option>';
                            }else{
                              echo '<option value="3RD">3rd</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="4TH"){
                              echo '<option value="4TH" selected="selected">4th</option>';
                            }else{
                              echo '<option value="4TH">4th</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="5TH"){
                              echo '<option value="5TH" selected="selected">5th</option>';
                            }else{
                              echo '<option value="5TH">5th</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="6TH"){
                              echo '<option value="1ST" selected="selected">6th</option>';
                            }else{
                              echo '<option value="6TH">6th</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="7TH"){
                              echo '<option value="7TH" selected="selected">7th</option>';
                            }else{
                              echo '<option value="7TH">7th</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="8TH"){
                              echo '<option value="8TH" selected="selected">8th</option>';
                            }else{
                              echo '<option value="8TH">8th</option>';
                            }
                          ?>
                          <?php
                            if($birthorder=="OTHERS"){
                              echo '<option value="OTHERS" selected="selected">Others</option>';
                            }else{
                              echo '<option value="OTHERS">Others</option>';
                            }
                          ?>
                            
                           
                        </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Gender</label>
                        <select name="gender" class="form-control">
                          <?php
                            if($gender=="MALE"){
                              echo '<option value="MALE" selected="selected">Male</option>';
                            }else{
                              echo '<option value="MALE">Male</option>';
                            }
                          ?>
                           <?php
                            if($gender=="MALE"){
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
                      <label >Citizenship</label>
                        <input type="text" name="citizen" class="form-control" placeholder="Citizenship" required="true"  
                        value="<?php echo $citizen?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Religion</label>
                        <input type="text" name="religion" class="form-control" placeholder="Religion" required="true"  
                        value="<?php echo $religion?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >House Number</label>
                        <input type="text" name="housenumber" class="form-control" placeholder="House Number" required="true"  
                        value="<?php echo $housenumber?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Street</label>
                        <input type="text" name="street" class="form-control" placeholder="Street" required="true"  
                        value="<?php echo $street?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Barangay</label>
                        <input type="text" name="barangay" class="form-control" placeholder="Barangay" required="true"  
                        value="<?php echo $barangay?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Year(s) of Residency in Sto.Tomas</label>
                        <input type="number" name="years_residency" class="form-control" placeholder="Years of Residency" required="true"  
                        value="<?php echo $years_residency?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control" placeholder="Contact Number" required="true"  
                        value="<?php echo $contactnumber?>">
                    </div>
                  </div> 
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Course Intended to Take</label>
                        <input type="text" name="course" class="form-control" placeholder="Course" required="true"  
                        value="<?php echo $course?>">
                    </div>
                  </div>  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Year</label>
                        <select name="years" class="form-control">
                          <?php
                            if($years=="1ST"){
                              echo '<option value="1ST" selected="selected">1st</option>';
                            }else{
                              echo '<option value="1ST">1st</option>';
                            }
                          ?>
                          <?php
                            if($years=="2ND"){
                              echo '<option value="2ND" selected="selected">2nd</option>';
                            }else{
                              echo '<option value="2ND">2nd</option>';
                            }
                          ?>
                          <?php
                            if($years=="3RD"){
                              echo '<option value="3RD" selected="selected">3rd</option>';
                            }else{
                              echo '<option value="3RD">3rd</option>';
                            }
                          ?>
                          <?php
                            if($years=="4TH"){
                              echo '<option value="4TH" selected="selected">4th</option>';
                            }else{
                              echo '<option value="4TH">4th</option>';
                            }
                          ?>
                          <?php
                            if($years=="5TH"){
                              echo '<option value="5TH" selected="selected">5th</option>';
                            }else{
                              echo '<option value="5TH">5th</option>';
                            }
                          ?>
                            
                          
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >School Intended To Enrol</label>
                        <input type="text" name="school" class="form-control" placeholder="School Name" required="true"  
                        value="<?php echo $school?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >School Type</label>
                        <select name="schooltype" class="form-control">
                          <?php
                            if($schooltype=="PRIVATE"){
                              echo '<option value="PRIVATE" selected="selected">Private</option>';
                            }else{
                              echo '<option value="PRIVATE">Private</option>';
                            }
                          ?>
                          <?php
                            if($schooltype=="STATE"){
                              echo '<option value="STATE" selected="selected">State University</option>';
                            }else{
                              echo '<option value="STATE">State University</option>';
                            }
                          ?>
                            
                            
                        </select>
                    </div>
                  </div>  
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >School Address</label>
                        <input type="text" name="school_address" class="form-control" placeholder="School Address" required="true"  
                        value="<?php echo $school_address?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >Last School Attended</label>
                        <input type="text" name="last_school_attended" class="form-control" placeholder="Last School" required="true"  
                        value="<?php echo $last_school_attended?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >Last School Attended Address</label>
                        <input type="text" name="last_school_address" class="form-control" placeholder="School Address" required="true"  
                        value="<?php echo $last_school_address?>">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >General Weighted Average</label>
                        <input type="text" name="gwa" class="form-control" placeholder="G.W.A." required="true"  
                        value="<?php echo $gwa?>">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Exam Rating</label>
                        <input type="text" name="exam_rating" class="form-control" placeholder="Exam Rating" required="true"  
                        value="<?php echo $exam_rating?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Living With family</label>
                        <select name="living_with_family" class="form-control">
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
                       <label >Total Number of Family</label>
                        <input type="number" name="total_number_family" class="form-control" placeholder="Total Number of Family" required="true"  
                        value="<?php echo $total_number_family?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label >Source of Living</label>
                        <input type="text" name="source_of_living" class="form-control" placeholder="Source of Living" required="true"  
                        value="<?php echo $source_of_living?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >House</label>
                        <select name="house" class="form-control">
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
                       <input type="text" name="pay_monthly" class="form-control" placeholder="How much paying monthly"  
                        value="<?php echo $pay_monthly?>">  
                    </div>
                  </div> 

                   <div class="col-md-12" style="text-align: right">
                      <input type="submit" value="Update Personal Information"
                      class="btn btn-primary">
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
                      <form method="POST" action="updateNewCollegeFullScholarEducationalInfo.php">
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
                                        <label >Graduating this semester/term?</label>
                                          <select name="isgraduating" class="form-control">
                                            <?php
                                              if($isgraduating=="YES"){
                                                echo ' <option value="YES" selected="selected">Yes</option>';
                                              }else{
                                                echo ' <option value="YES">Yes</option>';
                                              }
                                            ?>
                                            <?php
                                              if($isgraduating=="NO"){
                                                echo ' <option value="NO" selected="selected">No</option>';
                                              }else{
                                                echo ' <option value="NO">No</option>';
                                              }
                                            ?>
                                           
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >If graduating, are you graduating with honors? If not graduating, don't answer this.</label>
                                          <select name="ishonor" class="form-control">
                                             <?php
                                              if($ishonor=="YES"){
                                                echo ' <option value="YES" selected="selected">Yes</option>';
                                              }else{
                                                echo ' <option value="YES">Yes</option>';
                                              }
                                            ?>
                                            <?php
                                              if($ishonor=="NO"){
                                                echo ' <option value="NO" selected="selected">No</option>';
                                              }else{
                                                echo ' <option value="NO">No</option>';
                                              }
                                            ?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >If not graduating, how many sem/term needed including the current sem/term?</label>
                                         <input type="number" name="how_many_term" class="form-control" placeholder="How many sem/term"
                                         value="<?php echo $how_many_term?>">   
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <hr>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label>College</label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended</label>
                                         <input type="text" name="name_school_college" class="form-control" placeholder="Name of School" value="<?php echo $name_school_college?>">  
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type</label>
                                         <select name="school_type_college" class="form-control">

                                          <?php
                                              if($school_type_college=="PRIVATE"){
                                                echo ' <option value="PRIVATE" selected="selected">Private</option>';
                                              }else{
                                                echo ' <option value="PRIVATE">Private</option>';
                                              }
                                            ?>
                                            <?php
                                              if($school_type_college=="PUBLIC"){
                                                echo ' <option value="PUBLIC" selected="selected">Public</option>';
                                              }else{
                                                echo ' <option value="PUBLIC">Public</option>';
                                              }
                                            ?>
                                         </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Address</label>
                                          <input type="text" name="school_address_college" class="form-control" placeholder="Address of School" value="<?php echo $school_address_college?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level</label>
                                          <input type="text" name="year_level_college" class="form-control" placeholder="Grade/Year Level" value="<?php echo $year_level_college?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Number of Honors/Award</label>
                                          <input type="number" name="honor_college" class="form-control" placeholder="Number of honors/award" value="<?php echo $honor_college?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >List of Honors/Award Received (if any,must separated with '/')</label>
                                          <input type="text" name="list_honor_college" class="form-control" placeholder="Number of honors/award" value="<?php echo $list_honor_college?>">
                                      </div>
                                  </div>
                                  <!-- End COllege -->
                                  <div class="col-md-12">
                                      <hr>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Senior High School</label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended</label>
                                         <input type="text" name="name_school_sh" class="form-control" placeholder="Name of School" value="<?php echo $name_school_sh?>">  
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type</label>
                                         <select name="school_type_sh" class="form-control">
                                         <?php
                                              if($school_type_sh=="PRIVATE"){
                                                echo ' <option value="PRIVATE" selected="selected">Private</option>';
                                              }else{
                                                echo ' <option value="PRIVATE">Private</option>';
                                              }
                                            ?>
                                            <?php
                                              if($school_type_sh=="PUBLIC"){
                                                echo ' <option value="PUBLIC" selected="selected">Public</option>';
                                              }else{
                                                echo ' <option value="PUBLIC">Public</option>';
                                              }
                                            ?>
                                         </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Address</label>
                                          <input type="text" name="school_address_sh" class="form-control" placeholder="Address of School" value="<?php echo $school_address_sh?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level</label>
                                          <input type="text" name="year_level_sh" class="form-control" placeholder="Grade/Year Level"  value="<?php echo $year_level_sh?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Number of Honors/Award</label>
                                          <input type="number" name="honor_sh" class="form-control" placeholder="Number of honors/award" value="<?php echo $honor_sh?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >List of Honors/Award Received (if any,must separated with '/')</label>
                                          <input type="text" name="list_honor_sh" class="form-control" placeholder="Number of honors/award" value="<?php echo $list_honor_sh?>">
                                      </div>
                                  </div>
                                  <!-- End Senior High School -->
                                   <div class="col-md-12">
                                      <hr>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Junior High School</label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended</label>
                                         <input type="text" name="name_school_jh" class="form-control" placeholder="Name of School" value="<?php echo $name_school_jh?>"> 
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type</label>
                                         <select name="school_type_jh" class="form-control">
                                           <?php
                                              if($school_type_jh=="PRIVATE"){
                                                echo ' <option value="PRIVATE" selected="selected">Private</option>';
                                              }else{
                                                echo ' <option value="PRIVATE">Private</option>';
                                              }
                                            ?>
                                            <?php
                                              if($school_type_jh=="PUBLIC"){
                                                echo ' <option value="PUBLIC" selected="selected">Public</option>';
                                              }else{
                                                echo ' <option value="PUBLIC">Public</option>';
                                              }
                                            ?>
                                         </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Address</label>
                                          <input type="text" name="school_address_jh" class="form-control" placeholder="Address of School" value="<?php echo $school_address_jh?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level</label>
                                          <input type="text" name="year_level_jh" class="form-control" placeholder="Grade/Year Level" value="<?php echo $year_level_jh?>">
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
                                        <label>Elementary</label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Name of School Attended</label>
                                         <input type="text" name="name_school_elementary" class="form-control" placeholder="Name of School" value="<?php echo $name_school_elementary?>"> 
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Type</label>
                                         <select name="school_type_elementary" class="form-control">
                                           <?php
                                              if($school_type_elementary=="PRIVATE"){
                                                echo ' <option value="PRIVATE" selected="selected">Private</option>';
                                              }else{
                                                echo ' <option value="PRIVATE">Private</option>';
                                              }
                                            ?>
                                            <?php
                                              if($school_type_elementary=="PUBLIC"){
                                                echo ' <option value="PUBLIC" selected="selected">Public</option>';
                                              }else{
                                                echo ' <option value="PUBLIC">Public</option>';
                                              }
                                            ?>
                                         </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >School Address</label>
                                          <input type="text" name="school_address_elementary" class="form-control" placeholder="Address of School" value="<?php echo $school_address_elementary?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Grade/Year Level</label>
                                          <input type="text" name="year_level_elementary" class="form-control" placeholder="Grade/Year Level" value="<?php echo $year_level_elementary?>">
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
                                  <div class="col-md-12" style="text-align: right;">
                                      <input type="submit" value="Update Educational Background" class="btn btn-success">
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
                    <form method="POST" action="updateNewCollegeFullScholarFamilyBackground.php">
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
                                        <label >Father's Full Name</label>
                                          <input type="text" name="f_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>"
                                          value="<?php echo $f_fullname?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Choose Living or Deceased</label>
                                         <select name="f_living" class="form-control">
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
                                        <label >Address (Don't answer if deceased)</label>
                                          <input type="text" name="f_address" class="form-control" placeholder="Address" 
                                          value="<?php echo $f_address?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number (Don't answer if deceased)</label>
                                          <input type="text" name="f_contact_number" class="form-control" placeholder="Contact Number" 
                                          value="<?php echo $f_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation (Don't answer if deceased)</label>
                                          <input type="text" name="f_occupation" class="form-control" placeholder="Occupation" 
                                          value="<?php echo $f_occupation?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Place of Work (Don't answer if deceased)</label>
                                          <input type="text" name="f_place_of_work" class="form-control" placeholder="Place of Work" 
                                          value="<?php echo $f_place_of_work?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Highest Educational Attainment (Don't answer if deceased)</label>
                                          <input type="text" name="f_hea" class="form-control" placeholder="Highest Educational Attainment" 
                                          value="<?php echo $f_hea?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Montly Income (Don't answer if deceased)</label>
                                          <input type="text" name="f_ami" class="form-control" placeholder="Average Montly Income" 
                                          value="<?php echo $f_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Father -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Mother's Full Name</label>
                                          <input type="text" name="m_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>" value="<?php echo $m_fullname?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Choose Living or Deceased</label>
                                         <select name="m_living" class="form-control">
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
                                        <label >Address (Don't answer if deceased)</label>
                                          <input type="text" name="m_address" class="form-control" placeholder="Address" value="<?php echo $m_address?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number (Don't answer if deceased)</label>
                                          <input type="text" name="m_contact_number" class="form-control" placeholder="Contact Number" value="<?php echo $m_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation (Don't answer if deceased)</label>
                                          <input type="text" name="m_occupation" class="form-control" placeholder="Occupation" value="<?php echo $m_occupation?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Place of Work (Don't answer if deceased)</label>
                                          <input type="text" name="m_place_of_work" class="form-control" placeholder="Place of Work" value="<?php echo $m_place_of_work?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Highest Educational Attainment (Don't answer if deceased)</label>
                                          <input type="text" name="m_hea" class="form-control" placeholder="Highest Educational Attainment" value="<?php echo $m_hea?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Montly Income (Don't answer if deceased)</label>
                                          <input type="text" name="m_ami" class="form-control" placeholder="Average Montly Income" value="<?php echo $m_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Mother -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Husband's/Wife Full Name</label>
                                          <input type="text" name="hw_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>"  
                                          value="<?php echo $hw_fullname?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Choose Living or Deceased</label>
                                         <select name="hw_living" class="form-control">
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
                                        <label >Address (Don't answer if deceased)</label>
                                          <input type="text" name="hw_address" class="form-control" placeholder="Address"
                                           value="<?php echo $hw_address?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Contact Number (Don't answer if deceased)</label>
                                          <input type="text" name="hw_contact_number" class="form-control" placeholder="Contact Number" 
                                           value="<?php echo $hw_contact_number?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation (Don't answer if deceased)</label>
                                          <input type="text" name="hw_occupation" class="form-control" placeholder="Occupation"  
                                          value="<?php echo $hw_occupation?>">

                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Place of Work (Don't answer if deceased)</label>
                                          <input type="text" name="hw_place_of_work" class="form-control" placeholder="Place of Work" 
                                           value="<?php echo $hw_place_of_work?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Highest Educational Attainment (Don't answer if deceased)</label>
                                          <input type="text" name="hw_hea" class="form-control" placeholder="Highest Educational Attainment" 
                                           value="<?php echo $hw_hea?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Average Montly Income (Don't answer if deceased)</label>
                                          <input type="text" name="hw_ami" class="form-control" placeholder="Average Montly Income"v
                                          value="<?php echo $hw_ami?>">
                                      </div>
                                  </div>
                                  <!-- End Wife -->
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >If Living with Guardian, answer below</label>
                                         
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Guardian's Full Name</label>
                                          <input type="text" name="g_fullname" class="form-control" placeholder="<Firstname> <Middlename> <Lastname>" 
                                          value="<?php echo $g_fullname?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Relationship</label>
                                          <input type="text" name="g_relationship" class="form-control" placeholder="Relationship" 
                                          value="<?php echo $g_relationship?>">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Address</label>
                                          <input type="text" name="g_address" class="form-control" placeholder="Address" 
                                          value="<?php echo $g_address?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Age</label>
                                          <input type="number" name="g_age" class="form-control" placeholder="Age" 
                                          value="<?php echo $g_age?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label >Occupation</label>
                                          <input type="text" name="g_occupation" class="form-control" placeholder="Occupation" value="<?php echo $g_occupation?>">
                                      </div>
                                  </div>
                                  <!-- End Guardian -->
                                   <div class="col-md-12" style="text-align: right;">
                                      <input type="submit" value="Update Family Background" class="btn btn-secondary">
                                  </div>
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
                         <h4 class="card-title">List of Sibling(s) with Bursary of Grant</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <button type="button" class="btn btn-danger btn-fw" data-toggle="modal" data-target="#addSiblings"><span class="fa fa-plus"></span> Add Siblings</button>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Types of Grant</th>
                                  <th><center>Action</center></th>
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
                                        echo '<td>';
                                        echo $rowa['typegrant'];
                                        echo '</td>';
                                        echo '<td><center>';
                                         echo '<button id="';
                                      echo $rowa['id'];
                                      echo '" type="button" class="btn btn-icons btn-rounded btn-success" data-toggle="modal" data-target="#updateSiblings';
                                      echo $rowa['id'];
                                      echo '">
                                        <i class="fa fa-pencil"></i>';
                                         echo '</button>&nbsp';
                                         echo '<button class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#removeModal';
                                         echo $rowa['id'];
                                         echo '" ><i class="fa fa-trash-o"></i></button>';
                                        echo '</center></td>';
                                        echo '</tr>';
                                        $count = $count+1;
                                      }
                                    }
                                ?>
                                
                              </tbody>
                          </table>
                        </div>
                 <!-- End of 8 -->

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
      <form action="updateSiblingsNewFull.php" method="post">
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
                              <input type="text" name="civil" id="civil" class="form-control" placeholder="Civil Status"
                              value="';
                               echo $rowb['civil'];
                              echo '"
                               required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                         <div class="form-group">
                          <label for="grant"> Grant Ejoyed</label>
                            <div class="input-group">
                                 <input type="text" id="grant" name="grant" class="form-control" placeholder="Bursary/Gant/Enter N/A if none" value="';
                                  echo $rowb['typegrant'];
                                 echo '" required>
                            </div>
                          </div>
                      </div> 
                       <div class="col-md-12">
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
     <form action="removeSiblingsNewFull.php" method="post">
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
      <form action="addSiblingsFull.php" method="POST">
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
                              <input type="text" name="civil" id="civil" class="form-control" placeholder="Civil Status" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                         <div class="form-group">
                          <label for="grant"> Grant Ejoyed</label>
                            <div class="input-group">
                                 <input type="text" id="grant" name="grant" class="form-control" placeholder="Bursary/Gant/Enter N/A if none" required>
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