<?php
session_start();

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>History</title>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
		<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			* {
					margin: 0;
					padding: 0;
				}

			body, html {
				padding: 0;
				margin: 0;
				background-image: url("baaaa.JPG");
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
			nav {
				top: 0;
				width:100%;
				height:100px;
				background-color:black;
				opacity: 0.8;
				text-align: center;
			}

			ul{
				margin-left:60px;

			}

			ul li{
				list-style:none;
				display:inline-block;
				float:left;
				line-height:100px;
			}

			ul li a{
				display:block;
				text-decoration:none;
				font-size:14px;
				font-family:arial;
				color:white;
				padding:0 20px;
			}
			ul li a:hover{
				color:red;
			}


			button {
				position:absolute;
				top: 20px;
				right:0;
				height:50px;
				width:100px;
				background-color:black;
				color:white;
				border-radius: white;
				vertical-align: middle;
			}

			button:hover{
				background-color:red;
				cursor:pointer;
			}


			h1{
				text-align:center;
			}

			table{
				float: right;
				margin-right: 70px;
				width:200px;
				/*border-spacing:40px;*/
			}
			caption{
				font-size:20px;
			}
			th{
				text-align:center;
				background-color:#F5F5F5;
			}
			td,th {
				border: 1px solid #000;
				width: 100px;
				text-align:center;
					}


			table,th,td{
				border:1px solid #000;
				border-collapse:collapse;
			}

			th,td{
				padding:8px;
			}

			tr:nth-child(even){
			background-color:#87CEFA;
			}
			tr:nth-child(odd){
			background-color:#87CEFA;
			}

			.contain{
				height:678px;
			}
			#mapid{
				height: 75%;
				width: 92%;
				align: "left";
				border-style: solid;
				margin-left: 20px;
			}

			.topleftcorner{
	      position:absolute;
	      top:20px;
	      left:0;
				margin-top:80px;
				margin-left: 80px;
				align-items: center;
	    }

		</style>
	</head>


	<body>
		<header>
			<nav>
	 			<ul>

					<li><a href="loggedin.php">Home <i class="fa fa-home"></i></a></li>
		 		 <li><a href="history.php">History <i class="fa fa-history"></i></a></li>
		 		 <li><a href="profile.php">Profile <i class="fa fa-user"></i></a></li>

	 			</ul>
	 			<form action="includes/logout.php" method="post">
	 				<button type="submit" name="logoutbtn">Logout</button>
				</form>
			</nav>
		</header>
		<main>

			<?php
					$conn=mysqli_connect("localhost","root","","loginsystem");
					mysqli_query($conn,"set names 'utf8'");
				  $this_usr = $_SESSION['userId'];
					$sql= "SELECT DISTINCT activities.type as act, COUNT(activities.type)/(SELECT COUNT(activities.timestampms) FROM activities)*100 as counted_activities
			    FROM activities INNER JOIN locations ON activities.loc_timestmp = locations.timestampms INNER JOIN goes_to ON locations.timestampms = goes_to.where_goes INNER JOIN users ON goes_to.who_goes = users.uni_id
			    WHERE EXTRACT(MONTH FROM (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchm] AND $_POST[srchmonth]
			    AND EXTRACT(YEAR FROM (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchy] AND $_POST[srchyear]
					AND users.uni_id = $this_usr
			    GROUP BY act order by counted_activities ASC";
					$result=mysqli_query($conn,$sql);
					echo "<center><div>
						<table>
						<caption>Activities percentage per type(%)</caption><thead><tr><th>Activity_type:</th><th>percentage(%):</th></tr></thead>
						";
					while($row=mysqli_fetch_array($result))
					{
						echo  "<tbody>
								<tr>
								<td>$row[act]</td>
								<td>$row[counted_activities]%</td>
								</tr>
								</tbody>
								";
					}
					echo "</table></div></center>";
				?>

				<?php
					$conn=mysqli_connect("localhost","root","","loginsystem");
					mysqli_query($conn,"set names 'utf8'");
					$this_usr = $_SESSION['userId'];
					$s="SELECT DISTINCT activities.type AS type,
					EXTRACT(HOUR from (FROM_UNIXTIME(activities.timestampms/1000))) AS hour,
					COUNT(activities.type) AS plithos
					FROM activities INNER JOIN locations ON activities.loc_timestmp = locations.timestampms INNER JOIN goes_to ON locations.timestampms = goes_to.where_goes INNER JOIN users ON goes_to.who_goes = users.uni_id
					WHERE EXTRACT(MONTH from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchm] AND $_POST[srchmonth]
					AND EXTRACT(YEAR from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchy] AND $_POST[srchyear]
					AND users.uni_id = $this_usr
					GROUP BY hour, type ORDER BY plithos DESC
					";
					$tb=mysqli_query($conn,$s);
					$rows = mysqli_num_rows($tb);
					$acts = array("EXITING_VEHICLE", "IN_TWO_WHEELER_VEHICLE", "IN_BUS", "RUNNING", "TILTING", "ON_BICYCLE", "ON_FOOT", "WALKING", "IN_RAIL_VEHICLE", "IN_ROAD_VEHICLE", "IN_FOUR_WHEELER_VEHICLE", "IN_CAR", "IN_VEHICLE", "UNKNOWN", "STILL");
					echo "<center><div class=contain>
					<table>
					<caption>Hour with the most records/activity</caption>
					<thead><tr><th>Activity_type:</th><th>Time(hour):</th></tr></thead>
					";
					while($row=mysqli_fetch_array($tb)){
						for($j=0; $j<15; $j++){
							if($row['type'] == $acts[$j]){
								echo  "<tbody>
								<tr>
								<td>$row[type]</td>
								<td>$row[hour]:00</td>
								</tr>
								</tbody>
								";
								$acts[$j] = "";
							}
						}
					}
					echo "</table></div></center>";
			?>



			<?php
				$conn=mysqli_connect("localhost","root","","loginsystem");
				mysqli_query($conn,"set names 'utf8'");
				$this_usr = $_SESSION['userId'];
				$s="SELECT DISTINCT activities.type AS type,
				MOD(EXTRACT(DAY from (FROM_UNIXTIME(activities.timestampms/1000))), 7) AS day,
				COUNT(activities.type) AS plithos
				FROM activities INNER JOIN locations ON activities.loc_timestmp = locations.timestampms INNER JOIN goes_to ON locations.timestampms = goes_to.where_goes INNER JOIN users ON goes_to.who_goes = users.uni_id
				WHERE EXTRACT(MONTH from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchm] AND $_POST[srchmonth]
				AND EXTRACT(YEAR from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchy] AND $_POST[srchyear]
				AND users.uni_id = $this_usr
				GROUP BY day, type ORDER BY plithos DESC
				";
				$tb=mysqli_query($conn,$s);
				$rows = mysqli_num_rows($tb);
				$acts = array("EXITING_VEHICLE", "IN_TWO_WHEELER_VEHICLE", "IN_BUS", "RUNNING", "TILTING", "ON_BICYCLE", "ON_FOOT", "WALKING", "IN_RAIL_VEHICLE", "IN_ROAD_VEHICLE", "IN_FOUR_WHEELER_VEHICLE", "IN_CAR", "IN_VEHICLE", "UNKNOWN", "STILL");
				echo "<center><div class=topleftcorner>
				<table>
				<caption>Day with the most records/activity</caption>
				<thead><tr><th>Activity_type:</th><th>Day:</th></tr></thead>
				";
				while($row=mysqli_fetch_array($tb)){
					for($j=0; $j<15; $j++){
						if($row['type'] == $acts[$j]){
							echo  "<tbody>
							<tr>
							<td>$row[type]</td>
							<td>$row[day]</td>
							</tr>
							</tbody>
							";
							$acts[$j] = "";
						}
					}
				}
				echo "</table></div></center>";
		?>



			<?php
				$connection=mysqli_connect("localhost","root","","loginsystem");
				mysqli_query($connection,"set names 'utf8'");
				$this_usr = $_SESSION['userId'];
				$s="SELECT LEFT(latitudeE7 * POWER(10,-7), 9) as lat, LEFT(longitudeE7 * POWER(10,-7), 9) as lng
				FROM locations INNER JOIN goes_to ON locations.timestampms = goes_to.where_goes INNER JOIN users ON goes_to.who_goes = users.uni_id
				WHERE EXTRACT(MONTH from (FROM_UNIXTIME(timestampms/1000))) BETWEEN $_POST[srchm] AND $_POST[srchmonth]
				AND EXTRACT(YEAR from (FROM_UNIXTIME(timestampms/1000))) BETWEEN $_POST[srchy] AND $_POST[srchyear]
				AND users.uni_id = $this_usr
				";

				$tb=mysqli_query($connection,$s);

				echo "<script>var recordings = [];</script>";
				while($row=mysqli_fetch_array($tb)){

					$make_json = array("lat" => $row['lat'], "lng" => $row['lng'], "count" => 1);
					$make_json = json_encode($make_json);
					echo "<script> recordings.push($make_json);</script>";
				}
			?>

			<div class="contain">
				<div style="overflow: auto;">
					<h2 style="float: left; margin-left: 20px; display: block;">
	 					Your search results are pictured above. For another search press
	 					<form action="history.php" style="float: right;">
		 					<input type="submit" value="Here" style="background-color: #4CAF50; border: 1px solid #ddd; color: white; cursor: pointer; padding: 2px 25px; position: relative; left: 26px;"/>
	 					</form>
					</h2>
				</div>
			<br/>
			<div id="mapid"></div>


			<script>

var baseLayer = L.tileLayer(
  'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
	attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
	maxZoom: 18
  }
);

let min = Math.min(recordings.map(sale => sale.value))
let max = Math.max(recordings.map(sale => sale.value))

var cfg = {
  // radius should be small ONLY if scaleRadius is true (or small radius is intended)
  "radius": 0.002,
  "maxOpacity": 0.8,
  "scaleRadius": true,
  "useLocalExtrema": true,
  latField: 'lat',
  lngField: 'lng',
  valueField: 'count'
};
var heatmapLayer = new HeatmapOverlay(cfg);
heatmapLayer.setData({
	min: min,
	max: max,
	data: recordings
});

var map = new L.Map('mapid', {
  center: new L.LatLng(38.230462, 21.753150),
  zoom: 12,
  layers: [baseLayer, heatmapLayer]
});

	</script>
		</div>
		</main>
		<footer></footer>
	</body>
</html>
