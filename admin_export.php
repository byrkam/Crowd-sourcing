<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Export</title>
		<link rel="stylesheet" type="text/css" href="home-style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.forms{
	border-radius: 5px;
  padding-top: 70px;
  padding-right: 150px;
  padding-left: 150px;
  height:500px;

}
input[type=submit] {
  width: 100%;
  background-color: #87CEFA;
  color: white;
  padding: 30px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size:20px;
  text-align:center;


}

input[type=submit]:hover {
  background-color: #1E90FF;
}
label{
	display:block; width:x; height:y;
	text-align:center;
	font-size:30px;
	font-family:"Montserrat",sans-serif;

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

	 <!--action="force_download.php"-->


		</nav>

</header>

<!--JSON EXPORT-->



<div class="forms">
 <form action="json_download.php" method="post" name="downloadform" >
  <input name="file_name" value="Download json file" type="hidden">
<label for="submit">Click here to download json file</label>
<input type="submit" value="Download json file" >
</form>

<!--CSV EXPORT-->
<br>
 <form action="csv_download.php" method="post" name="downloadform2" >
  <input name="csv" value="Download csv file" type="hidden">
<label>Click here to download csv file</label>  <input type="submit" value="Download csv file">
</form>

<!--XML EXPORT-->
<br>
<form action="xml_download.php" method="post" name="downloadform3" >
  <input name="xml" value="Download xml file" type="hidden">
<label>Click here to download xml file</label>  <input type="submit" value="Download xml file">
</form>

</div>

</body>
</html>
