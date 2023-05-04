<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$school = $_POST['school'];
$schooladdress = $_POST['schooladdress'];
$highest = $_POST['highest'];
$genweight = $_POST['genweight'];
$grant = $_POST['grant'];



	$sql="SELECT * from tbl_educational where user_id='$userid'";
	$result = $conn->query($sql);
	if ($result->num_rows < 1){
		 $insert1 = "INSERT INTO tbl_educational (user_id,school,address,highestyear,genweight,bursary) VALUES ('$userid','$school','$schooladdress','$highest','$genweight','$grant')";
        $conn->query($insert1);
	}else{
		$update = "UPDATE tbl_educational SET school='$school',
		address='$schooladdress',
		highestyear = '$highest',genweight='$genweight',
		bursary='$grant'
		WHERE user_id='$userid'";
		$conn->query($update);
	}

	

	
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated student educational info")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("viewUpdateNewSHS.php?id='.$userid.'","_self")';
  		echo '</script>';





?>