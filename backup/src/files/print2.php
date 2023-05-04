<?php 
include 'config.php';
	$id = $_GET['id'];
	$sql = "SELECT ui.FirstName as userFname, ui.MiddleName as userMname, ui.LastName as userLname, ui.DateOfBirth as DOB, ui.Age as userage, ui.Sex as sex, ui.PlaceOfBirth as pobirth, ui.Citizenship as citizen, ui.fb_account as fb, ui.contactnumber as cNumber, ui.EmailAddress as email, ui.Image as image, ui.Category as Category, ua.StreetNumber as uaSN, ua.RoadName as uaRN, ua.Barangay as uaB, ua.Town as uaT, ua.Province as uaP, sib.FirstName as sibFname, sib.MiddleName as sibMname, sib.LastName as sibLname, sib.sib_educ_assist as educ_assist, sib.sib_course as sib_course, sib.sib_year as sib_year, s.YearCompleted as yearCompleted, s.GWA as gwa, s.SchoolIntended as SchoolIntended, s.LastSchoolAttended as lsa, s.ExamRating as ExamRating, s.Course as Course, s.Scholarship as sGrant, s.year_course, sa.StreetNumber as saSN, sa.RoadName as saRN, sa.Barangay as saB, sa.Town as saT, sa.Province as saP, p.FatherFirstName as fatherFname, p.FatherMiddleName as fatherMname, p.FatherLastName as fatherLname, p.MotherFirstName as motherFname, p.MotherMiddleName as motherMname, p.MotherLastName as motherLname, p.FatherAge as fatherAge, p.MotherAge as motherAge, p.FatherOccupation as fOccupation, p.MotherOccupation as mOccupation, p.TotalMembers as tm, p.siblings as siblings, p.Income as income, pa.StreetNumber as pSN, pa.RoadName as pRN, pa.Barangay as pB, pa.Town as pT, pa.Province as pP  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.user_id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.user_id LEFT JOIN tbl_school as s on ui.id = s.user_id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.user_id LEFT JOIN tbl_parents as p on ui.id = p.user_id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.user_id where ui.id = '$id'"; 

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
			$siblingname = $row['sibLname'].", ".$row['sibFname']." ".$row['sibMname'];
			$educ_assist = $row['educ_assist'];
			$sib_course = $row['sib_course'];
			$sib_year = $row['sib_year'];
            $Category = $row['Category'];
		} 
	}

use setasign\Fpdi\Fpdi;
include('config.php');

require_once('fpdf/fpdf.php'); 
//require_once('fpdi/src/Fpdi.php'); 
require_once('fpdi/src/autoload.php'); 

// initiate FPDI 
$pdf = new Fpdi(); 

// set the sourcefile 
if ($Category == "EPS College"){    
    $pageCount = $pdf->setSourceFile('files/General_Info_EPS.pdf'); 
}
else if($Category == "EA College"){
    $pageCount = $pdf->setSourceFile('files/General_Info_EA_College.pdf');     
}
else if($Category == "EA Senior High"){
    $pageCount = $pdf->setSourceFile('files/General_Info_EA_SHS.pdf'); 
}

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->importPage($pageNo);
    $size = $pdf->getTemplateSize($tplIdx);
    // add a page
    $pdf->AddPage();
    $pdf->useTemplate($tplIdx, null, null, 216, 330, false);

    // font and color selection





    // now write some text above the imported page
 //    $path = "students/".$image;
 //    $h_img = fopen($path, "rb");
 //    if(filesize($path) > 0){
    // $img = fread($h_img, filesize($image));  
 //    }
    // fclose($h_img);

    // // prepare a base64 encoded "data url"
    // $pic = 'data://text/plain;base64,' . base64_encode($img);
    // // extract dimensions from image
    // $info = getimagesize($pic);

 //    $pdf->SetXY(165, 100);

 //    $pdf->Image($pic, 'jpg');
    if($pageNo == '1'){

    // if($Category == 'EA Senior High'){
    //     $pdf->AddFont('ArialRoundedMTBold', '', 'ARLRDBD.php');
    //     $pdf->SetFont('ArialRoundedMTBold');
    //     $pdf->SetFontSize('14');
    //     $pdf->SetTextColor(0, 0, 0);

    //     $pdf->SetXY(42, 52);
    //     $pdf->Write(1, 'STO. TOMAS EDUCATIONAL ASSISTANCE PROGRAM');

    //     // $pdf->SetFontSize('16');
    //     $pdf->SetXY(83, 78);
    //     $pdf->Write(1, '(Senior High School)');
    // }
    
    // else if($Category == 'EPS College'){
    //     $pdf->AddFont('ArialRoundedMTBold', '', 'ARLRDBD.php');
    //     $pdf->SetFont('ArialRoundedMTBold');
    //     $pdf->SetFontSize('14');
    //     $pdf->SetTextColor(0, 0, 0);

    //     $pdf->SetXY(42, 52);
    //     $pdf->Write(1, 'EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM');

    //     // $pdf->SetFontSize('16');
    //     $pdf->SetXY(83, 78);
    //     $pdf->Write(1, '(College)');
    // }

    $pdf->SetFont('Helvetica');
    $pdf->SetFontSize('10');
    $pdf->SetTextColor(0, 0, 0);
    if ($image ==""){

        // $pic = "students/".$image;
        // $pdf->Image($pic,164,94,32,26);
    }
    else{
    $pic = "students/".$image;
    $pdf->Image($pic,164,94,32,26);
        
    }

    $pdf->SetXY(33, 127);
    $pdf->Write(1, $Lname);

    $pdf->SetXY(60, 127);
    $pdf->Write(1, $Fname);

    $pdf->SetXY(125, 127);
    $MI = $Mname[0];
    $pdf->Write(1, substr($MI,0,1));

    $pdf->SetXY(165, 127);
    $pdf->Write(1, $contactnumber);

    $pdf->SetXY(50, 135);
    $pdf->Write(1, $dobirth);

    $pdf->SetXY(145, 135);
    $pdf->Write(1, $userage);

    if($sex == 'm'){
    	$sex2 = "Male";
    }
    else{
    	$sex2 = "Female";
    }

    $pdf->SetXY(171, 135);
    $pdf->Write(1, $sex2);

    $pdf->SetXY(50, 140);
    $pdf->Write(1, $pobirth);

    $pdf->SetXY(160, 140);
    $pdf->Write(1, $citizen);

    $pdf->SetXY(75, 146);
    $pdf->Write(1, $cpa);

    $pdf->SetXY(55, 152);
    $pdf->Write(1, $father);

    $pdf->SetXY(115, 152);
    $pdf->Write(1, $fatherage);

    $pdf->SetXY(152, 152);
    $pdf->Write(1, $fOccupation);

     $pdf->SetXY(55, 157);
    $pdf->Write(1, $mother);

    $pdf->SetXY(115, 157);
    $pdf->Write(1, $motherage);

    $pdf->SetXY(152, 157);
    $pdf->Write(1, $mOccupation);

    $pdf->SetXY(75, 169);
    $pdf->Write(1, $yearCompleted);

    $pdf->SetXY(180, 169);
    $pdf->Write(1, $GWA);

    $pdf->SetXY(83, 174);
    $pdf->Write(1, $lsa);

    $pdf->SetXY(75, 169);
    $pdf->Write(1, $yearCompleted);

    $pdf->SetXY(57, 180);
    $pdf->Write(1, $sa);

    $pdf->SetXY(77, 186);
    $pdf->Write(1, $site);

    $pdf->SetXY(176, 186);
    $pdf->Write(1, $eer);

    $pdf->SetXY(87, 191);
    $pdf->Write(1, $cite);
    	
    }
}

$pdf->Output();
?>

