<?php session_start();
require 'config.php';

$requirements = $_POST['requirements'];
$username = $_SESSION['username'];


 $userid="";
 $sql = "SELECT * FROM tbl_admin WHERE  username='$username'";
   $result = $conn->query($sql);
    if ($result->num_rows > 0){
       $row = $result->fetch_assoc();
      $userid=$row['id'];
    }

      $sql1 = "SELECT * FROM tbl_college_requirements_label WHERE  user_id='$userid'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0){
            $newstats=3;
            $newfilename="NOT APPLICABLE";
               if($requirements=="birthcertificate"){
               $sql2 = "UPDATE tbl_college_requirements_label SET birthcertificate = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET birthcertificate = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="schoolclearance"){
               $sql2 = "UPDATE tbl_college_requirements_label SET schoolclearance = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET schoolclearance = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="gradereport"){
               $sql2 = "UPDATE tbl_college_requirements_label SET gradereport = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET gradereport = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="parentvotersid"){
               $sql2 = "UPDATE tbl_college_requirements_label SET parentvotersid = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET parentvotersid = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="yourvotersid"){
               $sql2 = "UPDATE tbl_college_requirements_label SET yourvotersid = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET yourvotersid = '$newstats' WHERE user_id='$userid'";
               $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="application"){
               $sql2 = "UPDATE tbl_college_requirements_label SET applicationform = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET applicationform = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="housesketch"){
               $sql2 = "UPDATE tbl_college_requirements_label SET housesketch = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET housesketch = '$newstats' WHERE user_id='$userid'";
               $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="barangayclearance"){
               $sql2 = "UPDATE tbl_college_requirements_label SET barangayclearance  = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET barangayclearance = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="picture"){
               $sql2 = "UPDATE tbl_college_requirements_label SET picture  = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET picture = '$newstats' WHERE user_id='$userid'";
                 $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="itr"){
               $sql2 = "UPDATE tbl_college_requirements_label SET itr  = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET itr = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql2);
            $conn->query($sql3);
               }else if($requirements=="indigency"){
               $sql2 = "UPDATE tbl_college_requirements_label SET indigency = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET indigency = '$newstats' WHERE user_id='$userid'";
                 $conn->query($sql2);
                $conn->query($sql3);
               }

          }else{
            $stats=3;
             $newfilename="NOT APPLICABLE";
              if($requirements=="birthcertificate"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          birthcertificate
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";

                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          birthcertificate
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
             $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="schoolclearance"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          schoolclearance
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
                 $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          schoolclearance
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
           $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="gradereport"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          gradereport
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
                 $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          gradereport
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
          $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="parentvotersid"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          parentvotersid
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";

                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          parentvotersid
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
            $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="yourvotersid"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          yourvotersid
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";

                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          yourvotersid
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
             $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="application"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          applicationform
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          applicationform
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
            $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="housesketch"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          housesketch
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          housesketch
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
              $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="barangayclearance"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          barangayclearance
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          barangayclearance
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
             $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="picture"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          picture
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
                $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          picture
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
             $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="itr"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          itr
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
              $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          itr
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
                $conn->query($sql2);
            $conn->query($sql3);
             }else if($requirements=="indigency"){
               $sql2= "INSERT INTO tbl_college_requirements_label 
                          (user_id,
                          indigency
                          )
                        VALUES (
                          '$userid',
                          '$newfilename'
                          )";
              $sql3= "INSERT INTO tbl_college_requirements 
                          (user_id,
                          indigency
                          )
                        VALUES (
                          '$userid',
                          '$stats'
                )";
                $conn->query($sql3);
             }

          }

           $req_step=$_SESSION['req_step'];
          $_SESSION['req_step']=$req_step+1;
          if($_SESSION['typescholar']=="shscholar"){
             if($_SESSION['req_step']>10){
                $_SESSION['req_step']=0;
            }
          }else{
             if($_SESSION['req_step']>11){
              $_SESSION['req_step']=0;
            }
          }
            echo '<script language="javascript">';
              echo 'alert("You successfully change requirements to not applicable")';
              echo '</script>';
             
             echo "<script> 
                   window.location.href='uploadrequirements.php'";
              

                   echo "</script>";

?>