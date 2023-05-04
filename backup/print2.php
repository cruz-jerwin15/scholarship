<?php 
include 'config.php';
    $id = $_GET['id'];
    $sql = "SELECT ui.FirstName as userFname, ui.MiddleName as userMname, ui.LastName as userLname, ui.DateOfBirth as DOB, ui.Age as userage, ui.Sex as sex, ui.PlaceOfBirth as pobirth, ui.Citizenship as citizen, ui.fb_account as fb, ui.contactnumber as cNumber, ui.EmailAddress as email, ui.Image as image, ui.Category as Category, ua.StreetNumber as uaSN, ua.RoadName as uaRN, ua.Barangay as uaB, ua.Town as uaT, ua.Province as uaP,  s.YearCompleted as yearCompleted, s.GWA as gwa, s.SchoolIntended as SchoolIntended, s.LastSchoolAttended as lsa, s.ExamRating as ExamRating, s.Course as Course, s.Scholarship as sGrant, sa.StreetNumber as saSN, sa.RoadName as saRN, sa.Barangay as saB, sa.Town as saT, sa.Province as saP, p.FatherFirstName as fatherFname, p.FatherMiddleName as fatherMname, p.FatherLastName as fatherLname, p.MotherFirstName as motherFname, p.MotherMiddleName as motherMname, p.MotherLastName as motherLname, p.FatherAge as fatherAge, p.MotherAge as motherAge, p.FatherOccupation as fOccupation, p.MotherOccupation as mOccupation, p.TotalMembers as tm, p.siblings as siblings, p.Income as income, pa.StreetNumber as pSN, pa.RoadName as pRN, pa.Barangay as pB, pa.Town as pT, pa.Province as pP, g.GWA as gwaNOW, g.yrLvl as yrLvl, ui.remarks as remarks, ui.assessment as assessment, g.semester as semester, g.with_failing_grade as wfg  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.user_id = ui.id LEFT JOIN tbl_school as s on ui.id = s.user_id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.user_id LEFT JOIN tbl_parents as p on ui.id = p.user_id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.user_id LEFT JOIN tbl_grades as g on ui.id = g.user_id where ui.id = '$id'"; 


    $dataGWA = array();
    $dataYR = array();
    $dataREMARKS = array();
    $dataASSESS = array();
    $dataSEM = array();
    $dataWFG = array();
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
            $dataGWA[] = ($row['gwaNOW']);
            $dataYR[] = ($row['yrLvl']);
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

    if($pageNo == '1'){

    $pdf->SetFont('Helvetica');
    $pdf->SetFontSize('10');
    $pdf->SetTextColor(0, 0, 0);
    if ($image ==""){

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

    if($sex == 'm' || $sex == 'M' || $sex == 'Male'){
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

    if($pageNo == '2'){
        $pdf->SetFontSize('8');
        if($dataYR[1] == "Grade 11"){    
            if(array_key_exists('1', $dataYR)){
                if($dataYR[1] == "Grade 11"){ 
                        $pdf->SetXY(73, 75);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 75);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 75);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 75);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 75);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 75);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('2', $dataYR)){
                if($dataYR[2] == "Grade 12"){ 
                        $pdf->SetXY(73, 85);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 85);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 85);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 85);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 85);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 85);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "1st" && $dataSEM[2] == "1st"){ 
                        $pdf->SetXY(73, 135);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 135);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "1st" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 145);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 145);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "2nd" && $dataSEM[2] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "2nd" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                    else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                            
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                }
            }
            if(array_key_exists('3', $dataYR)){
                if($dataYR[3] == "1st" && $dataSEM[3] == "1st"){ 
                        $pdf->SetXY(73, 135);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 135);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "1st" && $dataSEM[3] == "2nd"){ 
                        $pdf->SetXY(73, 145);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 145);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "2nd" && $dataSEM[3] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "2nd" && $dataSEM[3] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                            
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                }
            }   
            if(array_key_exists('4', $dataYR)){
                if($dataYR[4] == "1st" && $dataSEM[4] == "2nd"){ 
                        $pdf->SetXY(73, 145);
                        $pdf->Write(1, print_r($dataGWA[4], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 145);
                        $pdf->Write(1, print_r($dataREMARKS[4],true));
                        
                        if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "2nd" && $dataSEM[4] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[4], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[4],true));
                        
                        if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "2nd" && $dataSEM[4] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[4], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[4],true));
                        
                        if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "3rd" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "3rd" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('5', $dataYR)){
                if($dataYR[5] == "2nd" && $dataSEM[5] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[5], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[5],true));
                        
                        if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "2nd" && $dataSEM[5] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[5], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[5],true));
                        
                        if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "3rd" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "3rd" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('6', $dataSEM)){
                if($dataYR[6] == "2nd" && $dataSEM[6] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[6], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[6],true));
                        
                        if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "3rd" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "3rd" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "4th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "4th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('7', $dataYR)){
                if($dataYR[7] == "3rd" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "3rd" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "4th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[767]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "4th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('8', $dataYR)){
                if($dataYR[8] == "3rd" && $dataSEM[8] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "4th" && $dataSEM[8] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "4th" && $dataSEM[868] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "5th" && $dataSEM[8] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "5th" && $dataSEM[8] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            
            if(array_key_exists('9', $dataYR)){
                if($dataYR[9] == "4th" && $dataSEM[9] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[9] == "4th" && $dataSEM[9] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[9] == "5th" && $dataSEM[9] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[9] == "5th" && $dataSEM[9] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('10', $dataYR)){
                if($dataYR[10] == "4th" && $dataSEM[10] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[10], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[10]);
                        
                    if($dataASSESS[10] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[10] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[10] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[10] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[10] == "5th" && $dataSEM[10] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[10], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[10]);
                        
                    if($dataASSESS[10] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[10] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[10] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[10] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[10] == "5th" && $dataSEM[10] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[10], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[10]);
                        
                    if($dataASSESS[10] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[10] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[10] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[10] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }

            }
            if(array_key_exists('11', $dataYR)){
                 if($dataYR[11] == "5th" && $dataSEM[11] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[11], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[11]);
                        
                    if($dataASSESS[11] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[11] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[11] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[11] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[11] == "5th" && $dataSEM[11] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[11], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[11]);
                        
                    if($dataASSESS[11] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[11] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[11] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[11] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('12', $dataYR)){
                 if($dataYR[12] == "5th" && $dataSEM[12] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[12], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[12]);
                        
                    if($dataASSESS[12] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[12] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[12] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[12] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
        }
        else if($dataYR[1] == "Grade 12"){    
            if(array_key_exists('1', $dataYR)){
                if($dataYR[1] == "Grade 12"){ 
                        $pdf->SetXY(73, 85);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 85);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 85);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 85);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 85);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 85);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('2', $dataSEM)){
                if($dataYR[2] == "1st" && $dataSEM[2] == "1st"){ 
                        $pdf->SetXY(73, 135);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 135);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "1st" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 145);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 145);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "2nd" && $dataSEM[2] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "2nd" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                    else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                            
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                }
            }   
            if(array_key_exists('3', $dataSEM)){
                if($dataYR[3] == "1st" && $dataSEM[3] == "2nd"){ 
                        $pdf->SetXY(73, 145);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 145);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "2nd" && $dataSEM[3] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "2nd" && $dataSEM[3] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                            
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                }
            }   
            if(array_key_exists('4', $dataSEM)){
                if($dataYR[4] == "2nd" && $dataSEM[4] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[4], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[4],true));
                        
                        if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "2nd" && $dataSEM[4] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[4], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[4],true));
                        
                        if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "3rd" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "3rd" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('5', $dataSEM)){
                if($dataYR[5] == "2nd" && $dataSEM[5] == "2nd"){ 
                        $pdf->SetXY(73, 175);
                        $pdf->Write(1, print_r($dataGWA[5], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 175);
                        $pdf->Write(1, print_r($dataREMARKS[5],true));
                        
                        if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 175);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 175);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 175);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "3rd" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "3rd" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[545] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('6', $dataYR)){
                if($dataYR[6] == "3rd" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 190);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 190);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 190);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 190);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 190);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "3rd" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "4th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "4th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('7', $dataYR)){
                if($dataYR[7] == "3rd" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "4th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[767]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "4th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            
            if(array_key_exists('8', $dataYR)){
                if($dataYR[8] == "4th" && $dataSEM[8] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "4th" && $dataSEM[868] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "5th" && $dataSEM[8] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "5th" && $dataSEM[8] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('9', $dataYR)){
                if($dataYR[9] == "4th" && $dataSEM[9] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[9] == "5th" && $dataSEM[9] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[9] == "5th" && $dataSEM[9] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('10', $dataYR)){
                 if($dataYR[10] == "5th" && $dataSEM[10] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[10], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[10]);
                        
                    if($dataASSESS[10] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[10] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[10] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[10] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[10] == "5th" && $dataSEM[10] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[10], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[10]);
                        
                    if($dataASSESS[10] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[10] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[10] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[10] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('11', $dataYR)){
                 if($dataYR[11] == "5th" && $dataSEM[11] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[11], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[11]);
                        
                    if($dataWFG[11] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[11] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                            
                    if($dataASSESS[11] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[11] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                }
            }
        }

        else if($dataYR[1] == "1st"){    
            if(array_key_exists('1', $dataSEM)){
                if($dataYR[1] == "1st" && $dataSEM[1] == "1st"){ 
                        $pdf->SetXY(73, 80);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 80);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 80);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 80);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 80);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 80);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "1st" && $dataSEM[1] == "2nd"){ 
                        $pdf->SetXY(73, 90);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 90);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 90);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[11] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 90);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 90);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 90);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "2nd" && $dataSEM[1] == "1st"){ 
                        $pdf->SetXY(73, 105);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 105);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 105);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 105);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "2nd" && $dataSEM[1] == "2nd"){ 
                        $pdf->SetXY(73, 115);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 115);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 115);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 115);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "3rd" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[1]);

                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[1] == "3rd" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('2', $dataSEM)){
                if($dataYR[2] == "1st" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 90);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 90);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 90);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 90);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 90);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 90);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "2nd" && $dataSEM[2] == "1st"){ 
                        $pdf->SetXY(73, 105);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 105);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 105);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 105);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "2nd" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 115);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 115);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 115);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 115);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[2]);

                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }                    
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('3', $dataSEM)){
                if($dataYR[3] == "2nd" && $dataSEM[3] == "1st"){ 
                        $pdf->SetXY(73, 105);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 105);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 105);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 105);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "2nd" && $dataSEM[3] == "2nd"){ 
                        $pdf->SetXY(73, 115);
                        $pdf->Write(1, print_r($dataGWA[3], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 115);
                        $pdf->Write(1, print_r($dataREMARKS[3],true));
                        
                        if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 115);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 115);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[3]);

                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('4', $dataSEM)){
                if($dataYR[4] == "2nd" && $dataSEM[4] == "2nd"){ 
                        $pdf->SetXY(73, 115);
                        $pdf->Write(1, print_r($dataGWA[4], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 115);
                        $pdf->Write(1, print_r($dataREMARKS[4],true));
                        
                        if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 115);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 115);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "3rd" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[4]);

                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[4] == "3rd" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('5', $dataYR)){
                if($dataYR[5] == "3rd" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[5]);

                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[5] == "3rd" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('6', $dataYR)){
                if($dataYR[6] == "3rd" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "4th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "4th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            
            if(array_key_exists('7', $dataYR)){
                if($dataYR[7] == "4th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "4th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('8', $dataYR)){
                if($dataYR[8] == "4th" && $dataSEM[8] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "5th" && $dataSEM[8] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[8] == "5th" && $dataSEM[8] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('9', $dataYR)){
                 if($dataYR[9] == "5th" && $dataSEM[9] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[9] == "5th" && $dataSEM[9] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[9], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[9]);
                        
                    if($dataASSESS[9] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[9] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[9] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[9] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('10', $dataYR)){
                 if($dataYR[10] == "5th" && $dataSEM[10] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[10], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[10]);
                        
                    if($dataASSESS[10] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[10] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[10] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[10] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
        }
        else if($dataYR[1] == "2nd"){ 
            if(array_key_exists('1', $dataSEM)){
                if($dataYR[1] =="2nd" && $dataSEM[1] == "1st"){ 
                        $pdf->SetXY(73, 105);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 105);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 105);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 105);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 105);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "2nd" && $dataSEM[1] == "2nd"){ 
                        $pdf->SetXY(73, 115);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 115);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 115);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 115);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "3rd" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[1]);

                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[1] == "3rd" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('2', $dataSEM)){
                if($dataYR[2] == "2nd" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 115);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 115);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 115);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 115);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 115);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[2]);

                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[2] == "3rd" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }                    
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('3', $dataYR)){
                if($dataYR[3] == "3rd" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 135);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 135);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "3rd" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 200);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 200);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 200);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 200);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 200);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 215);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 215);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 215);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 215);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 215);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 225);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 225);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 225);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 225);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 225);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 240);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 240);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 240);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 240);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 240);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 255);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 255);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 255);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 255);
                            $pdf->Write(1, $wfg);
                        }
                            
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 255);
                            $pdf->Write(1, $assessment);
                    }
                }
            }
            if(array_key_exists('4', $dataYR)){
                if($dataYR[4] == "3rd" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                }
                if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "4th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            
            if(array_key_exists('5', $dataYR)){
                if($dataYR[5] == "4th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "4th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[5]);
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('6', $dataYR)){
                if($dataYR[6] == "4th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[6] == "5th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[6]);
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('7', $dataYR)){
                 if($dataYR[7] == "5th" && $dataSEM[7] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[7] == "5th" && $dataSEM[7] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[7], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[7]);
                        
                    if($dataASSESS[7] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[7] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[7] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[7] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('8', $dataYR)){
                if($dataYR[8] == "5th" && $dataSEM[8] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[8], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[8]);
                        
                    if($dataASSESS[8] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[8] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[8] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[8] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }

            }
        }
        

        else if($dataYR[1] == "3rd"){
            if(array_key_exists('1', $dataSEM)){
                if($dataYR[1] == "3rd" && $dataSEM[1] == "1st"){ 
                        $pdf->SetXY(73, 135);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 135);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));

                        if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 135);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 135);
                            $pdf->Write(1, $wfg);
                        }
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 135);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[1] == "3rd" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 145);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 145);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('2', $dataSEM)){
                if($dataYR[2] == "3rd" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 145);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 145);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));

                        if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 145);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 145);
                            $pdf->Write(1, $wfg);
                        }
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 145);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "4th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }                    
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            
            if(array_key_exists('3', $dataYR)){
                if($dataYR[3] == "4th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 160);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 160);
                    $pdf->Write(1, $dataREMARKS[3]);

                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[3] == "4th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('4', $dataYR)){
                if($dataYR[4] == "4th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[4]);

                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[4] == "5th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }

            }
            if(array_key_exists('5', $dataYR)){
                 if($dataYR[5] == "5th" && $dataSEM[5] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[5]);
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[5] == "5th" && $dataSEM[5] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[5], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[5]);
                    if($dataWFG[5] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[5] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[5] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[5] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                }
            }
            if(array_key_exists('6', $dataYR)){
                if($dataYR[6] == "5th" && $dataSEM[6] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[6], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[6]);
                    if($dataWFG[6] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[6] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                        
                    if($dataASSESS[6] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[6] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                }
            }
        }

        else if($dataYR[1] == "4th"){    
            if(array_key_exists('1', $dataSEM)){
                if($dataYR[1] == "4th" && $dataSEM[1] == "1st"){ 
                        $pdf->SetXY(73, 160);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 160);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 160);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 160);
                            $pdf->Write(1, $wfg);
                        }
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 160);
                            $pdf->Write(1, $assessment);
                    }
                }
                else if($dataYR[1] == "4th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 170);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 170);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('2', $dataSEM)){
                if($dataYR[2] == "4th" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 170);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 170);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 170);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 170);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 170);
                            $pdf->Write(1, $wfg);
                        }
                }
                 else if($dataYR[2] == "5th" && $dataSEM[2] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[2], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[2]);
                        
                    if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }

            if(array_key_exists('3', $dataYR)){
                 if($dataYR[3] == "5th" && $dataSEM[3] == "1st"){    

                    $pdf->SetXY(73, 185);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 185);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[3] == "5th" && $dataSEM[3] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[3], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[3]);
                        
                    if($dataASSESS[3] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[3] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[3] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[3] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
            if(array_key_exists('4', $dataYR)){
                if($dataYR[4] == "5th" && $dataSEM[4] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[4], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[4]);
                        
                    if($dataASSESS[4] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[4] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[4] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[4] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }
        }

        else if($dataYR[1] == "5th"){    
            if(array_key_exists('1', $dataSEM)){
                if($dataYR[1] == "5th" && $dataSEM[1] == "1st"){ 
                        $pdf->SetXY(73, 185);
                        $pdf->Write(1, print_r($dataGWA[1], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 185);
                        $pdf->Write(1, print_r($dataREMARKS[1],true));
                        
                        if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 185);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 185);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 185);
                            $pdf->Write(1, $wfg);
                        }
                }
                else if($dataYR[1] == "5th" && $dataSEM[1] == "2nd"){    

                    $pdf->SetXY(73, 197);
                    $pdf->Write(1, print_r($dataGWA[1], true));
                        
                    $pdf->SetFontSize('8');
                    $pdf->SetXY(120, 197);
                    $pdf->Write(1, $dataREMARKS[1]);
                        
                    if($dataASSESS[1] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    else if($dataASSESS[1] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[1] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                        else if($dataWFG[1] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                        }
                }
            }   
            if(array_key_exists('2', $dataSEM)){
                if($dataYR[2] == "5th" && $dataSEM[2] == "2nd"){ 
                        $pdf->SetXY(73, 197);
                        $pdf->Write(1, print_r($dataGWA[2], true));
                        
                        $pdf->SetFontSize('8');
                        $pdf->SetXY(120, 197);
                        $pdf->Write(1, print_r($dataREMARKS[2],true));
                        
                        if($dataASSESS[2] == "1"){ 
                            $assessment = 'For Renewal';   
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                        }
                        else if($dataASSESS[2] == "0"){ 
                            $assessment = 'Not For Renewal';    
                            $pdf->SetXY(160, 197);
                            $pdf->Write(1, $assessment);
                    }
                    if($dataWFG[2] == "1"){ 
                            $wfg = 'Yes';   
                            $pdf->SetXY(100, 197);
                            $pdf->Write(1, $wfg);
                        }
                    else if($dataWFG[2] == "0"){ 
                            $wfg = 'Yes';    
                            $pdf->SetXY(85, 197);
                            $pdf->Write(1, $wfg);
                    }
                }
            }
        }
    }
}

$pdf->Output();
?>