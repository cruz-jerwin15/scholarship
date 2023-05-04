<?php session_start();

if($_SESSION['notif']=="0"){
    echo '<script language="javascript">';
    echo 'alert("Barangay is already existing")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="1"){
    echo '<script language="javascript">';
    echo 'alert("Successfully add new barangay")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="2"){
    echo '<script language="javascript">';
    echo 'alert("Successfully remove user")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else{

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

    function getRemoveId(id){
        ids = id;
    }
    function removeUser(){
      window.open("removeUser.php?id="+ids,"_self");
    }
  </script>
  </head>
  <body >
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
             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Requirements</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Process</th>
                          <th>Documents</th>
                          <th>Remarks</th>
                          <th>Approved By</th>
                          <th>Date/Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $student_id=$_GET['id'];
                          $status="APPROVED";
                          
                          $usertype="admin";
                          $sql = "SELECT * FROM tbl_log WHERE student_id='$student_id' ORDER BY date_time DESC";
                          $result = $conn->query($sql);
                          $count=1;
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $count;
                                echo '</td>';
                                 echo '<td>';
                                echo $row['process'];
                                echo '</td>';




                                echo '<td>';
        $status1="OPEN";
        $status2="CURRENT";
       $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
        $resulta = $conn->query($sqla);   
        $rowa = $resulta->fetch_assoc();

        $academic_id = $rowa['id'];
        $sqlb = "SELECT * FROM tbl_admin WHERE id='$student_id'";
        $resultb = $conn->query($sqlb);   
        $rowb = $resultb->fetch_assoc();
        $application_no=$rowb['application_no'];
        $academic_year=$rowb['academic_year'];

          $sqlc = "SELECT * FROM  tbl_assess_req_label WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
        $resultc = $conn->query($sqlc);   
        $rowc = $resultc->fetch_assoc();

            if(($row['remarks']=="Approved school id")||($row['remarks']=="Disapproved school id")){
              echo '<a href="requirements/';
              echo $rowc['school_id'];
              echo '" target="_blank">';
              echo "School ID</a>";

            }

            if(($row['remarks']=="Approved registration form")||($row['remarks']=="Disapproved registration form")){
               echo '<a href="requirements/';
              echo $rowc['registration_form'];
              echo '" target="_blank">';
              echo "Registration Form</a>";
            }

            if(($row['remarks']=="Approved school clearance")||($row['remarks']=="Disapproved school clearance")){
              if($rowc['school_clearance']=="NOT APPLICABLE"){
                echo "School Clearance";
              }else{
                 echo '<a href="requirements/';
              echo $rowc['school_clearance'];
              echo '" target="_blank">';
              echo "School Clearance</a>";
              }
              
            }

            if(($row['remarks']=="Approved grade report")||($row['remarks']=="Disapproved grade report")){
              echo '<a href="requirements/';
              echo $rowc['gradereport'];
              echo '" target="_blank">';
              echo "Grade Reports</a>";

            }

        $sqlc = "SELECT * FROM  tbl_renew_label WHERE academic_year='$academic_year' AND application_no='$application_no' AND academic_id='$academic_id'";
        $resultc = $conn->query($sqlc);   
        $rowc = $resultc->fetch_assoc();

            if(($row['remarks']=="Approved renewal school id")||($row['remarks']=="Disapproved renewal school id")){
              echo '<a href="requirements/';
              echo $rowc['school_id'];
              echo '" target="_blank">';
              echo "Renewal School ID</a>";

            }

            if(($row['remarks']=="Approved renewal registration form")||($row['remarks']=="Disapproved renewal registration form")){
               echo '<a href="requirements/';
              echo $rowc['registration_form'];
              echo '" target="_blank">';
              echo "Renewal Registration Form</a>";
            }

           

            

                                



                                echo '</td>';
                                echo '<td>';
                                echo $row['remarks'];
                                echo '</td>';
                                $user = $row['user_id'];
                                 $sql1 = "SELECT * FROM tbl_admin WHERE id='$user'";
                          $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $firstname = $row1['firstname'];
                          $lastname = $row1['lastname'];


                                echo '<td>';
                                echo $firstname." ".$lastname;
                                echo '</td>';
                                echo '<td>';
                                echo $row['dates']."/".$row['timess'];
                                echo '</td>';
                                echo '</tr>'; 

                                $count=$count+1;         
                              }
                          }else{

                          }
                          
                        ?>
                        
                        <!-- <tr>
                          <td>Messsy</td>
                          <td>53275532</td>
                          <td>15 May 2017</td>
                          <td>
                            <label class="badge badge-warning">In progress</label>
                          </td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td>
                            <label class="badge badge-info">Fixed</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td>
                            <label class="badge badge-success">Completed</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td>
                            <label class="badge badge-warning">In progress</label>
                          </td>
                        </tr> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Add Barangay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="addbarangay.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
               <input type="text" class="form-control" name="barangay" placeholder="Enter barangay" required>
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
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_barangay ORDER BY barangay";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

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