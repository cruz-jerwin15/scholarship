<?php session_start();

include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];

$checker = "superadmin";
$fpassword = md5($password);



$query = "SELECT * FROM tbl_admin WHERE username = '$username'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $newpassword = $row['password'];
  if ($newpassword == $fpassword) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['id'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['usertype'] = $row['usertype'];
    $_SESSION['studenttype'] = $row['typescholar'];
    $_SESSION['student'] = "YES";

    $_SESSION['step1'] = 0;
    $_SESSION['step2'] = 0;
    $_SESSION['step3'] = 0;
    $_SESSION['step4'] = 0;
    if (($row['usertype'] == "shs") || ($row['usertype'] == "college")) {
      //       echo '<script language="javascript">';
      //           echo 'alert("Application and renewal for school year 2020-2021 is already closed.")';
      //           echo '</script>';
      // echo '<script language="javascript">';
      //   echo 'window.open("login.php","_self")';
      //   echo '</script>';
      $sql1 = "SELECT * FROM tbl_admin WHERE username='$username'";
      $result1 = $conn->query($sql1);
      $row1 = $result1->fetch_assoc();
      $academic_year = $row1['academic_year'];
      $application_no = $row1['application_no'];
      $sql2 = "SELECT * from tbl_studentinfo where academic_year='$academic_year' AND application_no='$application_no'";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
      $_SESSION['lastname'] = $row2['lastname'];
      $_SESSION['firstname'] = $row2['firstname'];
      if (($row['status'] == "OK") || ($row['status'] == "RENEW") || ($row['status'] == "ASSESS") || ($row['status'] == "NEWAPPLICANT") || ($row['status'] == "INTERVIEW") || ($row['status'] == "PREAPPLICATION") || ($row['status'] == "ASSESSMENT")) {

        $st = "CURRENT";
        $sqlz = "SELECT * FROM tbl_academic WHERE status='$st'";
        $resultz = $conn->query($sqlz);


        if ($resultz->num_rows > 0) {
          if (($row['status'] == "NEWAPPLICANT") || ($row['status'] == "PREAPPLICATION") || ($row['status'] == "INTERVIEW") || ($row['status'] == "ASSESSMENT")) {
            if (($row['usertype'] == "shs") || ($row['usertype'] == "college")) {
              echo '<script language="javascript">';
              echo 'alert("The application is already closed!")';
              echo '</script>';
              echo '<script language="javascript">';
              echo 'window.open("login.php","_self")';
              echo '</script>';
            }
          }
        }
        $rowz = $resultz->fetch_assoc();

        $_SESSION['student'] = $row['status'];
        $_SESSION['newid'] = $row1['id'];
        echo '<script language="javascript">';
        echo 'window.open("updatestudent.php","_self")';
        echo '</script>';
      } else {
        if ($row['status'] == "BLOCK") {
          echo '<script language="javascript">';
          echo 'alert("You had been blocked by the administrator. Please contact the YDO staff to explain what to do.")';
          echo '</script>';
          //      echo '<script language="javascript">';
          //     echo 'alert("System is still under maintenance")';
          //     echo '</script>';
          $_SESSION['student'] = "NO";
          echo '<script language="javascript">';
          echo 'window.open("login.php","_self")';
          echo '</script>';
        } else {
          echo '<script language="javascript">';
          echo 'alert("You cannot login to the system. It is either you had been removed by the administrator or you are already graduated. Please register again to avail scholarship/assistance")';
          echo '</script>';
          //     echo '<script language="javascript">';
          //     echo 'alert("System is still under maintenance")';
          //     echo '</script>';
          $_SESSION['student'] = "NO";
          echo '<script language="javascript">';
          echo 'window.open("login.php","_self")';
          echo '</script>';
        }
      }
    } else if ($row['usertype'] == "committee") {


      echo '<script language="javascript">';
      echo 'window.open("committee_dashboard.php","_self")';
      echo '</script>';
    } else {

      if($row['status'] == "REMOVED"){
         echo '<script language="javascript">';
      echo 'alert("You can no longer access the system.")';
      echo '</script>';
      echo '<script language="javascript">';
      echo 'window.open("login.php")';
      echo '</script>';
      }else{
          echo '<script language="javascript">';
      echo 'window.open("dashboards.php","_self")';
      echo '</script>';
      }

    
    }
  } else {
    echo '<script language="javascript">';
    echo 'alert("WRONG PASSWORD/USERNAME")';
    echo '</script>';
    echo '<script language="javascript">';
    echo 'window.open("login.php")';
    echo '</script>';
  }
} else {
  echo '<script language="javascript">';
  echo 'alert("WRONG PASSWORD/USERNAME")';
  echo '</script>';
  echo '<script language="javascript">';
  echo 'window.open("login.php")';
  echo '</script>';
}
