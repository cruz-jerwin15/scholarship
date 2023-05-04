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
             
                // echo $getData[0]."|".$getData[0]."|".$getData[3]
                         $sql = "SELECT * FROM tbl_studentinfo where firstname = '".$getData[0]."' AND lastname = '".$getData[2]."' AND middlename = '".$getData[1]."'"; 
                    $result_found = mysqli_query($conn, $sql);
                    $found = mysqli_fetch_assoc($result_found);


                   
                    if ($found <=0){
                      // echo "<script> 
                      //      alert('You Are Already Registered');
                      //      window.location.href='superadminhomepage.php';
                      //      </script>";
                   
                    }
                    else{
                 
                     $sql = "SELECT * FROM tbl_studentinfo where firstname = '".$getData[0]."' AND lastname = '".$getData[2]."' AND middlename = '".$getData[1]."'";
                          $result = $conn->query($sql);
                          $row = $result->fetch_assoc();
                     $userid = $row['user_id'];

                  $sql1 = "SELECT * FROM tbl_guardianinfo WHERE user_id='$userid'";
                          $result1 = $conn->query($sql1);
                          if ($result1->num_rows > 0){

                          }else{
                              $insert = "INSERT INTO tbl_fatherinfo (user_id,firstname,middlename,lastname,occupation)VALUES ('$userid','$getData[3]','$getData[4]','$getData[5]','$getData[6]')";

                      $insert1 = "INSERT INTO tbl_motherinfo (user_id,firstname,middlename,lastname,occupation)VALUES ('$userid','$getData[7]','$getData[8]','$getData[9]','$getData[10]')";

                      $insert2 = "INSERT INTO tbl_parentinfo (user_id,gross,numberfamily,siblings,girls,boy,housenumber,street,barangay)VALUES ('$userid','$getData[11]','$getData[12]','$getData[13]','$getData[15]','$getData[14]','$getData[16]','$getData[17]','$getData[18]')";

                       $insert3 = "INSERT INTO tbl_guardianinfo (user_id,firstname,middlename,lastname,occupation,phonenumber,relationship,housenumber,street,barangay)VALUES ('$userid','$getData[19]','$getData[20]','$getData[21]','$getData[22]','$getData[23]','$getData[24]','$getData[25]','$getData[26]','$getData[27]')";
                    $conn->query($insert);
                      $conn->query($insert1);
                       $conn->query($insert2);
                       $conn->query($insert3);
                          }
                  
                   

                  
                    }//end
              }
              
               $count=$count+1;
              

          }           
            echo "<script type=\"text/javascript\">
                                  alert(\"CSV File has been successfully Imported.\");
                                  window.location = \"newCollegeFullScholar.php\"
                              </script>";
        fclose($file); 
      }
    }    
 ?>