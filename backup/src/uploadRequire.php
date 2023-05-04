<?php
    session_start();
    include('config.php');

$requirements = $_POST['requirements'];
$username = $_SESSION['username'];
$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext = explode('.',$file_name);
      $file_ext = end($file_ext);
      $file_ext = strtolower($file_ext);
      // $file_ext=strtolower(end(explode('.',$file_name)));
    date_default_timezone_set("Asia/Manila");
    $year =date('Y');
    $month=date('m');
    $day=date('d');
    $hour=date('H');
    $minute=date('i');
    $seconds=date('s');

    $newfile=$year."".$month."".$day."".$hour."".$minute."".$seconds;

    $temp = explode(".", $_FILES["image"]["name"]);
	$newfilename = $newfile.''.round(microtime(true)) . '.' . end($temp);

  if($requirements=="picture"){
    $extensions= array("jpeg","jpg","png");
  }else{
    $extensions= array("jpeg","jpg","png","pdf");
  }
      
      
      if(in_array($file_ext,$extensions)=== false){
         if($requirements=="picture"){
            $errors[]="extension not allowed, please choose a  JPEG or PNG file for 1x1 picture.";
          }else{
            $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
          }
         
        
      }
      
      // echo $requirements;

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      // echo $requirements;
      if(empty($errors)==true){
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
            $newstats=2;
               if($requirements=="birthcertificate"){
               $sql2 = "UPDATE tbl_college_requirements_label SET birthcertificate = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET birthcertificate = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="schoolclearance"){
               $sql2 = "UPDATE tbl_college_requirements_label SET schoolclearance = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET schoolclearance = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="gradereport"){
               $sql2 = "UPDATE tbl_college_requirements_label SET gradereport = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET gradereport = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="parentvotersid"){
               $sql2 = "UPDATE tbl_college_requirements_label SET parentvotersid = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET parentvotersid = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="yourvotersid"){
               $sql2 = "UPDATE tbl_college_requirements_label SET yourvotersid = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET yourvotersid = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="application"){
               $sql2 = "UPDATE tbl_college_requirements_label SET applicationform = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET applicationform = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="housesketch"){
               $sql2 = "UPDATE tbl_college_requirements_label SET housesketch = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET housesketch = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="barangayclearance"){
               $sql2 = "UPDATE tbl_college_requirements_label SET barangayclearance  = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET barangayclearance = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="picture"){
               $sql2 = "UPDATE tbl_college_requirements_label SET picture  = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET picture = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="itr"){
               $sql2 = "UPDATE tbl_college_requirements_label SET itr  = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET itr = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }else if($requirements=="indigency"){
               $sql2 = "UPDATE tbl_college_requirements_label SET indigency = '$newfilename' WHERE user_id='$userid'";
                $sql3 = "UPDATE tbl_college_requirements SET indigency = '$newstats' WHERE user_id='$userid'";
                $conn->query($sql3);
               }

          }else{
            $stats=2;
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
         
      

         move_uploaded_file($file_tmp,"requirements/".$newfilename);
         if (mysqli_query($conn, $sql2)){
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
              echo 'alert("You successfully upload your requirements")';
              echo '</script>';
             
             echo "<script> 
                   window.location.href='uploadrequirements.php'";
              

                   echo "</script>";
          }

         // header('Location:normaladminaccountsettings.php');
      }else{
        if($requirements=="picture"){
          echo '<script language="javascript">';
              echo 'alert("Upload JPEG or PNG for 1x1 picture")';
              echo '</script>';
        }else{
          echo '<script language="javascript">';
              echo 'alert("Upload JPEG, PNG or PDF for your documents")';
              echo '</script>';
        }
         echo "<script> 
                   window.location.href='uploadrequirements.php'";
              

                   echo "</script>";
        
      }
?>