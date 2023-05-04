<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['studenttype']="collegerecipient";

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
      function getUsersApprove(users){
        var user = users;
        document.getElementById('interview').value=user;
      }
      function getAssessment(){
        window.open("collegeRecipientReport.php","_blank");
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
                  <h4 class="page-title"> For Assessment > College Recipient </h4>
                  
                </div>
              </div>
            </div>
              <div class="col-md-12">
                <div class="page-header-toolbar">
                   <button type="button" class="btn btn-primary btn-fw" onClick="getAssessment()">Download Assessment Report</button>
                  &nbsp
                   <!-- <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#uploadEducational">Educational Info</button>
                  &nbsp
                  <button type="button" class="btn btn-info btn-fw" data-toggle="modal" data-target="#uploadFamily">Upload Family Info</button>
                   &nbsp
                  <button type="button" class="btn btn-warning btn-fw" data-toggle="modal" data-target="#uploadRequirements">Upload Requirements</button>
                   &nbsp
                  <button type="button" class="btn btn-dark btn-fw" data-toggle="modal" data-target="#uploadSiblings">Upload Siblings</button> -->
                </div>
              </div>
              <div class="col-md-12"><hr></div>
               <form  action="getCommitteeAssessment.php" method="post">
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
                      <?php
                        $status="ASSESSMENT";
                          $user ="college";
                           $scholar ="collegerecipient";
                         $sql15 = "SELECT COUNT(*) as college FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar'";
                            $result15 = $conn->query($sql15);
                            $row15 = $result15->fetch_assoc();
                            echo  '<h4 class="card-title"> List of College Recipient for Assessment (Total Numbers: ';
                            echo $row15['college'];
                            echo ' recipients)</h4>';
                      ?>
                     
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Email</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Score</th>
                          <th><center>Action</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require "config.php";
                           $status="ASSESSMENT";
                          $user ="college";
                          $scholar ="collegerecipient";
                          $usertype="admin";
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
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id ASC ";
                            }else{
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id DESC  ";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="FIRST NAME"){
                            if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname ASC  ";
                            }else{
                               $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname DESC  ";
                            }
                            
                             $result = $conn->query($sql);
                          }else if( $filter=="LAST NAME"){
                             if($order=="ASC"){
                                  $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname ASC  ";
                             }else{
                                  $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname DESC  ";
                             }
                           
                             $result = $conn->query($sql);
                          }else if( $filter=="EMAIL"){
                             if($order=="ASC"){
                               $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username ASC  ";
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
                                $academic_year=$row['academic_year'];
                                $application_no=$row['application_no'];

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


                                echo '<form action="addScore.php" method="POST">';
                                 echo '<td>';
                                 echo '<input type="hidden" value="';
                                 echo $academic_year;
                                 echo '" name="acad"/>';
                                  echo '<input type="hidden" value="';
                                 echo $application_no;
                                 echo '" name="application"/>';

                                 $users=$_SESSION['username'];
                                 $sqlb = "SELECT * FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no' AND committee_id='$users'";
                                 $scores=0;
                                 $resultb = $conn->query($sqlb);
                                 if ($resultb->num_rows <= 0){
                                    $scores=0;
                                 }else{
                                    $rowb = $resultb->fetch_assoc();
                                    $scores=$rowb['score'];
                                 }
                               
                                  echo '<input type="number" min=1 max=10 class="form-control" name="score" value="';
                                  echo $scores;
                                  echo '"/>';
                                echo '</td>'; 
                                echo '<td><center>';
                              

                                    echo '<button type="submit" class="btn btn-icons btn-rounded btn-primary">
                                  <i class="fa fa-check"></i>';
                                   echo '</button>';
                                    echo '&nbsp';
                                    echo '</form>';

 // echo '<button id="';
 //      echo $row['id'];
 //      echo '" type="button" class="btn btn-icons btn-rounded btn-danger" data-toggle="modal" data-target="#modalRemove';
 //       echo $row['id'];
 //      echo '" onClick="getUsers(this.id)">
 //        <i class="fa fa-trash-o"></i>';
 //      echo '</button>';
 //          echo '&nbsp';  
 //     echo '<button id="';
 //    echo $row['id'];
 //      echo '" type="button" class="btn btn-icons btn-rounded btn-dark" data-toggle="modal" data-target="#modalApprove';
 //      echo $row['id'];
 //      echo '" onClick="getUsersApprove(this.id)">
 //        <i class="fa fa-check"></i>';
 //      echo '</button>';


  

                              


                               
                                // echo '&nbsp';
                                //    echo '<button id="';
                                // echo $row['id'];
                                // echo '" type="button" class="btn btn-icons btn-rounded btn-danger" onClick="getRemoveId(this.id)" data-toggle="modal" data-target="#removeModal">
                                //   <i class="fa fa-trash-o"></i>';
                                //   echo '</button>';
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
                                   echo '<form  action="committeeAssessmentPagination.php" method="POST">';
                                   echo '<input type="hidden" name="page" value="';
                                   echo  $x;
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
                              echo '<form  action="committeeAssessmentPagination.php" method="POST">';
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


    <!-- Modal -->
<div class="modal fade" id="uploadStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload College Recipient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="uploadNewCollegeRecipient.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
        <a href="files/new_college_recipient_info.csv" class="btn btn-secondary" download>Download Format</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Import" >Upload</button>
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
      <form class="form-horizontal" action="uploadNewCollegeRecipientSiblings.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
        <a href="files/new_collegerecipient_siblings_info.csv" class="btn btn-secondary" download>Download Format</a>
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
      <form class="form-horizontal" action="uploadNewCollegeEducational.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
        <a href="files/new_college_recipient_educational_info.csv" class="btn btn-secondary" download>Download Format</a>
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
      <form class="form-horizontal" action="uploadNewCollegeFamily.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
        <a href="files/new_college_recipient_family_info.csv" class="btn btn-secondary" download>Download Format</a>
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
      <form class="form-horizontal" action="uploadNewCollegeRequirements.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
        <a href="files/new_college_requirements.csv" class="btn btn-secondary" download>Download Format</a>
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


 <div class="modal fade" id="updateGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updaterequirement.php" method="post">
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
          <div class="col-md-6">
              <div class="form-group">
                <label ><span class="badge badge-danger"><i class="fa fa-times"></i></span>&nbspStudent Registration</label>
                  <select name="studentregistration" class="form-control">
                    <option value="0">Not Yet Submitted</option><option value="1">Submitted</option>
                  </select>
              </div>
          </div>
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
 $sqlc = "SELECT * FROM tbl_admin";
    $resultc = $conn->query($sqlc);
    while($rowc = $resultc->fetch_assoc()){
echo '<div class="modal fade" id="modalRemove';
echo $rowc['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="removeAssessmentRecipient.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">You cannot undo this action after you press [Remove] button.</span>
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
        <input type="submit" class="btn btn-primary" value="Remove">
      </div>
    </div>
  </form>
  </div>
</div>';
}
?>

<?php
 $sqld = "SELECT * FROM tbl_admin";
  $resultd = $conn->query($sqld);
  while($rowd = $resultd->fetch_assoc()){    
echo '<div class="modal fade" id="modalApprove';
echo $rowd['id'];
echo '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="approveAssessment.php" method="post">
      <div class="modal-body">
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This applicant already assessed and pass as scholar.</span>
            </p>
         </div>
         
        
         <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" value="';
               echo $rowd['id'];
               echo '">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Approve">
      </div>
    </div>
  </form>
  </div>
</div>';
}
?>




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