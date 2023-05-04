<?php session_start();
$_SESSION['notif']="NULL";

if($_SESSION['pages']!="officialreport-collegerecipient"){

 
    
       
        $_SESSION['search']="ALL";
        $_SESSION['pages']="officialreport-collegerecipient";
        $_SESSION['whatsearch']="";
        $_SESSION['order']="ASC";
        $_SESSION['limit']=10;
        $_SESSION['offset']=1;
     
   
  
 
  
} 

  require "config.php";
 
  $user ="college";
  $scholar ="collegerecipient";
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
        window.open("applicantResultReport.php","_blank");
      }
        function getAssessmentNot(){
        window.open("not_for_renewal.php","_blank");
      }
       function getAssessmentRenewal(){
        window.open("for_renewal.php","_blank");
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
                  <h4 class="page-title">Reports > Official Result</h4>
                  
                </div>
              </div>
            </div>
             <div class="row">
            
              <div class="col-md-8 ">
                <div class="page-header-toolbar">
                 <button type="button" class="btn btn-primary btn-fw" onClick="getAssessment()">Download Reports</button> &nbsp
                <!--   <button type="button" class="btn btn-warning btn-fw" onClick="getAssessmentNot()">Download Scholars Assessment Report - Not for Renewal</button> &nbsp
                 <button type="button" class="btn btn-success btn-fw" onClick="getAssessmentRenewal()">Download Scholars Assessment Report - For Renewal</button>
                  &nbsp -->
               </div>
              </div>
            </div>
              <div class="col-md-12"><hr></div>
               <form  action="getOfficialReport.php" method="post">
              <div class="col-md-12">
                <!-- <div class="page-header-toolbar"> -->
                  <div class="row">
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="searchshs">ACADEMIC YEAR</label>
                            <div class="input-group">
                               <select name="searchshs" id="searchshs" class="form-control">
                               <?php
                                $sql4="SELECT * from tbl_academic";
                                 $result4 = $conn->query($sql4);
                                while($row4 = $result4->fetch_assoc()){
                                  if($_SESSION['whatsearch']==$row4['academic_year']){
                                        echo '<option value="';
                                        echo $_SESSION['whatsearch'];
                                        echo '" selected>';
                                         echo $_SESSION['whatsearch'];
                                        echo '</option>';
                                  }else{
                                        echo '<option value="';
                                        echo $row4['academic_year'];
                                        echo '">';
                                         echo $row4['academic_year'];
                                        echo '</option>';
                                  }
                                
                                }
                              
                               ?>

                            
                                
                            
                              </select>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="housenumber">Filter</label>
                            <div class="input-group">
                              <select name="filter" id="filter" class="form-control">
                                <?php
                                  echo '<option value="';
                                  echo $_SESSION['search'];
                                  echo '">';
                                   echo $_SESSION['search'];
                                  echo '</option>';
                                ?>
                                
                                <option value="ALL">ALL</option>
                                 <option value="FULL SCHOLARSHIP">FULL SCHOLARSHIP</option>
                                 <option value="COLLEGE EDUCATIONAL ASSISTANCE">COLLEGE EDUCATIONAL ASSISTANCE</option>
                                  <option value="SHS EDUCATIONAL ASSISTANCE">SHS EDUCATIONAL ASSISTANCE</option>
                              </select>
                            </div>
                          </div>
                    </div>
                     <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">Order</label>
                            <div class="input-group">
                              <select name="order" id="order" class="form-control">
                                 <?php
                                  echo '<option value="';
                                  echo $_SESSION['order'];
                                  echo '">';
                                  if($_SESSION['order']=="ASC"){
                                    echo 'ASCENDING';
                                  }else{
                                    echo 'DESCENDING';
                                  }
                                  echo '</option>';
                                ?>
                                <option value="ASC">ASCENDING</option>
                                <option value="DESC">DESCENDNG</option>
                              </select>
                            </div>
                          </div>
                     </div>
                      <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">Results per Line</label>
                            <div class="input-group">
                              <select name="limit" id="limit" class="form-control">
                                <?php
                                  echo '<option value="';
                                  echo $_SESSION['limit'];
                                  echo '">';
                                   echo $_SESSION['limit'];
                                  echo '</option>';
                                ?>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                              </select>
                            </div>
                          </div>
                     </div>
                     <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp

                          </label>
                            <button type="submit" class="btn btn-success btn-fw">Click to Search</button>
                          </div>
                     </div>
                   
                  </div>
                 </form>
                <!-- </div> -->
              </div>
            <!-- </div> -->
            <!-- Page Title Header Ends-->
            <div class="row">
              <!-- Tabe here -->
               <?php
                $status="OK";
                $status1="RENEW";
                $status2="ASSESS";

                $remove="YES";

                if($filter=="ALL"){
                $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];
                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic'";
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic'";
                  }
              }else if($filter=="FULL SCHOLARSHIP"){
              	$scholarship="fullscholar";
                $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];
               

                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship'";
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship'";
                  }
              }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
              	$scholarship="collegerecipient";
                 $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];

                  if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship'";
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship'";
                  }
              }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
              	$scholarship="shscholar";
                  $acads= $_SESSION['whatsearch'];
                $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$acads'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $academic=$rowa['id'];

                 if($order=="ASC"){
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship'";
                  }else{
                     $acad=0;
                       $sql = "SELECT tbl_admin.id,tbl_admin.username,tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.school,tbl_studentinfo.course,tbl_studentinfo.barangay
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                         $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE tbl_remarks.process ='$status' AND tbl_remarks.academic_id='$academic' AND tbl_remarks.scholars='$scholarship'";
                  }
              }
                $result = $conn->query($sql);
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $total=$row1['total'];
              ?>
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <h4 class="card-title">List of Official Result</h4>
                    <table class="table">
                      <thead>
                        <tr>
                           <th style="width:5%;">#</th>
                          <th style="width:20%;">Email</th>
                          <th style="width:20%;">Name</th>
                          <th style="width:20%;">Barangay</th>
                          <th style="width:20%;">School</th>
                          <th style="width:15%;">Course/Track</th>
                         
                        </tr>
                      </thead>
                      <tbody style="font-size:9px;">
                          <?php
                          $count=$off;
                        
                            while($row = $result->fetch_assoc()){
                             
                                          $count++;
                                          echo '<tr>';
                                          echo '<td>';
                                          echo $count;
                                          echo '</td>';
                                          echo '<td>';
                                          echo $row['username'];
                                          echo '</td>';
                                          echo '<td>';
                                          echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
                                          echo '</td>';
                                          echo '<td>';
                                          echo $row['barangay'];
                                          echo '</td>'; 
                                           echo '<td>';
                                          echo $row['school'];
                                          echo '</td>';
                                           echo '<td>';
                                          echo $row['course'];
                                          echo '</td>';
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
                           echo '<a href="officialreport_back.php" class="btn btn-warning" >Previous</a>';
                        }
                      ?>
                       <?php echo ($off+1)."-".$count.'/'.$total?>
                        <?php
                        if($count>=$total){
                          echo '<button class="btn btn-primary" disabled>Next</button>';
                        }else{
                           echo '<a href="officialreport_next.php" class="btn btn-primary">Next</a>';
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



?>

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