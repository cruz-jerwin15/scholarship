<?php session_start();
$what = $_POST['filter'];
$search = $_POST['searchshs'];
$order= $_POST['order'];
$limit= $_POST['limit'];




	if((strlen($search)<=0)&&($what!='ALL')){
		echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
		
	  		echo 'alert("Do not leave search box blank")';
	  		echo '</script>';
	  		
	}else{
		$_SESSION['search']=$what;
			$_SESSION['whatsearch']=$search;
			$_SESSION['order']=$order;
			$_SESSION['limit']=$limit;
			$_SESSION['offset']=1;
			$_SESSION['page']=1;
			
	}
// echo $_SESSION['search'];
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
	
	  		echo 'window.open("requestpassword.php","_self")';
	  		echo '</script>';
	  	
		



?>