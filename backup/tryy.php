<?php 
include 'config.php';
	$id = '7';
	$sql = "SELECT ui.FirstName as userFname, ui.MiddleName as userMname, ui.LastName as userLname, ui.DateOfBirth as DOB, ui.Age as userage, ui.Sex as sex, ui.PlaceOfBirth as pobirth, ui.Citizenship as citizen, ui.fb_account as fb, ui.contactnumber as cNumber, ui.EmailAddress as email, ui.Image as image, ui.Category as Category, ua.StreetNumber as uaSN, ua.RoadName as uaRN, ua.Barangay as uaB, ua.Town as uaT, ua.Province as uaP,  s.YearCompleted as yearCompleted, s.GWA as gwa, s.SchoolIntended as SchoolIntended, s.LastSchoolAttended as lsa, s.ExamRating as ExamRating, s.Course as Course, s.Scholarship as sGrant, sa.StreetNumber as saSN, sa.RoadName as saRN, sa.Barangay as saB, sa.Town as saT, sa.Province as saP, p.FatherFirstName as fatherFname, p.FatherMiddleName as fatherMname, p.FatherLastName as fatherLname, p.MotherFirstName as motherFname, p.MotherMiddleName as motherMname, p.MotherLastName as motherLname, p.FatherAge as fatherAge, p.MotherAge as motherAge, p.FatherOccupation as fOccupation, p.MotherOccupation as mOccupation, p.TotalMembers as tm, p.siblings as siblings, p.Income as income, pa.StreetNumber as pSN, pa.RoadName as pRN, pa.Barangay as pB, pa.Town as pT, pa.Province as pP, g.GWA as gwaNOW, g.yrLvl as yrLvl, ui.remarks as remarks, ui.assessment as assessment, g.semester as semester  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.user_id = ui.id LEFT JOIN tbl_school as s on ui.id = s.user_id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.user_id LEFT JOIN tbl_parents as p on ui.id = p.user_id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.user_id LEFT JOIN tbl_grades as g on ui.id = g.user_id where ui.id = '$id'"; 

	$x = 0;
	$data = array();
	$dataYR = array();
	$result = mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) { 
			$Lname = $row['userLname'];
			$Fname = $row['userFname'];
			$Mname = $row['userMname'];
			$contactnumber = $row['cNumber'];
			$dobirth = $row['DOB'];
			$userage = $row['userage'];
			$sex = $row['sex'];
			$pobirth = $row['pobirth'];
			$citizen = $row['citizen'];
			$cpa = $row['uaSN']." ".$row['uaRN']." Barangay ".$row['uaB']." ".$row['uaT'].", ".$row['uaP'];
			$lsa = $row['lsa'];
			$image = $row['image'];
			$sa = $row['saSN']." ".$row['saRN']." Barangay ".$row['saB']." ".$row['saT'].", ".$row['saP'];
			$yearCompleted = $row['yearCompleted'];
			$GWA = $row['gwa'];
			$fb_account = $row['fb'];
			$contactnumber = $row['cNumber'];
			$email = $row['email'];
			$site = $row['SchoolIntended'];
			$eer = $row['ExamRating'];
			$cite = $row['Course'];
			$grant = $row['sGrant'];
			$father = $row['fatherLname'].", ".$row['fatherFname']." ".$row['fatherMname'];
			$mother = $row['motherLname'].", ".$row['motherFname']." ".$row['motherMname'];
			$fatherage = $row['fatherAge'];
			$motherage = $row['motherAge'];
			$fOccupation = $row['fOccupation'];
			$mOccupation = $row['mOccupation'];
			$PPA = $row['pSN']." ".$row['pRN']." Barangay ".$row['pB']." ".$row['pT'].", ".$row['pP'];
			$tnfm = $row['tm'];
			$siblings = $row['siblings'];
			$Income = $row['income'];
            $Category = $row['Category'];
            $gwaNow = $row['gwaNOW'];
            $yrLvl = $row['yrLvl'];
            $remarks = $row['remarks'];
            $assessment = $row['assessment'];
            $semester = $row['semester'];

            $data[] = ($row['gwaNOW']);
            $dataYR[] = ($row['yrLvl']);
            //$dataget = $data[$x]; 
		   // $datanew = str_replace($dataget);
		} 
	}

	print_r($dataYR);

?>