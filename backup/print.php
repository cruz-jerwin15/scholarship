<?php
	include 'config.php';
	$id = $_GET['id'];
	$sql = "SELECT ui.FirstName as userFname, ui.MiddleName as userMname, ui.LastName as userLname, ui.DateOfBirth as DOB, ui.Age as userage, ui.Sex as sex, ui.PlaceOfBirth as pobirth, ui.Citizenship as citizen, ui.fb_account as fb, ui.contactnumber as cNumber, ui.EmailAddress as email, ui.Image as image, ua.StreetNumber as uaSN, ua.RoadName as uaRN, ua.Barangay as uaB, ua.Town as uaT, ua.Province as uaP, sib.FirstName as sibFname, sib.MiddleName as sibMname, sib.LastName as sibLname, sib.sib_educ_assist as educ_assist, sib.sib_course as sib_course, sib.sib_year as sib_year, s.YearCompleted as yearCompleted, s.GWA as gwa, s.SchoolIntended as SchoolIntended, s.LastSchoolAttended as lsa, s.ExamRating as ExamRating, s.Course as Course, s.Scholarship as sGrant, s.year_course, sa.StreetNumber as saSN, sa.RoadName as saRN, sa.Barangay as saB, sa.Town as saT, sa.Province as saP, p.FatherFirstName as fatherFname, p.FatherMiddleName as fatherMname, p.FatherLastName as fatherLname, p.MotherFirstName as motherFname, p.MotherMiddleName as motherMname, p.MotherLastName as motherLname, p.TotalMembers as tm, p.siblings as siblings, p.Income as income, pa.StreetNumber as pSN, pa.RoadName as pRN, pa.Barangay as pB, pa.Town as pT, pa.Province as pP  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.user_id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.user_id LEFT JOIN tbl_school as s on ui.id = s.user_id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.user_id LEFT JOIN tbl_parents as p on ui.id = p.user_id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.user_id where ui.id = '$id' "; 

	$result = mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) { 
			$name = $row['userLname'].", ".$row['userFname']." ".$row['userMname'];
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
			$PPA = $row['pSN']." ".$row['pRN']." Barangay ".$row['pB']." ".$row['pT'].", ".$row['pP'];
			$tnfm = $row['tm'];
			$siblings = $row['siblings'];
			$Income = $row['income'];
			$siblingname = $row['sibLname'].", ".$row['sibFname']." ".$row['sibMname'];
			$educ_assist = $row['educ_assist'];
			$sib_course = $row['sib_course'];
			$sib_year = $row['sib_year'];
		} 
	}
?>


<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<div class="form-group">
	<div class="row col">
		<div class="col-sm-8 text-right">
			<label for="">"EPS Scholarship & Youth Development Program"</label>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-8 text-right">
			<label for="">"Edukasyon Pahalagahan Sagot sa Kinabukasan"</label>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-7 text-right">
			<label for="">Application Form </label>
		</div>
	</div>



	<div class="row col">
		<div class="col-sm-11 text-right">
			<label for="">No. </label>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12 text-right">
			<img src="students/<?php echo $image; ?>" alt="" width = "96" height = "96">
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-4">
			<!-- <label for="">Name: </label> -->
			<p class="form-control-static"><?php echo "Name:"." ".$name; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-6">
			<!-- <label for="">Date of Birth: </label> -->
			<p class="form-control-static"><?php echo "Date of Birth:"." ".$dobirth; ?></p>
		</div>
		<div class="col-sm-3">
			<!-- <label for="">Age: </label> -->
			<p class="form-control-static"><?php echo "Age:"." ".$userage; ?></p>
		</div>
		<div class="col-sm-3">
			<!-- <label for="">Sex: </label> -->
			<p class="form-control-static"><?php echo "Sex:"." ".$sex; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-6">
			<!-- <label for="">Place of Birth: </label> -->
			<p class="form-control-static"><?php echo "Place of Birth:"." ".$pobirth; ?></p>
		</div>
		<div class="col-sm-6">
			<!-- <label for="">Citizenship: </label> -->
			<p class="form-control-static"><?php echo "Citizenship:"." ".$citizen; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Complete Present Address: </label> -->
			<p class="form-control-static"><?php echo "Complete Present Address:"." ".$cpa; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Last School Attended: </label> -->
			<p class="form-control-static"><?php echo "Last School Attended:"." ".$lsa; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">School Address: </label> -->
			<p class="form-control-static"><?php echo "School Address:"." ".$sa; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-6">
			<!-- <label for="">Highest Year Completed: </label> -->
			<p class="form-control-static"><?php echo "Highest Year Completed:"." ".$yearCompleted; ?></p>
		</div>
		<div class="col-sm-6">
			<!-- <label for="">Gen. Weighted Average(HS/COLLEGE LEVEL): </label> -->
			<p class="form-control-static"><?php echo "Gen. Weighted Average(HS/COLLEGE LEVEL):"." ".$GWA; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Course Intended to Take: </label> -->
			<p class="form-control-static"><?php echo "Contact Number:"." ".$contactnumber; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-6">
			<!-- <label for="">Facebook Account: </label> -->
			<p class="form-control-static"><?php echo "Facebook Account:"." ".$fb_account; ?></p>
		</div>
		<div class="col-sm-6">
			<!-- <label for="">Email Address: </label> -->
			<p class="form-control-static"><?php echo "Email Address:"." ".$email; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-6">
			<!-- <label for="">School Intended to Enroll: </label> -->
			<p class="form-control-static"><?php echo "School Intended to Enroll:"." ".$site; ?></p>
		</div>
		<div class="col-sm-6">
			<!-- <label for="">Entrance Exam Rating: </label> -->
			<p class="form-control-static"><?php echo "Entrance Exam Rating:"." ".$eer; ?></p>
		</div>
	</div>
	
	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Course Intended to Take: </label> -->
			<p class="form-control-static"><?php echo "Course Intended to Take:"." ".$cite; ?></p>
		</div>
	</div>
	
	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Other Bursary or Grant Enjoyed: </label> -->
			<p class="form-control-static"><?php echo "Other Bursary or Grant Enjoyed:"." ".$grant; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-4">
			<!-- <label for="">Name of Father: </label> -->
			<p class="form-control-static"><?php echo "Name of Father:"." ".$father; ?></p>
		</div>
		<div class="col-sm-4">
			<!-- <label for="">Age: </label> -->
			<!-- <p class="form-control-static"><?php  $fatherage; ?></p> -->
		</div>
		<div class="col-sm-4">
			<!-- <label for="">Occupation: </label> -->
			<!-- <p class="form-control-static"><?php  $fatheroccupation; ?></p> -->
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Name of Mother: </label> -->
			<p class="form-control-static"><?php echo "Name of Mother:"." ".$mother; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Parent's Present Address: </label> -->
			<p class="form-control-static"><?php echo "Parent's Present Address:"." ".$PPA; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-6">
			<!-- <label for="">Total Number of Family Members: </label> -->
			<p class="form-control-static"><?php echo "Total Number of Family Members:"." ".$tnfm; ?></p>
		</div>
		<div class="col-sm-6">
			<!-- <label for="">Siblings: </label> -->
			<p class="form-control-static"><?php echo "Siblings:"." ".$siblings; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<!-- <label for="">Parent's Total Gross Income Per Year: </label> -->
			<p class="form-control-static"><?php echo "Parent's Total Gross Income Per Year:"." ".$Income; ?></p>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-12">
			<label for="">Educational Assistance Enjoyed By Brothers/Sisters: </label>
		</div>
	</div>

	<div class="row col">
		<div class="col-sm-4">
			<label for="">Name: </label>
			<p class="form-control-static"><?php echo $siblingname; ?></p>
		</div>
		<div class="col-sm-4">
			<label for="">Educational Assistance: </label>
			<p class="form-control-static"><?php echo $educ_assist; ?></p>
		</div>
		<div class="col-sm-4">
			<label for="">Course & Year: </label>
			<p class="form-control-static"><?php echo $sib_course .' & '. $sib_year; ?></p>
		</div>
	</div>
</div>

<script>
	window.print();
</script>