<?php
session_start();

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Profile</title>
		<link rel="stylesheet" href="home-style.css">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="crossorigin=""></script>
		<script src="js/heatmap.js"> </script>
		<script src="js/leaflet-heatmap.js"> </script>
		<script src="https://npmcdn.com/leaflet-geometryutil"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
.container{
	width:100%;
	height:720px;
	margin: 0 auto;
	padding-top:20px;
}


	.wrapper{
		width:45%;
		float:right;
		padding-top:150px;
	}

	#mapid{
		height:500px;
		width: 50%;
		align: left;
		border-style: solid;
		padding-left: 20px;
	}

	.imp_btn{
	margin-top:20px;
	background-color:#87CEFA;
	font-size:20px;
	padding: 14px 40px;
	color:white;
	cursor:pointer;
	font-family: "Lucida Console", Courier, monospace;
			}
.imp_btn:hover {
  background-color: #1E90FF;
  color: white;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.imp_btn:active {
  background-color: #1E90FF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.sel_btn{

	font-size:16px;
	padding: 10px 28px;
	color:white;
	cursor:pointer;
	font-family: "Lucida Console", Courier, monospace;
			}

label{
	margin-left:120px;
	color:white;
	justify-content:center;
	align-items:center;
	font-size:20px;
	align-items:center;
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
	 <form class="form-inline" action="includes/logout.php" method="post">
	 	<button class="topright" type="submit" name="logoutbtn">Logout</button>
		<script src="js/prevent_back_arrow.js"></script>
	</form>
	</nav>
</header>
	<main>
		<br/>

<div class="container">

		<div class="wrapper">

	<form action="includes/upload.php" method="POST" enctype="multipart/form-data">
		<label for="file">Select a JSON File to Import</label>
		<input type="file" name="jsonFile" id="file" class="sel_btn"></input>


		<input type="submit" value="Import" name="buttonImport" class="imp_btn"></input>
	</form>

	</div>



	<div id="mapid"></div>
</div>


<script>


// center of the map
var center = [38.230462, 21.753150];

// Create the map
var map = L.map('mapid').setView(center, 12);
// Set up the OSM layer
L.tileLayer(
  'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
    maxZoom: 18
  }).addTo(map);

var editableLayers = new L.FeatureGroup();
map.addLayer(editableLayers);

var drawPluginOptions = {
  position: 'topright',
  draw: {
    rectangle: {
      allowIntersection: false, // Restricts shapes to simple rectangle
      drawError: {
        color: '#e1e100', // Color the shape will turn when intersects
        message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
      },
      shapeOptions: {
        color: '#97009c'
      }
    },
    // disable toolbar item by setting it to false
    polyline: false,
    circle: false, // Turns off this drawing tool
    polygon: false,
    marker: false,
    },
  edit: {
    featureGroup: editableLayers, //REQUIRED!!
    remove: false
  }
};

// Initialise the draw control and pass it the FeatureGroup of editable layers
var drawControl = new L.Control.Draw(drawPluginOptions);
map.addControl(drawControl);

var editableLayers = new L.FeatureGroup();
map.addLayer(editableLayers);

map.on('draw:created', function(e) {
  var type = e.layerType,
    layer = e.layer;

  if (type === 'marker') {
    layer.bindPopup('A popup!');
  }

  editableLayers.addLayer(layer);
});



</script>
</div>
</main>
<footer></footer>

	</body>

</html>
