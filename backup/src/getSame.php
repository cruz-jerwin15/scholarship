<?php
    session_start();
    include('config.php');
 
  $status="OK";

  $acad=0;
  $sql = "SELECT * FROM tbl_admin WHERE academic_id='$acad' AND status='$status' ORDER BY academic_year DESC";
  $result = $conn->query($sql);
  $count=0;
  while($row = $result->fetch_assoc()){
  	$count++;
    $user_id = $row['id'];
    if($row['academic_year']=="2020-2021"){
        $academic_year="2019-2020";
    }else{
      $academic_year=$row['academic_year'];
    }
  

    $sqla = "SELECT * FROM tbl_academic WHERE academic_year='$academic_year'";
    $resulta = $conn->query($sqla);
    $rowa = $resulta->fetch_assoc();
    $acad_id=$rowa['id'];

   
    if($row['typescholar']=="NONE"){

    }else{

      $update ="UPDATE tbl_admin SET academic_id='$acad_id' WHERE id='$user_id'";
      $conn->query($update);

       echo $count." ".$user_id." ".$row['academic_year']." ".$row['typescholar']." ".$acad_id."<br>";
    }
  // 	$user_id = $row['user_id'];
  // 	$sql1 = "SELECT COUNT(*) as total FROM tbl_remarks WHERE scholars='$typecholar' AND remove='$remove' AND user_id='$user_id'";
  // 	$result1 = $conn->query($sql1);
  // 	$row1 = $result1->fetch_assoc();
  // 	if($row1['total']>1){
  // 		 echo $count." ".$user_id."<br>";
  	}


  

    
    
    
    
 

     
?>