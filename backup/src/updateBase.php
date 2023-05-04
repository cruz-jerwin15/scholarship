<?php session_start();
include 'config.php';


$baseid = $_POST['baseid'];
$base = $_POST['base'];





	
	$sql = "UPDATE tbl_formula SET formula='$base' WHERE id='$baseid'";
	$conn->query($sql);
	
	 echo '<script language="javascript">';
              echo 'alert("You successfully change exam base")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("examFormula.php","_self")';
  		echo '</script>';



?>