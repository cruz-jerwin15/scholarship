<?php session_start();
 if($_SESSION['usertype']!="superadmin"){
    header('Location:dashboards.php');
 }
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
                  <h4 class="page-title">New Applicant Requirements</h4>
                  
                </div>
              </div>
              
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Requirements</h4>
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Process</th>
                          <th>Documents</th>
                          <th>Remarks</th>
                          <th>Approved By</th>
                          <th>Date/Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $student_id=$_GET['id'];
                          
                               
        

        $sqlc = "SELECT * FROM  tbl_college_requirements_label WHERE user_id='$student_id'";
        $resultc = $conn->query($sqlc); 
      $count=1;
        if($resultc->num_rows>0){
            $rowc = $resultc->fetch_assoc();
                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
              
                if($rowc['birthcertificate']=="NOT APPLICABLE"){
                    echo "Birth Certificate - NOT APPLICABLE";
                }else if(($rowc['birthcertificate']=="")||($rowc['birthcertificate']==NULL)){
                    echo "Birth Certificate - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['birthcertificate'];
                    echo '" target="_blank">';
                    echo "Birth Certificate</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
            
                if($rowc['schoolclearance']=="NOT APPLICABLE"){
                    echo "Certificate of Good Moral - NOT APPLICABLE";
                }else if(($rowc['schoolclearance']=="")||($rowc['schoolclearance']==NULL)){
                    echo "Certificate of Good Moral - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['schoolclearance'];
                    echo '" target="_blank">';
                    echo "Certificate of Good Moral</a>";
                }
              echo '</td>';
                                echo '<td>';
                                echo "No Remarks";
                                echo '</td>';
                                


                                echo '<td>';
                                echo "Old system update";
                                echo '</td>';
                                echo '<td>';
                                echo "";
                                echo '</td>';
                                echo '</tr>'; 
            
                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
                if($rowc['gradereport']=="NOT APPLICABLE"){
                    echo "Grade Report - NOT APPLICABLE";
                }else if(($rowc['gradereport']=="")||($rowc['gradereport']==NULL)){
                    echo "Grade Report - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['gradereport'];
                    echo '" target="_blank">';
                    echo "Grade Report</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

            
                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
            
                if($rowc['housesketch']=="NOT APPLICABLE"){
                    echo "Vicinity Map/House Sketch - NOT APPLICABLE";
                }else if(($rowc['housesketch']=="")||($rowc['housesketch']==NULL)){
                    echo "Vicinity Map/House Sketch - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['housesketch'];
                    echo '" target="_blank">';
                    echo "Vicinity Map/House Sketch</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

            
                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
           
                if($rowc['barangayclearance']=="NOT APPLICABLE"){
                    echo "Barangay Clearance - NOT APPLICABLE";
                }else if(($rowc['barangayclearance']=="")||($rowc['barangayclearance']==NULL)){
                    echo "Barangay Clearance - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['barangayclearance'];
                    echo '" target="_blank">';
                    echo "Barangay Clearance</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
            
                if($rowc['parentvotersid']=="NOT APPLICABLE"){
                    echo "Parent Voters ID - NOT APPLICABLE";
                }else if(($rowc['parentvotersid']=="")||($rowc['parentvotersid']==NULL)){
                    echo "Parent Voters ID - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['parentvotersid'];
                    echo '" target="_blank">';
                    echo "Parent Voters ID</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
            

           
                if($rowc['parentvotersid']=="NOT APPLICABLE"){
                    echo "Parent Indigency - NOT APPLICABLE";
                }else if(($rowc['indigency']=="")||($rowc['indigency']==NULL)){
                    echo "Parent Indigency - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['indigency'];
                    echo '" target="_blank">';
                    echo "Parent Indigency</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

            
                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
           
                if($rowc['itr']=="NOT APPLICABLE"){
                    echo "Income Tax Return - NOT APPLICABLE";
                }else if(($rowc['itr']=="")||($rowc['itr']==NULL)){
                    echo "Income Tax Return - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['itr'];
                    echo '" target="_blank">';
                    echo "Income Tax Return</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';

           
                if($rowc['picture']=="NOT APPLICABLE"){
                    echo "2 x 2 Picture - NOT APPLICABLE";
                }else if(($rowc['picture']=="")||($rowc['picture']==NULL)){
                    echo "2 x 2 Picture - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['picture'];
                    echo '" target="_blank">';
                    echo "2 x 2 Picture</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td>';
                echo $count++;
                echo '</td>';
                 echo '<td>';
                echo "NEW REQUIREMENT";
                echo '</td>';
                echo '<td>';
           
                if($rowc['applicationform']=="NOT APPLICABLE"){
                    echo "Student Registration Form - NOT APPLICABLE";
                }else if(($rowc['applicationform']=="")||($rowc['applicationform']==NULL)){
                    echo "Student Registration Form - No documents uploaded";
                }else{
                    echo '<a href="requirements/';
                    echo $rowc['applicationform'];
                    echo '" target="_blank">';
                    echo "Student Registration Form</a>";
                }
                echo '</td>';
                echo '<td>';
                echo "No Remarks";
                echo '</td>';
                


                echo '<td>';
                echo "Old system update";
                echo '</td>';
                echo '<td>';
                echo "";
                echo '</td>';
                echo '</tr>'; 

            



        }else{
            echo "No documents uploaded";
        }
        

                               

                                      
                              
                          
                          
                        ?>
                        
                       
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

 <?php
require "config.php";
$status1="APPROVED";
$usertype1="admin";
$sql1 = "SELECT * FROM tbl_barangay ORDER BY barangay";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0){
    while($row1 = $result1->fetch_assoc()){

echo '<div class="modal fade" id="editUser';
echo $row1['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barangay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Start of form -->
      <form action="updateBarangay.php" method="POST">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <input type="hidden" name="barangayid" value="';
              echo $row1['id'];
              echo '">
               <input type="text" class="form-control" name="editbarangay" value="';
               echo $row1['barangay'];
               echo '" placeholder="Enter barangay" required>
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
</div>';

}
}
?>

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