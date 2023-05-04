<?php session_start();

if($_SESSION['counter']<4){
    echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","0")';
      echo 'window.open("uploadphoto.php","_self")';
      echo '</script>';
}
$username = $_SESSION['username'];
require "config.php";
$status="APPROVED";
$userid="";
$f_firstname="";
$f_lastname="";
$f_middlename="";
$f_occupation="";

$m_firstname="";
$m_lastname="";
$m_middlename="";
$m_occupation="";

$g_firstname="";
$g_lastname="";
$g_middlename="";
$g_occupation="";
$g_phonenumber="";
$g_housenumber="";
$g_street="";
$g_barangay="";
$g_relationship="";



$p_housenumber="";
$p_street="";
$p_barangay="";
$p_gross="";
$p_numberfamily="";
$p_siblings="";
$p_girls="";
$p_boy="";
$sql = "SELECT * FROM tbl_admin WHERE username='$username'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $userid = $row['id'];

    $sql1 = "SELECT * FROM tbl_fatherinfo WHERE user_id='$userid'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0){
      $row1 = $result1->fetch_assoc();
        $f_firstname=$row1['firstname'];
        $f_lastname=$row1['lastname'];
        $f_middlename=$row1['middlename'];
        $f_occupation=$row1['occupation'];

    }else{

    }

    $sql2 = "SELECT * FROM tbl_motherinfo WHERE user_id='$userid'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0){
      $row2 = $result2->fetch_assoc();
        $m_firstname=$row2['firstname'];
        $m_lastname=$row2['lastname'];
        $m_middlename=$row2['middlename'];
        $m_occupation=$row2['occupation'];

    }else{

    }

    $sql3 = "SELECT * FROM tbl_guardianinfo WHERE user_id='$userid'";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0){
      $row3 = $result3->fetch_assoc();
        $g_firstname=$row3['firstname'];
        $g_lastname=$row3['lastname'];
        $g_middlename=$row3['middlename'];
        $g_occupation=$row3['occupation'];
        $g_phonenumber=$row3['phonenumber'];
        $g_housenumber=$row3['housenumber'];
        $g_street=$row3['street'];
        $g_barangay=$row3['barangay'];
        $g_relationship=$row3['relationship'];

    }else{

    }

    $sql4 = "SELECT * FROM tbl_parentinfo WHERE user_id='$userid'";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0){
      $row4 = $result4->fetch_assoc();
        $p_housenumber=$row4['housenumber'];
        $p_street=$row4['street'];
        $p_barangay=$row4['barangay'];
        $p_gross=$row4['gross'];
        $p_numberfamily=$row4['numberfamily'];
        $p_siblings=$row4['siblings'];
        $p_girls=$row4['girls'];
        $p_boy=$row4['boy'];

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
                    / <a href="educationalinfo.php">Educational Info </a>/ <a href="familybackground.php">Parent Info </a>/ Siblings Info
                    </h5>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <form action="addParentInfo.php" method="POST">
                  <div class="card-body">
                    <div class="row">
                       <input type="hidden" name="userid" id="userid" class="form-control" placeholder="First Name" value="<?php echo $userid; ?>">
                        <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Father's Information</label>
                            
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="ffname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="ffname" id="ffname" class="form-control" placeholder="First Name" value="<?php echo $f_firstname; ?>" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="fmname">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="fmname" id="fmname" class="form-control" placeholder="Middle Name" value="<?php echo $f_middlename; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="flname">Last Name </label>
                            <div class="input-group">
                              <input type="text" name="flname" id="flname" class="form-control" placeholder="Last Name" value="<?php echo $f_lastname; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="foccupation">Occupation </label>
                            <div class="input-group">
                              <input type="text" name="foccupation" id="foccupation" class="form-control" placeholder="Occupation" value="<?php echo $f_occupation; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4"></div>
                       <div class="col-md-12"><hr></div>
                     <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Mother's Information</label>
                            
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="mfname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="mfname" id="mfname" class="form-control" placeholder="First Name" value="<?php echo $m_firstname; ?>" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="mmname">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="mmname" id="mmname" class="form-control" placeholder="Middle Name" value="<?php echo $m_middlename; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="mlname">Last Name </label>
                            <div class="input-group">
                              <input type="text" name="mlname" id="mlname" class="form-control" placeholder="Last Name" value="<?php echo $m_lastname; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="moccupation">Occupation </label>
                            <div class="input-group">
                              <input type="text" name="moccupation" id="moccupation" class="form-control" placeholder="Occupation" value="<?php echo $m_occupation;?>" required>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4"></div>
                      <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Parent's Address</label>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="phousenumber">House Number</label>
                            <div class="input-group">
                              <input type="text" name="phousenumber" id="phousenumber" class="form-control" placeholder="House Number" value="<?php echo $p_housenumber; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="pstreet">Street</label>
                            <div class="input-group">
                              <input type="text" name="pstreet" id="pstreet" class="form-control" placeholder="Street" value="<?php echo $p_street; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="pbarangay">Barangay</label>
                            <div class="input-group">
                               <input type="text" name="pbarangay" id="pbarangay" class="form-control" placeholder="Street" value="<?php echo $p_barangay; ?>" required>
                              <!-- <select name="pbarangay" id="pbarangay" class="form-control"> -->
                                <?php
                                  // if($p_barangay!=""){
                                  //   echo '<option value="';
                                  //   echo $p_barangay;
                                  //   echo '">';
                                  //   echo $p_barangay;
                                  //   echo '</option>';
                                  // }
                                ?>
                               <!--  <option value="San Rafael">San Rafael</option>
                                <option value="San Roque">San Roque</option>
                              </select> -->
                          
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                       <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Family's Info</label>
                          </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="gross">Annual Gross </label>
                            <div class="input-group">
                              <input type="text" name="gross" id="gross" class="form-control" placeholder="Annual Gross" value="<?php echo $p_gross;?>" required>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="numfamily">Number of Family </label>
                            <div class="input-group">
                              <input type="number" name="numfamily" id="numfamily" class="form-control" placeholder="Number of Family" value="<?php echo $p_numberfamily;?>" required>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="numsiblings">Number of Siblings </label>
                            <div class="input-group">
                              <input type="number" name="numsiblings" id="numsiblings" class="form-control" placeholder="Number of Siblings" value="<?php echo $p_siblings;?>" required>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-1">
                         <div class="form-group">
                            <label for="numboys"># of Boy(s) </label>
                            <div class="input-group">
                              <input type="number" name="numboys" id="numboys" class="form-control" placeholder="Number of Boy(s)" value="<?php echo $p_boy;?>" required>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-1">
                         <div class="form-group">
                            <label for="numgirls"># of Girl(s) </label>
                            <div class="input-group">
                              <input type="number" name="numgirls" id="numgirls" class="form-control" placeholder="Number of Girl(s)" value="<?php echo $p_girls;?>" required>
                            </div>
                          </div>
                      </div>
                       <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Guardian's Information</label>
                            
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gfname">First Name</label>
                            <div class="input-group">
                              <input type="text" name="gfname" id="gfname" class="form-control" placeholder="First Name" value="<?php echo $g_firstname; ?>" required>
                          
                            </div>
                          </div>
                      </div>

                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gmname">Middle Name</label>
                            <div class="input-group">
                              <input type="text" name="gmname" id="gmname" class="form-control" placeholder="Middle Name" value="<?php echo $g_middlename; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="glname">Last Name </label>
                            <div class="input-group">
                              <input type="text" name="glname" id="glname" class="form-control" placeholder="Last Name" value="<?php echo $g_lastname; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="goccupation">Occupation </label>
                            <div class="input-group">
                              <input type="text" name="goccupation" id="goccupation" class="form-control" placeholder="Occupation" value="<?php echo $g_occupation;?>" required>
                          
                            </div>
                          </div>
                      </div>

                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="grelationship">Relationship </label>
                            <div class="input-group">
                              <input type="text" name="grelationship" id="grelationship" class="form-control" placeholder="Relationship" value="<?php echo $g_relationship; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gphone">Phone Number </label>
                            <div class="input-group">
                              <input type="text" name="gphone" id="gphone" class="form-control" placeholder="Phone Number" value="<?php echo $g_phonenumber; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12"><hr></div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label for="school">Guardian's Address</label>
                          </div>
                      </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label for="ghousenumber">House Number</label>
                            <div class="input-group">
                              <input type="text" name="ghousenumber" id="ghousenumber" class="form-control" placeholder="House Number" value="<?php echo $g_housenumber; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gstreet">Street</label>
                            <div class="input-group">
                              <input type="text" name="gstreet" id="gstreet" class="form-control" placeholder="Street" value="<?php echo $g_street; ?>" required>
                          
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <label for="gbarangay">Barangay</label>
                            <div class="input-group">
                              <select name="gbarangay" id="gbarangay" class="form-control">
                                 <?php
                                 require "config.php";
                                  $status="APPROVED";
                                  $usertype="admin";
                                  $sql15 = "SELECT * FROM tbl_barangay ORDER BY barangay";
                                  $result15 = $conn->query($sql15);
                                  $count=1;
                                  if ($result15->num_rows > 0){
                                      while($row15 = $result15->fetch_assoc()){
                                        if($row15['barangay']!=$g_barangay){
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
                      <div class="col-md-4"></div>
                     
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