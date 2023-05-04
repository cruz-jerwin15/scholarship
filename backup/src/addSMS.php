<?php session_start();
include 'config.php';


$title = $_POST['title'];
$message = $_POST['message'];



$message = addslashes($message);

 $insert1= "INSERT INTO tbl_sms
                        (process,
                        message
                       )
                      VALUES (
                        '$title',
                        '$message'
                         )";
                        $conn->query($insert1);

	
	
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully add new message")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("smsSettings.php","_self")';
  		echo '</script>';



?>