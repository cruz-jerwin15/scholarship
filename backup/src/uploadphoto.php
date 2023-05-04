<?php session_start();
$_SESSION['counter']=1;
$username = $_SESSION['username'];

require "config.php";
$status="APPROVED";
$userid="";

$sql = "SELECT * FROM tbl_admin WHERE username='$username'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $email = $row['username'];
    $userid = $row['id'];
    $statuss = $row['status'];
     $userimage = $row['image'];
    $_SESSION['userid']=$userid;
   

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
                    / Personal Info /  Educational Info / Parent Info / Siblings Info
                    </h5>
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
                         <div class="row">
                           <div class="col-md-4">
                            </div>
                             <div class="col-md-4">
                              <?php
                                 echo '<center><img class="img-lg rounded-circle" src="profile/';
                                 echo $userimage;
                                 echo '"/ style="width:200px;height:200px;"></center>';
                              ?>
                               
                            </div>
                             <div class="col-md-4">
                            </div>
                         </div>
                      </div>
                      <div class="col-md-12">
                      </div>
                      <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                              <form action="uploadprofile.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                     Select image to upload:
                                    <input type="file" name="image" id="image">
                                  </div>
                                   <div class="col-md-6">
                                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                                        <?php
                                     
                                        if($statuss!="APPROVED"){
                                         
                                        }else{
                                            echo '<input type="submit" class="btn btn-primary" value="Upload Image" name="submit">';
                                        }

                                      ?>
                                    
                                   </div>
                                </div>
                               
                               
                              </form>
                            </div>
                            <div class="col-md-4">
                            </div>
                            </div>
                       
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