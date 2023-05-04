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
              
              if($count>2){
                 $sql1="SELECT * from tbl_admin where academic_year='$getData[0]' AND application_no='$getData[1]' ";
                      $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0){
                     $insert= "INSERT INTO tbl_siblingsinfo 
                    (academic_year,
                    application_no,
                    fullname,
                    age,
                    civil,
                    hea,
                    typegrant,
                    occupation,
                    monthly_salary
                    )
                  VALUES (
                    '$getData[0]',
                    '$getData[1]',
                    '$getData[2]',
                    '$getData[3]',
                    '$getData[4]',
                    '$getData[5]',
                    '$getData[6]',
                    '$getData[7]',
                    '$getData[8]'
                   
                )";
                $conn->query($insert);
                  }
                
              }
              
               $count=$count+1;
              

          }           
          echo "<script type=\"text/javascript\">
                                            alert(\"CSV File has been successfully Imported.\");
                                            window.location = \"newRecord.php\"
                                        </script>";
        fclose($file); 
      }
    }    
 ?>