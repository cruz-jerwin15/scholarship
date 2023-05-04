<?php session_start();
if ($_SESSION['usertype'] != "superadmin") {
  header('Location:dashboards.php');
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

  </script>
  <script>
    var ids;
    var acad_id;

    function getRemoveId(id) {
      ids = id;
    }

    function removeUser() {
      window.open("removeUser.php?id=" + ids, "_self");
    }

    function getAcadId(id) {
      acad_id = id;

    }

    function changeStatus() {
      window.open("changeAcademicStatus.php?id=" + acad_id, "_self");
    }

    function changeStatusOpen() {
      window.open("changeAcademicOpen.php?id=" + acad_id, "_self");
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
                <h4 class="page-title">Settings > Manage Application</h4>

              </div>
            </div>
            <div class="col-md-12">
              <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#addUser">
                <i class="mdi mdi-plus"></i>Add Academic Year
              </button>
            </div>

          </div>
          <!-- Page Title Header Ends-->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Set New Application</h4>
                  <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>School Year</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $typescholar = "collegerecipient";
                      $sql = "SELECT * FROM tbl_academic ORDER BY academic_year DESC";
                      $result = $conn->query($sql);
                      $count = 0;
                      while ($row = $result->fetch_assoc()) {
                        $count++;
                        echo '<tr>';
                        echo '<td>';
                        echo $count;
                        echo '</td>';
                        echo '<td>';
                        echo $row['academic_year'];
                        echo '</td>';
                        echo '<td>';
                        echo $row['status'];
                        echo '</td>';
                        echo '<td>';
                        if ($row['status'] == "OPEN") {
                          echo '<button  class="btn btn-danger" id="';
                          echo $row['id'];
                          echo '" onClick="getAcadId(this.id)" data-toggle="modal" data-target="#currentModal"><i class="fa fa-times"></i></button>';
                        } else if ($row['status'] == "CURRENT") {
                          echo '<button  class="btn btn-success" id="';
                          echo $row['id'];
                          echo '" onClick="getAcadId(this.id)" data-toggle="modal" data-target="#reopenModal"><i class="fa fa-retweet"></i></button>';
                        } else {
                          echo '<button  class="btn btn-primary" disabled><i class="fa fa-retweet"></i></button>';
                        }

                        echo '</td>';
                        echo '</tr>';
                      }



                      ?>

                      </tr>

                    </tbody>
                  </table>
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


      <!-- Modal -->
      <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Remove User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Press [Yes] if you want to remove this users.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onClick="removeUser()">Yes</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Academic Year</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Start of form -->
            <form action="addAcademicYear.php" method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group row">
                      <label>Academic Year</label>
                      <select name="academic_year" class="form-control">
                        <?php
                        $start = 0;
                        $from = 0;
                        $to = 1;
                        date_default_timezone_set("Asia/Manila");


                        while (true) {
                          $year1 = date('Y') + $from;
                          $year2 = date('Y') + $to;
                          $acad_year = $year1 . "-" . $year2;
                          echo '<option value="';
                          echo $acad_year;
                          echo '">';
                          echo $acad_year;
                          echo '</option>';
                          $from++;
                          $to++;
                          $start++;
                          if ($start > 10) {
                            break;
                          }
                        }


                        ?>
                      </select>
                    </div>

                  </div>
                  <div class="col-sm-12">
                    <div class="form-group row">
                      <label>Semester</label>
                      <select name="academic_sem" class="form-control">
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                      </select>
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

      <!-- End Modal -->

      <?php
      require "config.php";
      $status1 = "APPROVED";
      $usertype1 = "admin";
      $sql1 = "SELECT * FROM tbl_barangay ORDER BY barangay";
      $result1 = $conn->query($sql1);

      if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {

          echo '<div class="modal fade" id="editUser';
          echo $row1['id'];
          echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barangay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updateBarangay.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <input type="hidden" name="barangayid" value="';
          echo $row1['id'];
          echo '">
               <input type="text" class="form-control" name="editbarangay" value="';
          echo $row1['barangay'];
          echo '" placeholder="Enter barangay" required>
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
</div>';
        }
      }
      ?>

      <div class="modal fade" id="currentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Close Application Process</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Press [Yes] if you want to close the application process. You can still re-open application process.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" onClick="changeStatus()">Yes</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="reopenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Re-open Application Process</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Press [Yes] if you want to re-open the application process.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" onClick="changeStatusOpen()">Yes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->

      <!-- Modal -->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Press [Yes] if you want to log out your account.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="logout.php" class="btn btn-primary">Yes</a>
            </div>
          </div>
        </div>
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