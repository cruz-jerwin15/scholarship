<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      EPS
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <!--Fonts-->
    <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="assets/fonts/simple-line-icons.css">    
     
    <!-- Extras -->
    <link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/settings.css">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="assets/css/colors/green.css" media="screen" />       

    <script type="text/javascript">

      function displaydata(){
        $.post("GetID.php",{},function(data){

          var myData = data.split(" $ ");
          sessionStorage.setItem("data", myData);
          window.location.href = "generated_application_form.php";

        });
      }

    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <![endif]-->

      <style>
    .divider-vertical {
            height: 50px;
            margin-top: 0;
            margin-bottom: 0;
            margin-left: 20px;
            margin-right: 10px;
            border-left: 1px solid #a8a8a8;
            border-right: 1px solid #a8a8a8;
        }
  </style>

  </head>
  <body>

  <!-- Header area wrapper starts -->
    <header id="header-wrap">

      <!-- Roof area starts -->
      
      <!-- Roof area Ends -->

      <!-- Header area starts -->
      <section id="header">

        <!-- Navbar Starts -->
        <nav class="navbar navbar-light" data-spy="affix" data-offset-top="50">
          <div class="container">
              
         

            <!-- Brand -->
            <a class="navbar-brand" href="index.php">
              <img src="img/logo.png" alt="" style="width:35px;height:35px;"> 
            </a>



            <div class="collapse navbar-toggleable-sm pull-xs-left pull-md-right" id="main-menu">
              <!-- Navbar Starts -->
            <ul class="nav nav-inline">
             
                <li class="nav-item dropdown">
                  <a class="nav-link active" href="indexs.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>                  
                </li>                                     
                        
               
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Fill Up Now
                  </a>                    
                  <div class="dropdown-menu">            
                      
                    <a class="dropdown-item" href="form.php?form_type=1"> Senior High School </a>
                    <a class="dropdown-item" href="form.php?form_type=2"> College </a>
                    <a class="dropdown-item" href="form.php?form_type=3"> EPS College </a>
                   
                  </div>  
                </li>
          
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Log In
                  </a>
                 
                </li>          
                <!-- Search in right of nav -->
           
                <!-- Search Ends -->                  
              </ul>  
            </div>              
              <!-- Form for navbar search area -->
  
              <!-- Search form ends -->
          </div>
        </nav>
        <!-- Navbar Ends -->

      </section> 
    <!-- Start Content -->
<div id="free-promo" style="
    text-align: center;
    margin-top: 60px;
">
      <div class="container"">
          <div class="row text-center">
              <div class="error-page">
                <h1  style="padding-bottom:5%;color:#9C3"> EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM </h1>
                <a rel="nofollow" onclick="displaydata()" style="color:white;" class="btn btn-common btn-lg"> Print Application Form </a>
            </div>
          </div>
      </div>         
    </div>
    <!-- End Content --> 
    </header>
    <!-- Header-wrap Section End -->
   
    <!-- Service Block-1 Section -->
    <section id="service-block-main" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="row">        
          <h1 class="section-title wow fadeIn animated" data-wow-delay=".2s" >
           <p style="font-size:40px;color: #61CCF3;"> WHY CHOOSE EPS? </p>
          </h1>
          <p class="section-subcontent"> about eps po ito ilagay kung ano man yung gusto <br> para po sa mga magaapply </p>
          <div class="col-sm-6 col-md-4">
            <!-- Service-Block-1 Item Starts -->
            <a href="form.php?form_type=1">
            <div class="service-item wow fadeInUpQuick animated" data-wow-delay=".5s">
              <div class="icon-wrapper">
                <i class="icon-layers pulse-shrink">
                </i>
              </div>
              <h2>
                Senior High School
              </h2>
              <p style="color:#61CCF3;">
                Fill Up application Form Now for SHS Scholarship Application
              </p>
            </div>
          </a>
            <!-- Service-Block-1 Item Ends -->
         </div>

          <div class="col-sm-6 col-md-4">
            <!-- Service-Block-1 Item Starts -->
            <a href="form.php?form_type=2">
            <div class="service-item wow fadeInUpQuick animated" data-wow-delay=".5s">
              <div class="icon-wrapper">
                <i class="icon-layers pulse-shrink">
                </i>
              </div>
              <h2>
                College
              </h2>
              <p style="color:#61CCF3;">
                Fill Up application Form Now for a College Scholarship Application
              </p>
            </div>
          </a>
            <!-- Service-Block-1 Item Ends -->
         </div>

          <div class="col-sm-6 col-md-4">
            <!-- Service-Block-1 Item Starts -->
          <a href="form.php?form_type=3">
            <div class="service-item wow fadeInUpQuick animated" data-wow-delay=".5s">
              <div class="icon-wrapper">
                <i class="icon-layers pulse-shrink">
                </i>
              </div>
              <h2>
                EPS College
              </h2>
              <p style="color:#61CCF3;">
                Fill Up application Form Now for EPS College Scholarship Application
              </p>
            </a>
            </div>
            <!-- Service-Block-1 Item Ends -->
         </div>
         <!-- Service-Block-1 Item Ends -->
        </div>
      </div><!-- Container Ends -->
    </section><!-- Service Main Section Ends -->

    <!-- About Us Section Start -->
   
    <!-- Featured Section Starts -->
    <section id="featured" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="row">
          <h1 class="section-title wow fadeInUpQuick" >
            <font style="color:#61CCF3;"> Requirements for Application </font>
          </h1>
          <p class="section-subcontent" style="color:#9C3;"> Please bring the following requirements for application </p>

          <!-- Start featured Icon 1 -->
          <div class="col-md-4 col-sm-6" data-animation="fadeIn" data-animation-delay="01">
            <div class="featured-box">
              <div class="featured-icon">
                <i class="icon-pencil">
                </i>
              </div>
              <div class="featured-content">
                <h4>
                  Application Form <br> <br> Birth Certificate <br> <br> Grade Report
                </h4>
                
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6" data-animation="fadeIn" data-animation-delay="01">
            <div class="featured-box">
              <div class="featured-icon">
                <i class="icon-pencil">
                </i>
              </div>
              <div class="featured-content">
                <h4>
                 School Clearance <br> <br> 1x1 Id Picture <br> <br> Vicinity Map/House Sketch
                </h4>
               
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6" data-animation="fadeIn" data-animation-delay="01">
            <div class="featured-box">
              <div class="featured-icon">
                <i class="icon-pencil">
                </i>
              </div>
              <div class="featured-content">
                <h4>
                 Barangay Clearance <br> <br> Parents Voter's ID <br> <br> Student's Registration Form
                </h4>
               
              </div>
            </div>
          </div>



          <div class="col-md-6 col-sm-6" data-animation="fadeIn" data-animation-delay="01">
            <div class="featured-box">
              <div class="featured-icon">
                <i class="icon-pencil">
                </i>
              </div>
              <div class="featured-content">
                <h4 style="text-align:justify;">
                 (if parents and other household members are employed)Income tax return or Certificate of Employment and Compensation
                </h4>
               
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6" data-animation="fadeIn" data-animation-delay="01">
            <div class="featured-box">
              <div class="featured-icon">
                <i class="icon-pencil">
                </i>
              </div>
              <div class="featured-content">
                <h4 style="text-align:justify;">
                 (if parents are NOT employed) Certificate of Unemployment from the Municipal/Barangay Hall/certificate of indigency/ITR(form 2316)
                </h4>
               
              </div>
            </div>
          </div>

          
       
      <!-- Container Ends -->
    </section>

   
    
    <!-- Footer Section -->
    <footer>
      <!-- Container Starts -->
      <div class="container">
        <!-- Row Starts -->
        <div class="row section">
          <!-- Footer Widget Starts -->
          <div class="footer-widget col-md-3 col-xs-12 wow fadeIn">
            <h3 class="small-title">
              ABOUT US
            </h3>
            <p>
              <font style="color:#9C3;"> EPS (Edukasyon Pahalagahan Sagot sa kinabukasan) </font> is a Scholarship Grant for students living in Sto. Tomas Batangas
            </p> 
            <p> Apply now at the muinicipal hall of Sto. Tomas or Online using this website </p>
            <div class="social-footer">
              <a href="#"><i class="fa fa-facebook icon-round"></i></a>
              <a href="#"><i class="fa fa-twitter icon-round"></i></a>
              <a href="#"><i class="fa fa-linkedin icon-round"></i></a>
              <a href="#"><i class="fa fa-google-plus icon-round"></i></a>
            </div>           
          </div><!-- Footer Widget Ends -->
          
          <!-- Footer Widget Starts -->
          <div class="footer-widget col-md-3 col-xs-12 wow fadeIn" data-wow-delay=".2s">
            <h3 class="small-title">
              FACEBOOK
            </h3>
            <ul class="recent-tweets">
              <li class="tweet">
                Connect with us at <a href="#"> <font <font style="color:#61CCF3;">  @EPS  </font> </a>                
                <span class="tweet-text">
                 kindly ask us anything at our facebook account by messaging our facebook page.
                </span>
          
              </li>
              
              
              <li class="tweet">
                FACEBOOK | Connect with us! <a href="#">  <font <font style="color:#61CCF3;"> wpbean.com/wpb-advanced-faq-pr… </font> </a>               
                </span>
              </li>
              
              
            </ul>
          </div><!-- Footer Widget Ends -->
        </div><!-- Row Ends -->
      </div><!-- Container Ends -->
      
      <!-- Copyright 
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <p class="copyright-text">
                ©  2016 Engage. All right reserved. Designed with by <a href="#">GrayGrids</a>
              </p>
            </div>
            <div class="col-md-6  col-sm-6">
              <ul class="nav nav-inline pull-xs-right">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Sitemap</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Privacy Policy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Terms of services</a>
                </li>
              </ul>        
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright  End-->
      
    </footer>
    <!-- Footer Section End-->
    
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up">
      </i>
    </a>

    <div class="bottom"> <a href="#" class="settings"></a> </div>

    <!-- JavaScript & jQuery Plugins -->
    <!-- jQuery Load -->
    <script src="assets/js/jquery-min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Text Rotator-->
    <script src="assets/js/jquery.mixitup.js"></script>
    <!--WOW Scroll Spy-->
    <script src="assets/js/wow.js"></script>
    <!-- OWL Carousel -->
    <script src="assets/js/owl.carousel.js"></script>
 
    <!-- WayPoint -->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- CounterUp -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- ScrollTop -->
    <script src="assets/js/scroll-top.js"></script>
    <!-- Appear -->
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.vide.js"></script>
     <!-- All JS plugin Triggers -->
    <script src="assets/js/main.js"></script>
  
    
  </body>
</html>