<?php session_start();

if($_SESSION['counter']<3){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("uploadphoto.php","_self")';
      echo '</script>';
}
$username = $_SESSION['username'];
require "config.php";
$status="APPROVED";
$userid="";
$school="";
$schooladdress="";
$highestyear="";
$genweight ="";
$bursary="";

$sql = "SELECT * FROM tbl_admin WHERE username='$username'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $userid = $row['id'];

    $sql1 = "SELECT * FROM tbl_educational WHERE user_id='$userid'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
        $school=$row1['school'];
        $schooladdress=$row1['address'];
        $highestyear=$row1['highestyear'];
        $genweight =$row1['genweight'];
        $bursary=$row1['bursary'];
    }else{

    }

  }else{
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("loginform.php","_self")';
      echo '</script>';
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
                    / <a href="studentprofile.php">Personal Info</a>
                    / <a href="educationalinfo.php">Educational Info </a>/ Parent Info / Siblings Info
                    </h5>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <form action="addEducationalInfo.php" method="POST">
                  <div class="card-body">
                    <div class="row">
                       <input type="hidden" name="userid" id="userid" class="form-control" placeholder="First Name" value="<?php echo $userid; ?>">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="school">Last School Attended</label>
                            <div class="input-group">
                              <input type="text" name="school" id="school" class="form-control" placeholder="School" value="<?php echo $school; ?>" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="schooladdress">School Address</label>
                            <div class="input-group">
                              <input type="text" name="schooladdress" id="schooladdress" class="form-control" placeholder="House number Street Barangay City" value="<?php echo $schooladdress; ?>" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="highestyear">Highest Year Attended</label>
                            <div class="input-group">
                              <select type="text" name="highestyear" id="highestyear" class="form-control">
                                  <?php
                                    if($highestyear!=""){
                                        echo '<option value="';
                                        echo $highestyear;
                                        echo '">';
                                        echo $highestyear;
                                        echo '</option>';
                                    }
                                  
                                  if($_SESSION['usertype']=="college"){
                                    echo '<option value="Grade 10">Grade 10</option>
                                      <option value="Grade 11">Grade 11</option>
                                      <option value="Grade 12">Grade 12</option>';
                                  }else{
                                    echo '<option value="Grade 10">Grade 10</option>
                                      <option value="Grade 11">Grade 11</option>';
                                  }
                                  

                                  ?>
                                  
                               </select> 
                            </div>
                          </div>
                      </div> 

                       <div class="col-md-3">
                         <div class="form-group">
                          <label for="genweight">General Weighted Average</label>
                            <div class="input-group">
                                 <input type="number" id="genweight" name="genweight" class="form-control" placeholder="Ex. 90" value="<?php echo $genweight; ?>" required>
                            </div>
                          </div>
                      </div> 
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="grant"> Bursary or Grant Ejoyed</label>
                            <div class="input-group">
                                 <input type="text" id="grant" name="grant" class="form-control" placeholder="Bursary/Gant" value="<?php echo $bursary; ?>" required>
                            </div>
                          </div>
                      </div> 
                     
                     <?php
                      if($_SESSION['usertype']=="college"){
                        echo '<div class="col-md-3">
                         <div class="form-group">
                          <label for="grant"> Scholarship Type</label>
                            <div class="input-group">
                                 <select type="text" name="scholar" id="scholar" class="form-control">
                                  <option value="fullscholar">Full Scholar</option>
                                   <option value="collegerecipient">College Recipient</option>
                                 </select>
                            </div>
                          </div>
                        </div>';
                      }else{
                        echo '<input type="hidden" name="scholar" value="shscholar">';
                      }
                      
                      ?>
                      <div class="col-md-3">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="col-md-12">
                               <div class="form-group">
                                <label for="housenumber">&nbsp</label>
                                   <button type="submit" class="btn btn-primary btn-fw">Next</button>
                                </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>


                     
                      
                      
                      
                    </div>
                  </div>
                </form>
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