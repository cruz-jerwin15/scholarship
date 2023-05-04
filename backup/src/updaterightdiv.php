<?php
session_start();
include 'config.php';

$title = $_POST['titles'];
$content = $_POST['contents'];
$left="RIGHT";
	$sql = "UPDATE tbl_aboutus SET title='$title', body='$content' WHERE divider='$left'";
	$conn->query($sql);
		 echo '<script language="javascript">';
              echo 'alert("Successfully updated about us")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("aboutus.php","_self")';
  		echo '</script>';


?>