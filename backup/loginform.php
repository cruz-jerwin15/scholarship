<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YDO</title>
    <link rel="icon" href="img/logo.png">

    <!-- Bootstrap core CSS -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendors/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="vendors/css/freelancer.min.css" rel="stylesheet">

  </head>

    





  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav" style="background-color:#45A2D1;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> YDO  </a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php"> Home </a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#home"> Log in </a>
            </li>
            

            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container" id="home">
     
      <div style="padding-top:10%"></div>
      <div class="row">
         <div class="col-md-4">
         </div>
        <div class="col-md-4">
             <h1 class="text-uppercase mb-0"> LOGIN </h1> <br>
                
                            <form action="dblogin.php" method="post" name="login">
                           
                              <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" required>
                              </div>

                              <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
                              </div>
                               
                                <input type="submit" class="btn btn-xl btn-outline-light"  value ="Submit" name = "submit">
                                     
                                
                               
                                
                            </form>
        
  
                            <div style="padding-top:5%"></div>
        </div>
         <div class="col-md-4">
         </div>
      </div>

               
  

        
         <!-- </h2> -->
      </div>
    </header>

   

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
            <h4 class="text-uppercase mb-4"> Manage Applicants </h4>
            <p class="lead mb-0">
               <a href="loginform.php" style="text-decoration:none;color:green;"> 
                   Log In </a> | Youth Development Office
            </p>
          </div>


        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>
        Copyright (c) 2013-2018 Blackrock Digital LLC
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

      <!-- Peintform -->
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
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"> YDO College </h2>
              <hr style="border-radius:100px;height:3px;background-color:black; width:150px;">
               
              <!--
              <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">
              
              
              <ul class="nav nav-inline" style="display:inline-block;vertical-align:bottom;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" style="font-size:140%;">
                    FILL UP APPLICATION NOW
                  </a>                    
                  <div class="dropdown-menu" >            
                      
                    <a class="dropdown-item" href="form.php?form_type=1"> 1st Year </a>
                    <a class="dropdown-item" href="form.php?form_type=2"> 2nd Year </a>
                    <a class="dropdown-item" href="form.php?form_type=3"> 3rd Year </a>
                   
                  </div>  
                </li>
                </ul>
              

              
             
            </div>
            -->

          <div style="padding-top:15%"></div>


             <div class="text-center mt-4">
        <a  href="form.php?form_type=3">
          <div class="btn btn-xl btn-outline-success">
            <i class="fa fa-upload mr-2"></i>
            Fill up the Application Form
        </div>
          </a>
        </div>

             <div class="text-center mt-4">
        <a  href="/files/YDO.pdf" download>
          <div class="btn btn-xl btn-outline-success">
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
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"> Senior High School </h2>
              <hr style="border-radius:100px;height:3px;background-color:black; width:150px;">
               
              
              <div style="padding-top:15%"></div>

              <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">
              
              
              <ul class="nav nav-inline" style="display:inline-block;vertical-align:bottom;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" style="font-size:140%;">
                    FILL UP APPLICATION NOW
                  </a>                    
                  <div class="dropdown-menu" >            
                      
                    <a class="dropdown-item" href="form.php?form_type=11"> Grade 11 </a>
                    <a class="dropdown-item" href="form.php?form_type=12"> Grade 12 </a>
                   
                  </div>  
                </li>
                </ul>
              

              
             
            </div>
            

         

             <div class="text-center mt-4">
        <a  href="/files/EA_SHS.pdf" download>
          <div class="btn btn-xl btn-outline-success">
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

        <!-- EA College -->
        <div class="portfolio-modal mfp-hide" id="eacollege">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"> EA COLLEGE </h2>
              <hr style="border-radius:100px;height:3px;background-color:black; width:150px;">
               
              
              <div style="padding-top:15%"></div>

              <div style="padding-top:50px;display:inline-block;vertical-align:bottom;">
              
              
              <ul class="nav nav-inline" style="display:inline-block;vertical-align:bottom;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" style="font-size:140%;">
                    FILL UP APPLICATION NOW
                  </a>                    
                  <div class="dropdown-menu" >            
                      
                    <a class="dropdown-item" href="form.php?form_type=21"> 1st Year </a>
                    <a class="dropdown-item" href="form.php?form_type=22"> 2nd Year </a>
                    <a class="dropdown-item" href="form.php?form_type=23"> 3rd Year </a>
                    <a class="dropdown-item" href="form.php?form_type=24"> 4th Year </a>
                    <a class="dropdown-item" href="form.php?form_type=25"> 5th Year </a>
                   
                  </div>  
                </li>
                </ul>
              

              
             
            </div>
            

         

             <div class="text-center mt-4">
        <a  href="/files/YDO.pdf" download>
          <div class="btn btn-xl btn-outline-success">
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

    <!-- REQUIREMENTS -->
    <div class="portfolio-modal mfp-hide" id="requirements">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"> Application Requirements </h2>
              <hr style="border-radius:100px;height:3px;background-color:black; width:150px;">
              
              <!--
                SAMPLE IMAGE IF NEEDED
                <img class="img-fluid mb-5" src="img/portfolio/game.png" alt="">-->


              <div style="padding-top:10%"></div>
              <p class="mb-5">
              
              1) Application Form <br>
              2) Birth Certificate <br>
              3) Grade Report <br>
              4) School Clearance <br>
              5) Parents Voter's ID <br>
              6) Student's Registration Form <br>
              7) Vicinity Map/House Sketch <br>
              8) Barangay Clearance <br>
              9) 1x1 ID Picture <br>
              10) (if parents and other household members are employed)Income tax return or Certificate of Employment and Compensation<br>  
              11) (if parents are NOT employed) Certificate of Unemployment from the Municipal/Barangay Hall/certificate of indigency/ITR(form 2316) <br>
              12) Entrance Exam (For College Only) <br>
               </p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
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
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"> How to Apply? </h2>
              <hr style="border-radius:100px;height:3px;background-color:black; width:150px;">
              
              <div style="padding-top:10%"></div>
              
              <p class="mb-5">
              
          1.  Check the requirements for application <br>
          2.  Click the application form and choose the right scholarship application <br>
          3.  Fill up the application form and submit the form
               
               </p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
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
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendors/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendors/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="vendors/js/jqBootstrapValidation.js"></script>
    <script src="vendors/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="vendors/js/freelancer.min.js"></script>

  </body>

</html>
