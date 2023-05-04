<?php
session_start();
require_once("config.php");
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */




// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
// require_once('tcpdf/examples/tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$logo = "logo";
		$img = file_get_contents('img/logo.png');
		$myData = 
		$image_file = K_PATH_IMAGES.$logo.'.png';
		$this->Image('@' . $img, 10, 10, 27, 27, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 16);
		// Title
		$title = <<<EOD
EPS SCHOLARSHIP & YOUTH DEVELOPMENT PROGRAM
EOD;
		$this->Cell(0, 15, $title, 0, false, 'C', 0, '', 0, false, 'T', 'B');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('EPS');
$pdf->SetTitle('Application Form');
$pdf->SetSubject('DATE');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'B', 10);

// add a page
$pdf->AddPage();

// set some text to print

// $id = $_POST['id'];
if($_GET){
    
	$sql 		= "SELECT ui.FirstName, ui.MiddleName, ui.LastName, ui.ContactNumber, ui.DateOfBirth, ui.Age, ui.Sex, ui.PlaceOfBirth, ui.Citizenship, ui.EmailAddress, ua.StreetNumber, ua.RoadName, ua.Barangay, ua.Town, ua.PostalCode, ua.Province, ua.Country, sib.FirstName, sib.MiddleName, sib.LastName, sib.EducationalAssistanceOne, sib.CourseOne, sib.YearOne, sib.EducationalAssistanceTwo, sib.CourseTwo, sib.YearTwo, sib.EducationalAssistanceThree, sib.CourseThree, sib.YearThree, s.SchoolName, s.YearCompleted, s.GWA, s.SchoolIntended, s.LastSchoolAttended, s.ExamRating, s.Course, s.Scholarship, sa.StreetNumber, sa.RoadName, sa.Barangay, sa.Town, sa.PostalCode, sa.Province, sa.Country, p.FatherFirstName, p.FatherMiddleName, p.FatherLastName, p.MotherFirstName, p.MotherMiddleName, p.MotherLastName, p.TotalMembers, p.Brothers, p.Sisters, p.Income, pa.StreetNumber, pa.RoadName, pa.Barangay, pa.Town, pa.PostalCode, pa.Province, pa.Country  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.id LEFT JOIN tbl_school as s on ui.id = s.id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.id LEFT JOIN tbl_parents as p on ui.id = p.id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.id ";
} else {
    $sql 		= "SELECT ui.FirstName, ui.MiddleName, ui.LastName, ui.ContactNumber, ui.DateOfBirth, ui.Age, ui.Sex, ui.PlaceOfBirth, ui.Citizenship, ui.EmailAddress, ua.StreetNumber, ua.RoadName, ua.Barangay, ua.Town, ua.PostalCode, ua.Province, ua.Country, sib.FirstName, sib.MiddleName, sib.LastName, sib.EducationalAssistanceOne, sib.CourseOne, sib.YearOne, sib.EducationalAssistanceTwo, sib.CourseTwo, sib.YearTwo, sib.EducationalAssistanceThree, sib.CourseThree, sib.YearThree, s.SchoolName, s.YearCompleted, s.GWA, s.SchoolIntended, s.LastSchoolAttended, s.ExamRating, s.Course, s.Scholarship, sa.StreetNumber, sa.RoadName, sa.Barangay, sa.Town, sa.PostalCode, sa.Province, sa.Country, p.FatherFirstName, p.FatherMiddleName, p.FatherLastName, p.MotherFirstName, p.MotherMiddleName, p.MotherLastName, p.TotalMembers, p.Brothers, p.Sisters, p.Income, pa.StreetNumber, pa.RoadName, pa.Barangay, pa.Town, pa.PostalCode, pa.Province, pa.Country  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.id LEFT JOIN tbl_school as s on ui.id = s.id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.id LEFT JOIN tbl_parents as p on ui.id = p.id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.id ";
}

$ret=$conn->query($sql);

// Set some content to print

// Print text using writeHTMLCell()
$html = <<<EOD
<style>
div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 11pt;
        border-style: solid solid solid solid;
        border-width: 1px 1px 1px 1px;
        border-color: black;
        text-align: center;
    }
</style>
<h2 style="text-align: center;"><mark style="background-color: orange;color:black">APPLICATION FORM</mark></h2><br>
<p style="text-align:center;"><img src="students/stud1.png" align="middle" height="96.0000000000011px" width="96.0000000000011px" style="border:5px solid black"></p>
<br>
<div class="test">PERSONAL INFORMATION
</div>
EOD;

$html .= '<br><table cellspacing="6">';


 // while($row = $ret->fetch()){
	// $product_id = $row['product_id'];    

	// $sql = "SELECT ui.FirstName, ui.MiddleName, ui.LastName, ui.ContactNumber, ui.DateOfBirth, ui.Age, ui.Sex, ui.PlaceOfBirth, ui.Citizenship, ui.EmailAddress, ua.StreetNumber, ua.RoadName, ua.Barangay, ua.Town, ua.PostalCode, ua.Province, ua.Country, sib.FirstName, sib.MiddleName, sib.LastName, sib.EducationalAssistanceOne, sib.CourseOne, sib.YearOne, sib.EducationalAssistanceTwo, sib.CourseTwo, sib.YearTwo, sib.EducationalAssistanceThree, sib.CourseThree, sib.YearThree, s.SchoolName, s.YearCompleted, s.GWA, s.SchoolIntended, s.LastSchoolAttended, s.ExamRating, s.Course, s.Scholarship, sa.StreetNumber, sa.RoadName, sa.Barangay, sa.Town, sa.PostalCode, sa.Province, sa.Country, p.FatherFirstName, p.FatherMiddleName, p.FatherLastName, p.MotherFirstName, p.MotherMiddleName, p.MotherLastName, p.TotalMembers, p.Brothers, p.Sisters, p.Income, pa.StreetNumber, pa.RoadName, pa.Barangay, pa.Town, pa.PostalCode, pa.Province, pa.Country  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.id LEFT JOIN tbl_school as s on ui.id = s.id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.id LEFT JOIN tbl_parents as p on ui.id = p.id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.id ";

 //     $prod_ret = $conn->query($prod_sql);
 //     $product = $prod_ret->fetch();
	

	$html .= '<tr>';
	$html .= '<td> First Name:' . $_SESSION["data"][0] . '</td>';
	$html .= '<td> Middle Name:</td>';
	$html .= '<td> Last Name:</td>';
	$html .= '</tr>';	

	$html .= '<tr>';
	$html .= '<td> Date:</td>';
	$html .= '<td> Age:</td>';
	$html .= '<td> Sex:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> Place of Birth:</td>';
	$html .= '<td> </td>';
	$html .= '<td> Citizenship:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> Street Number:</td>';
	$html .= '<td> Road Name:</td>';
	$html .= '<td> Barangay:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> Town:</td>';
	$html .= '<td> Postal Code:</td>';
	$html .= '<td> Province:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> Country:</td>';
	$html .= '<td> Last School Attended:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> School&#39;s Street Number:</td>';
	$html .= '<td> Contact Number:</td>';
	$html .= '<td> School&#39;s Barangay:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> School&#39;s Town:</td>';
	$html .= '<td> School&#39;s Road Name:</td>';
	
	$html .= '<td> School&#39;s Province:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> School&#39;s Country:</td>';
	$html .= '<td> School&#39;s Postal Code:</td>';
	
	$html .= '<td> Gen. Weighted Average:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> FB account/Email Address:</td>';
	$html .= '<td> Highest year Attended:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> School intended to enroll:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> Entrance Exam rating:</td>';
	$html .= '<td> Course intended to take:</td>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td> Other bursary or grant enjoyed:</td>';
	$html .= '</tr>';
// }

$html .= '</table><br>';

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
$html1 = <<<EOD
<style>
div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 1px 1px 1px 1px;
        border-color: black;
        text-align: center;
    }
</style>

<div class="test">FAMILY BACKGROUND
</div>
EOD;

$html1 .= '<br><table cellspacing="6">';


 // while($row = $ret->fetch()){
	// $product_id = $row['product_id'];    

	// $sql = "SELECT ui.FirstName, ui.MiddleName, ui.LastName, ui.ContactNumber, ui.DateOfBirth, ui.Age, ui.Sex, ui.PlaceOfBirth, ui.Citizenship, ui.EmailAddress, ua.StreetNumber, ua.RoadName, ua.Barangay, ua.Town, ua.PostalCode, ua.Province, ua.Country, sib.FirstName, sib.MiddleName, sib.LastName, sib.EducationalAssistanceOne, sib.CourseOne, sib.YearOne, sib.EducationalAssistanceTwo, sib.CourseTwo, sib.YearTwo, sib.EducationalAssistanceThree, sib.CourseThree, sib.YearThree, s.SchoolName, s.YearCompleted, s.GWA, s.SchoolIntended, s.LastSchoolAttended, s.ExamRating, s.Course, s.Scholarship, sa.StreetNumber, sa.RoadName, sa.Barangay, sa.Town, sa.PostalCode, sa.Province, sa.Country, p.FatherFirstName, p.FatherMiddleName, p.FatherLastName, p.MotherFirstName, p.MotherMiddleName, p.MotherLastName, p.TotalMembers, p.Brothers, p.Sisters, p.Income, pa.StreetNumber, pa.RoadName, pa.Barangay, pa.Town, pa.PostalCode, pa.Province, pa.Country  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.id LEFT JOIN tbl_school as s on ui.id = s.id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.id LEFT JOIN tbl_parents as p on ui.id = p.id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.id ";

 //     $prod_ret = $conn->query($prod_sql);
 //     $product = $prod_ret->fetch();

	$html1 .= '<tr>';
	$html1 .= '<td> Father&#39;s First Name: </td>' ;
	$html1  .= '<td> Father&#39;s Middle Name:</td>';
	$html1 .= '<td> Father&#39;s Last Name:</td>';
	$html1 .= '</tr>';	

	$html1 .= '<tr>';
	$html1 .= '<td> Mother&#39;s First Name: </td>';
	$html1  .= '<td> Mother&#39;s Middle Name:</td>';
	$html1 .= '<td> Mother&#39;s Last Name:</td>';
	$html1 .= '</tr>';

	$html1 .= '<tr>';
	$html1 .= '<td> Parent&#39;s Street Number: </td>';
	$html1  .= '<td> Parent&#39;s Road Name:</td>';
	$html1 .= '<td> Parent&#39;s Barangay:</td>';
	$html1 .= '</tr>';

	$html1 .= '<tr>';
	$html1 .= '<td> Parent&#39;sTown:</td>';
	$html1 .= '<td> Parent&#39;s Postal Code:</td>';
	$html1 .= '<td> Parent&#39;sProvince:</td>';
	$html1 .= '</tr>';

	$html1 .= '<tr>';
	$html1 .= '<td> Parent&#39;s Country:</td>';
	$html1 .= '<td> No. of Family members:</td>';
	$html1 .= '<td> No. of Brother/s:</td>';
	$html1 .= '</tr>';

	$html1 .= '<tr>';
	$html1 .= '<td> No. of Sister/s:</td>';
	$html1 .= '<td> Parent&#39;s total gross income per year:</td>';
	$html1 .= '</tr>';
// }

$html2 .= '</table>';

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html1, 0, 1, 0, true, '', true);
$html2 = <<<EOD
<style>
div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 12pt;
        border-style: solid solid solid solid;
        border-width: 1px 1px 1px 1px;
        border-color: black;
        text-align: center;
    }
</style>

<div class="test">EDUCATIONAL ASSISTANCE ENJOYED BY BROTHER/SISTER
</div>
EOD;

$html2 .= '<br><table cellspacing="6">';


 // while($row = $ret->fetch()){
	// $product_id = $row['product_id'];    

	// $sql = "SELECT ui.FirstName, ui.MiddleName, ui.LastName, ui.ContactNumber, ui.DateOfBirth, ui.Age, ui.Sex, ui.PlaceOfBirth, ui.Citizenship, ui.EmailAddress, ua.StreetNumber, ua.RoadName, ua.Barangay, ua.Town, ua.PostalCode, ua.Province, ua.Country, sib.FirstName, sib.MiddleName, sib.LastName, sib.EducationalAssistanceOne, sib.CourseOne, sib.YearOne, sib.EducationalAssistanceTwo, sib.CourseTwo, sib.YearTwo, sib.EducationalAssistanceThree, sib.CourseThree, sib.YearThree, s.SchoolName, s.YearCompleted, s.GWA, s.SchoolIntended, s.LastSchoolAttended, s.ExamRating, s.Course, s.Scholarship, sa.StreetNumber, sa.RoadName, sa.Barangay, sa.Town, sa.PostalCode, sa.Province, sa.Country, p.FatherFirstName, p.FatherMiddleName, p.FatherLastName, p.MotherFirstName, p.MotherMiddleName, p.MotherLastName, p.TotalMembers, p.Brothers, p.Sisters, p.Income, pa.StreetNumber, pa.RoadName, pa.Barangay, pa.Town, pa.PostalCode, pa.Province, pa.Country  FROM tbl_userinfo as ui LEFT JOIN tbl_useraddress as ua on ua.id = ui.id LEFT JOIN tbl_siblings as sib on ui.id = sib.id LEFT JOIN tbl_school as s on ui.id = s.id LEFT JOIN tbl_schooladdress as sa on ui.id = sa.id LEFT JOIN tbl_parents as p on ui.id = p.id LEFT JOIN tbl_parentsaddress as pa on ui.id = pa.id ";

 //     $prod_ret = $conn->query($prod_sql);
 //     $product = $prod_ret->fetch();

	$html2 .= '<tr>';
	$html2 .= '<td> Sibling&#39;s First Name: </td>';
	$html2  .= '<td> Sibling&#39;s Middle Name:</td>';
	$html2 .= '<td> Sibling&#39;s Last Name:</td>';
	$html2 .= '</tr>';	

	$html2 .= '<tr>';
	$html2 .= '<td> Educational Assistance: </td>';
	$html2  .= '<td> Course:</td>';
	$html2 .= '<td> Year:</td>';
	$html2 .= '</tr>';

	$html2 .= '<tr>';
	$html2 .= '<td> Educational Assistance: </td>';
	$html2  .= '<td> Course:</td>';
	$html2 .= '<td> Year:</td>';
	$html2 .= '</tr>';

	$html2 .= '<tr>';
	$html2 .= '<td> Educational Assistance: </td>';
	$html2  .= '<td> Course:</td>';
	$html2 .= '<td> Year:</td>';
	$html2 .= '</tr>';
// }

$html2 .= '</table>';

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
$pdf->AddPage();
$html3 = <<<EOD
<style>
div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 11pt;
        border-style: solid solid solid solid;
        border-width: 1px 1px 1px 1px;
        border-color: black;
        text-align: center;
    }
 div.test1{
 	border-style: solid solid solid solid;
        border-width: 1px 1px 1px 1px;
        border-color: black;
       text-align: center;
 }
</style>
<br>
<br>
<br>
<div class="test">For Scholarship Division
</div><br><br><br>
EOD;
$tbl = <<<EOD
<div class="test1">
<table cellspacing="6" border="1">
<tr>
<td></td>
<td></td>
<td></td>
<td colspan="2">Remarks</td>
</tr>


</table></div>
EOD;
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td colspan="2">Remarks</td>
 </tr>

 <tr nobr="true">
<td>Monitoring of Grades</td>
<td>Gen. Average</td>
<td>No. of Grade Below 80</td>
<td>W/ Grade Below 80</td>
<td>For Renewal</td>
<td>Not for Renewal</td>
</tr>

 <tr nobr="true">
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
 </tr>

 <tr nobr="true">
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
  <td> <br /> </td>
 </tr>
</table>
EOD;
// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html3, 0, 1, 0, true, '', true);
$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
ob_end_clean();
$filename ='application form.pdf';
$pdf->Output($filename, 'D');

//============================================================+
// END OF FILE
//============================================================+
?>

<?php 
header("Location: index.php"); 
?>