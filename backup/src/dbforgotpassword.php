<?php session_start();

include 'config.php';
require 'referralcode.php';
require 'smsSend.php';
$username =$_POST['username'];


$query="SELECT *
FROM tbl_admin
WHERE username = '$username'";

$result = $conn->query($query);
if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $academic_year = $row['academic_year'];
  $application_no = $row['application_no'];

  $sql2="SELECT * from tbl_studentinfo where academic_year='$academic_year' AND application_no='$application_no'";
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_assoc();

  $firstname=$row2['firstname'];
  $lastname=$row2['lastname'];
  $contact = $row2['phone'];

  $refcode = getReferral();
  $mypassword=$refcode;
  $password = md5($mypassword);

date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');
$hour=date('G');
$min=date('i');
$sec=date('s');

$dates=$year."-".$month."-".$day;
$times=$hour.":".$min.":".$sec;

$newdates=$dates." ".$times;

  $sql5="SELECT * from tbl_password where email='$username'";
  $result5 = $conn->query($sql5);
  $row5 = $result5->fetch_assoc();

  $date1 = $row5['dates'];
  $date2 = $newdates;

  $diff = abs(strtotime($date2) - strtotime($date1));

  $newdays = $diff/86400;


  if ($result5->num_rows > 0){
    if($newdays<7){
       echo '<script language="javascript">';
        echo 'alert("You can only request password once per week.")';
        echo '</script>';      
         echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
      echo 'window.open("forgotpassword.php","_self")';
      echo '</script>';  
    }else{

     $update = "UPDATE tbl_password SET password='$mypassword',dates='$newdates'
         WHERE email='$username'";
     $conn->query($update);

     $update1 = "UPDATE tbl_admin SET password='$password' WHERE username='$username'";
     $conn->query($update1);
      $process="PASSWORD";
      $sql6="SELECT * from tbl_sms where process='$process'";
      $result6 = $conn->query($sql6);
      $row6 = $result6->fetch_assoc();
      $messages = stripslashes($row6['message'])." ".$mypassword;
      sendMessages($contact,$messages);


    }
  }else{
          $insert= "INSERT INTO tbl_password 
                    (email,
                    password,
                    dates,
					times)
                  VALUES (
                    '$username',
                    '$mypassword',
                    '$newdates',
					'$times')";
        $conn->query($insert);
          $update1 = "UPDATE tbl_admin SET password='$password' WHERE username='$username'";
     $conn->query($update1);

      $process="PASSWORD";
      $sql6="SELECT * from tbl_sms where process='$process'";
      $result6 = $conn->query($sql6);
      $row6 = $result6->fetch_assoc();
      $messages = stripslashes($row6['message'])." ".$mypassword;
      sendMessages($contact,$messages);
  }

  $text = substr($contact,4,5);
  $text = strtolower($text);
  $text = str_replace($text, '*****', $contact);


  $sentback="You successfully submit your request for new password. Your new password has been sent to this number :".$text;
  echo '<script language="javascript">';
  echo 'alert("';
  echo $sentback;
  echo '")';
  echo '</script>';
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
      echo 'window.open("login.php","_self")';
      echo '</script>';
         

}else{
    echo '<script language="javascript">';
  echo 'alert("Your email does not exist to the system.")';
  echo '</script>';
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
      echo 'window.open("forgotpassword.php","_self")';
      echo '</script>';
}



?>