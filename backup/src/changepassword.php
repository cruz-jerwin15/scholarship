<?php session_start();
include 'config.php';

$username = $_SESSION['username'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];

                            

	$oldpassword=md5($oldpassword);
	$query="SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$oldpassword'";
   $result = $conn->query($query);
 	if ($result->num_rows > 0){
 		$password=md5($newpassword);
 		$sql = "UPDATE tbl_admin SET password='$password' WHERE username='$username'";
		$conn->query($sql);

		
		 echo '<script language="javascript">';
	              echo 'alert("You successfully update your password")';
	              echo '</script>';
		echo '<script language="javascript">';
			// echo 'localStorage.setItem("notif","1")';
	  		echo 'window.open("personalprofile.php","_self")';
	  		echo '</script>';

 	}else{
 	 
 	}

	
	


?>