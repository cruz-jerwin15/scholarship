<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['offset']=1;
$_SESSION['limit']=10;
include 'config.php';

                $status="OK";
                $scholar1 ="collegerecipient";
                $sql11 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar1'";
                $result11 = $conn->query($sql11);
                $row11 = $result11->fetch_assoc();

                $scholar12 ="fullscholar";

                 $sql12 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar12'";
                $result12 = $conn->query($sql12);
                $row12 = $result12->fetch_assoc();

                 $scholar13 ="shscholar";

                 $sql13 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar13'";
                $result13 = $conn->query($sql13);
                $row13 = $result13->fetch_assoc();


                $status="OK";
                $scholar1 ="collegerecipient";
                $sql11 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar1'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result11 = $conn->query($sql11);
                $row11 = $result11->fetch_assoc();

                $scholar12 ="fullscholar";

                $sql12 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar12'";
                $result12 = $conn->query($sql12);
                $row12 = $result12->fetch_assoc();

                 $scholar13 ="shscholar";

                $sql13 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar13'";
                $result13 = $conn->query($sql13);
                $row13 = $result13->fetch_assoc();
                            
            $status="GRADUATED";
                $scholar21 ="collegerecipient";
                $sql21 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar21'";
                $result21 = $conn->query($sql21);
                $row21 = $result21->fetch_assoc();

                $scholar22 ="fullscholar";

                 $sql22 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar22'";
                $result22 = $conn->query($sql22);
                $row22 = $result22->fetch_assoc();

                 $scholar23 ="shscholar";

                 $sql23 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar23'";
                $result23 = $conn->query($sql23);
                $row23 = $result23->fetch_assoc();

                $status="NEWAPPLICANT";

                $scholar31 ="collegerecipient";
                $sql31 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar31'";
                $result31 = $conn->query($sql31);
                $row31 = $result31->fetch_assoc();

                $scholar32 ="fullscholar";

                 $sql32 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar32'";
                $result32 = $conn->query($sql32);
                $row32 = $result32->fetch_assoc();

                 $scholar33 ="shscholar";

                 $sql33 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar33'";
                $result33 = $conn->query($sql33);
                $row33 = $result33->fetch_assoc();
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  
    <style >
        .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  } 
  .card-counter.dark{
    background-color: #6d32a8;
    color: #FFF;
  } 
  .card-counter.light{
    background-color: #32a89e;
    color: #FFF;
  }   

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
    </style>
  </head>
  <body onload="getInit()">
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
                  <h4 class="page-title">Dashboard</h4>
                  
                </div>
              </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              
             <?php
                $status="ASSESSMENT";
                $scholar41 ="collegerecipient";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result41 = $conn->query($sql41);
                $row41 = $result41->fetch_assoc();

                $scholar42 ="fullscholar";

                $sql42 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar42'";
                $result42 = $conn->query($sql42);
                $row42 = $result42->fetch_assoc();

                 $scholar43 ="shscholar";

                $sql43 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_studentinfo 
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar43'";
                $result43 = $conn->query($sql43);
                $row43 = $result43->fetch_assoc();


                $committee=$_SESSION['username'];
                $scholar ="collegerecipient";
                $sql = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_committee_score 
                        ON tbl_admin.academic_year=tbl_committee_score.academic_year AND tbl_admin.application_no=tbl_committee_score.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar' AND tbl_committee_score.committee_id='$committee'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result = $conn->query($sql);
                 $row = $result->fetch_assoc();

                  $scholar1 ="shscholar";
                $sql1 = "SELECT COUNT(tbl_admin.id) as nums 
                        FROM tbl_admin 
                        INNER JOIN tbl_committee_score 
                        ON tbl_admin.academic_year=tbl_committee_score.academic_year AND tbl_admin.application_no=tbl_committee_score.application_no  
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar1' AND tbl_committee_score.committee_id='$committee'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result1 = $conn->query($sql1);
                 $row1 = $result1->fetch_assoc();
                            
              ?>
              <?php
                 $typescholar="collegerecipient";
                          $sqla = "SELECT * FROM tbl_assess_settings WHERE typescholar='$typescholar'";
                          $resulta = $conn->query($sqla);
                          $rowa = $resulta->fetch_assoc();
                          if($rowa['status']=="OPEN"){
                                echo '<div class="col-md-6 grid-margin">';
                                  echo '<div class="card">';
                                    echo '<div class="card-body">';
                                      echo '<div class="row">';
                                          echo '<div class="col-md-12">';
                                            echo '<div class="page-header-toolbar">';
                                                echo 'For Assessment';
                                            echo '</div>';
                                          echo '</div>';
                                         echo '<div class="col-md-12">';
                                          echo '<div class="card-counter primary">';
                                            echo '<i class="fa fa-book"></i>';
                                            echo '<span class="count-numbers">';
                                            echo $row['nums']." / ".$row41['nums'];
                                            echo '</span>';
                                            echo '<span class="count-name">College Financial Assistance</span>';
                                          echo '</div>';
                                        echo '</div>';
                                      echo '</div>';
                                    echo '</div>';
                                 echo ' </div>';
                               echo ' </div>';
                          }


              ?>
           
               <?php
                 $typescholar="shscholar";
                          $sqla = "SELECT * FROM tbl_assess_settings WHERE typescholar='$typescholar'";
                          $resulta = $conn->query($sqla);
                          $rowa = $resulta->fetch_assoc();
                          if($rowa['status']=="OPEN"){
               echo '<div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              For Assessment
                          </div>
                        </div>
                        <div class="col-md-12">
                        <div class="card-counter success">
                          <i class="fa fa-book"></i>
                          <span class="count-numbers">';
                          echo $row1['nums']." / ".$row43['nums'];
                          echo '</span>
                          <span class="count-name">SHS Scholarship</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';

              }
              ?>
              
              <?php

               $typescholar="collegerecipient";
                          $sqla = "SELECT * FROM tbl_assess_settings WHERE typescholar='$typescholar'";
                          $resulta = $conn->query($sqla);
                          $rowa = $resulta->fetch_assoc();
                          if($rowa['status']=="OPEN"){
             echo '<div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              <h4 >Number of Applicant per Barangay</h4>
                          </div>
                        </div>
                       <div class="col-md-6">
                          <h4>College Financial Assistance</h4>
                      </div>
                     <table class="table">
                       <thead>
                         <tr>
                           <th style="width:10%;">#</th>
                           <th style="width:60%;">BARANGAY</th>
                           <th  style="width:30%;">NUMBER OF APPLICANT</th>
                         </tr>
                       </thead>
                       <tbody>';
                        
                          $scholartype="collegerecipient";
                           $status1 ="ASSESSMENT";
                            $sql = "SELECT * FROM  tbl_barangay ORDER BY barangay";
                            $result = $conn->query($sql);
                            $count=0;
                            $total=0;
                            while($row = $result->fetch_assoc()){
                              $count++;
                              $barangay = $row['barangay'];
                              $sql1 = "SELECT COUNT(tbl_admin.id) as subtotal 
                                 FROM tbl_admin
                                INNER JOIN tbl_studentinfo 
                                ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                                WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype' AND tbl_studentinfo.barangay='$barangay'";
                              $result1 = $conn->query($sql1);
                              $row1 = $result1->fetch_assoc();
                              $subtotal=$row1['subtotal'];
                              $total = $total+$subtotal;
                               echo '<tr>';
                                 echo '<td>';
                                 echo $count;
                                 echo '</td>';
                                 echo '<td>';
                                 echo $barangay;
                                 echo '</td>';
                                 echo '<td>';
                                 echo $subtotal;
                                 echo '</td>';
                               echo '</tr>';
                            }
                               echo '<tr>';
                                 echo '<th  style="width:10%;">';
                                 echo '</th>';
                              echo '<th style="width:60%;text-align:right">TOTAL</th>';
                              echo '<th  style="width:30%;">';
                              echo $total;
                              echo '</th>';
                              echo '</tr>';
                            


                         

                      echo '</tbody>
                     </table>
                      
                    </div>
                  </div>
                </div>
              </div>';
            }
               ?>
              <?php

               $typescholar="shscholar";
                          $sqla = "SELECT * FROM tbl_assess_settings WHERE typescholar='$typescholar'";
                          $resulta = $conn->query($sqla);
                          $rowa = $resulta->fetch_assoc();
                          if($rowa['status']=="OPEN"){
             echo '<div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              <h4 >Number of Applicant per Barangay</h4>
                          </div>
                        </div>
                       <div class="col-md-6">
                          <h4>College Financial Assistance</h4>
                      </div>
                     <table class="table">
                       <thead>
                         <tr>
                           <th style="width:10%;">#</th>
                           <th style="width:60%;">BARANGAY</th>
                           <th  style="width:30%;">NUMBER OF APPLICANT</th>
                         </tr>
                       </thead>
                       <tbody>';
                        
                          $scholartype="shscholar";
                           $status1 ="ASSESSMENT";
                            $sql = "SELECT * FROM  tbl_barangay ORDER BY barangay";
                            $result = $conn->query($sql);
                            $count=0;
                            $total=0;
                            while($row = $result->fetch_assoc()){
                              $count++;
                              $barangay = $row['barangay'];
                              $sql1 = "SELECT COUNT(tbl_admin.id) as subtotal 
                                 FROM tbl_admin
                                INNER JOIN tbl_studentinfo 
                                ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no  
                                WHERE tbl_admin.status='$status1'  AND tbl_admin.typescholar='$scholartype' AND tbl_studentinfo.barangay='$barangay'";
                              $result1 = $conn->query($sql1);
                              $row1 = $result1->fetch_assoc();
                              $subtotal=$row1['subtotal'];
                              $total = $total+$subtotal;
                               echo '<tr>';
                                 echo '<td>';
                                 echo $count;
                                 echo '</td>';
                                 echo '<td>';
                                 echo $barangay;
                                 echo '</td>';
                                 echo '<td>';
                                 echo $subtotal;
                                 echo '</td>';
                               echo '</tr>';
                            }
                               echo '<tr>';
                                 echo '<th  style="width:10%;">';
                                 echo '</th>';
                              echo '<th style="width:60%;text-align:right">TOTAL</th>';
                              echo '<th  style="width:30%;">';
                              echo $total;
                              echo '</th>';
                              echo '</tr>';
                            


                         

                      echo '</tbody>
                     </table>
                      
                    </div>
                  </div>
                </div>
              </div>';
            }
               ?>
             
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