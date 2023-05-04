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

  
 <?php
         if(isset($_POST["submit"])){

            $fname = $_POST['firstname'];
            $mname = $_POST['middlename'];
            $lname = $_POST['lastname'];
            $bday = $_POST['birthdate'];
            $fb = $_POST['fb_account'];
            //$sex = 'm';
            $sex = $_POST['gender'];
            $Street = $_POST['Street'];
            $RoadName = $_POST['RoadName'];
            $Barangay = $_POST['Barangay'];
            $PlaceOfBirth = $_POST['PlaceOfBirth'];
            $Citizenship = $_POST['Citizenship'];
            $Town = $_POST['town'];
            $Province = $_POST['province'];
            $LastSchoolAttended = $_POST['LastSchoolAttended'];
            $SchoolStreetNumber = $_POST['SchoolStreetNumber'];
            $SchoolRoadName = $_POST['SchoolRoadName'];
            $SchoolBarangay = $_POST['SchoolBarangay'];
            $SchoolTown = $_POST['SchoolTown'];
            $SchoolProvince = $_POST['SchoolProvince'];
            $HighestYearCompleted = $_POST['HighestYearAttended'];
            $GWA = $_POST['WeightedAverage'];
            $EmailAddress = $_POST['Email'];
            $SchoolIntended = $_POST['SchoolIntendedToEnroll'];
            $ExamRating = $_POST['EntranceExamRating'];
            $Courses = $_POST['Course'];
            $ScholarsScholarshiphip = $_POST['Grant'];
            $FatherFirstName = $_POST['FatherFirstName'];
            $FatherMiddleName = $_POST['FatherMiddleName'];
            $FatherLastName = $_POST['FatherLastName'];
            $FatherAge = $_POST['FatherAge'];
            $FatherOccupation = $_POST['FatherOccupation'];
            $MotherFirstName = $_POST['MotherFirstName'];
            $MotherMiddleName = $_POST['MotherMiddleName'];
            $MotherLastName = $_POST['MotherLastName'];
            $MotherAge = $_POST['MotherAge'];
            $MotherOccupation = $_POST['MotherOccupation'];
            $ParentStreetNumber = $_POST['ParentStreetNumber'];
            $ParentRoadName = $_POST['ParentRoadName'];
            $ParentBarangay = $_POST['ParentBarangay'];
            $ParentTown = $_POST['ParentTown'];
            $ParentProvince = $_POST['ParentProvince'];
            $NoFamilyMembers = $_POST['NoFamilyMembers'];
            $Income = $_POST['Income'];
            $Siblings =  $_POST['sib'];
            $age = $_POST['Age'];
            $contactnumber = $_POST['ContactNumber'];
            $contactnumbertwo = $_POST['ContactNumbertwo'];

            //array
            $SiblingFirstName = $_POST['sib_fname'];
            $SiblingMiddleName = $_POST['sib_mname'];
            $SiblingLastName = $_POST['sib_lname'];
            $sib_educ_assist = $_POST['sib_educ_assist'];
            $Course = $_POST['sib_course'];
            $Year = $_POST['sib_year'];

            //guardian
            $guardianfname = $_POST['guardianfname'];
            $guardianmname = $_POST['guardianmname'];
            $guardianlname = $_POST['guardianlname'];
            $Relationship = $_POST['Relationship'];
            $guardianAge = $_POST['guardianAge'];
            $guardianoccupation = $_POST['guardianoccupation'];
            $guardianStreetNumber =  $_POST['guardianStreetNumber'];
            $guardianRoadName = $_POST['guardianRoadName'];
            $guardianBarangay = $_POST['guardianBarangay'];
            $guardianTown = $_POST['guardianTown'];
            $guardianProvince = $_POST['guardianProvince'];
            $guardianCN = $_POST['guardianCN'];

            //new in form
            $birthOrder = $_POST['birthOrder'];
            $religion = $_POST['religion'];
            $gradeshsfirstsem = $_POST['gradeshsfirstsem'];
            $gradeshssecondsem = $_POST['gradeshssecondsem'];
            $year_course = $_POST['year_course'];
            $brothers = $_POST['brothers'];
            $sisters = $_POST['sisters'];
            $parentcontactnum = $_POST['parentcontactnum'];


            $Image = $_FILES['image']['name'];

            $sql = "SELECT * FROM tbl_userinfo where FirstName = '$fname' AND LastName = '$lname' AND MiddleName = '$mname'"; 
            $result_found = mysqli_query($conn, $sql);
            $found = mysqli_fetch_assoc($result_found);

            if ($found >=1){
              echo '<script language="javascript">';
              echo 'alert("You are already registered")';
              echo '</script>';
            }
            else{
                if($form_type == "11"){
                  $category = "EA Senior High";
                  $yrLvl = "11";
                }
                else if($form_type == "12"){
                  $category = "EA Senior High";
                  $yrLvl = "12";
                }
                else if($form_type == "21"){
                  $category = "EA College";
                  $yrLvl = "1st";
                }
                else if($form_type == "22"){
                  $category = "EA College";
                  $yrLvl = "2nd";
                }
                else if($form_type == "23"){
                  $category = "EA College";
                  $yrLvl = "3rd";
                }
                else if($form_type == "24"){
                  $category = "EA College";
                  $yrLvl = "4th";
                }
                else if($form_type == "25"){
                  $category = "EA College";
                  $yrLvl = "5th";
                }
                else{
                  $category = "EPS College";
                  $yrLvl = "1st"; 
                }
            $Scholarship = !empty($Scholarship) ? "'$Scholarship'" : "NULL";
            $FatherFirstName = !empty($FatherFirstName) ? "'$FatherFirstName'" : "'NULL'";
            $FatherMiddleName = !empty($FatherMiddleName) ? "'$FatherMiddleName'" : "'NULL'";
            $FatherLastName = !empty($FatherLastName) ? "'$FatherLastName'" : "'NULL'";
            $FatherAge = !empty($FatherAge) ? "'$FatherAge'" : "0";
            $FatherOccupation = !empty($FatherOccupation) ? "'$FatherOccupation'" : "'NULL'";
            $MotherFirstName = !empty($MotherFirstName) ? "'$MotherFirstName'" : "'NULL'";
            $MotherMiddleName = !empty($MotherMiddleName) ? "'$MotherMiddleName'" : "'NULL'";
            $MotherLastName = !empty($MotherLastName) ? "'$MotherLastName'" : "'NULL'";
            $MotherAge = !empty($MotherAge) ? "'$MotherAge'" : "'0'";
            $MotherOccupation = !empty($MotherOccupation) ? "'$MotherOccupation'" : "'NULL'";
            $ParentStreetNumber = !empty($ParentStreetNumber) ? "'$ParentStreetNumber'" : "'0'";
            $ParentRoadName = !empty($ParentRoadName) ? "'$ParentRoadName'" : "'None'";


            $sql = "INSERT INTO tbl_userinfo (FirstName,MiddleName,LastName,Age,Sex,DateOfBirth,PlaceOfBirth,Citizenship,Image,EmailAddress, fb_account, contactnumber, contactnumbertwo, Category, canview, batch, remarks, assessment, approve,requirements, birthOrder, religion) 
            VALUES ('$fname','$mname','$lname','$age','$sex','$bday','$PlaceOfBirth','$Citizenship', '$Image','$EmailAddress', '$fb', '$contactnumber', '$contactnumbertwo', '$category', '0', '0', ' ', '0', '0', 'None', '$birthOrder', '$religion')";

            $result_user = mysqli_query($conn, $sql);
            $last_id = mysqli_insert_id($conn);

            $sql3 = "INSERT INTO tbl_useraddress (user_id, StreetNumber,RoadName,Barangay,Town,Province) 
            VALUES ('$last_id','$Street','$RoadName','$Barangay','$Town','$Province')";

            $sql2 = "INSERT INTO tbl_school (user_id,YearCompleted,GWA,SchoolIntended,LastSchoolAttended,ExamRating,Course,Scholarship, SchoolYear, year_course, grades1stSem, grades2ndSem) 
            VALUES ('$last_id','$HighestYearCompleted','$GWA','$SchoolIntended','$LastSchoolAttended','$ExamRating','$Courses','$Scholarship', '', $year_course, $gradeshsfirstsem, $gradeshssecondsem)";

            $sql4 = "INSERT INTO tbl_schooladdress (user_id,StreetNumber,RoadName,Barangay,Town,Province)
            VALUES ('$last_id','$SchoolStreetNumber','$SchoolRoadName','$SchoolBarangay','$SchoolTown','$SchoolProvince')";

            $sql5 = "INSERT INTO tbl_parents (user_id,FatherFirstName,FatherMiddleName,FatherLastName,MotherFirstName,MotherMiddleName,MotherLastName,FatherAge,MotherAge,FatherOccupation,MotherOccupation,TotalMembers,siblings,Income, contactnumber, guardianFirstName, guardianMiddleName, guardianLastName, guardianRelationship, guardianContactNumber, guardianAge, guardianOccupation, brothers, sisters)
            VALUES ('$last_id', $FatherFirstName,$FatherMiddleName,$FatherLastName,$MotherFirstName,$MotherMiddleName,$MotherLastName,$FatherAge, $MotherAge, $FatherOccupation, $MotherOccupation,$NoFamilyMembers,$Siblings,$Income, '$parentcontactnum', '$guardianfname', '$guardianmname', '$guardianlname', '$Relationship', '$guardianCN', '$guardianAge', '$guardianoccupation', '$brothers', '$sisters')";

            $sql6 = "INSERT INTO tbl_parentsaddress (user_id,StreetNumber,RoadName,Barangay,Town,Province, guardianStreetNumber, guardianRoadName, guardianBarangay, guardianTown, guardianProvince)
            VALUES ('$last_id',$ParentStreetNumber,$ParentRoadName,'$ParentBarangay','$ParentTown','$ParentProvince', '$guardianStreetNumber', '$guardianRoadName', '$guardianBarangay', '$guardianTown', '$guardianProvince')";

            $sql8 = "INSERT INTO tbl_grades (user_id,semester,yrLvl,f_semester_grade,s_semester_grade,GWA, with_failing_grade)
            VALUES ('$last_id','None','$yrLvl','0','0','0', '0')";

            $sql9 = "INSERT INTO tbl_requirements (user_id,applicationForm,birthCertificate,gradeReport,schoolClearance,parentsVoters, studentRegistration,map,brgyClearance,idPic,incomeTax,indigency,entranceExam)
            VALUES ('$last_id','0','0','0', '0','0','0','0', '0','0','0','0', '0')";

              foreach ($SiblingFirstName as $index => $sib) {
                $_sib_fname  = $sib;
                $_sib_mname  = $SiblingMiddleName[$index];
                $_sib_lname  = $SiblingLastName[$index];
                $_sib_educ  = $sib_educ_assist[$index];
                $_sib_course  = $Course[$index];
                $_sib_year  = $Year[$index];

                //save to sql

                $sql7 = "INSERT INTO tbl_siblings (user_id,FirstName,MiddleName,LastName,sib_educ_assist,sib_course,sib_year)
                VALUES ('$last_id','$_sib_fname','$_sib_mname','$_sib_lname','$_sib_educ','$_sib_course','$_sib_year')";
                $result_siblings = mysqli_query($conn, $sql7);

              }

            $target = 'students/'.$_FILES['image']["name"];
            move_uploaded_file( $_FILES['image']["tmp_name"], $target);
           
            $result_useraddress = mysqli_query($conn, $sql3);
            
            $result_schooladdress = mysqli_query($conn, $sql4);

            $result_grades = mysqli_query($conn, $sql8);

            $result_parents = mysqli_query($conn, $sql5);

            $result_parentsaddress = mysqli_query($conn, $sql6);

            $result_requirements = mysqli_query($conn, $sql9);

            $result_school = mysqli_query($conn, $sql2);
            
            $sql_result = $result_user && $result_useraddress && $result_grades && $result_school && $result_requirements && $result_schooladdress && $result_parents && $result_parentsaddress && $result_siblings  ;

            if($sql_result){  
              echo "<script> 
                   alert('Form Successfully Submitted');
                   </script>";
              header('Location: print3.php?id='.$last_id.'');
            }
            else{
              echo "Error: " . $sql_result . "" . mysqli_error($conn);
            }
            $conn->close();
            }

         }
?>
     

        

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav" style="background-color:#45A2D1;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> EPS  </a>
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

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container" id="home">
     
      <div style="padding-top:5%"></div>

                <h1 class="text-uppercase mb-0"><small>
                
                <?php echo $form_title; ?>
                 
                </small> </h1> <br>

               <h3 style="padding-bottom:5%">  <?php echo $form_level; ?>  </h3>

              <div class="text-center mt-4">
        <a class="portfolio-item d-block mx-auto" href="#req">
          <div class="btn btn-xl btn-outline-light">
            <i class="fa fa-home mr-2"></i>
            Requirements
          </div>
          </a>
        </div>
                        <div class="container" style="padding-bottom:2%;">
                              <center>
                                   <!--  <div class="card"  style="width:250px;height:250px;"> -->
    
                          
         </h2>
      </div>
    </header>

                       <div class="boxer"> 

                                <section id="service-block-main" class="section" style="  background-color: #F2EEEE;">
                      <!-- Container Starts -->
                      <div class="container" style="padding: 25px; box-shadow: 0px 35px 50px 20px gray;">

                                   <form action="" method="post" enctype="multipart/form-data"> 
                                    <div class="container" style="padding-bottom:2%;">
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

                                    <div class="pt-5"> </div>

                                     <div class="row">


                                         <div class="col-lg-12"> 
                                             

                                            <div class="alert alert-danger">
                                              <center> Please fill out the <strong>Required fields (*)</strong> </center>
                                            </div>

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
                                        <input class="form-control" type="text" name="firstname" id="firstname" class="form-control input-lg" placeholder="First Name*" style="background-color:#ffffff;" required>
                                      </div>
                                      </div>
                                      </div>


                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label>Middle Name</label>
                                        <input type="text" name="middlename" id="middlename" class="form-control input-lg" placeholder="Middle Name*" style="background-color:#ffffff;" required>
                                      </div>
                                      </div>
                                      </div>


                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Last Name*" style="background-color:#ffffff;" required>
                                      </div>
                                      </div>
                                      </div>

                                    </div>

                                      <div class="row">

                                      <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label>Birthdate</label>
                                          <input type="date" name="birthdate" id="birthdate" class="form-control input-sm " onblur="getAge();" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>




                                      <div class="col-lg-2"> 

                                        <div class="control-group" style="background-color:none;">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>Age</label>
                                        <input type="number" maxlength="3"  id ="Age" name="Age" class="form-control input-lg" placeholder="Age"
                                        readonly="readonly" >
                                        </div>
                                        </div>

                                      </div>


                                      <div class="col-lg-4" style="padding-top:30px;"> 
                                    
                                      <!--<div id="ComboBoxss" class="dropdown">
                                            <button id="ComboBox" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" required> Genderss
                                            <span class="caret"></span></button>
                                            <ul id="ComboBoxs" class="dropdown-menu">
                                              <li><label class="radio-inline"><input type="radio" value="1" name="Sex"> Male </label>
                                              </li>
                                              <li> <label class="radio-inline"><input type="radio" value="0" name="Sex"> Female </label> </li>
                                            </ul>
                                      </div>-->

                                  <div class="form-group">
                                  <select name="gender" id="Gender" class="form-control">
                                    <option selected="selected" value="m">Male</option>
                                    <option value="f">Female</option>
                                  </select>
                                  </div>
                                    </div>


                                    <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                      <label>Birth Order </label>
                                      <input type="text"  id ="birthOrder" name="birthOrder" class="form-control input-lg" placeholder="Birth Order" style="background-color:#ffffff;"
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
                                          <input type="text" name="PlaceOfBirth" id="placeob" class="form-control input-lg" placeholder="Place of Birth*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label> Citizenship </label>
                                          <input type="text" name="Citizenship" id="citizenship" class="form-control input-lg" placeholder="Citizenship*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                    </div>




                                      <div class="row">

                                       <div class="col-lg-4"> 
                                       <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Street Number </label>
                                          <input type="number" name="Street" id="housenum" class="form-control input-lg" placeholder="House Number"  style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Roadname </label>
                                          <input type="text" name="RoadName" id="rname" class="form-control input-lg" placeholder="Road Name" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Barangay </label>
                                          <input type="text" name="Barangay" id="barangay" class="form-control input-lg" placeholder="Barangay*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                    </div>


                                      <div class="row">

                                       <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Town </label>
                                          <input type="text" name="town"  id="town" class="form-control input-lg" placeholder="Town*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Province </label>
                                          <input type="text" name="province" id="province"  class="form-control input-lg" placeholder="Province*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Religion </label>
                                          <input type="text" name="religion" id="religion"  class="form-control input-lg" placeholder="Religion" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                    </div>


                                     <div class="row">

                                      <div class="col-lg-12"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Last School Attended </label>
                                          <input type="text" name="LastSchoolAttended" id="lastschoolattended" class="form-control input-lg" placeholder="Last School Attended*" style="background-color:#ffffff;" required>
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
                                          <input type="number" name="SchoolStreetNumber" id="schoolstreetnum" class="form-control input-lg" placeholder="School's Street Number" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> School's Road Name </label>
                                          <input type="text" name="SchoolRoadName" id="schoolrname" class="form-control input-lg" placeholder="School's Road Name" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> School's Barangay </label>
                                          <input type="text" name="SchoolBarangay" id="schoolbarangay" class="form-control input-lg" placeholder="School's Barangay" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                    </div>
 

                                    <div class="row">

                                       <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> School's Town </label>
                                          <input type="text" name="SchoolTown" id="schooltown" class="form-control input-lg" placeholder="School's Town*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-8"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> School's Province </label>
                                          <input type="text" name="SchoolProvince" id="schoolprov" class="form-control input-lg" placeholder="School's Province*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                    </div>


                                    <div class="row">


                                      <div class="col-lg-6"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Highest Year Attended </label>
                                          <input type="text" name="HighestYearAttended" id="highyrattended" class="form-control input-lg" placeholder="Highest year Attended(sample: 4th year)*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-6"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> weighted average </label>
                                          <input type="number" id="genave" name="WeightedAverage" max="100" min="0" class="form-control input-lg" placeholder="Gen. Weighted Ave*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                    </div>
                                  
                                  <?php
                                  if($form_type =='21' || $form_type =='22'|| $form_type =='23'|| $form_type =='24'|| $form_type =='25'|| $form_type =='3'){
                                      echo '<div class="row">


                                        <div class="col-lg-6"> 
                                        <div class="control-group" style="background-color:none;">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label> GRADES(shs level): 1st SEM </label>
                                            <input type="number" max="100" name="gradeshsfirstsem" id="gradeshsfirstsem" class="form-control input-lg" placeholder="GRADES(shs level): 1st SEM*" required>
                                          </div>
                                          </div>

                                        </div>

                                        <div class="col-lg-6"> 

                                          <div class="control-group" style="background-color:none;">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label> GRADES(shs level): 2nd SEM </label>
                                            <input type="number" id="gradeshssecondsem" name="gradeshssecondsem" max="100" min="0" class="form-control input-lg" placeholder="GRADES(shs level): 2nd SEM*" required>
                                          </div>
                                          </div>

                                        </div>

                                        </div>';
                                    
                                  }

                                    ?>


                                    <div class="row">

                                      <div class="col-lg-12"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Email </label>
                                          <input type="email" id="emailadd" name="Email" class="form-control input-lg" placeholder="Email Address" style="background-color:#ffffff;">
                                        </div>
                                      </div>
                                      </div>

                                    </div>

                                    <div class="row">

                                      <div class="col-lg-12"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Fb Account </label>
                                          <input type="text" name="fb_account" id="fbaccount" class="form-control input-lg" placeholder="FB account" style="background-color:#ffffff;">
                                        </div>
                                      </div>
                                      </div>

                                    </div>

                                    <div class="row">

                                      <div class="col-lg-12"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label>Contact Number </label>
                                          <input type="ContactNumber" id="contactnumber" name="ContactNumber" class="form-control input-lg" placeholder="Contact Number" style="background-color:#ffffff;">
                                        </div>
                                      </div>
                                      </div>

                                    </div>

                                    <div class="row">

                                      <div class="col-lg-12"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Second Contact Number </label>
                                          <input type="ContactNumber" id="seecondcontactnumber" name="ContactNumbertwo" class="form-control input-lg" placeholder="Second Contact Number" style="background-color:#ffffff;">
                                        </div>
                                      </div>
                                      </div>

                                      </div>



                                    <div class="row">

                                       <div class="col-lg-12"> 

                                        <div class="form-group">                

                                          <?php
                                            if(isset($_GET['form_type'])){
                                              if($_GET['form_type']==3){
                                          ?>
                                            <select name="SchoolIntendedToEnroll" id="SITE" class="form-control">
                                              <option value="" disabled selected>SELECT SCHOOL INTENDED</option>
                                              <?php
                                                foreach ($ps_option as $opt) {
                                                  echo '<option value="'.$opt['school_name'].'">'.$opt['school_name'].'</option>';
                                                }
                                              ?>
                                            </select>
                                          <?php
                                            }else{
                                          ?>
                                            <input type="text" id="schoolintended" name="SchoolIntendedToEnroll" class="form-control input-lg" placeholder="School Intended to enroll*" required>
                                          <?php
                                            }
                                          }
                                          ?>
                                        </div>

                                      </div>
                                      
                                    </div>


                                    <div class="row">

                                       <div class="col-lg-12"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Entrance Exam Rating </label>
                                          <input type="text" name="EntranceExamRating" id="entranceexamrate" class="form-control input-lg" placeholder="Entrance Exam Rating*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-12"> 
                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Course Intended to take </label>
                                          <input type="text" name="Course" id="courseintendedtotake" class="form-control input-lg" placeholder="Course intended to take*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <?php
                                        if(isset($_GET['form_type'])){
                                          if($_GET['form_type']!=1){
                                      ?>

                                       <div class="col-lg-12"> 

                                         <div class="form-group">
                                           <select name="year_course" id="yrcourse" class="form-control">
                                             <option value="4">4 years</option>
                                             <option value="5">5 years</option>
                                           </select>
                                         </div>

                                    

                                       </div>


                                      <?php
                                          }else{
                                      ?>
                                        <input type="hidden" id="yrcourse" name="year_course" value="">
                                      <?php
                                          }
                                        }
                                      ?>

                                    </div>


                                    <div class="row">

                                       <div class="col-lg-12"> 
                                       <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Grant </label>
                                          <input type="text" name="Grant" id="granteenjoyed" class="form-control input-lg" placeholder="Other bursary or GRANT enjoyed" >
                                        </div>
                                        </div>

                                      </div>
                                      
                                    </div>

                                    <!-- END -->

                                    <!-- START FAMILY -->
                                    <div class="row">


                                         <div class="col-lg-12"> 
                                             <center>
                                            <h4  style="background-color:#9C3;padding:5px;"><small style="color:white;"> FAMILY BACKGROUND  </small></h4>
                                             </center>

                                         </div>

                                    </div>




                                     <div class="row">

                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Father's First Name </label>
                                        <input type="text" id="fatherfname" name="FatherFirstName" class="form-control input-lg" placeholder="Father's First Name" style="background-color:#ffffff;">
                                      </div>
                                      </div>

                                      </div>


                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Father's Middle Name </label>
                                        <input type="text" id="fathermname" name="FatherMiddleName" class="form-control input-lg" placeholder="Father's Middle Name" style="background-color:#ffffff;">
                                      </div>
                                      </div>

                                      </div>


                                      <div class="col-lg-4"> 

                                     <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Father's Last Name </label>
                                        <input type="text"id="fatherlname"  name="FatherLastName" class="form-control input-lg" placeholder="Father's Last Name" style="background-color:#ffffff;">
                                      </div>
                                      </div>

                                      </div>

                                    </div>

                                    <div class="row">

                                       <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Father's Age </label>
                                          <input type="number" id="fatherage" name="FatherAge"  class="form-control input-lg" placeholder="Father Age" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-8"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Father's Occupation </label>
                                          <input type="text" id="fatheroccupation" name="FatherOccupation" class="form-control input-lg" placeholder="Father Occupation" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                    </div>


                                     <div class="row">

                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Mother's First Name </label>
                                        <input type="text" id="motherfname" name="MotherFirstName" class="form-control input-lg" placeholder="Mother's First Name" style="background-color:#ffffff;">
                                      </div>
                                      </div>

                                      </div>


                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Mother's Middle Name </label>
                                        <input type="text" id="mothermname" name="MotherMiddleName" class="form-control input-lg" placeholder="Mother's Middle Name" style="background-color:#ffffff;">
                                      </div>
                                      </div>

                                      </div>


                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Mother's Last Name </label>
                                        <input type="text" id="motherlname" name="MotherLastName" class="form-control input-lg" placeholder="Mother's Last Name" style="background-color:#ffffff;" >
                                      </div>
                                      </div>

                                      </div>

                                    </div>

                                    <div class="row">

                                       <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Mother's Age </label>
                                          <input type="number" id="motherage" name="MotherAge"  class="form-control input-lg" placeholder="Mother Age" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-8"> 

                                       <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Mother's Occupation </label>
                                          <input type="text" id="motheroccupation" name="MotherOccupation" class="form-control input-lg" placeholder="Mother Occupation" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                    </div>

                                    <div class="row">

                                       <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Parent's Street Number</label>
                                          <input type="number" id="parentstreetnumber" name="ParentStreetNumber" class="form-control input-lg" placeholder="Parent's StreetNumber" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                       <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Parent's Road Name</label>
                                          <input type="text" id="parentrname" name="ParentRoadName" class="form-control input-lg" placeholder="Parent's Road Name" style="background-color:#ffffff;">
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                       <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Parent's Barangay</label>
                                          <input type="text" id="parentbarangay" name="ParentBarangay" class="form-control input-lg" placeholder="Parent's Barangay*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                    </div>


                                    <div class="row">

                                       <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Parent's Town</label>
                                          <input type="text" id="parenttownr" name="ParentTown" class="form-control input-lg" placeholder="Parent's Town*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>


                                      <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Parent's Province</label>
                                          <input type="text" id="parentprovince" name="ParentProvince" class="form-control input-lg" placeholder="Parent's Province*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                        <label> Parent's Contact Number</label>
                                          <input type="text" id="parentcontactnum" name="parentcontactnum" class="form-control input-lg" placeholder="Parent's Contact Number" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                        </div>

                                    </div>


                                    <div class="row">

                            

                                      <div class="col-lg-4"> 

                                      <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Number of Family Members</label>
                                          <input type="number" id="nofammembers" name="NoFamilyMembers" class="form-control input-lg" placeholder="No. of Family Members*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                       <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Number of Siblings</label>
                                          <input type="number" id="nosibs" name="sib" class="form-control input-lg" placeholder="No. of Siblings*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                      <div class="col-lg-4"> 

                                        <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Total Gross Income per year</label>
                                          <input type="number" id="totalgrossincome" name="Income" class="form-control input-lg" placeholder="Total Gross Income per year*" style="background-color:#ffffff;" required>
                                        </div>
                                        </div>

                                      </div>

                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4"> 
                                            <div class="control-group" style="background-color:none;">
                                              <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                                <label> No. of Brother/s </label>
                                                <input type="number" id="brothers" name="brothers" class="form-control input-lg" placeholder="No. of Brother/s*" style="background-color:#ffffff;" required>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4"> 
                                            <div class="control-group" style="background-color:none;">
                                              <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                                <label> No. of Sister/s </label>
                                                <input type="number" id="sisters" name="sisters" class="form-control input-lg" placeholder="No. of Sister/s*" style="background-color:#ffffff;" required>
                                              </div>
                                            </div>
                                        </div>    
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-4"> 
                                            <div class="control-group" style="background-color:none;">
                                              <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                                <label> Guardian's First Name </label>
                                                <input type="text" id="guardianfname" name="guardianfname" class="form-control input-lg" placeholder="Guardian's First Name*" style="background-color:#ffffff;" required>
                                              </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4"> 
                                           <div class="control-group" style="background-color:none;">
                                              <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                                <label> Guardian's Middle Name </label>
                                                <input type="text" id="guardianmname" name="guardianmname" class="form-control input-lg" placeholder="Guardian's Middle Name*" style="background-color:#ffffff;" required>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4"> 
                                            <div class="control-group" style="background-color:none;">  
                                              <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                                <label> Guardian's Last Name </label>
                                                <input type="text" id="guardianlname" name="guardianlname" class="form-control input-lg" placeholder="Guardian's Last Name*" style="background-color:#ffffff;" required>
                                              </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                      <div class="col-lg-4"> 
                                        <div class="control-group" style="background-color:none;">
                                          <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                            <label> Relationship </label>
                                            <input type="text" id="Relationship" name="Relationship" class="form-control input-lg" placeholder="Relationship*" style="background-color:#ffffff;" required>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4"> 
                                        <div class="control-group" style="background-color:none;">
                                          <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                            <label> Guardian's Age </label>
                                            <input type="number" id="guardianAge" name="guardianAge" class="form-control input-lg" placeholder="Guardian's Age*" style="background-color:#ffffff;" required>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4"> 
                                        <div class="control-group" style="background-color:none;">  
                                          <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                            <label> Guardian's Occupation </label>
                                            <input type="text" id="guardianoccupation" name="guardianoccupation" class="form-control input-lg" placeholder="Guardian's Occupation*" style="background-color:#ffffff;" required>
                                          </div>
                                        </div>
                                      </div>

                                      </div>

                                      <div class="row">
                                        
                                        <div class="col-lg-4"> 
                                          <div class="control-group" style="background-color:none;">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                              <label> Guardian's Street Number</label>
                                              <input type="number" id="guardianStreetNumber" name="guardianStreetNumber" class="form-control input-lg" placeholder="Guardian's Street Number" style="background-color:#ffffff;">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-lg-4"> 
                                          <div class="control-group" style="background-color:none;">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                              <label> Guardian's Road Name</label>
                                              <input type="text" id="guardianRoadName" name="guardianRoadName" class="form-control input-lg" placeholder="Guardian's Road Name" style="background-color:#ffffff;">
                                            </div>
                                          </div>
                                        </div>

                                       

                                        <div class="col-lg-4"> 
                                          <div class="control-group" style="background-color:none;">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                              <label> Guardian's Barangay</label>
                                              <input type="text" id="guardianBarangay" name="guardianBarangay" class="form-control input-lg" placeholder="Guardian's Barangay*" style="background-color:#ffffff;" required>
                                             </div>
                                          </div>
                                        </div>
                                      
                                      </div>


                                    <div class="row">
                                      
                                      <div class="col-lg-4"> 
                                        <div class="control-group" style="background-color:none;">
                                          <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                            <label> Guardian's Town</label>
                                            <input type="text" id="guardianTown" name="guardianTown" class="form-control input-lg" placeholder="Guardian's Town*" style="background-color:#ffffff;" required>
                                          </div>
                                        </div>
                                      </div>


                                       

                                      <div class="col-lg-4"> 
                                        <div class="control-group" style="background-color:none;">
                                          <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                            <label> Guardian's Province</label>
                                            <input type="text" id="guardianProvince" name="guardianProvince" class="form-control input-lg" placeholder="Guardian's Province*" style="background-color:#ffffff;" required>
                                          </div>
                                        </div>
                                      </div>

                                      

                                      <div class="col-lg-4"> 
                                        <div class="control-group" style="background-color:none;">
                                          <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                            <label> Guardian's Contact Number</label>
                                            <input type="text" id="guardianCN" name="guardianCN" class="form-control input-lg" placeholder="Guardian's Contact Number" style="background-color:#ffffff;" required>
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
                                                    <input type="text" id="sibfname" class="another" name="sib_fname[]" class="form-control input-lg" placeholder="Sibling's First Name" style="background-color:#ffffff;">
                                                  </div>
                                                  </div>

                                                </div>


                                                <div class="col-lg-4"> 

                                                  <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Sibling's Middle Name</label>
                                                    <input type="text" class="sibmnameanother" id="sibmname" name="sib_mname[]" class="form-control input-lg" placeholder="Sibling's Middle Name" style="background-color:#ffffff;" >
                                                  </div>
                                                  </div>

                                                </div>


                                                <div class="col-lg-4"> 

                                                  <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Sibling's Last Name</label>
                                                    <input type="text" id="siblname" class="siblnameanother" name="sib_lname[]" class="form-control input-lg" placeholder="Sibling's Last Name" style="background-color:#ffffff;" >
                                                  </div>
                                                  </div>

                                                </div>
                                              </div>
                                              <div class="row">

                                                <div class="col-lg-4"> 

                                                 <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Educational Assistance</label>
                                                    <input type="text" id="sibeducassistance" class="sibeducanother" name="sib_educ_assist[]" class="form-control input-lg" placeholder="Educational Assistance" style="background-color:#ffffff;">
                                                  </div>
                                                  </div>

                                                </div>


                                                <div class="col-lg-4"> 

                                                  <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Course</label>
                                                    <input type="text" id="sibcourse" class="sibcourseanother"  name="sib_course[]" class="form-control input-lg" placeholder="Course" >
                                                  </div>
                                                  </div>

                                                </div>

                                                <div class="col-lg-4"> 

                                                  <div class="control-group" style="background-color:none;">
                                      <div class="form-group floating-label-form-group controls mb-0 pb-2" >
                                      <label> Year</label>
                                                    <input type="text" id="sibyear" class="sibyearanother" name="sib_year[]" class="form-control input-lg" placeholder="Year" >
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
                                            

                                            <div class="col-lg-4"> 
                                          <a href="JavaScript:void(0)" class="btn btn-add-sib btn-success btn-sm text-white">Add Sibling</a>
                                          </div>
                                          

                                         
                                          <div class="col-lg-4"> 
                                          </div>
                                        </div>
                                        

                                        </div>
                                      </div>
                                    </div>

                                    <!-- END EDUCATIONAL -->
                                    <center>

                                      <div class="row">
                                      <div class="col-lg-12 pt-5"> 

                                         <button class="btn btn-success btn-lg text-white" type="Submit" value ="Submit" name = "submit"> Submit </button>
                                         
                                      </div>
                                      </div>
                                    </center>

                                    </div>
                                    </form> 
                                    <div class="text-center mt-4" >
        <a class="portfolio-item d-block mx-auto" id="viewbtn" href="#view">
          <div class="btn btn-xl btn-outline-success" style="margin-top: 5%;">
            <i class="fa fa-home mr-2"></i>
            Preview
          </div>
          </a>
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
