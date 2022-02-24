<?php
session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Map results</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
				height: 100%;
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
			text-align:left;
		}

		table,th,td{
			border:1px solid #000;
			border-collapse:collapse;
		}

		th,td{
			padding:10px;
		}

		tr:nth-child(even){
		background-color:#fff;
		}
		tr:nth-child(odd){
		background-color:#ddd;
		}

		.contain{
			height:600px;
			padding-top:30px;
			}
		.center{padding-top:35px;}
		#mapid{
			margin-top: 20px;
			padding-top: 100px;
			height: 400px;
			width: 92%;
			align: "left";
			border-style: solid;
			margin-left: 20px;
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
	<div style="overflow: auto;">
		<h2 style="float: left; margin-left: 20px; display: block;">
			Your search results are pictured above. For another search press
			<form action="admin_map.php" style="float: right;">
				<input type="submit" value="Here" style="background-color:#87CEFA; border: 1px solid #ddd; color: white; cursor: pointer; padding: 2px 25px; position: relative; left: 26px;"/>
			</form>
		</h2>
	</div>

	<div id="mapid"></div>

<?php
$connection=mysqli_connect("localhost","root","","loginsystem");
mysqli_query($connection,"set names 'utf8'");

if (isset($_POST["foot"])){
			$ON_FOOT = $_POST["foot"];
		}else{
			$ON_FOOT = "";
		}
if (isset($_POST["walk"])){
			$WALKING = $_POST["walk"];
		}else{
			$WALKING = "";
		}
		if (isset($_POST["unk"])){
			$UNKNOWN = $_POST["unk"];
		}else{
			$UNKNOWN = "";
		}
		if (isset($_POST["stil"])){
			$STILL = $_POST["stil"];
		}else{
			$STILL = "";
		}
		if (isset($_POST["tilt"])){
			$TILTING = $_POST["tilt"];
		}else{
			$TILTING = "";
		}
		if (isset($_POST["runn"])){
			$RUNNING = $_POST["runn"];
		}else{
			$RUNNING = "";
		}
		if (isset($_POST["in_v"])){
			$IN_VEHICLE = $_POST["in_v"];
		}else{
			$IN_VEHICLE = "";
		}
		if (isset($_POST["on_b"])){
			$ON_BICYCLE = $_POST["on_b"];
		}else{
			$ON_BICYCLE = "";
		}
		if (isset($_POST["road_v"])){
			$IN_ROAD_VEHICLE = $_POST["road_v"];
		}else{
			$IN_ROAD_VEHICLE = "";
		}
		if (isset($_POST["rail_v"])){
			$IN_RAIL_VEHICLE = $_POST["rail_v"];
		}else{
			$IN_RAIL_VEHICLE = "";
		}
		if (isset($_POST["four_v"])){
			$IN_FOUR_WHEELER_VEHICLE = $_POST["four_v"];
		}else{
			$IN_FOUR_WHEELER_VEHICLE = "";
		}
		if (isset($_POST["car"])){
			$IN_CAR = $_POST["car"];
		}else{
			$IN_CAR = "";
		}
		if (isset($_POST["two_v"])){
			$IN_TWO_WHEELER_VEHICLE = $_POST["two_v"];
		}else{
			$IN_TWO_WHEELER_VEHICLE = "";
		}
		if (isset($_POST["bus"])){
			$IN_BUS = $_POST["bus"];
		}else{
			$IN_BUS = "";
		}
		if (isset($_POST["exit"])){
			$EXITING_VEHICLE = $_POST["exit"];
		}else{
			$EXITING_VEHICLE = "";
		}
		if (isset($_POST["ALL_ACTIVITIES"])){
			$ALL_ACTIVITIES = $_POST["ALL_ACTIVITIES"];
		}else{
			$ALL_ACTIVITIES = "";
		}



$s="SELECT locations.latitudeE7 * POWER(10,-7) as lat,locations.longitudeE7 * POWER(10,-7) as lon, activities.type
	FROM activities INNER JOIN locations ON activities.loc_timestmp = locations.timestampms INNER JOIN goes_to ON locations.timestampms = goes_to.where_goes INNER JOIN users ON goes_to.who_goes = users.uni_id
	WHERE EXTRACT(month from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchm] AND $_POST[srchmonth]
	AND EXTRACT(year from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchy] AND $_POST[srchyear]
	AND EXTRACT(day from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchd] AND $_POST[srchday]
	AND EXTRACT(hour from (FROM_UNIXTIME(activities.timestampms/1000))) BETWEEN $_POST[srchh] AND $_POST[srchhour]
	AND
	(activities.type='$ON_FOOT' OR  activities.type='$WALKING' OR activities.type='$UNKNOWN' OR activities.type='$STILL' OR activities.type='$TILTING'OR activities.type='$RUNNING'OR activities.type='$IN_VEHICLE'OR activities.type='$ON_BICYCLE'OR activities.type='$IN_ROAD_VEHICLE'OR activities.type='$IN_RAIL_VEHICLE'
	OR activities.type='$IN_FOUR_WHEELER_VEHICLE'OR activities.type='$IN_CAR'OR activities.type='$IN_TWO_WHEELER_VEHICLE'OR activities.type='$IN_BUS'OR activities.type='$EXITING_VEHICLE'OR activities.type='$ALL_ACTIVITIES')
	";

ini_set('memory_limit', '-1');
		$tb=mysqli_query($connection,$s);

		echo "<script>var recordings = [];</script>";
		while($row=mysqli_fetch_array($tb))
		{

			$make_json = array("lat" => $row['lat'], "lng" => $row['lon'], "count" => 1);
			$make_json = json_encode($make_json);
			echo "<script> recordings.push($make_json);</script>";
		}
?>



<script>
var testData = {
          max: 8,
          data: recordings
        };
        var baseLayer = L.tileLayer(
          "https://tile.openstreetmap.org/{z}/{x}/{y}.png",{
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
            maxZoom: 18
          }
        );
        var cfg = {
          // radius should be small ONLY if scaleRadius is true (or small radius is intended)
          "radius": 0.002,
          "maxOpacity": .8,
          // scales the radius based on map zoom
          "scaleRadius": true,
          // if set to false the heatmap uses the global maximum for colorization
          // if activated: uses the data maximum within the current map boundaries
          //   (there will always be a red spot with useLocalExtremas true)
          "useLocalExtrema": true,
          // which field name in your data represents the latitude - default "lat"
          latField: 'lat',
          // which field name in your data represents the longitude - default "lng"
          lngField: 'lng',
          // which field name in your data represents the data value - default "value"
          valueField: 'count'
        };
        var heatmapLayer = new HeatmapOverlay(cfg);
        var map = new L.Map('mapid', {
          center: new L.LatLng(38.230462, 21.753150),
          zoom: 12,
          layers: [baseLayer, heatmapLayer]
        });
        heatmapLayer.setData(testData);
        // make accessible for debugging
        layer = heatmapLayer;
</script>







	</body>

</html>
