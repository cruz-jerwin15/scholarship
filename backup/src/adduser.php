<?php session_start();
include 'config.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$usertype=$_POST['usertype'];

$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;

$date=date_create($dates,timezone_open("Asia/Manila"));
$dates = date_format($date,"Y-m-d");


$sql="SELECT * from tbl_admin where username='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	$_SESSION['notif']="0";
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","0")';
  		echo 'window.open("userlist.php","_self")';
  		echo '</script>';
}else{
	$sql = "INSERT INTO tbl_admin (username, usertype, password,lastname,firstname,dates)
		VALUES ('$email', '$usertype', '$password','$lastname','$firstname','$dates')";
	$conn->query($sql);
	$_SESSION['notif']="1";
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("userlist.php","_self")';
  		echo '</script>';

}

?>