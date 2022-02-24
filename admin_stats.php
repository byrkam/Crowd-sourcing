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



<style>


.one{
	width:20%;
	float:left;
	padding-left:5px;
	overflow: auto;
}

.bar{
  overflow:auto;
  width:18%;
  height:500px;
  padding-left:15px;
}

.last{
	margin-left:20px;
}


td,
th {
  border: 1px solid #000;
  width: 100px;
  text-align:center;
}

th {
	background-color:#F5F5F5;
	}


table {
  table-layout: fixed;
  width:100px;
}
td:first-child, th:first-child {
  position:sticky;
  left:0;
  z-index:1;
  background-color: #87CEFA;
}
td:last-child, th:last-child {
  position:sticky;
  right:0;
  z-index:1;
  background-color: #87CEFA;
}
thead tr th {
  position:sticky;
  top:0;
}
th:first-child, th:last-child {z-index:2;background-color:#F5F5F5;}
tbody{
	position: relative;
}
</style>
	</head>


	<body>

	<header>
		<nav>
			<ul>
				<li><a href="admin_stats.php">Database view<i class="fa fa-database"></i></a></li>
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

<div class="container">

<div class="bar one">

	<?php
			//ACTIVITIES PER TYPE
			$conn=mysqli_connect("localhost","root","","loginsystem");
			mysqli_query($conn,"set names 'utf8'");
			$sql= "SELECT activities.type as act, count(activities.type) as plithos, ROUND(count(activities.type) * 100.0 / (select count(*) from activities) ,2) as percentage
			FROM activities
			group by activities.type";
			$result=mysqli_query($conn,$sql);
			echo "<center><div>
				<table class='one'>
				<thead><tr><th>Activity_type:</th><th>percentage(%):</th></tr></thead>
				";
			while($row=mysqli_fetch_array($result))
			{
				echo  "<tbody>
						<tr>
						<td style='font-size:11px;'>$row[act]</td>
						<td >$row[percentage]%</td>
						</tr>
						</tbody>
						";
			}
			echo "</table></div></center>";
		?>
		</div>

		<div class="bar one">

			<?php
					//ACTIVITIES PER MONTH
					$conn=mysqli_connect("localhost","root","","loginsystem");
					mysqli_query($conn,"set names 'utf8'");
					$sql= "SELECT EXTRACT(MONTH from (FROM_UNIXTIME(timestampms/1000))) as month, count(type) as plithos, ROUND(count(type) * 100.0 / (select count(*) from activities) ,2) as percentage
					FROM activities
					group by month
					ORDER BY month ASC";
					$result=mysqli_query($conn,$sql);
					echo "<right><div>
						<table class='one'>
						<thead><tr><th>Month:</th><th>percentage(%):</th></tr></thead>
						";
					while($row=mysqli_fetch_array($result))
					{
						echo  "<tbody>
								<tr>
								<td >$row[month]</td>
								<td >$row[percentage]%</td>
								</tr>
								</tbody>
								";
					}
					/*
					<td style='padding: 10px 8px 4px 30px;'>$row[month]</td>
								<td style='padding: 10px 2px 8px 30px;'>$row[percentage]%</td>
					*/
					echo "</table></div></right>";
				?>
</div>
		<div class="bar one">


		<?php
				//ACTIVITIES PER HOUR
				$conn=mysqli_connect("localhost","root","","loginsystem");
				mysqli_query($conn,"set names 'utf8'");
				$sql= "SELECT EXTRACT(HOUR from (FROM_UNIXTIME(timestampms/1000))) as hour, count(type) as plithos, ROUND(count(type) * 100.0 / (select count(*) from activities) ,2) as percentage
				FROM activities
				group by hour
				ORDER BY hour ASC";
				$result=mysqli_query($conn,$sql);
				echo "<right><div>
					<table class='one' >
					<thead><tr><th>Hour:</th><th>percentage(%):</th></tr></thead>
					";
				while($row=mysqli_fetch_array($result))
				{
					echo  "<tbody>
							<tr>
							<td >$row[hour]</td>
							<td >$row[percentage]%</td>
							</tr>
							</tbody>
							";
				}
				echo "</table></div></right>";
			?>

</div>
<div class="bar one">
				<?php
						//ACTIVITIES PER DAY
						$conn=mysqli_connect("localhost","root","","loginsystem");
						mysqli_query($conn,"set names 'utf8'");
						$sql= "SELECT EXTRACT(DAY from (FROM_UNIXTIME(timestampms/1000))) as day, count(type) as plithos, ROUND(count(type) * 100.0 / (select count(*) from activities) ,2) as percentage
						FROM activities
						group by day
						ORDER BY day ASC";
						$result=mysqli_query($conn,$sql);
						echo "<right><div>
							<table class='one' >
							<thead><tr><th>Day:</th><th>percentage(%):</th></tr></thead>
							";
						while($row=mysqli_fetch_array($result))
						{
							echo  "<tbody>
									<tr>
									<td >$row[day]</td>
									<td >$row[percentage]%</td>
									</tr>
									</tbody>
									";
						}
						echo "</table></div></right>";
					?>
</div>
<div class="bar">

					<?php
			//ACTIVITIES PER USER
			$conn=mysqli_connect("localhost","root","","loginsystem");
			mysqli_query($conn,"set names 'utf8'");
			$sql= "SELECT count(activities.type) as plithos, users.name as name, ROUND(count(type) * 100.0 / (select count(*) from activities) ,2) as percentage
			FROM activities INNER JOIN locations ON activities.loc_timestmp = locations.timestampms INNER JOIN goes_to ON locations.timestampms = goes_to.where_goes INNER JOIN users ON goes_to.who_goes = users.uni_id
			group by name
			order by activities.type ASC";
			$result=mysqli_query($conn,$sql);
			echo "<right><div>
			<table class='one'>
			<thead><tr><th>Activity_type:</th><th>percentage(%):</th></tr></thead>
			";
			while($row=mysqli_fetch_array($result))
			{
			echo  "<tbody>
			<tr>
			<td >$row[name]</td>
			<td >$row[percentage]%</td>
			</tr>
			</tbody>
			";
			}
			echo "</table></div></right>";
			?>


		<?php
							//ACTIVITIES PER YEAR
							$conn=mysqli_connect("localhost","root","","loginsystem");
							mysqli_query($conn,"set names 'utf8'");
							$sql= "SELECT EXTRACT(YEAR from (FROM_UNIXTIME(timestampms/1000))) as year, count(type) as plithos, ROUND(count(type) * 100.0 / (select count(*) from activities) ,2) as percentage
							FROM activities
							group by year
							ORDER BY year ASC";
							$result=mysqli_query($conn,$sql);
							echo "<right><div>
								<table class='one' style='margin-top:50px;'>
								<thead><tr><th>Year:</th><th>percentage(%):</th></tr></thead>
								";
							while($row=mysqli_fetch_array($result))
							{
								echo  "<tbody>
										<tr>
										<td style='text-align:center;  '>$row[year]</td>
										<td style='text-align: center;'>$row[percentage]%</td>
										</tr>
										</tbody>
										";
							}
							echo "</table></div></right>";
						?>
</div>

</div>


	</body>

</html>
