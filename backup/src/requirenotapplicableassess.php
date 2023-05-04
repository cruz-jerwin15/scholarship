<?php session_start();
require 'config.php';

$requirements = $_POST['requirements'];
$username = $_SESSION['username'];
$year =date('Y');
$month=date('m');
$day=date('d');
$remarks="";

$dates = $year."-".$month."-".$day;

 $userid="";

  $openstatus="OPEN";
        $newdate="";

        $sqla = "SELECT * FROM tbl_assesment WHERE  status='$openstatus'";
          $resulta = $conn->query($sqla);
          if ($resulta->num_rows > 0){
            $rowa = $resulta->fetch_assoc();
            $newdate=$rowa['dates'];
          }

          if($dates>$newdate){
            $remarks="LATE";
          }else{
            $remarks="ON-TIME";
          }
 $sql = "SELECT * FROM tbl_admin WHERE  username='$username'";
   $result = $conn->query($sql);
    if ($result->num_rows > 0){
       $row = $result->fetch_assoc();
      $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
            $academic_id=$_SESSION['academic_id'];
    }

    $sql1 = "SELECT * FROM tbl_assess_req_label WHERE  academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0){
             $newstats=3;
             if($requirements=="school_clearance"){
               $newfilename="NOT APPLICABLE";
               $sql2 = "UPDATE tbl_assess_req_label SET school_clearance = '$newfilename' WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                $sql3 = "UPDATE tbl_assess_req SET school_clearance = '$newstats' WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                $conn->query($sql2);
            $conn->query($sql3);
              
          }

        }else{
           $stats=3;
             $newfilename="NOT APPLICABLE";
              if($requirements=="school_clearance"){
               $sql2= "INSERT INTO tbl_assess_req_label 
                          (academic_id,
                          academic_year,
                          application_no,
                          school_clearance,
                          dates,
                          status
                          )
                        VALUES (
                          '$academic_id',
                          '$academic_year',
                          '$application_no',
                          '$newfilename',
                          '$dates',
                          '$remarks'
                          )";

                $sql3= "INSERT INTO tbl_assess_req
                           (academic_id,
                          academic_year,
                          application_no,
                          school_clearance,
                          dates,
                          status
                          )
                        VALUES (
                          '$academic_id',
                          '$academic_year',
                          '$application_no',
                          '$stats',
                          '$dates',
                          '$remarks'
                )";
             $conn->query($sql2);
            $conn->query($sql3);
             }

        }




            echo '<script language="javascript">';
              echo 'alert("You successfully change requirements to not applicable")';
              echo '</script>';
             
             echo "<script> 
                   window.location.href='assessRequirement.php'";
              

                   echo "</script>";

?>