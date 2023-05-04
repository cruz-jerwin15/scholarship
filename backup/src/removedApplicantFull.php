<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['studenttype']="fullscholar";

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
        window.open("updateNewStudent.php?id="+id,"_blank");
      }
       function getViewId(id){
        window.open("viewNewStudent.php?id="+id,"_blank");
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
                  <h4 class="page-title">Removed Applicant/Scholars > College Full Scholarship </h4>
                  
                </div>
              </div>
            </div>
              <div class="row">
            
             <!--  <div class="col-md-4 ">
                <div class="page-header-toolbar text-right">
                 <button type="button" class="btn btn-danger btn-fw" data-toggle="modal" data-target="#addSingleStudent"><span class="fa fa-plus"></span> Add Single Student</button>
               </div>
              </div> -->
            </div>
              <div class="col-md-12"><hr></div>
               <form  action="getRemoveSearch.php" method="post">
              <div class="col-md-12">
                <!-- <div class="page-header-toolbar"> -->
                  <div class="row">
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="searchshs">Search</label>
                            <div class="input-group">
                              <input type="text" name="searchshs" id="searchshs" class="form-control" placeholder="Search here" value="<?php echo $_SESSION['whatsearch']; ?>">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                          <label for="housenumber">Filter</label>
                            <div class="input-group">
                              <select name="filter" id="filter" class="form-control">
                                <?php
                                  echo '<option value="';
                                  echo $_SESSION['search'];
                                  echo '">';
                                   echo $_SESSION['search'];
                                  echo '</option>';
                                ?>
                                
                                <option value="ALL">ALL</option>
                                 <option value="EMAIL">EMAIL</option>
                                <option value="LAST NAME">LAST NAME</option>
                                <option value="FIRST NAME">FIRST NAME</option>
                              </select>
                            </div>
                          </div>
                    </div>
                     <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">Order</label>
                            <div class="input-group">
                              <select name="order" id="order" class="form-control">
                                 <?php
                                  echo '<option value="';
                                  echo $_SESSION['order'];
                                  echo '">';
                                  if($_SESSION['order']=="ASC"){
                                    echo 'ASCENDING';
                                  }else{
                                    echo 'DESCENDING';
                                  }
                                  echo '</option>';
                                ?>
                                <option value="ASC">ASCENDING</option>
                                <option value="DESC">DESCENDNG</option>
                              </select>
                            </div>
                          </div>
                     </div>
                      <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">Results per Line</label>
                            <div class="input-group">
                              <select name="limit" id="limit" class="form-control">
                                <?php
                                  echo '<option value="';
                                  echo $_SESSION['limit'];
                                  echo '">';
                                   echo $_SESSION['limit'];
                                  echo '</option>';
                                ?>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                              </select>
                            </div>
                          </div>
                     </div>
                     <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                          </label>
                            <button type="submit" class="btn btn-success btn-fw">Click to Search</button>
                          </div>
                     </div>
                   
                  </div>
                 </form>
                <!-- </div> -->
              </div>
            <!-- </div> -->
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                     
                            <h4 class="card-title"> List of Removed College Full Scholarship</h4>
                      
                     
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Email</th>
                          
                          <th>Name</th>
                          <th>Address</th>
                          <th><center>Action</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                          $status="REMOVED";
                          $user ="college";
                          $scholar ="fullscholar";
                          $usertype="college";
                          $filter =$_SESSION['search'];
                          $whatsearch=$_SESSION['whatsearch'];
                          $order=$_SESSION['order'];
                          $limit=$_SESSION['limit'];
                          // if($_SESSION['offset']<=1){
                          //   $off=$_SESSION['offset'];
                          // }else{
                            $off=$_SESSION['offset']-1;
                          // }
                         
                        
                        
                          if( $filter=="ALL"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id ASC  ";
                            }else{
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id DESC  ";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="FIRST NAME"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname ASC ";
                            }else{
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname DESC ";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="LAST NAME"){
                             if($order=="ASC"){
                                  $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname ASC ";
                             }else{
                                  $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname DESC ";
                             }
                           
                             $result = $conn->query($sql);
                          }else if( $filter=="EMAIL"){
                             if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username ASC ";
                             }else{
                               $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username DESC ";
                             }
                            
                             $result = $conn->query($sql);
                          }
                         
                          if ($result->num_rows > 0){
                            $counter=1;
                            $paging=$_SESSION['offset']*$_SESSION['limit'];
                            $newstart=$paging-$_SESSION['limit'];

                              while($row = $result->fetch_assoc()){
                                if(($counter>$newstart)&&($counter<=$paging)){
                                $academic_year = $row['academic_year'];
                                $application_no =$row['application_no'];

                                  $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
                                  $result1 = $conn->query($sql1);
                                  $row1 = $result1->fetch_assoc();
                                echo '<tr>';
                                echo '<td>';
                                echo $row['username'];
                                echo '</td>';
                                echo '<td>';
                                echo $row1['firstname'].' '.$row1['middlename'].' '.$row1['lastname'];
                                echo '</td>';
                                echo '<td>';
                                echo $row1['housenumber'].' '.$row1['street'].' '.$row1['barangay'];
                                echo '</td>'; 
                                echo '<td><center>';
                              
                               

                                     
                                 echo '<button id="';
                                echo $row['id'];
                                echo '" type="button" class="btn btn-icons btn-rounded " data-toggle="modal" data-target="#modalRemove';
                                 echo $row['id'];
                                echo '" style="background-color:#597ef7;">
                                  <i style="color:#ffffff;" class="fa fa-refresh"></i>';
                                   echo '</button>';
                                    echo '&nbsp';

                             
                                echo '</center></td>';
                                echo '</tr>'; 
                                }
                                $counter=$counter+1;         
                              }
                          }else{

                          }
                          
                        ?>
                        
                      
                      </tbody>
                    </table>
                    <div class="col-md-12">

                        <div class="row">
                          
                          <?php

                            $sql13 = "SELECT COUNT(*) as college FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar'";
                            $result13 = $conn->query($sql13);
                            $row13 = $result13->fetch_assoc();
                            $divlimit = $_SESSION['limit'];
                            $number = $row13['college'];
                            $x=1;
                            if($number>$divlimit){
                                $btn_number = ceil($number/$divlimit);
                                $pages = 1;
                                for($x=1;$x<=$btn_number;$x++){
                                   // for($x=1;$x<=50;$x++){
                                   echo '<form  action="removedPagination.php" method="POST">';
                                   echo '<input type="hidden" name="page" value="';
                                   echo $x;
                                   echo '">';
                                   if($x==$_SESSION['offset']){
                                   
                                      echo ' <button type="submit" class="btn btn-light" style="width:50px;">';
                                      echo $x;
                                      echo '</button>&nbsp';
                                      echo '<br>';
                                 
                                      
                                   }else{
                                    
                                      echo ' <button type="submit" class="btn btn-dark" style="width:50px;">';
                                      echo $x;
                                      echo '</button>&nbsp';
                                      echo '<br>';
                                    
                                   }
                                 
                                  echo '</form>';
                                
                                  $pages = $pages+$divlimit;
                                }
                               
                            }else{
                              echo '<form  action="removedPagination.php" method="POST">';
                                   echo '<input type="hidden" name="page" value="';
                                   echo  '1';
                                   echo '">';
                                      echo ' <button type="submit" class="btn btn-light" style="width:50px;">';
                                      echo '1';
                                      echo '</button>&nbsp';
                                      echo '<br>';
                              echo '</form>'; 
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

<?php
 $sqlc = "SELECT * FROM tbl_admin";
    $resultc = $conn->query($sqlc);
    while($rowc = $resultc->fetch_assoc()){
echo '<div class="modal fade" id="modalRemove';
echo $rowc['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retrieve Student Information </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="retrieveScholar.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">Retrieved student information will start as new applicant.</span>
            </p>
         </div>
       
         <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" value="';
               echo $rowc['id'];
               echo '">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Retrieve">
      </div>
    </div>
  </form>
  </div>
</div>';
}
?>
 
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


 <div class="modal fade" id="updateGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateRequirementFull.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <input type="hidden" name="userid" id="userid">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspApplication Form</label>
                  <select name="applicationform" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspBirth Certificate</label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
           <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspGrade Report</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspSchool Clearance</label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
           <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspParent Voters ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
        <!--   <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspStudent Registration</label>
                  <select name="studentregistration" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div> -->
          <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspHouse Sketch</label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
           <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspBarangay Clearance</label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspPicture</label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
           <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspI.T.R.</label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
           <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspExam</label>
                  <select name="exam" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
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
</div>
<?php
$sqlb = "SELECT * FROM tbl_college_requirements";
  $resultb = $conn->query($sqlb);
  while($rowb = $resultb->fetch_assoc()){
    $users=$rowb['user_id'];
    $sqld = "SELECT * FROM tbl_college_requirements_label WHERE user_id='$users'";
    $resultd = $conn->query($sqld);
    $rowd = $resultd->fetch_assoc();
      $application_label=$rowd['applicationform'];
          $birthcertificate_label=$rowd['birthcertificate'];
          $gradereport_label=$rowd['gradereport'];
          $schoolclearance_label=$rowd['schoolclearance'];
          $parentvotersid_label=$rowd['parentvotersid'];
         
          $housesketch_label=$rowd['housesketch'];
          $barangayclearance_label=$rowd['barangayclearance'];
          $picture_label=$rowd['picture'];
          $itr_label=$rowd['itr'];

echo '<div class="modal fade" id="updateGrades';
echo $rowb['user_id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateRequirementsCollege.php" method="post">
      <div class="modal-body">
        <div class="row">';
          echo '<div class="col-md-6">
              <div class="form-group">
                <input type="hidden" name="userid" id="updateuserid" value="';
                echo $rowb['user_id'];
                echo '">';
                
          //       if($rowb['applicationform']==0){
          //          echo '<label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspApplication Form</label>';
          //           echo '<select name="applicationform" class="form-control">
          //           <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
          //         </select>';
          //       }else{
          //            echo '<label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbspApplication Form</label>';
          //            echo '<select name="applicationform" class="form-control">
          //           <option value="0">Not Yet Submitted</option><option value="1" selected>Submitted</option>
          //         </select>';
          //       }
               

                
              echo '</div>
          </div>';
            echo '<div class="col-md-6">
              <div class="form-group">';
              echo '</div>';
            echo '</div>';
          echo '<div class="col-md-6">
              <div class="form-group">';
              if($rowb['birthcertificate']==0){
                   echo ' <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Birth Certificate</label>';
                  
                  echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>

                  </select>';
                }else  if($rowb['birthcertificate']==2){
                     echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Birth Certificate &nbsp';
                      echo '<a href="requirements/';
                   echo $birthcertificate_label;
                   echo '" target="_blank">View</a></label>
                  <select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                  echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Birth Certificate &nbsp; <a target="_blank" href="requirements/';
                   echo $birthcertificate_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="birthcertificate" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
               
              echo '</div>
          </div>';

           echo '<div class="col-md-6">
              <div class="form-group">';
              if($rowb['gradereport']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Grade Report</label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['gradereport']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Grade Report&nbsp';
                      echo '<a href="requirements/';
                   echo $gradereport_label;
                   echo '" target="_blank">View</a></label>
                  <select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Grade Report &nbsp; <a target="_blank" href="requirements/';
                   echo $gradereport_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="gradereport" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
               
              echo '</div>
          </div>
          <div class="col-md-6">
              <div class="form-group">';
              if($rowb['schoolclearance']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp School Clearance</label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['schoolclearance']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp School Clearance&nbsp';
                      echo '<a href="requirements/';
                   echo $schoolclearance_label;
                   echo '" target="_blank">View</a></label>
                  <select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp School Clearance &nbsp; <a target="_blank" href="requirements/';
                   echo $schoolclearance_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="schoolclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
               
              echo '</div>
          </div>
           <div class="col-md-6">
              <div class="form-group">';
                if($rowb['parentvotersid']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Parent Voter"s ID</label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['parentvotersid']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Parent Voter"s ID&nbsp';
                      echo '<a href="requirements/';
                   echo $parentvotersid_label;
                   echo '" target="_blank">View</a></label>
                  <select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Parent Voter"s ID &nbsp; <a target="_blank" href="requirements/';
                   echo $parentvotersid_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="parentvotersid" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
               
              echo '</div>
          </div>
          
          <div class="col-md-6">
              <div class="form-group">';
                if($rowb['housesketch']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp House Sketch </label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['housesketch']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp House Sketch &nbsp';
                      echo '<a href="requirements/';
                   echo $housesketch_label;
                   echo '" target="_blank">View</a></label>
                  <select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp House Sketch&nbsp; <a target="_blank" href="requirements/';
                   echo $housesketch_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="housesketch" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
                
              echo '</div>
          </div>
           <div class="col-md-6">
              <div class="form-group">';
               if($rowb['barangayclearance']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Barangay Clearance </label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['barangayclearance']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Barangay Clearance &nbsp';
                      echo '<a href="requirements/';
                   echo $barangayclearance_label;
                   echo '" target="_blank">View</a></label>
                  <select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Barangay Clearance&nbsp; <a target="_blank" href="requirements/';
                   echo $barangayclearance_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="barangayclearance" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
               
              echo '</div>
          </div>
          <div class="col-md-6">
              <div class="form-group">';
             if($rowb['picture']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp 1x1 Picture </label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['picture']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp 1x1 Picture &nbsp';
                      echo '<a href="requirements/';
                   echo $picture_label;
                   echo '" target="_blank">View</a></label>
                  <select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp 1x1 Picture&nbsp; <a target="_blank" href="requirements/';
                   echo $picture_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="picture" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
                
              echo '</div>
          </div>
           <div class="col-md-6">
              <div class="form-group">';
               if($rowb['itr']==0){
                   echo '  <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbsp Income Tax Return </label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2">Submitted</option>
                    <option value="1">Approved</option>
                  </select>';
                }else if($rowb['itr']==2){
                  echo ' <label ><span class="badge badge-primary"><i class="fas fa-share"></i></span>&nbsp Income Tax Return &nbsp';
                      echo '<a href="requirements/';
                   echo $itr_label;
                   echo '" target="_blank">View</a></label>
                  <select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="2" selected>Submitted</option>
                     <option value="1">Approved</option>
                  </select>';
                }else{
                    echo ' <label ><span class="badge badge-success"><i class="fa fa-check"></i></span>&nbsp Income Tax Return&nbsp; <a target="_blank" href="requirements/';
                   echo $itr_label;
                   echo '">View</a></label>';
                   

                  echo '<select name="itr" class="form-control">
                    <option value="0">Not Yet Submitted</option>
                    <option value="1" selected>Approved</option>
                    <option value="2">Submitted</option>
                  </select>';
                }
              
              echo '</div>
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

          <!-- Modal -->
<div class="modal fade" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send for Interview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="approveFullScholar.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This applicant complete his/her requirements and ready for interview.</span>
            </p>
         </div>
       
         <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" id="users">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="For Interview">
      </div>
    </div>
  </form>
  </div>
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
                   <div class="col-md-12">
                    <input type="hidden" name="usertype" value="fullscholar">
                    <div class="form-group">
                      <label >Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="true">
                    </div>
                  </div>
                 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Academic Year</label>
                        <input type="text" name="academic_year" class="form-control" placeholder="Academic Year (e.g. 2019-2020)" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Control Number</label>
                        <input type="text" name="control_number" class="form-control" placeholder="Control number" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First name" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Middle Name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name" required="true">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name" required="true">
                    </div>
                  </div>
                  <!--  <div class="col-md-12">
                    <div class="form-group">
                      <label >Birtday</label>
                        <input type="date" name="birthday" class="form-control" placeholder="2019-10-01" required="true">
                    </div>
                  </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label >Birth Place</label>
                        <input type="text" name="birthplace" class="form-control" placeholder="Birthplace" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Birth Order</label>
                        <select name="birthorder" class="form-control">
                            <option value="ELDEST">Eldest</option>
                            <option value="MIDDLE">Middle</option>
                            <option value="YOUNGEST">Youngest</option>
                            <option value="ONLY CHLD">Only Child</option>
                           
                        </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Civil Status</label>
                        <select name="civil" class="form-control">
                            <option value="SINGLE">Single</option>
                            <option value="MARRIED">Married</option>
                            <option value="SINGLE PARENT">Single Parent</option>
                        </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Gender</label>
                        <select name="gender" class="form-control">
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                        </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Citizenship</label>
                        <input type="text" name="citizen" class="form-control" placeholder="Citizenship" required="true">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Religion</label>
                        <input type="text" name="religion" class="form-control" placeholder="Religion" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >House Number</label>
                        <input type="text" name="housenumber" class="form-control" placeholder="House Number" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Street</label>
                        <input type="text" name="street" class="form-control" placeholder="Street" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Barangay</label>
                        <input type="text" name="barangay" class="form-control" placeholder="Barangay" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Year(s) of Residency in Sto.Tomas</label>
                        <input type="number" name="years_residency" class="form-control" placeholder="Years of Residency" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control" placeholder="Contact Number" required="true">
                    </div>
                  </div> 
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Course Intended to Take</label>
                        <input type="text" name="course" class="form-control" placeholder="Course" required="true">
                    </div>
                  </div>  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Year</label>
                        <select name="years" class="form-control">
                            <option value="1ST">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3RD">3rd</option>
                            <option value="4TH">4th</option>
                            <option value="5TH">5th</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >School Intended To Enrol</label>
                        <input type="text" name="school" class="form-control" placeholder="School Name" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >School Type</label>
                        <select name="schooltype" class="form-control">
                            <option value="PRIVATE">Private</option>
                            <option value="STATE">State University</option>
                        </select>
                    </div>
                  </div>  
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >School Address</label>
                        <input type="text" name="school_address" class="form-control" placeholder="School Address" required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >Last School Attended</label>
                        <input type="text" name="last_school_attended" class="form-control" placeholder="School Address" required="true">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                       <label >Last School Attended Address</label>
                        <input type="text" name="last_school_address" class="form-control" placeholder="School Address" required="true">
                    </div>
                  </div> 
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >General Weighted Average</label>
                        <input type="text" name="gwa" class="form-control" placeholder="G.W.A." required="true">
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label >Exam Rating</label>
                        <input type="text" name="exam_rating" class="form-control" placeholder="Exam Rating" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Living With family</label>
                        <select name="living_with_family" class="form-control">
                            <option value="YES">Yes</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label >Total Number of Family</label>
                        <input type="number" name="total_number_family" class="form-control" placeholder="Total Number of Family" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label >Source of Living</label>
                        <input type="text" name="source_of_living" class="form-control" placeholder="Source of Living" required="true">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >House</label>
                        <select name="house" class="form-control">
                            <option value="OWNED BY FAMILY">Owned by Family</option>
                            <option value="OWNED BY RELATIVES">Owned by Relatives</option>
                            <option value="RENTING">Renting</option>
                            <option value="PAYING-TO-OWN">Paying-to-own</option>
                        </select>
                    </div>
                  </div> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>How much paying monthly (If renting or paying-to-own)</label>
                       <input type="text" name="pay_monthly" class="form-control" placeholder="How much paying monthly">  
                    </div>
                  </div>   -->           
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