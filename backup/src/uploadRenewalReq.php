<?php
    session_start();
    include('config.php');

$requirements = $_POST['requirements'];
$username = $_SESSION['username'];
$year =date('Y');
$month=date('m');
$day=date('d');
$remarks="";

$dates = $year."-".$month."-".$day;
$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext = explode('.',$file_name);
      $file_ext = end($file_ext);
      $file_ext = strtolower($file_ext);
      // $file_ext=strtolower(end(explode('.',$file_name)));
      
    $temp = explode(".", $_FILES["image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
 $extensions= array("jpeg","jpg","png","pdf");
 
      
      
      if(in_array($file_ext,$extensions)=== false){
        
            $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
          
         
        
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
            $academic_year=$row['academic_year'];
            $application_no=$row['application_no'];
           
          }

           
        $status1="OPEN";
        $status2="CURRENT";
        $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
          $resulta = $conn->query($sqla);   
         $rowa = $resulta->fetch_assoc();

        $academic_id = $rowa['id'];
          $sql1 = "SELECT * FROM tbl_renew_label WHERE  academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0){
            $newstats=2;

           
               if($requirements=="school_id"){
               $sql2 = "UPDATE tbl_renew_label SET school_id = '$newfilename'  WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                $conn->query($sql2);
                $sql3 = "UPDATE tbl_renew SET school_id = '$newstats' WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                $conn->query($sql3);
               }else if($requirements=="registration_form"){
               $sql2 = "UPDATE tbl_renew_label SET registration_form = '$newfilename' WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                $conn->query($sql2);
                $sql3 = "UPDATE tbl_renew SET registration_form = '$newstats' WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
                $conn->query($sql3);
               }

          }else{
            $newstats=2;
             if($requirements=="school_id"){
               $sql2 ="INSERT INTO tbl_renew_label (academic_id,academic_year,application_no,school_id) VALUES ('$academic_id','$academic_year','$application_no','$newfilename')";
                $conn->query($sql2);
              $sql3 ="INSERT INTO tbl_renew (academic_id,academic_year,application_no,school_id) VALUES ('$academic_id','$academic_year','$application_no','$newstats')";
                $conn->query($sql3);
               }else if($requirements=="registration_form"){
              $sql2 ="INSERT INTO tbl_renew_label (academic_id,academic_year,application_no,registration_form) VALUES ('$academic_id','$academic_year','$application_no','$newfilename')";
                $conn->query($sql2);
              $sql3 ="INSERT INTO tbl_renew (academic_id,academic_year,application_no,registration_form) VALUES ('$academic_id','$academic_year','$application_no','$newstats')";
                $conn->query($sql3);
               }
          }
         
      

         move_uploaded_file($file_tmp,"requirements/".$newfilename);
                       echo '<script language="javascript">';
              echo 'alert("You successfully upload your requirements")';
              echo '</script>';
             
             echo "<script> 
                   window.location.href='renewalRequirements.php'";
              

                   echo "</script>";
         //  }

           


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
                   window.location.href='renewalRequirements.php'";
              

                   echo "</script>";
        
      }
?>