<?php
    session_start();
    include('config.php');
    $ids = $_GET['id'];
     $sql2 = "DELETE FROM tbl_list_req WHERE id='$ids'";
     $conn->query($sql2);

      echo '<script language="javascript">';
              echo 'alert("You successfully remove requirement")';
              echo '</script>';
             
               echo "<script> 
                   window.location.href='requirements.php';";
                   echo "</script>";
?>