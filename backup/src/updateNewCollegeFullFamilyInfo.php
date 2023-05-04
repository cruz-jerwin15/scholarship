<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$flname = $_POST['flname'];
$ffname = $_POST['ffname'];
$fmname = $_POST['fmname'];
$foccupation = $_POST['foccupation'];
$mlname = $_POST['mlname'];
$mfname = $_POST['mfname'];
$mmname = $_POST['mmname'];
$moccupation = $_POST['moccupation'];
$phousenumber = $_POST['phousenumber'];
$pstreet = $_POST['pstreet'];
$pbarangay = $_POST['pbarangay'];
$gross = $_POST['gross'];
$numfamily = $_POST['numfamily'];
$numsiblings = $_POST['numsiblings'];
$numboys = $_POST['numboys'];
$numgirls = $_POST['numgirls'];
$numboys = $_POST['numboys'];
$glname = $_POST['glname'];
$gfname = $_POST['gfname'];
$gmname = $_POST['gmname'];
$goccupation = $_POST['goccupation'];
$grelationship = $_POST['grelationship'];
$gphone = $_POST['gphone'];
$goccupation = $_POST['goccupation'];
$ghousenumber = $_POST['ghousenumber'];
$gstreet = $_POST['gstreet'];
$gbarangay = $_POST['gbarangay'];


	
	$sql="SELECT * from tbl_fatherinfo where user_id='$userid'";
	$result = $conn->query($sql);
	if ($result->num_rows < 1){
		 $insert1 = "INSERT INTO tbl_fatherinfo (user_id,lastname,firstname,middlename,occupation) VALUES ('$userid','$flname','$ffname','$fmname','$foccupation')";
        $conn->query($insert1);
        $insert2 = "INSERT INTO tbl_motherinfo (user_id,lastname,firstname,middlename,occupation) VALUES ('$userid','$mlname','$mfname','$mmname','$moccupation')";
        $conn->query($insert2);
        $insert3 = "INSERT INTO tbl_parentinfo (user_id,gross,housenumber,street,barangay,numberfamily,siblings,girls,boy) VALUES ('$userid','$gross','$phousenumber','$pstreet','$pbarangay','$numfamily','$numsiblings','$numgirls','$numboys')";
        $conn->query($insert3);
         $insert4 = "INSERT INTO tbl_guardianinfo (user_id,lastname,firstname,middlename,occupation,phonenumber,housenumber,street,barangay,relationship) VALUES ('$userid','$glname','$gfname','$gmname','$goccupation','$gphone','$ghousenumber','$gstreet','$gbarangay','$grelationship')";
        $conn->query($insert4);
	}else{
		$fupdate = "UPDATE tbl_fatherinfo SET lastname='$flname',firstname='$ffname',middlename = '$fmname',occupation='$foccupation' WHERE user_id='$userid'";
		$conn->query($fupdate);

		$mupdate = "UPDATE tbl_motherinfo SET lastname='$mlname',firstname='$mfname',middlename = '$mmname',occupation='$moccupation' WHERE user_id='$userid'";
		$conn->query($mupdate);

		$pupdate = "UPDATE tbl_parentinfo SET gross='$gross',housenumber='$phousenumber',street = '$pstreet',barangay='$pbarangay',numberfamily='$numfamily',siblings='$numsiblings',girls='$numgirls',boy='$numboys' WHERE user_id='$userid'";
		$conn->query($pupdate);

		$gupdate = "UPDATE tbl_guardianinfo SET lastname='$glname',firstname='$gfname',middlename = '$gmname',occupation='$goccupation',phonenumber='$gphone',housenumber='$ghousenumber',street='$gstreet',barangay='$gbarangay',relationship='$grelationship' WHERE user_id='$userid'";
		$conn->query($gupdate);
	}
	

		 echo '<script language="javascript">';
              echo 'alert("Successfully updated family info")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateNewCollegeFullScholar.php?id='.$userid.'","_self")';
  		echo '</script>';





?>