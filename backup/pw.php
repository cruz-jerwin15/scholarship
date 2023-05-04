<?php
include 'config.php';
$password = 'pogi';
$passwordmd5 = md5($password);
$q = "UPDATE `tbl_admin` SET password = '$passwordmd5' WHERE password = 'pogi'";
$result = mysqli_query($conn, $q); 
?>