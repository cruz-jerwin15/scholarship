<?php session_start();
include 'config.php';


$type = $_POST['college'];
$typescholar = $_POST['typescholar'];


if($type=="OPEN"){
	$type="CLOSED";
}else{
	$type="OPEN";
}
                            

 	$sql = "UPDATE tbl_assess_settings SET status='$type' WHERE typescholar='$typescholar'";
		$conn->query($sql);

		
echo '<script language="javascript">';
	              echo 'alert("You successfully update assessment settings")';
	              echo '</script>';
		echo '<script language="javascript">';
			// echo 'localStorage.setItem("notif","1")';
	  		echo 'window.open("assessmentSettings.php","_self")';
	  		echo '</script>';

 

	
	


?>