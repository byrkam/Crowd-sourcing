<?php
session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Homepage</title>
		<link rel="stylesheet" href="home-style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>


	<body>

	<header>
		<nav>
			<ul>
				<li><a href="loggedin.php">Home <i class="fa fa-home"></i></a></li>
 				<li><a href="history.php">History <i class="fa fa-history"></i></a></li>
				<li><a href="profile.php">Profile <i class="fa fa-user"></i></a></li>
			</ul>
	        <form class="button" action="includes/logout.php" method="post">
						<button type="submit" name="logoutbtn">Logout</button>
						<script src="js/prevent_back_arrow.js"></script>
					</form>
		</nav>
	</header>


		<main>
			<div>
			<h1 id="month_score">Your Score for this month is: <br></h1>
			<div>
  			<table id="lead"></table>
				<canvas id="bar-chart"></canvas>
				<br/>
			</div>
			<div>
				<h1 id="data"></h1>
				<h1 id="records_period"></h1>
			</div>
		</div>
		</main>
		<script src="js/main.js"></script>
		<script src="js/Mychart.js"></script>
	</body>

</html>
