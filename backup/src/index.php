<?php session_start();
$_SESSION['notif']="NULL";
$_SESSION['search']="ALL";
$_SESSION['whatsearch']="";
$_SESSION['order']="ASC";
$_SESSION['limit']="10";
$_SESSION['offset'] =2;
$_SESSION['username']="";
$_SESSION['lastname']="";
$_SESSION['firstname']="";
$_SESSION['image']="";
$_SESSION['usertype']="";
$_SESSION['page']="";
$_SESSION['pages']="";
$_SESSION['category']="";
include 'config.php';
$left="RIGHT";
$sql4 = "SELECT * FROM tbl_aboutus WHERE divider='$left'";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();

$left="LEFT";
$sql3 = "SELECT * FROM tbl_aboutus WHERE divider='$left'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YDO</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendors/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="vendors/css/freelancer.min.css" rel="stylesheet">


    <link rel="icon" href="img/logo.png">
    <style>
      #wrapper{
        width: 100%;
        margin:0;
        padding: 0;
      }
      .img{
        align-content: center;
        width:100%;
      }
      .bggray{
        opacity:.2;
        position: absolute;
        min-width:100px !important;
        height: 1000px;
        left: 0;
        right: 0;
        margin: 0 auto;
      }
      .bg-primary{
        background-color:#70C2FF !important;
      }
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background-color:#283C4D;margin-bottom: 0;padding-bottom: 0; position: fixed;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="padding-bottom: 35px"> YDO  </a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto" style="float: right;">
            <li class="nav-item mx-0 mx-lg-1 " >
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#home" > Home </a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#application"> Application </a>
            </li>

              <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#calendar"> Calendar </a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about"> About </a>
            </li>
             <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php"> Login </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->

   <header style="margin-top: 0px; padding-top: 0px;">
    <div class="thing" id="wrapper">
        <div>
            <header class="masthead bg-primary text-white text-center" style="padding-bottom: 140px;padding-top: 200px;">
                <div class="container" id="home" >
                  <img class="img-fluid mb-5 d-block mx-auto" src="banner/logo2.png" style ="width:200px;height:200px;" alt="">
                  <h2 class="text-uppercase mb-0"> City of Sto. Tomas Scholarship Program </h2>
                  <hr style="border-radius:100px;height:3px;background-color:White;">
                  <h4 class="font-weight-light mb-0">
                 Local Government of Sto. Tomas City, Batangas
                   </h4>
                </div>
              </header>

        </div>

        <div>
           <?php
            include 'config.php';
              $sql13 = "SELECT * FROM tbl_banner";
            $result13 = $conn->query($sql13);
            $row13 = $result13->fetch_assoc();
              echo '<header class="masthead bg-primary text-white text-center" style="padding-bottom: 10px;padding-top: 120px;">
                <div class="container" id="home" >
                  <img class="img-fluid mb-5 d-block mx-auto" src="banner/';
                  echo $row13['image'];
              echo '" style ="width:700px;height:500px;" alt="">

                </div>
              </header>';

            ?>

        </div>
    </div>
  </header>


<?php
 include 'config.php';
    $types="fullscholar";
                                  $sql14 = "SELECT * FROM tbl_scholar_image WHERE typescholar='$types'";
                                  $result14 = $conn->query($sql14);
                                  $row14 = $result14->fetch_assoc();

                                   $types1="recipient";
                                  $sql15 = "SELECT * FROM tbl_scholar_image WHERE typescholar='$types1'";
                                  $result15 = $conn->query($sql15);
                                  $row15 = $result15->fetch_assoc();

                                  $types2="shs";
                                  $sql16 = "SELECT * FROM tbl_scholar_image WHERE typescholar='$types2'";
                                  $result16 = $conn->query($sql16);
                                  $row16 = $result16->fetch_assoc();

?>


    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="application">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0"> SCHOLARSHIP ONLINE APPLICATION </h2>
        <hr style="border-radius:100px;height:3px;background-color:Black;">
        <div class="row">

          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#shs">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="banner/<?php echo $row16['image'];?>" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#eacollege">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="banner/<?php echo $row15['image'];?>" alt="">
            </a>
          </div>
            <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#YDOcollege">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="banner/<?php echo $row14['image'];?>" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#requirements">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/requirements.jpg" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#howtoapply">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/howtoapply.jpg" alt="">
            </a>
          </div>
           <div class="col-md-6 col-lg-4">
            <a href="partnerschool.php">

              <img class="img-fluid" src="img/partnerschool.png" alt="">
            </a>
          </div>

        </div>
      </div>
    </section>

    <!-- Officers -->
    <section class="bg-primary text-white mb-0" id="officer" style="padding-bottom: 5px;">

      <div class="container" >
         <h2 class="text-center text-uppercase text-secondary mb-0"> STO. TOMAS SCHOLARS ASSOCIATION OFFICERS </h2>
        <hr style="border-radius:100px;height:3px;background-color:Black;">
          <div class="row">
              <?php
          include 'config.php';
          $sql14 = "SELECT * FROM tbl_officers";
          $result14 = $conn->query($sql14);
          $count=0;
          while($row14 = $result14->fetch_assoc()){
            $count +=1;
            // if($count==1){
            //   echo '<div class="col-lg-12">
            //   <br>
            //   </div>';
            //     echo '<div class="col-lg-12">
            //     <div class="row">';
            //       echo '<div class="col-lg-3">
            //       </div>';
            //      echo '<div class="col-lg-3">
            //         <div class="card">
            //           <div class="card-body">
            //             <img src="officers/';
            //             echo $row14['image'];
            //             echo'" alt="officers" style="width:100%;"/>
            //           </div>
            //           <div class="card-footer">
            //             <h6 style="color:#45A2D1;"><center>';
            //             echo $row14['firstname'].' '. $row14['lastname'];
            //             echo '</center></h6>
            //             <p ><center><span style="color:#000000;">';
            //             echo  $row14['position'];
            //             echo '</span></center></p>
            //         </div>
            //         </div>
            //      </div>';
            // }else if($count==2){

            //   echo '<div class="col-lg-3">
            //         <div class="card">
            //           <div class="card-body">
            //             <img src="officers/';
            //             echo $row14['image'];
            //             echo'" alt="officers" style="width:100%;"/>
            //           </div>
            //           <div class="card-footer">
            //             <h6 style="color:#45A2D1;"><center>';
            //             echo $row14['firstname'].' '. $row14['lastname'];
            //             echo '</center></h6>
            //             <p ><center><span style="color:#000000;">';
            //             echo  $row14['position'];
            //             echo '</span></center></p>
            //         </div>
            //         </div>
            //      </div>';
            //       echo '</div>
            //      </div>';
            //       echo '<div class="col-lg-3">
            //   </div>';

            // }else if($count==3){
            //      echo '<div class="col-lg-12">
            //   <br>
            //   </div>';
            //     echo '<div class="col-lg-12">
            //     <div class="row">';

            //      echo '<div class="col-lg-3">
            //         <div class="card">
            //           <div class="card-body">
            //             <img src="officers/';
            //             echo $row14['image'];
            //             echo'" alt="officers" style="width:100%;"/>
            //           </div>
            //           <div class="card-footer">
            //             <h6 style="color:#45A2D1;"><center>';
            //             echo $row14['firstname'].' '. $row14['lastname'];
            //             echo '</center></h6>
            //             <p ><center><span style="color:#000000;">';
            //             echo  $row14['position'];
            //             echo '</span></center></p>
            //         </div>
            //         </div>
            //      </div>';

            // }else if($count==6){

            //   echo '<div class="col-lg-3">
            //         <div class="card">
            //           <div class="card-body">
            //             <img src="officers/';
            //             echo $row14['image'];
            //             echo'" alt="officers" style="width:100%;"/>
            //           </div>
            //           <div class="card-footer">
            //             <h6 style="color:#45A2D1;"><center>';
            //             echo $row14['firstname'].' '. $row14['lastname'];
            //             echo '</center></h6>
            //             <p ><center><span style="color:#000000;">';
            //             echo  $row14['position'];
            //             echo '</span></center></p>
            //         </div>
            //         </div>
            //      </div>';
            //       echo '</div>
            //      </div>';
                // $count=2;
            // }else{
               if($count==1){
                   echo '<div class="col-lg-12" style="height:10px;">';
                   echo '</div>';
               }else if($count>=4){
                   $count=0;
               }

               echo '<div class="col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <img src="officers/';
                        echo $row14['image'];
                        echo'" alt="officers" style="width:100%;height:220px;"/>
                      </div>
                      <div class="card-footer">
                        <h6 style="color:#45A2D1;"><center>';
                        echo $row14['firstname'].' '. $row14['lastname'];
                        echo '</center></h6>
                        <p ><center><span style="color:#000000;">';
                        echo  $row14['position'];
                        echo '</span></center></p>
                    </div>
                    </div>
                 </div>';
            // }


           }


          ?>
          <div class="col-lg-12">
          </div>
          </div>

      </div>

    </section>



    <!-- Calendar -->
    <section class="portfolio" id="calendar">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0"> CALENDAR OF ACTIVITIES </h2>
        <hr style="border-radius:100px;height:3px;background-color:Black;">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <?php
            $sql16 = "SELECT COUNT(*) as numreq FROM tbl_activity";
            $result16 = $conn->query($sql16);
            $row16 = $result16->fetch_assoc();

            if($row16['numreq']>0){
              echo '<table class="table">
              <thead>
                <tr>
                  <th style="width:15%;">Date</th>
                  <th style="width:15%;">Day</th>
                  <th style="width:20%;">Title of Activity</th>
                  <th style="width:50%;">Activity</th>
                </tr>
              </thead>
              <tbody>';
               $stats="PUBLISHED";
               $sql15 = "SELECT * FROM tbl_activity WHERE status='$stats' ORDER BY dates DESC";
                $result15 = $conn->query($sql15);
                while($row15 = $result15->fetch_assoc()){
                   echo '<tr>';
                    echo '<td>';
                    echo $row15['dates'];
                    echo '</td>';
                    echo '<td>';
                    echo $row15['dayname'];
                    echo '</td>';
                    echo '<td>';
                    echo $row15['title'];
                    echo '</td>';
                    echo '<td>';
                    echo $row15['description'];
                    echo '</td>';
                    echo '</tr>';
                }

              echo '</tbody>
            </table>';
            }else{
              echo "<center>No Activity</center>";
            }

          ?>

         </div>




        </div>
      </div>
    </section>

     <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about" style="padding-bottom: 5px;">
      <div class="container" >
        <h2 class="text-center text-uppercase text-white"> ABOUT SCHOLARSHIP </h2>
        <hr style="border-radius:100px;height:3px;background-color:White; width:800px;">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead"><?php echo $row3['body'];?>
                <br></p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">
            <?php echo $row4['body'];?>
            </p>
          </div>
        </div>

        <div class="text-center mt-4">
        <a href="https://www.facebook.com/Sto.TomasScholarship">
          <div class="btn btn-xl btn-outline-light">
            <i class="fa fa-home mr-2"></i>
            Visit YDO Facebook Page now!

          </div>
          </a>

        </div>

      </div>
      <p style="font-size: 80%;text-align: center;padding-top: 5%;"><br> </p>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">WHAT TO DO?</h4>
            <p class="lead mb-0">
                Apply now at Youth Development Office or Online using this website. Fill up and
                print the application form and kindly bring it to our office.
            </p>
          </div>

          <div class="col-md-6 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"> Manage YDO </h4>
            <p class="lead mb-0">
               <a href="login.php" style="text-decoration:none;color:green;">
                   Log In </a> | Youth Development Office
            </p>
          </div>


        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>
     Copyright &copy; Youth Development Office 2018
        </small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    <!-- Peintform
      <div class="portfolio-modal mfp-hide" id="printform">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/cabin.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- YDO College -->
    <div class="portfolio-modal mfp-hide" id="YDOcollege">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <img src="img/logo.png" class="bggray">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h3 class="text-secondary text-uppercase mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;"> College Scholarship  <hr style="border-radius:100px;height:3px;background-color:black; width:500px;"> </h3>


          <div style="padding-top:5%"></div>
            <h5 class="text-secondary  mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">

          <b>100% SCHOLARSHIP PROGRAM</b><br><br><br>
            Only incoming 1st year college can apply	<br><br>
            With general average of at least 85% and <br><br>
            with no grade below 80% <br><br>
            Will enroll in the following schools: <br><br>
            1. FAITH Colleges<br><br>
            2. Tanauan Institute Inc. <br><br>
            3. Marcelino Fule Memorial College <br><br>
            4. La Consolacion College Tanauan <br><br>
            5. FIRST College <br><br>
            Must be a bonafide resident of
            Sto. Tomas, Batangas

            </h5>
          <div style="padding-top:15%"></div>

             <div class="text-center mt-4">
        <a  href="form.php?form_type=1">
          <div class="btn btn-xl btn-outline-success" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
            <i class="fa fa-upload mr-2"></i>
            Register Now
        </div>
          </a>
        </div>

             <div class="text-center mt-4" >
        <a  href="files/ydo.pdf" download>
          <div class="btn btn-xl btn-outline-success" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
            <i class="fa fa-download mr-2"></i>
            Print Application Form
        </div>
          </a>
        </div>

            <div style="padding-top:35%"></div>
            <a class="btn btn-primary btn-lg  rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close</a>
          </div>
        </div>
      </div>
    </div>

       <!-- SHS -->
       <div class="portfolio-modal mfp-hide" id="shs">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <img src="img/logo.png" class="bggray">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;"> SENIOR HIGH SCHOOL <hr style="border-radius:100px;height:3px;background-color:black; width:570px;"> </h2>



              <div style="padding-top:5%"></div>
              <h5 class="text-secondary  mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">

          EDUCATIONAL ASSISTANCE PROGRAM


             <br><br><br>
             Grade 11 and Grade 12 Students can apply <br><br>
            With general average of at least 83% and  <br><br>
            with no failing grade <br><br>
            Will enroll in any Public or Private School <br><br>
            Must be a bonafide resident of
            Sto. Tomas, Batangas

            </h5>
          <div style="padding-top:5%"></div>

              <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">

              <a  href="form.php?form_type=11">
          <div class="btn btn-xl btn-outline-success" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
            <i class="fa fa-upload mr-2"></i>
            Register Now
        </div>
              <!-- <ul class="nav nav-inline" style="display:inline-block;vertical-align:bottom;border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" style="font-size:140%;">
                    Register Now
                  </a>
                  <div class="dropdown-menu" >

                  <h4><a class="dropdown-item" href="form.php?form_type=11"> Grade 11 </a></h4>
                  <h4><a class="dropdown-item" href="form.php?form_type=12"> Grade 12 </a></h4>

                  </div>
                </li>
                </ul> -->




            </div>




             <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">


                <ul class="nav nav-inline" style="display:inline-block;vertical-align:bottom;border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  href="files/ydo.pdf" download role="button" aria-haspopup="true" aria-expanded="true" style="font-size:140%;">
                      Print Application Form
                    </a>
                    <!-- <div class="dropdown-menu" >

                    <h4><a class="dropdown-item" href="files/SHS_Grade11.pdf" download> Grade 11 </a></h4>
                    <h4><a class="dropdown-item" href="files/SHS_Grade12.pdf" download> Grade 12 </a></h4>

                    </div>  -->
                  </li>
                  </ul>

                </div>

            <div style="padding-top:35%"></div>
            <a class="btn btn-primary btn-lg  rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close</a>
          </div>
        </div>
      </div>
    </div>

        <!-- EA College -->
        <div class="portfolio-modal mfp-hide" id="eacollege">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <img src="img/logo.png" class="bggray">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;"> COLLEGE <hr style="border-radius:100px;height:3px;background-color:black; width:300px;"> </h2>



              <div style="padding-top:5%"></div>
              <h5 class="text-secondary  mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">

          EDUCATIONAL ASSISTANCE PROGRAM

             <br><br><br>
            Students from all college level can apply	<br><br>
            With general average of at least 80% or 2.50 and  <br><br>
            with no failing grade <br><br>
            Will enroll in any Public or Private School <br><br>
            Must be a bonafide resident of
            Sto. Tomas, Batangas

            </h5>
          <div style="padding-top:5%"></div>

              <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">


             <div class="text-center mt-4">
        <a  href="form.php?form_type=3">
          <div class="btn btn-xl btn-outline-success" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
            <i class="fa fa-upload mr-2"></i>
            Register Now
        </div>
          </a>
        </div>




            </div> <br>




             <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">


              <ul class="nav nav-inline" style="display:inline-block;vertical-align:bottom;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="files/ydo.pdf" download role="button" aria-haspopup="true" aria-expanded="true" style="font-size:140%;border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
                    Print Application Form
                  </a>
                 <!--  <div class="dropdown-menu" >

                    <h4><a class="dropdown-item" href="files/EaCollege1st.pdf" download> 1st Year </a></h4>
                    <h4><a class="dropdown-item" href="files/EaCollege2nd.pdf" download> 2nd Year </a></h4>
                    <h4><a class="dropdown-item" href="files/EaCollege3rd.pdf" download> 3rd Year </a></h4>
                    <h4><a class="dropdown-item" href="files/EaCollege4th.pdf" download> 4th Year </a></h4>
                    <h4><a class="dropdown-item" href="files/EaCollege5th.pdf" download> 5th Year </a></h4>

                  </div>  -->
                </li>
                </ul>

            </div>

            <div style="padding-top:35%"></div>
            <a class="btn btn-primary btn-lg  rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close</a>
          </div>
        </div>
      </div>
    </div>

    <!-- REQUIREMENTS -->
    <div class="portfolio-modal mfp-hide" id="requirements">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <img src="img/logo.png" class="bggray">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;"> General Requirements <hr style="border-radius:100px;height:3px;background-color:black; width:650px;"> </h2>


              <!--
                SAMPLE IMAGE IF NEEDED
                <img class="img-fluid mb-5" src="img/portfolio/game.png" alt="">-->


              <div style="padding-top:10%"></div>
              <h5><p class="mb-5" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">
                 <?php
            include 'config.php';
            $sql16 = "SELECT * FROM tbl_list_req";
            $result16 = $conn->query($sql16);
            $count=1;
            while($row16 = $result16->fetch_assoc()){

                  echo $count;
                  echo ') ';
                  echo $row16['listreq'];
                  echo '<br><br>';
                  $count=$count+1;
            }
            ?>


              <!--
              1) Application Form <br> <br>
              2) Birth Certificate <br> <br>
              3) Grade Report <br> <br>
              4) School Clearance/<br>Certificate of Good Moral Character <br> <br>
              5) Parents Voter's ID <br> <br>
              6) Student's Registration Form <br> <br>
              7) Vicinity Map/House Sketch <br> <br>
              8) Barangay Clearance <br> <br>
              9) 1x1 ID Picture <br> <br>
              10) (if parents and other household members are employed)Income tax return or Certificate of Employment and Compensation<br>
              <br>11) (if parents are NOT employed) Certificate of Unemployment from the Municipal/Barangay Hall/certificate of indigency/ITR(form 2316) <br>
              <br>12) Entrance Exam (For 1st Year College Only) <br> <br> -->
               </p></h5>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal mfp-hide" id="howtoapply">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <img src="img/logo.png" class="bggray" style="height:800px;">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0" style ="border-radius: 25px;background-color: #f2f2f2; padding:30px;
              box-shadow: 20px 20px 100px 1px #9B9B9B;">Be Guided  <hr style="border-radius:100px;height:3px;background-color:black; width:150px;"> </h2>


              <div style="padding-top:15%"></div>
             <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/iOkzZ3e0www"" allowfullscreen></iframe>
            </div>


            <div style="padding-top:25%"></div>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-6">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/submarine.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->




    <script src="vendors/jquery/jquery.min.js"></script>

    <script src="jquery-3.3.1.min.js"></script>
    <script src="modalJquery.js"></script>

    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendors/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendors/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="vendors/js/jqBootstrapValidation.js"></script>
    <script src="vendors/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="vendors/js/freelancer.min.js"></script>

    <script src="js/slick.js" type="text/javascipt"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('.thing').slick({
                  dots: true,
                  arrows: false,
                  autoplay: true,
                  autoplaySpeed: 1500,
                  infinite: true,
                  fade: true,
                  cssEase: 'linear'
              });
        });
    </script>

  </body>

</html>
