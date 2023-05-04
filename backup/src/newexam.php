<?php
include 'config.php';
?>
<html>

<?php
		$exam_id=5;
 	  $sql2 = "SELECT * FROM tbl_exam WHERE id='$exam_id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    if ($result2->num_rows > 0){
    	echo "1";
    }else{
    	echo "2";
    }
?>
</html>