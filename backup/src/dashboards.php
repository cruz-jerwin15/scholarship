<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['questtype']="TEXT";
$_SESSION['question']="NULL";
$_SESSION['filterquest']="ALL";
$_SESSION['filterpage']=0;
$_SESSION['questid']=0;
$_SESSION['offset']=1;
$_SESSION['limit']=10;
$_SESSION['exam']="NULL";
$_SESSION['exam_id']=0;
$_SESSION['section']="NULL";
$_SESSION['section_id']=0;
$_SESSION['select']="NOTALL";
include 'config.php';
  $renew_status="CURRENT";
                $sqla = "SELECT * FROM tbl_renew_year WHERE status='$renew_status'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $renew_id=isset($rowa['id']);


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

                $status1="GRADUATED";
                $scholar51 ="collegerecipient";
                $sql51 = "SELECT COUNT(*) as nums FROM tbl_remarks WHERE scholars='$scholar51' AND  process='$status1'";
                $result51 = $conn->query($sql51);
                $row51 = $result51->fetch_assoc();


                $scholar52 ="fullscholar";
                 $sql52 = "SELECT COUNT(*) as nums FROM tbl_remarks WHERE scholars='$scholar52'  AND  process='$status1'";

                $result52 = $conn->query($sql52);
                $row52 = $result52->fetch_assoc();

                 $scholar53 ="shscholar";
                $sql53 = "SELECT COUNT(*) as nums FROM tbl_remarks WHERE scholars='$scholar53'  AND  process='$status1'";
                $result53 = $conn->query($sql53);
                $row53 = $result53->fetch_assoc();

                // $scholar21 ="collegerecipient";
                // $sql21 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar21'";
                // $result21 = $conn->query($sql21);
                // $row21 = $result21->fetch_assoc();

                // $scholar22 ="fullscholar";

                //  $sql22 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar22'";
                // $result22 = $conn->query($sql22);
                // $row22 = $result22->fetch_assoc();

                //  $scholar23 ="shscholar";

                //  $sql23 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar23'";
                // $result23 = $conn->query($sql23);
                // $row23 = $result23->fetch_assoc();

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
    <script>
      function getInit(){
        getPie();
        getPie1();
      }
      function getPie(){
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: {
        datasets: [{
          <?php
            echo  'data: [';
            echo $row12['nums'];
            echo ', ';
            echo $row11['nums'];
            echo ', ';
            echo $row13['nums'];
            echo '],'
          ?>

          backgroundColor: [
            ChartColor[2],
            ChartColor[0],
            ChartColor[1]
          ],
          borderColor: [
            ChartColor[2],
            ChartColor[0],
            ChartColor[1]
          ],
        }],
        labels: [
          'College Scholars',
          'College Recipients',
          'SHS Recipients',
        ]
      },
      options: {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
            text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
            text.push('</span>');
            if (chart.data.labels[i]) {
              text.push(chart.data.labels[i]);
            }
            text.push('</li>');
          }
          text.push('</div></ul>');
          return text.join("");
        }
      }
    });
    document.getElementById('pie-chart-legend').innerHTML = pieChart.generateLegend();
      }

       function getPie1(){
        var pieChartCanvas = $("#pieChart1").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: {
        datasets: [{
          <?php
            echo  'data: [';
            echo $row52['nums'];
            echo ', ';
            echo $row51['nums'];
            echo ', ';
            echo $row53['nums'];
            echo '],'
          ?>

          backgroundColor: [
            ChartColor[2],
            ChartColor[0],
            ChartColor[1]
          ],
          borderColor: [
            ChartColor[2],
            ChartColor[0],
            ChartColor[1]
          ],
        }],
        labels: [
          'College Scholars',
          'College Recipients',
          'SHS Recipients',
        ]
      },
      options: {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
            text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
            text.push('</span>');
            if (chart.data.labels[i]) {
              text.push(chart.data.labels[i]);
            }
            text.push('</li>');
          }
          text.push('</div></ul>');
          return text.join("");
        }
      }
    });
    document.getElementById('pie-chart-legend1').innerHTML = pieChart.generateLegend();
      }
    </script>
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
              <div class="col-md-12 ">
                <div class="page-header-toolbar text-right">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAddApplicant" onClick="getApproveId(this.id)">
                     <span style="color:#ffffff;" data-toggle="tooltip" data-placement="top" title="Click to add applicant!">Add Applicant</span>
                   </button>
               </div>
              </div>

              <div class="modal fade" id="modalAddApplicant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Applicant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                     <form action="manualAdd.php" method="post">
                    <div class="modal-body">
                      <div class="auto-form-wrapper">

                          <div class="form-group">
                            <div class="input-group">
                              <input type="email"  name="email" class="form-control" placeholder="Email" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="pincode" class="form-control" placeholder="Pin Code" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                            <div class="input-group">

                              <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="middlename" class="form-control" placeholder="Middle Name" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="input-group">
                              <input type="phone" name="mobile" class="form-control" placeholder="Mobile Numer" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                           <div class="form-group d-flex justify-content-center">
                           <select class="form-control" name="barangay">
                          <?php
                              $sqlz = "SELECT * FROM tbl_barangay ORDER BY barangay";
                              $resultz = $conn->query($sqlz);
                              echo '<option value="" disabled selected>Select Barangay</option>';
                               while($rowz = $resultz->fetch_assoc()){
                                 echo '<option value="';
                                 echo $rowz['barangay'];
                                 echo '">';
                                  echo $rowz['barangay'];
                                 echo '</option>';
                               }


                          ?>
                           </select>
                            </div>
                          <div class="form-group d-flex justify-content-center">

                          <select class="form-control" name="usertype">
                            <?php

                                 echo '<option value="fullscholar">College Full Scholarship</option>';
                                 echo '<option value="shscholar" >Senior High</option>
                                 <option value="collegerecipient_public">College Financial Assistance (Public)</option>
                                <option value="collegerecipient_private" selected="selected">College Financial Assistance (Private)</option>';

                            ?>


                          </select>
                          </div>




                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                  </div>
                </form>
                </div>
              </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
               <div class="col-md-6 grid-margin">

                 <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">
                      <h4 class="card-title mb-0">Total Number of Current Scholars & Recipients</h4>
                    </div>
                    <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">

                      <id id="pie-chart-legend" class="mr-4"></id>
                    </div>
                    <div class="card-body d-flex">
                      <canvas class="my-auto" id="pieChart" height="130"></canvas>
                    </div>
                  </div>
                </div>
            </div>
             <div class="col-md-6 grid-margin">

                 <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">
                      <h4 class="card-title mb-0">Total Number of Graduates - Scholars & Recipients</h4>
                    </div>
                    <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">

                      <id id="pie-chart-legend1" class="mr-4"></id>
                    </div>
                    <div class="card-body d-flex">
                      <canvas class="my-auto" id="pieChart1" height="130"></canvas>
                    </div>
                  </div>
                </div>
            </div>
             <?php
                $status="NEWAPPLICANT";
                $scholar41 ="collegerecipient";
                $schooltype41="Public / State Universities";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41' AND tbl_studentinfo.schooltype='$schooltype41'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result41 = $conn->query($sql41);
                $row41 = $result41->fetch_assoc();

                $scholar44 ="collegerecipient";
                $schooltype44="Private / Institute";
                $sql44 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar44' AND tbl_studentinfo.schooltype='$schooltype44'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result44 = $conn->query($sql44);
                $row44 = $result44->fetch_assoc();

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

              ?>
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              New Applicants
                          </div>
                        </div>
                          <div class="col-md-3">
                        <div class="card-counter danger">
                          <i class="fa fa-book"></i>
                          <span class="count-numbers"><?php echo $row42['nums'];?></span>
                          <span class="count-name">College Scholarship</span>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card-counter primary">
                          <i class="fa fa-book"></i>
                          <span class="count-numbers"><?php echo $row41['nums'];?></span>
                          <span class="count-name">College E. A. (Public)</span>
                        </div>
                      </div>
                      <div class="col-md-3">
                       <div class="card-counter primary">
                         <i class="fa fa-book"></i>
                         <span class="count-numbers"><?php echo $row44['nums'];?></span>
                         <span class="count-name">College E. A.(Private)</span>
                       </div>
                     </div>

                       <div class="col-md-3">
                        <div class="card-counter success">
                          <i class="fa fa-book"></i>
                          <span class="count-numbers"><?php echo $row43['nums'];?></span>
                          <span class="count-name">SHS Educational Assistance</span>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
               <?php
                $status="INTERVIEW";
                $scholar41 ="collegerecipient";
                  $schooltype41="Public / State Universities";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41' AND tbl_studentinfo.schooltype='$schooltype41'";
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

                $scholar44 ="collegerecipient";
                $schooltype44="Private / Institute";
                $sql44 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar44' AND tbl_studentinfo.schooltype='$schooltype44'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result44 = $conn->query($sql44);
                $row44 = $result44->fetch_assoc();

                 $scholar43 ="shscholar";

                $sql43 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar43'";
                $result43 = $conn->query($sql43);
                $row43 = $result43->fetch_assoc();

              ?>
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              For Interview
                          </div>
                        </div>
                         <div class="col-md-3">
                        <div class="card-counter danger">
                          <i class="fa fa-comment"></i>
                          <span class="count-numbers"><?php echo $row42['nums'];?></span>
                          <span class="count-name">College Scholarship</span>
                        </div>
                      </div>
                         <div class="col-md-3">
                        <div class="card-counter primary">
                          <i class="fa fa-comment"></i>
                          <span class="count-numbers"><?php echo $row41['nums'];?></span>
                          <span class="count-name">College E. A. (Public)</span>
                        </div>
                      </div>

                      <div class="col-md-3">
                     <div class="card-counter primary">
                       <i class="fa fa-comment"></i>
                       <span class="count-numbers"><?php echo $row44['nums'];?></span>
                       <span class="count-name">College E. A. (Private)</span>
                     </div>
                   </div>

                       <div class="col-md-3">
                        <div class="card-counter success">
                          <i class="fa fa-comment"></i>
                          <span class="count-numbers"><?php echo $row43['nums'];?></span>
                          <span class="count-name">SHS Educational Assistance</span>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
               <?php
                $status="ASSESSMENT";

                $sql4="SELECT * from tbl_academic WHERE status='CURRENT' OR status='OPEN'";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_assoc();
                $acads=$row4['id'];


                $scholar41 ="collegerecipient";
                $schooltype41="Public / State Universities";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41' AND tbl_studentinfo.schooltype='$schooltype41'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result41 = $conn->query($sql41);
                $row41 = $result41->fetch_assoc();

                $scholar44 ="collegerecipient";
                  $schooltype44="Private / Institute";
                $sql44 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar44' AND tbl_studentinfo.schooltype='$schooltype44'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result44 = $conn->query($sql44);
                $row44 = $result44->fetch_assoc();

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

              ?>
               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              For Assessment - New Applicants
                          </div>
                        </div>
                          <div class="col-md-3">
                        <div class="card-counter danger">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row42['nums'];?></span>
                          <span class="count-name">College Scholarship</span>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card-counter primary">
                          <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row41['nums'];?></span>
                          <span class="count-name">College E. A. (Public)</span>
                        </div>
                      </div>
                      <div class="col-md-3">
                       <div class="card-counter primary">
                         <i class="fa fa-clipboard"></i>
                         <span class="count-numbers"><?php echo $row44['nums'];?></span>
                         <span class="count-name">College E. A. (Private)</span>
                       </div>
                     </div>
                       <div class="col-md-3">
                        <div class="card-counter success">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row43['nums'];?></span>
                          <span class="count-name">SHS Educational Assistance</span>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>

              <?php

                $status="REMOVED";
                $remove="YES";
                $process = "REQUIREMENTS";
                $process1 = "INTERVIEW";
                $process2 = "ASSESSMENT";
                $scholar51 ="collegerecipient";
				$stat1="CURRENT";
				$stat2="OPEN";
                $sql4="SELECT * from tbl_academic WHERE status='$stat1' OR status='$stat2'";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_assoc();
                $acads=$row4['id'];
                //    $sql51 = "SELECT DISTINCT(user_id) FROM tbl_remarks WHERE remove='$remove' AND scholars='$scholars51'";
                // $result51 = $conn->query($sql51);
                // $row51 = $result51->fetch_assoc();
                // $removetotal =$result51->num_rows;
                // $removetotal=1;
                $sql51 = "SELECT COUNT(tbl_remarks.user_id) as total
                        FROM tbl_remarks
                        INNER JOIN tbl_academic
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_remarks.scholars='$scholar51' AND tbl_remarks.remove='$remove' AND tbl_remarks.academic_id='$acads' AND ((process='$process') OR (process='$process1')OR(process='$process2'))";
                $result51 = $conn->query($sql51);
                $row51 = $result51->fetch_assoc();

                $scholar52 ="fullscholar";

                // $removetotal=1;
                  $sql52 = "SELECT COUNT(tbl_remarks.user_id) as total
                        FROM tbl_remarks
                        INNER JOIN tbl_academic
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_remarks.scholars='$scholar52' AND tbl_remarks.remove='$remove' AND tbl_remarks.academic_id='$acads' AND ((process='$process') OR (process='$process1')OR(process='$process2'))";

                $result52 = $conn->query($sql52);
                $row52 = $result52->fetch_assoc();

                 $scholar53 ="shscholar";
                // $removetotal=1;
                 $sql53 = "SELECT COUNT(tbl_remarks.user_id) as total
                        FROM tbl_remarks
                        INNER JOIN tbl_academic
                        ON tbl_academic.id=tbl_remarks.academic_id
                        WHERE tbl_remarks.scholars='$scholar53' AND tbl_remarks.remove='$remove' AND tbl_remarks.academic_id='$acads' AND ((process='$process') OR (process='$process1')OR(process='$process2'))";

                $result53 = $conn->query($sql53);
                $row53 = $result53->fetch_assoc();




              ?>

               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              Removed Applicants
                          </div>
                        </div>
                          <div class="col-md-4">
                        <div class="card-counter danger">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row52['total'];?></span>
                          <span class="count-name">College Scholarship</span>
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="card-counter primary">
                          <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row51['total'];?></span>
                          <span class="count-name">College Educational Assistance</span>
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="card-counter success">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row53['total'];?></span>
                          <span class="count-name">SHS Educational Assistance</span>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>


              <?php
                $status="OK";
                $scholar41 ="collegerecipient";
                  $schooltype41="Public / State Universities";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41' AND tbl_studentinfo.schooltype='$schooltype41'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result41 = $conn->query($sql41);
                $row41 = $result41->fetch_assoc();

                $scholar44 ="collegerecipient";
                $schooltype44="Private / Institute";
                $sql44 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar44'  AND tbl_studentinfo.schooltype='$schooltype44'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result44 = $conn->query($sql44);
                $row44 = $result44->fetch_assoc();

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

              ?>
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                             Current Scholars & Recipients
                          </div>
                        </div>
                          <div class="col-md-3">
                        <div class="card-counter danger">
                           <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row42['nums'];?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card-counter primary">
                          <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row41['nums'];?></span>
                          <span class="count-name">College E. A. (Public)</span>
                        </div>
                      </div>

                      <div class="col-md-3">
                       <div class="card-counter primary">
                         <i class="fa fa-user"></i>
                         <span class="count-numbers"><?php echo $row44['nums'];?></span>
                         <span class="count-name">College E. A. (Private)</span>
                       </div>
                     </div>

                       <div class="col-md-3">
                        <div class="card-counter success">
                           <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row43['nums'];?></span>
                          <span class="count-name">SHS Recipients</span>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>
              </div>


              <?php
                $status="ASSESS";
                $scholar41 ="collegerecipient";
                  $schooltype41="Public / State Universities";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41' AND tbl_studentinfo.schooltype='$schooltype41'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result41 = $conn->query($sql41);
                $row41 = $result41->fetch_assoc();

                $scholar44 ="collegerecipient";
                $schooltype44="Private / Institute";
                $sql44 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar44'  AND tbl_studentinfo.schooltype='$schooltype44'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result44 = $conn->query($sql44);
                $row44 = $result44->fetch_assoc();

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

              ?>

              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                             Assessment
                          </div>
                        </div>
                          <div class="col-md-3">
                        <div class="card-counter danger">
                           <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row42['nums'];?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card-counter primary">
                          <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row41['nums'];?></span>
                          <span class="count-name">College E. A. (Public)</span>
                        </div>
                      </div>

                      <div class="col-md-3">
                       <div class="card-counter primary">
                         <i class="fa fa-user"></i>
                         <span class="count-numbers"><?php echo $row44['nums'];?></span>
                         <span class="count-name">College E. A. (Private)</span>
                       </div>
                     </div>

                       <div class="col-md-3">
                        <div class="card-counter success">
                           <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row43['nums'];?></span>
                          <span class="count-name">SHS Recipients</span>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>
              </div>

              <?php
                $status="RENEW";
                $scholar41 ="collegerecipient";
                  $schooltype41="Public / State Universities";
                $sql41 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar41' AND tbl_studentinfo.schooltype='$schooltype41'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result41 = $conn->query($sql41);
                $row41 = $result41->fetch_assoc();

                $scholar44 ="collegerecipient";
                $schooltype44="Private / Institute";
                $sql44 = "SELECT COUNT(tbl_admin.id) as nums
                        FROM tbl_admin
                        INNER JOIN tbl_studentinfo
                        ON tbl_admin.academic_year=tbl_studentinfo.academic_year AND tbl_admin.application_no=tbl_studentinfo.application_no
                        WHERE tbl_admin.status='$status' AND tbl_admin.typescholar='$scholar44'  AND tbl_studentinfo.schooltype='$schooltype44'";
                // $sql41 = "SELECT COUNT(*) as nums FROM tbl_admin WHERE status='$status' AND typescholar='$scholar41'";
                $result44 = $conn->query($sql44);
                $row44 = $result44->fetch_assoc();

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

              ?>

              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                             Renewal
                          </div>
                        </div>
                          <div class="col-md-3">
                        <div class="card-counter danger">
                           <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row42['nums'];?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card-counter primary">
                          <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row41['nums'];?></span>
                          <span class="count-name">College E. A. (Public)</span>
                        </div>
                      </div>

                      <div class="col-md-3">
                       <div class="card-counter primary">
                         <i class="fa fa-user"></i>
                         <span class="count-numbers"><?php echo $row44['nums'];?></span>
                         <span class="count-name">College E. A. (Private)</span>
                       </div>
                     </div>

                       <div class="col-md-3">
                        <div class="card-counter success">
                           <i class="fa fa-user"></i>
                          <span class="count-numbers"><?php echo $row43['nums'];?></span>
                          <span class="count-name">SHS Recipients</span>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>
              </div>


                  <?php

                $scholar51 ="collegerecipient";
                $sql4="SELECT * from tbl_renew_year WHERE status='CURRENT' OR status='OPEN'";
                $result4 = $conn->query($sql4);
                $row4 = $result4->fetch_assoc();
                $acads=$row4['id'];

                $status="SCHOLARS ASSESSMENT";
                $status1="SCHOLARS RENEW";
                $status2="BLOCK";
                $remove="YES";
                $scholar51 ="collegerecipient";
                $sql51 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$scholar51' AND ((process='$status' OR process='$status1') OR (process='$status2' AND remove='$remove')) AND academic_id='$acads'";
                $result51 = $conn->query($sql51);
                $row51 = $result51->fetch_assoc();


                $scholar52 ="fullscholar";
                 $sql52 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$scholar52' AND ((process='$status' OR process='$status1') OR (process='$status2' AND remove='$remove')) AND academic_id='$acads'";

                $result52 = $conn->query($sql52);
                $row52 = $result52->fetch_assoc();

                 $scholar53 ="shscholar";
                $sql53 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$scholar53' AND ((process='$status' OR process='$status1') OR (process='$status2' AND remove='$remove')) AND academic_id='$acads'";
                $result53 = $conn->query($sql53);
                $row53 = $result53->fetch_assoc();




              ?>

               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              Removed
                          </div>
                        </div>
                          <div class="col-md-4">
                        <div class="card-counter danger">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row52['total'];?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="card-counter primary">
                          <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row51['total'];?></span>
                          <span class="count-name">College Recipients</span>
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="card-counter success">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row53['total'];?></span>
                          <span class="count-name">SHS Recipients</span>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>

                  <?php
                // TEST
                $renew_status="CURRENT";
                 $renew_status1="OPEN";
                $sqla = "SELECT * FROM tbl_renew_year WHERE status='$renew_status' OR status='$renew_status1'";
                $resulta = $conn->query($sqla);
                $rowa = $resulta->fetch_assoc();

                $renew_id=$rowa['id'];
                $status1="GRADUATED";
                $status2="BLOCK";
                $remove="GRADUATE";
                $scholar51 ="collegerecipient";
                $sql51 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$scholar51' AND  (process='$status1' OR (process='$status2' AND remove='$remove')) AND academic_id='$renew_id'";
                $result51 = $conn->query($sql51);
                $row51 = $result51->fetch_assoc();


                $scholar52 ="fullscholar";
                 $sql52 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$scholar52'  AND  (process='$status1' OR (process='$status2' AND remove='$remove')) AND academic_id='$renew_id'";

                $result52 = $conn->query($sql52);
                $row52 = $result52->fetch_assoc();

                 $scholar53 ="shscholar";
                $sql53 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$scholar53'  AND  (process='$status1' OR (process='$status2' AND remove='$remove')) AND academic_id='$renew_id'";
                $result53 = $conn->query($sql53);
                $row53 = $result53->fetch_assoc();




              ?>

               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                              Graduate
                          </div>
                        </div>
                          <div class="col-md-4">
                        <div class="card-counter danger">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row52['total'];?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="card-counter primary">
                          <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row51['total'];?></span>
                          <span class="count-name">College Recipients</span>
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="card-counter success">
                         <i class="fa fa-clipboard"></i>
                          <span class="count-numbers"><?php echo $row53['total'];?></span>
                          <span class="count-name">SHS Recipients</span>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>

               <?php

              $scholar="collegerecipient";
              $usertype="college";
              $status="ASSESS";
              $stats=2;
              $sql1 = "SELECT COUNT(tbl_assess_req.id) as total
                        FROM tbl_assess_req
                        INNER JOIN tbl_admin
                        ON tbl_assess_req.academic_year=tbl_admin.academic_year AND tbl_assess_req.application_no=tbl_admin.application_no
                        WHERE (tbl_assess_req.school_id='$stats' OR tbl_assess_req.registration_form='$stats' OR tbl_assess_req.school_clearance='$stats'OR tbl_assess_req.gradereport='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_assess_req.academic_id='$renew_id'";
                         $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total=$row1['total'];
 $scholar="fullscholar";
            $sql1 = "SELECT COUNT(tbl_assess_req.id) as total
                        FROM tbl_assess_req
                        INNER JOIN tbl_admin
                        ON tbl_assess_req.academic_year=tbl_admin.academic_year AND tbl_assess_req.application_no=tbl_admin.application_no
                        WHERE (tbl_assess_req.school_id='$stats' OR tbl_assess_req.registration_form='$stats' OR tbl_assess_req.school_clearance='$stats'OR tbl_assess_req.gradereport='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_assess_req.academic_id='$renew_id'";
                         $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total1=$row1['total'];
 $scholar="shscholar";
                $usertype="shs";
          $sql1 = "SELECT COUNT(tbl_assess_req.id) as total
                        FROM tbl_assess_req
                        INNER JOIN tbl_admin
                        ON tbl_assess_req.academic_year=tbl_admin.academic_year AND tbl_assess_req.application_no=tbl_admin.application_no
                        WHERE (tbl_assess_req.school_id='$stats' OR tbl_assess_req.registration_form='$stats' OR tbl_assess_req.school_clearance='$stats'OR tbl_assess_req.gradereport='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_assess_req.academic_id='$renew_id'";
                         $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total2=$row1['total'];

              ?>


               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                             Assessment Notification
                          </div>
                        </div>
                          <div class="col-md-4">
                        <div class="card-counter danger">
                           <i class="fa fa-eye"></i>
                          <span class="count-numbers"><?php echo $total1;?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="card-counter primary">
                          <i class="fa fa-eye"></i>
                          <span class="count-numbers"><?php echo $total;?></span>
                          <span class="count-name">College Recipients</span>
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="card-counter success">
                           <i class="fa fa-eye"></i>
                          <span class="count-numbers"><?php echo $total2;?></span>
                          <span class="count-name">SHS Recipients</span>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>
              </div>


                <?php

              $scholar="collegerecipient";
              $usertype="college";
              $status="RENEW";
              $stats=2;
              $sql1 = "SELECT COUNT(tbl_renew.id) as total
                        FROM tbl_renew
                        INNER JOIN tbl_admin
                        ON tbl_renew.academic_year=tbl_admin.academic_year AND tbl_renew.application_no=tbl_admin.application_no
                        WHERE (tbl_renew.school_id='$stats' OR tbl_renew.registration_form='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_renew.academic_id='$renew_id'";
                         $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total=$row1['total'];
 $scholar="fullscholar";
            $sql1 = "SELECT COUNT(tbl_renew.id) as total
                        FROM tbl_renew
                        INNER JOIN tbl_admin
                        ON tbl_renew.academic_year=tbl_admin.academic_year AND tbl_renew.application_no=tbl_admin.application_no
                        WHERE (tbl_renew.school_id='$stats' OR tbl_renew.registration_form='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_renew.academic_id='$renew_id'";
                         $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total1=$row1['total'];
 $scholar="shscholar";
                $usertype="shs";
          $sql1 = "SELECT COUNT(tbl_renew.id) as total
                        FROM tbl_renew
                        INNER JOIN tbl_admin
                        ON tbl_renew.academic_year=tbl_admin.academic_year AND tbl_renew.application_no=tbl_admin.application_no
                        WHERE (tbl_renew.school_id='$stats' OR tbl_renew.registration_form='$stats') AND tbl_admin.usertype='$usertype' AND tbl_admin.typescholar='$scholar' AND tbl_admin.status='$status' AND tbl_renew.academic_id='$renew_id'";
                         $result1 = $conn->query($sql1);
                          $row1 = $result1->fetch_assoc();
                          $total2=$row1['total'];

              ?>


               <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="page-header-toolbar">
                             Renewal Notification
                          </div>
                        </div>
                           <div class="col-md-4">
                        <div class="card-counter danger">
                           <i class="fa fa-eye"></i>
                          <span class="count-numbers"><?php echo $total1;?></span>
                          <span class="count-name">College Scholars</span>
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="card-counter primary">
                          <i class="fa fa-eye"></i>
                          <span class="count-numbers"><?php echo $total;?></span>
                          <span class="count-name">College Recipients</span>
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="card-counter success">
                           <i class="fa fa-eye"></i>
                          <span class="count-numbers"><?php echo $total2;?></span>
                          <span class="count-name">SHS Recipients</span>
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
