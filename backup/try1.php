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
                $count++;
              if($count>11){
                $sql = "SELECT * FROM tbl_userinfo where FirstName = '".$getData[2]."' AND LastName = '".$getData[1]."' AND MiddleName = '".$getData[3]."'"; 
            $result_found = mysqli_query($conn, $sql);
            $found = mysqli_fetch_assoc($result_found);

           
            if ($found >=1){
              // echo "<script> 
              //      alert('You Are Already Registered');
              //      window.location.href='superadminhomepage.php';
              //      </script>";
            }
            else{
               $sql = "INSERT into tbl_userinfo (FirstName,MiddleName,LastName, contactnumber,approve, EmailAddress, category, Sex) 
                    values ('".$getData[2]."','".$getData[3]."','".$getData[1]."','".$getData[12]."','1','".$getData[13]."','".$getData[14]."','".$getData[7]."')";
                    $result_user = mysqli_query($conn, $sql);
                    $last_id = mysqli_insert_id($conn);

                    echo $last_id;
                    $sql2 = "INSERT INTO tbl_useraddress (user_id,StreetNumber,RoadName,Barangay) 
            VALUES ('$last_id','".$getData[4]."','".$getData[5]."','".$getData[6]."')";

                  $sql3 = "INSERT INTO tbl_school (user_id,SchoolIntended,course) 
             VALUES ('$last_id','".$getData[8]."','".$getData[11]."')";

                $sql4 = "INSERT INTO tbl_grades (user_id,yrLvl) 
             VALUES ('$last_id','".$getData[10]."')";

                $sql5 = "INSERT INTO tbl_parents (user_id)
            VALUES ('$last_id')";


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
                              window.location = \"superadminhomepage.php\"
                            </script>";       
                }
                else {
                        echo "<script type=\"text/javascript\">
                          alert(\"CSV File has been successfully Imported.\");
                          window.location = \"superadminhomepage.php\"
                      </script>";
                }
              }
            }//end
              }

          }           
          $delete ="DELETE from tbl_userinfo where id='$last_id'";
          mysqli_query($conn, $delete);
           $delete1="DELETE from tbl_useraddress where user_id='$last_id'";
          mysqli_query($conn, $delete1);
            $delete2="DELETE from tbl_school where user_id='$last_id'";
          mysqli_query($conn, $delete2);
            $delete3="DELETE from tbl_grades where user_id='$last_id'";
          mysqli_query($conn, $delete3);
            $delete4="DELETE from tbl_parents where user_id='$last_id'";
          mysqli_query($conn, $delete4);
        fclose($file); 
      }
    }    
 ?>