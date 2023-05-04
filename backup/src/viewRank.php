<?php header('Access-Control-Allow-Origin: *');?>
<html>
	<head>
		<style>
			.tbl{
				border:1px solid;
			}
		</style>
	</head>
	<body>
		<div >
			<form action="setDate.php" method="POST">
				<input type="date" name="todays">
				<input type="submit" value="SUBMIT">
			</form>
			<a href="viewPdf.php">VIEW</a>
		</div>
		
		<table class="tbl">
			<thead>
				<tr>
					<th class="tbl">RANK</th>
					<th class="tbl">USERNAME</th>
					<th class="tbl">POINTS</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'database.php';
					session_start();
					$dates = $_GET['dates'];
					echo $dates;
					$sql = "SELECT * FROM tbl_rank where dates='$dates' ORDER BY points DESC";
					$result = $conn->query($sql);
					$count =1;
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()){
							if(is_numeric($row['user_id'])==1){
								echo '<tr style="background-color:white;">';
							}else{
								echo '<tr style="background-color:red;">';
							}
							
								echo '<td class="tbl">';
								echo $count;
								echo '</td>';
								
								echo '<td class="tbl">';
								$user_id = $row['user_id'];
								$sql1 = "SELECT * FROM tbl_account where user_id='$user_id'";
								$result1 = $conn->query($sql1);
								$row1 = $result1->fetch_assoc();
								echo $row1['username'];
								echo '</td>';

							
							


								echo '<td class="tbl">';
								echo $row['points'];
								echo '</td>
							</tr>';
							$count++;
						}
					}

				?>

			
			</tbody>
		</table>
	

	</body>


</html>