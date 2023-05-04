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
                     $insert= "INSERT INTO tbl_fatherinfo 
                    (academic_year,
                    application_no,
                    fullname,
                    living,
                    address,
                    contact_number,
                    occupation,
                    corresponding,
                    place_of_work,
                    hea,
                    ami
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
                    '$getData[8]',
                    '$getData[9]',
                    '$getData[10]'
                   
                )";
                $conn->query($insert);
                 $insert1= "INSERT INTO tbl_motherinfo 
                    (academic_year,
                    application_no,
                    fullname,
                    living,
                    address,
                    contact_number,
                    occupation,
                    corresponding,
                    place_of_work,
                    hea,
                    ami
                    )
                  VALUES (
                    '$getData[0]',
                    '$getData[1]',
                    '$getData[11]',
                    '$getData[12]',
                    '$getData[13]',
                    '$getData[14]',
                    '$getData[15]',
                    '$getData[16]',
                    '$getData[17]',
                    '$getData[18]',
                    '$getData[19]'
                   
                )";
                $conn->query($insert1);
                 $insert2= "INSERT INTO tbl_husbandwifeinfo
                    (academic_year,
                    application_no,
                    fullname,
                    living,
                    address,
                    contact_number,
                    occupation,
                    place_of_work,
                    hea,
                    ami
                    )
                  VALUES (
                    '$getData[0]',
                    '$getData[1]',
                    '$getData[20]',
                    '$getData[21]',
                    '$getData[22]',
                    '$getData[23]',
                    '$getData[24]',
                    '$getData[25]',
                    '$getData[26]',
                    '$getData[27]',
                    '$getData[28]'
                   
                )";
              $conn->query($insert2);

              $insert3= "INSERT INTO tbl_guardianinfo
                    (academic_year,
                    application_no,
                    fullname,
                    relationship,
                    address,
                    age,
                    occupation
                    )
                  VALUES (
                    '$getData[0]',
                    '$getData[1]',
                    '$getData[29]',
                    '$getData[30]',
                    '$getData[31]',
                    '$getData[32]',
                    '$getData[33]'
                )";
        $conn->query($insert3);
              }else{

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