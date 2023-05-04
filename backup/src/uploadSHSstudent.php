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
                         $sql = "SELECT * FROM tbl_studentinfo where firstname = '".$getData[1]."' AND lastname = '".$getData[3]."' AND middlename = '".$getData[2]."'"; 
                    $result_found = mysqli_query($conn, $sql);
                    $found = mysqli_fetch_assoc($result_found);


                   
                    if ($found >=1){
                      // echo "<script> 
                      //      alert('You Are Already Registered');
                      //      window.location.href='superadminhomepage.php';
                      //      </script>";
                    }
                    else{
                    $status="PASS";
                     $usertype="shs";
                     $password=md5("1234567");
                     $image ="avatar.png";
                     $year =date('Y');
                      $month=date('m');
                      $day=date('d');

                      $dates = $year."-".$month."-".$day;

                      $date=date_create($dates,timezone_open("Asia/Manila"));
                      $dates = date_format($date,"Y-m-d");
                     $insert1 = "INSERT INTO tbl_admin (username,usertype,password,lastname,firstname,image,dates,status)VALUES ('$getData[0]','$usertype','$password','$getData[3]','$getData[1]','$image','$dates','$status')";
                    $conn->query($insert1);

                     $last_id = $conn->insert_id;

                    $insert = "INSERT INTO tbl_studentinfo (user_id,firstname,lastname,middlename,gender,bday,birthplace,birthorder,citizenship,religion,housenumber,street,barangay,facebook,phone)VALUES ('$last_id','$getData[1]','$getData[3]','$getData[2]','$getData[4]','$getData[5]','$getData[6]','$getData[7]','$getData[8]','$getData[9]','$getData[10]','$getData[11]','$getData[12]','$getData[14]','$getData[13]')";
                    $conn->query($insert);
		}
                   
              }// end of if
              
               $count=$count+1;
              

          } // end of while   
           echo "<script type=\"text/javascript\">
                                  alert(\"CSV File has been successfully Imported.\");
                                  window.location = \"newSHS.php\"
                              </script>";
             
        
        fclose($file); 
      }// end of file size
    }  //end of if  
 ?>