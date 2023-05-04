<?php 
include 'config.php';
	     $id = mysqli_real_escape_string($conn, $_GET['id']);
           echo  $fname = $_POST['firstname'];
         if(isset($_POST["updateuser"])){
           echo  $fname = $_POST['firstname'];
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
            $SchoolStreetNumber = $_POST['SchoolStreetNumber'];
            $SchoolRoadName = $_POST['SchoolRoadName'];
            $SchoolBarangay = $_POST['SchoolBarangay'];
            $SchoolTown = $_POST['SchoolTown'];
            $SchoolProvince = $_POST['SchoolProvince'];
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

            //array
            $SiblingFirstName = $_POST['sib_fname'];
            $SiblingMiddleName = $_POST['sib_mname'];
            $SiblingLastName = $_POST['sib_lname'];
            $sib_educ_assist = $_POST['sib_educ_assist'];
            $Course = $_POST['sib_course'];
            $Year = $_POST['sib_year'];

            $sql = "UPDATE tbl_userinfo, tbl_useraddress, tbl_school, tbl_schooladdress,tbl_parents,tbl_parentsaddress,tbl_siblings SET tbl_userinfo.FirstName = '$fname', tbl_userinfo.MiddleName = '$mname',tbl_userinfo.LastName = '$lname', tbl_userinfo.DateOfBirth = '$bday',tbl_userinfo.Age = '$Age', tbl_userinfo.Sex = '$Sex', tbl_userinfo.PlaceOfBirth = '$PlaceOfBirth',tbl_userinfo.Citizenship = '$Citizenship',tbl_userinfo.fb_account = '$fb',tbl_userinfo.contactnumber = '$contactnumber',tbl_userinfo.EmailAddress = '$EmailAddress',tbl_useraddress.StreetNumber = '$Street',tbl_useraddress.RoadName = '$RoadName',tbl_useraddress.Barangay = '$Barangay',tbl_useraddress.Town = '$Town',tbl_useraddress.Province = '$Province', tbl_school.YearCompleted = '$HighestYearCompleted', tbl_school.GWA = '$GWA', tbl_school.LastSchoolAttended = '$LastSchoolAttended',  tbl_school.SchoolIntended = '$SchoolIntended', tbl_school.ExamRating = '$ExamRating',  tbl_school.Course = '$Course', tbl_school.Scholarship = '$Scholarship',tbl_schooladdress.StreetNumber = '$SchoolStreetNumber', tbl_schooladdress.RoadName = '$SchoolRoadName', tbl_schooladdress.Barangay = '$SchoolBarangay', tbl_schooladdress.Town = '$SchoolTown', tbl_schooladdress.Province = '$SchoolProvince', tbl_parents.FatherFirstName = '$FatherFirstName', tbl_parents.FatherMiddleName = '$FatherMiddleName', tbl_parents.FatherLastName = '$FatherLastName', tbl_parents.FatherAge = '$FatherAge', tbl_parents.FatherOccupation = '$FatherOccupation', tbl_parents.MotherFirstName = '$MotherFirstName', tbl_parents.MotherMiddleName = '$MotherMiddleName', tbl_parents.MotherLastName = '$MotherLastName', tbl_parents.MotherAge = '$MotherAge', tbl_parents.MotherOccupation = '$MotherOccupation', tbl_parents.TotalMembers = '$NoFamilyMembers', tbl_parents.siblings = '$Siblings', tbl_parents.Income = '$Income', tbl_parentsaddress.StreetNumber = '$ParentStreetNumber', tbl_parentsaddress.RoadName = '$ParentRoadName', tbl_parentsaddress.Barangay = '$ParentBarangay', tbl_parentsaddress.Town = '$ParentTown', tbl_parentsaddress.Province = '$ParentProvince'
                  WHERE tbl_userinfo.id = tbl_useraddress.user_id AND tbl_userinfo.id = tbl_school.user_id AND tbl_userinfo.id = tbl_schooladdress.user_id AND tbl_userinfo.id = tbl_parents.user_id AND tbl_userinfo.id = tbl_parentsaddress.user_id AND tbl_siblings.id = tbl_school.user_id AND tbl_userinfo.id = '$id'";

                  //$result = mysqli_query($conn, $sql);

                  if(mysqli_query($conn, $sql)){
              echo "<script language='javascript'> 
                   alert('Form Successfully Updated');
                   </script>";
             // echo "<script>$('#exampleModal').modal('show')</script>";
              //header('Location: view.php?id='.$id);
              echo "<script> 
                   window.location.href='view.php?id='.$id;
                   </script>";
            }
            else{
              echo "Error: " . $result . "" . mysqli_error($conn);
            }
            $conn->close();
            
}

?>