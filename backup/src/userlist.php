<?php session_start();

if($_SESSION['notif']=="0"){
    echo '<script language="javascript">';
    echo 'alert("Email address is already existing")';
    echo '</script>';
    $_SESSION['notif']="NULL";
}else if($_SESSION['notif']=="1"){
    echo '<script language="javascript">';
    echo 'alert("Successfully add new user")';
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
                  <h4 class="page-title">User/List of User</h4>
                  
                </div>
              </div>
              <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#addUser">
                  <i class="mdi mdi-plus"></i>Add User
                </button>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of Users</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Email</th>
                          <th>Usertype</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Date Created</th> 
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $status="APPROVED";
                          $usertype="admin";
                          $usertype1="committee";
                          $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND (usertype='$usertype' OR usertype='$usertype1') ";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>';
                                echo $row['username'];
                                echo '</td>';
                                 echo '<td>';
                                echo $row['usertype'];
                                echo '</td>';
                                echo '<td>';
                                echo $row['firstname'];
                                echo '</td>';
                                echo '<td>';
                                echo $row['lastname'];
                                echo '</td>';   
                                echo '<td>';
                                echo $row['dates'];    
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
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="adduser.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
               <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
             
          </div>
          <div class="col-sm-12">
            <div class="form-group row">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
              
          </div>
           <div class="col-sm-12">
            <div class="form-group row">
              <select class="form-control" name="usertype" required>
                <option value="admin">Admin</option>
                <option value="committee">Committee</option>
              </select>
            </div>
              
          </div>
          <div class="col-sm-12">
            <div class="form-group row">
              <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
            </div>
              
          </div>
          <div class="col-sm-12">
            <div class="form-group row">
              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
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