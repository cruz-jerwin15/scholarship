<?php session_start();
require 'config.php';

$id = $_GET['id'];

$delete = "DELETE from tbl_siblingsinfo WHERE id='$id'";
$conn->query($delete);

$_SESSION['notif']="3";
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("siblings.php","_self")';
  		echo '</script>';

?>