<?php session_start();

if($_SESSION['counter']<5){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("uploadphoto.php","_self")';
      echo '</script>';
}

if($_SESSION['notif']=="1"){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'alert("Successfully add siblings")';
      echo '</script>';

      $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="2"){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'alert("You already add this siblings")';
      echo '</script>';

      $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="3"){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'alert("Successfully remove this siblings")';
      echo '</script>';

      $_SESSION['notif']="NULL";
}

$username = $_SESSION['username'];
require "config.php";
$status="APPROVED";
$userid="";


$sql = "SELECT * FROM tbl_admin WHERE username='$username'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $userid = $row['id'];
     $_SESSION['userid']=$userid;
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
      <link rel="stylesheet" href="../assetss/vendors/iconfonts/font-awesome/css/font-awesome.min.css" /> 
    <link rel="stylesheet" href="../assetss/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assetss/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../assetss/images/favicon.png" />
    <script>
      var ids;
      function getRemoveId(id){
        ids =id;
      }
      function removeUser(){
        window.open("removeSibling.php?id="+ids,"_self");
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
                  <h4 class="page-title">Student Profile</h4>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="page-header-toolbar">
                    <h5 class="page-title"><a href="uploadphoto.php">Upload Photo</a>
                    / <a href="studentprofile.php">Personal Info</a>
                    / <a href="educationalinfo.php">Educational Info </a>/ <a href="familybackground.php">Parent Info </a>/ <a href="siblings.php">Siblings Info </a>
                    </h5>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">

              <div class="col-md-12 grid-margin">
                <div class="card">
                 <!--  <form action="addEducationalInfo.php" method="POST"> -->
                  <div class="card-body">
                    <div class="row">
                       <input type="hidden" name="userid" id="userid" class="form-control" placeholder="First Name" value="<?php echo $userid; ?>">
                      <div class="col-md-8">
                         <div class="form-group">
                            <label for="school">Educational Assistance Enjoyed by Brother or Sister</label>
                            
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-4">
                          </div>
                          <div class="col-md-8">
                             <div class="form-group">
                              <label for="housenumber">&nbsp</label>
                                <button type="submit" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#addSiblings">Add Siblings</button>
                            </div>
                          </div>
                        </div>
                       
                      </div>
                      <div class="col-md-12">
                         <h4 class="card-title">List of Users</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Relationship</th>
                          <th>Grant</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $sql = "SELECT * FROM tbl_siblingsinfo WHERE user_id='$userid'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
                                echo '</td>';
                                echo '<td>';
                                echo $row['relationship'];
                                echo '</td>';
                                echo '<td>';
                                echo $row['typegrant'];
                                echo '</td>'; 
                                echo '<td>';
                                echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded btn-danger" onClick="getRemoveId(this.id)" data-toggle="modal" data-target="#removeModal">
                                  <i class="fa fa-trash-o"></i>';
                                echo '</td>';
                                echo '</tr>';          
                              }
                          }else{

                          }
                          
                        ?>
                        
                    
                      </tbody>
                    </table>
                      </div>

                     
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="col-md-6">
                               <div class="form-group">
                                <label for="housenumber">&nbsp</label>
                                   <button type="submit" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#submitModal">Finish</button>
                                </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
 
                    </div>
                  </div>
                <!-- </form> -->
                </div>
              </div>
            </div>
            
           
          </div>

<div class="modal fade" id="addSiblings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Siblings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="addSiblings.php" method="POST">
      <div class="modal-body">
        <div class="row">
          
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="firstname">First Name</label>
                            <div class="input-group">
                                <input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
                              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Frst Name" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <div class="input-group">
                              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="relationship">Relationship</label>
                            <div class="input-group">
                              <select type="text" name="relationship" id="relationship" class="form-control">
                                 
                                  <option value="Brother">Brother</option>
                                  <option value="Sister">Sister</option>
                                  
                               </select> 
                            </div>
                          </div>
                      </div> 
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="grant"> Grant Ejoyed</label>
                            <div class="input-group">
                                 <input type="text" id="grant" name="grant" class="form-control" placeholder="Bursary/Gant/Enter N/A if none" required>
                            </div>
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



    <!-- Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Siblings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Press [Yes] if you want to remove this siblings.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="removeUser()">Yes</button>
      </div>
    </div>
  </div>
</div>

   <!-- Modal -->
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Press [Yes] if you want to submit this apllication.
        <p style="color:red">*Note: Upon submitting this application, you cannot edit your information</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="submitapplication.php" class="btn btn-primary">Yes</a>
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