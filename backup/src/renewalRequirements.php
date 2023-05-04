<?php session_start();
$_SESSION['counter']=1;
$username = $_SESSION['username'];

require "config.php";
$status="NEWAPPLICANT";
$userid="";
$typescholar="";

$school_id=2;
$registration_form=2;



$school_id_label="";
$registration_form_label="";


$academic_id=0;


 $status1="OPEN";
                            $status2="CURRENT";
                          $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
                            $resulta = $conn->query($sqla);   
                           $rowa = $resulta->fetch_assoc();
$academic_id=$rowa['id'];
$_SESSION['academic_id']=$academic_id;

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

     if(($statuss="OK")||($statuss="RENEW")||($statuss="ASSESS")){
        
    }else{
      header('Location:studentregister.php');
    }


    $sql1 = "SELECT * FROM tbl_renew_label WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      $school_id_label=$row1['school_id'];
      $registration_form_label=$row1['registration_form'];
     
    }

     $sql1 = "SELECT * FROM tbl_renew WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      $school_id=$row1['school_id'];
      $registration_form=$row1['registration_form'];
     
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
                  <h4 class="page-title">Renewal Requirements</h4>
                  
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
                         <table  style="width:100%;" class="table">
                           <thead>
                             <tr>
                               <th style="width:10%;">#</th>
                               <th style="width:40%;">Requirements</th>
                               <th style="width:30%;">Status</th>
                               <th style="width:20%;">Action</th>
                             </tr>
                           </thead>
                           <tbody>
                           <?php
                            $status1="OPEN";
                            $status2="CURRENT";
                          $sqla = "SELECT COUNT(*) as req FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
                            $resulta = $conn->query($sqla);   
                           $rowa = $resulta->fetch_assoc();
                          if($rowa['req']>0){
                             if($school_id_label==""){
                                  echo ' <tr>
                                     <th>';

                                     echo '1</th>
                                     <th>School Id </th>
                                     <th>No Document</th>
                                     <th><button id="school_id" class="btn btn-primary" 
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>1</th>
                                      <th>School Id </th>';
                                     if($school_id==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button></th>
                                   </tr>';
                                     }else  if($school_id==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button></th>
                                   </tr>';
                                     }else  if($school_id==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo '<th><button id="school_id" class="btn btn-primary" 
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button></th>
                                   </tr>';
                                     }
                                     
                                    
                                }

                               
                                 if($registration_form_label==""){
                                  echo ' <tr>
                                     <th>2</th>
                                     <th>Registration Form </th>
                                     <th>No Document</th>
                                     <th><button id="registration_form" class="btn btn-primary" 
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button></th>
                                   </tr>';
                                }else{
                                  echo ' <tr>
                                     <th>2</th>
                                      <th>Registration Form </th>';
                                     if($registration_form==2){
                                        echo '<th>Not Yet Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button></th>
                                   </tr>';
                                     }else  if($registration_form==1){
                                        echo '<th>Approved</th>';
                                         echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModalReq" disabled>Upload</button></th>
                                   </tr>';
                                     }else  if($registration_form==0){
                                        echo '<th>Not Approved. Please update this document</th>';
                                         echo '<th><button id="registration_form" class="btn btn-primary" 
                                      onClick="setRequirements(this.id)"
                                       data-toggle="modal" data-target="#UploadModalReq">Upload</button></th>
                                   </tr>';
                                     }
                                     
                                    
                                }
                            }else{
                                echo '<h4>***<i>';
                              echo 'Submission of renewal requirements is already closed. Please contact YDO for more details';
                              echo '***</i></h4>';
                            } 

                           ?>
                             
                         
                           </tbody>
                         </table>
                      </div>
                      <div class="col-md-12">
                      </div>
                    
                      <div class="col-md-12">
                         <div class="row">
                           <div class="col-md-9">
                           </div>
                            <div class="col-md-3">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="col-md-12">
                                   <div class="form-group">
                                    <label for="housenumber">&nbsp</label>
                                      <?php

                                        if($statuss!="APPROVED"){
                                         
                                        }else{
                                           echo '<a href="nextlevel.php" class="btn btn-primary btn-fw">Next</a>';
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
      <form action="uploadRenewalReq.php" method="post" enctype="multipart/form-data">
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