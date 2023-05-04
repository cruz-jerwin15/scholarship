<?php session_start();
require 'config.php';
$userid = $_POST['userid'];
$academic_year = $_POST['academic_year'];
$application_no = $_POST['application_no'];

$f_fullname= addslashes($_POST['f_fullname']);
$f_living= $_POST['f_living'];

$grand_ami= $_POST['grand_ami'];

// test

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




	$f_address= addslashes($_POST['f_address']);
$f_contact_number= addslashes($_POST['f_contact_number']);
$f_occupation= addslashes($_POST['f_occupation']);
$f_place_of_work= addslashes($_POST['f_place_of_work']);
$f_hea= $_POST['f_hea'];
$f_ami= $_POST['f_ami'];
$f_age= $_POST['f_age'];
$f_company= addslashes($_POST['f_company']);

	$cf_address=strlen($f_address);
	$cf_contact=strlen($f_contact_number);
	$cf_occupation=strlen($f_occupation);
	$cf_hea=strlen($f_hea);
	$cf_ami=strlen($f_ami);
	$cf_age=strlen($f_age);


	if(($cf_address<=0)||($cf_contact<=0)||($cf_occupation<=0)||($cf_hea<=0)||($cf_ami<=0)||($cf_age<=0)){

		echo '<script language="javascript">';
              echo 'alert("Please answer all required information of your father.")';
              echo '</script>';
	 echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("familyinformation.php","_self")';

      echo '</script>';
	}


if($f_occupation=="Others"){
	$f_corresponding= addslashes($_POST['f_corresponding']);
}else{
	$f_corresponding=addslashes($_POST['f_occupation']);
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


$m_fullname= addslashes($_POST['m_fullname']);
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
	$m_address= addslashes($_POST['m_address']);
	$m_contact_number= addslashes($_POST['m_contact_number']);
	$m_occupation= addslashes($_POST['m_occupation']);
	$m_place_of_work= addslashes($_POST['m_place_of_work']);
	$m_hea= $_POST['m_hea'];
	$m_ami= $_POST['m_ami'];
	$m_age= $_POST['m_age'];
	$m_company= addslashes($_POST['m_company']);

	$cm_address=strlen($m_address);
	$cm_contact=strlen($m_contact_number);
	$cm_occupation=strlen($m_occupation);
	$cm_hea=strlen($m_hea);
	$cm_ami=strlen($m_ami);
	$cm_age=strlen($m_age);


	if(($cm_address<=0)||($cm_contact<=0)||($cm_occupation<=0)||($cm_hea<=0)||($cm_ami<=0)||($cm_age<=0)){

		echo '<script language="javascript">';
              echo 'alert("Please answer all required information of your mother.")';
              echo '</script>';
	 echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("familyinformation.php","_self")';

      echo '</script>';
	}


	if($m_occupation=="Others"){
		$m_corresponding= addslashes($_POST['m_corresponding']);
	}else{
		$m_corresponding=addslashes($_POST['m_occupation']);
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
$hw_corresponding="";
$hw_hea="";
$hw_ami="";
}else{
	$hw_fullname= addslashes($_POST['hw_fullname']);
	$hw_address= addslashes($_POST['hw_address']);
$hw_contact_number= addslashes($_POST['hw_contact_number']);
$hw_occupation= addslashes($_POST['hw_occupation']);
$hw_place_of_work= addslashes($_POST['hw_place_of_work']);
$hw_hea= $_POST['hw_hea'];
$hw_ami= $_POST['hw_ami'];
	if($hw_occupation=="Others"){
		$hw_corresponding= addslashes($_POST['hw_corresponding']);
	}else{
		$hw_corresponding=addslashes($_POST['hw_occupation']);
	}

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
					corresponding,
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
                    '$hw_corresponding',
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
					corresponding='$hw_corresponding',
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
	$g_ami="";
	if($g_occupation=="Others"){
		$g_corresponding="";
	}else{
		$g_corresponding="";
	}
}else{
	$g_fullname=addslashes($_POST['g_fullname']);
	$g_relationship=addslashes($_POST['g_relationship']);
	$g_address=addslashes($_POST['g_address']);
	$g_age=$_POST['g_age'];
	$g_occupation=addslashes($_POST['g_occupation']);
	$g_contactnumber=addslashes($_POST['g_contactnumber']);
	$g_ami=$_POST['g_ami'];

	if($g_occupation=="Others"){
		$g_corresponding= addslashes($_POST['g_corresponding']);
	}else{
		$g_corresponding=addslashes($_POST['g_occupation']);
	}
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
					occupation,
					ami,
					corresponding
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                    '$g_fullname',
                    '$g_relationship',
                    '$g_address',
                    '$g_age',
                    '$g_contactnumber',
                    '$g_occupation',
                    '$g_ami',
                    '$g_corresponding'
                )";
        $conn->query($insert3);
	 }else{
	 	$update3 = "UPDATE tbl_guardianinfo SET
					fullname='$g_fullname',
					relationship='$g_relationship',
					address='$g_address',
					age='$g_age',
					contactnumber ='$g_contactnumber',
					occupation='$g_occupation',
					ami='$g_ami',
					corresponding='$g_corresponding'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update3);
	 }

	 $sql4="SELECT * from tbl_updated where academic_year='$academic_year' AND application_no='$application_no'";
	 $result4 = $conn->query($sql4);
	 if ($result4->num_rows < 1){
	 	 $insert4= "INSERT INTO tbl_updated
                    (academic_year,
                    application_no
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no'
                )";
        $conn->query($insert4);
	 }else{
	 	$stat="YES";
	 	$update4 = "UPDATE tbl_updated SET
					status='$stat'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update4);
	 }


	$sql5="SELECT * from tbl_grandparent where academic_year='$academic_year' AND application_no='$application_no'";
	 $result5 = $conn->query($sql5);
	 if ($result5->num_rows < 1){
	 	 $insert5= "INSERT INTO  tbl_grandparent
                    (academic_year,
                    application_no,
					ami
                    )
                  VALUES (
                    '$academic_year',
                    '$application_no',
                     '$grand_ami')";
        $conn->query($insert5);
	 }else{
	 	$update5 = "UPDATE tbl_grandparent SET
					ami='$grand_ami'
		WHERE academic_year='$academic_year' AND application_no='$application_no'";
		$conn->query($update5);
	 }




echo '<script language="javascript">';
              echo 'alert("Successfully updated family background info")';
              echo '</script>';
	 echo '<script language="javascript">';
    // echo 'localStorage.setItem("notif","1")';

     echo 'window.open("updateNewStudent.php?id=';
		 echo $userid;
		 echo '","_self")';

      echo '</script>';
?>
