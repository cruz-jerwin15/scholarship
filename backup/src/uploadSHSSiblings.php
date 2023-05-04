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
              
              if($count>1){
             
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

                     $sql1 = "SELECT * FROM tbl_siblingsinfo WHERE firstname='".$getData[3]."' AND lastname='".$getData[5]."'";
                          $result1 = $conn->query($sql1);
                          if ($result1->num_rows > 0){

                          }else{
                            $insert = "INSERT INTO tbl_siblingsinfo (user_id,lastname,firstname,middlename,typegrant, relationship)VALUES ('$userid','$getData[5]','$getData[3]','$getData[4]','$getData[6]','$getData[7]')";
                            $conn->query($insert);

                           
                           
                              
                          }


                    

                  
                    }//end
              }
              
               $count=$count+1;
              

          }           
          echo "<script type=\"text/javascript\">
                                            alert(\"CSV File has been successfully Imported.\");
                                            window.location = \"seniorhigh.php\"
                                        </script>";
        fclose($file); 
      }
    }    
 ?>