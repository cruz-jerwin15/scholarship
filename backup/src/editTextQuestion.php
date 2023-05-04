<?php session_start();
?>
<html>
	<head></head>
	<body>
		<?php

		$_SESSION['questtype']="TEXT";
		$_SESSION['question']="EDIT";
		$_SESSION['questid']=$_GET['quest'];
		 echo '<script language="javascript">';
        echo 'window.open("questBank.php","_self")';
        echo '</script>';
    

		?>
	</body>
</html>
