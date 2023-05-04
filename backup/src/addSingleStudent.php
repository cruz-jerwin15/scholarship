<?php
session_start();
include 'config.php';
require 'referralcode.php';
$studenttype=$_SESSION['studenttype'];

$usertypes = $_POST['usertype'];
$email = $_POST['email'];

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
// $birthday = $_POST['birthday'];
// $birthplace = $_POST['birthplace'];
// $birthorder = $_POST['birthorder'];
// $civil = $_POST['civil'];
// $gender = $_POST['gender'];
// $citizen = $_POST['citizen'];
// $religion = $_POST['religion'];
// $housenumber = $_POST['housenumber'];
// $street = $_POST['street'];
// $barangay = $_POST['barangay'];
// $years_residency = $_POST['years_residency'];

// $contactnumber = $_POST['contactnumber'];
// $course = $_POST['course'];
// $years = $_POST['years'];

// $school = $_POST['school'];
// $schooltype = $_POST['schooltype'];
// $school_address = $_POST['school_address'];
// $last_school_attended = $_POST['last_school_attended'];
// $last_school_address = $_POST['last_school_address'];
// $gwa = $_POST['gwa'];
// $exam_rating = $_POST['exam_rating'];

// $living_with_family = $_POST['living_with_family'];
// $total_number_family = $_POST['total_number_family'];
// $source_of_living = $_POST['source_of_living'];
// $house = $_POST['house'];
// $pay_monthly = $_POST['pay_monthly'];
$refcode = getReferral();
$mypassword=$refcode;
$password = md5($mypassword);
$image="avatar.png";

if($studenttype=="fullscholar"){
  $usertype="college";
  $typescholar="fullscholar";
}else if($studenttype=="collegerecipient"){
  $usertype="college";
  $typescholar="collegerecipient";
}else if($studenttype=="shscholar"){
  $usertype="shs";
  $typescholar="shscholar";
}

$status1="NEWAPPLICANT";

  $year =date('Y');
  $month=date('m');
  $day=date('d');

  $dates = $year."-".$month."-".$day;
  $date=date_create($dates,timezone_open("Asia/Manila"));
  $dates = date_format($date,"Y-m-d");

  $sql="SELECT * from tbl_admin where username='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows < 1){

    $academic_year = "";
    $application_no = "";
  
    $status="OPEN";
    $sql2="SELECT * from tbl_batch where status='$status'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0){
      $row2 = $result2->fetch_assoc();
      $academic_year=$row2['batch'];

      $sql4="SELECT MAX(application_no) as maxnumber from tbl_admin WHERE academic_year='$academic_year'";
      $result4 = $conn->query($sql4);
      if ($result4->num_rows > 0){
        $row4 = $result4->fetch_assoc();
        $application_no=$row4['maxnumber']+1;
        
      }
      $applicant_number=0;
        $sql5="SELECT MAX(applicant_number) as maxnumber from tbl_admin WHERE academic_year='$academic_year' AND typescholar='$typescholar'";
      $result5 = $conn->query($sql5);
      if ($result5->num_rows > 0){
        $row5 = $result5->fetch_assoc();
        $applicant_number=$row5['maxnumber']+1;
        
      }

    }

     
    $sql1="SELECT * from  tbl_studentinfo where lastname='$lastname' AND firstname='$firstname' AND middlename='$middlename'";
    $result1 = $conn->query($sql1);
      if ($result1->num_rows < 1){
        $insert= "INSERT INTO tbl_admin 
                    (academic_year,
                    application_no,
                    applicant_number,
                    username,
                    usertype,
                    password,
                    image,
                    dates,
                    typescholar,
                    status)
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$applicant_number',
                    '$email',
                    '$usertype',
                    '$password',
                    '$image',
                    '$dates',
                    '$typescholar',
                    '$status1')";
        $conn->query($insert);

        $insert1= "INSERT INTO tbl_studentinfo 
                    (academic_year,
                    application_no,
                    firstname,
                    middlename,
                    lastname
                   )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$firstname',
                    '$middlename',
                    '$lastname'
                    
                     )";
         $conn->query($insert1);

         $to = $email;
         $subject = "Sign-in Credentials";
         
         $message = "<b>Below is your sign-in credentials.</b>";
         $message .= "<h1>Username: ".$email."</h1>";
         $message .= "<h1>Password: ".$mypassword."</h1>";
         
         $header = "From:youthdevelopent@cityofstotomas.gov.ph \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);

         // echo $retval;
         echo '<script language="javascript">';
              echo 'alert("Successfully add student information")';
              echo '</script>';
        echo '<script language="javascript">';
          // echo 'localStorage.setItem("notif","1")';
          if($studenttype=="fullscholar"){
            echo 'window.open("newCollegeFullScholar.php","_self")';
          }else if($studenttype=="collegerecipient"){
            echo 'window.open("newCollegeRecipient.php","_self")';
          }else if($studenttype=="shscholar"){
            echo 'window.open("newSHS.php","_self")';
          }
           
            echo '</script>';
      }else{
        $row1 = $result1->fetch_assoc();

        $old_application=$row1['application_no'];
        $old_academic_year=$row1['academic_year'];

         $sqla="SELECT * from tbl_admin where academic_year='$old_academic_year' AND application_no='$old_application'";
          $resulta = $conn->query($sqla);
          $rowa = $resulta->fetch_assoc();


        $scholars=$rowa['typescholar'];
        $status2=$rowa['status'];
        $number=1;
        

        $update1 = "UPDATE tbl_studentinfo SET number_try=number_try+'$number',academic_year='$academic_year',application_no='$application_no' where lastname='$lastname' AND firstname='$firstname' AND middlename='$middlename'";
         $conn->query($update1);

         $newstatus="NEWAPPLICANT";
        $update2 = "UPDATE tbl_admin SET academic_year='$academic_year',application_no='$application_no',applicant_number='$applicant_number',status='$newstatus' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

          $insert1= "INSERT INTO tbl_old 
                    (academic_year,
                    application_no,
                    old_academic_year,
                    old_application_no,
                    scholarship,
                    status)
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$old_academic_year',
                    '$old_application',
                    '$scholars',
                    '$status2')";
        $conn->query($insert1);

        $update2 = "UPDATE tbl_added_info SET academic_year='$academic_year',application_no='$application_no' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

         $update2 = "UPDATE tbl_educational_background SET academic_year='$academic_year',application_no='$application_no' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

        $update2 = "UPDATE tbl_fatherinfo SET academic_year='$academic_year',application_no='$application_no' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

        $update2 = "UPDATE tbl_guardianinfo SET academic_year='$academic_year',application_no='$application_no' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

         $update2 = "UPDATE tbl_husbandwifeinfo SET academic_year='$academic_year',application_no='$application_no' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

         $update2 = "UPDATE tbl_motherinfo SET academic_year='$academic_year',application_no='$application_no' where academic_year='$old_academic_year' AND application_no='$old_application'";
        $conn->query($update2);

        $delete ="DELETE FROM tbl_score
                  where academic_year='$old_academic_year' AND application_no='$old_application'";


         echo '<script language="javascript">';
              echo 'alert("Student is already in the system.The updated his/her academic year and control number")';
              echo '</script>';
        echo '<script language="javascript">';
          // echo 'localStorage.setItem("notif","1")';
         if($studenttype=="fullscholar"){
            echo 'window.open("newCollegeFullScholar.php","_self")';
          }else if($studenttype=="collegerecipient"){
            echo 'window.open("newCollegeRecipient.php","_self")';
          }
           
            echo '</script>';
      }
  }else{
     echo '<script language="javascript">';
              echo 'alert("Control number for this academic year is already in the system")';
              echo '</script>';
        echo '<script language="javascript">';
          // echo 'localStorage.setItem("notif","1")';
         if($studenttype=="fullscholar"){
            echo 'window.open("newCollegeFullScholar.php","_self")';
          }else if($studenttype=="collegerecipient"){
            echo 'window.open("newCollegeRecipient.php","_self")';
          }else if($studenttype=="shscholar"){
            echo 'window.open("newSHS.php","_self")';
          }
          
            echo '</script>';
  }

?>