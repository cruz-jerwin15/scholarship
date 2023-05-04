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
    var ids;

    function getRemoveId(id){
        ids = id;
        
    }
    function removeUser(){
      window.open("removeBanner.php?id="+ids,"_self");
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
                  <h4 class="page-title">Manage Home Page</h4>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="page-header-toolbar">

                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 ">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="homepage.php">Banner</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="officers.php">Officers</a>
                          </li>
                         <li class="nav-item">
                            <a class="nav-link" href="requirements.php">Requirements</a>
                          </li>
                           <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="calendar.php">Calendar</a>
                          </li>
                        </ul>
                      </div>
                      <!-- Content -->
                      <div class="col-md-12 ">
                        <br>
                      </div>
                      <div class="col-md-12 ">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#uploadBanner">Add Image</button>
                      </div>
                       <div class="col-md-12 ">
                          <div class="page-header">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Image</th>
                                  <th><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                  <?php
                                  include 'config.php';
                                    $sql13 = "SELECT * FROM tbl_banner";
                                  $result13 = $conn->query($sql13);
                                  $count=0;
                                   while($row13 = $result13->fetch_assoc()){
                                    $count = $count+1;
                                      echo '<tr>';
                                       echo '<td>';
                                       echo $count;
                                       echo '</td>';
                                        echo '<td>';
                                        echo '<img src="banner/';
                                        echo $row13['image'];
                                        echo '" style="width:100px;">';
                                        echo '</td>';
                                        echo '<td><center>';
                                        echo '<button id="';
                                        echo $row13['id'];
                                        echo '" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onClick="getRemoveId(this.id)""><i class="fa fa-trash-o"></i></button>';
                                        echo '</center></td>';
                                      echo '</tr>';
                                   }
                                  
                                   $types="fullscholar";
                                  $sql14 = "SELECT * FROM tbl_scholar_image WHERE typescholar='$types'";
                                  $result14 = $conn->query($sql14);
                                  $row14 = $result14->fetch_assoc();

                                   $types1="recipient";
                                  $sql15 = "SELECT * FROM tbl_scholar_image WHERE typescholar='$types1'";
                                  $result15 = $conn->query($sql15);
                                  $row15 = $result15->fetch_assoc();

                                  $types2="shs";
                                  $sql16 = "SELECT * FROM tbl_scholar_image WHERE typescholar='$types2'";
                                  $result16 = $conn->query($sql16);
                                  $row16 = $result16->fetch_assoc();

                                  ?>
                                 
                               
                              </tbody>
                            </table>
                            
                          </div>
                       </div>
                      
                      
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                     
                      <!-- Content -->
                      <div class="col-md-12 ">
                        <br>
                      </div>
                      <div class="col-md-12 ">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#uploadBanner">Add Image</button>
                      </div>
                       <div class="col-md-12 ">
                          <div class="page-header">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Type of Scholarship</th>
                                  <th>Image</th>
                                  <th><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Full Scholarship</td>
                                  <td><img src="banner/<?php echo $row14['image']?>"></td>
                                  <td><center>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#uploadfullModal"><i class="fa fa-pencil"></i>
                                    </button>
                                  </center></td>
                                </tr>
                                <tr>
                                  <td>College Educational Assistance</td>
                                  <td><img src="banner/<?php echo $row15['image']?>"></td>
                                  <td><center>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#uploadRecipientModal"><i class="fa fa-pencil"></i>
                                    </button>
                                  </center></td>
                                </tr>
                                <tr>
                                  <td>Senior High Educational Assistance</td>
                                  <td><img src="banner/<?php echo $row16['image']?>"></td>
                                  <td><center>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#uploadSHSModal"><i class="fa fa-pencil"></i>
                                    </button>
                                  </center></td>
                                </tr>
                                  <?php
                                  // include 'config.php';
                                  //   $sql13 = "SELECT * FROM tbl_banner";
                                  // $result13 = $conn->query($sql13);
                                  // $count=0;
                                  //  while($row13 = $result13->fetch_assoc()){
                                  //   $count = $count+1;
                                  //     echo '<tr>';
                                  //      echo '<td>';
                                  //      echo $count;
                                  //      echo '</td>';
                                  //       echo '<td>';
                                  //       echo '<img src="banner/';
                                  //       echo $row13['image'];
                                  //       echo '" style="width:100px;">';
                                  //       echo '</td>';
                                  //       echo '<td><center>';
                                  //       echo '<button id="';
                                  //       echo $row13['id'];
                                  //       echo '" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onClick="getRemoveId(this.id)""><i class="fa fa-trash-o"></i></button>';
                                  //       echo '</center></td>';
                                  //     echo '</tr>';
                                  //  }
                                  

                                  ?>
                                 
                               
                              </tbody>
                            </table>
                            
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
    <!-- Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Press [Yes] if you want to remove this banner.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="removeUser()">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="uploadfullModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Image Full Scholar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="uploadFullScholarImage.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="uploadSHSModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Image Senior High Scholarship</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="uploadSHSScholarImage.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>
<div class="modal fade" id="uploadRecipientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Image College Recipient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="uploadRecipientImage.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
</div>
    <div class="modal fade" id="uploadBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Banner Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="uploadBannerImage.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-large">
                            </div>
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
      </div>
    </div>
  </div>
</form>
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