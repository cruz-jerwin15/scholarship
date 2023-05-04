<?php session_start();
?>
<html>
	<head></head>
	<body>
		<?php

		$page = $_SESSION['filterpage'];
		$page = $page-1;
		$_SESSION['filterpage']=$page;
		 echo '<script language="javascript">';
        echo 'window.open("questBank.php","_self")';
        echo '</script>';
    

		?>
	</body>
</html>
