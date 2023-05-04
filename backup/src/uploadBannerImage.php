<?php
    session_start();
    include('config.php');


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
        
      	 $sql2 = "INSERT INTO tbl_banner (image) VALUES ('$newfilename')";
         $conn->query($sql2);
         move_uploaded_file($file_tmp,"banner/".$newfilename);
        
              echo '<script language="javascript">';
              echo 'alert("You successfully upload your banner")';
              echo '</script>';
             
               echo "<script> 
                   window.location.href='homepage.php';";
                   echo "</script>";

         


         // header('Location:normaladminaccountsettings.php');
      }else{
         print_r($errors);
      }
?>