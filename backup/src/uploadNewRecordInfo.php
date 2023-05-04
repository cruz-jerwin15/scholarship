<?php
require_once 'config.php';
require 'referralcode.php';
require __DIR__ . '/vendor/autoload.php';
use ParseCsv\Csv;
$csv = new Csv();
$count=0;
$last_id=0;

$image="avatar.png";

 $year =date('Y');
  $month=date('m');
  $day=date('d');

  $dates = $year."-".$month."-".$day;
  $date=date_create($dates,timezone_open("Asia/Manila"));
  $dates = date_format($date,"Y-m-d");
 if(isset($_POST["Import"])){
       
        $filename=$_FILES["file"]["tmp_name"];      


         if($_FILES["file"]["size"] > 0)
         {
         
            $file = fopen($filename, "r");
            //$file = "files/" . $_FILES['file']['tmp_name'];
        
             while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
              {
             
              if($count>2){
                $refcode = getReferral();
                $mypassword=$refcode;
                $password = md5($mypassword);
                  $sql="SELECT * from tbl_admin where username='$getData[0]'";
                  $result = $conn->query($sql);
                  if ($result->num_rows < 1){
                   
                     $sql1="SELECT * from tbl_admin where academic_year='$getData[1]' AND application_no='$getData[2]' ";
                      $result1 = $conn->query($sql1);
                      if ($result1->num_rows < 1){
                          $sql2="SELECT * from tbl_studentinfo where lastname='$getData[5]' AND middlename='$getData[4]' AND firstname='$getData[3]'";
                          $result2 = $conn->query($sql2);
                          if ($result2->num_rows < 1){

                               $insert= "INSERT INTO tbl_admin 
                                        (academic_year,
                                        application_no,
                                        username,
                                        usertype,
                                        password,
                                        image,
                                        dates,
                                        typescholar,
                                        status)
                                      VALUES (
                                        '$getData[1]',
                                        '$getData[2]',
                                        '$getData[0]',
                                        '$getData[6]',
                                        '$password',
                                        '$image',
                                        '$dates',
                                        '$getData[7]',
                                        '$getData[34]')";
                            $conn->query($insert);



                             $insert1= "INSERT INTO tbl_studentinfo 
                                      (academic_year,
                                      application_no,
                                      firstname,
                                      middlename,
                                      lastname,
                                      gender,
                                      bday,
                                      birthplace,
                                      birthorder,
                                      civil,
                                      citizenship,
                                      religion,
                                      housenumber,
                                      street,
                                      barangay,
                                      years_residency,
                                      school,
                                      schooltype,
                                      school_address,
                                      course,
                                      last_school,
                                      last_school_address,
                                      gradelevel,
                                      gwa,
                                      exam_rating,
                                      living_with_family,
                                      total_family_member,
                                      source_of_living,
                                      type_house,
                                      monthly_rent,
                                      phone
                                     )
                                    VALUES (
                                      '$getData[1]',
                                      '$getData[2]',
                                      '$getData[3]',
                                      '$getData[4]',
                                      '$getData[5]',
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
                                      '$getData[24]',
                                      '$getData[25]',
                                      '$getData[23]',
                                      '$getData[26]',
                                      '$getData[27]',
                                      '$getData[28]',
                                      '$getData[29]',
                                      '$getData[30]',
                                      '$getData[31]',
                                      '$getData[32]',
                                      '$getData[33]'
                                      
                                       )";
                           $conn->query($insert1);

                           


                           

                            $to = $getData[0];
                         $subject = "Sign-in Credentials";
                         
                         $message = "Hi ".$getData[3]." ".$getData[5].", 

<br><br>Welcome to Assessment Online thru YDO Website City of Sto. Tomas, Batangas!<br><br>

You may now view and update your general personal information and submit your requirements online.<br><br>

To activate your account, here is your password ".$mypassword.". 
Please keep this and don't forget this password. You can use this everytime you will log in to the system.<br><br>

Click this link www.cityofstotomas.gov.ph/scholarship to Log-in and use this email address and the password above. <br><br>

For other concerns or queries you may contact us at 09276757935/ (043) 405-9942 or message us at Sto. Tomas Scholarship Program Official Facebook Page.

<br><br><br>Thank you and keep safe!

<br><br>From: 
<br>YDO";
                        
                         
                         $header = "From:youthdevelopment@cityofstotomas.gov.ph \r\n";
                         $header .= "MIME-Version: 1.0\r\n";
                         $header .= "Content-type: text/html\r\n";
                         
                         // $retval = mail ($to,$subject,$message,$header);


                          }else{
                            // $row2 = $result2->fetch_assoc();
                            // echo $row2['application_no']." ".$getData[1].' '.$getData[2].' '.$getData[3].' '.$getData[4].' '.$getData[5].' <br>';
                         
                             echo $row2['application_no']." ".$getData[1].' '.$getData[2].' '.$getData[3].' '.$getData[4].' '.$getData[5].' <br>';
                          }
                      }else{
                        echo $getData[1].' '.$getData[2].' '.$getData[3].' '.$getData[4].' '.$getData[5].' <br>';
                      }
                  }else{
                    echo $getData[1].' '.$getData[2].' '.$getData[3].' '.$getData[4].' '.$getData[5].' <br>';
                  }
                 
                  
                   
              
              
              
              

          }else{
            echo $getData[1].' '.$getData[2].' '.$getData[3].' '.$getData[4].' '.$getData[5].' <br>';
          }    
           $count=$count+1;
          
      }
           // echo "<script type=\"text/javascript\">
           //                        alert(\"CSV File has been successfully Imported.\");
           //                        window.location = \"newRecord.php\"
           //                    </script>";
             
        
        fclose($file); 
      
    }   
  } 
 ?>