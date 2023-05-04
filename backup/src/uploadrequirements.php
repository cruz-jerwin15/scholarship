<?php session_start();
$_SESSION['counter']=1;
$username = $_SESSION['username'];

require "config.php";
$status="NEWAPPLICANT";
$userid="";
$typescholar="";

$trigger=0;

$req_step=$_SESSION['req_step'];

$application=2;
$birthcertificate=2;
$gradereport=2;
$schoolclearance=2;
$parentvotersid=2;
$studentregistration=2;
$housesketch=2;
$barangayclearance=2;
$picture=2;
$itr=2;
$yourvotersid=2;
 $indigency=2;

$application_label="";
$birthcertificate_label="";
$gradereport_label="";
$schoolclearance_label="";
$parentvotersid_label="";
$studentregistration_label="";
$housesketch_label="";
$barangayclearance_label="";
$picture_label="";
$itr_label="";
$yourvotersid_label="";
 $indigency_label="";

$sql = "SELECT * FROM tbl_admin WHERE username='$username'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $email = $row['username'];
    $userid = $row['id'];
    $statuss = $row['status'];
    $userimage = $row['image'];
    $_SESSION['userid']=$userid;
    $academic_year=$row['academic_year'];
    $application_no=$row['application_no'];
    $typescholar=$row['typescholar'];
    $_SESSION['typescholar']=$typescholar;
    $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      $lastname =$row1['lastname'];
      $firstname=$row1['firstname'];
      $middlename =$row1['middlename'];
    }

        $sql2 = "SELECT * FROM tbl_college_requirements WHERE user_id='$userid'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0){
          $row2 = $result2->fetch_assoc();
          $application=$row2['applicationform'];
          $birthcertificate=$row2['birthcertificate'];
          $gradereport=$row2['gradereport'];
          $schoolclearance=$row2['schoolclearance'];
          $parentvotersid=$row2['parentvotersid'];
          $studentregistration=$row2['studentregistration'];
          $housesketch=$row2['housesketch'];
          $barangayclearance=$row2['barangayclearance'];
          $picture=$row2['picture'];
          $itr=$row2['itr'];
          $yourvotersid=$row2['yourvotersid'];
            $indigency=$row2['indigency'];
             $sql3 = "SELECT * FROM tbl_college_requirements_label WHERE user_id='$userid'";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0){
              $row3 = $result3->fetch_assoc();
              $application_label=$row3['applicationform'];
              $birthcertificate_label=$row3['birthcertificate'];
              $gradereport_label=$row3['gradereport'];
              $schoolclearance_label=$row3['schoolclearance'];
              $parentvotersid_label=$row3['parentvotersid'];
              $studentregistration_label=$row3['studentregistration'];
              $housesketch_label=$row3['housesketch'];
              $barangayclearance_label=$row3['barangayclearance'];
              $picture_label=$row3['picture'];
              $itr_label=$row3['itr'];
              $yourvotersid_label=$row3['yourvotersid'];
              $indigency_label=$row3['indigency'];
            }
        }else{
          $application_label="";
          $birthcertificate_label="";
          $gradereport_label="";
          $schoolclearance_label="";
          $parentvotersid_label="";
          $studentregistration_label="";
          $housesketch_label="";
          $barangayclearance_label="";
          $picture_label="";
          $itr_label="";
          $yourvotersid_label="";
          $indigency_label="";
          $trigger=1;
        }
  $message="";
  $has_trigger=0;
  $i=0;
  $j=0;
  $x=0;
  $y=0;
  if($trigger==1){
    $message="In order to process your application, please upload all the required documents.";
  }else{

    if(($birthcertificate==2)||($birthcertificate==3)){
      $i++;
    }
    if(($gradereport==2)||($gradereport==3)){
      $i++;
    }
    if(($schoolclearance==2)||($schoolclearance==3)){
      $i++;
    }
    if(($parentvotersid==2)||($parentvotersid==3)){
      $i++;
    }
    if(($housesketch==2)||($housesketch==3)){
      $i++;
    }
    if(($barangayclearance==2)||($barangayclearance==3)){
      $i++;
    }
    if(($picture==2)||($picture==3)){
      $i++;
    }
    if(($itr==2)||($itr==3)){
      $i++;
    }
    if(($yourvotersid==2)||($yourvotersid==3)){
      $i++;
    }
    if(($indigency==2)||($indigency==3)){
      $i++;
    }
    if(($application==2)||($application==3)){
      $i++;
    }

    if($typescholar=="shscholar"){
      if($i>=10){
       $message="Thank you for uploading all required documents. We will process your application. Please wait for further announcements.";
      }else{
      if(($birthcertificate==0)||($birthcertificate==0)){
      $j++;
      }
      if(($gradereport==0)||($gradereport==0)){
        $j++;
      }
      if(($schoolclearance==0)||($schoolclearance==0)){
        $j++;
      }
      if(($parentvotersid==0)||($parentvotersid==0)){
        $j++;
      }
      if(($housesketch==0)||($housesketch==0)){
        $j++;
      }
      if(($barangayclearance==0)||($barangayclearance==0)){
        $j++;
      }
      if(($picture==0)||($picture==0)){
        $j++;
      }
      if(($itr==0)||($itr==0)){
        $j++;
      }
      if(($yourvotersid==0)||($yourvotersid==0)){
        $j++;
      }
      if(($indigency==0)||($indigency==0)){
        $j++;
      }
      if(($application==0)||($application==0)){
        $j++;
      }

      if($j>0){
       $message="Some of your requirements are not approved. Please update  and submit.";
      }else{
        if(($birthcertificate==1)||($birthcertificate==1)){
          $x++;
        }
        if(($gradereport==1)||($gradereport==1)){
          $x++;
        }
        if(($schoolclearance==1)||($schoolclearance==1)){
          $x++;
        }
        if(($parentvotersid==1)||($parentvotersid==1)){
          $x++;
        }
        if(($housesketch==1)||($housesketch==1)){
          $x++;
        }
        if(($barangayclearance==1)||($barangayclearance==1)){
          $x++;
        }
        if(($picture==1)||($picture==1)){
          $x++;
        }
        if(($itr==1)||($itr==1)){
          $x++;
        }
        if(($yourvotersid==1)||($yourvotersid==1)){
          $x++;
        }
        if(($indigency==1)||($indigency==1)){
          $x++;
        }
        if(($application==1)||($application==1)){
          $x++;
        }
        if($x>10){
           $message="Congratulations! All your requirements have been approved. Your application is still subject for assessment. Please wait for further announcements.";
        }else{
          if($i>0){
             $message="Thank you for uploading all required documents. We will process your application. Please wait for further announcements.";
          }else{
             $message="Thank you for uploading some of your requirements. Please make sure that you have uploaded all the required documents.";
          }


        }

      }

    }
    }else{
      if($i>=11){
       $message="Thank you for uploading all required documents. We will process your application. Please wait for further announcements.";
    }else{
      if($birthcertificate==0){
        $j++;
      }
      if($gradereport==0){
        $j++;
      }
      if($schoolclearance==0){
        $j++;
      }
      if($parentvotersid==0){
        $j++;
      }
      if($housesketch==0){
        $j++;
      }
      if($barangayclearance==0){
        $j++;
      }
      if($picture==0){
        $j++;
      }
      if($itr==0){
        $j++;
      }
      if($yourvotersid==0){
        $j++;
      }
      if($indigency==0){
        $j++;
      }
      if($application==0){
        $j++;
      }

      if($j>0){
       $message="Some of your requirements are not approved. Please update  and submit.";
      }else{
        if(($birthcertificate==1)||($birthcertificate==1)){
          $x++;
        }
        if(($gradereport==1)||($gradereport==1)){
          $x++;
        }
        if(($schoolclearance==1)||($schoolclearance==1)){
          $x++;
        }
        if(($parentvotersid==1)||($parentvotersid==1)){
          $x++;
        }
        if(($housesketch==1)||($housesketch==1)){
          $x++;
        }
        if(($barangayclearance==1)||($barangayclearance==1)){
          $x++;
        }
        if(($picture==1)||($picture==1)){
          $x++;
        }
        if(($itr==1)||($itr==1)){
          $x++;
        }
        if(($yourvotersid==1)||($yourvotersid==1)){
          $x++;
        }
        if(($indigency==1)||($indigency==1)){
          $x++;
        }
        if(($application==1)||($application==1)){
          $x++;
        }
        if($x>11){
           $message="Congratulations! All your requirements have been approved. Your application is still subject for assessment. Please wait for further announcements.";
        }else{
          if($i>0){
             $message="Thank you for uploading all required documents. We will process your application. Please wait for further announcements.";
          }else{
             $message="Thank you for uploading some of your requirements. Please make sure that you have uploaded all the required documents.";
          }


        }

      }

    }
    }




  }



  }else{
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("loginform.php","_self")';
      echo '</script>';
  }

if($_SESSION['notif']=="5"){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'alert("Successfully submit your application")';
      echo '</script>';
      $_SESSION['notif']="NULL";
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
    <script>
      function setRequirements(requirements){
        document.getElementById('requirements').value=requirements;
      }
      function setApplicable(requirements){
        document.getElementById('requirementsapplicale').value=requirements;
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
                  <h4 class="page-title">Applicant Requirements
                    <?php
                    if($req_step>0){
                      if($typescholar=="shscholar"){
                        echo "  (Step " .$req_step." of 10)";
                      }else{
                        echo "  (Step " .$req_step." of 11)";
                      }

                    }

                    ?>
                  </h4>

                </div>
              </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">

                  <div class="card-body">
                    <div class="row">
                       <input type="hidden" name="userid" id="userid" class="form-control" placeholder="First Name" value="<?php echo $userid; ?>">
                       <div class="col-md-12">
                        <?php
                          if(($trigger==1)&&($req_step<=0)){
                            // echo '<h4 style="color:#faab23;">';
                            // echo $message;
                            // echo '</h4>';
                            echo '<h4 style="color:red;">';
                            echo $message;
                            echo '</h4>';
                          }if(($trigger==0)&&($req_step<=0)){
                             echo '<h4 style="color:red;">';
                            echo $message;
                            echo '</h4>';
                          }
                        ?>

                       </div>
                      <div class="col-md-12">

                         <table style="width:100%;" class="table">
                           <thead>
                            <?php
                            if($req_step==0){
                              echo '<tr>
                               <th style="width:10%;">';

                               echo '#</th>
                               <th style="width:40%;">Requirements</th>
                               <th style="width:50%;">Status</th>

                             </tr>';
                            }else{
                               echo '<tr>
                               <th style="width:10%;">#</th>
                               <th style="width:40%;">Requirements</th>
                               <th style="width:30%;">Status</th>
                               <th style="width:20%;">Action</th>
                             </tr>';
                            }

                            ?>

                           </thead>
                           <tbody>
                         <?php

                          if(($typescholar=="collegerecipient")||($typescholar=="fullscholar")){
                            if($req_step==1){
                                if($birthcertificate_label==""){

                                  echo ' <tr>
                                     <th>1</th>
                                     <th>Birth Certificate (should be PSA)</th>
                                     <th>No Document</th>
                                     <th><button id="birthcertificate" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>1</th>
                                      <th>Birth Certificate (should be PSA)</th>';
                                     if($birthcertificate==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($birthcertificate==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($birthcertificate==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo '<th><button id="birthcertificate" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($birthcertificate==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="birthcertificate" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==2){
                                // School Clearance
                                if($schoolclearance_label==""){
                                  echo ' <tr>
                                     <th>2</th>
                                     <th>Certificate of Good Moral</th>
                                     <th>No Document</th>
                                     <th><button id="schoolclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>2</th>
                                      <th>Certificate of Good Moral</th>';
                                     if($schoolclearance==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($schoolclearance==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($schoolclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="schoolclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($schoolclearance==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="schoolclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==3){
                                 // Grade Report
                                if($gradereport_label==""){
                                  echo ' <tr>
                                     <th>3</th>
                                     <th>Grade Reports/ Report of Ratings</th>
                                     <th>No Document</th>
                                     <th><button id="gradereport" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>3</th>
                                      <th>Grade Reports/ Report of Ratings</th>';
                                     if($gradereport==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($gradereport==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($gradereport==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="gradereport" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($gradereport==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="gradereport" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==4){
                                  // parent voters id
                                if($parentvotersid_label==""){
                                  echo ' <tr>
                                     <th>4</th>
                                     <th>Parents Voter’s ID/ Voter’s Certification</th>
                                     <th>No Document</th>
                                     <th><button id="parentvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>4</th>
                                      <th>Parents Voter’s ID/ Voter’s Certification</th>';
                                     if($parentvotersid==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($parentvotersid==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($parentvotersid==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="parentvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($parentvotersid==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="parentvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==5){
                               if($yourvotersid_label==""){
                                  echo ' <tr>
                                     <th>5</th>
                                     <th>Voters ID or Voters Certification of applicant (for 18 years old and above)</th>
                                     <th>No Document</th>
                                     <th><button id="yourvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="yourvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>5</th>
                                      <th>Voters ID or Voters Certification of applicant (for 18 years old and above)</th>';
                                     if($yourvotersid==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="yourvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($yourvotersid==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="yourvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($yourvotersid==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="yourvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="yourvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($yourvotersid==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="yourvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="yourvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==6){
                               if($housesketch_label==""){
                                  echo ' <tr>
                                     <th>6</th>
                                     <th>Vicinity Map</th>
                                     <th>No Document</th>
                                     <th><button id="housesketch" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>6</th>
                                      <th>Vicinity Map</th>';
                                     if($housesketch==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($housesketch==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($housesketch==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="housesketch" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($housesketch==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="housesketch" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==7){
                                 // Barangay Clearance
                                if($barangayclearance_label==""){
                                  echo ' <tr>
                                     <th>7</th>
                                     <th>Barangay Clearance of Applicant</th>
                                     <th>No Document</th>
                                     <th><button id="barangayclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>7</th>
                                      <th>Barangay Clearance of Applicant</th>';
                                     if($barangayclearance==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($barangayclearance==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($barangayclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="barangayclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($barangayclearance==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="barangayclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==8){
                                if($itr_label==""){
                                  echo ' <tr>
                                     <th>8</th>
                                     <th>Parents Certification of Employment/Income Tax Return</th>
                                     <th>No Document</th>
                                     <th><button id="itr" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>8</th>
                                      <th>Parents Certification of Employment/Income Tax Return/</th>';
                                     if($itr==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($itr==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($itr==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="itr" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($itr==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="itr" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }

                                }
                            }else if($req_step==9){
                               if($indigency_label==""){
                                  echo ' <tr>
                                     <th>9</th>
                                     <th>Parents Certificate of Indigency/Certificate of Unemployment</th>
                                     <th>No Document</th>
                                     <th><button id="indigency" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" >Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>9</th>
                                      <th>Parents Certificate of Indigency/Certificate of Unemployment</th>';
                                     if($indigency==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($indigency==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($indigency==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="indigency" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($indigency==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="indigency" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==10){
                               if($application_label==""){
                                  echo ' <tr>
                                     <th>10</th>
                                     <th>Registration Form/Proof of Enrollment</th>
                                     <th>No Document</th>
                                     <th><button id="application" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>10</th>
                                      <th>  Registration Form/Proof of Enrollment</th>';
                                     if($application==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($application==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($application==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="application" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($application==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="application" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }

                                }
                            }else if($req_step==11){
                               if($picture_label==""){
                                  echo ' <tr>
                                     <th>11</th>
                                     <th>2 x 2 Picture </th>
                                     <th>No Document</th>
                                     <th><button id="picture" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>11</th>
                                      <<th>2 x 2 Picture </th>';
                                     if($picture==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($picture==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($picture==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo '<th><button id="picture" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;</th>
                                   </tr>';
                                     }else  if($picture==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="picture" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;</th>
                                   </tr>';
                                     }

                                }
                            }else{
                              if($req_step<=0){
                                if($birthcertificate_label==""){

                                  echo ' <tr>
                                     <th>1</th>
                                     <th>Birth Certificate (should be PSA)</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>1</th>
                                      <th>Birth Certificate (should be PSA)</th>';
                                     if($birthcertificate==2){
                                        echo '<th>Not Yet Approved</th>

                                   </tr>';
                                     }else  if($birthcertificate==1){
                                        echo '<th>Approved</th></tr>';
                                     }else  if($birthcertificate==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($birthcertificate==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }
                            if($req_step<=0){
                                // School Clearance
                                if($schoolclearance_label==""){
                                  echo ' <tr>
                                     <th>2</th>
                                     <th>Certificate of Good Moral</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>2</th>
                                      <th>Certificate of Good Moral</th>';
                                     if($schoolclearance==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($schoolclearance==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($schoolclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($schoolclearance==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                 // Grade Report
                                if($gradereport_label==""){
                                  echo ' <tr>
                                     <th>3</th>
                                     <th>Grade Reports/ Report of Ratings</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>3</th>
                                      <th>Grade Reports/ Report of Ratings</th>';
                                     if($gradereport==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($gradereport==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($gradereport==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($gradereport==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                  // parent voters id
                                if($parentvotersid_label==""){
                                  echo ' <tr>
                                     <th>4</th>
                                     <th>Parents Voter’s ID/ Voter’s Certification</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>4</th>
                                      <th>Parents Voter’s ID/ Voter’s Certification</th>';
                                     if($parentvotersid==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($parentvotersid==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($parentvotersid==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($parentvotersid==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                               if($yourvotersid_label==""){
                                  echo ' <tr>
                                     <th>5</th>
                                     <th>Voters ID or Voters Certification of applicant (for 18 years old and above)</th>
                                     <th>No Document</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>5</th>
                                      <th>Voters ID or Voters Certification of applicant (for 18 years old and above)</th>';
                                     if($yourvotersid==2){
                                        echo '<th>Not Yet Approved</th>

                                   </tr>';
                                     }else  if($yourvotersid==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($yourvotersid==0){
                                        echo '<th>Not Approved. Please update this document</th>

                                   </tr>';
                                     }else  if($yourvotersid==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                               if($housesketch_label==""){
                                  echo ' <tr>
                                     <th>6</th>
                                     <th>Vicinity Map</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>6</th>
                                      <th>Vicinity Map</th>';
                                     if($housesketch==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($housesketch==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($housesketch==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($housesketch==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                 // Barangay Clearance
                                if($barangayclearance_label==""){
                                  echo ' <tr>
                                     <th>7</th>
                                     <th>Barangay Clearance of Applicant</th>
                                     <th>No Document</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>7</th>
                                      <th>Barangay Clearance of Applicant</th>';
                                     if($barangayclearance==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($barangayclearance==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($barangayclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($barangayclearance==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                if($itr_label==""){
                                  echo ' <tr>
                                     <th>8</th>
                                     <th>Parents Certification of Employment/Income Tax Return</th>
                                      <th>No Document</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>8</th>
                                      <th>Parents Certification of Employment/Income Tax Return/</th>';
                                     if($itr==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($itr==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($itr==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($itr==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }else{
                                       echo '<th>No Document</th>
                                       </tr>';
                                     }

                                }
                            }if($req_step<=0){
                               if($indigency_label==""){
                                  echo ' <tr>
                                     <th>9</th>
                                     <th>Parents Certificate of Indigency/Certificate of Unemployment</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>9</th>
                                      <th>Parents Certificate of Indigency/Certificate of Unemployment</th>';
                                     if($indigency==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($indigency==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($indigency==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($indigency==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                               if($application_label==""){
                                  echo ' <tr>
                                     <th>10</th>
                                     <th>Registration Form/Proof of Enrollment</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>10</th>
                                      <th>  Registration Form/Proof of Enrollment</th>';
                                     if($application==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($application==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($application==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($application==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }

                                }
                            }if($req_step<=0){
                               if($picture_label==""){
                                  echo ' <tr>
                                     <th>11</th>
                                     <th>2 x 2 Picture </th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>11</th>
                                      <th>2 x 2 Picture </th>';
                                     if($picture==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($picture==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($picture==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($picture==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }


                                }
                            }else{

                            }
                            }
                            //This is
                          }else {
                            if($req_step==1){
                                if($birthcertificate_label==""){

                                  echo ' <tr>
                                     <th>1</th>
                                     <th>Birth Certificate (should be PSA)</th>
                                     <th>No Document</th>
                                     <th><button id="birthcertificate" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="birthcertificate" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>1</th>
                                      <th>Birth Certificate (should be PSA)</th>';
                                     if($birthcertificate==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="birthcertificate" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($birthcertificate==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="birthcertificate" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($birthcertificate==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo '<th><button id="birthcertificate" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="birthcertificate" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($birthcertificate==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="birthcertificate" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="birthcertificate" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==2){
                                // School Clearance
                                if($schoolclearance_label==""){
                                  echo ' <tr>
                                     <th>2</th>
                                     <th>Certificate of Good Moral</th>
                                     <th>No Document</th>
                                     <th><button id="schoolclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>2</th>
                                      <th>Certificate of Good Moral</th>';
                                     if($schoolclearance==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($schoolclearance==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($schoolclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="schoolclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($schoolclearance==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="schoolclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="schoolclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==3){
                                 // Grade Report
                                if($gradereport_label==""){
                                  echo ' <tr>
                                     <th>3</th>
                                     <th>Grade Reports/ Report of Ratings</th>
                                     <th>No Document</th>
                                     <th><button id="gradereport" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="gradereport" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>3</th>
                                      <th>Grade Reports/ Report of Ratings</th>';
                                     if($gradereport==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="gradereport" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($gradereport==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="gradereport" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($gradereport==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="gradereport" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="gradereport" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($gradereport==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="gradereport" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="gradereport" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==4){
                                  // parent voters id
                                if($parentvotersid_label==""){
                                  echo ' <tr>
                                     <th>4</th>
                                     <th>Parents Voter’s ID/ Voter’s Certification</th>
                                     <th>No Document</th>
                                     <th><button id="parentvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="parentvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>4</th>
                                      <th>Parents Voter’s ID/ Voter’s Certification</th>';
                                     if($parentvotersid==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="parentvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($parentvotersid==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="parentvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($parentvotersid==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="parentvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="parentvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($parentvotersid==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="parentvotersid" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="parentvotersid" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==5){
                               if($housesketch_label==""){
                                  echo ' <tr>
                                     <th>5</th>
                                     <th>Vicinity Map</th>
                                     <th>No Document</th>
                                     <th><button id="housesketch" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="housesketch" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>5</th>
                                      <th>Vicinity Map</th>';
                                     if($housesketch==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="housesketch" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($housesketch==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="housesketch" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($housesketch==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="housesketch" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="housesketch" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($housesketch==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="housesketch" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="housesketch" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==6){
                                 // Barangay Clearance
                                if($barangayclearance_label==""){
                                  echo ' <tr>
                                     <th>6</th>
                                     <th>Barangay Clearance of Applicant</th>
                                     <th>No Document</th>
                                     <th><button id="barangayclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="barangayclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>6</th>
                                      <th>Barangay Clearance of Applicant</th>';
                                     if($barangayclearance==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="barangayclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($barangayclearance==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="barangayclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($barangayclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="barangayclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="barangayclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($barangayclearance==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="barangayclearance" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="barangayclearance" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==7){
                                if($itr_label==""){
                                  echo ' <tr>
                                     <th>7</th>
                                     <th>Parents Certification of Employment/Income Tax Return</th>
                                     <th>No Document</th>
                                     <th><button id="itr" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>7</th>
                                      <th>Parents Certification of Employment/Income Tax Return/</th>';
                                     if($itr==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($itr==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($itr==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="itr" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($itr==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="itr" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="itr" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }

                                }
                            }else if($req_step==8){
                               if($indigency_label==""){
                                  echo ' <tr>
                                     <th>8</th>
                                     <th>Parents Certificate of Indigency/Certificate of Unemployment</th>
                                     <th>No Document</th>
                                     <th><button id="indigency" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" >Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>8</th>
                                      <th>Parents Certificate of Indigency/Certificate of Unemployment</th>';
                                     if($indigency==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($indigency==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($indigency==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="indigency" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($indigency==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="indigency" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="indigency" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }
                                }
                            }else if($req_step==9){
                               if($application_label==""){
                                  echo ' <tr>
                                     <th>9</th>
                                     <th>Registration Form/Proof of Enrollment</th>
                                     <th>No Document</th>
                                     <th><button id="application" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="application" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" >Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>9</th>
                                      <th>  Registration Form/Proof of Enrollment</th>';
                                     if($application==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="application" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($application==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="application" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($application==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo ' <th><button id="application" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="application" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($application==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="application" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq"  disabled>Upload</button>&nbsp;<button id="application" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }

                                }
                            }else if($req_step==10){
                               if($picture_label==""){
                                  echo ' <tr>
                                     <th>10</th>
                                     <th>2 x 2 Picture </th>
                                     <th>No Document</th>
                                     <th><button id="picture" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="picture" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>10</th>
                                      <<th>2 x 2 Picture </th>';
                                     if($picture==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="picture" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq" disabled>Not Applicable</button></th>
                                   </tr>';
                                     }else  if($picture==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="picture" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($picture==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo '<th><button id="picture" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button>&nbsp;<button id="picture" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq">Not Applicable</button></th>
                                   </tr>';
                                     }else  if($picture==3){
                                        echo '<th>Requirements not applicable</th>';
                                         echo '<th><button id="picture" class="btn btn-primary"
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button>&nbsp;<button id="picture" class="btn btn-success"
                                      onClick="setApplicable(this.id)"
                                       data-toggle="modal" data-target="#NotApplicableModalReq"  disabled>Not Applicable</button></th>
                                   </tr>';
                                     }

                                }
                            }else{
                              if($req_step<=0){
                                if($birthcertificate_label==""){

                                  echo ' <tr>
                                     <th>1</th>
                                     <th>Birth Certificate (should be PSA)</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>1</th>
                                      <th>Birth Certificate (should be PSA)</th>';
                                     if($birthcertificate==2){
                                        echo '<th>Not Yet Approved</th>

                                   </tr>';
                                     }else  if($birthcertificate==1){
                                        echo '<th>Approved</th></tr>';
                                     }else  if($birthcertificate==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($birthcertificate==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }
                            if($req_step<=0){
                                // School Clearance
                                if($schoolclearance_label==""){
                                  echo ' <tr>
                                     <th>2</th>
                                     <th>Certificate of Good Moral</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>2</th>
                                      <th>Certificate of Good Moral</th>';
                                     if($schoolclearance==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($schoolclearance==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($schoolclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($schoolclearance==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                 // Grade Report
                                if($gradereport_label==""){
                                  echo ' <tr>
                                     <th>3</th>
                                     <th>Grade Reports/ Report of Ratings</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>3</th>
                                      <th>Grade Reports/ Report of Ratings</th>';
                                     if($gradereport==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($gradereport==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($gradereport==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($gradereport==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                  // parent voters id
                                if($parentvotersid_label==""){
                                  echo ' <tr>
                                     <th>4</th>
                                     <th>Parents Voter’s ID/ Voter’s Certification</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>4</th>
                                      <th>Parents Voter’s ID/ Voter’s Certification</th>';
                                     if($parentvotersid==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($parentvotersid==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($parentvotersid==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($parentvotersid==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                               if($housesketch_label==""){
                                  echo ' <tr>
                                     <th>5</th>
                                     <th>Vicinity Map</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>5</th>
                                      <th>Vicinity Map</th>';
                                     if($housesketch==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($housesketch==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($housesketch==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($housesketch==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                 // Barangay Clearance
                                if($barangayclearance_label==""){
                                  echo ' <tr>
                                     <th>6</th>
                                     <th>Barangay Clearance of Applicant</th>
                                     <th>No Document</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>6</th>
                                      <th>Barangay Clearance of Applicant</th>';
                                     if($barangayclearance==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($barangayclearance==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($barangayclearance==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($barangayclearance==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                                if($itr_label==""){
                                  echo ' <tr>
                                     <th>7</th>
                                     <th>Parents Certification of Employment/Income Tax Return</th>
                                      <th>No Document</th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>7</th>
                                      <th>Parents Certification of Employment/Income Tax Return/</th>';
                                     if($itr==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($itr==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($itr==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($itr==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }else{
                                       echo '<th>No Document</th>
                                       </tr>';
                                     }

                                }
                            }if($req_step<=0){
                               if($indigency_label==""){
                                  echo ' <tr>
                                     <th>8</th>
                                     <th>Parents Certificate of Indigency/Certificate of Unemployment</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>8</th>
                                      <th>Parents Certificate of Indigency/Certificate of Unemployment</th>';
                                     if($indigency==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($indigency==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($indigency==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($indigency==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }
                                }
                            }if($req_step<=0){
                               if($application_label==""){
                                  echo ' <tr>
                                     <th>9</th>
                                     <th>Registration Form/Proof of Enrollment</th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>9</th>
                                      <th>  Registration Form/Proof of Enrollment</th>';
                                     if($application==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($application==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($application==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($application==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }

                                }
                            }if($req_step<=0){
                               if($picture_label==""){
                                  echo ' <tr>
                                     <th>10</th>
                                     <th>2 x 2 Picture </th>
                                     <th>No Document</th>

                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>10</th>
                                      <th>2 x 2 Picture </th>';
                                     if($picture==2){
                                        echo '<th>Not Yet Approved</th>
                                   </tr>';
                                     }else  if($picture==1){
                                        echo '<th>Approved</th>
                                   </tr>';
                                     }else  if($picture==0){
                                        echo '<th>Not Approved. Please update this document</th>
                                   </tr>';
                                     }else  if($picture==3){
                                        echo '<th>Requirements not applicable</th>
                                   </tr>';
                                     }


                                }
                            }else{

                            }
                            }
                          }

                         ?>


                           </tbody>
                         </table>
                      </div>
                      <div class="col-md-12">
                      </div>

                      <div class="col-md-12">
                         <div class="row">

                            <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="col-md-12">
                                   <div class="form-group">
                                    <label for="housenumber">&nbsp</label>
                                      <?php

                                        // if($statuss!="APPROVED"){

                                        // }else{
                                      if($req_step>0){
                                         echo '<a href="back_req.php" class="btn btn-warning btn-fw">Back</a>';
                                            echo "&nbsp&nbsp";
                                      }

                                           echo '<a href="next_req.php" class="btn btn-primary btn-fw">Next</a>';
                                          if($req_step>0){


                                             echo "&nbsp&nbsp";
                                           echo '<a href="finish_req.php" class="btn btn-success btn-fw">Finish uploading</a>';
                                          }

                                        // }

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


 <div class="modal fade" id="UploadModalReq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Scanned Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="uploadRequire.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <input type="hidden" name="requirements" id="requirements">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-large">
                            </div>
              </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>
<div class="modal fade" id="NotApplicableModalReq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requirements Not Applicable</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="requirenotapplicable.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <input type="hidden" name="requirements" id="requirementsapplicale">
                  <h6>Click "Yes" if this requirements is not applicable to your scholarship application</h6>
              </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Yes</button>
      </div>
    </div>
  </div>
</form>
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
