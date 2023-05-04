<?php session_start();
include 'config.php';


$req = $_POST['requirements'];


$sql="SELECT * from tbl_list_req where listreq='$req'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	 echo '<script language="javascript">';
              echo 'alert("Requirements already in the list")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("requirements.php","_self")';
  		echo '</script>';
}else{
	$image = "avatar.png";
	$sql = "INSERT INTO tbl_list_req (listreq)
		VALUES ('$req')";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully add a requirements to the list")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("requirements.php","_self")';
  		echo '</script>';

}

?>