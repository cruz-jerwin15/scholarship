<?php
    session_start();
    include('config.php');
    $ids = $_GET['id'];
     $sql2 = "DELETE FROM tbl_banner WHERE id='$ids'";
     $conn->query($sql2);

      echo '<script language="javascript">';
              echo 'alert("You successfully remove banner")';
              echo '</script>';
             
               echo "<script> 
                   window.location.href='homepage.php';";
                   echo "</script>";
?>