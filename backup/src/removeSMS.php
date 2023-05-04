<?php session_start();
include 'config.php';


$smsid = $_POST['smsid'];



if(($smsid==1)||($smsid==5)){
	 echo '<script language="javascript">';
              echo 'alert("You cannot remove this message. This message is a default message.")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("smsSettings.php","_self")';
  		echo '</script>';
}else{
	$sql = "DELETE FROM tbl_sms  WHERE id='$smsid'";
	$conn->query($sql);

	 echo '<script language="javascript">';
              echo 'alert("You successfully remove message.")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("smsSettings.php","_self")';
  		echo '</script>';
}

 

	
	
	
	



?>