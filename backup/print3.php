<?php 
include 'config.php';
    $id = $_GET['id'];
    //$id = $id1 +1;
    $sql = "SELECT ui.FirstName as userFname, ui.MiddleName as userMname, ui.LastName as userLname, ui.DateOfBirth as DOB, ui.Age as userage, ui.Sex as sex, ui.PlaceOfBirth as pobirth, ui.Citizenship as citizen, ui.fb_account as fb, ui.contactnumber as cNumber, ui.EmailAddress as email, ui.Image as image, ui.birthOrder as birthOrder, ui.religion as religion, ui.Category as Category, ua.StreetNumber as uaSN, ua.RoadName as uaRN, ua.Barangay as uaB, ua.Town as uaT, ua.Province as uaP,  s.YearCompleted as yearCompleted, s.GWA as gwa, s.SchoolIntended as SchoolIntended, s.LastSchoolAttended as lsa, s.ExamRating as ExamRating, s.Course as Course, s.Scholarship as sGrant, s.grades1stSem as grades1stSem, s.grades2ndSem as grades2ndSem, sa.StreetNumber as saSN, sa.RoadName as saRN, sa.Barangay as saB, sa.Town as saT, sa.Province as saP, p.FatherFirstName as fatherFname, p.FatherMiddleName as fatherMname, p.FatherLastName as fatherLname, p.MotherFirstName as motherFname, p.MotherMiddleName as motherMname, p.MotherLastName as motherLname, p.FatherAge as fatherAge, p.MotherAge as motherAge, p.FatherOccupation as fOccupation, p.MotherOccupation as mOccupation, p.TotalMembers as tm, p.siblings as siblings, p.contactnumber as parentsContactnumber, p.guardianFirstName as guardianFirstName, p.guardianMiddleName as guardianMiddleName, p.guardianLastName as guardianLastName, p.guardianContactNumber as guardianContactNumber, p.guardianAge as guardianAge, p.guardianOccupation as guardianOccupation, p.guardianRelationship as guardianRelationship, p.brothers as brothers, p.sisters as sisters, p.Income as income, pa.StreetNumber as pSN, pa.RoadName as pRN, pa.Barangay as pB, pa.Town as pT, pa.Province as pP, pa.guardianStreetNumber as guardianStreetNumber, pa.guardianRoadName as guardianRoadName, pa.guardianBarangay as guardianBarangay, pa.guardianTown as guardianTown, pa. guardianProvince as guardianProvince, g.GWA as gwaNOW, g.yrLvl as yrLvl, ui.remarks as remarks, ui.assessment as assessment, g.semester as semester, g.with_failing_grade as wfg  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.user_id = ui.id LEFT JOIN tbl_school as s on ui.id = s.user_id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.user_id LEFT JOIN tbl_parents as p on ui.id = p.user_id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.user_id LEFT JOIN tbl_grades as g on ui.id = g.user_id where ui.id = '$id'"; 


    $dataGWA = array();
    $dataYR = array();
    $dataREMARKS = array();
    $dataASSESS = array();
    $dataSEM = array();
    $dataWFG = array();
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) { 
            $parentsContactnumber = $row['parentsContactnumber'];
            $guardian = $row['guardianLastName'].", ".$row['guardianFirstName']." ".$row['guardianMiddleName'];
            $guardianAddress = $row['guardianStreetNumber']." ".$row['guardianRoadName']." ".$row['guardianBarangay']." ".$row['guardianTown'].", ".$row['guardianProvince'];
            $guardianContactNumber = $row['guardianContactNumber'];
            $guardianAge = $row['guardianAge'];
            $guardianRelationship = $row['guardianRelationship'];
            $guardianOccupation = $row['guardianOccupation'];
            $brothers = $row['brothers'];
            $sisters = $row['sisters'];
            $Lname = $row['userLname'];
            $Fname = $row['userFname'];
            $Mname = $row['userMname'];
            $contactnumber = $row['cNumber'];
            $birthOrder = $row['birthOrder'];
            $religion = $row['religion'];
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
            $grades1stSem = $row['grades1stSem'];
            $grades2ndSem = $row['grades2ndSem'];
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
            $dataGWA[] = ($row['gwaNOW']);
            $dataYR[] = ($row['yrLvl']);
            $datahighestYR = max(array_keys($dataYR));
            $dataREMARKS[] = ($row['remarks']);
            $dataASSESS[] = ($row['assessment']);
            $dataSEM[] = ($row['semester']);
            $dataWFG[] = ($row['wfg']);
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
    $pageCount = $pdf->setSourceFile('files/EPS Form.pdf'); 
}
else if($Category == "EA College" && $dataYR[0] == '1st'){
    $pageCount = $pdf->setSourceFile('files/Educ Assistance College.pdf');     
}
else if($Category == "EA College" && $dataYR[0] == '2nd'){
    $pageCount = $pdf->setSourceFile('files/Educ Assistance College2.pdf');     
}
else if($Category == "EA College" && $dataYR[0] == '3rd'){
    $pageCount = $pdf->setSourceFile('files/Educ Assistance College2.pdf');     
}
else if($Category == "EA College" && $dataYR[0] == '4th'){
    $pageCount = $pdf->setSourceFile('files/Educ Assistance College2.pdf');     
}
else if($Category == "EA College" && $dataYR[0] == '5th'){
    $pageCount = $pdf->setSourceFile('files/Educ Assistance College2.pdf');     
}
else if($Category == "EA Senior High"){
    $pageCount = $pdf->setSourceFile('files/SHS.pdf'); 
}

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->importPage($pageNo);
    $size = $pdf->getTemplateSize($tplIdx);
    // add a page
    $pdf->AddPage();
    $pdf->useTemplate($tplIdx, null, null, 216, 330.2, false);
    $pdf->AddFont('Cambria','','Cambria.php');
    // font and color selection

    if($pageNo == '1'){


        if($Category == "EA College"){
            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetTextColor(0, 0, 0);
            if ($image ==""){

            }
            else{
            $pic = "students/".$image;
            $pdf->Image($pic,174,86,32,26);
                
            }
            if ($dataYR[0] == '1st' && $Category == "EA College"){
                //set font to cambria
                $pdf->SetFont('Cambria');
                $pdf->SetFontSize('12');
                $pdf->SetXY(100, 71);
                $pdf->Write(1, '1st Year');
            }
            else if ($dataYR[0] == '2nd' && $Category == "EA College") {
                $pdf->SetFont('Cambria');
                $pdf->SetFontSize('12');
                $pdf->SetXY(100, 71);
                $pdf->Write(1, '2nd Year');
            }
            else if ($dataYR[0] == '3rd' && $Category == "EA College") {
                $pdf->SetFont('Cambria');
                $pdf->SetFontSize('12');
                $pdf->SetXY(100, 71);
                $pdf->Write(1, '3rd Year');
            }
            else if ($dataYR[0] == '4th' && $Category == "EA College") {
                $pdf->SetFont('Cambria','',12); 
                //
                $pdf->SetXY(100, 71);
                $pdf->Write(1, '4th Year');
            }
            else if ($dataYR[0] == '5th' && $Category == "EA College") {
                $pdf->SetFont('Cambria');
                $pdf->SetFontSize('12');
                $pdf->SetXY(100, 71);
                $pdf->Write(1, '5th Year');
            }
            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetXY(30, 116);
            $pdf->Write(1, $Lname);

            $pdf->SetXY(60, 116);
            $pdf->Write(1, $Fname);

            $pdf->SetXY(125, 116);
            $pdf->Write(1, $Mname);
            //$MI = $Mname[0];
            //$pdf->Write(1, substr($MI,0,1));

            $pdf->SetXY(171, 116);
            $pdf->Write(1, $contactnumber);

            $pdf->SetXY(50, 124);
            $pdf->Write(1, $dobirth);

            $pdf->SetXY(100, 124);
            $pdf->Write(1, $userage);

            if($sex == 'm' || $sex == 'M' || $sex == 'Male'){
                $sex2 = "Male";
            }
            else{
                $sex2 = "Female";
            }

            $pdf->SetXY(121, 124);
            $pdf->Write(1, $sex2);

            $pdf->SetXY(171, 124);
            $pdf->Write(1, $birthOrder);

            $pdf->SetXY(50, 129);
            $pdf->Write(1, $pobirth);

            $pdf->SetXY(171, 129);
            $pdf->Write(1, $citizen);

            $pdf->SetXY(75, 135);
            $pdf->Write(1, $cpa);

            $pdf->SetFontSize('8');
            $pdf->SetXY(120, 141);
            $pdf->Write(1, $email);

            $pdf->SetXY(80, 141);
            $pdf->Write(1, $fb_account);

            $pdf->SetFontSize('8');
            $pdf->SetXY(177, 141);
            $pdf->Write(1, $religion);

            $pdf->SetFontSize('10');
            $pdf->SetXY(83, 146);
            $pdf->Write(1, $lsa);

             $pdf->SetXY(55, 152);
            $pdf->Write(1, $sa);

            $pdf->SetXY(60, 157.5);
            $pdf->Write(1, $yearCompleted);

            $pdf->SetFontSize('8');
            $pdf->SetXY(132, 157.5);
            $pdf->Write(1, $grades1stSem);

            $pdf->SetXY(154, 157.5);
            $pdf->Write(1, $grades2ndSem);

            
            $pdf->SetXY(190.9, 157.5);
            $pdf->Write(1, $GWA);

            

            
            
            $pdf->SetFontSize('8');    
            $pdf->SetXY(66, 163);
            $pdf->Write(1, $site);

            $pdf->SetFontSize('10'); 
            $pdf->SetXY(188, 163);
            $pdf->Write(1, $eer);

            $pdf->SetXY(60, 169);
            $pdf->Write(1, $cite);

            $pdf->SetXY(79, 180);
            $pdf->Write(1, $grant);

            $pdf->SetXY(44, 186);
            $pdf->Write(1, $father);

            $pdf->SetXY(128, 186);
            $pdf->Write(1, $fatherage);

            $pdf->SetXY(165, 186);
            $pdf->Write(1, $fOccupation);

            $pdf->SetXY(44, 192);
            $pdf->Write(1, $mother);

            $pdf->SetXY(129, 192);
            $pdf->Write(1, $motherage);

            $pdf->SetXY(166, 192);
            $pdf->Write(1, $mOccupation);

            $pdf->SetFontSize('8'); 
            $pdf->SetXY(63, 197);
            $pdf->Write(1, $PPA);

            $pdf->SetFontSize('10');
            $pdf->SetXY(174, 197);
            $pdf->Write(1, $parentsContactnumber);

            $pdf->SetFontSize('10');
            $pdf->SetXY(77, 203);
            $pdf->Write(1, $tnfm);

            $pdf->SetXY(132, 203);
            $pdf->Write(1, $brothers);

            $pdf->SetXY(178, 203);
            $pdf->Write(1, $sisters);

            $pdf->SetXY(90, 209);
            $pdf->Write(1, $Income);

            $pdf->SetXY(47.5, 218.5);
            $pdf->Write(1, $guardian);

            $pdf->SetXY(136, 218.5);
            $pdf->Write(1, $guardianRelationship);

            $pdf->SetFontSize('8');
            $pdf->SetXY(180, 218.5);
            $pdf->Write(1, $guardianContactNumber);

            
            $pdf->SetFontSize('7');
            $pdf->SetXY(68, 224.5);
            $pdf->Write(1, $guardianAddress);

            $pdf->SetFontSize('10');
            $pdf->SetXY(141, 224.5);
            $pdf->Write(1, $guardianAge);

            $pdf->SetXY(177, 224.5);
            $pdf->Write(1, $guardianOccupation);
            
        }

        else if($Category == "EPS College"){
            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetTextColor(0, 0, 0);
            if ($image ==""){

            }
            else{
            $pic = "students/".$image;
            $pdf->Image($pic,174,84,32,26);
                
            }
            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetXY(30, 114);
            $pdf->Write(1, $Lname);

            $pdf->SetXY(60, 114);
            $pdf->Write(1, $Fname);

            $pdf->SetXY(125, 114);
            $pdf->Write(1, $Mname);
            //$MI = $Mname[0];
            //$pdf->Write(1, substr($MI,0,1));

            $pdf->SetXY(171, 114);
            $pdf->Write(1, $contactnumber);

            $pdf->SetXY(50, 122);
            $pdf->Write(1, $dobirth);

            $pdf->SetXY(100, 122);
            $pdf->Write(1, $userage);

            if($sex == 'm' || $sex == 'M' || $sex == 'Male'){
                $sex2 = "Male";
            }
            else{
                $sex2 = "Female";
            }

            $pdf->SetXY(121, 122);
            $pdf->Write(1, $sex2);

            $pdf->SetXY(171, 122);
            $pdf->Write(1, $birthOrder);

            $pdf->SetXY(50, 127);
            $pdf->Write(1, $pobirth);

            $pdf->SetXY(171, 127);
            $pdf->Write(1, $citizen);

            $pdf->SetXY(75, 133);
            $pdf->Write(1, $cpa);

            $pdf->SetFontSize('8');
            $pdf->SetXY(120, 139);
            $pdf->Write(1, $email);

            $pdf->SetXY(80, 139);
            $pdf->Write(1, $fb_account);

            $pdf->SetFontSize('8');
            $pdf->SetXY(177, 139);
            $pdf->Write(1, $religion);

            $pdf->SetFontSize('10');
            $pdf->SetXY(83, 144);
            $pdf->Write(1, $lsa);

             $pdf->SetXY(55, 150);
            $pdf->Write(1, $sa);

            $pdf->SetXY(60, 155.5);
            $pdf->Write(1, $yearCompleted);

            $pdf->SetFontSize('8');
            $pdf->SetXY(132, 155.5);
            $pdf->Write(1, $grades1stSem);

            $pdf->SetXY(154, 155.5);
            $pdf->Write(1, $grades2ndSem);

            
            $pdf->SetXY(190.9, 155.5);
            $pdf->Write(1, $GWA);

            

            
            
            $pdf->SetFontSize('8');    
            $pdf->SetXY(66, 161);
            $pdf->Write(1, $site);


            $pdf->SetFontSize('10'); 
            $pdf->SetXY(188, 161);
            $pdf->Write(1, $eer);

            $pdf->SetXY(60, 167);
            $pdf->Write(1, $cite);

            $pdf->SetXY(79, 178);
            $pdf->Write(1, $grant);

            $pdf->SetXY(44, 184);
            $pdf->Write(1, $father);

            $pdf->SetXY(128, 184);
            $pdf->Write(1, $fatherage);

            $pdf->SetXY(165, 184);
            $pdf->Write(1, $fOccupation);

            $pdf->SetXY(44, 189);
            $pdf->Write(1, $mother);

            $pdf->SetXY(129, 189);
            $pdf->Write(1, $motherage);

            $pdf->SetXY(166, 189);
            $pdf->Write(1, $mOccupation);

            $pdf->SetFontSize('8'); 
            $pdf->SetXY(63, 195);
            $pdf->Write(1, $PPA);

            $pdf->SetFontSize('10');
            $pdf->SetXY(174, 195);
            $pdf->Write(1, $parentsContactnumber);

            $pdf->SetFontSize('10');
            $pdf->SetXY(77, 200.5);
            $pdf->Write(1, $tnfm);

            $pdf->SetXY(132, 200.5);
            $pdf->Write(1, $brothers);

            $pdf->SetXY(178, 200.5);
            $pdf->Write(1, $sisters);

            $pdf->SetXY(90, 206);
            $pdf->Write(1, $Income);

            $pdf->SetXY(47.5, 216.5);
            $pdf->Write(1, $guardian);

            $pdf->SetXY(136, 216.5);
            $pdf->Write(1, $guardianRelationship);

            $pdf->SetFontSize('8');
            $pdf->SetXY(180, 216.5);
            $pdf->Write(1, $guardianContactNumber);

            $pdf->SetFontSize('7');
            $pdf->SetXY(68, 221.5);
            $pdf->Write(1, $guardianAddress);

            $pdf->SetFontSize('10');
            $pdf->SetXY(141, 221.5);
            $pdf->Write(1, $guardianAge);

            $pdf->SetFontSize('7');
            $pdf->SetXY(175, 221.5);
            $pdf->Write(1, $guardianOccupation);
            
        }

        else if($Category == "EA Senior High"){

             $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetTextColor(0, 0, 0);
            if ($image ==""){

            }
            else{
            $pic = "students/".$image;
            $pdf->Image($pic,174,91.8,32,26);
                
            }
            if ($dataYR[0] == 'Grade 11' && $Category == "EA Senior High"){
                //set font to cambria
                $pdf->SetFont('Cambria');
                $pdf->SetFontSize('12');
                $pdf->SetXY(100, 77);
                $pdf->Write(1, 'Grade 11');
            }
            else if ($dataYR[0] == 'Grade 12' && $Category == "EA Senior High") {
                $pdf->SetFont('Cambria');
                $pdf->SetFontSize('12');
                $pdf->SetXY(100, 77);
                $pdf->Write(1, 'Grade 12');
            }
            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetXY(30, 122);
            $pdf->Write(1, $Lname);

            $pdf->SetXY(60, 122);
            $pdf->Write(1, $Fname);

            $pdf->SetXY(125, 122);
            $pdf->Write(1, $Mname);
            //$MI = $Mname[0];
            //$pdf->Write(1, substr($MI,0,1));

            $pdf->SetXY(171, 122);
            $pdf->Write(1, $contactnumber);

            $pdf->SetXY(50, 130);
            $pdf->Write(1, $dobirth);

            $pdf->SetXY(100, 130);
            $pdf->Write(1, $userage);

            if($sex == 'm' || $sex == 'M' || $sex == 'Male'){
                $sex2 = "Male";
            }
            else{
                $sex2 = "Female";
            }

            $pdf->SetXY(121, 130);
            $pdf->Write(1, $sex2);

            $pdf->SetXY(171, 130);
            $pdf->Write(1, $birthOrder);

            $pdf->SetXY(50, 135);
            $pdf->Write(1, $pobirth);

            $pdf->SetXY(171, 135);
            $pdf->Write(1, $citizen);

            $pdf->SetXY(75, 141);
            $pdf->Write(1, $cpa);

            $pdf->SetFontSize('8');
            $pdf->SetXY(120, 147);
            $pdf->Write(1, $email);

            $pdf->SetXY(80, 147);
            $pdf->Write(1, $fb_account);

            $pdf->SetFontSize('8');
            $pdf->SetXY(177, 147);
            $pdf->Write(1, $religion);

            $pdf->SetFontSize('10');
            $pdf->SetXY(56, 152);
            $pdf->Write(1, $lsa);

             $pdf->SetXY(50, 158);
            $pdf->Write(1, $sa);

            $pdf->SetXY(60, 163.5);
            $pdf->Write(1, $yearCompleted);

            $pdf->SetXY(180.9, 163.5);
            $pdf->Write(1, $GWA);
            
            $pdf->SetFontSize('8');    
            $pdf->SetXY(66, 169);
            $pdf->Write(1, $site);

            $pdf->SetFontSize('10'); 
            $pdf->SetXY(188, 169);
            $pdf->Write(1, $eer);

            $pdf->SetXY(60, 175);
            $pdf->Write(1, $cite);

            $pdf->SetXY(79, 181);
            $pdf->Write(1, $grant);

            $pdf->SetXY(44, 186.5);
            $pdf->Write(1, $father);

            $pdf->SetXY(128, 186.5);
            $pdf->Write(1, $fatherage);

            $pdf->SetXY(165, 186.5);
            $pdf->Write(1, $fOccupation);

            $pdf->SetXY(44, 192);
            $pdf->Write(1, $mother);

            $pdf->SetXY(129, 192);
            $pdf->Write(1, $motherage);

            $pdf->SetXY(166, 192);
            $pdf->Write(1, $mOccupation);

            $pdf->SetFontSize('8'); 
            $pdf->SetXY(63, 198);
            $pdf->Write(1, $PPA);

            $pdf->SetFontSize('10');
            $pdf->SetXY(174, 198);
            $pdf->Write(1, $parentsContactnumber);

            $pdf->SetFontSize('10');
            $pdf->SetXY(77, 203.5);
            $pdf->Write(1, $tnfm);

            $pdf->SetXY(132, 203.5);
            $pdf->Write(1, $brothers);

            $pdf->SetXY(178, 203.5);
            $pdf->Write(1, $sisters);

            $pdf->SetXY(90, 209);
            $pdf->Write(1, $Income);

            $pdf->SetXY(47.5, 218.8);
            $pdf->Write(1, $guardian);

            $pdf->SetXY(132, 218.8);
            $pdf->Write(1, $guardianRelationship);

            $pdf->SetFontSize('8');
            $pdf->SetXY(180, 218.8);
            $pdf->Write(1, $guardianContactNumber);

            
            $pdf->SetFontSize('7');
            $pdf->SetXY(68, 224.5);
            $pdf->Write(1, $guardianAddress);

            $pdf->SetFontSize('10');
            $pdf->SetXY(141, 224.5);
            $pdf->Write(1, $guardianAge);

            $pdf->SetXY(177, 224.5);
            $pdf->Write(1, $guardianOccupation);
            
        }
    
    }
}


$pdf->Output();
?>

