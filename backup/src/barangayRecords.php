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
        window.open("viewNewStudentInterview.php?id="+id,"_blank");
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
      function viewReport(){
        window.open("barangayReport.php","_blank");
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
                  <h4 class="page-title"> Reports > Barangay </h4>
                  
                </div>
              </div>
            </div>
             <!-- <div class="col-md-12">
                <div class="page-header-toolbar">
                   <button type="button" class="btn btn-primary btn-fw" onClick="getAssessment()">View Report</button>
                  &nbsp
 </div>
              </div> -->
              <div class="col-md-12"><hr></div>
               <form  action="getSearchFilterBarangayReport.php" method="post">
              <div class="col-md-12">
                <!-- <div class="page-header-toolbar"> -->
                  <div class="row">
                    <div class="col-md-2">
                       <div class="form-group">
                          <label for="searchshs">Search</label>
                            <div class="input-group">
                              <input type="text" name="searchshs" id="searchshs" class="form-control" placeholder="Search here" value="<?php echo $_SESSION['whatsearch']; ?>">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4">
                       <div class="form-group">
                          <label for="housenumber">Filter</label>
                            <div class="input-group">
                              <select name="filter" id="filter" class="form-control">
                                <?php
                                  echo '<option value="';
                                  echo $_SESSION['search'];
                                  echo '">';
                                  if($_SESSION['search']=="OK"){
                                    echo "CURRENT SCHOLARS";
                                  }else if($_SESSION['search']=="GRADUATED"){
                                    echo "GRADUATE SCHOLARS";
                                  }else if($_SESSION['search']=="SHS"){
                                    echo "SENIOR HIGH";
                                  }else{
                                    echo $_SESSION['search'];
                                  } 
                                   
                                  
                                  echo '</option>';
                                ?>
                                
                                <option value="ALL">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALL</option>
                                <option disabled="">--BATCH--</option>
                                 <option value="ACADEMIC YEAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACADEMIC YEAR</option>
                                 <option disabled="">--STATUS--</option>
                                  <option value="OK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CURRENT SCHOLARS</option>
                                   <option value="GRADUATED">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRADUATE SCHOLARS</option>
                                   
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
                     <div class="col-md-2">
                      <div class="form-group">
                          <label for="housenumber">
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp
                            
                          </label>
                            <button type="button" class="btn btn-primary btn-fw" onClick="viewReport()"><i class="fa fa-print"></i></button>
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
                      
                     
                    <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                   
                        <?php
                          require "config.php";
                          $status="OK";
                          $status1="GRADUATED";
                          $user ="college";
                          $scholar ="collegerecipient";
                          $usertype="superadmin";
                          $usertype1="admin";
                          $filter =$_SESSION['search'];
                          $whatsearch=$_SESSION['whatsearch'];
                          $order=$_SESSION['order'];
                          $limit=$_SESSION['limit'];
                          // if($_SESSION['offset']<=1){
                          //   $off=$_SESSION['offset'];
                          // }else{
                            $off=$_SESSION['offset']-1;
                          // }
              //             echo '<script language="javascript">';
              // echo 'alert("';
              // echo $filter;
              // echo '")';
              // echo '</script>';
                        
          // scholarsReport   
          if( $filter=="ALL"){
            if($order=="ASC"){
                      $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay ASC";
              }else{
                  $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay DESC";
              }
            $result = $conn->query($sql);
            echo ' <table class="table">
                      <thead>
                        <tr>
                          <th>Barangay</th>
                          <th>SHS Scholars</th>
                          <th>College Recipient</th>
                          <th>College Full Scholars</th>
                          <th>Total Scholars</th>
                         
                        </tr>
                      </thead>
                      <tbody>';
            while($row = $result->fetch_assoc()){
              $barangay=$row['barangay'];
               echo '<tr>';
                echo '<td>';
                echo $barangay;
                echo '</td>';
                $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="shscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_shscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_shscholar=$count_shscholar+1;
                    }

                 }
                 echo '<td>';
                echo $count_shscholar;
                echo '</td>';
                 $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="collegerecipient";
                $status="OK";
                $status1="GRADUATED";
                $count_recipient=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_recipient=$count_recipient+1;
                    }

                 }
                 echo '<td>';
                echo $count_recipient;
                echo '</td>';
                   $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="fullscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_fullscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_fullscholar=$count_fullscholar+1;
                    }

                 }
                 echo '<td>';
                echo $count_fullscholar;
                echo '</td>';
                echo '<td>';
                $total_scholars=$count_fullscholar+$count_recipient+$count_shscholar;
                echo $total_scholars;
                echo '</td>';
              echo '</tr>';  
            
          }

          }else  if( $filter=="ACADEMIC YEAR"){
            if($order=="ASC"){
                      $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay ASC";
              }else{
                  $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay DESC";
              }
            $result = $conn->query($sql);
            echo ' <table class="table">
                      <thead>
                        <tr>
                          <th>Academic Year</th>
                          <th>Barangay</th>
                          <th>SHS Scholars</th>
                          <th>College Recipient</th>
                          <th>College Full Scholars</th>
                          <th>Total Scholars</th>
                         
                        </tr>
                      </thead>
                      <tbody>';
            while($row = $result->fetch_assoc()){
              $barangay=$row['barangay'];
               echo '<tr>';
                echo '<td>';
                echo $whatsearch;
                echo '</td>';
                echo '<td>';
                echo $barangay;
                echo '</td>';
                $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay' AND academic_year='$whatsearch'";
                $result1 = $conn->query($sql1);
                $typescholar="shscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_shscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_shscholar=$count_shscholar+1;
                    }

                 }
                 echo '<td>';
                echo $count_shscholar;
                echo '</td>';
                 $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'  AND academic_year='$whatsearch'";
                $result1 = $conn->query($sql1);
                $typescholar="collegerecipient";
                $status="OK";
                $status1="GRADUATED";
                $count_recipient=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_recipient=$count_recipient+1;
                    }

                 }
                 echo '<td>';
                echo $count_recipient;
                echo '</td>';
                   $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'  AND academic_year='$whatsearch'";
                $result1 = $conn->query($sql1);
                $typescholar="fullscholar";
                $status="OK";
                $status1="GRADUATED";
                $count_fullscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND (status='$status' OR status='$status1')";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_fullscholar=$count_fullscholar+1;
                    }

                 }
                 echo '<td>';
                echo $count_fullscholar;
                echo '</td>';
                echo '<td>';
                $total_scholars=$count_fullscholar+$count_recipient+$count_shscholar;
                echo $total_scholars;
                echo '</td>';
              echo '</tr>';  
            
          }

          }else if(($filter=="OK")||($filter=="GRADUATED")){
            if($order=="ASC"){
                      $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay ASC";
              }else{
                  $sql = "SELECT DISTINCT(barangay) FROM tbl_studentinfo order by barangay DESC";
              }
            $result = $conn->query($sql);
            echo ' <table class="table">
                      <thead>
                        <tr>
                          <th>Barangay</th>
                          <th>SHS Scholars</th>
                          <th>College Recipient</th>
                          <th>College Full Scholars</th>
                          <th>Total Scholars</th>
                         
                        </tr>
                      </thead>
                      <tbody>';
            while($row = $result->fetch_assoc()){
              $barangay=$row['barangay'];
               echo '<tr>';
                echo '<td>';
                echo $barangay;
                echo '</td>';
                $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="shscholar";
                if($filter=="OK"){
                  $status="OK";
                }else if($filter=="GRADUATED"){
                  $status="GRADUATED";
                }
                
             
                $count_shscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$status'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_shscholar=$count_shscholar+1;
                    }

                 }
                 echo '<td>';
                echo $count_shscholar;
                echo '</td>';
                 $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="collegerecipient";
               if($filter=="OK"){
                  $status="OK";
                }else if($filter=="GRADUATED"){
                  $status="GRADUATED";
                }
                $count_recipient=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$status'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_recipient=$count_recipient+1;
                    }

                 }
                 echo '<td>';
                echo $count_recipient;
                echo '</td>';
                   $sql1 = "SELECT * FROM tbl_studentinfo WHERE barangay='$barangay'";
                $result1 = $conn->query($sql1);
                $typescholar="fullscholar";
               if($filter=="OK"){
                  $status="OK";
                }else if($filter=="GRADUATED"){
                  $status="GRADUATED";
                }
                $count_fullscholar=0;
                 while($row1 = $result1->fetch_assoc()){
                    $academic_year=$row1['academic_year'];
                    $application_no=$row1['application_no'];
                    $sql2 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar' AND status='$status'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0){
                      $count_fullscholar=$count_fullscholar+1;
                    }

                 }
                 echo '<td>';
                echo $count_fullscholar;
                echo '</td>';
                echo '<td>';
                $total_scholars=$count_fullscholar+$count_recipient+$count_shscholar;
                echo $total_scholars;
                echo '</td>';
              echo '</tr>';  
            
          }

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
       <form action="removeInterviewRecipient.php" method="post">
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
        <h5 class="modal-title" id="exampleModalLabel">Send for Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="approveInterview.php" method="post">
      <div class="modal-body">
      
         <div class="col-md-12">
            <p>
              Note:<span style="color:red;">This applicant already interviewed and ready for assessment.</span>
            </p>
         </div>
         <div class="col-md-12">
        <div class="form-group">
            <label >Interview Score. 1(Lowest) - 10(Highest)</label>
                <input type="number" min="1" max="10" name="interview_score" class="form-control" placeholder="Interview Score" value="" required="true">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
               <input type="hidden" name="users" value="';
               echo $rowd['id'];
               echo '">
               <input type="hidden" name="academic_year" value="';
               echo $rowd['academic_year'];
               echo '">
               <input type="hidden" name="application_no" value="';
               echo $rowd['application_no'];
               echo '">
               <label >Remarks</label>
               <textarea name="remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="For Assessment">
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