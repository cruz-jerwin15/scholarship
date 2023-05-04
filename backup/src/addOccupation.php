<?php
session_start();
include 'config.php';

$occupation = $_POST['occupation'];
$points = $_POST['points'];

$sql="SELECT * from tbl_legend_occupation where legend='$occupation'";
$result = $conn->query($sql);
if ($result->num_rows < 1){
	$sql = "INSERT INTO tbl_legend_occupation (legend,points)
		VALUES ('$occupation','$points')";
	$conn->query($sql);
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("occupation.php","_self")';
  		echo '</script>';
}else{
	$_SESSION['notif']="0";
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("occupation.php","_self")';
  		echo '</script>';
}

?>