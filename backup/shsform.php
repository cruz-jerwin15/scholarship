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

    <style>
        body {
      background: url('img/background.jpg')  no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
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

   </style>


  </head>

  <body>
 <?php
         if(isset($_POST["submit"])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "eps";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 

            $fname = $_POST['firstname'];
            $mname = $_POST['middlename'];
            $lname = $_POST['lastname'];
            $bday = $_POST['birthdate'];
           
            $sex = $_POST['Sex'];
            $Street = $_POST['Street'];
            $RoadName = $_POST['RoadName'];
            $Barangay = $_POST['Barangay'];
            $PlaceOfBirth = $_POST['PlaceOfBirth'];
            $Citizenship = $_POST['Citizenship'];
            $PostalCode = $_POST['postalcode'];
            $Town = $_POST['town'];
            $Province = $_POST['province'];
            $Country = $_POST['Country'];
            $LastSchoolAttended = $_POST['LastSchoolAttended'];
            $SchoolStreetNumber = $_POST['SchoolStreetNumber'];
            $SchoolRoadName = $_POST['SchoolRoadName'];
            $SchoolBarangay = $_POST['SchoolBarangay'];
            $SchoolTown = $_POST['SchoolTown'];
            $SchoolPostalCode = $_POST['SchoolPostalCode'];
            $SchoolProvince = $_POST['SchoolProvince'];
            $SchoolCountry = $_POST['SchoolCountry'];
            $HighestYearCompleted = $_POST['HighestYearAttended'];
            $GWA = $_POST['WeightedAverage'];
            $EmailAddress = $_POST['Email'];
            $SchoolIntended = $_POST['SchoolIntendedToEnroll'];
            $ExamRating = $_POST['EntranceExamRating'];
            $Course = $_POST['Course'];
            $Scholarship = $_POST['Grant'];
            $FatherFirstName = $_POST['FatherFirstName'];
            $FatherMiddleName = $_POST['FatherMiddleName'];
            $FatherLastName = $_POST['FatherLastName'];
            $MotherFirstName = $_POST['MotherFirstName'];
            $MotherMiddleName = $_POST['MotherMiddleName'];
            $MotherLastName = $_POST['MotherLastName'];
            $ParentStreetNumber = $_POST['ParentStreetNumber'];
            $ParentRoadName = $_POST['ParentRoadName'];
            $ParentBarangay = $_POST['ParentBarangay'];
            $ParentTown = $_POST['ParentTown'];
            $ParentPostalCode = $_POST['ParentPostalCode'];
            $ParentProvince = $_POST['ParentProvince'];
            $ParentCountry = $_POST['ParentCountry'];
            $NoFamilyMembers = $_POST['NoFamilyMembers'];
            $NoBrothers = $_POST['NoBrothers'];
            $NoSisters = $_POST['NoSisters'];
            $Income = $_POST['Income'];
            $SiblingFirstName = $_POST['SiblingFirstName'];
            $SiblingMiddleName = $_POST['SiblingMiddleName'];
            $SiblingLastName = $_POST['SiblingLastName'];
            $EducationalAssistanceOne = $_POST['EducationalAssistanceOne'];
            $CourseOne = $_POST['CourseOne'];
            $YearOne = $_POST['YearOne'];
            $EducationalAssistanceTwo = $_POST['EducationalAssistanceTwo'];
            $CourseTwo = $_POST['CourseTwo'];
            $YearTwo = $_POST['YearTwo'];
            $EducationalAssistanceThree = $_POST['EducationalAssistanceThree'];
            $CourseThree = $_POST['CourseThree'];
            $YearThree = $_POST['YearThree'];
            $Image = $_FILES['image']['name'];


              $dateOfBirth = $bday;
              $today = date("d-m-Y");
              $diff = date_diff(date_create($dateOfBirth), date_create($today));
              $age=$diff->format('%y');
       


            $sql = "INSERT INTO tbl_userinfo (FirstName,MiddleName,LastName,Age,Sex,DateOfBirth,PlaceOfBirth,Citizenship,Image,EmailAddress) 
            VALUES ('$fname','$mname','$lname','$age','$sex','$bday','$PlaceOfBirth','$Citizenship', '$Image','$EmailAddress')";

            $sql3 = "INSERT INTO tbl_useraddress (StreetNumber,RoadName,Barangay,PostalCode,Town,Province,Country) 
            VALUES ('$Street','$RoadName','$Barangay','$PostalCode','$Town','$Province','$Country')";

            $sql2 = "INSERT INTO tbl_school (YearCompleted,GWA,SchoolIntended,LastSchoolAttended,ExamRating,Course,Scholarship) 
            VALUES ('$HighestYearCompleted','$GWA','$SchoolIntended','$LastSchoolAttended','$ExamRating','$Course','$Scholarship')";

            $sql4 = "INSERT INTO tbl_schooladdress (StreetNumber,RoadName,Barangay,Town,PostalCode,Province,Country)
            VALUES ('$SchoolStreetNumber','$SchoolRoadName','$SchoolBarangay','$SchoolTown','$SchoolPostalCode','$SchoolProvince','$SchoolCountry')";

            $sql5 = "INSERT INTO tbl_parents (FatherFirstName,FatherMiddleName,FatherLastName,MotherFirstName,MotherMiddleName,MotherLastName,TotalMembers,Brothers,Sisters,Income)
            VALUES ('$FatherFirstName','$FatherMiddleName','$FatherLastName','$MotherFirstName','$MotherMiddleName','$MotherLastName','$NoFamilyMembers','$NoBrothers','$NoSisters','$Income')";

            $sql6 = "INSERT INTO tbl_parentsaddress (StreetNumber,RoadName,Barangay,Town,PostalCode,Province,Country)
            VALUES ('$ParentStreetNumber','$ParentRoadName','$ParentBarangay','$ParentTown','$ParentPostalCode','$ParentProvince','$ParentCountry')";

            $sql7 = "INSERT INTO tbl_siblings (FirstName,MiddleName,LastName,EducationalAssistanceOne,CourseOne,YearOne,EducationalAssistanceTwo,CourseTwo,YearTwo,EducationalAssistanceThree,CourseThree,YearThree)
            VALUES ('$SiblingFirstName','$SiblingMiddleName','$SiblingLastName','$EducationalAssistanceOne','$CourseOne','$YearOne','$EducationalAssistanceTwo','$CourseTwo','$YearTwo','$EducationalAssistanceThree','$CourseThree','$YearThree')";

            $sqlselect = "SELECT * FROM tbl_userinfo ORDER BY id DESC LIMIT 0, 1";
            $result = $conn->query($sqlselect);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
               $id =  $row["id"];
               $maxid = $id +1;
             }
            }

            if (mysqli_query($conn, $sql)) {
              $target = 'students/'.$_FILES['image']["name"];
              move_uploaded_file( $_FILES['image']["tmp_name"], $target);
                  if (mysqli_query($conn, $sql3)) {
                     if (mysqli_query($conn, $sql2)) {
                        if (mysqli_query($conn, $sql4)) {
                          if(mysqli_query($conn, $sql5)){
                            if(mysqli_query($conn, $sql6)){
                              if(mysqli_query($conn, $sql7)){
                    echo '<script language="javascript">';
                    echo 'alert("FORM SUCCESSFULLY SENT")';
                    header("Location: confirmation.php?id=$maxid");
                    echo '</script>';
                          }
                        }
                      }
                    }
                  }   
                }
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }


            $conn->close();
         }
         ?>
    <!-- Page Content -->
<div class="container" style="padding-top:3%;">
<div class="container" style="background-color:white;border-radius:10px;">
        <center>

          <div class="col-lg-2"> </div>

          <div class="col-lg-8">

          <h4 style="color:#ED9D58;"> EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM </h4>
          <h4><small style="color:#ED9D58;"> "Edukasyon Pahalagahan Sagot sa kinabukasan" </small></h4>
          <h5> APPLICATION FORM </h5>
          <h5> (Senior HIgh) </h5>

         

          <form action="" method="post" enctype="multipart/form-data"> 
          <div class="container" style="padding-top:2%;padding-bottom:2%;">
            <center>
         <!--  <div class="card"  style="width:250px;height:250px;"> -->

            <div class="row">
                    <div class="col-lg-12">
                        <div class="formline" data-upload="1">
                          <input type="file" id="image" name="image" accept="image/x-png,image/gif,image/jpeg"  />
                        </div>
                        <div style="margin:0px 40%">
                                Preview File Here
                            <div class="img-holder" data-render="1">
                              <div class="list"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
          </center>
          </div>





           <div style="padding-top:5%;"> </div>





          <div class="row">


               <div class="col-lg-12"> 

                  <h4 style="background-color:#ED9D58;padding:5px;"><small style="color:white;">  PERSONAL BACKGROUND  </small></h4>


               </div>

          </div>

          <div class="row">

            <div class="col-lg-4"> 


         




            

            <div class="form-group">
              <input type="text" name="firstname" id="firstname" class="form-control input-lg" placeholder="First Name" required>
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="middlename" id="middlename" class="form-control input-lg" placeholder="Middle Name" required>
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Last Name" required>
            </div>

            </div>

          </div>

            <div class="row">

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="date" name="birthdate" id="birthdate" class="form-control input-lg">
              </div>

            </div>




            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number"  name="Age" class="form-control input-lg" placeholder= 
                <?php 

                echo "Automatic";

                ?>
                disabled >
              </div>

            </div>


            <div class="col-lg-4"> 

            <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> Sex 
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><label class="radio-inline"><input type="radio" value="1" name="Sex"> Male </label>
                    </li>
                    <li> <label class="radio-inline"><input type="radio" value="0" name="Sex"> Female </label> </li>
                  </ul>
            </div>

            </div>



          </div>


          <div class="row">

            <div class="col-lg-8"> 

              <div class="form-group">
                <input type="text" name="PlaceOfBirth" class="form-control input-lg" placeholder="Place of Birth">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="Citizenship" class="form-control input-lg" placeholder="Citizenship">
              </div>

            </div>

          </div>




            <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="Street" class="form-control input-lg" placeholder="Street Number">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="RoadName" class="form-control input-lg" placeholder="Road Name">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="Barangay" class="form-control input-lg" placeholder="Barangay">
              </div>

            </div>

          </div>


            <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="town"  class="form-control input-lg" placeholder="Town">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="postalcode" class="form-control input-lg" placeholder="Postal Code">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="province" class="form-control input-lg" placeholder="Province">
              </div>

            </div>

          </div>


           <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="Country"  class="form-control input-lg" placeholder="Country">
              </div>

            </div>

            <div class="col-lg-8"> 

            <div class="form-group">
                <input type="text" name="LastSchoolAttended" class="form-control input-lg" placeholder="Last School Attended">
              </div>

            </div>

          </div>

          <!-- START -->
           <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="SchoolStreetNumber" class="form-control input-lg" placeholder="School's StreetNumber">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="SchoolRoadName" class="form-control input-lg" placeholder="School's Road Name">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="SchoolBarangay" class="form-control input-lg" placeholder="School's Barangay">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="SchoolTown" class="form-control input-lg" placeholder="School's Town">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="SchoolPostalCode" class="form-control input-lg" placeholder="School's Postal Code">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="SchoolProvince" class="form-control input-lg" placeholder="School's Province">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="SchoolCountry" class="form-control input-lg" placeholder="School's Country">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="HighestYearAttended" class="form-control input-lg" placeholder="Highest year Attended">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="WeightedAverage" max="100" min="0" class="form-control input-lg" placeholder="Gen. Weighted Ave">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-12"> 

              <div class="form-group">
                <input type="email" name="Email" class="form-control input-lg" placeholder="FB account/Email Address">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-12"> 

              <div class="form-group">
                <input type="text" name="SchoolIntendedToEnroll" class="form-control input-lg" placeholder="School Intended to enroll">
              </div>

            </div>
            
          </div>


          <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="EntranceExamRating" class="form-control input-lg" placeholder="Entrance Exam Rating">
              </div>

            </div>

            <div class="col-lg-8"> 

              <div class="form-group">
                <input type="text" name="Course" class="form-control input-lg" placeholder="Course intended to take">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-12"> 

              <div class="form-group">
                <input type="text" name="Grant" class="form-control input-lg" placeholder="Other bursary or GRANT enjoyed">
              </div>

            </div>
            
          </div>

          <!-- END -->

          <!-- START FAMILY -->
          <div class="row">


               <div class="col-lg-12"> 

                  <h4 style="background-color:#ED9D58;padding:5px;"><small style="color:white;">  FAMILY BACKGROUND  </small></h4>


               </div>

          </div>




           <div class="row">

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="FatherFirstName" class="form-control input-lg" placeholder="Father's First Name" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="FatherMiddleName" class="form-control input-lg" placeholder="Father's Middle Name" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="FatherLastName" class="form-control input-lg" placeholder="Father's Last Name" >
            </div>

            </div>

          </div>


           <div class="row">

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="MotherFirstName" class="form-control input-lg" placeholder="Mother's First Name" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="MotherMiddleName" class="form-control input-lg" placeholder="Mother's Middle Name" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="MotherLastName" class="form-control input-lg" placeholder="Mother's Last Name" >
            </div>

            </div>

          </div>

          <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="ParentStreetNumber" class="form-control input-lg" placeholder="Parent's StreetNumber">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="ParentRoadName" class="form-control input-lg" placeholder="Parent's Road Name">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="ParentBarangay" class="form-control input-lg" placeholder="Parent's Barangay">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="ParentTown" class="form-control input-lg" placeholder="Parent's Town">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="ParentPostalCode" class="form-control input-lg" placeholder="Parent's Postal Code">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="ParentProvince" class="form-control input-lg" placeholder="Parent's Province">
              </div>

            </div>

          </div>


          <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="text" name="ParentCountry" class="form-control input-lg" placeholder="Parent's Country">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="NoFamilyMembers" class="form-control input-lg" placeholder="No. of Family Members">
              </div>

            </div>

            <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="NoBrothers" class="form-control input-lg" placeholder="No. of Brothers">
              </div>

            </div>

          </div>

           <div class="row">

             <div class="col-lg-4"> 

              <div class="form-group">
                <input type="number" name="NoSisters" class="form-control input-lg" placeholder="No. of Sisters">
              </div>

            </div>

            <div class="col-lg-8"> 

              <div class="form-group">
                <input type="number" name="Income" class="form-control input-lg" placeholder="Parent's total gross income per year">
              </div>

            </div>
            
          </div>
          <!-- END FAMILY -->

          <!-- START EDUCATIONAL -->
          <div class="row">


               <div class="col-lg-12"> 

                  <h4 style="background-color:#ED9D58;padding:5px;"><small style="color:white;">  EDUCATIONAL ASSISTANCE ENJOYED BY BROTHER/SISTER  </small></h4>


               </div>

          </div>


          <div class="row">

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="SiblingFirstName" class="form-control input-lg" placeholder="Sibling's First Name" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="SiblingMiddleName" class="form-control input-lg" placeholder="Sibling's Middle Name" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="SiblingLastName" class="form-control input-lg" placeholder="Sibling's Last Name" >
            </div>

            </div>

          </div>

          <div class="row">

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="EducationalAssistanceOne" class="form-control input-lg" placeholder="Educational Assistance" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="CourseOne" class="form-control input-lg" placeholder="Course" >
            </div>

            </div>

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="YearOne" class="form-control input-lg" placeholder="Year" >
            </div>

            </div>

          </div>

          <div class="row">

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="EducationalAssistanceTwo" class="form-control input-lg" placeholder="Educational Assistance" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="CourseTwo" class="form-control input-lg" placeholder="Course" >
            </div>

            </div>

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="YearTwo" class="form-control input-lg" placeholder="Year" >
            </div>

            </div>

          </div>

          <div class="row">

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="EducationalAssistanceThree" class="form-control input-lg" placeholder="Educational Assistance" >
            </div>

            </div>


            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="CourseThree" class="form-control input-lg" placeholder="Course" >
            </div>

            </div>

            <div class="col-lg-4"> 

            <div class="form-group">
              <input type="text" name="YearThree" class="form-control input-lg" placeholder="Year" >
            </div>

            </div>

          </div>
          <!-- END EDUCATIONAL -->
            <div class="col-lg-12"> 

               <button class="btn btn-success btn-lg" type="Submit" value ="Submit" name = "submit" style="color:white;"> Submit </button>
             

            </div>

          </div>
          </form> 



          </div>

          <div class="col-lg-2"></div>

        </center>
    </div>
</div>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    function handleFileSelect(evt) {
    var files = evt.target.files;
    var imNum = $(evt.target).closest(".formline").attr("data-upload");
    for (var i = 0, f; f = files[i]; i++) {
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();
            reader.onload = (function(theFile) {
        return function(e) {
            console.log(escape(e.target.result))
          $(".img-holder[data-render='"+imNum+"'] div").attr("style","background-image:url("+e.target.result+")");
          localStorage.setItem('img'+imNum, e.target.result);
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('image').addEventListener('change', handleFileSelect, false);
  document.getElementById('image2').addEventListener('change', handleFileSelect, false);

  if(localStorage.img1) { 
          $(".img-holder[data-render='1'] div").attr("style","background-image:url("+localStorage.img1+")");
    }

</script>

  </body>

</html>
