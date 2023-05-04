<?php session_start();

require "config.php";
$status="APPROVED";
$userid=$_GET['id'];

$lastname="";
$email="";
$image="";
$middlename="";
$firstname="";
$birthday="";
$birthplace="";
$birthorder="";
$gender="";
$religion="";
$citizenship="";
$housenumber="";
$street="";
$barangay="";
$phone="";
$facebook="";

$f_firstname="";
$f_lastname="";
$f_middlename="";
$f_occupation="";

$m_firstname="";
$m_lastname="";
$m_middlename="";
$m_occupation="";

$g_firstname="";
$g_lastname="";
$g_middlename="";
$g_occupation="";
$g_phonenumber="";
$g_housenumber="";
$g_street="";
$g_barangay="";
$g_relationship="";



$p_housenumber="";
$p_street="";
$p_barangay="";
$p_gross="";
$p_numberfamily="";
$p_siblings="";
$p_girls="";
$p_boy="";

$school="";
$schooladdress="";
$highestyear="";
$genweight ="";
$bursary="";

$first1="";
$first2="";
$second1="";
$second2="";
$third1="";
$third2="";
$fourth1="";
$fourth2="";
$fifth1="";
$fifth2="";

$sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $email = $row['username'];
    $image = $row['image'];
    $userid = $row['id'];

    $sql1 = "SELECT * FROM tbl_studentinfo WHERE user_id='$userid'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      $middlename=$row1['middlename'];
      $gender=$row1['gender'];
      $birthday =$row1['bday'];
      $birthplace =$row1['birthplace'];
      $religion =$row1['religion'];
      $birthorder =$row1['birthorder'];
      $citizenship =$row1['citizenship'];
      $housenumber =$row1['housenumber'];
      $street =$row1['street'];
      $barangay =$row1['barangay'];
      $phone =$row1['phone'];
      $facebook =$row1['facebook'];
    }else{

    }
    $sql5 = "SELECT * FROM tbl_fatherinfo WHERE user_id='$userid'";
    $result5 = $conn->query($sql5);
    if ($result5->num_rows > 0){
      $row5 = $result5->fetch_assoc();
        $f_firstname=$row5['firstname'];
        $f_lastname=$row5['lastname'];
        $f_middlename=$row5['middlename'];
        $f_occupation=$row5['occupation'];

    }else{

    }

    $sql2 = "SELECT * FROM tbl_motherinfo WHERE user_id='$userid'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0){
      $row2 = $result2->fetch_assoc();
        $m_firstname=$row2['firstname'];
        $m_lastname=$row2['lastname'];
        $m_middlename=$row2['middlename'];
        $m_occupation=$row2['occupation'];

    }else{

    }

    $sql3 = "SELECT * FROM tbl_guardianinfo WHERE user_id='$userid'";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0){
      $row3 = $result3->fetch_assoc();
        $g_firstname=$row3['firstname'];
        $g_lastname=$row3['lastname'];
        $g_middlename=$row3['middlename'];
        $g_occupation=$row3['occupation'];
        $g_phonenumber=$row3['phonenumber'];
        $g_housenumber=$row3['housenumber'];
        $g_street=$row3['street'];
        $g_barangay=$row3['barangay'];
        $g_relationship=$row3['relationship'];

    }else{

    }

    $sql4 = "SELECT * FROM tbl_parentinfo WHERE user_id='$userid'";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0){
      $row4 = $result4->fetch_assoc();
        $p_housenumber=$row4['housenumber'];
        $p_street=$row4['street'];
        $p_barangay=$row4['barangay'];
        $p_gross=$row4['gross'];
        $p_numberfamily=$row4['numberfamily'];
        $p_siblings=$row4['siblings'];
        $p_girls=$row4['girls'];
        $p_boy=$row4['boy'];

    }else{

    }
     $sql6 = "SELECT * FROM tbl_educational WHERE user_id='$userid'";
    $result6 = $conn->query($sql6);
    if ($result6->num_rows > 0){
      $row6 = $result6->fetch_assoc();
        $school=$row6['school'];
        $schooladdress=$row6['address'];
        $highestyear=$row6['highestyear'];
        $genweight =$row6['genweight'];
        $bursary=$row6['bursary'];
    }else{

    }

    $sql7 = "SELECT * FROM tbl_college_grades WHERE user_id='$userid'";
    $result7 = $conn->query($sql7);
    if ($result7->num_rows > 0){
      $row7 = $result7->fetch_assoc();
        $first1=$row7['first_fsem'];
        $first2=$row7['first_ssem'];
        $second1=$row7['second_fsem'];
        $second2=$row7['second_ssem'];
        $third1=$row7['third_fsem'];
        $third2=$row7['third_ssem'];
        $fourth1=$row7['fourth_fsem'];
        $fourth2=$row7['fourth_ssem'];
        $fifth1=$row7['fifth_fsem'];
        $fifth2=$row7['fifth_ssem'];
    }else{
        $first1="0.00";
        $first2="0.00";
        $second1="0.00";
        $second2="0.00";
        $third1="0.00";
        $third2="0.00";
        $fourth1="0.00";
        $fourth2="0.00";
        $fifth1="0.00";
        $fifth2="0.00";
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
                  <h4 class="page-title">College Recipient</h4>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="page-header-toolbar">

                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                          <form action="updateoldcollegeprofile.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                              <center><img src="profile/<?php echo $image;?>" class="img-xs rounded-circle"  style="width:250px;height:250px"/></center>
                            </div>
                           <!--  <div class="col-md-12">
                                <div class="row">
                                  <input type="hidden" name="collegeedit" value="<?php 
                                  // echo $userid;?>">
                                    <div class="col-md-6">
                                     Select image to upload:
                                    <input type="file" name="image" id="image">
                                    </div>
                                    <div class="col-md-6">
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                      <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                          
                      </div>
                      <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label for="firstname">First Name</label>
                                  <div class="input-group">
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="<?php echo $firstname; ?>" disabled>
                                
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                  <div class="input-group">
                                    <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" value="<?php echo $middlename; ?>" disabled>
                                
                                  </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                               <div class="form-group">
                                <label for="lastname">Last Name</label>
                                  <div class="input-group">
                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>" disabled>
                                
                                  </div>
                                </div>
                            </div>
                             <div class="col-md-4">
                         <div class="form-group">
                          <label for="birthday">Birth Day</label>
                            <div class="input-group">
                              <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Birth Day" value="<?php echo $birthday; ?>" disabled>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="birthplace">Birth Place</label>
                            <div class="input-group">
                              <input type="text" name="birthplace" id="birthplace" class="form-control" placeholder="City and Province" value="<?php echo $birthplace; ?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="birthplace">Birth Order</label>
                            <div class="input-group">
                              <input type="text" name="birthorder" id="birthorder" class="form-control" value="<?php echo $birthorder; ?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                       <div class="col-md-4">
                         <div class="form-group">
                          <label for="birthplace">Gender</label>
                            <div class="input-group">
                              <input type="text" name="birthorder" id="birthorder" class="form-control" value="<?php echo $gender; ?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="religion">Religion</label>
                            <div class="input-group">
                              <input type="text" name="religion" id="religion" class="form-control" placeholder="Religion" value="<?php echo $religion?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="citizenship">Citizenship</label>
                            <div class="input-group">
                              <input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="Citizenship" value="<?php echo $citizenship?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                       <div class="col-md-4">
                         <div class="form-group">
                          <label for="email">Email address</label>
                            <div class="input-group">
                              <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $email?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                       <div class="col-md-4">
                         <div class="form-group">
                          <label for="phone">Phone Number</label>
                            <div class="input-group">
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="facebook">Facebook</label>
                            <div class="input-group">
                              <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook" value="<?php echo $facebook?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                          </div>
                      </div>
                       <div class="col-md-12">
                        <hr>
                       </div>
                      <!-- Address -->
                       <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                <label for="housenumber">Address</label>
                                  
                                </div>
                            </div>
                          </div>
                       </div>

                        <div class="col-md-4">
                         <div class="form-group">
                          <label for="housenumber">House Number</label>
                            <div class="input-group">
                              <input type="text" name="housenumber" id="housenumber" class="form-control" placeholder="House Number" value="<?php echo $housenumber?>" disabled>
                                
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="street">Street</label>
                            <div class="input-group">
                              <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="<?php echo $street?>" disabled>
                                
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="street">Barangay</label>
                            <div class="input-group">
                              <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="<?php echo $barangay?>" disabled>
                                
                            </div>
                          </div>
                      </div>

                        <div class="col-md-12">
                        <hr>
                       </div>
                          <div class="col-md-12">
                           <div class="form-group">
                              <label for="school">Father's Information</label>  
                          </div>
                          </div>

                           <div class="col-md-3">
                         <div class="form-group">
                            <label for="ffname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="ffname" id="ffname" class="form-control" placeholder="First Name" value="<?php echo $f_firstname; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="fmname">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="fmname" id="fmname" class="form-control" placeholder="Middle Name" value="<?php echo $f_middlename; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="flname">Last Name </label>
                            <div class="input-group">
                              <input type="text" name="flname" id="flname" class="form-control" placeholder="Last Name" value="<?php echo $f_lastname; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>

                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="foccupation">Occupation </label>
                            <div class="input-group">
                              <input type="text" name="foccupation" id="foccupation" class="form-control" placeholder="Occupation" value="<?php echo $f_occupation; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Mother's Information</label>
                            
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="mfname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="mfname" id="mfname" class="form-control" placeholder="First Name" value="<?php echo $m_firstname; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="mmname">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="mmname" id="mmname" class="form-control" placeholder="Middle Name" value="<?php echo $m_middlename; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="mlname">Last Name </label>
                            <div class="input-group">
                              <input type="text" name="mlname" id="mlname" class="form-control" placeholder="Last Name" value="<?php echo $m_lastname; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="moccupation">Occupation </label>
                            <div class="input-group">
                              <input type="text" name="moccupation" id="moccupation" class="form-control" placeholder="Occupation" value="<?php echo $m_occupation;?>" disabled>
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                       <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Parent's Address</label>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="phousenumber">House Number</label>
                            <div class="input-group">
                              <input type="text" name="phousenumber" id="phousenumber" class="form-control" placeholder="House Number" value="<?php echo $p_housenumber; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="pstreet">Street</label>
                            <div class="input-group">
                              <input type="text" name="pstreet" id="pstreet" class="form-control" placeholder="Street" value="<?php echo $p_street; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                        <div class="col-md-4">
                         <div class="form-group">
                            <label for="pbarangay">Barangay</label>
                             <div class="input-group">
                              <input type="text" name="pbarangay" id="pstreet" class="form-control" placeholder="Street" value="<?php echo $p_barangay; ?>" disabled>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12"><hr></div>
                       <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Family's Info</label>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gross">Annual Gross </label>
                            <div class="input-group">
                              <input type="number" name="gross" id="gross" class="form-control" placeholder="Annual Gross" value="<?php echo $p_gross;?>" disabled>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="numfamily">Number of Family </label>
                            <div class="input-group">
                              <input type="number" name="numfamily" id="numfamily" class="form-control" placeholder="Number of Family" value="<?php echo $p_numberfamily;?>" disabled>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="numsiblings">Number of Siblings </label>
                            <div class="input-group">
                              <input type="number" name="numsiblings" id="numsiblings" class="form-control" placeholder="Number of Siblings" value="<?php echo $p_siblings;?>" disabled>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-1">
                         <div class="form-group">
                            <label for="numboys"># of Boy(s) </label>
                            <div class="input-group">
                              <input type="number" name="numboys" id="numboys" class="form-control" placeholder="Number of Boy(s)" value="<?php echo $p_boy;?>" disabled>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-1">
                         <div class="form-group">
                            <label for="numgirls"># of Girl(s) </label>
                            <div class="input-group">
                              <input type="number" name="numgirls" id="numgirls" class="form-control" placeholder="Number of Girl(s)" value="<?php echo $p_girls;?>" disabled>
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Guardian's Information</label>
                            
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gfname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="gfname" id="gfname" class="form-control" placeholder="First Name" value="<?php echo $g_firstname; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gmname">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="gmname" id="gmname" class="form-control" placeholder="Middle Name" value="<?php echo $g_middlename; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="glname">Last Name </label>
                            <div class="input-group">
                              <input type="text" name="glname" id="glname" class="form-control" placeholder="Last Name" value="<?php echo $g_lastname; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="goccupation">Occupation </label>
                            <div class="input-group">
                              <input type="text" name="goccupation" id="goccupation" class="form-control" placeholder="Occupation" value="<?php echo $g_occupation;?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grelationship">Relationship </label>
                            <div class="input-group">
                              <input type="text" name="grelationship" id="grelationship" class="form-control" placeholder="Relationship" value="<?php echo $g_relationship; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gphone">Phone Number </label>
                            <div class="input-group">
                              <input type="text" name="gphone" id="gphone" class="form-control" placeholder="Phone Number" value="<?php echo $g_phonenumber; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Guardian's Address</label>
                          </div>
                      </div>
                       <div class="col-md-4">
                         <div class="form-group">
                            <label for="ghousenumber">House Number</label>
                            <div class="input-group">
                              <input type="text" name="ghousenumber" id="ghousenumber" class="form-control" placeholder="House Number" value="<?php echo $g_housenumber; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="gstreet">Street</label>
                            <div class="input-group">
                              <input type="text" name="gstreet" id="gstreet" class="form-control" placeholder="Street" value="<?php echo $g_street; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="gstreet">Barangay</label>
                            <div class="input-group">
                              <input type="text" name="gstreet" id="gstreet" class="form-control" placeholder="Street" value="<?php echo $g_barangay; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Educational Info</label>
                          </div>
                      </div>
                       <div class="col-md-6">
                         <div class="form-group">
                            <label for="school">Last School Attended</label>
                            <div class="input-group">
                              <input type="text" name="school" id="school" class="form-control" placeholder="School" value="<?php echo $school; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="schooladdress">School Address</label>
                            <div class="input-group">
                              <input type="text" name="schooladdress" id="schooladdress" class="form-control" placeholder="House number Street Barangay City" value="<?php echo $schooladdress; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="schooladdress">Highest Year Attended</label>
                            <div class="input-group">
                              <input type="text" name="schooladdress" id="schooladdress" class="form-control" placeholder="House number Street Barangay City" value="<?php echo $highestyear; ?>" disabled>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="genweight">General Weighted Average</label>
                            <div class="input-group">
                                 <input type="number" id="genweight" name="genweight" class="form-control" placeholder="Ex. 90" value="<?php echo $genweight; ?>" disabled>
                            </div>
                          </div>
                      </div> 
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="grant"> Bursary or Grant Ejoyed</label>
                            <div class="input-group">
                                 <input type="text" id="grant" name="grant" class="form-control" placeholder="Bursary/Gant" value="<?php echo $bursary; ?>" disabled>
                            </div>
                          </div>
                      </div> 
                       <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Grades</label>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 1st Year - 1st Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $first1; ?>" disabled>
                          </div>
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 1st Year - 2nd Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $first2; ?>" disabled>
                          </div>
                         </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 2nd Year - 1st Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $second1; ?>" disabled>
                          </div>
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 2nd Year - 2nd Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $second2; ?>" disabled>
                          </div>
                         </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 3rd Year - 1st Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $third1; ?>" disabled>
                          </div>
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 3rd Year - 2nd Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $third2; ?>" disabled>
                          </div>
                         </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 4th Year - 1st Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $fourth1; ?>" disabled>
                          </div>
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 4th Year - 2nd Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $fourth2; ?>" disabled>
                          </div>
                         </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 5th Year - 1st Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $fifth1; ?>" disabled>
                          </div>
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="grant"> 5th Year - 2nd Sem</label>
                             <div class="input-group">
                           
                                 <input type="text" id="grade" name="grant" class="form-control" placeholder="Grade" value="<?php echo $fifth2; ?>" disabled>
                          </div>
                         </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Siblings with Bursary or Grant</label>
                          </div>
                      </div>
                       <div class="col-md-12">
                         <h4 class="card-title">List of Sibling(s) with Bursary of Grant</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                   
                        </div>
                        <div class="col-md-12">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Types of Grant</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $sqla = "SELECT * FROM tbl_siblingsinfo WHERE user_id='$userid'";
                                    $resulta = $conn->query($sqla);
                                    if ($resulta->num_rows > 0){
                                      $count=1;
                                      while($rowa = $resulta->fetch_assoc()){
                                        echo '<tr>';
                                        echo '<td>';
                                        echo $count;
                                        echo '</td>';
                                        echo '<td>';
                                        echo $rowa['firstname'].' '.$rowa['middlename'].' '.$rowa['lastname'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $rowa['typegrant'];
                                        echo '</td>';
                                       
                                        echo '</tr>';
                                        $count = $count+1;
                                      }
                                    }
                                ?>
                                
                              </tbody>
                          </table>
                        </div>
                      </form>
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