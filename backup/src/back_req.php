<?php session_start();

 $req_step=$_SESSION['req_step'];
          $_SESSION['req_step']=$req_step-1;
          if($_SESSION['req_step']<1){
            $_SESSION['req_step']=0;
          }
  header('Location:uploadrequirements.php');

?>