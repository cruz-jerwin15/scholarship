<?php session_start();
require 'config.php';
$userid	=$_POST['userid'];
$f_firstname=$_POST['ffname'];
$f_lastname=$_POST['flname'];
$f_middlename=$_POST['fmname'];
$f_occupation=$_POST['foccupation'];

$m_firstname=$_POST['mfname'];
$m_lastname=$_POST['mlname'];
$m_middlename=$_POST['mmname'];
$m_occupation=$_POST['moccupation'];

$g_firstname=$_POST['gfname'];
$g_lastname=$_POST['glname'];
$g_middlename=$_POST['gmname'];
$g_occupation=$_POST['goccupation'];
$g_relationship=$_POST['grelationship'];
$g_phonenumber=$_POST['gphone'];
$g_housenumber=$_POST['ghousenumber'];
$g_street=$_POST['gstreet'];
$g_barangay=$_POST['gbarangay'];

$p_housenumber=$_POST['phousenumber'];
$p_street=$_POST['pstreet'];
$p_barangay=$_POST['pbarangay'];
$p_gross=$_POST['gross'];
$p_numfamily=$_POST['numfamily'];
$p_numsiblings=$_POST['numsiblings'];
$p_numboys=$_POST['numboys'];
$p_numgirls=$_POST['numgirls'];


$sql="SELECT * from tbl_fatherinfo where user_id='$userid'";
$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$update1 = "UPDATE tbl_fatherinfo SET 
		lastname='$f_lastname', 
		firstname='$f_firstname',
		middlename='$f_middlename',
		occupation='$f_occupation'
		WHERE user_id='$userid'";
		$conn->query($update1);
	}else{
		$insert = "INSERT INTO tbl_fatherinfo (user_id,lastname,firstname,middlename,occupation)VALUES ('$userid','$f_lastname','$f_firstname','$f_middlename','$f_occupation')";
		$conn->query($insert);
	}

$sql2="SELECT * from tbl_motherinfo where user_id='$userid'";
$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0){
		$update2 = "UPDATE tbl_motherinfo SET 
		lastname='$m_lastname', 
		firstname='$m_firstname',
		middlename='$m_middlename',
		occupation='$m_occupation'
		WHERE user_id='$userid'";
		$conn->query($update2);
	}else{
		$insert2 = "INSERT INTO tbl_motherinfo (user_id,lastname,firstname,middlename,occupation)VALUES ('$userid','$m_lastname','$m_firstname','$m_middlename','$m_occupation')";
		$conn->query($insert2);
	}

$sql3="SELECT * from tbl_guardianinfo where user_id='$userid'";
$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0){
		$update3 = "UPDATE tbl_guardianinfo SET 
		lastname='$g_lastname', 
		firstname='$g_firstname',
		middlename='$g_middlename',
		occupation='$g_occupation',
		relationship='$g_relationship',
		phonenumber='$g_phonenumber',
		housenumber='$g_housenumber',
		street='$g_street',
		barangay='$g_barangay'
		WHERE user_id='$userid'";
		$conn->query($update3);
	}else{
		$insert3 = "INSERT INTO tbl_guardianinfo (user_id,lastname,firstname,middlename,occupation,relationship,phonenumber,street,housenumber,barangay)VALUES ('$userid','$g_lastname','$g_firstname','$g_middlename','$g_occupation','$g_relationship','$g_phonenumber','$g_street','$g_housenumber','$g_barangay')";
		$conn->query($insert3);
	}

$sql4="SELECT * from tbl_guardianinfo where user_id='$userid'";
$result4 = $conn->query($sql4);
	if ($result4->num_rows > 0){
		$update4 = "UPDATE tbl_guardianinfo SET 
		lastname='$g_lastname', 
		firstname='$g_firstname',
		middlename='$g_middlename',
		occupation='$g_occupation',
		relationship='$g_relationship',
		phonenumber='$g_phonenumber',
		housenumber='$g_housenumber',
		street='$g_street',
		barangay='$g_barangay'
		WHERE user_id='$userid'";
		$conn->query($update4);
	}else{
		$insert4 = "INSERT INTO tbl_guardianinfo (user_id,lastname,firstname,middlename,occupation,relationship,phonenumber,street,housenumber,barangay)VALUES ('$userid','$g_lastname','$g_firstname','$g_middlename','$g_occupation','$g_relationship','$g_phonenumber','$g_street','$g_housenumber','$g_barangay')";
		$conn->query($insert4);
	}

$sql5="SELECT * from tbl_parentinfo where user_id='$userid'";
$result5 = $conn->query($sql5);
	if ($result5->num_rows > 0){
		$update5 = "UPDATE tbl_parentinfo SET 
		gross='$p_gross', 
		housenumber='$p_housenumber',
		street='$p_street',
		barangay='$p_barangay',
		numberfamily='$p_numfamily',
		siblings='$p_numsiblings',
		girls='$p_numgirls',
		boy='$p_numboys'
		WHERE user_id='$userid'";
		$conn->query($update5);
	}else{
		$insert5 = "INSERT INTO tbl_parentinfo (user_id,gross,housenumber,street,barangay,numberfamily,siblings,girls,boy)VALUES ('$userid','$p_gross','$p_housenumber','$p_street','$p_barangay','$p_numfamily','$p_numsiblings','$p_numboys','$p_numgirls')";
		$conn->query($insert5);
	}

	$_SESSION['counter']=5;
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("siblings.php","_self")';
  		echo '</script>';
?>