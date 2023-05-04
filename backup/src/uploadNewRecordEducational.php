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
              
              if($count>3){
                $sql1="SELECT * from tbl_admin where academic_year='$getData[0]' AND application_no='$getData[1]' ";
                      $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0){
                       $insert= "INSERT INTO tbl_educational_background 
                    (academic_year,
                    application_no,
                    isgraduating,
                    ishonor,
                    how_many_term,
                    name_school_college,
                    school_type_college,
                    school_address_college,
                    year_level_college,
                    honor_college,
                    list_honor_college,
                    name_school_sh,
                    school_type_sh,
                    school_address_sh,
                    year_level_sh,
                    honor_sh,
                    list_honor_sh,
                    name_school_jh,
                    school_type_jh,
                    school_address_jh,
                    year_level_jh,
                    honor_jh,
                    list_honor_jh,
                    name_school_elementary,
                    school_type_elementary,
                    school_address_elementary,
                    year_level_elementary,
                    honor_elementary,
                    list_honor_elementary
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
                    '$getData[10]',
                    '$getData[11]',
                    '$getData[12]',
                    '$getData[13]',
                    '$getData[14]',
                    '$getData[15]',
                    '$getData[16]',
                    '$getData[17]',
                    '$getData[18]',
                    '$getData[19]',
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
        $conn->query($insert);
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