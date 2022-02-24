<?php
		include_once '../includes/dbh.php';
		$sql= "SELECT users.name AS name, SUM(leaderboard.walk_act)/SUM(leaderboard.all_act)*100 AS score, leaderboard.month AS month FROM leaderboard, users WHERE users.uni_id = leaderboard.user_id GROUP BY users.name, leaderboard.month ORDER BY score DESC"; 
		$result=mysqli_query($conn,$sql);
		$data = array();
			while ($row = mysqli_fetch_object($result))
			{
				array_push($data, $row);
			}
		echo json_encode($data);
		exit();
?>
