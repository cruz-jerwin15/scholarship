<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'config.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE tbl_userinfo SET approve='1' WHERE id='".$id."'";
if(mysqli_query($conn, $sql)){
    header("location: superadminhomepage.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>