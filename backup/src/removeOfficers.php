<?php
    session_start();
    include('config.php');
    $ids = $_GET['id'];
     $sql2 = "DELETE FROM tbl_officers WHERE id='$ids'";
     $conn->query($sql2);

      echo '<script language="javascript">';
              echo 'alert("You successfully remove officer")';
              echo '</script>';
             
               echo "<script> 
                   window.location.href='officers.php';";
                   echo "</script>";
?>