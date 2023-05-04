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
                  <h4 class="page-title">Student Grade</h4>
                  
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
                         <table  class="table">
                           <thead>
                             <tr>
                               <th>#</th>
                               <th>Academic Year/School Year</th>
                               <th>Semester</th>
                               <th>Action</th>
                             </tr>
                           </thead>
                           <tbody>
                            <?php
                            $statusopen="OPEN";
                              $sql6 = "SELECT * FROM tbl_addgrades";
                              $result6 = $conn->query($sql6);
                              $count=1;
                                 while($row6 = $result6->fetch_assoc()){
                                    echo '<tr>';
                                     echo '<th>';
                                     echo $count;
                                     echo '</th>';
                                     echo '<th>';
                                     echo $row6['year'];
                                     echo '</th>';
                                     echo '<th>';
                                     echo $row6['semester'];
                                     echo '</th>';
                                     $users = $_SESSION['userid'];
                                     $semid = $row6['id'];
                                     
                                  
                                        $sql7="SELECT * from tbl_uploadedgrade where user_id='$users' AND semid='$semid'";
                                        $result7 = $conn->query($sql7);
                                        if ($result7->num_rows < 1){
                                           if($row6['status']=="OPEN"){
                                            echo '<th><button class="btn btn-primary" data-toggle="modal" data-target="#UploadModal';
                                              echo $row6['id'];
                                              echo '">Upload</button></th>';
                                          }else{
                                             echo '<th><button class="btn btn-danger" disabled>Closed</button></th>';
                                          }
                                        }else{
                                              echo '<th><button class="btn btn-success" disabled>Uploaded</button></th>';

                                        }

                                        

                                      // }
                                        echo '</tr>';
                                     
                                        $count=$count+1;
                                    
                                 }
                              

                            ?>
                            
                            
                           </tbody>
                         </table>
                      </div>
                      <div class="col-md-12">
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

<?php
include 'config.php';
  $statusopen="OPEN";
  $sql15 = "SELECT * FROM tbl_addgrades";
  $result15 = $conn->query($sql15);
    while($row15 = $result15->fetch_assoc()){
  $_SESSION['officer']=$row15;
 echo '<div class="modal fade" id="UploadModal';
echo $row15['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Scanned Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="uploadGrade.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
              <input type="hidden" name="ids" value="';
              echo $row15['id'];
              echo '">
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
</div>';
}
?>

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