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
                  <h4 class="page-title">Profile</h4>
                  
                </div>
              </div>
             
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <form action="updateinfo.php" method="POST">
                     <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" value="<?php echo $_SESSION['firstname']; ?>" required>
                        </div>
                         
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" value="<?php echo $_SESSION['lastname']; ?>" required>
                        </div>
                         
                      </div>
                      <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2">  
                      </div>
                       <div class="col-sm-2">  
                      </div>
                       <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2" style="align-items: right">  
                        <input type="submit" class="btn btn-primary" value="Update">
                      </div>
                     
                      
                    </div>
                  </form>
                  </div>
                </div>
              </div>
           <!--  </div> -->
            
           
            <!-- Password -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <form action="changepassword.php" method="POST">
                     <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                           <input type="password" class="form-control" name="oldpassword" placeholder="Enter Old Password" required>
                        </div>
                         
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password" required>
                        </div>
                         
                      </div>
                      <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2">  
                      </div>
                       <div class="col-sm-2">  
                      </div>
                       <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2" style="align-items: right">  
                        <input type="submit" class="btn btn-primary" value="Update">
                      </div>
                     
                      
                    </div>
                  </form>
                  </div>
                </div>
              </div>


              <!-- Profile Picture -->
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profile Photo</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                  
                     <div class="row">
                      <div class="col-sm-6">
                         <form action="uploadadminphoto.php" method="post" enctype="multipart/form-data">
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

                                      
                                    
                                     
                                    
                                   </div>
                                </div>
                               
                               
                             
                         
                      </div>
                     
                      <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2">  
                      </div>
                       <div class="col-sm-2">  
                      </div>
                       <div class="col-sm-2">  
                      </div>
                      <div class="col-sm-2" style="align-items: right">  
                        <input type="submit" class="btn btn-primary" value="Update">
                      </div>
                     
                      
                    </div>
                  </form>
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