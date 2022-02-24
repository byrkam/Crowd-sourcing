<?php
		include_once '../includes/dbh.php';
    session_start();
    $this_usr = $_SESSION['userId'];
		$sql= "SELECT SUM(leaderboard.walk_act)/SUM(leaderboard.all_act)*100 AS score, month FROM leaderboard, users WHERE leaderboard.user_id = $this_usr  GROUP BY leaderboard.month"; 
		$result=mysqli_query($conn,$sql);
		$data = array();
			while ($row = mysqli_fetch_object($result))
			{
				array_push($data, $row);
			}
		echo json_encode($data);
		exit();
?>
