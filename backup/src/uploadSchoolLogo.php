<?php
    session_start();
    include('config.php');
$schoolid = $_POST['schoolid'];
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

      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){


      	 $sql2 = "UPDATE tbl_partnerschool SET img = '$newfilename' WHERE id='$schoolid'";

         move_uploaded_file($file_tmp,"img/".$newfilename);
         if (mysqli_query($conn, $sql2)){
              echo '<script language="javascript">';
              echo 'alert("You successfully upload school logo")';
              echo '</script>';
             
           echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("partner_school.php","_self")';
      
      echo '</script>';
          }

           


         // header('Location:normaladminaccountsettings.php');
      }else{
         print_r($errors);
      }
?>