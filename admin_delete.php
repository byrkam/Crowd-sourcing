<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Database Delete</title>
		<link rel="stylesheet" href="home-style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	.del{
		border-radius: 5px;
  	padding-top: 70px;
   	padding-right: 150px;
   	padding-left: 150px;
   	height:500px;

}
.del_btn {
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

.del_btn:hover {
  background-color: #1E90FF;
}
label{
	display:block; width:x; height:y;
	text-align:center;
	font-size:30px;
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


	<div class="del">
	<label>Click here to delete the database</label><input type="button" onClick="deleteme()" name="Delete" value="Delete" class="del_btn">
	</div>
	<script language="javascript">
 function deleteme()
 {
 if(confirm("Are you sure you want to delete database;")){
 window.location.href='delete.php';
 return true;
 }
 }
 </script>
	</body>
	`
</html>
