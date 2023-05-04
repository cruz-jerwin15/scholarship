<?php
    session_start();
    include('config.php');
    
  $sql = "SELECT * FROM tbl_remarks";
  $result = $conn->query($sql);
  $count=0;
  while($row = $result->fetch_assoc()){
    if(strlen($row['scholars'])<=0){

      $count++;
      $user_id=$row['user_id'];
      $id=$row['id'];
       $sql1 = "SELECT * FROM tbl_admin WHERE id='$user_id'";
      $result1 = $conn->query($sql1);
      $row1 = $result1->fetch_assoc();
      echo $count.".".$row['scholars']." ".$row['id']."-".$row1['username']."-".$row1['status']."-".$row['process']."<br>";

      $delete="DELETE FROM tbl_remarks WHERE id = '$id'";
      $conn->query($delete);

    }
    
    
  }

     
?>