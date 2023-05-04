<?php session_start();
$_SESSION['notif']="NULL";

if(($_SESSION['studenttype']!="fullscholar")||($_SESSION['pages']!="assessnotif-fullscholar")){
 $_SESSION['studenttype']="fullscholar";
  $_SESSION['search']="ALL";
  $_SESSION['pages']="assessnotif-fullscholar";
  $_SESSION['whatsearch']="";
  $_SESSION['order']="ASC";
  $_SESSION['limit']=10;
  $_SESSION['offset']=1;
   $_SESSION['page']=1;
  
}

  require "config.php";
 
  $user ="college";
  $scholar ="fullscholar";
  $usertype="college";
  $filter =$_SESSION['search'];
  $whatsearch=$_SESSION['whatsearch'];
  $order=$_SESSION['order'];
  $limit=$_SESSION['limit'];
  $off=$_SESSION['offset']-1;
$total=0;
  if($_SESSION['page']==""){
    $_SESSION['page']=1;
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
      function getUpdateViewId(id){
        window.open("updateNewStudent.php?id="+id,"_blank");
      }
       function getViewId(id){
        window.open("viewNewStudent.php?id="+id,"_blank");
      }
      function getUserId(id){
        document.getElementById('userid').value=id;
        
      }
      function getUserIds(id){
      
        document.getElementById('updateuserid').value=id;
      }
      function getUsers(users){
        var user = users;
        document.getElementById('users').value=user;
      }
      function getRemoveId(id) {
           document.getElementById('removeid').value=id;   
      }
      function  getApproveId(id){
         document.getElementById('approveid').value=id;
      }
       function  getResetId(id){
         document.getElementById('resetid').value=id;
      }
       function  getTransferId(id){
         document.getElementById('transferid').value=id;
      }
      function  setRenewal(id){
         document.getElementById('renewalid').value=id;
      }
       function  getRenew(id){
         document.getElementById('renewid').value=id;
      }
      function getUsersApprove(id){
         document.getElementById('graduateid').value=id;
      }
       function getUsersTransfer(id){
         document.getElementById('transferid').value=id;
      }
       function getAssessment(){
        window.open("existing_assessmentall.php","_blank");
      }
        function getAssessmentNot(){
        window.open("not_for_renewal.php","_blank");
      }
       function getAssessmentRenewal(){
        window.open("for_renewal.php","_blank");
      }
      function gotoExisting(id){
        window.open("searchExisting.php?id="+id,"_self");
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
                  <h4 class="page-title">Assessment Notification > College Full Scholarship </h4>
                  
                </div>
              </div>
            </div>
              <div class="row">
            
            
            </div>
           
               
            
            <!-- </div> -->
            <!-- Page Title Header Ends-->
            <div class="row">
              <!-- Tabe here -->
               <?php
                $status="ASSESS";
                $stats=2;
                $limit = 10;
 $status1="OPEN";
                 $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];


                      $sql = "SELECT tbl_admin.id as adminid,tbl_assess_req.id,tbl_assess_req.academic_year,tbl_assess_req.application_no,tbl_assess_req.school_id,tbl_assess_req.registration_form,tbl_assess_req.school_clearance,tbl_assess_req.gradereport 
                        FROM tbl_assess_req 
                        INNER JOIN tbl_admin 
                        ON tbl_assess_req.academic_year=tbl_admin.academic_year AND tbl_assess_req.application_no=tbl_admin.application_no WHERE (tbl_assess_req.school_id='$stats' OR tbl_assess_req.registration_form='$stats' OR tbl_assess_req.school_clearance='$stats'  OR tbl_assess_req.gradereport='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_assess_req.academic_id='$academic_id' ORDER BY tbl_assess_req.id ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_assess_req.id) as total 
                        FROM tbl_assess_req 
                        INNER JOIN tbl_admin 
                        ON tbl_assess_req.academic_year=tbl_admin.academic_year AND tbl_assess_req.application_no=tbl_admin.application_no  
                        WHERE (tbl_assess_req.school_id='$stats' OR tbl_assess_req.registration_form='$stats' OR tbl_assess_req.school_clearance='$stats'  OR tbl_assess_req.gradereport='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_assess_req.academic_id='$academic_id'";
                      
                            
                
                $result = $conn->query($sql);
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $total=$row1['total'];
              ?>
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <h4 class="card-title"> List of College Recipient </h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:5%;">#</th>
                          <th style="width:20%;">Name</th>
                          <th style="width:60%;">Status</th>
                          <th style="width:15%;"><center>Action</center></th>
                        </tr>
                      </thead>
                      <tbody style="font-size:9px;">
                          <?php
                          $count=$off;
                            while($row = $result->fetch_assoc()){
                           
                              $academic_year=$row['academic_year'];
                              $application_no=$row['application_no'];

                              $sqlg = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                              $resultg = $conn->query($sqlg);
                              $rowg = $resultg->fetch_assoc();

                              $name = $rowg['firstname'].' '.$rowg['lastname'];

                              $remark="Uploaded ";
                              if($row['school_id']==2){
                                  $remark.="School Id / ";
                              }
                              if($row['registration_form']==2){
                                  $remark.="Registration Form / ";
                              }
                              if($row['school_clearance']==2){
                                  $remark.="School Clearance / ";
                              }
                              if($row['gradereport']==2){
                                  $remark.="Grade Report / ";
                              }
                             
                             
                                $count++;
                                 echo '<tr>';
                                  echo '<td style="width:5%;">';
                                  echo $count;
                                  echo '</td>';
                                  echo '<td style="width:20%;">';
                                  echo $name;
                                  echo '</td>';
                                  echo '<td style="width:60%;">';
                                  echo $remark;
                                  echo '</td>';
                                  echo '<td style="width:15%;"><center>';
                                  echo '<form action="searchExisting.php" method="POST">';
                                  echo '<input type="hidden" value="';
                                  echo $row['adminid'];
                                  echo '" name="ids">';
                                     echo '<button type="submit" id="';
                                          echo $row['adminid'];
                                          echo '" type="button" class="btn btn-icons btn-rounded btn-primary">
                                            <i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Click to search existing college full scholars"></i>';
                                             echo '</button>';
                                  echo '</form>';
                                  echo '</center></td>';
                                  echo '</tr>';
                             }
                          ?>
                      </tbody>
                    </table>
                   <div class="col-md-3">
                      <?php
                        if($_SESSION['page']<=1){
                          echo '<button class="btn btn-warning" disabled>Previous</button>';
                        }else{
                           echo '<a href="back_assess.php" class="btn btn-warning" >Previous</a>';
                        }
                      ?>
                       <?php echo ($off+1)."-".$count.'/'.$total?>
                        <?php
                        if($count>=$total){
                          echo '<button class="btn btn-primary" disabled>Next</button>';
                        }else{
                           echo '<a href="next_assess.php" class="btn btn-primary">Next</a>';
                        }
                      ?>
                       
                    </div>
                    <div class="col-md-9" style="text-align: right;">
                      (Total searched records: <?php echo $total?>)
                       
                    </div>
                     
                    </div>
                  </div>
                </div>
              </div>
              <!-- end table -->
            </div>
            
           
          </div>
<div class="modal fade" id="modalTransfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="transferScholars.php" method="post">
      <div class="modal-body">
      
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This student will transfer to full scholarship.</span>
            </p>
         </div>
      
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="transferid">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Transfer">
      </div>
    </div>
  </form>
  </div>
</div>


<div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send for Archive</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="sendGraduate.php" method="post">
      <div class="modal-body">
      
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This applicant already graduate.</span>
            </p>
         </div>
      
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="graduateid">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Archive">
      </div>
    </div>
  </form>
  </div>
</div>

<div class="modal fade" id="renewStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Renew/Not Renew Scholars</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="renewScholars.php" method="post">
      <div class="modal-body">
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" id="renewid">
                <label >Assessment</label>
                  <select class="form-control" name="assess" required>
                    <option value="For Renewal">For Renewal</option>
                    <option value="Not For Renewal">Not For Renewal</option>
                  </select>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <label >Grade Remarks</label>
                  <select class="form-control" name="grade" required>
                    <option value="No Failing Grade">No Failing Grade</option>
                    <option value="With Failing Grade">With Failing Grade</option>
                     <option value="N/A">N/A</option>
                  </select>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <label >Remarks</label>
                  <textarea name="remarks" class="form-control"></textarea>
              </div>
          </div>

          </div>
      
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="SUBMIT">
      </div>
    </div>
  </form>
  </div>
</div>


<div class="modal fade" id="modalRenewal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send for Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="sendRenewalReq.php" method="post">
      <div class="modal-body">
      
         <div class="col-md-12">
            <p>
              <span style="font-size:1.25em;">Click [SEND] to email scholars for renewal requirements.</span>
            </p>
         </div>
      
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="userid" id="renewalid">
             
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="SEND">
      </div>
    </div>
  </form>
  </div>
</div>';


<div class="modal fade" id="modalRemove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Scholars</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="removeScholars.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">You cannot undo this action after you press [Remove] button.</span>
            </p>
         </div>
       
         <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="removeid">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Remove">
      </div>
    </div>
  </form>
  </div>
</div>
<!-- Renewwal Requirements -->


<!-- End Update Requirement -->
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