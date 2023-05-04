<?php
require_once 'config.php';
require __DIR__ . '/vendor/autoload.php';
use ParseCsv\Csv;
$csv = new Csv();
$count=0;
$last_id=0;

 if(isset($_POST["Import"])){
      
        $filename=$_FILES["file"]["tmp_name"];      


         if($_FILES["file"]["size"] > 0)
         {
      
            $file = fopen($filename, "r");
            //$file = "files/" . $_FILES['file']['tmp_name'];
            $num=0;
             while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
              {
               
              if($count>=0){
              
              $lastname=$getData[0];
              $firstname = $getData[1];
              $year = $getData[2];
              $remarks= "Old record. No remarks";
              // $remarks= "Graduate";

              $sql = "SELECT * FROM tbl_studentinfo WHERE firstname='$firstname' AND lastname='$lastname'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
                if ($result->num_rows > 0){
                 $academic_year = $row['academic_year'];
                 $application_no=$row['application_no'];

               
                  $sql1 = "SELECT * FROM tbl_admin WHERE academic_year='$academic_year' AND application_no='$application_no'";
                  $result1 = $conn->query($sql1);
                  $row1 = $result1->fetch_assoc();
                  $user_id=$row1['id'];
               $num++;
                
               
                  $scholars="fullscholar";
                  $process="SCHOLARS ASSESSMENT";
                  // $process="GRADUATED";

                  $sql2="SELECT * from tbl_renew_year where academic_year='$year'";
                  $result2 = $conn->query($sql2);
                  $row2 = $result2->fetch_assoc();
                  $acads=$row2['id'];
                  echo $num." ".$row['firstname']." ".$row['lastname']." ".$acads." ".$remarks."<br>";
                    // $updates = "UPDATE tbl_remarks SET academic_id='$acads' WHERE user_id='$user_id' AND process='$process' AND scholars='$scholars'";
                    // $conn->query($updates);

                   $insert= "INSERT INTO tbl_remarks 
                     (user_id,
                     academic_id,
                     scholars,
                     process,
                     remarks)
                 VALUES (
                   '$user_id',
                   '$acads',
                   '$scholars',
                   '$process',
                   '$remarks')";
                $conn->query($insert);

                // if($row1['status']=="GRADUATED"){
                //     $updates = "UPDATE tbl_admin SET academic_id='$acads' WHERE id='$user_id'";
                //       $conn->query($updates);
                // }
                  
                }else{
                   $num++;
                  
                  echo $num." ".$firstname." ".$lastname."NONE<br>";
                   
                }
              
              
              }
              
               $count=$count+1;
              

          }           
          // echo "<script type=\"text/javascript\">
          //                                   alert(\"CSV File has been successfully Imported.\");
          //                                   window.location = \"newSHS.php\"
          //                               </script>";
        fclose($file); 
      }
    }    
 ?>