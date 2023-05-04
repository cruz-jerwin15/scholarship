<?php session_start();
$_SESSION['reg_step']=$_SESSION['reg_step']+1;

header('Location:profile.php')

?>