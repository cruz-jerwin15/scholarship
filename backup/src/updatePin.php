<?php session_start();
include 'config.php';
	$digits=6;
	$i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }






	
	$sql = "UPDATE tbl_pin SET pin='$pin'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully create new pin")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("managePin.php","_self")';
  		echo '</script>';



?>