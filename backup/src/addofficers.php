<?php session_start();
include 'config.php';


$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$position = $_POST['position'];



$sql="SELECT * from tbl_officers where lastname='$lastname' AND firstname='$firstname'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	 echo '<script language="javascript">';
              echo 'alert("Officer already in the list")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("officers.php","_self")';
  		echo '</script>';
}else{
	$image = "avatar.png";
	$sql = "INSERT INTO tbl_officers (firstname, lastname, position,image)
		VALUES ('$firstname', '$lastname', '$position','$image')";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully add an officers")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("officers.php","_self")';
  		echo '</script>';

}

?>