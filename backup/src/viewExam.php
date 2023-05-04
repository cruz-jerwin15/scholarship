<?php session_start();
include 'config.php';
$id =$_GET['id'];

$sql="SELECT * from tbl_admin WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$academic_year=$row['academic_year'];
$application_no = $row['application_no'];

$sql4="SELECT * from tbl_academic WHERE status='CURRENT' OR status='OPEN'";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
$acads=$row4['id'];


$sql1="SELECT * from tbl_student_exam WHERE user_id='$id' AND academic_id='$acads'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$exam_id=$row1['exam_id'];




$stats="CORRECT";
$sqlz="SELECT COUNT(*) as total from tbl_answer_student WHERE user_id='$id' AND exam_id='$exam_id' AND status='$stats'";
$resultz = $conn->query($sqlz);
$rowz = $resultz->fetch_assoc();
$correct=$rowz['total'];





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
                  <h4 class="page-title">View Exam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <?php
                    $st = "DRAFT";
                    $sqlz="SELECT COUNT(*) as total from tbl_answer_student WHERE user_id='$id' AND exam_id='$exam_id' AND status<>'$st'";
                    $resultz = $conn->query($sqlz);
                    $rowz = $resultz->fetch_assoc();
                    $totals=$rowz['total'];


                    echo "Score: ";
                      echo $correct;
                      echo "/";
                      echo $totals;
                      ?>


                  </h4>

                </div>
              </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
               <div class="col-md-12 grid-margin">

                 <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="row">

                      <?php
                        echo '<div class="col-md-12">
                        <table style="width:100%;table-layout: fixed;word-wrap:break-word;">
                          <thead>
                              <tr>

                                <th style="width:40%;border: 1px solid;">Question</th>
                                <th style="width:25%;border: 1px solid;">Correct Answer</th>
                                <th style="width:25%;border: 1px solid;">Applicant Answer</th>
                                <th style="width:10%;border: 1px solid;">Remarks</th>
                              </tr>
                          </thead>
                          <tbody>';
                          $st ="DRAFT";
                          $sql2="SELECT * from tbl_answer_student WHERE exam_id='$exam_id' AND user_id='$id' AND status<>'$st'";
                          $result2 = $conn->query($sql2);
                          $count=1;
                          while($row2 = $result2->fetch_assoc()){
                            $quest_id=$row2['quest_id'];
                            $answer = $row2['answer'];
                            $sqla="SELECT * from tbl_questbank WHERE id='$quest_id'";
                            $resulta = $conn->query($sqla);
                            $rowa = $resulta->fetch_assoc();
                            $quest_type=$rowa['quest_type'];

                            if($quest_type=="TEXT"){
                              if($row2['status']=="WRONG"){
                                   echo '<tr style="background-color:red;">';
                              }else{
                                echo '<tr>';
                              }

                                echo '<td style="width:40%;border: 1px solid;">';
                                echo $count++;
                                  echo ". ".$rowa['question_text'];
                                echo '</td>';
                                 echo '<td style="width:25%;border: 1px solid;">';
                                  echo $rowa['answer'];
                                echo '</td>';
                                 echo '<td style="width:25%;border: 1px solid;">';
                                  echo $answer;
                                echo '</td>';
                                   echo '<td  style="width:10%;border: 1px solid;">';
                                  echo $row2['status'];
                                echo '</td>';
                                echo '</tr>';
                            }else if($quest_type=="IMAGE"){
                               if($row2['status']=="WRONG"){
                                   echo '<tr style="background-color:red;">';
                              }else{
                                echo '<tr>';
                              }
                                echo '<td style="width:40%;border: 1px solid;">';
                                echo $count++;
                                  echo '. <img src="questimage/';
                                  echo $rowa['question_image'];
                                  echo '" style="height:100px">';
                                echo '</td>';
                                 echo '<td style="width:25%;border: 1px solid;">';
                                //  echo $rowa['answer']; 
                                 $correctans="";
                                 if($rowa['answer']=="A"){
                                  $correctans=$rowa['choice_image_a'];
                                 }else if($rowa['answer']=="B"){
                                  $correctans=$rowa['choice_image_b'];
                                 }else if($rowa['answer']=="C"){
                                  $correctans=$rowa['choice_image_c'];
                                 }else if($rowa['answer']=="D"){
                                  $correctans=$rowa['choice_image_d'];
                                 }else if($rowa['answer']=="E"){
                                  $correctans=$rowa['choice_image_e'];
                                 }
                                 echo '<img src="questimage/';
                                  echo $correctans;
                                  echo '" style="height:100px">';
                                echo '</td>';
                                 echo '<td style="width:25%;border: 1px solid;">';
                                 
                                //  echo $answer; 
                                 $myanswer="";
                                 if($answer=="A"){
                                  $myanswer=$rowa['choice_image_a'];
                                 }else if($answer=="B"){
                                  $myanswer=$rowa['choice_image_b'];
                                 }else if($answer=="C"){
                                  $myanswer=$rowa['choice_image_c'];
                                 }else if($answer=="D"){
                                  $myanswer=$rowa['choice_image_d'];
                                 }else if($answer=="E"){
                                  $myanswer=$rowa['choice_image_e'];
                                 } 
                                 echo '<img src="questimage/';
                                  echo $myanswer;
                                  echo '" style="height:100px">';
                                echo '</td>';
                                   echo '<td  style="width:10%;border: 1px solid;">';
                                  echo $row2['status'];
                                echo '</td>';
                                echo '</tr>';
                            }else if($quest_type=="TEXT/IMAGE"){
                               if($row2['status']=="WRONG"){
                                   echo '<tr style="background-color:red;">';
                              }else{
                                echo '<tr>';
                              }
                                 echo '<td style="width:40%;border: 1px solid;">';
                                echo $count++;
                                  echo ". ".$rowa['question_text'];
                                echo '</td>';
                                 echo '<td style="width:25%;border: 1px solid;">';
                                 $correctans="";
                                 if($rowa['answer']=="A"){
                                  $correctans=$rowa['choice_image_a'];
                                 }else if($rowa['answer']=="B"){
                                  $correctans=$rowa['choice_image_b'];
                                 }else if($rowa['answer']=="C"){
                                  $correctans=$rowa['choice_image_c'];
                                 }else if($rowa['answer']=="D"){
                                  $correctans=$rowa['choice_image_d'];
                                 }else if($rowa['answer']=="E"){
                                  $correctans=$rowa['choice_image_e'];
                                 }
                                 
                                  echo '<img src="questimage/';
                                  echo $correctans;
                                  echo '" style="height:100px">';
                                 
                                  
                                echo '</td>';
                                 echo '<td style="width:25%;border: 1px solid;">';
                                //  echo $answer;
                                 if($answer=="NO ANSWER"){
                                  echo "No Answer";
                                 }elseif($answer=="NO TIME"){
                                  echo "No Time";
                                 }else{
                                  $myanswer="";
                                 if($answer=="A"){
                                  $myanswer=$rowa['choice_image_a'];
                                 }else if($answer=="B"){
                                  $myanswer=$rowa['choice_image_b'];
                                 }else if($answer=="C"){
                                  $myanswer=$rowa['choice_image_c'];
                                 }else if($answer=="D"){
                                  $myanswer=$rowa['choice_image_d'];
                                 }else if($answer=="E"){
                                  $myanswer=$rowa['choice_image_e'];
                                 }
                                  echo '<img src="questimage/';
                                  echo $myanswer;
                                  echo '" style="height:100px">';
                                 }
                                   
                                echo '</td>';
                                   echo '<td  style="width:10%;border: 1px solid;">';
                                  echo $row2['status'];
                                echo '</td>';
                                echo '</tr>';
                            }



                          }





                        // while($row2 = $result2->fetch_assoc()){
                        // $quest_id= $row2['quest_id'];
                        // $answer = $row2['answer'];

                        // $sql1="SELECT * from tbl_questbank WHERE id='$quest_id' ";
                        // $result1 = $conn->query($sql1);
                        // $row1 = $result1->fetch_assoc();

                        // $quest_type=$row1['quest_type'];

                        // if($quest_type=="TEXT"){
                        //       echo '<tr>';
                        //         echo '<td>';
                        //         echo $row1['question_text'];
                        //         echo '</td>';
                        //         echo '<td>';
                        //         echo $row1['answer'];
                        //         echo '</td>';
                        //         echo '<td>';
                        //         echo $answer;
                        //         echo '</td>';
                        //         echo '<td>';
                        //         echo $row2['status'];
                        //         echo '</td>';
                        //      echo '</tr>';
                        // }







                      // }
                        echo '</tbody>
                        </table>';
                         echo '</div>';


                      ?>

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
