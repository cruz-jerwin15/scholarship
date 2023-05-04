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
        
             while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
              {
               
              if($count>=1){
              
                // echo $getData[0]."|".$getData[0]."|".$getData[3]
                 $sql = "SELECT * FROM tbl_admin WHERE username= '".$getData[0]."'";
                $result = $conn->query($sql);
                
                   
                     if ($result->num_rows <= 0){
                        echo $getData[0]."<br>";
                   
                    }else{
                      $row = $result->fetch_assoc();
                      $academic_year= $row['academic_year'];
                      $application_no = $row['application_no'];
                     
                  
                     $sql1 = "SELECT * FROM tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
                          $result1 = $conn->query($sql1);
                          if ($result1->num_rows > 0){
                            $update = "UPDATE tbl_interview_score SET score='$getData[1]' WHERE academic_year='$academic_year' AND application_no='$application_no'";
                            $conn->query($update);
                          }else{
                          $insert1 = "INSERT INTO tbl_interview_score (
                            academic_year,
                            application_no,
                            score)VALUES (
                            '$academic_year',
                            '$application_no',
                            '$getData[1]')";
                            $conn->query($insert1);
                          }
                            
                     


                    

                  
                    }//end
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