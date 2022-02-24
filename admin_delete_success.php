<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>History</title>
		<link rel="stylesheet" href="home-style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>


	<body>

		<header>
		<nav>
			<ul>
				<<li><a href="admin_stats.php">Database view<i class="fa fa-database"></i></a></li>
				<li><a href="admin_map.php">Search<i class="fa fa-map"></i></a></li>
 				<li><a href="admin_delete.php">Delete<i class="fa fa-trash"></i></a></li>
				<li><a href="admin_export.php">Export<i class="fa fa-download"></i></a></li>
			</ul>
	        <form class="button" action="includes/logout.php" method="post">
						<button type="submit" name="logoutbtn">Logout
						<script src="js/prevent_back_arrow.js"></script>
						</button>
					</form>
		</nav>

	</header>

	<h1>Your database has been successfully deleted</h1>


	</body>
	`
</html>
