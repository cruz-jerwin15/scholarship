<?php
    session_start();
    include('config.php');
    $userid = $_POST['userid'];
    $ids = $_POST['id'];
     $sql2 = "DELETE FROM tbl_siblingsinfo WHERE id='$ids'";
     $conn->query($sql2);

     echo '<script language="javascript">';
              echo 'alert("Successfully remove sibling information")';
              echo '</script>';
echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("siblingsinformation.php","_self")';
      
      echo '</script>';
?>