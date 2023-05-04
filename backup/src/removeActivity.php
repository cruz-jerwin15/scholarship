<?php
    session_start();
    include('config.php');
    $ids = $_GET['id'];
    $status = $_GET['status'];

    if($status=="REMOVED"){
      $stats ="REMOVED";
       $update3 = "UPDATE tbl_activity SET status='$stats' WHERE id='$ids'";
    
        $conn->query($update3);
         echo '<script language="javascript">';
              echo 'alert("You successfully remove activity")';
              echo '</script>';
    }else{
       $stats ="PUBLISHED";
       $update3 = "UPDATE tbl_activity SET status='$stats' WHERE id='$ids'";
    
        $conn->query($update3);
         echo '<script language="javascript">';
              echo 'alert("You successfully published activity")';
              echo '</script>';
    }
    

     
             
               echo "<script> 
                   window.location.href='calendar.php';";
                   echo "</script>";
?>