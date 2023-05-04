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
    var status="";

    function getRemoveId(id){
        ids = id;
        status="REMOVED";
        
    }
    function getPublishId(id){
        ids = id;
        status="PUBLISHED";
        
    }
    function removeUser(){
      window.open("removeActivity.php?id="+ids+"&status="+status,"_self");
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
                            <a class="nav-link" href="homepage.php">Banner</a>
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
                            <a class="nav-link   active" href="calendar.php">Calendar</a>
                          </li>
                        </ul>
                      </div>
                      <!-- Content -->
                      <div class="col-md-12 ">
                        <br>
                      </div>
                      <div class="col-md-12 ">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#AddOfficers">Add Activity</button>
                      </div>
                       <div class="col-md-12 ">
                        <br>
                       </div>
                       <div class="col-md-12 ">
                          <h5 class="page-title">Calendar of Activity</h5>
                       </div>
                        <div class="col-md-12 ">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th >Date</th>
                                  <th >Day</th>
                                  <th >Title</th>
                                  <th >Activity</th>
                                  <th ><center>Action<center></center></th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php
                            include 'config.php';
                            $left="LEFT";
                            $sql2 = "SELECT * FROM tbl_activity";
                            $result2 = $conn->query($sql2);
                            while($row2 = $result2->fetch_assoc())
                            {
                              echo '<tr>';
                              echo '<td >';
                              echo $row2['dates'];
                              echo '</td>';
                               echo '<td >';
                              echo $row2['dayname'];
                              echo '</td>';
                               echo '<td >';
                              echo $row2['title'];
                              echo '</td>';
                               echo '<td >';
                              echo $row2['description'];
                              echo '</td>';
                              echo '<td><center>';
                                          echo '<button id="';
                                        echo $row2['id'];
                                        echo '" class="btn btn-success" data-toggle="modal" data-target="#editActivity';
                                        echo $row2['id'];
                                        echo '"><i class="fa fa-pencil"></i></button>&nbsp';
                                    if($row2['status']=="PUBLISHED"){
                                      echo '<button id="';
                                        echo $row2['id'];
                                        echo '" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onClick="getRemoveId(this.id)"><i class="fa fa-trash-o"></i></button>';
                                        echo '</center></td>';
                                    }else{
                                      echo '<button id="';
                                        echo $row2['id'];
                                        echo '" class="btn btn-primary" data-toggle="modal" data-target="#publishModal" onClick="getPublishId(this.id)"><i class="fa fa-check"></i></button>';
                                        echo '</center></td>';
                                    }    

                                        
                              echo '</tr>';
                            }
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
        <h5 class="modal-title" id="exampleModalLabel">Remove Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Press [Yes] if you want to remove this activity.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="removeUser()">Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="publishModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publish Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Press [Yes] if you want to publish this activity.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="removeUser()">Yes</button>
      </div>
    </div>
  </div>
</div>


    <div class="modal fade" id="AddOfficers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addactivity.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                <label >Date</label>
                  <input type="date" name="date" class="form-control">
              </div>
          </div>
           <div class="col-md-8">
              <div class="form-group">
                <label >Title</label>
                  <input type="text" name="title" class="form-control">
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <label >Activity</label>
                   <input type="text" name="activity" class="form-control">
              </div>
          </div>
          

       
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</form>
</div>


<?php
 $sql3 = "SELECT * FROM tbl_activity";
$result3 = $conn->query($sql3);
while($row3 = $result3->fetch_assoc())
{
 echo '<div class="modal fade" id="editActivity';
 echo $row3['id'];
 echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="editactivity.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                <label >Date</label>
                <input type="hidden" name="actid" value="';
                echo $row3['id'];
                echo '">
                  <input type="date" name="editdate" class="form-control" value="';
                  echo $row3['dates'];
                  echo '">
              </div>
          </div>
           <div class="col-md-8">
              <div class="form-group">
                <label >Title</label>
                  <input type="text" name="edittitle" class="form-control" value="';
                  echo $row3['title'];
                  echo '">
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <label >Activity</label>
                   <input type="text" name="editactivity" class="form-control" value="';
                   echo $row3['description'];
                   echo '">
              </div>
          </div>
          

       
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
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