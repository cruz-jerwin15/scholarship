<?php session_start();
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];
$typescholar = $_POST['usertype'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$barangay = $_POST['barangay'];
$mobile = $_POST['mobile'];

date_default_timezone_set("Asia/Manila");
$year =date('Y');
$month=date('m');
$day=date('d');

$dates = $year."-".$month."-".$day;

$sql = "SELECT COUNT(*) as total FROM tbl_academic WHERE status='OPEN'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if($row['total']<=0){ //if 1

    $sql1 = "SELECT * FROM tbl_academic WHERE status='CURRENT'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    echo '<script language="javascript">';
      echo 'alert("Application for school year ';
      echo $row1['academic_year'];
      echo ' is already closed.")';
      echo '</script>';
    echo '<script language="javascript">';
    echo 'window.open("login.php","_self")';
    echo '</script>';
  } //if 1
  else{//else 1
        if($typescholar=="shscholar"){//if 2
          $usertype="shs";
        }//if 2
        else{ //else 2
          $usertype="college";
        }//else 2
        $image="avatar.png";

         $date=date_create($dates,timezone_open("Asia/Manila"));
        $dates = date_format($date,"Y-m-d");
        $password = md5($password);

        $sql="SELECT * from tbl_admin where username='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){//if 3
            $row = $result->fetch_assoc();
           $former = $row['typescholar'];
            if(($row['status']=="REMOVED")||($row['status']=="GRADUATED")){//if 4
                 $sql1="SELECT * from tbl_studentinfo where firstname='$firstname' AND lastname='$lastname' AND middlename='$middlename'";
                 $result1 = $conn->query($sql1);

                  if ($result1->num_rows > 0){//if 5
                     $status="PREAPPLICATION";

                 $status1="OPEN";
                  $status2="CURRENT";
                  $sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
                    $resulta = $conn->query($sqla);   
                   $rowa = $resulta->fetch_assoc();

                  $academic_id = $rowa['id'];
                  $num=0;
                  $update ="UPDATE tbl_admin SET applicant_number='$num',usertype='$usertype',typescholar='$typescholar',status='$status',password='$password',academic_id='$academic_id' WHERE username='$email'";
                  $conn->query($update);


                 



                  $sql2="SELECT * from tbl_admin where username='$email'";
                  $result2 = $conn->query($sql2);
                  $row2 = $result2->fetch_assoc();
                  $academic_year=$row2['academic_year'];
                  $application_no=$row2['application_no'];
                  $userid= $row2['id'];


                   $deletea = "DELETE FROM tbl_remarks WHERE user_id='$userid' AND academic_id='$academic_id'";
                  $conn->query($deletea);

                  $delete = "DELETE FROM tbl_college_requirements WHERE user_id='$userid'";
                  $conn->query($delete);

                  $delete1 = "DELETE FROM tbl_college_requirements_label WHERE user_id='$userid'";
                  $conn->query($delete1);

                   $delete2 = "DELETE FROM tbl_interview_score WHERE academic_year='$academic_year' AND application_no='$application_no'";
                  $conn->query($delete2);
 
                  $update1 ="UPDATE tbl_studentinfo SET number_try=number_try+1 WHERE academic_year='$academic_year' AND application_no='$application_no'";
                  $conn->query($update1);

                  $sqlz="SELECT * from tbl_former WHERE academic_year='$academic_year' AND application_no='$application_no'";
                  $resultz = $conn->query($sqlz);
                  $rowz = $resultz->fetch_assoc();
                   if ($resultz->num_rows > 0){
                      if($former=="fullscholar"){
                       $update2 ="UPDATE tbl_former SET fullscholar='YES' WHERE academic_year='$academic_year' AND application_no='$application_no'";
                        $conn->query($update2);
                      }else if($former=="collegerecipient"){
                         $update2 ="UPDATE tbl_former SET collegerecipient='YES' WHERE academic_year='$academic_year' AND application_no='$application_no'";
                        $conn->query($update2);
                      }else{
                          $update2 ="UPDATE tbl_former SET shscholar='YES' WHERE academic_year='$academic_year' AND application_no='$application_no'";
                        $conn->query($update2);
                      }
                   }else{
                    $full="NO";
                    $col="NO";
                    $shs="NO";

                     if($former=="fullscholar"){
                        $full="YES";
                      }else if($former=="collegerecipient"){
                        $col="YES";
                      }else{
                         $shs="YES";
                      }


                        $insert1= "INSERT INTO tbl_former
                        (academic_year,
                        application_no,
                        fullscholar,
                        collegerecipient,
                        shscholar
                       )
                      VALUES (
                        '$academic_year',
                        '$application_no',
                        '$full',
                        '$col',
                        '$shs'
                         )";
                        $conn->query($insert1);
                   }


                  
              

                  $sql3="SELECT * from tbl_studentinfo where academic_year='$academic_year' AND application_no='$application_no'";
                  $result3 = $conn->query($sql3);
                  $row3 = $result3->fetch_assoc();

                    $_SESSION['username']=$row2['username'];
                    $_SESSION['firstname']=$row3['firstname'];
                    $_SESSION['lastname']=$row3['lastname'];
                    $_SESSION['image']=$row2['image'];
                    $_SESSION['usertype']=$row2['usertype'];
                    $_SESSION['studenttype']=$row2['typescholar'];
                     $_SESSION['newid']=$row2['id'];
                    $_SESSION['student']="OK";
                   

                   echo '<script language="javascript">';
                            echo 'alert("Your information already exist. Kindly update your information. Click OK to continue.")';
                            echo '</script>';
                  echo '<script language="javascript">';
                    echo 'window.open("updatestudent.php","_self")';
                    echo '</script>';
                  }//if 5
                  else{ //else 4
                      echo '<script language="javascript">';
                            echo 'alert("Email already in use.")';
                            echo '</script>';
                  echo '<script language="javascript">';
                    echo 'window.open("index.php","_self")';
                    echo '</script>';
                  }//else 4
            }//if 4
            else{//else 5
                  if(($row['status']=="NEWAPPLICANT")||($row['status']=="INTERVIEW")||($row['status']=="ASSESSMENT")||($row['status']=="PREAPPLICATION")){
                    echo '<script language="javascript">';
                                echo 'alert("You already have an application. Please contact Youth Development staff on how to process your applications")';
                                echo '</script>';
                      echo '<script language="javascript">';
                        echo 'window.open("index.php","_self")';
                        echo '</script>';
               }else if(($row['status']=="ASSESS")||($row['status']=="OK")||($row['status']=="RENEW")){
                    echo '<script language="javascript">';
                                echo 'alert("You are already a scholars/recipients.")';
                                echo '</script>';
                      echo '<script language="javascript">';
                        echo 'window.open("index.php","_self")';
                        echo '</script>';
               }else if(($row['status']=="BLOCK")){

                    echo '<script language="javascript">';
                                echo 'alert("You are in the listed block. Please contact Youth Development staff on how to process your applications.")';
                                echo '</script>';
                      echo '<script language="javascript">';
                        echo 'window.open("index.php","_self")';
                        echo '</script>';
               }
            }//else 5

        }// if 3
        else{ // else 6
            $sql1="SELECT * from tbl_studentinfo where firstname='$firstname' AND lastname='$lastname'  AND middlename='$middlename'";
            $result1 = $conn->query($sql1);
               if ($result1->num_rows > 0){// if 7
                 echo '<script language="javascript">';
                            echo 'alert("You already have information in the system. If you have previous application, please use the same email address. If you forgot the previous email address, please contact Youth Development Staff on how to process your application.")';
                            echo '</script>';
                  echo '<script language="javascript">';
                    echo 'window.open("index.php","_self")';
                    echo '</script>';
               }//if 7
               else{// else 7
                  $status1="OPEN";
                  $status2="CURRENT";
                  $sqla = "SELECT * FROM tbl_academic WHERE status='$status1' OR status='$status2'";
                  $resulta = $conn->query($sqla);   
                  $rowa = $resulta->fetch_assoc();

                  $academic_id = $rowa['id'];

               
                  $academic_years=$rowa['academic_year'];
                  $status3="PREAPPLICATION";
                    $application_no=0;
                    $applicant_number=0;
                    $sql5="SELECT MAX(application_no) as maxnumber from tbl_admin WHERE academic_year='$academic_years'";
                    $result5 = $conn->query($sql5);
                      if ($result5->num_rows > 0){
                        $row5 = $result5->fetch_assoc();
                        $application_no=$row5['maxnumber']+1;
                      }else{
                        $application_no=1;
                      }

                        $insert= "INSERT INTO tbl_admin 
                            (academic_year,
                             academic_id,
                            application_no,
                            applicant_number,
                            username,
                            usertype,
                            password,
                            image,
                            dates,
                            typescholar,
                            status)
                          VALUES (
                            '$academic_years',
                            '$academic_id',
                            '$application_no',
                            '$applicant_number',
                            '$email',
                            '$usertype',
                            '$password',
                            '$image',
                            '$dates',
                            '$typescholar',
                            '$status3')";

                          
                     $conn->query($insert);  
                        $insert1= "INSERT INTO tbl_studentinfo 
                        (academic_year,
                        application_no,
                        firstname,
                        middlename,
                        lastname,
                        barangay,
                        phone
                       )
                      VALUES (
                        '$academic_years',
                        '$application_no',
                        '$firstname',
                        '$middlename',
                        '$lastname',
                        '$barangay',
                        '$mobile'
                         )";
                        $conn->query($insert1);
                            echo '<script language="javascript">';
                            echo 'alert("Successfully submit your partial information. Please login to complete.")';
                            echo '</script>';
                  echo '<script language="javascript">';
                    echo 'window.open("login.php","_self")';
                    echo '</script>';
               }//else 7
        }//else 6

  } //else 1

?>