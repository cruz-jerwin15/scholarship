<?php
  include 'config.php';
?>  <!-- DOCTYPE -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <link rel="icon" href="img/logo.png">
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

    <style>

[placeholder]:focus::-webkit-input-placeholder {
  transition: opacity 0.5s 0.5s ease;
  opacity: 0;
}
  
  body{

  }

  .raisedbox{
    box-shadow:  0px 0px 100px 0px gray;
    margin-bottom: 5%;
    padding-bottom: 2%;
  }

   </style>

    <!-- <script type="text/javascript">

      function displaydata(){
        $.post("GetID.php",{},function(data){

          var myData = data.split(" $ ");
          sessionStorage.setItem("data", myData);
          window.location.href = "generated_application_form.php";

        });
      }

    </script> -->

    <script type="text/javascript">
  function getAge(){
            var birthdate = document.getElementById('birthdate').value;
            birthdate = new Date(birthdate);
            var today = new Date();
            var Age = Math.floor((today-birthdate) / (365.25 * 24 * 60 * 60 * 1000));
            document.getElementById('Age').value=Age;
        }

        function doPrint() {
    window.print();            
    document.location.href = "Somewhere.aspx"; 
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


        <!-- Header area starts -->
      <section id="header">

        <!-- Navbar Starts -->
        <nav class="navbar navbar-light" data-spy="affix" data-offset-top="50">
          <div class="container">
              
         

            <!-- Brand -->
            <a class="navbar-brand" href="normaladmin.php">
             <h4 style="font-weight: 1000;"> EPS </h4>
            </a>

            <div class="collapse navbar-toggleable-sm pull-xs-left pull-md-right" id="main-menu">
              <!-- Navbar Starts -->
            <ul class="nav nav-inline">
             
                <li class="nav-item dropdown">
                  <a class="nav-link" href="normaladmin.php" role="button" aria-haspopup="true" aria-expanded="false"> Go Back </a>                  
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

<?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
         if(isset($_POST["submit"])){
            $fname = $_POST['firstname'];
            $mname = $_POST['middlename'];
            $lname = $_POST['lastname'];
            $bday = $_POST['birthdate'];
            $fb = $_POST['fb_account'];
            $sex = $_POST['Sex'];
            $Street = $_POST['Street'];
            $RoadName = $_POST['RoadName'];
            $Barangay = $_POST['Barangay'];
            $PlaceOfBirth = $_POST['PlaceOfBirth'];
            $Citizenship = $_POST['Citizenship'];
            $Town = $_POST['town'];
            $Province = $_POST['province'];
            $LastSchoolAttended = $_POST['LastSchoolAttended'];
            $HighestYearCompleted = $_POST['HighestYearAttended'];
            $GWA = $_POST['GWA'];
            $EmailAddress = $_POST['Email'];
            $SchoolIntended = $_POST['SchoolIntendedToEnroll'];
            $ExamRating = $_POST['EntranceExamRating'];
            $Course = $_POST['Course'];
            $Scholarship = $_POST['Grant'];
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
            $NoFamilyMembers = $_POST['NoFamilyMembers'];
            $Income = $_POST['Income'];
            $Siblings =  $_POST['sib'];
            $age = $_POST['age'];
            $contactnumber = $_POST['ContactNumber'];

            $ParentStreetNumber = $_POST['ParentStreetNumber'];
            $ParentRoadName = $_POST['ParentRoadName'];
            $ParentBarangay = $_POST['ParentBarangay'];
            $ParentTown = $_POST['ParentTown'];
            $ParentProvince = $_POST['ParentProvince'];
            $ParentContactNumber =  $_POST['ParentContactNumber'];

            $guardianFirstName = $_POST['guardianFirstName'];
            $guardianMiddleName = $_POST['guardianMiddleName'];
            $guardianLastName = $_POST['guardianLastName'];
            $guardianRelationship = $_POST['guardianRelationship'];
            $guardianAge = $_POST['guardianAge'];
            $guardianContactNumber = $_POST['guardianContactNumber'];
            $guardianOccupation =  $_POST['guardianOccupation'];
            $brothers = $_POST['brothers'];
            $sisters = $_POST['sisters'];

            //wala pang address ng guardian
            $guardianStreetNumber = $_POST['guardianStreetNumber'];
            $guardianRoadName = $_POST['guardianRoadName'];
            $guardianBarangay = $_POST['guardianBarangay'];
            $guardianTown = $_POST['guardianTown'];
            $guardianProvince = $_POST['guardianProvince'];

            $birthOrder = $_POST['birthOrder'];
            $religion = $_POST['religion'];
            $Category = $_POST['Category'];
            if($Category == 'EA College' || $Category == 'EPS College'){
                $grades1stSem = $_POST['grades1stSem'];
                $grades2ndSem = $_POST['grades2ndSem'];
                
             }     
            else{
                $grades1stSem = '0';
                $grades2ndSem = '0';
            }
            
            $sql = "UPDATE tbl_userinfo, tbl_useraddress, tbl_school, tbl_parents, tbl_parentsaddress SET tbl_userinfo.FirstName = '$fname', tbl_userinfo.MiddleName = '$mname',tbl_userinfo.LastName = '$lname', tbl_userinfo.DateOfBirth = '$bday',tbl_userinfo.Age = '$age', tbl_userinfo.Sex = '$sex', tbl_userinfo.PlaceOfBirth = '$PlaceOfBirth',tbl_userinfo.Citizenship = '$Citizenship',tbl_userinfo.fb_account = '$fb',tbl_userinfo.contactnumber = '$contactnumber',tbl_userinfo.EmailAddress = '$EmailAddress',tbl_useraddress.StreetNumber = '$Street',tbl_useraddress.RoadName = '$RoadName',tbl_useraddress.Barangay = '$Barangay',tbl_useraddress.Town = '$Town',tbl_useraddress.Province = '$Province', tbl_school.YearCompleted = '$HighestYearCompleted', tbl_school.GWA = '$GWA', tbl_school.LastSchoolAttended = '$LastSchoolAttended',  tbl_school.SchoolIntended = '$SchoolIntended', tbl_school.ExamRating = '$ExamRating',  tbl_school.Course = '$Course', tbl_school.Scholarship = '$Scholarship', tbl_parents.FatherFirstName = '$FatherFirstName', tbl_parents.FatherMiddleName = '$FatherMiddleName', tbl_parents.FatherLastName = '$FatherLastName', tbl_parents.FatherAge = '$FatherAge', tbl_parents.FatherOccupation = '$FatherOccupation', tbl_parents.MotherFirstName = '$MotherFirstName', tbl_parents.MotherMiddleName = '$MotherMiddleName', tbl_parents.MotherLastName = '$MotherLastName', tbl_parents.MotherAge = '$MotherAge', tbl_parents.MotherOccupation = '$MotherOccupation', tbl_parents.TotalMembers = '$NoFamilyMembers', tbl_parents.siblings = '$Siblings', tbl_parents.Income = '$Income', tbl_parentsaddress.StreetNumber = '$ParentStreetNumber', tbl_parentsaddress.RoadName = '$ParentRoadName', tbl_parentsaddress.Barangay = '$ParentBarangay', tbl_parentsaddress.Town = '$ParentTown', tbl_parentsaddress.Province = '$ParentProvince', tbl_parents.contactnumber = '$ParentContactNumber', tbl_parents.guardianFirstName = '$guardianFirstName', tbl_parents.guardianMiddleName = '$guardianMiddleName', tbl_parents.guardianLastName = '$guardianLastName',tbl_parents.guardianRelationship = '$guardianRelationship', tbl_parents.guardianAge = '$guardianAge', tbl_parents.guardianContactNumber ='$guardianContactNumber', tbl_parents.guardianOccupation = '$guardianOccupation', tbl_parents.brothers = '$brothers', tbl_parents.sisters = '$sisters', tbl_userinfo.birthOrder = '$birthOrder', tbl_userinfo.religion = '$religion', tbl_school.grades1stSem = '$grades1stSem', tbl_school.grades2ndSem = '$grades2ndSem' , tbl_parentsaddress.guardianStreetNumber = '$guardianStreetNumber', tbl_parentsaddress.guardianRoadName = '$guardianRoadName', tbl_parentsaddress.guardianBarangay = '$guardianBarangay', tbl_parentsaddress.guardianTown = '$guardianTown', tbl_parentsaddress.guardianProvince = '$guardianProvince'
                  WHERE tbl_userinfo.id = tbl_useraddress.user_id AND tbl_userinfo.id = tbl_school.user_id AND tbl_userinfo.id = tbl_parents.user_id AND tbl_userinfo.id = tbl_parentsaddress.user_id AND tbl_userinfo.id = '$id'";
            if(mysqli_query($conn, $sql))
              {
                //print_r($sql);
              echo '<script language="javascript">';
              echo 'alert("USER SUCCESSFULLY UPDATED!")';
              echo '</script>';
              //header("location: superadminhomepage.php");
              }
            else{
              echo "Error: " . $sql . "" . mysqli_error($conn);
            }
          }
  ?>
    <!-- Page Content -->
<div class="container raisedbox" style="margin-top: 5%;padding-top:8%;background-color: #F5F5F5;">
<div class="container" style="background-color:white;border-radius:10px;background-color: #F5F5F5;">
        <center>

          <div id="free-promo" style="
    text-align: center;background-color: #F5F5F5;font-weight:600;color:#4D7874">
      <div class="container" style="background-color: #F5F5F5;">
          <div class="row text-center" style="background-color: #F5F5F5;">
              <div class="error-page" style="background-color: #F5F5F5;font-weight:600;color:#4D7874">
                <h1  style="color:#43A854;"> STO TOMAS - EPS SCHOLARSHIP PROGRAM </h1>
                <h4><small style="color:#4364A8;"> "Edukasyon Pahalagahan Sagot sa kinabukasan" </small></h4>
            </div>
          </div>
      

 

          </div>


<?php




require_once 'config.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM tbl_userinfo where id = '".$id."' "; 
$result = mysqli_query($conn, $sql); 
if (mysqli_num_rows($result)) { 
    while ($row = mysqli_fetch_assoc($result)) { 
      if($row['Sex'] == 'm' || $row['Sex'] == 'M' || $row['Sex'] == 'Male'){
        $row['Sex'] = 'Male';
      }
      else{
       $row['Sex'] = 'Female'; 
      }
              echo '<div class="col-lg-2" style="padding-top:2%;"> </div>';

          echo ' <div class="col-lg-8" style="padding-top:5%;">';

           echo '<h4 style="color:#43A854;">';

                  echo $row["FirstName"] ."'s record";
                  echo '';

           echo'</h4>';

        echo '';

         echo '<div style="padding-top:5%;"> </div>';

          echo'<div class="row">';

                   echo '<div class="col-lg-12">'; 

                         echo '<img src="students/'.$row["Image"].'" '  .'style="width:96px;height:96px;">';

                  echo'</div>';




            ?>

            <a href="print2.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="btn btn-add-sib btn-success btn-sm text-white"> Print General Info </a>
            <br>
            <br>
            <a href="print3.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="btn btn-add-sib btn-success btn-sm text-white"> Print Application Form </a>
            <!-- <a href="updateuser.php?id=<?php echo $_GET['id']; ?>" class="btn btn-add-sib btn-success btn-sm text-white" name = "updateuser"> Update User</a> -->
            
    
          <?php


        echo'</div>';
        echo'</div>';

           echo'<div class="row" style="padding-top:5%;">';
           echo'</div>';

          echo'<div class="row" style="padding-top:5%;">';


               echo'<div class="col-lg-12"> 
                                             <center>
                                            <h4 style="background-color:#9C3;padding:5px;"><small style="color:white;">  PERSONAL BACKGROUND  </small></h4>
                                             </center>

                                         </div>';

         echo '</div>';

              echo ' <div class="row">';

                echo '<div class="col-lg-4 " > ';

                echo 'First Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Middle Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Last Name:';

                echo '</div>';

    
              echo '</div>';





              echo '<form action="" method="post" enctype="multipart/form-data"> ';


              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="firstname" id="firstname" class="form-control input-lg" value="'.$row["FirstName"].'" placeholder="'.$row["FirstName"].'">';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="middlename" id="middlename" class="form-control input-lg" 
               value="'.$row["MiddleName"].'" placeholder="'.$row["MiddleName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="lastname" id="lastname" class="form-control input-lg" 
               value="'.$row["LastName"].'"  placeholder="'.$row["LastName"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';





              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Date of Birth:';

                echo '</div>';

                echo '<div class="col-lg-2"> ';

                echo 'Age:';

                echo '</div>';

                echo '<div class="col-lg-2"> ';

                echo 'Sex:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Birth Order:';

                echo '</div>';

    
              echo '</div>';








              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="birthdate" id="birthdate" class="form-control input-lg" 
               value="'.$row["DateOfBirth"].'" placeholder="'.$row["DateOfBirth"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-2"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="age" id="age" class="form-control input-lg" 
               value="'.$row["Age"].'" placeholder="'.$row["Age"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-2"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Sex" id="Sex" class="form-control input-lg" 
              value="'.$row["Sex"].'" placeholder="'.$row["Sex"].'" >';
             echo '</div>';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="birthOrder" id="birthOrder" class="form-control input-lg" 
               value="'.$row["birthOrder"].'" placeholder="'.$row["birthOrder"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';






              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Place Of Birth:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Citizenship:';

                echo '</div>';
                echo '<div class="col-lg-4"> ';

                echo 'Religion:';

                echo '</div>';


    
              echo '</div>';
  



              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="PlaceOfBirth" id="PlaceOfBirth" class="form-control input-lg"
               value="'.$row["PlaceOfBirth"].'" placeholder="'.$row["PlaceOfBirth"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Citizenship" id="Citizenship" class="form-control input-lg" 
               value="'.$row["Citizenship"].'" placeholder="'.$row["Citizenship"].'" >';
             echo '</div>';

                echo '</div>';

                  echo '<div class="col-lg-4"> ';

                     echo '<div class="form-group">';
                     echo ' <input type="text" name="religion" id="religion" class="form-control input-lg" 
                     value="'.$row["religion"].'" placeholder="'.$row["religion"].'" >';
                     echo '</div>';

                echo '</div>';


              echo '</div>';




    } 

    $sql2 = "SELECT * FROM tbl_useraddress LEFT JOIN tbl_userinfo ON tbl_userinfo.id = tbl_useraddress.user_id where tbl_useraddress.user_id = '".$id."' "; 
    $result = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_assoc($result)) { 


              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Street Number:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Road Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Barangay:';

                echo '</div>';

    
              echo '</div>';








              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Street" id="Street" class="form-control input-lg" 
              value="'.$row["StreetNumber"].'" placeholder="'.$row["StreetNumber"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="RoadName" id="RoadName" class="form-control input-lg" 
               value="'.$row["RoadName"].'" placeholder="'.$row["RoadName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Barangay" id="Barangay" class="form-control input-lg" 
              value="'.$row["Barangay"].'" placeholder="'.$row["Barangay"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';





              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Town:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Province:';

                echo '</div>';

    
              echo '</div>';








              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                    echo '<div class="form-group">';
                    echo ' <input type="text" name="town" id="town" class="form-control input-lg"
                    value="'.$row["Town"].'"  placeholder="'.$row["Town"].'" >';
                    echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

                     echo '<div class="form-group">';
                     echo ' <input type="text" name="province" id="province" class="form-control input-lg" 
                     value="'.$row["Province"].'" placeholder="'.$row["Province"].'" >';
                     echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

                     echo '<div class="form-group">';
                     echo ' <input type="hidden" name="Category" id="Category" class="form-control input-lg" 
                     value="'.$row["Category"].'" placeholder="'.$row["Category"].'" >';
                     echo '</div>';

                echo '</div>';

              echo '</div>';

                echo ' <div class="row">';

                echo '<div class="col-lg-8"> ';

                    echo 'Last School Attended:';

                echo '</div>';

                 echo '</div>';
  

            

            



    } 

    $sql3 = "SELECT LastSchoolAttended FROM tbl_school where user_id = '".$id."' "; 
    $result = mysqli_query($conn, $sql3);
    while ($row = mysqli_fetch_assoc($result)) { 


            echo ' <div class="row">';


            echo '<div class="col-lg-12"> ';

             echo '<div class="form-group">';
             echo ' <input type="text" name="LastSchoolAttended" id="LastSchoolAttended" class="form-control input-lg" 
              value="'.$row["LastSchoolAttended"].'"  placeholder="'.$row["LastSchoolAttended"].'" >';
             echo '</div>';

            echo '</div>';

            echo '</div>';


    }

    $sql4 = "SELECT * FROM tbl_schooladdress where user_id = '".$id."' "; 
    $result = mysqli_query($conn, $sql4);
    while ($row = mysqli_fetch_assoc($result)) {   




            echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'School Street Number:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'School Road Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'School Barangay:';

                echo '</div>';

    
              echo '</div>';





            echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="SchoolStreetNumber" id="SchoolStreetNumber" class="form-control input-lg" 
               value="'.$row["StreetNumber"].'" placeholder="'.$row["StreetNumber"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="SchoolRoadName" id="SchoolRoadName" class="form-control input-lg" 
              value="'.$row["RoadName"].'" placeholder="'.$row["RoadName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="SchoolBarangay" id="SchoolBarangay" class="form-control input-lg" 
              value="'.$row["Barangay"].'"  placeholder="'.$row["Barangay"].'" >';
             echo '</div>';

                echo '</div>';


              echo '</div>';





              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'School Town:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'School Province:';

                echo '</div>';

    
              echo '</div>';





            echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="SchoolTown" id="SchoolTown" class="form-control input-lg" 
             value="'.$row["Town"].'" placeholder="'.$row["Town"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="SchoolProvince" id="SchoolProvince" class="form-control input-lg" 
               value="'.$row["Province"].'" placeholder="'.$row["Province"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';




               echo ' <div class="row">';


                    echo '<div class="col-lg-6"> ';

                    echo 'Highest Year Completed:';

                    echo '</div>';



                     echo '<div class="col-lg-6"> ';

                    echo 'Gen. Weighted Average:';

                    echo '</div>';


              echo '</div>'; 


              echo ' <div class="row">';
               


    }

    $sql5 = "SELECT * FROM tbl_school LEFT JOIN tbl_userinfo ON tbl_userinfo.id = tbl_school.user_id where tbl_school.user_id = '".$id."' "; 
    $result = mysqli_query($conn, $sql5);
    while ($row = mysqli_fetch_assoc($result)) { 




              echo '<div class="col-lg-6"> ';

                 echo '<div class="form-group">';
                 echo ' <input type="text" name="HighestYearAttended" id="HighestYearAttended" class="form-control input-lg" 
                 value="'.$row["YearCompleted"].'" placeholder="'.$row["YearCompleted"].'" >';
                 echo '</div>';

              echo '</div>';


              echo '<div class="col-lg-6"> ';

                 echo '<div class="form-group">';
                 echo ' <input type="text" name="GWA" id="GWA" class="form-control input-lg"
                 value="'.$row["GWA"].'" placeholder="'.$row["GWA"].'" >';
                 echo '</div>';

               echo '</div>';

             echo '</div>';


    
    if($row['Category'] == 'EA College' || $row['Category'] == 'EPS College'){

    echo ' <div class="row">';


                    echo '<div class="col-lg-6"> ';

                    echo 'Grade first Sem:';

                    echo '</div>';



                     echo '<div class="col-lg-6"> ';

                    echo 'Grade second Sem:';

                    echo '</div>';


              echo '</div>'; 
        echo ' <div class="row">';

        echo '<div class="col-lg-6"> ';
        echo '<div class="form-group">';
        echo ' <input type="text" name="grades1stSem" id="grades1stSem" class="form-control input-lg"
        value="'.$row["grades1stSem"].'" placeholder="'.$row["grades1stSem"].'" >';
       echo '</div>';
       echo '</div>';
       echo '<div class="col-lg-6"> ';
       echo '<div class="form-group">';
                echo ' <input type="text" name="grades2ndSem" id="grades2ndSem" class="form-control input-lg"
                value="'.$row["grades2ndSem"].'" placeholder="'.$row["grades2ndSem"].'" >';
               echo '</div>';
               echo '</div>';
         echo '</div>';
      }
    }

    $sql6 = "SELECT * FROM tbl_userinfo where id = '".$id."' "; 
    $result = mysqli_query($conn, $sql6);
    while ($row = mysqli_fetch_assoc($result)) { 


             echo ' <div class="row">';

                echo '<div class="col-lg-12"> ';

                echo 'Email Address:';

                echo '</div>';

            echo '</div>';

               echo ' <div class="row">';

               echo '<div class="col-lg-12"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Email" id="Email" class="form-control input-lg" 
              value="'.$row["EmailAddress"].'" placeholder="'.$row["EmailAddress"].'" >';
             echo '</div>';

               echo '</div>';

              echo '</div>';

                       echo ' <div class="row">';

                echo '<div class="col-lg-12"> ';

                echo 'FB Account:';

                echo '</div>';

            echo '</div>'; 

              echo ' <div class="row">';

               echo '<div class="col-lg-12"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="fb_account" id="fb_account" class="form-control input-lg"
              value="'.$row["fb_account"].'" placeholder="'.$row["fb_account"].'" >';
             echo '</div>';

               echo '</div>';
               echo '</div>';
                echo ' <div class="row">';

                echo '<div class="col-lg-12"> ';

                echo 'Contact Number:';

                echo '</div>';

            echo '</div>'; 
                 echo ' <div class="row">';

               echo '<div class="col-lg-12"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="ContactNumber" id="ContactNumber" class="form-control input-lg" 
               value="'.$row["contactnumber"].'" placeholder="'.$row["contactnumber"].'" >';
             echo '</div>';

               echo '</div>';

              echo '</div>';
      }


    $sql7 = "SELECT * FROM tbl_school where user_id = '".$id."' "; 
    $result = mysqli_query($conn, $sql7);
    while ($row = mysqli_fetch_assoc($result)) { 


             echo ' <div class="row">';

                echo '<div class="col-lg-12"> ';

                echo 'School Intended to Enroll:';

                echo '</div>';

            echo '</div>';



               echo ' <div class="row">';

               echo '<div class="col-lg-12"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="SchoolIntendedToEnroll" id="SchoolIntendedToEnroll" class="form-control input-lg"
              value="'.$row["SchoolIntended"].'" placeholder="'.$row["SchoolIntended"].'" >';
             echo '</div>';

               echo '</div>';

              echo '</div>';




              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Entrance Exam Rating:';

                echo '</div>';


                  echo '<div class="col-lg-8"> ';

                echo 'Course Intended to take:';

                echo '</div>';



            echo '</div>';



               echo ' <div class="row">';

               echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="EntranceExamRating" id="EntranceExamRating" class="form-control input-lg" 
              value="'.$row["ExamRating"].'" placeholder="'.$row["ExamRating"].'" >';
             echo '</div>';

               echo '</div>';


                echo '<div class="col-lg-8"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Course" id="Course" class="form-control input-lg"
              value="'.$row["Course"].'" placeholder="'.$row["Course"].'" >';
             echo '</div>';

               echo '</div>';



              echo '</div>';



                echo ' <div class="row">';

              echo '<div class="col-lg-12"> ';

                       echo 'Other bursary or grant enjoyed:';


               echo '</div>';

              echo '</div>';


              echo ' <div class="row">';

              echo '<div class="col-lg-12"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Grant" id="Grant" class="form-control input-lg" 
              value="'.$row["Scholarship"].'" placeholder="'.$row["Scholarship"].'" >';
             echo '</div>';

               echo '</div>';

              echo '</div>';
      }

        echo '<div style="padding-top:5%;"> </div>';

          echo'<div class="row">';


                echo'<div class="col-lg-12"> 
                                             <center>
                                            <h4 style="background-color:#9C3;padding:5px;"><small style="color:white;">  FAMILY BACKGROUND  </small></h4>
                                             </center>

                                         </div>';
         echo '</div>';

           $sql8 = "SELECT * FROM tbl_parents where user_id = '".$id."' "; 
           $result = mysqli_query($conn, $sql8);
           while ($row = mysqli_fetch_assoc($result)) { 




           echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Father First Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Father Middle Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Father Last Name:';

                echo '</div>';

    
              echo '</div>';




              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="FatherFirstName" id="FatherFirstName" class="form-control input-lg" 
               value="'.$row["FatherFirstName"].'" placeholder="'.$row["FatherFirstName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="FatherMiddleName" id="FatherMiddleName" class="form-control input-lg" 
               value="'.$row["FatherMiddleName"].'" placeholder="'.$row["FatherMiddleName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="FatherLastName" id="FatherLastName" class="form-control input-lg"
              value="'.$row["FatherLastName"].'"  placeholder="'.$row["FatherLastName"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';


             echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Father Age:';

                echo '</div>';

                echo '<div class="col-lg-8"> ';

                echo 'Father Occupation:';

                echo '</div>';

    
              echo '</div>';


               echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="FatherAge" id="FatherAge" class="form-control input-lg" 
               value="'.$row["FatherAge"].'" placeholder="'.$row["FatherAge"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-8"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="FatherOccupation" id="FatherOccupation" class="form-control input-lg"
               value="'.$row["FatherOccupation"].'" placeholder="'.$row["FatherOccupation"].'" >';
             echo '</div>';

                echo '</div>';

                 echo '</div>';

              

               echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Mother First Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Mother Middle Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Mother Last Name:';

                echo '</div>';

    
              echo '</div>';




              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="MotherFirstName" id="MotherFirstName" class="form-control input-lg" 
              value="'.$row["MotherFirstName"].'" placeholder="'.$row["MotherFirstName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="MotherMiddleName" id="MotherMiddleName" class="form-control input-lg" 
               value="'.$row["MotherMiddleName"].'" placeholder="'.$row["MotherMiddleName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="MotherLastName" id="MotherLastName" class="form-control input-lg" 
              value="'.$row["MotherLastName"].'" placeholder="'.$row["MotherLastName"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';


              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Mother Age:';

                echo '</div>';

                echo '<div class="col-lg-8"> ';

                echo 'Mother Occupation:';

                echo '</div>';

    
              echo '</div>';


               echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="MotherAge" id="MotherAge" class="form-control input-lg"
              value="'.$row["MotherAge"].'" placeholder="'.$row["MotherAge"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-8"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="MotherOccupation" id="MotherOccupation" class="form-control input-lg"
               value="'.$row["MotherOccupation"].'" placeholder="'.$row["MotherOccupation"].'" >';
             echo '</div>';

                echo '</div>';

                 echo '</div>';


              }


            $sql9 = "SELECT * FROM tbl_parentsaddress LEFT JOIN tbl_parents ON tbl_parentsaddress.user_id = tbl_parents.user_id where tbl_parents.user_id = '".$id."' "; 
            $result = mysqli_query($conn, $sql9);
            while ($row = mysqli_fetch_assoc($result)) { 



                 echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Parent Street Number:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Parent Road Name:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Parent Barangay:';

                echo '</div>';

    
              echo '</div>';




              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="ParentStreetNumber" id="ParentStreetNumber" class="form-control input-lg" 
              value="'.$row["StreetNumber"].'" placeholder="'.$row["StreetNumber"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="ParentRoadName" id="ParentRoadName" class="form-control input-lg"
               value="'.$row["RoadName"].'" placeholder="'.$row["RoadName"].'" >';
             echo '</div>';

                echo '</div>';


                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="ParentBarangay" id="ParentBarangay" class="form-control input-lg"
              value="'.$row["Barangay"].'" placeholder="'.$row["Barangay"].'" >';
             echo '</div>';

                echo '</div>';

              echo '</div>';




              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

                echo 'Parent Town:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Parent Province:';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo 'Parent Contact Number:';

                echo '</div>';

    
              echo '</div>';




              echo ' <div class="row">';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="ParentTown" id="ParentTown" class="form-control input-lg" 
              value="'.$row["Town"].'" placeholder="'.$row["Town"].'" >';
             echo '</div>';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="ParentProvince" id="ParentProvince" class="form-control input-lg" 
               value="'.$row["Province"].'" placeholder="'.$row["Province"].'" >';
             echo '</div>';

                echo '</div>';

                echo '<div class="col-lg-4"> ';

                echo '<div class="form-group">';
                 echo ' <input type="text" name="ParentContactNumber" id="ParentContactNumber" class="form-control input-lg" 
                  value="'.$row["contactnumber"].'" placeholder="'.$row["contactnumber"].'" >';
                echo '</div>';
   
                   echo '</div>';

              echo '</div>';





              echo ' <div class="row">';


                echo '<div class="col-lg-4"> ';

                echo 'No. Of Family Members:';

                echo '</div>';


                  echo '<div class="col-lg-4"> ';

                echo 'No.of Siblings:';

                echo '</div>';


              echo '<div class="col"> ';

                echo 'Parent total gross income per year:';

                echo '</div>';


    
              echo '</div>';



              echo ' <div class="row">';

  

              

           } 

           $sql9 = "SELECT * FROM tbl_parents LEFT JOIN tbl_parentsaddress ON tbl_parents.user_id = tbl_parentsaddress.user_id where tbl_parents.user_id = '".$id."' "; 
            $result = mysqli_query($conn, $sql9);
            while ($row = mysqli_fetch_assoc($result)) { 


                
                 echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="NoFamilyMembers" id="NoFamilyMembers" class="form-control input-lg"
               value="'.$row["TotalMembers"].'"  placeholder="'.$row["TotalMembers"].'" >';
             echo '</div>';

                echo '</div>';

                               echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="sib" id="sib" class="form-control input-lg" 
               value="'.$row["siblings"].'" placeholder="'.$row["siblings"].'" >';
             echo '</div>';

                echo '</div>';



                  echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="Income" id="Income" class="form-control input-lg" 
               value="'.$row["Income"].'" placeholder="'.$row["Income"].'" >';
             echo '</div>';

                echo '</div>';


              echo '</div>';

              echo ' <div class="row">';


              echo '<div class="col-lg-4"> ';

              echo 'Number of Brothers:';

              echo '</div>';


                echo '<div class="col-lg-4"> ';

              echo 'Number of Sisters:';

              echo '</div>';


            
            echo '</div>';

            echo '<div class = "row">';

                 echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="brothers" id="brothers" class="form-control input-lg"
               value="'.$row["brothers"].'"  placeholder="'.$row["brothers"].'" >';
             echo '</div>';

                echo '</div>';

                               echo '<div class="col-lg-4"> ';

             echo '<div class="form-group">';
              echo ' <input type="text" name="sisters" id="sisters" class="form-control input-lg" 
               value="'.$row["sisters"].'" placeholder="'.$row["sisters"].'" >';
             echo '</div>';

                echo '</div>';
            echo '</div>';


              echo ' <div class="row">';


              echo '<div class="col-lg-4"> ';

              echo 'Guardian First Name:';

              echo '</div>';


                echo '<div class="col-lg-4"> ';

              echo 'Guardian Middle Name:';

              echo '</div>';


            echo '<div class="col"> ';

              echo 'Guardian Last Name:';

              echo '</div>';


  
            echo '</div>';



            echo ' <div class="row">';


            echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianFirstName" id="guardianFirstName" class="form-control input-lg"
              value="'.$row["guardianFirstName"].'"  placeholder="'.$row["guardianFirstName"].'" >';
            echo '</div>';

               echo '</div>';

                              echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianMiddleName" id="guardianMiddleName" class="form-control input-lg" 
              value="'.$row["guardianMiddleName"].'" placeholder="'.$row["guardianMiddleName"].'" >';
            echo '</div>';

               echo '</div>';



                 echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianLastName" id="guardianLastName" class="form-control input-lg" 
              value="'.$row["guardianLastName"].'" placeholder="'.$row["guardianLastName"].'" >';
            echo '</div>';

               echo '</div>';

               echo '</div>';


               echo ' <div class="row">';


              echo '<div class="col-lg-4"> ';

              echo 'Relationship:';

              echo '</div>';


                echo '<div class="col-lg-2"> ';

              echo 'Contact Number:';

              echo '</div>';


            echo '<div class="col-lg-2"> ';

              echo 'Age:';

              echo '</div>';

              echo '<div class="col-lg-4"> ';

              echo 'Guardian Occupation:';

              echo '</div>';


  
            echo '</div>';




            echo ' <div class="row">';


            echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianRelationship" id="guardianRelationship" class="form-control input-lg"
              value="'.$row["guardianRelationship"].'"  placeholder="'.$row["guardianRelationship"].'" >';
            echo '</div>';

               echo '</div>';

                              echo '<div class="col-lg-2"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianContactNumber" id="guardianContactNumber" class="form-control input-lg" 
              value="'.$row["guardianContactNumber"].'" placeholder="'.$row["guardianContactNumber"].'" >';
            echo '</div>';

               echo '</div>';

               echo '<div class="col-lg-2"> ';

               echo '<div class="form-group">';
                echo ' <input type="text" name="guardianAge" id="guardianAge" class="form-control input-lg" 
                 value="'.$row["guardianAge"].'" placeholder="'.$row["guardianAge"].'" >';
               echo '</div>';
   
                  echo '</div>';



                 echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianOccupation" id="guardianOccupation" class="form-control input-lg" 
              value="'.$row["guardianOccupation"].'" placeholder="'.$row["guardianOccupation"].'" >';
            echo '</div>';

               echo '</div>';

               echo '</div>';

               echo ' <div class="row">';


              echo '<div class="col-lg-4"> ';

              echo 'Guardian House Number:';

              echo '</div>';


                echo '<div class="col-lg-4"> ';

              echo 'Guardian Road Name:';

              echo '</div>';


            echo '<div class="col"> ';

              echo 'Guardian Barangay:';

              echo '</div>';


  
            echo '</div>';


            echo ' <div class="row">';


            echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianStreetNumber" id="guardianStreetNumber" class="form-control input-lg"
              value="'.$row["guardianStreetNumber"].'"  placeholder="'.$row["guardianStreetNumber"].'" >';
            echo '</div>';

               echo '</div>';

                              echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianRoadName" id="guardianRoadName" class="form-control input-lg" 
              value="'.$row["guardianRoadName"].'" placeholder="'.$row["guardianRoadName"].'" >';
            echo '</div>';

               echo '</div>';

               echo '<div class="col-lg-4"> ';

               echo '<div class="form-group">';
                echo ' <input type="text" name="guardianBarangay" id="guardianBarangay" class="form-control input-lg" 
                 value="'.$row["guardianBarangay"].'" placeholder="'.$row["guardianBarangay"].'" >';
               echo '</div>';
   
                  echo '</div>';

               echo '</div>';

          echo ' <div class="row">';


              echo '<div class="col-lg-4"> ';

              echo 'Guardian Town:';

              echo '</div>';


                echo '<div class="col-lg-4"> ';

              echo 'Guardian Province:';

              echo '</div>';


  
            echo '</div>';
                echo '<div class="row">';
                    echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianTown" id="guardianTown" class="form-control input-lg" 
              value="'.$row["guardianTown"].'" placeholder="'.$row["guardianTown"].'" >';
            echo '</div>';

               echo '</div>';

               echo '<div class="col-lg-4"> ';

            echo '<div class="form-group">';
             echo ' <input type="text" name="guardianProvince" id="guardianProvince" class="form-control input-lg" 
              value="'.$row["guardianProvince"].'" placeholder="'.$row["guardianProvince"].'" >';
            echo '</div>';

               echo '</div>';

                echo '</div>';

                echo '<div style="padding-top:5%;"> </div>';




          echo'<div class="row">';


                echo'<div class="col-lg-12"> 
                                             <center>
                                            <h4 style="background-color:#9C3;padding:5px;"><small style="color:white;">  EDUCATIONAL ASSISTANCE ENJOYED BY BROTHER/SISTER </small></h4>
                                             </center>

                                         </div>';

           echo '</div>';

            }

            

              $sql10 = "SELECT * FROM tbl_siblings where user_id = '".$id."' "; 
            $result = mysqli_query($conn, $sql10);
            while ($row = mysqli_fetch_assoc($result)) { 



                  echo ' <div class="row" style="font-weight:600;color:#4D7874">';

                        echo '<div class="col-lg-4"> ';

                       echo 'Sibling First Name:';

                         echo '</div>';

                       echo '<div class="col-lg-4"> ';

                       echo 'Sibling Middle Name:';

                       echo '</div>';

                      echo '<div class="col-lg-4"> ';

                       echo 'Sibling Last Name:';

                       echo '</div>';
    
                echo '</div>';


                 echo ' <div class="row" style="font-weight:600;color:#4D7874">';

                   echo '<div class="col-lg-4"> ';

                         echo '<div class="form-group">';
                         echo ' <input type="text" name="sib_fname" id="sib_fname" class="form-control input-lg" 
                         value="'.$row["FirstName"].'" placeholder="'.$row["FirstName"].'" >';
                        echo '</div>';

                echo '</div>';

                  echo '<div class="col-lg-4"> ';

                         echo '<div class="form-group">';
                          echo ' <input type="text" name="sib_mname" id="sib_mname" class="form-control input-lg"
                          value="'.$row["MiddleName"].'" placeholder="'.$row["MiddleName"].'" >';
                         echo '</div>';

                    echo '</div>';

                     echo '<div class="col-lg-4"> ';

                         echo '<div class="form-group">';
                          echo ' <input type="text" name="sib_lname" id="sib_lname" class="form-control input-lg" 
                           value="'.$row["LastName"].'" placeholder="'.$row["LastName"].'" >';
                         echo '</div>';

                    echo '</div>';


              echo '</div>';


              echo ' <div class="row" style="font-weight:600;color:#4D7874">';

                        echo '<div class="col-lg-4"> ';

                       echo 'Educational Assistance:';

                         echo '</div>';

                       echo '<div class="col-lg-4"> ';

                       echo 'Course:';

                       echo '</div>';

                      echo '<div class="col-lg-4"> ';

                       echo 'Year:';

                       echo '</div>';
    
                echo '</div>';


                  echo ' <div class="row" style="font-weight:600;color:#4D7874">';

                   echo '<div class="col-lg-4"> ';

                         echo '<div class="form-group">';
                         echo ' <input type="text" name="sib_educ_assist" id="firstname" class="form-control input-lg"sib_educ_assist                          value="'.$row["sib_educ_assist"].'" placeholder="'.$row["sib_educ_assist"].'" >';
                        echo '</div>';

                echo '</div>';

                  echo '<div class="col-lg-4"> ';

                         echo '<div class="form-group">';
                          echo ' <input type="text" name="sib_course" id="sib_course" class="form-control input-lg" 
                          value="'.$row["sib_educ_assist"].'"  placeholder="'.$row["sib_course"].'" >';
                         echo '</div>';

                    echo '</div>';

                     echo '<div class="col-lg-4"> ';

                         echo '<div class="form-group">';
                          echo ' <input type="text" name="sib_year" id="sib_year" class="form-control input-lg" 
                           value="'.$row["sib_year"].'" placeholder="'.$row["sib_year"].'" >';
                         echo '</div>';

                    echo '</div>';


              echo '</div>';
          
              
                    echo '</div>';
                     

          

                }
                echo "<center><td><button class='btn btn-success btn-lg text-white' type='Submit' value ='Submit' name = 'submit'> Update User </button></td></center>";
                    echo '</form>';
}

else { 
    echo "0 results";
} 
mysqli_close($conn); 
?>


   <a href="#" class="back-to-top">
      <i class="fa fa-angle-up">
      </i>
    </a>

     <script type="text/javascript">

      $(document).ready(function(){
        // $("#sib-content-temp").hide();
        $('input').prop("disabled",false);
        $('select').prop("disabled",false);
        $(document).on('click', '.btn-add-sib', function(){
          $('.sib-content').append($('#sib-content-temps').html());
        });
      </script>

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
    
     <script src="assets/js/scroll-top.js"></script>
    <!-- Appear -->
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.vide.js"></script>
     <!-- All JS plugin Triggers -->
    <script src="assets/js/main.js"></script>

  </body>
</html>