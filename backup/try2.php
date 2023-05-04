<?php
require_once 'config.php';
require __DIR__ . '/vendor/autoload.php';
use ParseCsv\Csv;
$csv = new Csv();

 if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];      


         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            //$file = "files/" . $_FILES['file']['tmp_name'];
             while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
              {
            $sql = "SELECT * FROM tbl_userinfo where FirstName = '".$getData[0]."' AND LastName = '".$getData[2]."' AND MiddleName = '".$getData[1]."'"; 
            $result_found = mysqli_query($conn, $sql);
            $found = mysqli_fetch_assoc($result_found);

            if ($found >=1){
              echo "<script> 
                   alert('You Are Already Registered');
                   window.location.href='normaladmin.php';
                   </script>";
            }
            else{
               $sql = "INSERT into tbl_userinfo (FirstName,MiddleName,LastName, contactnumber, EmailAddress, remarks, approve, category, Sex) 
                    values ('".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[14]."','".$getData[13]."','".$getData[29]."', '1','".$getData[8]."','".$getData[4]."')";
                    $result_user = mysqli_query($conn, $sql);
                    $last_id = mysqli_insert_id($conn);

                    $sql2 = "INSERT INTO tbl_useraddress (user_id,Barangay) 
            VALUES ('$last_id','".$getData[5]."')";

                  $sql3 = "INSERT INTO tbl_school (user_id,SchoolIntended,LastSchoolAttended, GWA,Course,SchoolYear) 
             VALUES ('$last_id','".$getData[7]."','".$getData[6]."','".$getData[15]."','".$getData[11]."','".$getData[9]."')";

                $sql4 = "INSERT INTO tbl_grades (user_id,yrLvl,semester) 
             VALUES ('$last_id','".$getData[10]."','".$getData[12]."')";

                $sql5 = "INSERT INTO tbl_parents (user_id,FatherFirstName,FatherMiddleName,FatherLastName,MotherFirstName,MotherMiddleName,MotherLastName,TotalMembers,Siblings,Income, FatherOccupation, MotherOccupation)
            VALUES ('$last_id','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[23]."','".$getData[24]."','".$getData[25]."','".$getData[18]."','".$getData[17]."','".$getData[27]."','".$getData[22]."','".$getData[26]."')";


            $result_useraddress = mysqli_query($conn, $sql2);
          
            $result_school = mysqli_query($conn, $sql3);

            $result_grades = mysqli_query($conn, $sql4);

            $result_parents = mysqli_query($conn, $sql5);

            $sql_result = $result_user && $result_useraddress && $result_school && $result_grades && $result_parents;
              if($sql_result){
                if(!isset($sql_result))
                {
                      echo "<script type=\"text/javascript\">
                              alert(\"Invalid File:Please Upload CSV File.\");
                              window.location = \"normaladmin.php\"
                            </script>";       
                }
                else {
                        echo "<script type=\"text/javascript\">
                          alert(\"CSV File has been successfully Imported.\");
                          window.location = \"normaladmin.php\"
                      </script>";
                }
              }
            }
          }           
        fclose($file); 
      }
    }    
 ?>