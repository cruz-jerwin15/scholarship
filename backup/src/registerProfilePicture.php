<?php
    session_start();
    include('config.php');
$userid = $_POST['userid'];
$username = $_POST['email'];
$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext = explode('.',$file_name);
      $file_ext = end($file_ext);
      $file_ext = strtolower($file_ext);
      // $file_ext=strtolower(end(explode('.',$file_name)));
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

      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){


      	 $sql2 = "UPDATE tbl_admin SET image = '$newfilename' WHERE id='$userid'";

         move_uploaded_file($file_tmp,"profile/".$newfilename);
         if (mysqli_query($conn, $sql2)){
          $_SESSION['reg_step']=$_SESSION['reg_step']+1;
              echo '<script language="javascript">';
              echo 'alert("You successfully upload your photos")';
              echo '</script>';
             
           echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("personalinfo.php","_self")';
      
      echo '</script>';
          }

           


         // header('Location:normaladminaccountsettings.php');
      }else{
         print_r($errors);
      }
?>