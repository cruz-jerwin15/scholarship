<?php session_start();
require 'config.php';

$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];

$f_fullname= $_POST['f_fullname'];
$f_living= $_POST['f_living'];

if($f_living=="DECEASED"){
$f_address="";
$f_contact_number="";
$f_occupation="";
$f_place_of_work="";
$f_hea="";
$f_ami="";
$f_age="";
$f_company="";
if($f_occupation=="Others"){
	$f_corresponding= "";
}else{
	$f_corresponding="";
}

}else{
	$f_address= $_POST['f_address'];
$f_contact_number= $_POST['f_contact_number'];
$f_occupation= $_POST['f_occupation'];
$f_place_of_work= $_POST['f_place_of_work'];
$f_hea= $_POST['f_hea'];
$f_ami= $_POST['f_ami'];
$f_age= $_POST['f_age'];
$f_company= $_POST['f_company'];
if($f_occupation=="Others"){
	$f_corresponding= $_POST['f_corresponding'];
}else{
	$f_corresponding=$_POST['f_occupation'];
}

}








	 $sql="SELECT * from tbl_fatherinfo where academic_year='$academic_year' AND application_no='$application_no'";
	 $result = $conn->query($sql);
	 if ($result->num_rows < 1){
	 	 $insert= "INSERT INTO tbl_fatherinfo 
                    (academic_year,
                    application_no,
                    fullname,
					living,
					address,
					age,
					contact_number,
					occupation,
					companyname,
					corresponding,
					place_of_work,
					hea,
					ami
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$f_fullname',
                    '$f_living',
                    '$f_address',
                    '$f_age',
                    '$f_contact_number',
                    '$f_occupation',
                    '$f_company',
                    '$f_corresponding',
                    '$f_place_of_work',
                    '$f_hea',
                    '$f_ami'
                   
                )";
        $conn->query($insert);

        // if(){
        	
        // }


	 }else{
	 	$update = "UPDATE tbl_fatherinfo SET 
					fullname='$f_fullname',
					living='$f_living',
					address='$f_address',
					age='$f_age',
					contact_number='$f_contact_number',
					occupation='$f_occupation',
					companyname='$f_company',
					corresponding='$f_corresponding',
					place_of_work='$f_place_of_work',
					hea='$f_hea',
					ami='$f_ami'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update);
	 }


$m_fullname= $_POST['m_fullname'];
$m_living= $_POST['m_living'];
if($m_living=="DECEASED"){
	$m_address="";
	$m_contact_number="";
	$m_occupation="";
	$m_place_of_work="";
	$m_hea="";
	$m_ami="";
	$m_age="";
	$m_company="";
	if($m_occupation=="Others"){
		$m_corresponding="";
	}else{
		$m_corresponding="";
	}
}else{
	$m_address= $_POST['m_address'];
	$m_contact_number= $_POST['m_contact_number'];
	$m_occupation= $_POST['m_occupation'];
	$m_place_of_work= $_POST['m_place_of_work'];
	$m_hea= $_POST['m_hea'];
	$m_ami= $_POST['m_ami'];
	$m_age= $_POST['m_age'];
	$m_company= $_POST['m_company'];
	if($m_occupation=="Others"){
		$m_corresponding= $_POST['m_corresponding'];
	}else{
		$m_corresponding=$_POST['m_occupation'];
	}
}




 	$sql1="SELECT * from tbl_motherinfo where academic_year='$academic_year' AND application_no='$application_no'";
	 $result1 = $conn->query($sql1);
	 if ($result1->num_rows < 1){
	 	 $insert1= "INSERT INTO tbl_motherinfo 
                    (academic_year,
                    application_no,
                    fullname,
					living,
					address,
					age,
					contact_number,
					occupation,
					companyname,
					corresponding,
					place_of_work,
					hea,
					ami
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$m_fullname',
                    '$m_living',
                    '$m_address',
                    '$m_age',
                    '$m_contact_number',
                    '$m_occupation',
                    '$m_company',
                    '$m_corresponding',
                    '$m_place_of_work',
                    '$m_hea',
                    '$m_ami'
                   
                )";
        $conn->query($insert1);
	 }else{
	 	$update1 = "UPDATE tbl_motherinfo SET 
					fullname='$m_fullname',
					living='$m_living',
					address='$m_address',
					age='$m_age',
					contact_number='$m_contact_number',
					occupation='$m_occupation',
					companyname='$m_company',
					corresponding='$m_corresponding',
					place_of_work='$m_place_of_work',
					hea='$m_hea',
					ami='$m_ami'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update1);
	 }


$hw_living= $_POST['hw_living'];
if(($hw_living=="DECEASED")||($hw_living=="N/A")){
	$hw_fullname= "";
	$hw_address="";
$hw_contact_number="";
$hw_occupation="";
$hw_place_of_work="";
$hw_hea="";
$hw_ami="";
}else{
	$hw_fullname= $_POST['hw_fullname'];
	$hw_address= $_POST['hw_address'];
$hw_contact_number= $_POST['hw_contact_number'];
$hw_occupation= $_POST['hw_occupation'];
$hw_place_of_work= $_POST['hw_place_of_work'];
$hw_hea= $_POST['hw_hea'];
$hw_ami= $_POST['hw_ami'];
}



	$sql2="SELECT * from tbl_husbandwifeinfo where academic_year='$academic_year' AND application_no='$application_no'";
	 $result2 = $conn->query($sql2);
	 if ($result2->num_rows < 1){
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
                    '$academic_year',
                    '$application_no',
                    '$hw_fullname',
                    '$hw_living',
                    '$hw_address',
                    '$hw_contact_number',
                    '$hw_occupation',
                    '$hw_place_of_work',
                    '$hw_hea',
                    '$hw_ami'
                   
                )";
        $conn->query($insert2);
	 }else{
	 	$update2 = "UPDATE tbl_husbandwifeinfo SET 
					fullname='$hw_fullname',
					living='$hw_living',
					address='$hw_address',
					contact_number='$hw_contact_number',
					occupation='$hw_occupation',
					place_of_work='$hw_place_of_work',
					hea='$hw_hea',
					ami='$hw_ami'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update2);
	 }
$g_living = $_POST['g_living'];
if($g_living=="YES"){
	$g_fullname="";
	$g_relationship="";
	$g_address="";
	$g_age="";
	$g_occupation="";
	$g_contactnumber="";
}else{
	$g_fullname=$_POST['g_fullname'];
	$g_relationship=$_POST['g_relationship'];
	$g_address=$_POST['g_address'];
	$g_age=$_POST['g_age'];
	$g_occupation=$_POST['g_occupation'];
	$g_contactnumber=$_POST['g_contactnumber'];
}

	$sql3="SELECT * from tbl_guardianinfo where academic_year='$academic_year' AND application_no='$application_no'";
	 $result3 = $conn->query($sql3);
	 if ($result3->num_rows < 1){
	 	 $insert3= "INSERT INTO tbl_guardianinfo
                    (academic_year,
                    application_no,
                    fullname,
					relationship,
					address,
					age,
					contactnumber,
					occupation
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$g_fullname',
                    '$g_relationship',
                    '$g_address',
                    '$g_age',
                    '$g_contactnumber',
                    '$g_occupation'
                )";
        $conn->query($insert3);
	 }else{
	 	$update3 = "UPDATE tbl_guardianinfo SET 
					fullname='$g_fullname',
					relationship='$g_relationship',
					address='$g_address',
					age='$g_age',
					contactnumber ='$g_contactnumber',
					occupation='$g_occupation'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update3);
	 }
$_SESSION['step3']=1;
echo '<script language="javascript">';
              echo 'alert("Successfully updated family background info")';
              echo '</script>';
	echo '<script language="javascript">';
	echo 'window.open("studentregister.php","_self")';



		// echo 'localStorage.setItem("notif","1")';
	// if($_SESSION['studenttype']=="fullscholar"){
	// 	echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
	// }else if($_SESSION['studenttype']=="collegerecipient"){
	// 	echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
	// }else if($_SESSION['studenttype']=="shscholar"){
	// 	echo 'window.open("updateNewStudent.php?id='.$userid.'","_self")';
	// }
  		
  		echo '</script>';
?>