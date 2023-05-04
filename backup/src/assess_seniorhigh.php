<?php session_start();
$_SESSION['notif']="NULL";

if(($_SESSION['studenttype']!="shscholar")||($_SESSION['pages']!="assesscurrent-shscholar")){

  if($_SESSION['pages']!="assessnotif-shscholar"){
   
          $_SESSION['studenttype']="shscholar";
        $_SESSION['search']="ALL";
        $_SESSION['pages']="assesscurrent-shscholar";
        $_SESSION['whatsearch']="";
        $_SESSION['order']="ASC";
        $_SESSION['limit']=10;
        $_SESSION['offset']=1;
  
   
  }else{
     $_SESSION['studenttype']="shscholar";
  }
 
  
}


  require "config.php";
 
  $user ="shs";
  $scholar ="shscholar";
  $usertype="shs";
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
      function getBlock(id){
         document.getElementById('blockid').value=id;
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
                  <h4 class="page-title">Assessment Recipients > SHS Educational Assistance </h4>
                  
                </div>
              </div>
            </div>
              <div class="row">
            
              <div class="col-md-8 ">
                <div class="page-header-toolbar">
                 <button type="button" class="btn btn-primary btn-fw" onClick="getAssessment()">Download Scholars Assessment Report</button> &nbsp
               <button type="button" class="btn btn-warning btn-fw" data-toggle="modal" data-target="#filterNoRenewal" >Download Scholars Assessment Report - Not For Renewal</button>
                  &nbsp
                 <!-- onClick="getAssessmentRenewal()" -->
                 <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#filterRenewal" >Download Scholars Assessment Report - For Renewal</button>
                  &nbsp
               </div>
              </div>
            </div>
              <div class="col-md-12"><hr></div>
               <form  action="getAssessSearch.php" method="post">
              <div class="col-md-12">
                <!-- <div class="page-header-toolbar"> -->
                  <div class="row">
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="searchshs">Search</label>
                            <div class="input-group">
                              <input type="text" name="searchshs" id="searchshs" class="form-control" placeholder="Search here" value="<?php echo $_SESSION['whatsearch']; ?>">
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
                                 <option value="EMAIL">EMAIL</option>
                                <option value="LAST NAME">LAST NAME</option>
                                <option value="FIRST NAME">FIRST NAME</option>
                                 <option value="GRADE 11">GRADE 11</option>
                                <option value="GRADE 12">GRADE 12</option>
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
                $status="ASSESS";
                 if($filter=="ALL"){
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'";
                      
                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'";
                   
                  }              
                }else if($filter=="GRADE 11"){
                  $gradelevels="Grade 11";
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'  AND tbl_studentinfo.gradelevel LIKE '%$filter%'";
                      
                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'  AND tbl_studentinfo.gradelevel LIKE '%$filter%'";
                   
                  }              
                }else if($filter=="GRADE 12"){
                  $gradelevels="Grade 12";
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'  AND tbl_studentinfo.gradelevel LIKE '%$filter%'";
                      
                  
                    
                   
                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'  AND tbl_studentinfo.gradelevel LIKE '%$filter%'";
                  }              
                }else if($filter=="EMAIL"){
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch'";
                      
                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch'";
                   
                  }              
                }else if($filter=="LAST NAME"){

                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%'";
                      
                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%'";
                   
                  }              
                }else if($filter=="FIRST NAME"){

                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%'";
                      
                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
                      
                       $sql1 = "SELECT COUNT(tbl_admin.id) as total 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%'";
                   
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
                        <h4 class="card-title"> List of SHS Current Recipients</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:5%;">#</th>
                          <th style="width:15%;">Email</th>
                          <th style="width:25%;">Name</th>
                          <th style="width:15%;">Barangay</th>
                          <th style="width:10%;">Contact</th>
                          <th style="width:30%;"><center>Action</center></th>
                        </tr>
                      </thead>
                      <tbody style="font-size:9px;">
                          <?php
                          $count=$off;
                            while($row = $result->fetch_assoc()){
                              $count++;
                              $academic_year=$row['academic_year'];
                              $application_no=$row['application_no'];
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
                                echo $row['phone'];
                                echo '</td>'; 
                                echo '<td><center>';
								  echo '<a href="updateNewStudent.php?id=';
												 echo $row['id'];
												 echo '" type="button" class="btn btn-icons btn-rounded btn-success">
                                              <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to update information"></i>';
                                               echo '</a>&nbsp';
                              $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
                                
                                
                                           $sqlb = "SELECT * FROM tbl_assess_req WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                                        $resultb = $conn->query($sqlb);
                                        if ($resultb->num_rows > 0){
                                            $rowb = $resultb->fetch_assoc();
                                          
                                           // if($rowb['status']=="LATE"){
                                               // Start Edit
                                              echo '<button id="';
                                            echo $rowb['id'];
                                            echo '" type="button" class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" 
                                              style="background-color:#d4380d;"
                                              data-target="#updateAssessment';
                                            echo $rowb['id'];
                                            echo '">
                                              <i class="fa fa-file-o" data-toggle="tooltip" data-placement="top" title="Click to view/approve assessment requirement!"></i>';
                                               echo '</button>&nbsp';
                                               //End Edit 
                                           // }else{
                                           //      // Start Edit
                                           //    echo '<button id="';
                                           //  echo $rowb['id'];
                                           //  echo '" type="button" class="btn btn-icons btn-rounded btn-success" data-toggle="modal" data-target="#updateAssessment';
                                           //  echo $rowb['id'];
                                           //  echo '">';
                                          
                                           //    echo '<i class="fa fa-file-o" data-toggle="tooltip" data-placement="top" title="Click to view/approve assessment requirement!"></i>';
                                           //     echo '</button>&nbsp';
                                           //     //End Edit 
                                           // }
                                         
                                        }
                                       // }



                                      
                                  

                                  $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                                  $resultz = $conn->query($sqlz);
                                  $rowz = $resultz->fetch_assoc();
                                 

                                  if ($resultz->num_rows > 0){
                                       echo '<button id="';
                                      echo $rowz['id'];
                                      echo '" type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" data-target="#updateGrades';
                                       echo $rowz['id'];
                                      echo '">
                                        <i class="fa fa-address-card" data-toggle="tooltip" data-placement="top" title="Click to view/update grades!"></i>';
                                         echo '</button>&nbsp';
                                  }
                                     echo '&nbsp';

                                     echo '<button id="';
                                     echo $row['id'];
                                     echo '" onClick="getRemoveId(this.id)" type="button" class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#modalRemove">
                                  <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Click to remove scholars"></i>';
                                   echo '</button>';
                                echo '&nbsp';  

                              

      //                              $sqlg = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      // $resultg = $conn->query($sqlg);
                                  
      // if ($resultg->num_rows <= 0){
           echo '&nbsp;<button id="';
                echo $row['id'];
                echo '" type="button" onClick="getRenew(this.id)" style="background-color:#2f54eb;" class="btn btn-icons btn-rounded btn-success" data-toggle="modal" data-target="#renewStudent">';
                  echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click to renew/not renew this scholars!"></i>';
                    echo '</button>&nbsp';
      // }
echo '&nbsp;<button id="';
                echo $row['id'];
                echo '" type="button" onClick="getBlock(this.id)"  class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#modalBlock">';
                  echo '<i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Click to block this recipient!"></i>';
                    echo '</button>&nbsp';
      echo '&nbsp';  
     echo '<button id="';
    echo $row['id'];
      echo '" type="button" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalApprove" onClick="getUsersApprove(this.id)">
        <i class="fa fa-archive" data-toggle="tooltip" data-placement="top" title="Click to archive this scholars!"></i>';
      echo '</button>';
       if($_SESSION['usertype']=="superadmin"){
        echo '&nbsp<a href="viewAssessRequirements.php?id=';
      echo $row['id'];
      echo '" type="button" class="btn btn-icons btn-rounded btn-warning">';
      echo '<i style="color:white;" class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Click to view requirements information!"></i>';
                    echo '</a>&nbsp';
      }
    //     echo '&nbsp';  
    //  echo '<button id="';
    // echo $row['id'];
    //   echo '" type="button" class="btn btn-icons btn-rounded btn-success" data-toggle="modal" data-target="#modalTransfer" onClick="getUsersTransfer(this.id)">
    //     <i class="fa fa-retweet" data-toggle="tooltip" data-placement="top" title="Click to transfer scholars!"></i>';
    //   echo '</button>';
      
                                echo '</center></td>'; 
                            }
                          ?>
                      </tbody>
                    </table>
                   <div class="col-md-3">
                      <?php
                        if($_SESSION['page']<=1){
                          echo '<button class="btn btn-warning" disabled>Previous</button>';
                        }else{
                           echo '<a href="assess_current_back.php" class="btn btn-warning" >Previous</a>';
                        }
                      ?>
                       <?php echo ($off+1)."-".$count.'/'.$total?>
                        <?php
                        if($count>=$total){
                          echo '<button class="btn btn-primary" disabled>Next</button>';
                        }else{
                           echo '<a href="assess_current_next.php" class="btn btn-primary">Next</a>';
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
<div class="modal fade" id="filterNoRenewal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter Not For Renewal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="not_for_renewal.php" method="post">
      <div class="modal-body">
      
      
        <div class="col-md-12">
            <div class="form-group">
               <label >Filter By:</label>
               <select class="form-control" name="ren_filter">
                  <option value="ALL">ALL</option>
                  <option value="SCHOOL">SCHOOL</option>
                  <option value="LASTNAME">LASTNAME</option>
                  <option value="GRADE LEVEL">GRADE LEVEL</option>
               </select>
            </div>

         </div>
          <div class="col-md-12">
            <div class="form-group">
               <label >Enter Spacing</label>
               <input class="form-control" type="number" name="spacing">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="View PDF">
      </div>
    </div>
  </form>
  </div>
</div>

          
<div class="modal fade" id="filterRenewal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter Renewal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="for_renewal.php" method="post">
      <div class="modal-body">
      
      
        <div class="col-md-12">
            <div class="form-group">
               <label >Filter By:</label>
               <select class="form-control" name="ren_filter">
                  <option value="ALL">ALL</option>
                  <option value="SCHOOL">SCHOOL</option>
                  <option value="LASTNAME">LASTNAME</option>
                   <option value="GRADE LEVEL">GRADE LEVEL</option>
               </select>
            </div>

         </div>
         <div class="col-md-12">
            <div class="form-group">
               <label >Enter Spacing</label>
               <input class="form-control" type="number" name="spacing">
            </div>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="View PDF">
      </div>
    </div>
  </form>
  </div>
</div>

<div class="modal fade" id="modalBlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Block Recipient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="blockScholars.php" method="post">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Choose Status</label>
            <select class="form-control" name="status">
              <option value="REMOVED">REMOVED</option>
              <option value="GRADUATED">GRADUATED</option>
            </select>
          </div>
          
        </div>
      
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This student cannot apply for college scholarship or recipients.</span>
            </p>
         </div>
      
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="blockid">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Block">
      </div>
    </div>
  </form>
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
<?php
  $status="ASSESS";
if($filter=="ALL"){
  if($order=="ASC"){
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin 
    INNER JOIN tbl_studentinfo 
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;
    
                                         
  }else{
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin 
    INNER JOIN tbl_studentinfo 
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;
    
  }
  $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
    $academic_year=$row['academic_year'];
    $application_no=$row['application_no'];
       $sqlg = "SELECT * FROM tbl_renew WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resultg = $conn->query($sqlg);
        if ($resultg->num_rows > 0){
           $rowg = $resultg->fetch_assoc();
             $sqld = "SELECT * FROM tbl_renew_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $resultd = $conn->query($sqld);
              $rowd = $resultd->fetch_assoc();
              $school_id_label=isset($rowd['school_id']);
              $registration_form_label=isset($rowd['registration_form']);
            echo '<div class="modal fade" id="updateRenewal';
            echo $rowg['id'];
            echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form action="updateRenewal.php" method="post">
                <div class="modal-header">';
                 echo'  <h5 class="modal-title" id="exampleModalLabel">Renewal Requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>';
                echo '</div>';
            echo '<div class="modal-body">

                  <div class="row">
                    <div class="col-md-12">
                     <input type="hidden" name="academic_year"value="';
                     echo $academic_year;
                     echo '">
                     <input type="hidden" name="application_no"value="';
                     echo $application_no;
                     echo '">
                     <input type="hidden" name="academic_id"value="';
                     echo $academic_id;
                     echo '">
                   
                    </div>';
                     if($rowg['school_id']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View';
                              echo '</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }

                       if($rowg['registration_form']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                   <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }
                  echo '</div>';
                echo '</div>';
                 echo '<div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>';


              echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
        }
   }



}else if($filter=="EMAIL"){
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        
  }
  $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
    $academic_year=$row['academic_year'];
    $application_no=$row['application_no'];
       $sqlg = "SELECT * FROM tbl_renew WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resultg = $conn->query($sqlg);
        if ($resultg->num_rows > 0){
           $rowg = $resultg->fetch_assoc();
             $sqld = "SELECT * FROM tbl_renew_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $resultd = $conn->query($sqld);
              $rowd = $resultd->fetch_assoc();
              $school_id_label=isset($rowd['school_id']);
              $registration_form_label=isset($rowd['registration_form']);
            echo '<div class="modal fade" id="updateRenewal';
            echo $rowg['id'];
            echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form action="updateRenewal.php" method="post">
                <div class="modal-header">';
                 echo'  <h5 class="modal-title" id="exampleModalLabel">Renewal Requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>';
                echo '</div>';
            echo '<div class="modal-body">

                  <div class="row">
                    <div class="col-md-12">
                     <input type="hidden" name="academic_year"value="';
                     echo $academic_year;
                     echo '">
                     <input type="hidden" name="application_no"value="';
                     echo $application_no;
                     echo '">
                     <input type="hidden" name="academic_id"value="';
                     echo $academic_id;
                     echo '">
                   
                    </div>';
                     if($rowg['school_id']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View';
                              echo '</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }

                       if($rowg['registration_form']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                   <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }
                  echo '</div>';
                echo '</div>';
                 echo '<div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>';


              echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
        }
   }
}else if($filter=="GRADE 11"){
	 $gradelevels="Grade 11";
  if($order=="ASC"){
   
     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$gradelevels%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        
                        
                                        
  }else{
   $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        
                        
  }
  $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
    $academic_year=$row['academic_year'];
    $application_no=$row['application_no'];
       $sqlg = "SELECT * FROM tbl_renew WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resultg = $conn->query($sqlg);
        if ($resultg->num_rows > 0){
           $rowg = $resultg->fetch_assoc();
             $sqld = "SELECT * FROM tbl_renew_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $resultd = $conn->query($sqld);
              $rowd = $resultd->fetch_assoc();
              $school_id_label=isset($rowd['school_id']);
              $registration_form_label=isset($rowd['registration_form']);
            echo '<div class="modal fade" id="updateRenewal';
            echo $rowg['id'];
            echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form action="updateRenewal.php" method="post">
                <div class="modal-header">';
                 echo'  <h5 class="modal-title" id="exampleModalLabel">Renewal Requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>';
                echo '</div>';
            echo '<div class="modal-body">

                  <div class="row">
                    <div class="col-md-12">
                     <input type="hidden" name="academic_year"value="';
                     echo $academic_year;
                     echo '">
                     <input type="hidden" name="application_no"value="';
                     echo $application_no;
                     echo '">
                     <input type="hidden" name="academic_id"value="';
                     echo $academic_id;
                     echo '">
                   
                    </div>';
                     if($rowg['school_id']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View';
                              echo '</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }

                       if($rowg['registration_form']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                   <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }
                  echo '</div>';
                echo '</div>';
                 echo '<div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>';


              echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
        }
   }
}else if($filter=="FIRST NAME"){
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
    $academic_year=$row['academic_year'];
    $application_no=$row['application_no'];
       $sqlg = "SELECT * FROM tbl_renew WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resultg = $conn->query($sqlg);
        if ($resultg->num_rows > 0){
           $rowg = $resultg->fetch_assoc();
             $sqld = "SELECT * FROM tbl_renew_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $resultd = $conn->query($sqld);
              $rowd = $resultd->fetch_assoc();
              $school_id_label=isset($rowd['school_id']);
              $registration_form_label=isset($rowd['registration_form']);
            echo '<div class="modal fade" id="updateRenewal';
            echo $rowg['id'];
            echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form action="updateRenewal.php" method="post">
                <div class="modal-header">';
                 echo'  <h5 class="modal-title" id="exampleModalLabel">Renewal Requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>';
                echo '</div>';
            echo '<div class="modal-body">

                  <div class="row">
                    <div class="col-md-12">
                     <input type="hidden" name="academic_year"value="';
                     echo $academic_year;
                     echo '">
                     <input type="hidden" name="application_no"value="';
                     echo $application_no;
                     echo '">
                     <input type="hidden" name="academic_id"value="';
                     echo $academic_id;
                     echo '">
                   
                    </div>';
                     if($rowg['school_id']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View';
                              echo '</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }

                       if($rowg['registration_form']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                   <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }
                  echo '</div>';
                echo '</div>';
                 echo '<div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>';


              echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
        }
   }
}else if($filter=="LAST NAME"){
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
    $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
    $academic_year=$row['academic_year'];
    $application_no=$row['application_no'];
       $sqlg = "SELECT * FROM tbl_renew WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resultg = $conn->query($sqlg);
        if ($resultg->num_rows > 0){
           $rowg = $resultg->fetch_assoc();
             $sqld = "SELECT * FROM tbl_renew_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
              $resultd = $conn->query($sqld);
              $rowd = $resultd->fetch_assoc();
              $school_id_label=isset($rowd['school_id']);
              $registration_form_label=isset($rowd['registration_form']);
            echo '<div class="modal fade" id="updateRenewal';
            echo $rowg['id'];
            echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form action="updateRenewal.php" method="post">
                <div class="modal-header">';
                 echo'  <h5 class="modal-title" id="exampleModalLabel">Renewal Requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>';
                echo '</div>';
            echo '<div class="modal-body">

                  <div class="row">
                    <div class="col-md-12">
                     <input type="hidden" name="academic_year"value="';
                     echo $academic_year;
                     echo '">
                     <input type="hidden" name="application_no"value="';
                     echo $application_no;
                     echo '">
                     <input type="hidden" name="academic_id"value="';
                     echo $academic_id;
                     echo '">
                   
                    </div>';
                     if($rowg['school_id']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View';
                              echo '</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['school_id']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $school_id_label;
                              echo '">View</a></span>';
                                echo '<select name="school_id" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }

                       if($rowg['registration_form']==0){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0" selected="selected">Not Yet Submitted</option>
                                  <option value="2">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==1){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                  <option value="0">Disapproved</option>
                                  <option value="2">Submitted</option>
                                  <option value="1" selected="selected">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }else if($rowg['registration_form']==2){
                        echo '<div class="col-md-12">
                            <div class="form-group">
                              <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                               echo '<span><a href="requirements/';
                              echo $registration_form_label;
                              echo '">View</a></span>';
                                echo '<select name="registration_form" class="form-control">
                                   <option value="0">Disapproved</option>
                                  <option value="2"  selected="selected">Submitted</option>
                                  <option value="1">Approved</option>

                                </select>';
                              
                                
                            echo '</div>
                        </div>';
                      }
                  echo '</div>';
                echo '</div>';
                 echo '<div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>';


              echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
        }
   }
}
?>




<?php
  $status="ASSESS";
if($filter=="ALL"){
  if($order=="ASC"){
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin 
    INNER JOIN tbl_studentinfo 
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;
    ;
      
                                         
  }else{
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin 
    INNER JOIN tbl_studentinfo 
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;
    ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
       $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlc = "SELECT * FROM tbl_assess_req
      WHERE academic_year='$academic_year' AND academic_id='$academic_id' AND application_no='$application_no'";
      $resultc = $conn->query($sqlc);
      $rowc = $resultc->fetch_assoc();
     
       echo '<div class="modal fade" id="updateAssessment';
  echo $rowc['id'];
  echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
      $academic_id=$rowc['academic_id'];
      $academic_year=$rowc['academic_year'];
      $application_no=$rowc['application_no'];
       $sqld = "SELECT * FROM tbl_assess_req_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      $school_id_label=$rowd['school_id'];
      $registration_form_label=$rowd['registration_form'];
      $school_clearance_label=$rowd['school_clearance'];
      $gradereport_label=$rowd['gradereport'];
      echo'  <h5 class="modal-title" id="exampleModalLabel">Assessment Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateAssess.php" method="post">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <input type="hidden" name="academic_year"value="';
           echo $academic_year;
           echo '">
           <input type="hidden" name="application_no"value="';
           echo $application_no;
           echo '">
           <input type="hidden" name="academic_id"value="';
           echo $academic_id;
           echo '">
         
          </div>';
          if($rowc['school_id']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_id']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View';
                  echo '</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_id']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }

           if($rowc['registration_form']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                       <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['school_clearance']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==3){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                       <option value="2">Submitted</option>
                      <option value="3"  selected="selected">Not Applicable</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['gradereport']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          // End
        echo '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
   }//end of while

if($order=="ASC"){
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin 
    INNER JOIN tbl_studentinfo 
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;
    ;
      
                                         
  }else{
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin 
    INNER JOIN tbl_studentinfo 
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;
    ;
  }

   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
      $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      echo '<div class="modal fade" id="updateGrades';
 echo $rowz['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateGrades.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label >Grade for A.Y. ';

            $thisid = $rowb['academic_id'];
            $sqlc = "SELECT * FROM tbl_renew_year WHERE id='$thisid'";
            $resultc = $conn->query($sqlc);
            $rowc = $resultc->fetch_assoc();

            echo $rowc['academic_year']." / ".$rowc['sem']." semester";

            echo '</label>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" value="';
                echo $rowz['id'];
                echo '">
                <label >Grade</label>
                  <input style="width:100%;" type="number" step="0.01" name="newgrade" class="form-control" placeholder="Enter Grades" value="';
                  echo $rowz['grades'];
                  echo '">
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




}else if($filter=="EMAIL"){
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
      $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlc = "SELECT * FROM tbl_assess_req
      WHERE academic_year='$academic_year' AND academic_id='$academic_id' AND application_no='$application_no'";
      $resultc = $conn->query($sqlc);
      $rowc = $resultc->fetch_assoc();
     
       echo '<div class="modal fade" id="updateAssessment';
  echo $rowc['id'];
  echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
      $academic_id=$rowc['academic_id'];
      $academic_year=$rowc['academic_year'];
      $application_no=$rowc['application_no'];
       $sqld = "SELECT * FROM tbl_assess_req_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      $school_id_label=$rowd['school_id'];
      $registration_form_label=$rowd['registration_form'];
      $school_clearance_label=$rowd['school_clearance'];
      $gradereport_label=$rowd['gradereport'];
      echo'  <h5 class="modal-title" id="exampleModalLabel">Assessment Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateAssessment.php" method="post">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <input type="hidden" name="academic_year"value="';
           echo $academic_year;
           echo '">
           <input type="hidden" name="application_no"value="';
           echo $application_no;
           echo '">
           <input type="hidden" name="academic_id"value="';
           echo $academic_id;
           echo '">
         
          </div>';
          if($rowc['school_id']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_id']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View';
                  echo '</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_id']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }

           if($rowc['registration_form']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                       <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['school_clearance']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==3){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                       <option value="2">Submitted</option>
                      <option value="3"  selected="selected">Not Applicable</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['gradereport']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          // End
        echo '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
   }//end of while
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }

   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
     $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      echo '<div class="modal fade" id="updateGrades';
 echo $rowz['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateGrades.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label >Grade for A.Y. ';

            $thisid = $rowb['academic_id'];
            $sqlc = "SELECT * FROM tbl_renew_year WHERE id='$thisid'";
            $resultc = $conn->query($sqlc);
            $rowc = $resultc->fetch_assoc();

            echo $rowc['academic_year']." / ".$rowc['sem']." semester";

            echo '</label>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" value="';
                echo $rowz['id'];
                echo '">
                <label >Grade</label>
                  <input style="width:100%;" type="number" step="0.01" name="newgrade" class="form-control" placeholder="Enter Grades" value="';
                  echo $rowz['grades'];
                  echo '">
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

}else if($filter=="GRADE 11"){
	 $gradelevels="Grade 11";
  if($order=="ASC"){
   
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        
                        
                                        
  }else{
  $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
      $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlc = "SELECT * FROM tbl_assess_req
      WHERE academic_year='$academic_year' AND academic_id='$academic_id' AND application_no='$application_no'";
      $resultc = $conn->query($sqlc);
      $rowc = $resultc->fetch_assoc();
     
       echo '<div class="modal fade" id="updateAssessment';
  echo $rowc['id'];
  echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
      $academic_id=$rowc['academic_id'];
      $academic_year=$rowc['academic_year'];
      $application_no=$rowc['application_no'];
       $sqld = "SELECT * FROM tbl_assess_req_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      $school_id_label=$rowd['school_id'];
      $registration_form_label=$rowd['registration_form'];
      $school_clearance_label=$rowd['school_clearance'];
      $gradereport_label=$rowd['gradereport'];
      echo'  <h5 class="modal-title" id="exampleModalLabel">Assessment Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateAssessment.php" method="post">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <input type="hidden" name="academic_year"value="';
           echo $academic_year;
           echo '">
           <input type="hidden" name="application_no"value="';
           echo $application_no;
           echo '">
           <input type="hidden" name="academic_id"value="';
           echo $academic_id;
           echo '">
         
          </div>';
          if($rowc['school_id']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_id']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View';
                  echo '</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_id']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }

           if($rowc['registration_form']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                       <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['school_clearance']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==3){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                       <option value="2">Submitted</option>
                      <option value="3"  selected="selected">Not Applicable</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['gradereport']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          // End
        echo '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
   }//end of while
  if($order=="ASC"){
		$gradelevels="Grade 11";
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }else{
	  $gradelevels="Grade 11";
     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }

   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
     $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      echo '<div class="modal fade" id="updateGrades';
 echo $rowz['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateGrades.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label >Grade for A.Y. ';

            $thisid = $rowb['academic_id'];
            $sqlc = "SELECT * FROM tbl_renew_year WHERE id='$thisid'";
            $resultc = $conn->query($sqlc);
            $rowc = $resultc->fetch_assoc();

            echo $rowc['academic_year']." / ".$rowc['sem']." semester";

            echo '</label>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" value="';
                echo $rowz['id'];
                echo '">
                <label >Grade</label>
                  <input style="width:100%;" type="number" step="0.01" name="newgrade" class="form-control" placeholder="Enter Grades" value="';
                  echo $rowz['grades'];
                  echo '">
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

}else if($filter=="GRADE 12"){
	 $gradelevels="Grade 12";
  if($order=="ASC"){
   
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        
                        
                                        
  }else{
  $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
      $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlc = "SELECT * FROM tbl_assess_req
      WHERE academic_year='$academic_year' AND academic_id='$academic_id' AND application_no='$application_no'";
      $resultc = $conn->query($sqlc);
      $rowc = $resultc->fetch_assoc();
     
       echo '<div class="modal fade" id="updateAssessment';
  echo $rowc['id'];
  echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
      $academic_id=$rowc['academic_id'];
      $academic_year=$rowc['academic_year'];
      $application_no=$rowc['application_no'];
       $sqld = "SELECT * FROM tbl_assess_req_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      $school_id_label=$rowd['school_id'];
      $registration_form_label=$rowd['registration_form'];
      $school_clearance_label=$rowd['school_clearance'];
      $gradereport_label=$rowd['gradereport'];
      echo'  <h5 class="modal-title" id="exampleModalLabel">Assessment Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateAssessment.php" method="post">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <input type="hidden" name="academic_year"value="';
           echo $academic_year;
           echo '">
           <input type="hidden" name="application_no"value="';
           echo $application_no;
           echo '">
           <input type="hidden" name="academic_id"value="';
           echo $academic_id;
           echo '">
         
          </div>';
          if($rowc['school_id']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_id']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View';
                  echo '</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_id']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }

           if($rowc['registration_form']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                       <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['school_clearance']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==3){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                       <option value="2">Submitted</option>
                      <option value="3"  selected="selected">Not Applicable</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['gradereport']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          // End
        echo '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
   }//end of while
  if($order=="ASC"){
		$gradelevels="Grade 12";
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }else{
	  $gradelevels="Grade 12";
     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.bday 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.gradelevel LIKE '%$filter%' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }

   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
     $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      echo '<div class="modal fade" id="updateGrades';
 echo $rowz['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateGrades.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label >Grade for A.Y. ';

            $thisid = $rowb['academic_id'];
            $sqlc = "SELECT * FROM tbl_renew_year WHERE id='$thisid'";
            $resultc = $conn->query($sqlc);
            $rowc = $resultc->fetch_assoc();

            echo $rowc['academic_year']." / ".$rowc['sem']." semester";

            echo '</label>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" value="';
                echo $rowz['id'];
                echo '">
                <label >Grade</label>
                  <input style="width:100%;" type="number" step="0.01" name="newgrade" class="form-control" placeholder="Enter Grades" value="';
                  echo $rowz['grades'];
                  echo '">
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

}else if($filter=="FIRST NAME"){
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
       $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlc = "SELECT * FROM tbl_assess_req
      WHERE academic_year='$academic_year' AND academic_id='$academic_id' AND application_no='$application_no'";
      $resultc = $conn->query($sqlc);
      $rowc = $resultc->fetch_assoc();
     
       echo '<div class="modal fade" id="updateAssessment';
  echo $rowc['id'];
  echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
      $academic_id=$rowc['academic_id'];
      $academic_year=$rowc['academic_year'];
      $application_no=$rowc['application_no'];
       $sqld = "SELECT * FROM tbl_assess_req_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      $school_id_label=$rowd['school_id'];
      $registration_form_label=$rowd['registration_form'];
      $school_clearance_label=$rowd['school_clearance'];
      $gradereport_label=$rowd['gradereport'];
      echo'  <h5 class="modal-title" id="exampleModalLabel">Assessment Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateAssessment.php" method="post">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <input type="hidden" name="academic_year"value="';
           echo $academic_year;
           echo '">
           <input type="hidden" name="application_no"value="';
           echo $application_no;
           echo '">
           <input type="hidden" name="academic_id"value="';
           echo $academic_id;
           echo '">
         
          </div>';
          if($rowc['school_id']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_id']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View';
                  echo '</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_id']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }

           if($rowc['registration_form']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                       <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['school_clearance']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==3){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                       <option value="2">Submitted</option>
                      <option value="3"  selected="selected">Not Applicable</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['gradereport']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          // End
        echo '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
   }//end of while
   if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
      $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      echo '<div class="modal fade" id="updateGrades';
 echo $rowz['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateGrades.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label >Grade for A.Y. ';

            $thisid = $rowb['academic_id'];
            $sqlc = "SELECT * FROM tbl_renew_year WHERE id='$thisid'";
            $resultc = $conn->query($sqlc);
            $rowc = $resultc->fetch_assoc();

            echo $rowc['academic_year']." / ".$rowc['sem']." semester";

            echo '</label>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" value="';
                echo $rowz['id'];
                echo '">
                <label >Grade</label>
                  <input style="width:100%;" type="number" step="0.01" name="newgrade" class="form-control" placeholder="Enter Grades" value="';
                  echo $rowz['grades'];
                  echo '">
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

}else if($filter=="LAST NAME"){
  if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
       $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlc = "SELECT * FROM tbl_assess_req
      WHERE academic_year='$academic_year' AND academic_id='$academic_id' AND application_no='$application_no'";
      $resultc = $conn->query($sqlc);
      $rowc = $resultc->fetch_assoc();
     
       echo '<div class="modal fade" id="updateAssessment';
  echo $rowc['id'];
  echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
      $academic_id=$rowc['academic_id'];
      $academic_year=$rowc['academic_year'];
      $application_no=$rowc['application_no'];
       $sqld = "SELECT * FROM tbl_assess_req_label WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      $school_id_label=$rowd['school_id'];
      $registration_form_label=$rowd['registration_form'];
      $school_clearance_label=$rowd['school_clearance'];
      $gradereport_label=$rowd['gradereport'];
      echo'  <h5 class="modal-title" id="exampleModalLabel">Assessment Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateAssessment.php" method="post">
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <input type="hidden" name="academic_year"value="';
           echo $academic_year;
           echo '">
           <input type="hidden" name="application_no"value="';
           echo $application_no;
           echo '">
           <input type="hidden" name="academic_id"value="';
           echo $academic_id;
           echo '">
         
          </div>';
          if($rowc['school_id']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_id']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View';
                  echo '</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_id']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School ID</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_id_label;
                  echo '">View</a></span>';
                    echo '<select name="school_id" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }

           if($rowc['registration_form']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['registration_form']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Registration Form</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $registration_form_label;
                  echo '">View</a></span>';
                    echo '<select name="registration_form" class="form-control">
                       <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['school_clearance']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>
                       <option value="3" >Not Applicable</option>
                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['school_clearance']==3){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >School Clearance</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $school_clearance_label;
                  echo '">View</a></span>';
                    echo '<select name="school_clearance" class="form-control">
                      <option value="0">Disapproved</option>
                       <option value="2">Submitted</option>
                      <option value="3"  selected="selected">Not Applicable</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          if($rowc['gradereport']==0){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0" selected="selected">Not Yet Submitted</option>
                      <option value="2">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==1){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2">Submitted</option>
                      <option value="1" selected="selected">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }else if($rowc['gradereport']==2){
            echo '<div class="col-md-12">
                <div class="form-group">
                  <label >Grade Report</label>&nbsp;&nbsp;&nbsp;';
                   echo '<span><a href="requirements/';
                  echo $gradereport_label;
                  echo '">View</a></span>';
                    echo '<select name="gradereport" class="form-control">
                      <option value="0">Disapproved</option>
                      <option value="2"  selected="selected">Submitted</option>
                      <option value="1">Approved</option>

                    </select>';
                  
                    
                echo '</div>
            </div>';
          }
          // End
        echo '</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>
</div>';
   }//end of while
 if($order=="ASC"){
   
       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;
                                        
  }else{
    $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin 
        INNER JOIN tbl_studentinfo 
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;
  }
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()){
     $status1="OPEN";
    $status2="CURRENT";
    $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
      $resulta = $conn->query($sqla);   
     $rowa = $resulta->fetch_assoc();
     $academic_id=$rowa['id'];
      $academic_year=$row['academic_year'];
      $application_no=$row['application_no'];
      $sqlz = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
      $resultz = $conn->query($sqlz);
      $rowz = $resultz->fetch_assoc();
      echo '<div class="modal fade" id="updateGrades';
 echo $rowz['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateGrades.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label >Grade for A.Y. ';

            $thisid = $rowb['academic_id'];
            $sqlc = "SELECT * FROM tbl_renew_year WHERE id='$thisid'";
            $resultc = $conn->query($sqlc);
            $rowc = $resultc->fetch_assoc();

            echo $rowc['academic_year']." / ".$rowc['sem']." semester";

            echo '</label>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="userid" value="';
                echo $rowz['id'];
                echo '">
                <label >Grade</label>
                  <input style="width:100%;" type="number" step="0.01" name="newgrade" class="form-control" placeholder="Enter Grades" value="';
                  echo $rowz['grades'];
                  echo '">
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