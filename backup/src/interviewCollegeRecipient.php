<?php session_start();
$_SESSION['notif']="NULL";

if(($_SESSION['studenttype']!="collegerecipient")||($_SESSION['pages']!="interview-collegerecipient")){
 $_SESSION['studenttype']="collegerecipient";
  $_SESSION['search']="ALL";
  $_SESSION['pages']="interview-collegerecipient";
  $_SESSION['whatsearch']="";
  $_SESSION['order']="ASC";
  $_SESSION['limit']=10;
  $_SESSION['offset']=1;
   $_SESSION['select']="NOTALL";
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
      function  getReturnId(id){
         document.getElementById('returnid').value=id;
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
       function  getCheck(id){
         var newid = id.replace('message','');
         var ids = document.getElementById('ids'+newid).value;

         var data = document.getElementById('data'+newid);

         if((ids==0)||(ids=="0")){
           document.getElementById('ids'+newid).value=newid;
           // document.getElementById('id').classList.remove("btn-info");
          data.style.backgroundColor = "#95de64";
         }else{
          data.style.backgroundColor = "#ffffff";
           document.getElementById('ids'+newid).value=0;
         }
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
        <?php
        $category=$_SESSION['category'];
        $cat="";

        if($category=="Public"){
          $cat="Public / State Universities";

        }else{
          $cat="Private / Institute";
        }


        ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->

            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">For Interview > College Educational Assistance (<?php echo $category?>)</h4>

                </div>
              </div>
            </div>
              <div class="row">

              <div class="col-md-4 ">
                <div class="page-header-toolbar text-right">

               </div>
              </div>
            </div>
              <div class="col-md-12"><hr></div>
               <form  action="getNewFullInterviewCollegeSearch.php" method="post">
              <div class="col-md-12">
                <!-- <div class="page-header-toolbar"> -->
                  <div class="row">
                    <div class="col-md-2">
                       <div class="form-group">
                          <label for="searchshs">Search</label>
                            <div class="input-group">
                              <input type="text" name="searchshs" id="searchshs" class="form-control" placeholder="Search here" value="<?php echo $_SESSION['whatsearch']; ?>">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-2">
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
                      <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp

                          </label>
                            <a href="#" data-toggle="modal" data-target="#modalSMS" class="btn btn-primary btn-fw">Send SMS</a>
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
                $status="INTERVIEW";
                if($filter=="ALL"){
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat'";

                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat'";

                  }
                }else if($filter=="EMAIL"){
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'  AND tbl_studentinfo.schooltype='$cat' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_admin.username='$whatsearch'";

                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_admin.username='$whatsearch'";

                  }
                }else if($filter=="LAST NAME"){

                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.lastname LIKE '$whatsearch%'";

                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.lastname LIKE '$whatsearch%'";

                  }
                }else if($filter=="FIRST NAME"){

                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.firstname LIKE '$whatsearch%'";

                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'  AND tbl_studentinfo.schooltype='$cat' AND tbl_studentinfo.firstname LIKE '$whatsearch%'";

                  }
                }else if($filter=="PUBLIC SCHOOL"){
                  $typeschool="Public / State Universities";
                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool'";

                  }else{
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool'";

                  }
                }else if($filter=="PRIVATE SCHOOL"){
                  $typeschool="Private / Institute";
                   if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool' ORDER BY tbl_studentinfo.firstname ASC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool'";

                  }else{
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_studentinfo.school
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool' ORDER BY tbl_studentinfo.firstname DESC LIMIT ".$limit." OFFSET ".$off;
                        ;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.schooltype='$typeschool'";

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


                        <div class="col-md-10">
                          <h4 class="card-title"> List of College Educational Assistance Applicants</h4>
                      </div>
                      <?php
                        if($_SESSION['select']=="NOTALL"){
                          echo '  <div class="col-md-2" style="text-align: right;">
                          <a href="selectAllInterview.php?select=NOTALL"  class="btn btn-warning btn-fw">SELECT ALL</a>
                      </div>';
                        }else{
                            echo '  <div class="col-md-2" style="text-align: right;">
                          <a href="selectAllInterview.php?select=ALL"  class="btn btn-warning btn-fw">DESELECT ALL</a>
                      </div>';
                        }
                      ?>
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width:5%;">#</th>
                          <th style="width:10%;">Email</th>
                          <th style="width:20%;">Name</th>
                          <th style="width:15%;">Barangay</th>
                          <th style="width:20%;">School</th>
                          <th style="width:10%;">Contact Number</th>
                          <th style="width:20%;"><center>Action</center></th>
                        </tr>
                      </thead>
                       <form action="sendAllInterview.php" method="post" enctype="multipart/form-data" >
                      <tbody style="font-size:9px;">
                          <?php
                          $count=$off;
                            while($row = $result->fetch_assoc()){
                              $count++;
                              $academic_year=$row['academic_year'];
                              $application_no=$row['application_no'];
                              $user_id = $row['id'];
                               if($_SESSION['select']=="ALL"){
                                    echo '<tr style="background-color:#95de64" id="data';
                                   echo $row['id'];
                                   echo '">';
                                }else{

									   echo '<tr id="data';
									   echo $row['id'];
									   echo '">';


                                }
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
                                echo $row['phone'];
                                echo '</td>';
                                echo '<td><center>';
                                if($_SESSION['usertype']=="superadmin"){
                                  $process="NEW REQUIREMENTS";
                                  $sqld = "SELECT * FROM tbl_log WHERE student_id='$user_id' AND process='$process'";
                                  $resultd = $conn->query($sqld);
                                  // $count=1;
                                  if ($resultd->num_rows > 0){
                                    echo '&nbsp<a href="viewNewRequirements.php?id=';
                                    echo $row['id'];
                                    echo '" type="button" style="background-color:green;" class="btn btn-icons btn-rounded ">';
                                    echo '<i style="color:white;" class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Click to view requirements information!"></i>';
                                                  echo '</a>&nbsp';
                                  }else{
                                    echo '&nbsp<a href="viewNewRequirement.php?id=';
                                    echo $row['id'];
                                    echo '" type="button"  class="btn btn-icons btn-rounded btn-warning">';
                                    echo '<i style="color:white;" class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Click to view requirements information!"></i>';
                                                  echo '</a>&nbsp';
                                  }

                                  echo '<button id="';
                                  echo $row['id'];
                                    echo '" type="button" style="background-color:teal;border-color:teal;" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalReturn" onClick="getReturnId(this.id)">
                                      <i style="color:white;" class="fa fa-retweet" data-toggle="tooltip" data-placement="top" title="Click to return student to new applicant!"></i>';
                                    echo '</button>';
          
                                                                echo '&nbsp;';
                                
                                }
                                   echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-success" onClick="getUpdateViewId(this.id)">
                                  <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to edit student information!">';
                                  echo '</i>';
                                   echo '</button>';
                                    echo '&nbsp';
                                  echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-primary" onClick="getViewId(this.id)">
                                  <i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Click to view student information!">';
                                  echo '</i>';
                                   echo '</button>';
                                    echo '&nbsp';

                                     echo '<button id="';
                                     echo $row['id'];
                                     echo '"type="button" onClick="getRemoveId(this.id)" class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#modalRemove">
                                  <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Click to remove this applicant!"></i>';
                                   echo '</button>';
                                    echo '&nbsp';
     echo '<button id="';
    echo $row['id'];
      echo '" type="button" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalApprove" onClick="getApproveId(this.id)">
        <i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click to approve and send this applicant for assessment!"></i>';
      echo '</button>';
       echo '&nbsp;';

  echo '<button id="message';
                                echo $row['id'];
                                echo '" onClick="getCheck(this.id)" type="button" class="btn btn-icons btn-rounded btn-info" >
                                  <i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="Click to check and send sms"></i>';
                                   echo '</button>';
                                   if($_SESSION['select']=="ALL"){
                                    echo '<input type="hidden" name="smsid[]" value="';
                                    echo $row['id'];
                                    echo '" id="ids';
                                   echo $row['id'];
                                   echo '">';

                                   }else{
                                    echo '<input type="hidden" name="smsid[]" value="0" id="ids';
                                   echo $row['id'];
                                   echo '">';

                                   }
                                echo '</center></td>';
                            }
                          ?>
                             <div class="modal fade" id="modalSMS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="modal-body">
                                     <div class="col-md-12">
                                       <div class="form-group">
                                         <label>Choose message to send</label>
                                         <select class="form-control" name="message">
                                           <?php
                                            $sqlz = "SELECT * FROM tbl_sms";
                                              $resultz = $conn->query($sqlz);
                                              // $count=1;
                                              if ($resultz->num_rows > 0){
                                                  while($rowz = $resultz->fetch_assoc()){
                                                    if(($rowz['id']==1)||($rowz['id']==5)){

                                                    }else{
                                                        echo '<option value="';
                                                        echo $rowz['process'];
                                                        echo '">';
                                                        echo $rowz['process'];
                                                        echo '</option>';
                                                    }

                                                  }
                                              }

                                           ?>
                                         </select>
                                       </div>
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
                      </tbody>
                    </table>
                   <div class="col-md-3">
                      <?php
                        if($_SESSION['page']<=1){
                          echo '<button class="btn btn-warning" disabled>Previous</button>';
                        }else{
                           echo '<a href="interview_back.php" class="btn btn-warning" >Previous</a>';
                        }
                      ?>
                       <?php echo ($off+1)."-".$count.'/'.$total?>
                        <?php
                        if($count>=$total){
                          echo '<button class="btn btn-primary" disabled>Next</button>';
                        }else{
                           echo '<a href="interview_next.php" class="btn btn-primary">Next</a>';
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
<div class="modal fade" id="modalRemove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="removeInterviewRecipient.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">You cannot undo this action after you press [Remove] button.</span>
            </p>
         </div>

         <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="removeid" value="">
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
<!-- REturn-->
<div class="modal fade" id="modalReturn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Return to New Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- approveInterview -->
       <form action="returnNewApplicant.php" method="post">
      <div class="modal-body">
      
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This applicant will change status to new applicant.</span>
            </p>
         </div>
         
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="returnid">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Return Student">
      </div>
    </div>
  </form>
  </div>
</div>
<!-- End Return -->
<div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send for Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="approveInterview.php" method="post">
      <div class="modal-body">

         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This applicant already interviewed and ready for assessment.</span>
            </p>
         </div>
         <div class="col-md-12">
        <div class="form-group">
            <label >Interview Score. 1(Lowest) - 10(Highest)</label>
                <input type="number" min="0" max="10" step=".01" name="interview_score" class="form-control" placeholder="Interview Score" value="" required="true">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="approveid">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="For Assessment">
      </div>
    </div>
  </form>
  </div>
</div>
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
