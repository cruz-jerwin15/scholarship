<?php
    session_start();
    include('config.php');
    $ids = $_POST['id'];
     $sql2 = "DELETE FROM tbl_siblingsinfo WHERE id='$ids'";
     $conn->query($sql2);

     echo '<script language="javascript">';
              echo 'alert("Successfully remove sibling information")';
              echo '</script>';
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
  if($_SESSION['status']=="OK"){
         echo 'window.open("updatestudent.php","_self")';
    }else{
         echo 'window.open("studentregister.php","_self")';
    }
     
   echo '</script>';
?>