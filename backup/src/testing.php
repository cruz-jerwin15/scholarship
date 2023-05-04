<?php session_start();
require 'config.php';

        $gradelevel="GRADE 11";
        $count=0; 
     $sql = "SELECT * FROM tbl_studentinfo WHERE gradelevel='$gradelevel'";
        $result = $conn->query($sql); 
         if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $academic_year=$row['academic_year'];
                $application_no=$row['application_no'];
                $status="";
                $sqla = "SELECT * FROM tbl_admin where academic_year='$academic_year' AND application_no='$application_no' AND status='$status'";
                $resulta = $conn->query($sqla);
                if ($resulta->num_rows > 0){
                    $count++;
                    $rowa = $resulta->fetch_assoc();
                    echo $count.". ".$row['firstname']." ".$row['lastname']."<br>";
                }

            }
        }


     // $sqla = "SELECT * FROM tbl_import ORDER BY id";
     // $resulta = $conn->query($sqla);
     // $count=0;   
     // while($rowa = $resulta->fetch_assoc()){
     //    $count++;
     //    $firstname = $rowa['firstname'];
     //    $lastname = $rowa['lastname'];
     //    $sql = "SELECT * FROM tbl_studentinfo WHERE firstname='$firstname' AND lastname='$lastname'";
     //    $result = $conn->query($sql); 
     //     if ($result->num_rows > 0){
            
     //        // $row = $result->fetch_assoc();
     //        // echo $count.". ".$row['firstname']." ".$row['lastname']."<br>";
            
     //    }else{

     //        echo $count.". ".$firstname." ".$lastname."<br>";
     //    }
     // }
    // for($a=1;$a<=1960;$a++){
    //   $sqla = "SELECT * FROM tbl_import WHERE id='$a'";
    //   $resulta = $conn->query($sqla);   
    //   $rowa = $resulta->fetch_assoc();
    //    if ($resulta->num_rows <= 0){
    //         $firstname = $rowa['firstname'];
    //         $lastname = $rowa['lastname'];
    //         $sql = "SELECT * FROM tbl_studentinfo WHERE firstname='$firstname' AND lastname='$lastname'";
    //         $result = $conn->query($sql);   
            
    //         if ($result->num_rows > 0){
    //             $count
    //             while($row = $result->fetch_assoc()){

    //             }
    //         }
    //    }
    // }

//     537 537  DELEA  CHERRYLEN 
//     712 GEVAÃ±A SHAYNE NICOL
// 713 GEVAÑA  DANIELA DENISE 
    // 715 Gevaña  Shelley Louise 
// 713
// 715
// 936 936  LOTERIÑA    THEO DOMINIC 
// 1195 1195    MARIÑAS ERIKA Z.
// 1381 1381    Obaña   Joyce  
// 1423 1423    PABUA   NIÑA ANGEL
// 1473 1473    Pecaña  Rhiza Mae 
// 1482  1482   PEÑAVERDE   ERIKA MAE 
// 1826 1826    Torres  Mary Joice Niña 
    
    // $sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
    //   $resulta = $conn->query($sqla);   
    //  $rowa = $resulta->fetch_assoc();
    //  $academic_id=$rowa['id'];
    //  $count=0;
    //  $sql = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id' ORDER BY application_no";
    //  $result = $conn->query($sql);   
    //  while($row = $result->fetch_assoc()){
      
    //     $application_no=$row['application_no'];
    //     $academic_year=$row['academic_year'];
    //     $sql1 = "SELECT COUNT(*) as total FROM tbl_renewal WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no' ORDER BY application_no";
    //     $result1 = $conn->query($sql1);
    //     $row1 = $result1->fetch_assoc();
    //     if($row1['total']>1){
    //         $count++;
    //         echo $count.". ".$row['academic_year']."/".$row['application_no']."<br>";
    //     }
        
    //  }
     


  	


?>