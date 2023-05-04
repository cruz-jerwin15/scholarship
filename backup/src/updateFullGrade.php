<?php
session_start();
include 'config.php';
$userid = $_POST['users'];
$newgrade = $_POST['scores'];
$username =$_SESSION['username'];

if($_SESSION['usertype']!="superadmin"){
    
    $pin = $_POST['pin'];
    $sqlb  = "SELECT * FROM tbl_pin WHERE pin='$pin'";
    $resultb = $conn->query($sqlb);
    if ($resultb->num_rows <= 0){
                   echo '<script language="javascript">';
              echo 'alert("Wrong pin number.")';
              echo '</script>';
       
            echo '<script language="javascript">';
              // echo 'localStorage.setItem("notif","1")';
                if($_SESSION['studenttype']=="collegerecipient"){
              echo 'window.open("assessmentCollegeRecipient.php","_self")';
            }else if($_SESSION['studenttype']=="fullscholar"){
              echo 'window.open("assessmentCollegeFullScholar.php","_self")';
            }else if($_SESSION['studenttype']=="shscholar"){
              echo 'window.open("assessmentSHS.php","_self")';
            }
                echo '</script>';
    }else{

      $sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $academic_year= $row['academic_year'];
    $application_no=$row['application_no'];
    

    $sqla = "SELECT * FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resulta = $conn->query($sqla);
        $rowa = $resulta->fetch_assoc();


         if ($resulta->num_rows <= 0){
              $insert1= "INSERT INTO tbl_committee_score 
                     (academic_year,
                     application_no,
                     committee_id,
                     score
                    )
                   VALUES (
                     '$academic_year',
                     '$application_no',
                     '$username',
                     '$newgrade'
                      )";
          $conn->query($insert1);

          $update = "UPDATE tbl_finalscore SET score=score+'$newgrade' WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $conn->query($update);
             echo '<script language="javascript">';
              echo 'alert("You successfully add your score")';
              echo '</script>';
         }else{
            $oldscore = $rowa['score'];

            $update = "UPDATE tbl_finalscore SET score=score-'$oldscore' WHERE academic_year='$academic_year' AND application_no='$application_no'";
            $conn->query($update);

             $update1 = "UPDATE tbl_committee_score SET score='$newgrade',committee_id='$username' WHERE academic_year='$academic_year' AND application_no='$application_no'";
             $conn->query($update1);

              $update2 = "UPDATE tbl_finalscore SET score=score+'$newgrade' WHERE academic_year='$academic_year' AND application_no='$application_no'";
            $conn->query($update2);



           echo '<script language="javascript">';
              echo 'alert("You successfully add your score")';
              echo '</script>';
         


         }
       
   
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
      if($_SESSION['studenttype']=="collegerecipient"){
    echo 'window.open("assessmentCollegeRecipient.php","_self")';
  }else if($_SESSION['studenttype']=="fullscholar"){
    echo 'window.open("assessmentCollegeFullScholar.php","_self")';
  }else if($_SESSION['studenttype']=="shscholar"){
    echo 'window.open("assessmentSHS.php","_self")';
  }
      echo '</script>';
    }


}else{
  $sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $academic_year= $row['academic_year'];
    $application_no=$row['application_no'];
    
  

    $sqla = "SELECT * FROM tbl_committee_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
        $resulta = $conn->query($sqla);
        $rowa = $resulta->fetch_assoc();


         if ($resulta->num_rows <= 0){
              $insert1= "INSERT INTO tbl_committee_score 
                     (academic_year,
                     application_no,
                     committee_id,
                     score
                    )
                   VALUES (
                     '$academic_year',
                     '$application_no',
                     '$username',
                     '$newgrade'
                      )";
          $conn->query($insert1);

          $update = "UPDATE tbl_finalscore SET score=score+'$newgrade' WHERE academic_year='$academic_year' AND application_no='$application_no'";
          $conn->query($update);
             echo '<script language="javascript">';
              echo 'alert("You successfully add your score")';
              echo '</script>';
         }else{
            $oldscore = $rowa['score'];

            $update = "UPDATE tbl_finalscore SET score=score-'$oldscore' WHERE academic_year='$academic_year' AND application_no='$application_no'";
            $conn->query($update);

             $update1 = "UPDATE tbl_committee_score SET score='$newgrade',committee_id='$username' WHERE academic_year='$academic_year' AND application_no='$application_no'";
             $conn->query($update1);

              $update2 = "UPDATE tbl_finalscore SET score=score+'$newgrade' WHERE academic_year='$academic_year' AND application_no='$application_no'";
            $conn->query($update2);



           echo '<script language="javascript">';
              echo 'alert("You successfully add your score")';
              echo '</script>';
         


         }
       
   
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
      if($_SESSION['studenttype']=="collegerecipient"){
    echo 'window.open("assessmentCollegeRecipient.php","_self")';
  }else if($_SESSION['studenttype']=="fullscholar"){
    echo 'window.open("assessmentCollegeFullScholar.php","_self")';
  }else if($_SESSION['studenttype']=="shscholar"){
    echo 'window.open("assessmentSHS.php","_self")';
  }
      echo '</script>';
}
