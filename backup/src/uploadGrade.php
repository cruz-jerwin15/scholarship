<?php
    session_start();
    include('config.php');

$username = $_SESSION['userid'];
$semid = $_POST['ids'];
$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
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
      	 
        $sql2 = "INSERT INTO  tbl_uploadedgrade (user_id,semid,filename)
            VALUES ('$username','$semid','$newfilename')";
        
         move_uploaded_file($file_tmp,"grades/".$newfilename);
         if (mysqli_query($conn, $sql2)){
              echo '<script language="javascript">';
              echo 'alert("You successfully upload your grades")';
              echo '</script>';
            
               echo "<script> 
                   window.location.href='listgrade.php';
                   </script>";

           }


         // header('Location:normaladminaccountsettings.php');
      }else{
         print_r($errors);
      }
?>