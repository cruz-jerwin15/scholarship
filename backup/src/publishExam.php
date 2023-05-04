<?php
session_start();
include 'config.php';



$id=$_GET['id'];


$status="PUBLISHED";
$update ="UPDATE tbl_exam SET status='$status' WHERE id='$id'";
$conn->query($update);

$_SESSION['exam']="NULL";

 	echo '<script language="javascript">';
              echo 'alert("You successfully publish exam")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examList.php","_self")';
  		echo '</script>';

?>