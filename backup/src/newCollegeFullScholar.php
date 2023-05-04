<?php session_start();
$_SESSION['notif'] = "NULL";

if (($_SESSION['studenttype'] != "fullscholar") || ($_SESSION['pages'] != "new-fullscholar")) {
  $_SESSION['studenttype'] = "fullscholar";
  $_SESSION['search'] = "ALL";
  $_SESSION['pages'] = "new-fullscholar";
  $_SESSION['whatsearch'] = "";
  $_SESSION['order'] = "ASC";
  $_SESSION['limit'] = 10;
  $_SESSION['offset'] = 1;
  $_SESSION['select'] = "NOTALL";
}

require "config.php";

$user = "college";
$scholar = "fullscholar";
$usertype = "college";
$filter = $_SESSION['search'];
$whatsearch = $_SESSION['whatsearch'];
$order = $_SESSION['order'];
$limit = $_SESSION['limit'];
$off = $_SESSION['offset'] - 1;
$total = 0;
if ($_SESSION['page'] == "") {
  $_SESSION['page'] = 1;
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
    function getUpdateViewId(id) {
      window.open("updateNewStudent.php?id=" + id, "_blank");
    }

    function getViewId(id) {
      window.open("viewNewStudent.php?id=" + id, "_blank");
    }

    function getUserId(id) {
      document.getElementById('userid').value = id;

    }

    function getUserIds(id) {

      document.getElementById('updateuserid').value = id;
    }

    function getUsers(users) {
      var user = users;
      document.getElementById('users').value = user;
    }

    function setRemoveId(id) {
      document.getElementById('removeid').value = id;
    }

    function getApproveId(id) {
      document.getElementById('approveid').value = id;
    }

    function getReturnId(id) {
      document.getElementById('returnid').value = id;
    }

    function getResetId(id) {
      document.getElementById('resetid').value = id;
    }

    function getTransferId(id) {
      document.getElementById('transferid').value = id;
    }

    function setRenewal(id) {
      document.getElementById('renewalid').value = id;
    }

    function getCheck(id) {
      var newid = id.replace('message', '');
      var ids = document.getElementById('ids' + newid).value;

      var data = document.getElementById('data' + newid);

      if ((ids == 0) || (ids == "0")) {
        document.getElementById('ids' + newid).value = newid;
        // document.getElementById('id').classList.remove("btn-info");
        data.style.backgroundColor = "#95de64";
      } else {
        data.style.backgroundColor = "#ffffff";
        document.getElementById('ids' + newid).value = 0;
      }
    }


    function getUsersApprove(id) {
      document.getElementById('graduateid').value = id;
    }

    function getUsersTransfer(id) {
      document.getElementById('transferid').value = id;
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
                <h4 class="page-title">New Applicant > College Full Scholarship </h4>

              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-4 ">
              <!-- <div class="page-header-toolbar text-right">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAddApplicant" onClick="getApproveId(this.id)">
                     <span style="color:#ffffff;" data-toggle="tooltip" data-placement="top" title="Click to add applicant!">Add Applicant</span>
                   </button>
               </div> -->
            </div>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <form action="getNewFullCollegeSearch.php" method="post">
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
                        if ($_SESSION['order'] == "ASC") {
                          echo 'ASCENDING';
                        } else {
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
          $status = "NEWAPPLICANT";
          if ($filter == "ALL") {
            if ($order == "ASC") {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id ASC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'";
            } else {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id DESC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar'";
            }
          } else if ($filter == "EMAIL") {
            if ($order == "ASC") {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch'";
            } else {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch'";
            }
          } else if ($filter == "LAST NAME") {

            if ($order == "ASC") {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%'";
            } else {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%'";
            }
          } else if ($filter == "FIRST NAME") {

            if ($order == "ASC") {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT " . $limit . " OFFSET " . $off;;

              $sql1 = "SELECT COUNT(tbl_admin.id) as total
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%'";
            } else {
              $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no,tbl_admin.username, tbl_studentinfo.firstname,tbl_studentinfo.lastname,tbl_studentinfo.middlename,tbl_studentinfo.barangay,tbl_studentinfo.school,tbl_studentinfo.course
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT " . $limit . " OFFSET " . $off;;

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
          $total = $row1['total'];
          ?>
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <h4 class="card-title"> List of College Full Scholarship Applicants </h4>
                  </div>
                  <?php
                  if ($_SESSION['select'] == "NOTALL") {
                    echo '  <div class="col-md-2" style="text-align: right;">
                          <a href="selectAllNew.php?select=NOTALL"  class="btn btn-warning btn-fw">SELECT ALL</a>
                      </div>';
                  } else {
                    echo '  <div class="col-md-2" style="text-align: right;">
                          <a href="selectAllNew.php?select=ALL"  class="btn btn-warning btn-fw">DESELECT ALL</a>
                      </div>';
                  }
                  ?>

                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:15%;">Email</th>
                        <th style="width:20%;">Name</th>
                        <th style="width:15%;">School/Course</th>
                        <th style="width:10%;">Barangay</th>

                        <th style="width:10%;">
                          <center>Remarks</center>
                        </th>
                        <th style="width:25%;">
                          <center>Action</center>
                        </th>
                      </tr>
                    </thead>
                    <form action="sendAllMessage.php" method="post" enctype="multipart/form-data">
                      <tbody style="font-size:9px;">
                        <?php
                        $count = $off;
                        while ($row = $result->fetch_assoc()) {
                          $count++;
                          $academic_year = $row['academic_year'];
                          $application_no = $row['application_no'];
                          $userid = $row['id'];
                          if ($_SESSION['select'] == "ALL") {
                            echo '<tr style="background-color:#95de64" id="data';
                            echo $row['id'];
                            echo '">';
                          } else {

                            $sqlx = "SELECT * FROM tbl_college_requirements WHERE user_id='$userid'";
                            $resultx = $conn->query($sqlx);
                            $rowx = $resultx->fetch_assoc();
                            //ongo
                            if ($resultx->num_rows > 0) {
                              if ((($rowx['birthcertificate'] == 2) || ($rowx['birthcertificate'] == 3)) && (($rowx['gradereport'] == 2) || ($rowx['gradereport'] == 3)) && (($rowx['schoolclearance'] == 2) || ($rowx['schoolclearance'] == 3)) && (($rowx['housesketch'] == 2) || ($rowx['housesketch'] == 3)) && (($rowx['barangayclearance'] == 2) || ($rowx['barangayclearance'] == 3)) && (($rowx['parentvotersid'] == 2) || ($rowx['parentvotersid'] == 3)) && (($rowx['yourvotersid'] == 2) || ($rowx['yourvotersid'] == 3)) && (($rowx['itr'] == 2) || ($rowx['itr'] == 3)) && (($rowx['indigency'] == 2) || ($rowx['indigency'] == 3)) && (($rowx['applicationform'] == 2) || ($rowx['applicationform'] == 3)) && (($rowx['picture'] == 2) || ($rowx['picture'] == 3))) {

                                echo '<tr style="background-color:#3291a8" id="data';
                                echo $row['id'];
                                echo '">';
                              } else {
                                if ((($rowx['birthcertificate'] == 1) || ($rowx['birthcertificate'] == 1)) && (($rowx['gradereport'] == 1) || ($rowx['gradereport'] == 1)) && (($rowx['schoolclearance'] == 1) || ($rowx['schoolclearance'] == 1)) && (($rowx['housesketch'] == 1) || ($rowx['housesketch'] == 1)) && (($rowx['barangayclearance'] == 1) || ($rowx['barangayclearance'] == 1)) && (($rowx['parentvotersid'] == 1) || ($rowx['parentvotersid'] == 1)) && (($rowx['yourvotersid'] == 1) || ($rowx['yourvotersid'] == 1)) && (($rowx['itr'] == 1) || ($rowx['itr'] == 1)) && (($rowx['indigency'] == 1) || ($rowx['indigency'] == 1)) && (($rowx['applicationform'] == 1) || ($rowx['applicationform'] == 1)) && (($rowx['picture'] == 1) || ($rowx['picture'] == 1))) {

                                  echo '<tr style="background-color:#07f242" id="data';
                                  echo $row['id'];
                                  echo '">';
                                } else {
                                  echo '<tr id="data';
                                  echo $row['id'];
                                  echo '">';
                                }
                              }
                            } else {
                              echo '<tr id="data';
                              echo $row['id'];
                              echo '">';
                            }
                          }

                          echo '<td>';
                          echo $count;
                          echo '</td>';
                          echo '<td>';
                          echo $row['username'];
                          echo '</td>';
                          echo '<td>';
                          echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                          echo '</td>';
                          echo '<td>';
                          echo $row['school'] . "/" . $row['course'];
                          echo '</td>';
                          echo '<td>';
                          echo $row['barangay'];
                          echo '</td>';

                          echo '<td><center>';
                          $occupation = "Others";
                          $father = 0;
                          $mother = 0;
                          $sql3 = "SELECT * FROM tbl_fatherinfo WHERE occupation='$occupation' AND academic_year='$academic_year' AND application_no='$application_no' ";
                          $result3 = $conn->query($sql3);
                          if ($result3->num_rows > 0) {
                            $father = 1;
                          }
                          $sql4 = "SELECT * FROM tbl_motherinfo WHERE occupation='$occupation' AND academic_year='$academic_year' AND application_no='$application_no' ";
                          $result4 = $conn->query($sql4);
                          if ($result4->num_rows > 0) {
                            $mother = 1;
                          }
                          if (($father == 0) && ($mother == 1)) {

                            echo "Mother's occupation was not in the system";
                          } else if (($father == 1) && ($mother == 0)) {

                            echo "Father's occupation was not in the system";
                          } else if (($father == 1) && ($mother == 1)) {

                            echo "Father's and mother's occupation were not in the system";
                          } else {

                            echo 'No remarks';
                          }
                          echo '<td ><center>';

                          if ($_SESSION['usertype'] == "superadmin") {
                            $process = "NEW REQUIREMENTS";
                            $sqld = "SELECT * FROM tbl_log WHERE student_id='$userid' AND process='$process'";
                            $resultd = $conn->query($sqld);

                            if ($resultd->num_rows > 0) {
                              echo '&nbsp<a href="viewNewRequirements.php?id=';
                              echo $row['id'];
                              echo '" type="button" style="background-color:green;" class="btn btn-icons btn-rounded ">';
                              echo '<i style="color:white;" class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Click to view requirements information!"></i>';
                              echo '</a>&nbsp';
                            } else {
                              echo '&nbsp<a href="viewNewRequirement.php?id=';
                              echo $row['id'];
                              echo '" type="button"  class="btn btn-icons btn-rounded btn-warning">';
                              echo '<i style="color:white;" class="fa fa-download" data-toggle="tooltip" data-placement="top" title="Click to view requirements information!"></i>';
                              echo '</a>&nbsp';
                            }
                          }
                          echo '<button id="';
                          echo $row['id'];
                          echo '" type="button" class="btn btn-icons btn-rounded btn-success" onClick="getUpdateViewId(this.id)">
                                  <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click to update student information!"></i>';
                          echo '</button>';
                          echo '&nbsp';
                          echo '<button id="';
                          echo $row['id'];
                          echo '" type="button" class="btn btn-icons btn-rounded btn-primary" onClick="getViewId(this.id)">
                                  <i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Click to view student information!"></i>';
                          echo '</button>';
                          echo '&nbsp';
                          echo '<button id="';
                          echo $row['id'];
                          echo '" type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" data-target="#modalTransfer" onClick="getTransferId(this.id)">
              <i class="fa fa-retweet" data-toggle="tooltip" data-placement="top" title="Click to transfer and this applicant for other financial assistance/scholarship!"></i>';
                          echo '</button>';
                          echo '&nbsp';
                          // Requirement

                          $userid = $row['id'];
                          $sqla = "SELECT COUNT(*) as college FROM tbl_college_requirements WHERE user_id='$userid'";
                          $resulta = $conn->query($sqla);
                          $rowa = $resulta->fetch_assoc();

                          if ($rowa['college'] <= 0) {
                            echo '<button id="';
                            echo $row['id'];
                            echo '" type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" data-target="#updateGrade" onClick="getUserId(this.id)">
                                    <i class="fa fa-briefcase" data-toggle="tooltip" data-placement="top" title="Click to view or update student requirement!"></i>';
                            echo '</button>&nbsp';
                          } else {
                            echo '<button id="';
                            echo $userid;
                            echo '" type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" data-target="#updateGrades';
                            echo $row['id'];
                            echo '" onClick="getUserIds(this.id)">
                                    <i class="fa fa-briefcase" data-toggle="tooltip" data-placement="top" title="Click to view or update student requirement!"></i>';
                            echo '</button>&nbsp';
                          }


                          // End Requirement

                          echo '<button id="';
                          echo $row['id'];
                          echo '" type="button" onClick="setRemoveId(this.id)" class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#modalRemove';
                          echo '">
                                  <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Click to remove this applicant!"></i>';
                          echo '</button>';
                          echo '&nbsp';

                          $userid = $row['id'];
                          $return_process = "RETURN NEW APPLICANT";
                          $sql99 = "SELECT * FROM tbl_remarks WHERE user_id='$userid' AND process='$return_process'";
                          $result99 = $conn->query($sql99);

                          if ($result99->num_rows > 0) {
                            echo '<button id="';
                            echo $row['id'];
                            echo '" type="button" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalApprove2" onClick="getReturnId(this.id)">
                                       <i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click to approve and send this applicant for interview!"></i>';
                            echo '</button>';
                            echo '&nbsp;';
                          } else {
                            echo '<button id="';
                            echo $row['id'];
                            echo '" type="button" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalApprove" onClick="getApproveId(this.id)">
                                       <i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click to approve and send this applicant for interview!"></i>';
                            echo '</button>';
                            echo '&nbsp;';
                          }





                          echo '<button id="';
                          echo $row['id'];
                          echo '" onClick="getResetId(this.id)" type="button" class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#modalReset" style="background-color:#ffec3d;">
                                  <i class="fa fa-repeat" data-toggle="tooltip" data-placement="top" title="Reset applicant status"></i>';
                          echo '</button>';


                          echo '&nbsp;';

                          echo '<button id="message';
                          echo $row['id'];
                          echo '" onClick="getCheck(this.id)" type="button" class="btn btn-icons btn-rounded btn-info" >
                                  <i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="Click to check and send sms"></i>';
                          echo '</button>';
                          if ($_SESSION['select'] == "ALL") {
                            echo '<input type="hidden" name="smsid[]" value="';
                            echo $row['id'];
                            echo '" id="ids';
                            echo $row['id'];
                            echo '">';
                          } else {
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
                                      if ($resultz->num_rows > 0) {
                                        while ($rowz = $resultz->fetch_assoc()) {
                                          if (($rowz['id'] == 1) || ($rowz['id'] == 5)) {
                                          } else {
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
                if ($_SESSION['page'] <= 1) {
                  echo '<button class="btn btn-warning" disabled>Previous</button>';
                } else {
                  echo '<a href="back.php" class="btn btn-warning" >Previous</a>';
                }
                ?>
                <?php echo ($off + 1) . "-" . $count . '/' . $total ?>
                <?php
                if ($count >= $total) {
                  echo '<button class="btn btn-primary" disabled>Next</button>';
                } else {
                  echo '<a href="next.php" class="btn btn-primary">Next</a>';
                }
                ?>

              </div>
              <div class="col-md-9" style="text-align: right;">
                (Total searched records: <?php echo $total ?>)

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
        <form action="removeFullScholar.php" method="post">
          <div class="modal-body">
            <div class="col-md-12">
              <p>
                Note:<span style="color:red;">You cannot undo this action after you press [Remove] button.</span>
              </p>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="users" id="removeid" value="">
                <label>Remarks</label>
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


  <div class="modal fade" id="modalApprove2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send for Interview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="approveFullScholar2.php" method="post">
          <div class="modal-body">
            <div class="col-md-12">
              <p>
                Note:<span style="color:red;">This applicant was returned by the administrator. Please ask them the PIN number.</span>
              </p>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>PIN Code</label>
                <input type="text" class="form-control" name="pin" placeholder="Enter pin code">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="users" id="returnid">
                <label>Remarks</label>
                <textarea name="remarks" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="For Interview">
          </div>
      </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send for Interview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="approveFullScholar.php" method="post">
          <div class="modal-body">
            <div class="col-md-12">
              <p>
                Note:<span style="color:red;">This applicant complete his/her requirements and ready for interview.</span>
              </p>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="users" id="approveid">
                <label>Remarks</label>
                <textarea name="remarks" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="For Interview">
          </div>
      </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="modalReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reset Applicant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="resetFullScholar.php" method="post">
          <div class="modal-body">
            <div class="col-md-12">
              <p>
                Note:<span style="color:red;">You cannot undo this action after you press [Reset] button.</span>
              </p>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="users" id="resetid" value="">

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Reset">
          </div>
      </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="modalTransfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Transfer Applicant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="transferApplicant.php" method="post">
          <div class="modal-body">
            <div class="col-md-12">
              <p>
                Note:<span style="color:red;">This applicant will be transfer to other assistance/scholarship.</span>
              </p>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="users" id="transferid">
                <label>Choose Scholarship/Assistance</label>
                <select class="form-control" name="transfer">
                  <option value="Senior High School">Senior High School</option>
                  <option value="College Recipient">College Recipient</option>
                </select>
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
  <div class="modal fade" id="updateGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="updateRequirementCollege.php" method="post">
          <div class="modal-body">
            <div class="row">
              <!--  <div class="col-md-6">
              <div class="form-group">

                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspApplication Form</label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div> -->

              <div class="col-md-12">
                <div class="form-group">
                  <input type="hidden" name="userid" id="userid">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspBirth Certificate</label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspCertificate of Good Moral </label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspGrade Report</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspVicinity Map/House Sketch</label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspBarangay Clearance of Applicant</label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspParent Voters ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspVoters ID or Voters Certification of applicant (for 18 years old and above)</label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>


              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspParents Certification of Employment/Income Tax Return</label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspParents Certificate of Indigency/Certificate of Unemployment</label>
                  <select name="indigency" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspRegistration Form/Proof of Enrollment</label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp2 x 2 Picture</label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1">Submitted</option>
                    <option value="3">Not Applicable</option>
                  </select>
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
  </div>
  <!-- End Requirement -->


  <?php
  $status = "NEWAPPLICANT";
  if ($filter == "ALL") {
    if ($order == "ASC") {
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin
    INNER JOIN tbl_studentinfo
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id ASC LIMIT " . $limit . " OFFSET " . $off;;
    } else {
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
    FROM tbl_admin
    INNER JOIN tbl_studentinfo
    ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
    WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' ORDER BY tbl_admin.id DESC LIMIT " . $limit . " OFFSET " . $off;;
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $userids = $row['id'];

      $sqlb = "SELECT * FROM tbl_college_requirements where user_id='$userids'";
      $resultb = $conn->query($sqlb);
      $rowb = $resultb->fetch_assoc();
      $users = $userids;
      $sqld = "SELECT * FROM tbl_college_requirements_label WHERE user_id='$users'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();

      if (isset($rowd['applicationform']) == NULL) {
        $application_label = "";
      } else {
        $application_label = $rowd['applicationform'];
      }

      if (isset($rowd['birthcertificate']) == NULL) {
        $birthcertificate_label = "";
      } else {
        $birthcertificate_label = $rowd['birthcertificate'];
      }


      if (isset($rowd['gradereport']) == NULL) {
        $gradereport_label = "";
      } else {
        $gradereport_label = $rowd['gradereport'];
      }



      if (isset($rowd['schoolclearance']) == NULL) {
        $schoolclearance_label = "";
      } else {
        $schoolclearance_label = $rowd['schoolclearance'];
      }

      if (isset($rowd['parentvotersid']) == NULL) {
        $parentvotersid_label = "";
      } else {
        $parentvotersid_label = $rowd['parentvotersid'];
      }

      if (isset($rowd['studentregistration']) == NULL) {
        $studentregistration_label = "";
      } else {
        $studentregistration_label = $rowd['studentregistration'];
      }

      if (isset($rowd['housesketch']) == NULL) {
        $housesketch_label = "";
      } else {
        $housesketch_label = $rowd['housesketch'];
      }

      if (isset($rowd['barangayclearance']) == NULL) {
        $barangayclearance_label = "";
      } else {
        $barangayclearance_label = $rowd['barangayclearance'];
      }

      if (isset($rowd['picture']) == NULL) {
        $picture_label = "";
      } else {
        $picture_label = $rowd['picture'];
      }

      if (isset($rowd['itr']) == NULL) {
        $itr_label = "";
      } else {
        $itr_label = $rowd['itr'];
      }

      if (isset($rowd['yourvotersid']) == NULL) {
        $yourvotersid_label = "";
      } else {
        $yourvotersid_label = $rowd['yourvotersid'];
      }

      if (isset($rowd['indigency']) == NULL) {
        $indigency_label = "";
      } else {
        $indigency_label = $rowd['indigency'];
      }

      echo '<div class="modal fade" id="updateGrades';
      echo $userids;
      echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateRequirementsCollege.php" method="post">
      <div class="modal-body">
        <div class="row">';
      echo '<div class="col-md-6">
              <div class="form-group">

                <input type="hidden" name="userid" id="updateuserid" value="';
      echo $rowb['user_id'];
      echo '">';
      echo '</div>
          </div>';
      echo '<div class="col-md-6">
              <div class="form-group">';
      echo '</div>';
      echo '</div>';

      echo '<div class="col-md-12">
              <div class="form-group">';

      if ($rowb['birthcertificate'] == 0) {
        echo ' <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Birth Certificate (should be PSA)</label>';

        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>

                  </select>';
      } else  if ($rowb['birthcertificate'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<a href="requirements/';
        echo $birthcertificate_label;
        echo '" target="_blank">View</a></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else  if ($rowb['birthcertificate'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp; <a target="_blank" href="requirements/';
        echo $birthcertificate_label;
        echo '">View</a></label>';


        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo ' <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['schoolclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Certificate of Good Moral </label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<a href="requirements/';
        echo $schoolclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Certificate of Good Moral &nbsp; <a target="_blank" href="requirements/';
        echo $schoolclearance_label;
        echo '">View</a></label>';


        echo '<select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['gradereport'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Grade Report/Report of Ratings</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<a href="requirements/';
        echo $gradereport_label;
        echo '" target="_blank">View</a></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Grade Report/Report of Ratings &nbsp; <a target="_blank" href="requirements/';
        echo $gradereport_label;
        echo '">View</a></label>';


        echo '<select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['housesketch'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Vicinity Map/House Sketch </label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<a href="requirements/';
        echo $housesketch_label;
        echo '" target="_blank">View</a></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Vicinity Map/House Sketch&nbsp; <a target="_blank" href="requirements/';
        echo $housesketch_label;
        echo '">View</a></label>';


        echo '<select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['barangayclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Barangay Clearance of Applicant</label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<a href="requirements/';
        echo $barangayclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Barangay Clearance of Applicant&nbsp; <a target="_blank" href="requirements/';
        echo $barangayclearance_label;
        echo '">View</a></label>';


        echo '<select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['parentvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parent Voter"s ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<a href="requirements/';
        echo $parentvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
        echo $parentvotersid_label;
        echo '">View</a></label>';


        echo '<select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }
      echo '</div>
          </div>
          <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['yourvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above)</label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp';
        echo '<a href="requirements/';
        echo $yourvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp; <a target="_blank" href="requirements/';
        echo $yourvotersid_label;
        echo '">View</a></label>';


        echo '<select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }
      echo '</div>
          </div>';



      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['itr'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certification of Employment/Income Tax Return </label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<a href="requirements/';
        echo $itr_label;
        echo '" target="_blank">View</a></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/&nbsp; <a target="_blank" href="requirements/';
        echo $itr_label;
        echo '">View</a></label>';


        echo '<select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>

           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['indigency'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment </label>
                  <select name="indigency" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<a href="requirements/';
        echo $indigency_label;
        echo '" target="_blank">View</a></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment&nbsp; <a target="_blank" href="requirements/';
        echo $indigency_label;
        echo '">View</a></label>';


        echo '<select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['applicationform'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Registration Form/Proof of Enrollment </label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<a href="requirements/';
        echo $application_label;
        echo '" target="_blank">View</a></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Registration Form/Proof of Enrollment&nbsp; <a target="_blank" href="requirements/';
        echo $application_label;
        echo '">View</a></label>';


        echo '<select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['picture'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp 2 x 2 Picture </label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<a href="requirements/';
        echo $picture_label;
        echo '" target="_blank">View</a></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp 2 x 2 Picture&nbsp; <a target="_blank" href="requirements/';
        echo $picture_label;
        echo '">View</a></label>';


        echo '<select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
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
  } else if ($filter == "EMAIL") {
    if ($order == "ASC") {

      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin
        INNER JOIN tbl_studentinfo
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username ASC LIMIT " . $limit . " OFFSET " . $off;;
    } else {
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin
        INNER JOIN tbl_studentinfo
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.username='$whatsearch' ORDER BY tbl_admin.username DESC LIMIT " . $limit . " OFFSET " . $off;;
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $userids = $row['id'];

      $sqlb = "SELECT * FROM tbl_college_requirements where user_id='$userids'";
      $resultb = $conn->query($sqlb);
      $rowb = $resultb->fetch_assoc();
      $users = $userids;
      $sqld = "SELECT * FROM tbl_college_requirements_label WHERE user_id='$users'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      if (isset($rowd['applicationform']) == NULL) {
        $application_label = "";
      } else {
        $application_label = $rowd['applicationform'];
      }

      if (isset($rowd['birthcertificate']) == NULL) {
        $birthcertificate_label = "";
      } else {
        $birthcertificate_label = $rowd['birthcertificate'];
      }


      if (isset($rowd['gradereport']) == NULL) {
        $gradereport_label = "";
      } else {
        $gradereport_label = $rowd['gradereport'];
      }



      if (isset($rowd['schoolclearance']) == NULL) {
        $schoolclearance_label = "";
      } else {
        $schoolclearance_label = $rowd['schoolclearance'];
      }

      if (isset($rowd['parentvotersid']) == NULL) {
        $parentvotersid_label = "";
      } else {
        $parentvotersid_label = $rowd['parentvotersid'];
      }

      if (isset($rowd['studentregistration']) == NULL) {
        $studentregistration_label = "";
      } else {
        $studentregistration_label = $rowd['studentregistration'];
      }

      if (isset($rowd['housesketch']) == NULL) {
        $housesketch_label = "";
      } else {
        $housesketch_label = $rowd['housesketch'];
      }

      if (isset($rowd['barangayclearance']) == NULL) {
        $barangayclearance_label = "";
      } else {
        $barangayclearance_label = $rowd['barangayclearance'];
      }

      if (isset($rowd['picture']) == NULL) {
        $picture_label = "";
      } else {
        $picture_label = $rowd['picture'];
      }

      if (isset($rowd['itr']) == NULL) {
        $itr_label = "";
      } else {
        $itr_label = $rowd['itr'];
      }

      if (isset($rowd['yourvotersid']) == NULL) {
        $yourvotersid_label = "";
      } else {
        $yourvotersid_label = $rowd['yourvotersid'];
      }

      if (isset($rowd['indigency']) == NULL) {
        $indigency_label = "";
      } else {
        $indigency_label = $rowd['indigency'];
      }

      echo '<div class="modal fade" id="updateGrades';
      echo $userids;
      echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateRequirementsCollege.php" method="post">
      <div class="modal-body">
        <div class="row">';
      echo '<div class="col-md-6">
              <div class="form-group">

                <input type="hidden" name="userid" id="updateuserid" value="';
      echo $rowb['user_id'];
      echo '">';
      echo '</div>
          </div>';
      echo '<div class="col-md-6">
              <div class="form-group">';
      echo '</div>';
      echo '</div>';

      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['birthcertificate'] == 0) {
        echo ' <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Birth Certificate (should be PSA)</label>';

        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>

                  </select>';
      } else  if ($rowb['birthcertificate'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<a href="requirements/';
        echo $birthcertificate_label;
        echo '" target="_blank">View</a></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else  if ($rowb['birthcertificate'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp; <a target="_blank" href="requirements/';
        echo $birthcertificate_label;
        echo '">View</a></label>';


        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo ' <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['schoolclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Certificate of Good Moral </label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<a href="requirements/';
        echo $schoolclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Certificate of Good Moral &nbsp; <a target="_blank" href="requirements/';
        echo $schoolclearance_label;
        echo '">View</a></label>';


        echo '<select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['gradereport'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Grade Report/Report of Ratings</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<a href="requirements/';
        echo $gradereport_label;
        echo '" target="_blank">View</a></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Grade Report/Report of Ratings &nbsp; <a target="_blank" href="requirements/';
        echo $gradereport_label;
        echo '">View</a></label>';


        echo '<select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['housesketch'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Vicinity Map/House Sketch </label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<a href="requirements/';
        echo $housesketch_label;
        echo '" target="_blank">View</a></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Vicinity Map/House Sketch&nbsp; <a target="_blank" href="requirements/';
        echo $housesketch_label;
        echo '">View</a></label>';


        echo '<select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['barangayclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Barangay Clearance of Applicant</label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<a href="requirements/';
        echo $barangayclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Barangay Clearance of Applicant&nbsp; <a target="_blank" href="requirements/';
        echo $barangayclearance_label;
        echo '">View</a></label>';


        echo '<select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['parentvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parent Voter"s ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<a href="requirements/';
        echo $parentvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
        echo $parentvotersid_label;
        echo '">View</a></label>';


        echo '<select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }


      echo '</div>
          </div>
          <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['yourvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above)</label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp';
        echo '<a href="requirements/';
        echo $yourvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
        echo $yourvotersid_label;
        echo '">View</a></label>';


        echo '<select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>


           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['itr'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certification of Employment/Income Tax Return </label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<a href="requirements/';
        echo $itr_label;
        echo '" target="_blank">View</a></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/&nbsp; <a target="_blank" href="requirements/';
        echo $itr_label;
        echo '">View</a></label>';


        echo '<select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>

           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['indigency'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment </label>
                  <select name="indigency" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<a href="requirements/';
        echo $indigency_label;
        echo '" target="_blank">View</a></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment&nbsp; <a target="_blank" href="requirements/';
        echo $indigency_label;
        echo '">View</a></label>';


        echo '<select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['applicationform'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Registration Form/Proof of Enrollment </label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<a href="requirements/';
        echo $application_label;
        echo '" target="_blank">View</a></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Registration Form/Proof of Enrollment&nbsp; <a target="_blank" href="requirements/';
        echo $application_label;
        echo '">View</a></label>';


        echo '<select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['picture'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp 2 x 2 Picture </label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<a href="requirements/';
        echo $picture_label;
        echo '" target="_blank">View</a></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp 2 x 2 Picture&nbsp; <a target="_blank" href="requirements/';
        echo $picture_label;
        echo '">View</a></label>';


        echo '<select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
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
  } else if ($filter == "FIRST NAME") {
    if ($order == "ASC") {

      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin
        INNER JOIN tbl_studentinfo
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname ASC LIMIT " . $limit . " OFFSET " . $off;;
    } else {
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin
        INNER JOIN tbl_studentinfo
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.firstname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.firstname DESC LIMIT " . $limit . " OFFSET " . $off;;
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $userids = $row['id'];

      $sqlb = "SELECT * FROM tbl_college_requirements where user_id='$userids'";
      $resultb = $conn->query($sqlb);
      $rowb = $resultb->fetch_assoc();
      $users = $userids;
      $sqld = "SELECT * FROM tbl_college_requirements_label WHERE user_id='$users'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      if (isset($rowd['applicationform']) == NULL) {
        $application_label = "";
      } else {
        $application_label = $rowd['applicationform'];
      }

      if (isset($rowd['birthcertificate']) == NULL) {
        $birthcertificate_label = "";
      } else {
        $birthcertificate_label = $rowd['birthcertificate'];
      }


      if (isset($rowd['gradereport']) == NULL) {
        $gradereport_label = "";
      } else {
        $gradereport_label = $rowd['gradereport'];
      }



      if (isset($rowd['schoolclearance']) == NULL) {
        $schoolclearance_label = "";
      } else {
        $schoolclearance_label = $rowd['schoolclearance'];
      }

      if (isset($rowd['parentvotersid']) == NULL) {
        $parentvotersid_label = "";
      } else {
        $parentvotersid_label = $rowd['parentvotersid'];
      }

      if (isset($rowd['studentregistration']) == NULL) {
        $studentregistration_label = "";
      } else {
        $studentregistration_label = $rowd['studentregistration'];
      }

      if (isset($rowd['housesketch']) == NULL) {
        $housesketch_label = "";
      } else {
        $housesketch_label = $rowd['housesketch'];
      }

      if (isset($rowd['barangayclearance']) == NULL) {
        $barangayclearance_label = "";
      } else {
        $barangayclearance_label = $rowd['barangayclearance'];
      }

      if (isset($rowd['picture']) == NULL) {
        $picture_label = "";
      } else {
        $picture_label = $rowd['picture'];
      }

      if (isset($rowd['itr']) == NULL) {
        $itr_label = "";
      } else {
        $itr_label = $rowd['itr'];
      }

      if (isset($rowd['yourvotersid']) == NULL) {
        $yourvotersid_label = "";
      } else {
        $yourvotersid_label = $rowd['yourvotersid'];
      }

      if (isset($rowd['indigency']) == NULL) {
        $indigency_label = "";
      } else {
        $indigency_label = $rowd['indigency'];
      }

      echo '<div class="modal fade" id="updateGrades';
      echo $userids;
      echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateRequirementsCollege.php" method="post">
      <div class="modal-body">
        <div class="row">';
      echo '<div class="col-md-6">
              <div class="form-group">

                <input type="hidden" name="userid" id="updateuserid" value="';
      echo $rowb['user_id'];
      echo '">';
      echo '</div>
          </div>';
      echo '<div class="col-md-6">
              <div class="form-group">';
      echo '</div>';
      echo '</div>';

      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['birthcertificate'] == 0) {
        echo ' <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Birth Certificate (should be PSA)</label>';

        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>

                  </select>';
      } else  if ($rowb['birthcertificate'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<a href="requirements/';
        echo $birthcertificate_label;
        echo '" target="_blank">View</a></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else  if ($rowb['birthcertificate'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp; <a target="_blank" href="requirements/';
        echo $birthcertificate_label;
        echo '">View</a></label>';


        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo ' <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['schoolclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Certificate of Good Moral </label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<a href="requirements/';
        echo $schoolclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Certificate of Good Moral &nbsp; <a target="_blank" href="requirements/';
        echo $schoolclearance_label;
        echo '">View</a></label>';


        echo '<select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['gradereport'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Grade Report/Report of Ratings</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<a href="requirements/';
        echo $gradereport_label;
        echo '" target="_blank">View</a></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Grade Report/Report of Ratings &nbsp; <a target="_blank" href="requirements/';
        echo $gradereport_label;
        echo '">View</a></label>';


        echo '<select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['housesketch'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Vicinity Map/House Sketch </label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<a href="requirements/';
        echo $housesketch_label;
        echo '" target="_blank">View</a></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Vicinity Map/House Sketch&nbsp; <a target="_blank" href="requirements/';
        echo $housesketch_label;
        echo '">View</a></label>';


        echo '<select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['barangayclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Barangay Clearance of Applicant</label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<a href="requirements/';
        echo $barangayclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Barangay Clearance of Applicant&nbsp; <a target="_blank" href="requirements/';
        echo $barangayclearance_label;
        echo '">View</a></label>';


        echo '<select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['parentvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parent Voter"s ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<a href="requirements/';
        echo $parentvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
        echo $parentvotersid_label;
        echo '">View</a></label>';


        echo '<select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
          <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['yourvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above)</label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp';
        echo '<a href="requirements/';
        echo $yourvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp; <a target="_blank" href="requirements/';
        echo $yourvotersid_label;
        echo '">View</a></label>';


        echo '<select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>


           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['itr'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certification of Employment/Income Tax Return </label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<a href="requirements/';
        echo $itr_label;
        echo '" target="_blank">View</a></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/&nbsp; <a target="_blank" href="requirements/';
        echo $itr_label;
        echo '">View</a></label>';


        echo '<select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>

           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['indigency'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment </label>
                  <select name="indigency" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<a href="requirements/';
        echo $indigency_label;
        echo '" target="_blank">View</a></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment&nbsp; <a target="_blank" href="requirements/';
        echo $indigency_label;
        echo '">View</a></label>';


        echo '<select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['applicationform'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Registration Form/Proof of Enrollment </label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<a href="requirements/';
        echo $application_label;
        echo '" target="_blank">View</a></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Registration Form/Proof of Enrollment&nbsp; <a target="_blank" href="requirements/';
        echo $application_label;
        echo '">View</a></label>';


        echo '<select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['picture'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp 2 x 2 Picture </label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<a href="requirements/';
        echo $picture_label;
        echo '" target="_blank">View</a></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp 2 x 2 Picture&nbsp; <a target="_blank" href="requirements/';
        echo $picture_label;
        echo '">View</a></label>';


        echo '<select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
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
  } else if ($filter == "LAST NAME") {
    if ($order == "ASC") {

      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin
        INNER JOIN tbl_studentinfo
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname ASC LIMIT " . $limit . " OFFSET " . $off;;
    } else {
      $sql = "SELECT tbl_admin.id,tbl_admin.academic_year,tbl_admin.application_no
        FROM tbl_admin
        INNER JOIN tbl_studentinfo
        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
        WHERE tbl_admin.status='$status' AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_studentinfo.lastname LIKE '$whatsearch%' ORDER BY tbl_studentinfo.lastname DESC LIMIT " . $limit . " OFFSET " . $off;;
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $userids = $row['id'];

      $sqlb = "SELECT * FROM tbl_college_requirements where user_id='$userids'";
      $resultb = $conn->query($sqlb);
      $rowb = $resultb->fetch_assoc();
      $users = $userids;
      $sqld = "SELECT * FROM tbl_college_requirements_label WHERE user_id='$users'";
      $resultd = $conn->query($sqld);
      $rowd = $resultd->fetch_assoc();
      if (isset($rowd['applicationform']) == NULL) {
        $application_label = "";
      } else {
        $application_label = $rowd['applicationform'];
      }

      if (isset($rowd['birthcertificate']) == NULL) {
        $birthcertificate_label = "";
      } else {
        $birthcertificate_label = $rowd['birthcertificate'];
      }


      if (isset($rowd['gradereport']) == NULL) {
        $gradereport_label = "";
      } else {
        $gradereport_label = $rowd['gradereport'];
      }



      if (isset($rowd['schoolclearance']) == NULL) {
        $schoolclearance_label = "";
      } else {
        $schoolclearance_label = $rowd['schoolclearance'];
      }

      if (isset($rowd['parentvotersid']) == NULL) {
        $parentvotersid_label = "";
      } else {
        $parentvotersid_label = $rowd['parentvotersid'];
      }

      if (isset($rowd['studentregistration']) == NULL) {
        $studentregistration_label = "";
      } else {
        $studentregistration_label = $rowd['studentregistration'];
      }

      if (isset($rowd['housesketch']) == NULL) {
        $housesketch_label = "";
      } else {
        $housesketch_label = $rowd['housesketch'];
      }

      if (isset($rowd['barangayclearance']) == NULL) {
        $barangayclearance_label = "";
      } else {
        $barangayclearance_label = $rowd['barangayclearance'];
      }

      if (isset($rowd['picture']) == NULL) {
        $picture_label = "";
      } else {
        $picture_label = $rowd['picture'];
      }

      if (isset($rowd['itr']) == NULL) {
        $itr_label = "";
      } else {
        $itr_label = $rowd['itr'];
      }

      if (isset($rowd['yourvotersid']) == NULL) {
        $yourvotersid_label = "";
      } else {
        $yourvotersid_label = $rowd['yourvotersid'];
      }

      if (isset($rowd['indigency']) == NULL) {
        $indigency_label = "";
      } else {
        $indigency_label = $rowd['indigency'];
      }

      echo '<div class="modal fade" id="updateGrades';
      echo $userids;
      echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateRequirementsCollege.php" method="post">
      <div class="modal-body">
        <div class="row">';
      echo '<div class="col-md-6">
              <div class="form-group">

                <input type="hidden" name="userid" id="updateuserid" value="';
      echo $rowb['user_id'];
      echo '">';
      echo '</div>
          </div>';
      echo '<div class="col-md-6">
              <div class="form-group">';
      echo '</div>';
      echo '</div>';

      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['birthcertificate'] == 0) {
        echo ' <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Birth Certificate (should be PSA)</label>';

        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>

                  </select>';
      } else  if ($rowb['birthcertificate'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<a href="requirements/';
        echo $birthcertificate_label;
        echo '" target="_blank">View</a></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else  if ($rowb['birthcertificate'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Birth Certificate (should be PSA) &nbsp; <a target="_blank" href="requirements/';
        echo $birthcertificate_label;
        echo '">View</a></label>';


        echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo ' <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['schoolclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Certificate of Good Moral </label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<a href="requirements/';
        echo $schoolclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['schoolclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Certificate of Good Moral &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Certificate of Good Moral &nbsp; <a target="_blank" href="requirements/';
        echo $schoolclearance_label;
        echo '">View</a></label>';


        echo '<select name="schoolclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>';
      echo '<div class="col-md-12">
              <div class="form-group">';
      if ($rowb['gradereport'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Grade Report/Report of Ratings</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<a href="requirements/';
        echo $gradereport_label;
        echo '" target="_blank">View</a></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['gradereport'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report/Report of Ratings&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Grade Report/Report of Ratings &nbsp; <a target="_blank" href="requirements/';
        echo $gradereport_label;
        echo '">View</a></label>';


        echo '<select name="gradereport" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['housesketch'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Vicinity Map/House Sketch </label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<a href="requirements/';
        echo $housesketch_label;
        echo '" target="_blank">View</a></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['housesketch'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Vicinity Map/House Sketch &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Vicinity Map/House Sketch&nbsp; <a target="_blank" href="requirements/';
        echo $housesketch_label;
        echo '">View</a></label>';


        echo '<select name="housesketch" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['barangayclearance'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Barangay Clearance of Applicant</label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<a href="requirements/';
        echo $barangayclearance_label;
        echo '" target="_blank">View</a></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['barangayclearance'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance of Applicant &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Barangay Clearance of Applicant&nbsp; <a target="_blank" href="requirements/';
        echo $barangayclearance_label;
        echo '">View</a></label>';


        echo '<select name="barangayclearance" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['parentvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parent Voter"s ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<a href="requirements/';
        echo $parentvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['parentvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
        echo $parentvotersid_label;
        echo '">View</a></label>';


        echo '<select name="parentvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
          <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['yourvotersid'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above)</label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Voters ID or Voters Certification of applicant (for 18 years old and above) ID&nbsp';
        echo '<a href="requirements/';
        echo $yourvotersid_label;
        echo '" target="_blank">View</a></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['yourvotersid'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
        echo $yourvotersid_label;
        echo '">View</a></label>';


        echo '<select name="yourvotersid" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>


           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['itr'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certification of Employment/Income Tax Return </label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<a href="requirements/';
        echo $itr_label;
        echo '" target="_blank">View</a></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['itr'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/ &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2">Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3"  selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certification of Employment/Income Tax Return/&nbsp; <a target="_blank" href="requirements/';
        echo $itr_label;
        echo '">View</a></label>';


        echo '<select name="itr" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>

           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['indigency'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment </label>
                  <select name="indigency" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<a href="requirements/';
        echo $indigency_label;
        echo '" target="_blank">View</a></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['indigency'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parents Certificate of Indigency/Certificate of Unemployment&nbsp; <a target="_blank" href="requirements/';
        echo $indigency_label;
        echo '">View</a></label>';


        echo '<select name="indigency" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
            <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['applicationform'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Registration Form/Proof of Enrollment </label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<a href="requirements/';
        echo $application_label;
        echo '" target="_blank">View</a></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['applicationform'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Registration Form/Proof of Enrollment &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Registration Form/Proof of Enrollment&nbsp; <a target="_blank" href="requirements/';
        echo $application_label;
        echo '">View</a></label>';


        echo '<select name="applicationform" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
          </div>
           <div class="col-md-12">
              <div class="form-group">';
      if ($rowb['picture'] == 0) {
        echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp 2 x 2 Picture </label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 2) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<a href="requirements/';
        echo $picture_label;
        echo '" target="_blank">View</a></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3">Not Applicable</option>
                  </select>';
      } else if ($rowb['picture'] == 3) {
        echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 2 x 2 Picture &nbsp';
        echo '<span> Not Applicable</span></label>
                  <select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="2" >Submitted</option>
                     <option value="1">Approved</option>
                      <option value="3" selected>Not Applicable</option>
                  </select>';
      } else {
        echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp 2 x 2 Picture&nbsp; <a target="_blank" href="requirements/';
        echo $picture_label;
        echo '">View</a></label>';


        echo '<select name="picture" class="form-control">
                    <option value="0">Disapproved</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                     <option value="3">Not Applicable</option>
                  </select>';
      }

      echo '</div>
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
    $(document).ready(function() {
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