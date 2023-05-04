<?php
session_start();
include 'config.php';
$userid = $_POST['userid'];
$assess = $_POST['assess'];
$grade = $_POST['grade'];
$remarks = $_POST['remarks'];


	$sql = "SELECT * FROM tbl_admin WHERE id='$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$academic_year = $row['academic_year'];
	$application_no=$row['application_no'];
	$typescholar =$row['typescholar'];

	$status1="OPEN";
	$status2="CURRENT";
	$sqla = "SELECT * FROM tbl_renew_year WHERE status='$status1' OR status='$status2'";
	  $resulta = $conn->query($sqla);
	 $rowa = $resulta->fetch_assoc();

	$academic_id = $rowa['id'];

	$sqlb = "SELECT * FROM tbl_grade_submit WHERE academic_id='$academic_id' AND academic_year='$academic_year' AND application_no='$application_no'";
	  $resultb = $conn->query($sqlb);
	 $rowb = $resultb->fetch_assoc();
	  if ($resultb->num_rows <= 0){
	  	 if($assess=="Not For Renewal"){
	  	 	$sql2 = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id' AND
			academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	 if ($result2->num_rows <= 0){

	 	  $insert= "INSERT INTO tbl_renewal
                           (academic_id,
                          academic_year,
                          application_no,
                          typescholar,
                          grades,
                          remarks,
                          status
                          )
                        VALUES (
                          '$academic_id',
                          '$academic_year',
                          '$application_no',
                          '$typescholar',
                          '$grade',
                          '$remarks',
                          '$assess'
                )";
            $conn->query($insert);

            if($assess=="For Renewal"){
            	$renewstats="RENEW";
            	$update = "UPDATE tbl_admin SET status='$renewstats' WHERE academic_year='$academic_year' AND application_no='$application_no'";
				$conn->query($update);
            }


	 }else{

	 }







	echo '<script language="javascript">';
              echo 'alert("Successfully update renewal status")';
              echo '</script>';
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assess_collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assess_seniorhigh.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assess_collegefullscholar.php","_self")';
	}

  		echo '</script>';
	  	 }else{
	  	 	echo '<script language="javascript">';
              echo 'alert("This scholars/recipients has no grades yet.")';
              echo '</script>';
			echo '<script language="javascript">';
				// echo 'localStorage.setItem("notif","1")';
			if($_SESSION['studenttype']=="collegerecipient"){
				echo 'window.open("assess_collegerecipient.php","_self")';
			}else if($_SESSION['studenttype']=="shscholar"){
				echo 'window.open("assess_seniorhigh.php","_self")';
			}else if($_SESSION['studenttype']=="fullscholar"){
				echo 'window.open("assess_collegefullscholar.php","_self")';
			}

		  		echo '</script>';
	  	 }



	  }else{
			$gr = $rowb['grades'];

			if($gr<=0){

				if($assess=="For Renewal"){
					echo '<script language="javascript">';
											echo 'alert("Grade cannot be 0")';
											echo '</script>';
					echo '<script language="javascript">';
				}else{
					$sql2 = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id' AND
							academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar'";
					$result2 = $conn->query($sql2);
					$row2 = $result2->fetch_assoc();
					 if ($result2->num_rows <= 0){
					 	  $insert= "INSERT INTO tbl_renewal
				                           (academic_id,
				                          academic_year,
				                          application_no,
				                          typescholar,
				                          grades,
				                          remarks,
				                          status
				                          )
				                        VALUES (
				                          '$academic_id',
				                          '$academic_year',
				                          '$application_no',
				                          '$typescholar',
				                          '$grade',
				                          '$remarks',
				                          '$assess'
				                )";
				            $conn->query($insert);

				            if($assess=="For Renewal"){
				            	$renewstats="RENEW";
				            	$update = "UPDATE tbl_admin SET status='$renewstats' WHERE academic_year='$academic_year' AND application_no='$application_no'";
								$conn->query($update);
				            }


					 }else{

					 }

					 echo '<script language="javascript">';
				               echo 'alert("Successfully update renewal status")';
				               echo '</script>';
				 	echo '<script language="javascript">';
				}
			}else{
				$sql2 = "SELECT * FROM tbl_renewal WHERE academic_id='$academic_id' AND
						academic_year='$academic_year' AND application_no='$application_no' AND typescholar='$typescholar'";
				$result2 = $conn->query($sql2);
				$row2 = $result2->fetch_assoc();
				 if ($result2->num_rows <= 0){
				 	  $insert= "INSERT INTO tbl_renewal
			                           (academic_id,
			                          academic_year,
			                          application_no,
			                          typescholar,
			                          grades,
			                          remarks,
			                          status
			                          )
			                        VALUES (
			                          '$academic_id',
			                          '$academic_year',
			                          '$application_no',
			                          '$typescholar',
			                          '$grade',
			                          '$remarks',
			                          '$assess'
			                )";
			            $conn->query($insert);

			            if($assess=="For Renewal"){
			            	$renewstats="RENEW";
			            	$update = "UPDATE tbl_admin SET status='$renewstats' WHERE academic_year='$academic_year' AND application_no='$application_no'";
							$conn->query($update);
			            }


				 }else{

				 }

				 echo '<script language="javascript">';
			               echo 'alert("Successfully update renewal status")';
			               echo '</script>';
			 	echo '<script language="javascript">';
			}









		// echo 'localStorage.setItem("notif","1")';
	if($_SESSION['studenttype']=="collegerecipient"){
		echo 'window.open("assess_collegerecipient.php","_self")';
	}else if($_SESSION['studenttype']=="shscholar"){
		echo 'window.open("assess_seniorhigh.php","_self")';
	}else if($_SESSION['studenttype']=="fullscholar"){
		echo 'window.open("assess_collegefullscholar.php","_self")';
	}

  		echo '</script>';
	  }




?>
