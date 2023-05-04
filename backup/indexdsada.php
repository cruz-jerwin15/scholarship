<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EPS</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript">

      function displaydata(){
        $.post("GetID.php",{},function(data){

          var myData = data.split(" $ ");
          sessionStorage.setItem("data", myData);
          window.location.href = "generated_application_form.php";

        });
      }

    </script>

    <style>
        body {
      background: url('img/mhfades.jpg')  no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }

   </style>


  </head>

  <body>

    <!-- Page Content -->
    <section>
      <div class="container" style="padding-top:10%;">
        <div class="row">

          <div class="col-lg-9">

       

                   <h1 style="padding-top:4%;padding-bottom:4%;font-size:50px;color:#6BF38F;font-family: Verdana;"> EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM </h1>

                    <div class="btn-group btn-group-primary">
                        <button class="btn btn-light btn-outline btn-lg" type="button" style="color:white;"> Fill Up Now </button>

                        <button data-toggle="dropdown" class="btn btn-light btn-outline btn-lg dropdown-toggle" type="button" style="color:white;"><span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" style="border-color:white;background-color:transparent;">
                          <li><a href="form.php?form_type=1" style="color:white;"> Senior High School </a></li>
                          <li><a href="form.php?form_type=2" style="color:white;"> College </a></li>
                          <li><a href="form.php?form_type=3" style="color:white;"> EPS College </a></li>
                        </ul>
                    </div>

                   <a class="btn btn-light btn-outline btn-lg" data-toggle="modal" data-target="#exampleModal" style="color:white;">Requirements</a> 
                   <button class="btn btn-light btn-outline btn-lg" onclick="displaydata()" style="color:white;"> Print Application Form </button> 

                   <a href="loginform.php" class="btn btn-light btn-outline btn-lg" style="color:white;">Log-In</a> 
       

          </div>
          <div class="col-lg-2">
          </div>

        </div>
      </div>

      

         <!--<center>
          <div style="padding-top:12%;background-color: transparent;color:white;">
          <p>Republic of the Philippines</p>
          <p>Province of Batangas</p>
          MUNICIPALITY OF STO.TOMAS 
          </div>
        </center> -->

         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Applicant's Requirements</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <center>
              <div class="row">
              <div class="col-12">
                  1. Application Form 
              </div>
              </div>

                <div class="row">
                  <div class="col-12"> 
                  6. 1x1 ID Picture 
                  </div>
              </div>

              <div class="row">
                <div class="col-12"> 
                  2. Birth Certificate
                  </div>
              </div>
                <div class="row">
                  <div class="col-12"> 
                  7. Barangay Clearance
                  </div>
              </div>


              <div class="row">
                  <div class="col-12"> 
                  3. Grade Report / Report of ratings
                </div>
                  </div>
                 <div class="row">
                  <div class="col-12"> 
                  8. Parents Voter's ID
                  </div>
              </div>

              <div class="row">
                  <div class="col-12"> 
                  4. School Clearance
                  </div>
              </div>

             <div class="row">
                <div class="col-12"> 
                   8. Student's Registration form
                    </div>
              </div>

              
              <div class="row">
                <div class="col-12"> 
                  5. Vicinity Map/House Sketch
                  </div>
               <div class="row">
                <div class="col-12"> 
                  10. (if parents and other household members are employed)Income tax return or Certificate of Employment and Compensation
                  </div>
              </div>

              <div class="row" style="padding-top: 1%;">
                  <div class="col-12">
                  11. (if parents are NOT employed) Certificate of Unemployment from the Municipal/Barangay Hall/certificate of indigency/ITR(form 2316)
                  </div>
              </div>
                     </center>

            </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Done</button>
              </div>
            </div>
          </div>
        </div>





    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
