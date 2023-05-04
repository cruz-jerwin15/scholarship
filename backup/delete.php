<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "eps");
$id = mysqli_real_escape_string($link, $_GET['id']);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "DELETE FROM tbl_userinfo, tbl_useraddress, tbl_parents, tbl_parentsaddress, tbl_school, tbl_schooladdress, tbl_siblings WHERE tbl_userinfo.id = tbl_useraddress.user_id AND tbl_userinfo.id = tbl_parents.user_id AND tbl_userinfo.id = tbl_parentsaddress.user_id AND tbl_userinfo.id = tbl_school.user_id AND tbl_schooladdress.user_id = tbl_userinfo.id AND tbl_siblings.user_id = tbl_userinfo.id AND tbl_userinfo.id='".$id."'";
if(mysqli_query($link, $sql)){
    header("location: manageapplicant.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>