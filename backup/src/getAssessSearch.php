<?php session_start();
$studenttype=$_SESSION['studenttype'];
$what = $_POST['filter'];
$search = $_POST['searchshs'];
$order= $_POST['order'];
$limit= $_POST['limit'];




	// if((strlen($search)<=0)&&($what!='ALL')){
	// 	echo '<script language="javascript">';
	// 	// echo 'localStorage.setItem("notif","1")';
		
	//   		echo 'alert("Do not leave search box blank")';
	//   		echo '</script>';
	  		
	// }else{
		$_SESSION['search']=$what;
			$_SESSION['whatsearch']=$search;
			$_SESSION['order']=$order;
			$_SESSION['limit']=$limit;
			$_SESSION['offset']=1;
			$_SESSION['page']=1;
			
	// }

	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
		if($studenttype=="fullscholar"){
	  		echo 'window.open("assess_collegefullscholar.php","_self")';
	  		echo '</script>';
	  	}else if($studenttype=="collegerecipient"){
	  		echo 'window.open("assess_collegerecipient.php","_self")';
	  		echo '</script>';
	  	}else if($studenttype=="shscholar"){
	      echo 'window.open("assess_seniorhigh.php","_self")';
	      echo '</script>';
	    }	

		



?>