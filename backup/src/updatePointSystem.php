<?php session_start();
include 'config.php';


$process = $_POST['process'];
$id = $_POST['id'];


if($process=="EXAM"){
	$label =$_POST['label'];
	$points =$_POST['points'];
	$min =$_POST['min'];
	$max =$_POST['max'];

	$sql = "UPDATE tbl_exam_indicator SET label='$label',points='$points',min='$min',max='$max' WHERE id='$id'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update exam indicator")';
              echo '</script>';
}else if($process=="GRADE"){
	$label =$_POST['label'];
	$points =$_POST['points'];
	$min =$_POST['min'];
	$max =$_POST['max'];

	$sql = "UPDATE tbl_grade_indicator SET label='$label',points='$points',min='$min',max='$max' WHERE id='$id'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update grade indicator")';
              echo '</script>';
}else if($process=="INCOME"){
	$label =$_POST['label'];
	$points =$_POST['points'];
	$min =$_POST['min'];
	$max =$_POST['max'];

	$sql = "UPDATE tbl_income_indicator SET label='$label',points='$points',min='$min',max='$max' WHERE id='$id'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update income indicator")';
              echo '</script>';
}else if($process=="RESIDENCY"){
	$label =$_POST['label'];
	$points =$_POST['points'];
	$min =$_POST['min'];
	$max =$_POST['max'];

	$sql = "UPDATE tbl_residency_indicator SET label='$label',points='$points',min='$min',max='$max' WHERE id='$id'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update residency indicator")';
              echo '</script>';
}
else if($process=="OTHER"){
	//$label =$_POST['label'];
	$points =$_POST['points'];
	

	$sql = "UPDATE tbl_other_indicator SET points='$points' WHERE id='$id'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully update other information indicator")';
              echo '</script>';
}else if($process=="POINT"){
	//$label =$_POST['label'];
	$point_system =$_POST['point_system'];
	

	$sql = "UPDATE tbl_point_system SET point_system='$point_system' WHERE id='$id'";
	$conn->query($sql);
	 echo '<script language="javascript">';
              echo 'alert("You successfully change point system")';
              echo '</script>';
}


	
	
	
	
	echo '<script language="javascript">';
		// echo 'localStorage.setItem("notif","1")';
  		echo 'window.open("pointSystem.php","_self")';
  		echo '</script>';



?>