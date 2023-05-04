<?php session_start();

include 'config.php';
$username =$_POST['username'];
$password =$_POST['password'];

$checker = "superadmin";
$fpassword = md5($password);


$query="SELECT *
FROM tbl_admin a
WHERE username = '$username'
AND password = '$fpassword'";
  $result = $conn->query($query);
 if ($result->num_rows > 0){
 	 	$row = $result->fetch_assoc();
    if($username==$checker){
    	// echo $row['lastname'];
      $_SESSION['username']=$row['username'];
       $_SESSION['lastname']=$row['lastname'];
       $_SESSION['firstname']=$row['firstname'];
        $_SESSION['image']=$row['image'];
        // echo $_SESSION['image'];

        // echo $row['username']."/".$row['lastname']."/".$row['firstname'];

        // echo $row['image'];
  echo '<script language="javascript">';
  echo 'window.open("superadmindashboard.php","_self")';
  echo '</script>';
     
    }
    else{
    	// echo "NORMALADMIN";
       $_SESSION['username']=$row['username'];
       $_SESSION['lastname']=$row['lastname'];
       $_SESSION['firstname']=$row['firstname'];
        $_SESSION['image']=$row['image'];
        echo '<script language="javascript">';
  echo 'window.open("normaladmin.php","_self")';
  echo '</script>';
    // header("Location: normaladmin.php");
    }
  }else{
  	echo '<script language="javascript">';
  echo 'alert("WRONG PASSWORD/USERNAME")';
  echo '</script>';  }
?>