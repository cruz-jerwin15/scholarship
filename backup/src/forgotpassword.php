<?php
  include 'config.php';
  ini_set('display_errors',"1");
?>  <!-- DOCTYPE -->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EPS</title>
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
    

</script>

    <style>
      .triggerer{
        display: block;
      }
      
      .d-nonehere{
        display:none;
      }
     
    .divider-vertical {
            height: 50px;
            margin-top: 0;
            margin-bottom: 0;
            margin-left: 20px;
            margin-right: 10px;
            border-left: 1px solid #a8a8a8;
            border-right: 1px solid #a8a8a8;
        }

            .list{
    width:200px;
    height:200px;
    border:1px solid #09F;
    display:block;
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center top;  
}

  .boxer{
      background-color: red; 
  }

  .section{
    background-color: red;
  }
    </style>
  


  </head>

  
  <script type="text/javascript">

function displaydata(){
  $.post("GetID.php",{},function(data){

    var myData = data.split(" $ ");
    sessionStorage.setItem("data", myData);
    window.location.href = "generated_application_form.php";

  });
}

</script>

<script type="text/javascript">
function getAge(){
      var birthdate = document.getElementById('birthdate').value;
      birthdate = new Date(birthdate);
      var today = new Date();
      var Age = Math.floor((today-birthdate) / (365.25 * 24 * 60 * 60 * 1000));
      document.getElementById('Age').value=Age;
  }
</script>


    
 
    <?php
    $ps_option = array();
    $form_title = '';
    $form_level = '';
    if(isset($_GET['form_type'])){
      $form_type = $_GET['form_type'];

      switch ($form_type) {
        case '11':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(Senior High - Grade 11)';
          break;

        case '12':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(Senior High - Grade 12)';
          break;
        
        case '21':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(College - 1st Year)';
          break;

        case '22':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(College - 2nd Year)';
          break;

        case '23':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(College - 3rd Year)';
          break;

        case '24':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(College - 4th Year)';
          break;
          
        case '25':
          $form_title = 'EDUCATIONAL ASSISTANCE PROGRAM';
          $form_level = '(College - 5th Year)';
          break;
        case '3':
          $form_title = 'EPS SCHOLARSHIP PROGRAM';
          $form_level = '(College)';

          $query = mysqli_query($conn, "SELECT
          a.id,
            a.school_name,
            a.img
        FROM tbl_partnerschool a");
                  if(mysqli_num_rows($query)!=0){
                    while($rows=mysqli_fetch_assoc($query)){
                      array_push($ps_option, $rows);
                    } 
                    $conn->next_result();
                  }
          break;
        default:
          break;
      }
    }


  ?>

  

     

        

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
           
            

            </li>
          </ul>
        </div>
      </div>
    </nav>

   

                       <div class="boxer" style="height:650px;"> 

                                <section id="service-block-main" class="section" style="  background-color: #F2EEEE;">
                      <!-- Container Starts -->
                      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth  theme-one" style="height:650px;">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4">Forgot Password</h2>
              <div class="auto-form-wrapper">
                <form action="dbforgotpassword.php" method="post" name="login">
                  <div class="form-group">
                      <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Enter your email here." required>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary submit-btn btn-block" value="Submit">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
                                       


                       </div>

                                    <div class="col-lg-2"></div>

                                  </center>
                              </div>
                          </div>
                    
                        </section>


                            <div id="sib-content-temps" class="d-none" style="display:none;">
                            <div class="row">

                              <div class="col-lg-4"> 

                                <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" class="thesibsib">
                                      <label> Siblings' First Name </label>
                                  <input type="text" id="asdd" class="another" name="sib_fname[]" class="form-control input-lg"  placeholder="Sibling's First Name" >
                                </div>
                                </div>

                              </div>


                              <div class="col-lg-4"> 

                                <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Sibling's Middlet Name </label>
                                  <input type="text" class="sibmnameanother" name="sib_mname[]" class="form-control input-lg" placeholder="Sibling's Middle Name" >
                                </div>
                                </div>

                              </div>


                              <div class="col-lg-4"> 

                                <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label>Sibling's Last Name </label>
                                  <input type="text" class="siblnameanother" name="sib_lname[]" class="form-control input-lg" placeholder="Sibling's Last Name" >
                                </div>
                                </div>

                              </div>
                            </div>
                            <div class="row">

                              <div class="col-lg-4"> 

                                <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Educational Assistance </label>
                                  <input type="text" class="sibeducanother" name="sib_educ_assist[]" class="form-control input-lg" placeholder="Educational Assistance" >
                                </div>
                                </div>

                              </div>


                              <div class="col-lg-4"> 

                                <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Course </label>
                                  <input type="text" class="sibcourseanother" name="sib_course[]" class="form-control input-lg" placeholder="Course" >
                                </div>
                                </div>

                              </div>

                              <div class="col-lg-4"> 

                                <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Year </label>
                                  <input type="text" class="sibyearanother" name="sib_year[]" class="form-control input-lg" placeholder="Year" >
                                </div>
                                </div>

                              </div>
                            </div>
                            <hr>
                          </div>
                       
  
                            <div style="padding-top:5%"></div>

                            
  

        

   

   

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>
        Copyright © Youth Development Office 2018
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

 <!-- REQUIREMENTS -->
 <div class="portfolio-modal mfp-hide" id="req"> 
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
               <?php
            include 'config.php';
            $sql16 = "SELECT * FROM tbl_list_req";
            $result16 = $conn->query($sql16);
            $count=1;
            while($row16 = $result16->fetch_assoc()){
                 
                  echo $counts;
                  echo ') ';
                  echo $row16['listreq'];
                  echo '<br>';
                  $counts=$counts+1;
            }
              
            
            ?>
             <!--  1) Application Form <br>
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
              12) Entrance Exam (For College Only) <br> -->
               </p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close </a>
            </div>
          </div>
        </div>
      </div>
    </div>
 <div class="d-nonehere"  class="thedisabler" class="portfolio-modal"  id="view"> 
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#" style="float: right;padding-right:35px;padding-top:35px;">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary"> Preview of Profile </h2>
              <hr style="border-radius:100px;height:3px;background-color:black; width:150px;">
              
              <!--
                SAMPLE IMAGE IF NEEDED
                <img class="img-fluid mb-5" src="img/portfolio/game.png" alt="">-->




              <div style="padding-top:10%"></div>

               <div class="row">
               <div class="col-lg-12"> 
                                    <center>
                                        <div class="img-holder" data-render="1">
                                      <div class="list"></div>
                                    </div>
                                    </center>
                                    <div style="padding-bottom:5%"></div>
                                  </div>

                  </div>
              
              <div class="row">


                                       

<div class="col-lg-12"> 
    

</div>

</div>

<div class="row">


<div class="col-lg-12"> 
    <center>
   <h4 style="background-color:#9C3;padding:5px;"><small style="color:white;">  PERSONAL BACKGROUND  </small></h4>
    </center>

</div>

</div>


<div class="row">

<div class="col-lg-4"> 







<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label>First Name</label>
<input class="form-control" type="text" name="mname" id="qwere" class="form-control input-lg" placeholder="dsa" required disabled>
</div>
</div>
</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label>Middle Name</label>
<input type="text" name="middlename" id="midname" class="form-control input-lg" placeholder="Middle Name*" required disabled>
</div>
</div>
</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label>Last Name</label>
<input type="text" name="lastname" id="lname" class="form-control input-lg" placeholder="Last Name*" required disabled>
</div>
</div>
</div>

</div>

<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label>Birthdate</label>
 <input type="text" placeholder="ds" name="birthdate" id="bd" class="form-control input-sm " onblur="getAge();" disabled>
</div>
</div>

</div>




<div class="col-lg-2"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label>Age</label>
 <input type="number" maxlength="3"  id ="myage" name="Age" class="form-control input-lg" placeholder="Age"
 readonly="readonly" >
</div>
</div>

</div>


<div class="col-lg-2" style="padding-top:30px;"> 

<div class="dropdown">
   <button class="btn btn-success dropdown-toggle" id="gen" type="button" data-toggle="dropdown" required disabled> Gender
   <span class="caret"></span></button>
   <ul class="dropdown-menu">
     <li><label class="radio-inline"><input type="radio" value="1" name="Sex"> Male </label>
     </li>
     <li> <label class="radio-inline"><input type="radio" value="0" name="Sex"> Female </label> </li>
   </ul>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2">
<label>Birth Order </label>
<input type="text"  id ="birthOrderprev" name="birthOrderprev" class="form-control input-lg" placeholder="Birth Order"
 >
</div>
</div>

</div>

</div>


<div class="row">

<div class="col-lg-8"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Place of Birth</label>
 <input type="text" name="PlaceOfBirth" id="pob" class="form-control input-lg" placeholder="Place of Birth*" required disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Citizenship </label>
 <input type="text" name="Citizenship" id="citizensh" class="form-control input-lg" placeholder="Citizenship*" required disabled>
</div>
</div>

</div>

</div>




<div class="row">

<div class="col-lg-4"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Street </label>
 <input type="number" id="hnum" name="Street" class="form-control input-lg" placeholder="House Number"  disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Roadname </label>
 <input type="text" id="rn" name="RoadName" class="form-control input-lg" placeholder="Road Name" disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Barangay </label>
 <input type="text" id="brgy" name="Barangay" class="form-control input-lg" placeholder="Barangay*" required disabled>
</div>
</div>

</div>

</div>


<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Town </label>
 <input type="text" name="town" id="mtown" class="form-control input-lg" placeholder="Town*" required disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Province </label>
 <input type="text" name="province" id="prov" class="form-control input-lg" placeholder="Province*" required disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Religion </label>
                                          <input type="text" name="religionprev" id="religionprev"  class="form-control input-lg" placeholder="Religion">
                                        </div>
                                        </div>

                                      </div>

</div>


<div class="row">

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Last School Attended </label>
 <input type="text" name="LastSchoolAttended" id="lastsa" class="form-control input-lg" placeholder="Last School Attended*" required disabled>
</div>
</div>

</div>

</div>

<!-- START -->
<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> School Street Number </label>
 <input type="number" name="SchoolStreetNumber" id="ssn" class="form-control input-lg" placeholder="School's Street Number" disabled >
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> School's Road Name </label>
 <input type="text" name="SchoolRoadName" id="srn" class="form-control input-lg" placeholder="School's Road Name" disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> School's Barangay </label>
 <input type="text" name="SchoolBarangay" id="sbrgy"  class="form-control input-lg" placeholder="School's Barangay" disabled>
</div>
</div>

</div>

</div>


<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> School's Town </label>
 <input type="text" name="SchoolTown" id="st" class="form-control input-lg" placeholder="School's Town*" required disabled>
</div>
</div>

</div>

<div class="col-lg-8"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> School's Province </label>
 <input type="text" name="SchoolProvince" id="sp" class="form-control input-lg" placeholder="School's Province*" required disabled>
</div>
</div>

</div>

</div>


<div class="row">


<div class="col-lg-6"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Highest Year Attended </label>
 <input type="text" name="HighestYearAttended" id="hya" class="form-control input-lg" placeholder="Highest year Attended(sample: 4th year)*" required disabled>
</div>
</div>

</div>

<div class="col-lg-6"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> weighted average </label>
 <input type="number" name="WeightedAverage" id="ga" max="100" min="0" class="form-control input-lg" placeholder="Gen. Weighted Ave*" required disabled>
</div>
</div>

</div>

</div>

 <div class="row">


<div class="col-lg-6"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> GRADES(shs level): 1st SEM </label>
    <input type="number" max="100" name="gradeshsfirstsemprev" id="gradeshsfirstsemprev" class="form-control input-lg" placeholder="grade shs first sem*" required>
  </div>
  </div>

</div>

<div class="col-lg-6"> 

  <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> GRADES(shs level): 2nd SEM </label>
    <input type="number" id="gradeshssecondsemprev" name="gradeshssecondsemprev" max="100" min="0" class="form-control input-lg" placeholder="grade shs second sem*" required>
  </div>
  </div>

</div>

</div>


<div class="row">

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Email </label>
 <input type="email" name="Email" id="ea" class="form-control input-lg" placeholder="Email Address" disabled>
</div>
</div>
</div>

</div>

<div class="row">

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Fb Account </label>
 <input type="text" name="fb_account" id="fba" class="form-control input-lg" placeholder="FB account" disabled>
</div>
</div>
</div>

</div>

<div class="row">

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label>Contact Number </label>
 <input type="ContactNumber" id="cn" name="ContactNumber" class="form-control input-lg" placeholder="Contact Number" disabled>
</div>
</div>
</div>

</div>

<div class="row">

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Second Contact Number </label>
 <input type="ContactNumber" id="scn" name="ContactNumbertwo" class="form-control input-lg" placeholder="Second Contact Number" disabled>
</div>
</div>
</div>

</div>



<div class="row">

<div class="col-lg-12"> 

<div class="dropdown">
   <button class="btn btn-success dropdown-toggle" id="sitemodal" type="button" data-toggle="dropdown" required disabled> Gender
   <span class="caret"></span></button>
   
</div>

</div>

</div>


<div class="row">

<div class="col-lg-12"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Entrance Exam Rating </label>
 <input type="text" id="eer" name="EntranceExamRating" class="form-control input-lg" placeholder="Entrance Exam Rating*" required disabled>
</div>
</div>

</div>

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Course Intended to take </label>
 <input type="text" name="Course" id="courseintendedtotake" class="form-control input-lg" placeholder="Course intended to take*" required disabled>
</div>
</div>

</div>

<div class="col-lg-12"> 

<div class="dropdown">
   <button class="btn btn-success dropdown-toggle" id="yrc" type="button" data-toggle="dropdown" required disabled> Gender
   <span class="caret"></span></button>
   
</div>

</div>

</div>


<div class="row">

<div class="col-lg-12"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Grant </label>
 <input type="text" name="Grant" id="ge" class="form-control input-lg" placeholder="Other bursary or GRANT enjoyed" disabled >
</div>
</div>

</div>

</div>

<!-- END -->

<!-- START FAMILY -->
<div class="row">


<div class="col-lg-12"> 
    <center>
   <h4 style="background-color:#9C3;padding:5px;"><small  style="color:white;"> FAMILY BACKGROUND  </small></h4>
    </center>

</div>

</div>




<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Father's First Name </label>
<input type="text" id="ffn" name="FatherFirstName" class="form-control input-lg" placeholder="Father's First Name" disabled >
</div>
</div>

</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Father's Middle Name </label>
<input type="text" name="FatherMiddleName" id="fmn" class="form-control input-lg" placeholder="Father's Middle Name"  disabled>
</div>
</div>

</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Father's Last Name </label>
<input type="text" id="fln" name="FatherLastName" class="form-control input-lg" placeholder="Father's Last Name"  disabled>
</div>
</div>

</div>

</div>

<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Father's Age </label>
 <input type="number" id="fa" name="FatherAge"  class="form-control input-lg" placeholder="Father Age" disabled>
</div>
</div>

</div>

<div class="col-lg-8"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Father's Occupation </label>
 <input type="text" id="fo" name="FatherOccupation" class="form-control input-lg" placeholder="Father Occupation" disabled >
</div>
</div>

</div>

</div>


<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Mother's First Name </label>
<input type="text" id="mfn" name="MotherFirstName" class="form-control input-lg" placeholder="Mother's First Name"  disabled>
</div>
</div>

</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Mother's Middle Name </label>
<input type="text" id="mmn" name="MotherMiddleName" class="form-control input-lg" placeholder="Mother's Middle Name" disabled >
</div>
</div>

</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Mother's Last Name </label>
<input type="text" id="mln" name="MotherLastName" class="form-control input-lg" placeholder="Mother's Last Name" disabled >
</div>
</div>

</div>

</div>

<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Mother's Age </label>
 <input type="number" id="ma" name="MotherAge"  class="form-control input-lg" placeholder="Mother Age" disabled>
</div>
</div>

</div>

<div class="col-lg-8"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Mother's Occupation </label>
 <input type="text" id="mo" name="MotherOccupation" class="form-control input-lg" placeholder="Mother Occupation" disabled>
</div>
</div>

</div>

</div>

<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Parent's Street Number</label>
 <input type="number" id="psn" name="ParentStreetNumber" class="form-control input-lg" placeholder="Parent's StreetNumber" disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Parent's Road Name</label>
 <input type="text" id="prn" name="ParentRoadName" class="form-control input-lg" placeholder="Parent's Road Name" disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Parent's Barangay</label>
 <input type="text" id="pb" name="ParentBarangay" class="form-control input-lg" placeholder="Parent's Barangay*" required disabled>
</div>
</div>

</div>

</div>


<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Parent's Town</label>
 <input type="text" id="pt" name="ParentTown" class="form-control input-lg" placeholder="Parent's Town*" required disabled>
</div>
</div>

</div>


<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Parent's Province</label>
 <input type="text" id="pp" name="ParentProvince" class="form-control input-lg" placeholder="Parent's Province*" required disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Parent's Contact Number</label>
  <input type="text" id="parentcontactnumprev" name="parentcontactnumprev" class="form-control input-lg" placeholder="Parent's Contact Number" required>
</div>
</div>

</div>

</div>


<div class="row">



<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Number of Family Memebers</label>
 <input type="number" id="nofm" name="NoFamilyMembers" class="form-control input-lg" placeholder="No. of Family Members*" required disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Number of Siblings</label>
 <input type="number" id="ns" name="sib" class="form-control input-lg" placeholder="No. of Siblings*" required disabled>
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Total Gross Income per year</label>
 <input type="number" id="tgi" name="Income" class="form-control input-lg" placeholder="Total Gross Income per year*" required disabled>
</div>
</div>

</div>

</div>


<div class="row">

                            

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's First Name </label>
    <input type="text" id="guardianfnameprev" name="guardianfnameprev" class="form-control input-lg" placeholder="Guardian's First Name*" required>
  </div>
  </div>

</div>

<div class="col-lg-4"> 

 <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Second Name </label>
    <input type="text" id="guardianmnameprev" name="guardianmnameprev" class="form-control input-lg" placeholder="Guardian's Second Name*" required>
  </div>
  </div>

</div>

<div class="col-lg-4"> 

  <div class="control-group" style="background-color:none;">  
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Last Name </label>
    <input type="number" id="guardianlnameprev" name="guardianlnameprev" class="form-control input-lg" placeholder="Guardian's Last Name*" required>
  </div>
  </div>

</div>


</div>

<div class="row">
<div class="col-lg-12"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Contact Number </label>
   <input type="number" id="guardiancontactnumprev" name="guardiancontactnumprev" class="form-control input-lg" placeholder="Contact Number*" required>
 </div>
 </div>

</div>
</div>


<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Street Number </label>
<input type="number" name="GuardianStreetNumberprev" id="GuardianStreetNumberprev" class="form-control input-lg" placeholder=" Guardian's Street Number" >
</div>
</div>

</div>

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Road Name </label>
<input type="text" name="GuardianRoadNameprev" id="GuardianRoadNameprev" class="form-control input-lg" placeholder="  Guardian's Road Name">
</div>
</div>

</div>

<div class="col-lg-4"> 
<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Barangay </label>
<input type="text" name="GuardianBarangayprev" id="GuardianBarangayprev"  class="form-control input-lg" placeholder="  Guardian's Barangay">
</div>
</div>

</div>

</div>


<div class="row">

<div class="col-lg-4"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Town </label>
<input type="text" name="GuardianTownprev" id="GuardianTownprev" class="form-control input-lg" placeholder="  Guardian's Town*" required>
</div>
</div>

</div>

<div class="col-lg-8"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Province </label>
<input type="text" name="GuardianProvinceprev" id="GuardianProvinceprev" class="form-control input-lg" placeholder="  Guardian's Province*" required>
</div>
</div>

</div>







</div>


<div class="row">

                         
                            

<div class="col-lg-5"> 

<div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Relationship </label>
    <input type="text" id="Relationshipprev" name="Relationshipprev" class="form-control input-lg" placeholder="Relationship*" required>
  </div>
  </div>

</div>



<div class="col-lg-2"> 

<div class="control-group" style="background-color:none;">  
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Age </label>
  <input type="number" id="guardianageprev" name="guardianageprev" class="form-control input-lg" placeholder="Age*" required>
</div>
</div>

</div>


<div class="col-lg-5"> 

  <div class="control-group" style="background-color:none;">  
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Guardian's Occupation </label>
    <input type="number" id="guardianoccupationprev" name="guardianoccupationprev" class="form-control input-lg" placeholder="Guardian's Occupation*" required>
  </div>
  </div>

</div>

</div>



<!-- END FAMILY -->

<!-- START EDUCATIONAL -->
<div class="row">


<div class="col-lg-12"> 
    <center>
   <h4 style="background-color:#9C3;padding:5px;"><small style="color:white;">  
   EDUCATIONAL ASSISTANCE ENJOYED BY BROTHER/SISTER </small></h4>
    </center>

</div>

</div>

<div class="row">
<div class="col-lg-12">
<div class="card">
 <div class="card-body">
   <div class="sib-content">
     <div class="row">

       <div class="col-lg-4"> 

         <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Sibling's First Name</label>
           <input type="text" id="sfn" name="sib_fname[]" class="form-control input-lg" placeholder="Sibling's First Name"  disabled>
         </div>
         </div>

       </div>


       <div class="col-lg-4"> 

         <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Sibling's Middle Name</label>
           <input type="text" id="smn" name="sib_mname[]" class="form-control input-lg" placeholder="Sibling's Middle Name"  disabled>
         </div>
         </div>

       </div>


       <div class="col-lg-4"> 

         <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Sibling's Last Name</label>
           <input type="text" id="sln" name="sib_lname[]" class="form-control input-lg" placeholder="Sibling's Last Name"  disabled>
         </div>
         </div>

       </div>
     </div>
     <div class="row">

       <div class="col-lg-4"> 

        <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Educational Assistance</label>
           <input type="text" id="sea" name="sib_educ_assist[]" class="form-control input-lg" placeholder="Educational Assistance" disabled >
         </div>
         </div>

       </div>


       <div class="col-lg-4"> 

         <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Course</label>
           <input type="text" id="sc" name="sib_course[]" class="form-control input-lg" placeholder="Course" disabled >
         </div>
         </div>

       </div>

       <div class="col-lg-4"> 

         <div class="control-group" style="background-color:none;">
<div class="form-group floating-label-form-group controls mb-0 pb-2" >
<label> Year</label>
           <input type="text" id="sy" name="sib_year[]" class="form-control input-lg" placeholder="Year" disabled >
         </div>
         </div>

       </div>
     </div>
     <hr>
   </div>
 </div>
 <center>

 <div class="row pb-3">
   <div class="col-lg-4"> 
   </div>



 <div class="col-lg-4" disabled> 
 </div>
</div>


</div>
</div>
</div>

<!-- END EDUCATIONAL -->
<center>

<div class="row">
<div class="col-lg-12 pt-5"> 

</div>
</div>
</center>

 <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Preview </a>

</div>
</form> 

             
            </div>
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

      <!-- JavaScript & jQuery Plugins -->
    <!-- jQuery Load -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="modalJquery.js"></script>
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


<script type="text/javascript">

$(document).ready(function(){


  function handleFileSelect(evt) {

var files = evt.target.files;
//var imNum = $(evt.target).closest(".formline").attr("data-upload");
for (var i = 0, f; f = files[i]; i++) {
  if (!f.type.match('image.*')) {
    continue;
  }
  var reader = new FileReader();
        reader.onload = (function(theFile) {
    return function(e) {
        // console.log(escape(e.target.result))
      $(".img-holder div").attr("style","background-image:url("+e.target.result+")");
    };
  })(f);
  reader.readAsDataURL(f);
}
}
$("#image").change(function(evt){
handleFileSelect(evt);
});

$("#image2").change(function(evt){
handleFileSelect(evt);
});


  let x=1;
  let name = "name"+x;
  // $("#sib-content-temp").hide();
 // $('input').prop("required",false);
 // $('select').prop("required",false);
 $("[id*=asd]").each(function() {
            $(this).css('color','blue');
        });
  

  
 let counter=1;

  $(document).on('click', '.btn-add-sib', function(){
   
    //let holder = $('#sibfname').attr('id', name);
    //if(x==1){
    //$('#asd').attr('id', name);
    //}
    //alert($('#name1').attr('id'));
    
    //$('.thesibsib').children('#asd').click(function(){
   // $('#tryz').css('background-color', 'red');
    //});




    $('.sib-content').append($('#sib-content-temps').html());
    counter++;
   /* if(x==2){
    $('#name1').attr('id', name);
    alert($('#name2').attr('id'));
    }
    if(x==3){
    $('#name2').attr('id', name);
    }*/
    //alert(counter);
    
    //$(holder).attr('id', name);
    x = x+1;
    name = "name"+x;

          let i=0;
    $('.another').each(function(){
    i++;
    let newID='menu'+i;
    $(this).attr('id',newID);
    
  });
  let sibmnamei=0;
    $('.sibmnameanother').each(function(){
    sibmnamei++;
    let newID='sibmname'+sibmnamei;
    $(this).attr('id',newID);
    
  });
  let siblnamei=0;
    $('.siblnameanother').each(function(){
    siblnamei++;
    let newID='siblname'+siblnamei;
    $(this).attr('id',newID);
  });
  let sibeduci=0;
    $('.sibeducanother').each(function(){
    sibeduci++;
    let newID='sibeduc'+sibeduci;
    $(this).attr('id',newID);
  });
  let sibcoursei=0;
    $('.sibcourseanother').each(function(){
    sibcoursei++;
    let newID='sibcourse'+sibcoursei;
    $(this).attr('id',newID);
  });
  let sibyeari=0;
    $('.sibyearanother').each(function(){
    sibyeari++;
    let newID='sibyear'+sibyeari;
    $(this).attr('id',newID);
  });


  });


        $('#viewbtn').click(function(){
          $('#view').css('display', 'block');
          $('#view :input').attr('disabled', true);
        });



                                    $('#view').hover(function(){
                                    
                                    //let holding = $("#ComboBox").val();
                                    //alert($("#ComboBox").val());
                                    //alert($("#ComboBoxs").val());
                                    //alert($("#ComboBoxss").val());

                                    var dates = new Date($('#birthdate').val());
                                    var GENDERselected = $('#Gender option:selected').text();
                                    var CITselected = $('#yrcourse option:selected').text();
                                    var SITEselected = $('#SITE option:selected').text();
                                   // let value = $('#ComboBox').attr('value');
                                    ////alert(value); 
                                   // let values = $('#ComboBoxs').attr('value');
                                    //alert(values); 
                                    //let valuess = $('#ComboBoxss').attr('value');
                                      
                                  
                                    //$("input").prop('disabled', true);

                                    $('#qwere').attr('placeholder', $('#firstname').val());
                                    $('#midname').attr('placeholder', $('#middlename').val());
                                    $('#lname').attr('placeholder', $('#lastname').val());
                                    $('#bd').attr('placeholder', dates);
                                    $('#myage').attr('placeholder', $('#Age').val());
                                    $('#gen').text(GENDERselected);;
                                    $('#birthOrderprev').attr('placeholder', $('#birthOrder').val());
                                    $('#pob').attr('placeholder', $('#placeob').val());
                                    $('#citizensh').attr('placeholder', $('#citizenship').val());  
                                    $('#hnum').attr('placeholder', $('#housenum').val());  
                                    $('#rn').attr('placeholder', $('#rname').val()); 
                                    $('#brgy').attr('placeholder', $('#barangay').val());   
                                    $('#mtown').attr('placeholder', $('#town').val());  
                                    $('#prov').attr('placeholder', $('#province').val());
                                    $('#religionprev').attr('placeholder', $('#religion').val());
                                    $('#lastsa').attr('placeholder', $('#lastschoolattended').val());  
                                    $('#ssn').attr('placeholder', $('#schoolstreetnum').val());  
                                    $('#srn').attr('placeholder', $('#schoolrname').val()); 
                                    $('#sbrgy').attr('placeholder', $('#schoolbarangay').val());  
                                    $('#st').attr('placeholder', $('#schooltown').val());  
                                    $('#sp').attr('placeholder', $('#schoolprov').val()); 
                                    $('#hya').attr('placeholder', $('#highyrattended').val()); 
                                    $('#ga').attr('placeholder', $('#genave').val()); 
                                    $('#gradeshsfirstsemprev').attr('placeholder', $('#gradeshsfirstsem').val()); 
                                    $('#gradeshssecondsemprev').attr('placeholder', $('#gradeshssecondsem').val()); 
                                    $('#ea').attr('placeholder', $('#emailadd').val());  
                                    $('#fba').attr('placeholder', $('#fbaccount').val()); 
                                    $('#cn').attr('placeholder', $('#contactnumber').val()); 
                                    $('#scn').attr('placeholder', $('#seecondcontactnumber').val()); 
                                    $('#si').attr('placeholder', $('#schoolintended').val()); 
                                    $('#eer').attr('placeholder', $('#entranceexamrate').val()); 
                                    $('#sitemodal').text(SITEselected);
                                    $('#yrc').text(CITselected); 
                                    $('#courseintendedtotake').attr('placeholder', $('#courseintendedtotake').val()); 
                                    $('#ge').attr('placeholder', $('#granteenjoyed').val()); 
                                    $('#ffn').attr('placeholder', $('#fatherfname').val()); 
                                    $('#fmn').attr('placeholder', $('#fathermname').val()); 
                                    $('#fln').attr('placeholder', $('#fatherlname').val()); 
                                    $('#fa').attr('placeholder', $('#fatherage').val()); 
                                    $('#fo').attr('placeholder', $('#fatheroccupation').val()); 
                                    $('#mfn').attr('placeholder', $('#motherfname').val()); 
                                    $('#mmn').attr('placeholder', $('#mothermname').val()); 
                                    $('#mln').attr('placeholder', $('#motherlname').val()); 
                                    $('#ma').attr('placeholder', $('#motherage').val()); 
                                    $('#mo').attr('placeholder', $('#motheroccupation').val()); 
                                    $('#psn').attr('placeholder', $('#parentstreetnumber').val()); 
                                    $('#prn').attr('placeholder', $('#parentrname').val()); 
                                    $('#pb').attr('placeholder', $('#parentbarangay').val()); 
                                    $('#pt').attr('placeholder', $('#parenttownr').val()); 
                                    $('#pp').attr('placeholder', $('#parentprovince').val()); 
                                    $('#parentcontactnumprev').attr('placeholder', $('#parentcontactnum').val()); 
                                    $('#nofm').attr('placeholder', $('#nofammembers').val()); 
                                    $('#ns').attr('placeholder', $('#nosibs').val()); 
                                    $('#tgi').attr('placeholder', $('#totalgrossincome').val()); 
                                    
                                    $('#guardianfnameprev').attr('placeholder', $('#guardianfname').val()); 
                                    $('#guardianmnameprev').attr('placeholder', $('#guardianmname').val()); 
                                    $('#guardianlnameprev').attr('placeholder', $('#guardianlname').val()); 
                                    $('#Relationshipprev').attr('placeholder', $('#Relationship').val()); 
                                    $('#guardianageprev').attr('placeholder', $('#guardianAge').val());
                                    $('#guardiancontactprev').attr('placeholder', $('#guardianCN').val()); 
                                    $('#guardianoccupationprev').attr('placeholder', $('#guardianoccupation').val()); 

                                    $('#GuardianStreetNumberprev').attr('placeholder', $('#guardianStreetNumber').val()); 
                                    $('#GuardianRoadNameprev').attr('placeholder', $('#guardianRoadName').val()); 
                                    $('#GuardianBarangayprev').attr('placeholder', $('#guardianBarangay').val()); 
                                    $('#GuardianTownprev').attr('placeholder', $('#guardianTown').val());
                                    $('#GuardianProvinceprev').attr('placeholder', $('#guardianProvince').val());
                                    $('#guardiancontactnumprev').attr('placeholder', $('#guardianCN').val()); 
                                     
                             

                                    $('#sfn').attr('placeholder', $('#sibfname').val());
                                    $('#smn').attr('placeholder', $('#sibmname').val()); 
                                    $('#sln').attr('placeholder', $('#siblname').val());
                                    $('#sea').attr('placeholder', $('#sibeducassistance').val()); 
                                    $('#sc').attr('placeholder', $('#sibcourse').val());
                                    $('#sy').attr('placeholder', $('#sibyear').val());
                                    


                                    $('#sfn').attr('placeholder', $('#menu1').val()); 
                                    $('#smn').attr('placeholder', $('#sibmname1').val()); 
                                    $('#sln').attr('placeholder', $('#siblname1').val());
                                    $('#sea').attr('placeholder', $('#sibeduc1').val()); 
                                    $('#sc').attr('placeholder', $('#sibcourse1').val());
                                    $('#sy').attr('placeholder', $('#sibyear1').val());

                                    if(counter==2){
                                    $('#menu4').attr('id', 'asdd');
                                    $('#asdd').attr('placeholder', $('#menu2').val()); 

                                    $('#sibmname4').attr('id', 'bsdd');
                                    $('#bsdd').attr('placeholder', $('#sibmname2').val());
                                    
                                    $('#siblname4').attr('id', 'csdd');
                                    $('#csdd').attr('placeholder', $('#siblname2').val());

                                    $('#sibeduc4').attr('id', 'dsdd');
                                    $('#dsdd').attr('placeholder', $('#sibeduc2').val());

                                    $('#sibcourse4').attr('id', 'esdd');
                                    $('#esdd').attr('placeholder', $('#sibcourse2').val());

                                    $('#sibyear4').attr('id', 'fsdd');
                                    $('#fsdd').attr('placeholder', $('#sibyear2').val());

                                    }
                                    if(counter==3){
                                    $('#menu5').attr('id', 'asdd');
                                    $('#asdd').attr('placeholder', $('#menu2').val()); 
                                    $('#menu6').attr('id', 'asddd');
                                    $('#asddd').attr('placeholder', $('#menu3').val()); 

                                    $('#sibmname5').attr('id', 'bsdd');
                                    $('#bsdd').attr('placeholder', $('#sibmname2').val());
                                    $('#sibmname6').attr('id', 'bsddd');
                                    $('#bsddd').attr('placeholder', $('#sibmname3').val());

                                    $('#siblname5').attr('id', 'csdd');
                                    $('#csdd').attr('placeholder', $('#siblname2').val());
                                    $('#siblname6').attr('id', 'csddd');
                                    $('#csddd').attr('placeholder', $('#siblname3').val());

                                    $('#sibeduc5').attr('id', 'dsdd');
                                    $('#dsdd').attr('placeholder', $('#sibeduc2').val());
                                    $('#sibeduc6').attr('id', 'dsddd');
                                    $('#dsddd').attr('placeholder', $('#sibeduc3').val());

                                    $('#sibcourse5').attr('id', 'esdd');
                                    $('#esdd').attr('placeholder', $('#sibcourse2').val());
                                    $('#sibcourse6').attr('id', 'esddd');
                                    $('#esddd').attr('placeholder', $('#sibcourse3').val());
                                    
                                    $('#sibyear5').attr('id', 'fsdd');
                                    $('#fsdd').attr('placeholder', $('#sibyear2').val());
                                    $('#sibyear6').attr('id', 'fsddd');
                                    $('#fsddd').attr('placeholder', $('#sibyear3').val());


                                    }
                                    if(counter==4){

                                    $('#menu6').attr('id', 'asdd');
                                    $('#asdd').attr('placeholder', $('#menu2').val()); 
                                    $('#menu7').attr('id', 'asddd');
                                    $('#asddd').attr('placeholder', $('#menu3').val()); 
                                    $('#menu8').attr('id', 'asdddd');
                                    $('#asdddd').attr('placeholder', $('#menu4').val()); 

                                    $('#sibmname6').attr('id', 'bsdd');
                                    $('#bsdd').attr('placeholder', $('#sibmname2').val());
                                    $('#sibmname7').attr('id', 'bsddd');
                                    $('#bsddd').attr('placeholder', $('#sibmname3').val());
                                    $('#sibmname8').attr('id', 'bsdddd');
                                    $('#bsdddd').attr('placeholder', $('#sibmname4').val()); 

                                    $('#siblname6').attr('id', 'csdd');
                                    $('#csdd').attr('placeholder', $('#siblname2').val());
                                    $('#siblname7').attr('id', 'csddd');
                                    $('#csddd').attr('placeholder', $('#siblname3').val());
                                    $('#siblname8').attr('id', 'csdddd');
                                    $('#csdddd').attr('placeholder', $('#siblname4').val());

                                    $('#sibeduc6').attr('id', 'dsdd');
                                    $('#dsdd').attr('placeholder', $('#sibeduc2').val());
                                    $('#sibeduc7').attr('id', 'dsddd');
                                    $('#dsddd').attr('placeholder', $('#sibeduc3').val());
                                    $('#sibeduc8').attr('id', 'dsdddd');
                                    $('#dsdddd').attr('placeholder', $('#sibeduc4').val());

                                    $('#sibcourse6').attr('id', 'esdd');
                                    $('#esdd').attr('placeholder', $('#sibcourse2').val());
                                    $('#sibcourse7').attr('id', 'esddd');
                                    $('#esddd').attr('placeholder', $('#sibcourse3').val());
                                    $('#sibcourse8').attr('id', 'esdddd');
                                    $('#esdddd').attr('placeholder', $('#sibcourse4').val());
                                    
                                    $('#sibyear6').attr('id', 'fsdd');
                                    $('#fsdd').attr('placeholder', $('#sibyear2').val());
                                    $('#sibyear7').attr('id', 'fsddd');
                                    $('#fsddd').attr('placeholder', $('#sibyear3').val());
                                    $('#sibyear8').attr('id', 'fsdddd');
                                    $('#fsdddd').attr('placeholder', $('#sibyear4').val());  

                                    }
                                    if(counter==5){

                                    $('#menu7').attr('id', 'asdd');
                                    $('#asdd').attr('placeholder', $('#menu2').val()); 
                                    $('#menu8').attr('id', 'asddd');
                                    $('#asddd').attr('placeholder', $('#menu3').val()); 
                                    $('#menu9').attr('id', 'asdddd');
                                    $('#asdddd').attr('placeholder', $('#menu4').val());
                                    $('#menu10').attr('id', 'asddddd');
                                    $('#asddddd').attr('placeholder', $('#menu5').val()); 


                                    $('#sibmname7').attr('id', 'bsdd');
                                    $('#bsdd').attr('placeholder', $('#sibmname2').val());
                                    $('#sibmname8').attr('id', 'bsddd');
                                    $('#bsddd').attr('placeholder', $('#sibmname3').val());
                                    $('#sibmname9').attr('id', 'bsdddd');
                                    $('#bsdddd').attr('placeholder', $('#sibmname4').val()); 
                                    $('#sibmname10').attr('id', 'bsddddd');
                                    $('#bsddddd').attr('placeholder', $('#sibmname5').val()); 

                                    $('#siblname7').attr('id', 'csdd');
                                    $('#csdd').attr('placeholder', $('#siblname2').val());
                                    $('#siblname8').attr('id', 'csddd');
                                    $('#csddd').attr('placeholder', $('#siblname3').val());
                                    $('#siblname9').attr('id', 'csdddd');
                                    $('#csdddd').attr('placeholder', $('#siblname4').val());
                                    $('#siblname10').attr('id', 'csddddd');
                                    $('#csddddd').attr('placeholder', $('#siblname5').val());

                                    $('#sibeduc7').attr('id', 'dsdd');
                                    $('#dsdd').attr('placeholder', $('#sibeduc2').val());
                                    $('#sibeduc8').attr('id', 'dsddd');
                                    $('#dsddd').attr('placeholder', $('#sibeduc3').val());
                                    $('#sibeduc9').attr('id', 'dsdddd');
                                    $('#dsdddd').attr('placeholder', $('#sibeduc4').val());
                                    $('#sibeduc10').attr('id', 'dsddddd');
                                    $('#dsddddd').attr('placeholder', $('#sibeduc5').val());

                                    $('#sibcourse7').attr('id', 'esdd');
                                    $('#esdd').attr('placeholder', $('#sibcourse2').val());
                                    $('#sibcourse8').attr('id', 'esddd');
                                    $('#esddd').attr('placeholder', $('#sibcourse3').val());
                                    $('#sibcourse9').attr('id', 'esdddd');
                                    $('#esdddd').attr('placeholder', $('#sibcourse4').val());
                                    $('#sibcourse10').attr('id', 'esddddd');
                                    $('#esddddd').attr('placeholder', $('#sibcourse5').val());
                                    
                                    $('#sibyear7').attr('id', 'fsdd');
                                    $('#fsdd').attr('placeholder', $('#sibyear2').val());
                                    $('#sibyear8').attr('id', 'fsddd');
                                    $('#fsddd').attr('placeholder', $('#sibyear3').val());
                                    $('#sibyear9').attr('id', 'fsdddd');
                                    $('#fsdddd').attr('placeholder', $('#sibyear4').val());  
                                    $('#sibyear10').attr('id', 'fsddddd');
                                    $('#fsddddd').attr('placeholder', $('#sibyear5').val());

                                    }
                                    



                                    
                                        



                                    /*$('input[name="sib_fname[]"]').each(function(index){
                                        alert(index + " : " + $(this).val());
                                    });*/
                                        

                                      
                                    });
  
  

// document.getElementById('image').addEventListener('change', handleFileSelect, false);
// document.getElementById('image2').addEventListener('change', handleFileSelect, false);
});

 

</script>

  </body>

</html>
