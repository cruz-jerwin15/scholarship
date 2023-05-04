<?php session_start();
if($_SESSION['counter']<2){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("uploadphoto.php","_self")';
      echo '</script>';
}


$username = $_SESSION['username'];
require "config.php";
$status="APPROVED";
$userid="";
$lastname="";
$email="";
$middlename="";
$firstname="";
$birthday="";
$birthplace="";
$birthorder="";
$gender="";
$religion="";
$citizenship="";
$housenumber="";
$street="";
$barangay="";
$phone="";
$facebook="";
$sql = "SELECT * FROM tbl_admin WHERE username='$username'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $email = $row['username'];
    $userid = $row['id'];

    $sql1 = "SELECT * FROM tbl_studentinfo WHERE user_id='$userid'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
      $middlename=$row1['middlename'];
      $gender=$row1['gender'];
      $birthday =$row1['bday'];
      $birthplace =$row1['birthplace'];
      $religion =$row1['religion'];
      $birthorder =$row1['birthorder'];
      $citizenship =$row1['citizenship'];
      $housenumber =$row1['housenumber'];
      $street =$row1['street'];
      $barangay =$row1['barangay'];
      $phone =$row1['phone'];
      $facebook =$row1['facebook'];
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
                    / Educational Info / Parent Info / Siblings Info
                    </h5>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <form action="addStudentInfo.php" method="POST">
                  <div class="card-body">
                    <div class="row">
                       <input type="hidden" name="userid" id="userid" class="form-control" placeholder="First Name" value="<?php echo $userid; ?>">
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="firstname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="<?php echo $firstname; ?>" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="middlename">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" value="<?php echo $middlename; ?>" required>
                          
                            </div>
                          </div>
                      </div> 
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="lastname">Last Name</label>
                            <div class="input-group">
                              <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="birthday">Birth Day</label>
                            <div class="input-group">
                              <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Birth Day" value="<?php echo $birthday; ?>" required>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-8">
                         <div class="form-group">
                          <label for="birthplace">Birth Place</label>
                            <div class="input-group">
                              <input type="text" name="birthplace" id="birthplace" class="form-control" placeholder="City and Province" value="<?php echo $birthplace; ?>" required>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="birthorder">Birth Order</label>
                            <div class="input-group">
                              <select name="birthorder" id="birthorder" class="form-control">
                                <?php
                                  if($birthorder!=""){
                                      echo '<option value="';
                                      echo $birthorder;
                                      echo '">';
                                      echo $birthorder;
                                      echo '</option>';
                                  }
                                ?>
                                
                                
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="others">Others</option>
                              </select>
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="gender">Gender</label>
                            <div class="input-group">
                              <select name="gender" id="gender" class="form-control">
                                <?php
                                  if($gender!=""){
                                      echo '<option value="';
                                      echo $gender;
                                      echo '">';
                                      echo $gender;
                                      echo '</option>';
                                  }
                                ?>
                               
                                <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="religion">Religion</label>
                            <div class="input-group">
                              <input type="text" name="religion" id="religion" class="form-control" placeholder="Religion" value="<?php echo $religion?>" required>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="citizenship">Citizenship</label>
                            <div class="input-group">
                              <input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="Citizenship" value="<?php echo $citizenship?>" required>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                          <label for="housenumber">Address</label>
                            
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="housenumber">House Number</label>
                            <div class="input-group">
                              <input type="text" name="housenumber" id="housenumber" class="form-control" placeholder="House Number" value="<?php echo $housenumber?>" required>
                                
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="street">Street</label>
                            <div class="input-group">
                              <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="<?php echo $street?>" required>
                                
                            </div>
                          </div>
                      </div>
                       <div class="col-md-4">
                         <div class="form-group">
                          <label for="barangay">Barangay</label>
                            <div class="input-group">
                              <select name="barangay" id="barangay" class="form-control">
                                <?php
                                 require "config.php";
                                  $status="APPROVED";
                                  $usertype="admin";
                                  $sql15 = "SELECT * FROM tbl_barangay ORDER BY barangay";
                                  $result15 = $conn->query($sql15);
                                  $count=1;
                                  if ($result15->num_rows > 0){
                                      while($row15 = $result15->fetch_assoc()){
                                        if($row15['barangay']!=$barangay){
                                           echo '<option value="';
                                            echo $row15['barangay'];
                                            echo '">';
                                            echo $row15['barangay'];
                                            echo '</option>';
                                        }else{
                                           echo '<option value="';
                                            echo $row15['barangay'];
                                            echo '" selected>';
                                            echo $row15['barangay'];
                                            echo '</option>';
                                        }
                                      }
                                  }
                                 
                                ?>
                               
                               
                              </select>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="email">Email address</label>
                            <div class="input-group">
                              <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $email?>" disabled>
                                
                            </div>
                          </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                          <label for="phone">Phone Number</label>
                            <div class="input-group">
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone?>" required>
                                
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="facebook">Facebook</label>
                            <div class="input-group">
                              <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook" value="<?php echo $facebook?>" required>
                                
                            </div>
                          </div>
                      </div>
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