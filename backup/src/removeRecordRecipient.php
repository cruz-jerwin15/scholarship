<?php
    session_start();
    include('config.php');
    $ids = $_GET['id'];
     $sql2 = "DELETE FROM tbl_admin WHERE id='$ids'";
     $conn->query($sql2);

      echo '<script language="javascript">';
              echo 'alert("You successfully remove records")';
              echo '</script>';
             
               echo "<script> 
                   window.location.href='oldCollegeRecord.php';";
                   echo "</script>";
?>