<?php session_start();
$studenttype=$_SESSION['studenttype'];
$what = $_POST['filter'];
$search = $_POST['searchshs'];
$order= $_POST['order'];
$limit= $_POST['limit'];




		$_SESSION['search']=$what;
			$_SESSION['whatsearch']=$search;
			$_SESSION['order']=$order;
			$_SESSION['limit']=$limit;
			$_SESSION['offset']=1;
			$_SESSION['page']=1;
			
	

	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
		if($studenttype=="fullscholar"){
	  		echo 'window.open("interviewCollegeFullScholar.php","_self")';
	  		echo '</script>';
	  	}else if($studenttype=="collegerecipient"){
	  		echo 'window.open("interviewCollegeRecipient.php","_self")';
	  		echo '</script>';
	  	}else if($studenttype=="shscholar"){
	      echo 'window.open("interviewSHS.php","_self")';
	      echo '</script>';
	    }	

		



?>