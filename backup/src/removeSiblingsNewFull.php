<?php
    session_start();
    include('config.php');
    $ids = $_POST['id'];
    $userid = $_POST['userid'];
     $sql2 = "DELETE FROM tbl_siblingsinfo WHERE id='$ids'";
     $conn->query($sql2);

     echo '<script language="javascript">';
              echo 'alert("Successfully remove sibling information")';
              echo '</script>';
  echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';
  if($_SESSION['studenttype']=="fullscholar"){

    echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
     
  }else if($_SESSION['studenttype']=="collegerecipient"){

    echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
     
  }else if($_SESSION['studenttype']=="shscholar"){

    echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
     
  }
   echo '</script>';
?>