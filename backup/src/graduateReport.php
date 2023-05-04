<?php session_start();
$_SESSION['notif']="NULL";

if(($_SESSION['studenttype']!="shscholar")||($_SESSION['pages']!="block-shscholar")){



          $_SESSION['studenttype']="shscholar";
        $_SESSION['search']="ALL";
        $_SESSION['pages']="block-shscholar";
        $_SESSION['whatsearch']="";
        $_SESSION['order']="ASC";
        $_SESSION['limit']=10;
        $_SESSION['offset']=1;





}

  require "config.php";

  $user ="college";
  $scholar ="fullscholar";
  $usertype="college";
  $filter =$_SESSION['search'];
  $whatsearch=$_SESSION['whatsearch'];
  $order=$_SESSION['order'];
  $limit=$_SESSION['limit'];
  $renew_id=0;
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
        window.open("reportGraduateScholars.php","_blank");
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
                  <h4 class="page-title">Graduate > Scholars & Recipients </h4>

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
               <form  action="getGraduateScholarReportSearch.php" method="post">
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
                $status="GRADUATED";
                $status1="SCHOLARS RENEW";
                $status2="BLOCK";
                $remove="GRADUATE";
                $renew_status="CURRENT";
                $renew_status2="OPEN";
                $sqla = "SELECT * FROM tbl_renew_year WHERE status='$renew_status' OR status='$renew_status2'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $renew_id=$rowa['id'];

                if($filter=="ALL"){
                 if($order=="ASC"){

                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove'))) OR(tbl_remarks.process='$status2' AND remove='$remove')) ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove'))) OR(tbl_remarks.process='$status2' AND remove='$remove'))";

                  }else{
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;



                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) ";

                  }
                } else if($filter=="EMAIL"){
                  if($order=="ASC"){
                     $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;



                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_admin.username='$whatsearch'";



                  }else{
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_admin.username='$whatsearch'";

                  }
                }else if($filter=="LAST NAME"){

                  if($order=="ASC"){
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove'))  AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;



                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_studentinfo.lastname LIKE '$whatsearch%'";



                  }else{
                       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;



                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_studentinfo.lastname LIKE '$whatsearch%'";

                  }
                }else if($filter=="FIRST NAME"){

                  if($order=="ASC"){
                       $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove'))  AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;



                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_studentinfo.firstname LIKE '$whatsearch%'";

                  }else{
                      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;



                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_studentinfo.firstname LIKE '$whatsearch%'";

                  }
                }else if($filter=="FULL SCHOLARSHIP"){
                  $scholars="fullscholar";
                  if($order=="ASC"){
                     if(strlen($whatsearch)<=0){
                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'  ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'";
                     }else{

                        $sqla = "SELECT * FROM tbl_renew_year WHERE academic_year='$whatsearch'";
                        $resulta = $conn->query($sqla);
                        $rowa = $resulta->fetch_assoc();

                        $renew_id=$rowa['id'];

                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id'";
                     }


                  }else{
                      if(strlen($whatsearch)<=0){
                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'  ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'";
                     }else{

                        $sqla = "SELECT * FROM tbl_renew_year WHERE academic_year='$whatsearch'";
                        $resulta = $conn->query($sqla);
                        $rowa = $resulta->fetch_assoc();

                        $renew_id=$rowa['id'];

                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id'";
                     }

                  }
                }else if($filter=="COLLEGE EDUCATIONAL ASSISTANCE"){
                  $scholars="collegerecipient";
                  if($order=="ASC"){
                     if(strlen($whatsearch)<=0){
                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'  ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'";
                     }else{

                        $sqla = "SELECT * FROM tbl_renew_year WHERE academic_year='$whatsearch'";
                        $resulta = $conn->query($sqla);
                        $rowa = $resulta->fetch_assoc();

                        $renew_id=$rowa['id'];

                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id'";
                     }


                  }else{
                      if(strlen($whatsearch)<=0){
                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'  ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'";
                     }else{

                        $sqla = "SELECT * FROM tbl_renew_year WHERE academic_year='$whatsearch'";
                        $resulta = $conn->query($sqla);
                        $rowa = $resulta->fetch_assoc();

                        $renew_id=$rowa['id'];

                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id'";
                     }

                  }
                }else if($filter=="SHS EDUCATIONAL ASSISTANCE"){
                  $scholars="shscholar";
                  if($order=="ASC"){
                     if(strlen($whatsearch)<=0){
                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'  ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'";
                     }else{

                        $sqla = "SELECT * FROM tbl_renew_year WHERE academic_year='$whatsearch'";
                        $resulta = $conn->query($sqla);
                        $rowa = $resulta->fetch_assoc();

                        $renew_id=$rowa['id'];

                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id' ORDER BY tbl_admin.id ASC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id'";
                     }


                  }else{
                      if(strlen($whatsearch)<=0){
                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'  ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;


                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars'";
                     }else{

                        $sqla = "SELECT * FROM tbl_renew_year WHERE academic_year='$whatsearch'";
                        $resulta = $conn->query($sqla);
                        $rowa = $resulta->fetch_assoc();

                        $renew_id=$rowa['id'];

                         $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.phone,tbl_remarks.remarks
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                        WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id' ORDER BY tbl_admin.id DESC LIMIT ".$limit." OFFSET ".$off;

                       $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                          INNER JOIN tbl_remarks
                        ON tbl_admin.id=tbl_remarks.user_id
                          WHERE ((tbl_remarks.process='$status') OR(tbl_remarks.process='$status2' AND remove='$remove')) AND tbl_remarks.scholars='$scholars' AND tbl_remarks.academic_id='$renew_id'";
                     }

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
                        <h4 class="card-title"> List of Graduate Scholars & Recipients</h4>
                   <table class="table">
                      <thead>
                        <tr>
                          <th style="width:5%;">#</th>
                          <th style="width:15%;">Email</th>
                          <th style="width:20%;">Name</th>
                          <th style="width:15%;">Barangay</th>
                           <th style="width:15%;">Contact</th>
                           <th style="width:30%;">Action</th>

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
                                echo '<td>';
                                echo '<button id="';
                               echo $row['id'];
                                 echo '" type="button" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalApprove" onClick="getApproveId(this.id)">
                                   <i class="fa fa-retweet" data-toggle="tooltip" data-placement="top" title="Click to retrieve this applicant!"></i>';
                                 echo '</button>';

                              echo '</td>';

                                echo '</tr>';
                            }
                          ?>
                          <div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Retrieve Graduate</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                 <form action="retrieveGraduate.php" method="post">
                                <div class="modal-body">

                                   <div class="col-md-12">
                                      <p>
                                        Note:<span style="color:red;">You need to enter pin code to change graduate status.</span>
                                      </p>
                                   </div>
                                   <div class="col-md-12">
                                  <div class="form-group">
                                      <label >Enter pin code</label>
                                          <input type="text"  name="code" class="form-control" placeholder="Enter pin code" value="" required="true">
                                      </div>
                                  </div>

                                         <input type="hidden" name="users" id="approveid">
                                         <div class="col-md-12">
                                           <div class="form-group">
                                             <label>Scholar Type</label>
                                           <select class="form-control" name="usertype">
                                                  <option value="fullscholar">College Full Scholarship</option>
                                                  <option value="shscholar" >Senior High Financial Assistance</option>
                                                  <option value="collegerecipient_public">College Financial Assistance (Public)</option>
                                                  <option value="collegerecipient_private">College Financial Assistance (Private)</option>
                                           </select>
                                           </div
                                         </div>

                                   <div class="col-md-12">
                                       <div class="form-group">
                                          <label >Remarks</label>
                                          <textarea name="remarks" class="form-control" required></textarea>
                                       </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="submit" class="btn btn-primary" value="Retrieve">
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
                           echo '<a href="scholargraduatereport_back.php" class="btn btn-warning" >Previous</a>';
                        }
                      ?>
                       <?php echo ($off+1)."-".$count.'/'.$total?>
                        <?php
                        if($count>=$total){
                          echo '<button class="btn btn-primary" disabled>Next</button>';
                        }else{
                           echo '<a href="scholargraduatereport_next.php" class="btn btn-primary">Next</a>';
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
