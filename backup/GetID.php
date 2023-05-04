<?php

require_once 'config.php';
$sqlid = "SELECT id from tbl_userinfo order by id DESC limit 0,1";
	$id;

	 $result = $conn->query($sqlid);
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

        	$id = $row['id'];

        }
    }

    

	$sql 	= "SELECT ui.FirstName, ui.MiddleName, ui.LastName, ui.ContactNumber, ui.DateOfBirth, ui.Age, ui.Sex, ui.PlaceOfBirth, ui.Citizenship, ui.EmailAddress, ua.StreetNumber, ua.RoadName, ua.Barangay, ua.Town, ua.PostalCode, ua.Province, ua.Country, sib.FirstName, sib.MiddleName, sib.LastName, sib.EducationalAssistanceOne, sib.CourseOne, sib.YearOne, sib.EducationalAssistanceTwo, sib.CourseTwo, sib.YearTwo, sib.EducationalAssistanceThree, sib.CourseThree, sib.YearThree, s.SchoolName, s.YearCompleted, s.GWA, s.SchoolIntended, s.LastSchoolAttended, s.ExamRating, s.Course, s.Scholarship, sa.StreetNumber, sa.RoadName, sa.Barangay, sa.Town, sa.PostalCode, sa.Province, sa.Country, p.FatherFirstName, p.FatherMiddleName, p.FatherLastName, p.MotherFirstName, p.MotherMiddleName, p.MotherLastName, p.TotalMembers, p.Brothers, p.Sisters, p.Income, pa.StreetNumber, pa.RoadName, pa.Barangay, pa.Town, pa.PostalCode, pa.Province, pa.Country  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.id LEFT JOIN tbl_school as s on ui.id = s.id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.id LEFT JOIN tbl_parents as p on ui.id = p.id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.id WHERE ui.id = ".$id;



	 $result = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_row($result)) {

        	echo implode(" $ ", $row);

        }
    

?>