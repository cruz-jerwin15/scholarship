<?php session_start();
include 'config.php';

$email = $_POST['email'];
$code = $_POST['pincode'];
$typescholar = $_POST['usertype'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$barangay = $_POST['barangay'];
$mobile = $_POST['mobile'];
$stats = "OK";

$password="ydoapplicant";

$sqlz = "SELECT * FROM tbl_pin WHERE pin='$code'";
  $resultz = $conn->query($sqlz);
  $rowz = $resultz->fetch_assoc();
if ($resultz->num_rows <= 0){
  echo '<script language="javascript">';
           echo 'alert("Wrong pin code.")';
           echo '</script>';
 echo '<script language="javascript">';
   echo 'window.open("dashboards.php","_self")';
   echo '</script>';
}else{

  date_default_timezone_set("Asia/Manila");
  $year =date('Y');
  $month=date('m');
  $day=date('d');

  $dates = $year."-".$month."-".$day;
  $schooltype="";

  if($typescholar=="shscholar"){
    $usertype="shs";
  }
  else{
    $usertype="college";
    if($typescholar=="collegerecipient_public"){
      $schooltype="Public / State Universities";
      $typescholar="collegerecipient";
    }else if($typescholar=="collegerecipient_private"){
      $schooltype="Private / Institute";
      $typescholar="collegerecipient";
    }else{
      $typescholar="fullscholar";
    }
  }

  $sql="SELECT * from tbl_admin where username='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row['status']=="REMOVED"){
      //Applicant was being removed
      echo '<script language="javascript">';
      echo 'alert("Applicant was being removed.")';
      echo '</script>';
    }else if($row['status']=="GRADUATED"){
      //Applicant is already graduated
      echo '<script language="javascript">';
      echo 'alert("Applicant is already graduated.")';
      echo '</script>';
    }else if($row['status']=="BLOCKED"){
      //Applicant was in a BLOCKED status
      echo '<script language="javascript">';
      echo 'alert("Applicant was in a BLOCKED status.")';
      echo '</script>';
    }else{
      //Email already in the system
      echo '<script language="javascript">';
      echo 'alert("Applicant is already in the system.")';
      echo '</script>';
    }
  }else{
    $sql1="SELECT * from tbl_studentinfo where firstname='$firstname' AND lastname='$lastname'";
    $result1 = $conn->query($sql1);
       if ($result1->num_rows > 0){
         //Applicant is already in the system
         echo '<script language="javascript">';
         echo 'alert("Applicant is already in the system.")';
         echo '</script>';
       }else{
         $status1="OPEN";
         $status2="CURRENT";
         $status3="CLOSED";
         $sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2' OR status='$status3' ORDER BY id DESC";
         $resulta = $conn->query($sqla);
         $rowa = $resulta->fetch_assoc();

         $academic_id = $rowa['id'];
         $academic_years=$rowa['academic_year'];
         $status3="OK";

         $insert= "INSERT INTO tbl_admin
             (academic_year,
              academic_id,
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
             '$academic_years',
             '$academic_id',
             '$application_no',
             '$applicant_number',
             '$email',
             '$usertype',
             '$password',
             '$image',
             '$dates',
             '$typescholar',
             '$status3')";


      $conn->query($insert);
         $insert1= "INSERT INTO tbl_studentinfo
         (academic_year,
         application_no,
         firstname,
         middlename,
         lastname,
         barangay,
         phone,
         schooltype
        )
       VALUES (
         '$academic_years',
         '$application_no',
         '$firstname',
         '$middlename',
         '$lastname',
         '$barangay',
         '$mobile',
         '$schooltype'
          )";
         $conn->query($insert1);

         echo '<script language="javascript">';
         echo 'alert("Successfully submit applicant partial information.")';
         echo '</script>';
       }
  }

}


echo '<script language="javascript">';
echo 'window.open("dashboards.php","_self")';
echo '</script>';
?>
