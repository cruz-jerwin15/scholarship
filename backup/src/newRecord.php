<?php session_start();
$_SESSION['notif']="NULL";

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
        window.open("viewUpdateNewCollegeRecipient.php?id="+id,"_blank");
      }
       function getViewId(id){
        window.open("viewNewCollegeRecipient.php?id="+id,"_blank");
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
                  <h4 class="page-title"> Upload Records</h4>
                  
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-8">
                <div class="page-header-toolbar">
                   <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#uploadStudent">Upload Student Info</button>
                  &nbsp
                   <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#uploadEducational">Educational Info</button>
                  &nbsp
                  <button type="button" class="btn btn-info btn-fw" data-toggle="modal" data-target="#uploadFamily">Upload Family Info</button>
                  <!--  &nbsp
                  <button type="button" class="btn btn-warning btn-fw" data-toggle="modal" data-target="#uploadRequirements">Upload Requirements</button> -->
                   &nbsp
                  <button type="button" class="btn btn-dark btn-fw" data-toggle="modal" data-target="#uploadSiblings">Upload Siblings</button>
                </div>
              </div>
              <!-- <div class="col-md-4 ">
                <div class="page-header-toolbar text-right">
                 <button type="button" class="btn btn-danger btn-fw" data-toggle="modal" data-target="#addSingleStudent"><span class="fa fa-plus"></span> Add Single Student</button>
               </div>
              </div> -->
            </div>
              <div class="col-md-12"><hr></div>
              
             
            <!-- </div> -->
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                 <h4>Legend</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                     
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Description</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>New Applicant</td>
                              <td>NEWAPPLICANT</td>
                           </tr>
                           <tr>
                              <td>For Interview</td>
                              <td>INTERVIEW</td>
                           </tr>
                           <tr>
                              <td>For Assessment</td>
                              <td>ASSESSMENT</td>
                           </tr>
                            <tr>
                              <td>Current Scholars</td>
                              <td>OK</td>
                           </tr>
                            <tr>
                              <td>Graduate Scholars</td>
                              <td>GRADUATED</td>
                           </tr>
                           <tr>
                              <td>Removed Scholars</td>
                              <td>REMOVED</td>
                           </tr>

                        </tbody>
                      </table>

                    
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Highest Educational Attainment</th>
                              <th>Code Use</th>
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>College</td>
                              <td>COLLEGE</td>
                           </tr>
                            <tr>
                              <td>Senior High School</td>
                              <td>SENIOR HIGH SCHOOL</td>
                           </tr>
                            <tr>
                              <td>Junior High School</td>
                              <td>JUNIOR HIGH SCHOOL</td>
                           </tr>
                            <tr>
                              <td>ELEMENTARY SCHOOL School</td>
                              <td>SENIOR HIGH SCHOOL</td>
                           </tr>
                           

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Description</th>
                              <th>User-Type</th>
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>Senior High Student</td>
                              <td>shs</td>
                           </tr>
                            <tr>
                              <td>College Student</td>
                              <td>college</td>
                           </tr>
                           

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Description</th>
                              <th>Scholar Type</th>
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>College Recipient</td>
                              <td>collegerecipient</td>
                           </tr>
                            <tr>
                              <td>College Full Scholarship</td>
                              <td>fullscholar</td>
                           </tr>
                            <tr>
                              <td>Senior High School Recipient</td>
                              <td>shscholar</td>
                           </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Corresponding Occupation</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>Managerial/Supervisor/Engineer/Doctor/Lawyer/Accountant/Director/Administrator/Researcher</td>
                             
                           </tr>
                            <tr>
                              <td>Office Staff/Clerical Administrative</td>
                             
                           </tr>
                            <tr>
                              <td>Operator/Mechanic/Electrician/Technician/Flooring Installer/Collector/Laborer/Inspector/Packer/Warehouse Associate</td>
                             
                           </tr>
                            <tr>
                              <td>Unemployed</td>
                             
                           </tr>
                            <tr>
                              <td>NONE</td>
                             
                           </tr>
                           

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                 <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Civil Status</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>SINGLE</td>
                             
                           </tr>
                            <tr>
                              <td>MARRIED</td>
                             
                           </tr>
                            <tr>
                              <td>SINGLE PARENT</td>
                             
                           </tr>
                           
                           

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Birth Order</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>Eldest</td>
                             
                           </tr>
                            <tr>
                              <td>Middle</td>
                             
                           </tr>
                            <tr>
                              <td>Youngest</td>
                             
                           </tr>
                           
                           <tr>
                              <td>Only Child</td>
                             
                           </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
           
          </div>


    <!-- Modal -->
<div class="modal fade" id="uploadStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="uploadNewRecordInfo.php" method="post" name="upload_excel" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <a href="files/new_record_info.csv" class="btn btn-secondary" download>Download Format</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>



 <!-- Modal -->
<div class="modal fade" id="addSingleStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="addSingleStudent.php" method="post" name="upload_excel" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="row">
                   <div class="col-md-8">
                    <div class="form-group">
                      <label >Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-md-4">
                    
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First name">
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Middle Name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name">
                    </div>
                  </div> 
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name">
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Birtday</label>
                        <input type="date" name="birthday" class="form-control" placeholder="2019-10-01">
                    </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label >Birth Place</label>
                        <input type="text" name="birthplace" class="form-control" placeholder="Birthplace">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Birth Order</label>
                        <select name="birthorder" class="form-control">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Genderr</label>
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Citizenship</label>
                        <input type="text" name="citizen" class="form-control" placeholder="Citizenship">
                    </div>
                  </div> 
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Religion</label>
                        <input type="text" name="religion" class="form-control" placeholder="Religion">
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >House Number</label>
                        <input type="text" name="housenumber" class="form-control" placeholder="House Number">
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Street</label>
                        <input type="text" name="street" class="form-control" placeholder="Street">
                    </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label >Barangay</label>
                        <input type="text" name="barangay" class="form-control" placeholder="Barangay">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control" placeholder="Contact Number">
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Facebook</label>
                        <input type="text" name="facebook" class="form-control" placeholder="Facebook">
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Course</label>
                        <input type="text" name="course" class="form-control" placeholder="Course">
                    </div>
                  </div>            
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Add</button>
      </div>
    </div>
  </div>
</form>
</div>


 <!-- Modal -->
<div class="modal fade" id="uploadSiblings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Siblings Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="uploadNewRecordSiblings.php" method="post" name="upload_excel" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <a href="files/new_record_siblings_info.csv" class="btn btn-secondary" download>Download Format</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>
    <!-- Modal -->
<div class="modal fade" id="uploadEducational" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Educational Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="uploadNewRecordEducational.php" method="post" name="upload_excel" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
         <a href="files/new_record_educational.csv" class="btn btn-secondary" download>Download Format</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>


    <!-- Modal -->
<div class="modal fade" id="uploadFamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Family Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="uploadNewRecordFamily.php" method="post" name="upload_excel" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <a href="files/new_record_family.csv" class="btn btn-secondary" download>Download Format</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>


    <!-- Modal -->
<div class="modal fade" id="uploadRequirements" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Rquirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="uploadNewRecordRequirements.php" method="post" name="upload_excel" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <a href="files/new_record_requirements.csv" class="btn btn-secondary" download>Download Format</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>
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